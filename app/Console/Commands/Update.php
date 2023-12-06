<?php

namespace App\Console\Commands;

use App\Models\Group;
use App\Models\Lesson;
use DOMDocument;
use Illuminate\Console\Command;
use PhpParser\Node\Stmt\Foreach_;

class Update extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:update';

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
        
    }
}
