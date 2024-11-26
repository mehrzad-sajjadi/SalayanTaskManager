<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;




Route::prefix("/user")->middleware( ['auth', 'verified',IsAdmin::class])->group(function(){
    Route::get("/",[UserController::class,"index"])->name("user_index");
    Route::get("{user}/show",[UserController::class,"show"])->name("user_show");
});


Route::prefix("/task")->middleware(['auth', 'verified',IsAdmin::class])->group(function(){
    Route::get("/",[TaskController::class,"index"])->name("task_index");
    Route::get("/{id}/create",[TaskController::class,"create"])->name("task_create");
    Route::post("/",[TaskController::class,"store"])->name("task_store");
    Route::delete("/{task}/delete",[TaskController::class,"delete"])->name("task_delete");
    Route::get("/{task}/edit",[TaskController::class,"edit"])->name("task_edit");
    Route::put("/{task}/update",[TaskController::class,"update"])->name("task_update");
    Route::get("/not_done",[TaskController::class,"not_done"])->name("task_not_done");
    Route::get("/done",[TaskController::class,"done"])->name("task_done");
    Route::get("/create2",[TaskController::class,"create2"])->name("task_create2");
    Route::post("/create",[TaskController::class,"store2"])->name("task_store2");
});


Route::prefix("/response")->middleware(['auth', 'verified'])->group(function(){
    Route::get("/{id}/create",[ResponseController::class,"create"])->name("response_create");
    Route::post("/",[ResponseController::class,"store"])->name("response_store");
    Route::get("/{id}/show",[ResponseController::class,"show"])->name("response_show");
});


Route::get("/table",function(){
    return Inertia::render("table");
});














Route::get('/', function(){
    return redirect()->route("dashboard");
})->middleware(['auth', 'verified']);

Route::get('/dashboard',[DashboardController::class,"index"])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
