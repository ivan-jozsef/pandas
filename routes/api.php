<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PandaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("/pandas", [PandaController::class, 'index'])->name('pandas.index');
Route::get("/pandas/{panda}",[PandaController::class,"show"])->name("pandas.show");
Route::post("/pandas", [PandaController::class, 'store'])->name('pandas.store');
Route::put("/pandas/{panda}", [PandaController::class, 'update'])->name('pandas.update');
Route::delete("/pandas/{panda}", [PandaController::class, 'destroy'])->name('pandas.destroy');
