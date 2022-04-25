<?php

namespace Database\Seeders;

use App\Models\ServerBlock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServerBlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $str = '
            server {
                server_name markitti.com www.markitti.com;
                root /var/www/html/markitti/public;

                add_header X-Frame-Options \"SAMEORIGIN\";
                add_header X-XSS-Protection \"1; mode=block\";
                add_header X-Content-Type-Options \"nosniff\";

                index index.html index.htm index.php;

                charset utf-8;

                location / {
                try_files \$uri $uri/ /index.php?$query_string;
                }

                location = /favicon.ico { access_log off; log_not_found off; }
                location = /robots.txt  { access_log off; log_not_found off; }

                error_page 404 /index.php;

                location ~ \.php$ {
                fastcgi_pass unix:/var/run/php/php8.0-fpm.sock;
                fastcgi_index index.php;
                fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
                include fastcgi_params;
                }

                location ~ /\.(?!well-known).* {
                    deny all;
                }
            }
           
        ';
        ServerBlock::create([
            'block' => $str,
            'description' => 'default server nginx server block',
            'status' => true
        ]);
    }
}
