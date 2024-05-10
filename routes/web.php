<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/students/create', [HomeController::class,'create'])->name('add.student');
Route::post('/students', [HomeController::class,'store'])->name('student.store');
Route::delete('/students/{student}', [HomeController::class,'destroy'])->name('students.destroy');
Route::get('/students/{student}/edit', [HomeController::class,'edit'])->name('students.edit');
Route::put('/update-data/{id}', [HomeController::class,'update']);


