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

/**
 * Frontend area
*/
Route::get('/', 'Frontend@home');
Route::get('/join', 'Authenticate@join');
Route::get('/sign-up/success', 'Authenticate@success');
Route::get('/sign-up/driver', 'Authenticate@registerDriver');
Route::post('/sign-up/driver', 'Authenticate@registerDriver');
Route::get('/sign-up/customer', 'Authenticate@registerCustomer');
Route::post('/sign-up/customer', 'Authenticate@registerCustomer');

/* ------------------------------------------------------ */

/**
 * Admin area
*/
Route::get('/admin/login', 'Admin@login');
Route::get('/admin', 'Admin@dashboard');
Route::get('/admin/create-admin', 'Admin@createAdmin');
Route::post('/admin/create-admin', 'Admin@createAdmin');
Route::get('/admin/list', 'Admin@adminList');
Route::post('/admin/list', 'Admin@adminList');
Route::post('/admin/user/delete/{id}', 'Admin@deleteUser');
Route::get('/admin/drivers', 'Admin@driverList');
Route::get('/admin/create-driver', 'Admin@createDriver');
Route::post('/admin/create-driver', 'Admin@createDriver');
Route::get('/admin/customers', 'Admin@customerList');
Route::get('/admin/create-customers', 'Admin@createCustomer');
Route::post('/admin/create-customers', 'Admin@createCustomer');
Route::get('/admin/rides', 'Admin@rideDetails');
Route::get('/admin/customers/view/{id}', 'Admin@viewCustomer');
Route::get('/admin/drivers/view/{id}', 'Admin@viewDriver');

/* ------------------------------------------------------ */


/**
 * Customer area
 */
Route::get('c/profile', 'Customer@viewProfile');
Route::get('c/profile/edit/{id}', 'Customer@editProfile');
Route::post('c/profile/edit/{id}', 'Customer@editProfile');
Route::post('c/profile/edit/password/{id}', 'Customer@editPassword');

/**
 * Driver area
 */
Route::get('d/profile', 'Driver@viewProfile');
Route::get('d/profile/edit/{id}', 'Driver@editProfile');
Route::post('d/profile/edit/{id}', 'Driver@editProfile');
Route::post('d/profile/edit/password/{id}', 'Driver@editPassword');