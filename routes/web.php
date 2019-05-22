<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/curriculum-vitae/{id}', 'CurriculumVitaeController@show')->name('curriculum-vitae');

Route::get('/curriculum-vitae/add', 'CurriculumVitaeController@create')->name('curriculum-vitae-add');

Route::get('/curriculum-vitae/edit', 'CurriculumVitaeController@edit')->name('curriculum-vitae-edit');


Route::get('/admin/login', [
    'as' => 'admin.login-form',
    'uses' => 'Auth\AdminLoginController@showLoginForm'
]);

Route::post('/admin/login', [
    'as' => 'admin.login',
    'uses' => 'Auth\AdminLoginController@login'
]);


Route::get('/admin', [
    'as' => 'administration',
//    'middleware' => ['auth:admin'],
    'middleware' => ['admin:super_admin', 'auth:admin'],
    'uses' => function () {
        return view('admin/home');
    }
]);

Route::get('/admin/company', [
    'as' => 'admin.company',
    'middleware' => ['admin:super_admin', 'auth:admin'],
    'uses' => 'CompanyController@index'
]);

Route::get('/admin/company/add', [
    'as' => 'admin.company.add',
    'middleware' => ['admin:super_admin', 'auth:admin'],
    'uses' => 'CompanyController@create'
]);

Route::get('/admin/curriculum-vitae', [
    'as' => 'admin.cv',
    'middleware' => ['admin:super_admin', 'auth:admin'],
    'uses' => 'AdminCurriculumVitaeController@index'
]);

Route::get('/admin/vacancy', [
    'as' => 'admin.vacancy',
    'middleware' => ['admin:super_admin', 'auth:admin'],
    'uses' => 'VacancyController@index'
]);

Route::get('/admin/vacancy/add', [
    'as' => 'admin.vacancy.add',
    'middleware' => ['admin:super_admin', 'auth:admin'],
    'uses' => 'VacancyController@create'
]);

Route::get('/admin/user', [
    'as' => 'admin.user',
    'middleware' => ['admin:super_admin', 'auth:admin'],
    'uses' => 'AdministratorController@index'
]);

Route::get('/admin/user/add', [
    'as' => 'admin.user.add',
    'middleware' => ['admin:super_admin', 'auth:admin'],
    'uses' => 'AdministratorController@create'
]);

Route::get('/admin/user/edit', [
    'as' => 'admin.user.edit',
    'middleware' => ['admin:super_admin', 'auth:admin'],
    'uses' => 'AdministratorController@create'
]);

Route::get('/admin/user/activity', [
    'as' => 'admin.user.activity',
    'middleware' => ['admin:super_admin', 'auth:admin'],
    'uses' => 'ActivityController@index'
]);