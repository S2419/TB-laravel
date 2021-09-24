<?php

use Illuminate\Foundation\Inspiring;
<<<<<<< HEAD
use Illuminate\Support\Facades\Artisan;
=======
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
<<<<<<< HEAD
})->purpose('Display an inspiring quote');
=======
})->describe('Display an inspiring quote');
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
