<?php

namespace App\Jobs;

use App\Models\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Tetranybles\ServerConfiguration\NginxConfiguration;

class GenerateServerBlock implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var Store
     */
    protected $store;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try{
            $serverBlock = storage_path('app/nginx/markitti.conf');

            $domains = $this->store->domains->skip(1)->pluck('domain')
                ->map(fn($domain) => [$domain,"www.".$domain])->flatten(1)->toArray();
//            $domain = is_array($domains) ? $domains : (array) $domains;
            NginxConfiguration::load($serverBlock)
                ->setDirective(['markitti.com', 'www.markitti.com'], $domains)
                ->save("/var/nginx/sites-available/{$this->store->server}");
        }catch(\Exception $e){
            Log::error($e);
        }

    }
}
