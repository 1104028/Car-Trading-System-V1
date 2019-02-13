<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Config;

class MailServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if (\Schema::hasTable('emailinformations')) {
            $mail = DB::table('emailinformations')->first();
            if ($mail) //checking if table is not empty
            {
                $config = array(
                    'driver'     => 'smtp',
                    'host'       => $mail->SMTPclientAddr,
                    'port'       => $mail->SMTPclientPort,
                    'from'       => array('address' => 'support@cartradingsystem.com', 'name' => 'Car Trading System'),
                    'encryption' => 'tls',
                    'username'   => $mail->hostID,
                    'password'   => $mail->hostPass,
                    'sendmail'   => '/usr/sbin/sendmail -bs',
                    'pretend'    => false,
                );
                Config::set('mail', $config);
            }
        }
    }
}
