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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/', function () {
    return view('layouts.master2');
}); */

Auth::routes();
Route::get('change-password', 'Auth\ChangePasswordController@index');
Route::post('change-password', 'Auth\ChangePasswordController@store')->name('change.password');


Route::resource('borrow', 'BorrowController');
Route::get('/borrowsearch', 'BorrowController@search');
Route::get('/borrowdata', 'BorrowController@generatePDF');
/* Route::get('/borrowdata-pdf', 'BorrowController@generatePDF'); */

Route::resource('dashboard', 'DashboardController');

Route::resource('employee', 'EmployeeController');
Route::get('/employeesearch', 'EmployeeController@search');
Route::get('/employeedata', 'EmployeeController@getdata');
Route::get('/employeedata-pdf', 'EmployeeController@generatePDF');

Route::resource('equipments', 'EquipmentController');
Route::get('/equipmentssearch', 'EquipmentController@search');
Route::get('/equipmentsdata', 'EquipmentController@getdata');
Route::get('/equipmentsdata-pdf', 'EquipmentController@generatePDF');

Route::resource('reserve', 'ReserveController');
Route::get('/reservesearch', 'ReserveController@search');
Route::get('/reservedata', 'ReserveController@generatePDF');
/* Route::get('/reservedata-pdf', 'ReserveController@generatePDF'); */

Route::resource('rooms', 'RoomController');
Route::get('/roomssearch', 'RoomController@search');
Route::get('/roomsdata', 'RoomController@getdata');
Route::get('/roomsdata-pdf', 'RoomController@generatePDF');

Route::resource('student', 'StudentController');
Route::get('/studentssearch', 'StudentController@search');
Route::get('/studentdata', 'StudentController@getdata');
Route::get('/studentdata-pdf', 'StudentController@generatePDF');

Route::resource('users','UserController');
Route::get('/userssearch', 'UserController@search');
Route::get('/usersdata', 'UserController@getdata');
Route::get('/usersdata-pdf', 'UserController@generatePDF');

Route::resource('usertransactions', 'UserTransactionsController');


Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
    
    Route::resource('employee', 'EmployeeController');
    Route::match(['get'], '/employeesearch', 'EmployeeController@search');
    Route::match(['get'], '/employeedata', 'EmployeeController@getdata');
    Route::match(['get'], '/employeedata-pdf', 'EmployeeController@generatePDF');

    Route::resource('equipments', 'EquipmentController');
    Route::match(['get'], '/equipmentssearch', 'EquipmentController@search');
    Route::match(['get'], '/equipmentsdata', 'EquipmentController@getdata');
    Route::match(['get'], '/equipmentsdata-pdf', 'EquipmentController@generatePDF');

    Route::resource('rooms', 'RoomController');
    Route::match(['get'],'/roomssearch', 'RoomController@search');
    Route::match(['get'],'/roomsdata', 'RoomController@getdata');
    Route::match(['get'],'/roomsdata-pdf', 'RoomController@generatePDF');

    Route::resource('student', 'StudentController');
    Route::match(['get'], '/studentssearch', 'StudentController@search');
    Route::match(['get'], '/studentdata', 'StudentController@getdata');
    Route::match(['get'], '/studentdata-pdf', 'StudentController@generatePDF');

    Route::resource('users','UserController');

    
});