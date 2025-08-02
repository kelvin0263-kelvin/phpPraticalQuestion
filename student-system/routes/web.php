<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController; 
Route::get('/', [PageController::class, 'home']); 

Route::get('/register', [PageController::class, 'showForm']); 
Route::post('/register', [PageController::class, 'handleForm']); 
Route::get('/students', [PageController::class, 'listStudents']); 

// Route::get('/', function () {
//     //return view('welcome');
//       return view('home');
// });
