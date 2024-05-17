<?php

use App\Events\CommandEvent;
use Illuminate\Http\Request;
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
    // admin
    return view('admin');
});

Route::post('/', function (Request $request) {
    $req = $request->all();
    //  trigger event
    event(new CommandEvent([
        'channel' => $req['channel'],
        'room' => $req['room'],
        'command' => $req['command']
    ]));

    return response()->json(['status' => true]);
});


Route::get('client', function () {
    // client
    return view('client');
});
