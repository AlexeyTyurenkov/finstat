<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('hryvnatoday')
            ->everyThirtyMinutes()
            ->between('7:00', '17:00');

        $schedule->command('uxindex')->everyMinute()->between('06:59','16:00');
        $schedule->command('pftsindex')->everyFifteenMinutes()->between('06:59','16:00');
        $schedule->command('minfinmb')->everyFifteenMinutes()->between('10:00','18:00');
        $schedule->command('minfinva')->everyFifteenMinutes()->between('06:05','20:05');

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
