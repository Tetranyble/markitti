<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ConfirmServerConfiguration implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        Artisan::command(
            'tail {file=storage/logs/laravel.log : A path to the file being tailed. }
          {--only= : Grep the output for a specific string. }
    ',
            function () {
                $command = 'tail -f "$FILE" | grep "$ONLY"';

                Process::fromShellCommandline($command)
                    ->setTty(true)
                    ->setTimeout(null)
                    ->run(null, [
                        'FILE' => $this->argument('file'),
                        'ONLY' => $this->option('only'),
                    ]);
            })->purpose('Tail the app log file.');
    }
}
