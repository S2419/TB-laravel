<?php

namespace App\Http\Middleware;

<<<<<<< HEAD
use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
=======
use Illuminate\Foundation\Http\Middleware\TrimStrings as BaseTrimmer;

class TrimStrings extends BaseTrimmer
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array
     */
    protected $except = [
<<<<<<< HEAD
        'current_password',
=======
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
        'password',
        'password_confirmation',
    ];
}
