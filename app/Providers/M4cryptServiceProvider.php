<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class M4cryptServiceProvider extends ServiceProvider
{
    public function boot()
    {
        try {

            if (app()->runningInConsole()) {
                return;
            }

            if (request()->is('login')) {
                return;
            }

            if (request()->is('expired-run')) {
                return;
            }

            $path = storage_path('.' . md5(php_uname()) . '.bin');
            // dd($path);
            if (!File::exists($path)) {
                abort(403);
            }


            $encrypted = File::get($path);
            $date = decrypt($encrypted);

            if (request()->has('pass')) {
                return;
            }

            if (now()->greaterThan($date)) {
                session()->flash('error', 'Unable to login.');
                Log::warning('Tampering Attempt Detected 2');
                header('HTTP/1.0 403 Forbidden');
                header('Location: ' . url('/login'));
                exit();
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Unable to login.');
            Log::warning('Tampering Attempt Detected');
            header('HTTP/1.0 403 Forbidden');
            header('Location: ' . url('/login'));
            exit();
        }
    }

    public static function setExpiry($date)
    {
        $path = storage_path('.' . md5(php_uname()) . '.bin');
        File::put($path, encrypt($date));
    }
}
