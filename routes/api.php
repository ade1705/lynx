<?php

use App\Lib\Images\ImagesController;
use App\Lib\Messages\MessagesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/messages', [MessagesController::class, 'apiStore'])->name('messages-api-new');
Route::post('/upload-image', [ImagesController::class, 'upload'])->name('image-upload-api');
