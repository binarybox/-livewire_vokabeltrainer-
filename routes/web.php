<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

// Route::get('artisan/{command}', function($command){
//     try{
//       $artisan = Artisan::call(str_replace("_", " ", $command));
//       $output = Artisan::output();
//       return str_replace("\n", "</br>", $output);
//     }
//     catch (Exception $e) {
//       $artisan = Artisan::call("list");
//       $output = Artisan::output();
//       $error = str_replace("\n", "</br>", $e);
//       return $error . "<br><br><br>" . str_replace("\n", "</br>", $output);
//     }
//   });


Route::get("/login", \App\Http\Livewire\Login::class)->name("login");
Route::get("/register", \App\Http\Livewire\Register::class)->name("register");

Route::get("/logout", [\App\Http\Controllers\PublicController::class, "logout"])->name("logout");

Route::middleware("auth")->group(function () {
    Route::get('/vokabels', \App\Http\Livewire\Vokabels\AddVokabel::class)->name("list.vokabel");

    Route::get('/stats', \App\Http\Livewire\Stats::class)->name("stats");
    Route::get("/", \App\Http\Livewire\Vokabels\RandomVokabel::class)->name("random.vokabel");
    Route::get("/numbers", \App\Http\Livewire\Numbers\RandomNumbers::class)->name("random.number");
});
