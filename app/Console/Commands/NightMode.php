<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\MyLibs\Models\Others;

class NightMode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'night:mode';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Background will change night mode!';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       

        Others::where('id',1)->update(['background'=>'../img/bg/wall4.jpg']);
        
    }
}
