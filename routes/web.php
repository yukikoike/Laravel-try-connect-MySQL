<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    try {
        DB::connection()->getPdo();
        return 'Database connection is established.';
    } catch (\Exception $e) {
        Log::error('Database connection error: ' . $e->getMessage());
        return 'Failed to connect to database. Check logs for details.';
    }
    return view('welcome');
});