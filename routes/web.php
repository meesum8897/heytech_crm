<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\CompanyController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::middleware('auth')->group(function () {
/* Employee Routes */
Route::get('/employee',[EmployeesController::class,('index')])->name('employee');
Route::get('/employee/create',[EmployeesController::class,('create')])->name('employeecreate');
Route::get('/employee/update/{id}',[EmployeesController::class,('update')]);
Route::post('/createemployee',[EmployeesController::class,('store')])->name('addemployee');
Route::post('/employee/update',[EmployeesController::class,('edit')])->name('updateemployee');
Route::get('/employee/delete/{id}',[EmployeesController::class,('destroy')]);
/* Employee Routes Ended */


/* Company Routes */
Route::get('/company',[CompanyController::class,('index')])->name('company');
Route::get('/company/create',[CompanyController::class,('create')])->name('companycreate');
Route::get('/company/update/{id}',[CompanyController::class,('update')]);
Route::post('/company',[CompanyController::class,('store')])->name('addcompany');
Route::post('/company/update',[CompanyController::class,('edit')])->name('updatecompany');
Route::get('/company/delete/{id}',[CompanyController::class,('destroy')]);
/* Company Routes Ended */
});

/* Company Routes */
