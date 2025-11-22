<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SecondaryController;
//Főoldal
Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

//Dokumentáció(második oldal)
Route::get('/secondary', [SecondaryController::class, 'index'])->name('secondary');

//új feladat mentése
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

//Feladat megjelölése készként
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

//feladat törlése
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');


//JSON adatok a naptárhoz
Route::get('/calendar/tasks', [TaskController::class, 'calendarFeed'])->name('tasks.calendarFeed');

//Áthúzás utáni frissítés
Route::post('/tasks/{task}/update-date', [TaskController::class, 'updateDate']);
