<?php

use App\Http\Procedures\TennisProcedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Sajya\Server\Middleware\GzipCompress;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::rpc('/v1/endpoint', [TennisProcedure::class])
    ->middleware(GzipCompress::class)
    ->name('rpc.endpoint');
