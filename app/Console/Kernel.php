<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\MyLibs\Models\Others;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\NightMode::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('night:mode')
                 ->dailyAt('16:18');
        $schedule->call(function () {
         Others::where('id',1)->update(['background'=>'https://cdn.dribbble.com/users/1696323/screenshots/8365669/media/f53f6f501ac81963e0eae3c1ead4138f.jpg']);
        })->dailyAt('17:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
