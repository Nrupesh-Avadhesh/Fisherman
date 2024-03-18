<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;

class FlashMessageServiceProvide extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    static function setMessage($type = 1, $message = 'Data Successfully'){
        switch ($type) {
            case 0:
                $type = 'error';
                break;
            case 1:
                $type = 'success';
                break;
            case 2:
                $type = 'info';
                break;
            case 3:
                $type = 'warning';
                break;
        }
        Session::flash('alert-type', $type); 
        Session::flash('message', $message); 
    }
}
