<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void {
        $schedule->call(function () {
            $inactiveTime = now()->subMinutes(20); // 5 min se zyada inactive users
            \App\Models\User::where('last_activity', '<', $inactiveTime)->update(['login_status' => 0]);
        })->everyFiveMinutes();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
