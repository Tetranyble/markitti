<?php


namespace App\Actions;


use App\Models\Store;
use Nginx\Conf as NginxConfiguration;

use Madkom\NginxConfigurator\Factory;
use Madkom\NginxConfigurator\Builder;
use Madkom\NginxConfigurator\Config\Location;
use Madkom\NginxConfigurator\Node\Directive;
use Madkom\NginxConfigurator\Node\Literal;
use Madkom\NginxConfigurator\Node\Param;


class CreateServerBlock
{

    protected $domains;
    /**
     * @var array
     */
    protected $root;

    public function __construct($domains = ['store.localhost'], $root = ['/var/www/html/markitti/public'])
    {
        $this->domains = $domains;
        $this->root = $root;
    }

    public function execute(){
        //create an instance
        $conf = new NginxConfiguration();


        //create and add server directive
        $conf->Add(NginxConfiguration::CreateDirective('server'));

        // add directives to server directive
        $conf['server']->AddDirective('server_name', array('example.org', 'www.example.org'));
        $conf['server']->AddDirective('root', array('/home/example.org/www'));


        // create a new location directive
        $location = NginxConfiguration::CreateDirective('location');

        // add sub-directives
        $location->AddDirective('index', array('index.php', 'index.html', 'index.htm'));

        // add the location to the server directive

        $location->AddTo($conf['server']);

        // saveS
        $conf->Save('example.org.conf');

        // get as string
        $string = $conf->GetAsString();

        // show string
        return $string;

# or save
# $conf->Save('newFileName.conf');
    }

    public function block(){

        $factory = new Factory()
        $builder = new Builder();

        $server = $builder->append($factory->createServer(80));
        $server->append(new Directive('error_log', [
            new Param('/var/log/nginx/error.log'),
            new Param('debug'),
        ]));
        $server->append(new Location(new Param('/test'), null, [
            new Directive('error_page', [new Param('401'), new Param('@unauthorized')]),
            new Directive('set', [new Param('$auth_user'), new Literal('none')]),
            new Directive('auth_request', [new Param('/auth')]),
            new Directive('proxy_pass', [new Param('http://test-service')]),
        ]));
        $server->append(new Location(new Param('/auth'), null, [
            new Directive('proxy_pass', [new Param('http://auth-service:9999')]),
            new Directive('proxy_bind', [new Param('$server_addr')]),
            new Directive('proxy_redirect', [new Param('http://$host'), new Param('https://$host')]),
            new Directive('proxy_set_header', [new Param('Content-Length'), new Literal("")]),
            new Directive('proxy_pass_request_body', [new Param('off')]),
        ]));
        $server->append(new Location(new Param('@unauthorized'), null, [
            new Directive('return', [new Param('302'), new Param('/login?backurl=$request_uri')]),
        ]));
        $server->append(new Location(new Param('/login'), null, [
            new Directive('expires', [new Param('-1')]),
            new Directive('proxy_pass', [new Param('http://identity-provider-service')]),
            new Directive('proxy_bind', [new Param('$server_addr')]),
            new Directive('proxy_redirect', [new Param('http://$host'), new Param('https://$host')]),
            new Directive('proxy_set_header', [new Param('Content-Length'), new Literal("")]),
            new Directive('proxy_pass_request_body', [new Param('off')]),
        ]));

        print($builder->dump());
    }
}
