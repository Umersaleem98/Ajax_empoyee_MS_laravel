<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('employee');
});
Route::post('employee-add', [EmployeeController::class, 'employee_add']);
Route::get('employee-view', [EmployeeController::class, 'employee_view']);
Route::get('employee-delete', [EmployeeController::class, 'employee_delete']);
Route::post('employee-edit', [EmployeeController::class, 'employee_edit']);
Route::get('employee-list', [EmployeeController::class, 'employee_list']);

// Route::delete('delete-all', [EmployeeController::class, 'removeMulti']);

Route::get('search', [EmployeeController::class, 'search']);
  
Route::delete('multiple-category', [EmployeeController::class, 'deleteMultiple']);

// other routes of students 

Route::get('students', [StudentController::class, 'index']);
Route::delete('delete-all', [StudentController::class, 'removeMulti']);