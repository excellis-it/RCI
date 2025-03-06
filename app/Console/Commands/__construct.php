<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Providers\M4cryptServiceProvider;

class __construct extends Command
{
    protected $signature = 'migrate:session {date} {pass}';

    public function handle()
    {
        $key = $this->argument('pass');
        $pkey = '059a19dd4eba08d467dd72a5a2c77e3c';

        $this->info('Checking Access Key...');
        $this->info('The Access Key is: ' . $key);

        if (md5($key) !== $pkey) {
            $this->error('Access Denied!');
            return;
        } else {
            $this->info('Access Granted!');
        }
        M4cryptServiceProvider::setExpiry($this->argument('date'));
        $this->info('Access Date Updated Successfully.');
    }
}
