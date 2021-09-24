<?php

use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Route;
=======
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

<<<<<<< HEAD
/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

=======
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

