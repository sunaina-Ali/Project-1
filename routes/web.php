<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/company', [UserController::class, 'company'])->name('company');
Route::get('/employe', [UserController::class, 'employe'])->name('employe');

//Company
Route::get('/companyIndex', [CompanyController::class, 'companyIndex'])->name('companyIndex');
Route::get('/companyCreate', [CompanyController::class, 'companyCreate'])->name('companyCreate');
Route::post('/companyStore', [CompanyController::class, 'companyStore'])->name('companyStore');
Route::get('/companyRead', [CompanyController::class, 'companyRead'])->name('companyRead');
Route::get('/companyEdit/{id}', [CompanyController::class, 'companyEdit'])->name('companyEdit');
Route::put('/companyUpdate/{id}', [CompanyController::class, 'companyUpdate'])->name('companyUpdate');
Route::delete('/companyDelete/{id}', [CompanyController::class, 'companyDelete'])->name('companyDelete');
Route::get('/companyView/{id}', [CompanyController::class, 'companyView'])->name('companyView');

//Employee
Route::get('/employeeIndex', [EmployeeController::class, 'employeeIndex'])->name('employeeIndex');
Route::get('/employeeCreate', [EmployeeController::class, 'employeeCreate'])->name('employeeCreate');
Route::post('/employeeStore', [EmployeeController::class, 'employeeStore'])->name('employeeStore');
Route::get('/employeeRead', [EmployeeController::class, 'employeeRead'])->name('employeeRead');
Route::get('/employeeEdit/{id}', [EmployeeController::class, 'employeeEdit'])->name('employeeEdit');
Route::put('/employeeUpdate/{id}', [EmployeeController::class, 'employeeUpdate'])->name('employeeUpdate');
Route::delete('/employeeDelete/{id}', [EmployeeController::class, 'employeeDelete'])->name('employeeDelete');
Route::get('/employeeView/{id}', [EmployeeController::class, 'employeeView'])->name('employeeView');
