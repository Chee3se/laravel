<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class All extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        for ($i = 0; $i < 10; $i++) {
            $startTime = microtime(true);
        
            echo shell_exec('php artisan run:test 2>&1');
        
            $timeToSleep = 60 - (microtime(true) - $startTime);
        
            if ($timeToSleep > 0) {
                sleep($timeToSleep);
            }
        }
    }
}
