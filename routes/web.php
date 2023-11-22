<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Auth\ForgotPasswordController;

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

Route::get('/', function () {
    return view('root');
})->name('root');

Auth::routes();

// Route::get('/', 'HomeController@redirectAdmin')->name('index');
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Admin routes
 */
// Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', 'Backend\DashboardController@index')->name('admin.dashboard');
    Route::resource('roles', 'Backend\RolesController', ['names' => 'admin.roles']);
    Route::resource('users', 'Backend\UsersController', ['names' => 'admin.users']);
    Route::resource('admins', 'Backend\AdminsController', ['names' => 'admin.admins']);
    Route::get('transaction/manage', 'Backend\AdminsController@manageTransactions')->name('admin.admins.manage_transaction');
    Route::get('{id}/transaction/list', 'Backend\AdminsController@listTransactions')->name('admin.admins.list_transaction');
    Route::post('transaction/create', 'Backend\AdminsController@createTransactions')->name('admin.admins.create_transaction');
    Route::post('transaction/update', 'Backend\AdminsController@updateTransactions')->name('admin.admins.update_transaction');


    // Login Routes
    Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name('admin.logout.submit');

    // Forget Password Routes
    Route::get('/password/reset', 'Backend\Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset/submit', 'Backend\Auth\ForgetPasswordController@reset')->name('admin.password.update');
// });
