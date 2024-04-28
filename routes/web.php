<?php

use App\Http\Controllers\QueryController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CrudController;

// controllers for vue routes will be listed here

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register')
    ]);
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $videos = \App\Models\History::where('user_id', auth()->user()->id)->get();

        return Inertia::render('Dashboard', ['videos' => $videos]);
    })->name('dashboard');
    Route::post('/query', [QueryController::class, "handleQuery"]);
    Route::delete('/dashboard/videos/{id}', [CrudController::class, 'deleteVideo']);
});