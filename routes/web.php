<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('home', [
        'example' => route('placeholder', ['width' => 50, 'height' => 50]),
    ]);
});
Route::middleware('cache.headers:public;etag')->group(function () {
    Route::get('/placeholder/{width}x{height}', function (int $width, int $height) {
        if (!$img = imagecreatetruecolor($width, $height)) {
            abort();
        }
        $textColour = imagecolorallocate($img, 255, 255, 255);
        imagestring($img, 1, 5, 5, "$width X $height", $textColour);
        ob_start();
        imagepng($img);
        $file = ob_get_contents();
        ob_end_clean();
        return response()->make($file, 200, [
            'Content-type' => 'image/png'
        ]);
    })->where(['width' => '[0-9]+', 'height' => '[0-9]+'])
      ->name('placeholder')
      ->middleware(['validate.images', 'cache.images']);
});
