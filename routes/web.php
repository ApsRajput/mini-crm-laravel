<?php

use Illuminate\Support\Facades\Route;

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
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(array('middleware' => 'auth'), function()
{
    // Employee Routes
    Route::get('/employee/index', 'EmployeeController@index')->name('employee.index');
    Route::get('/employee/create', 'EmployeeController@create')->name('employee.create');
    Route::post('/employee/store', 'EmployeeController@store')->name('employee.store');
    Route::get('/employee/show/{id}', 'EmployeeController@show')->name('employee.show');
    Route::get('/employee/edit/{id}', 'EmployeeController@edit')->name('employee.edit');
    Route::patch('/employee/update/{id}', 'EmployeeController@update')->name('employee.update');
    Route::delete('/employee/delete/{id}', 'EmployeeController@destroy')->name('employee.destroy');

    // Export Employee Data
    Route::get('export', 'EmployeeController@export')->name('export');

    // Company Routes
    Route::get('/company/index', 'CompanyController@index')->name('company.index');
    Route::get('/company/create', 'CompanyController@create')->name('company.create');
    Route::post('/company/store', 'CompanyController@store')->name('company.store');
    Route::get('/company/show/{id}', 'CompanyController@show')->name('company.show');
    Route::get('/company/edit/{id}', 'CompanyController@edit')->name('company.edit');
    Route::post('/company/update/{id}', 'CompanyController@update')->name('company.update');
    Route::delete('/company/delete/{id}', 'CompanyController@destroy')->name('company.destroy');

    // Search
    Route::post('/search', 'HomeController@search')->name('search');

    Route::get('datatables', [
        'uses' => 'HomeController@datatables',
        'as' => 'employee-list'
    ]);
});