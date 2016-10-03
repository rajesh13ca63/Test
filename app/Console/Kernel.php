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
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
   
        protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        
         $schedule->call(function () {
            
            $user="LM Lokesh";
            $email ="anil.danthi@joulestowatts.com";
            $name="Anil Danthi";
            Mail::send('emails.testing', ['user', $user], function ($m) {
            $m->from('hello@app.com', 'Your Application');

            $m->to($email, $name)->subject('Email Schedule sending test');
        });


        })->everyMinute();

    }
    
}
