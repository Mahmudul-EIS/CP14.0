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
Route::get('/', 'Frontend@home')->name('home');
Route::get('/join', 'Authenticate@join');
Route::get('/sign-up/success', 'Authenticate@success');
Route::get('/sign-up/driver', 'Authenticate@registerDriver');
Route::post('/sign-up/driver', 'Authenticate@registerDriver');
Route::get('/sign-up/customer', 'Authenticate@registerCustomer');
Route::post('/sign-up/customer', 'Authenticate@registerCustomer');
Route::get('/popular', 'Frontend@popular');
Route::get('/ride-details/{id}', 'Frontend@rideDetails');

/* ------------------------------------------------------ */

/**
 * Admin area
*/
Route::prefix('admin')->group(function(){
    Route::get('/login', 'Admin@login');
    Route::get('/', 'Admin@dashboard');
    Route::get('/create-admin', 'Admin@createAdmin');
    Route::post('/create-admin', 'Admin@createAdmin');
    Route::get('/list', 'Admin@adminList');
    Route::post('/list', 'Admin@adminList');
    Route::post('/user/delete/{id}', 'Admin@deleteUser');
    Route::get('/drivers', 'Admin@driverList');
    Route::get('/create-driver', 'Admin@createDriver');
    Route::post('/create-driver', 'Admin@createDriver');
    Route::get('/customers', 'Admin@customerList');
    Route::get('/create-customers', 'Admin@createCustomer');
    Route::post('/create-customers', 'Admin@createCustomer');
    Route::get('/rides', 'Admin@rideDetails');
    Route::get('/customers/view/{id}', 'Admin@viewCustomer');
    Route::get('/drivers/view/{id}', 'Admin@viewDriver');
});

/* ------------------------------------------------------ */


/**
 * Customer area
 */
Route::prefix('c')->group(function(){
    Route::get('/profile/', 'Customer@viewProfile');
    Route::get('/profile/edit/{id}', 'Customer@editProfile');
    Route::post('/profile/edit/{id}', 'Customer@editProfile');
    Route::post('/profile/edit/password/{id}', 'Customer@editPassword');
    Route::post('/profile/edit/image/{id}', 'Customer@imageUpload');
    Route::get('/ride-details/{id}', 'Customer@rideDetails');
    Route::get('/request-ride', 'Customer@riderRequest');
    Route::post('/request-ride', ['as' => 'request_ride', 'uses' => 'Customer@riderRequest']);
    Route::get('/bookings', 'Customer@bookings');
});

/**
 * Driver area
 */
Route::prefix('d')->group(function(){
    Route::get('/profile/{id}', 'Driver@viewProfile');
    Route::get('/profile/edit/{id}', 'Driver@editProfile');
    Route::post('/profile/edit/{id}', 'Driver@editProfile');
    Route::post('/profile/edit/password/{id}', 'Driver@editPassword');
    Route::post('/profile/edit/image/{id}', 'Driver@imageUpload');
    Route::get('/offer-ride', 'Driver@offerRide');
    Route::post('/offer-ride', 'Driver@offerRide');
    Route::get('/active-offers', 'Driver@myOffers');
    Route::get ('/ride-details/{id}', 'Driver@rideDetails');
    Route::post ('/ride-details/{id}', ['as' => 'ride_details', 'uses' => 'Driver@rideDetails']);
    Route::get('/edit-ride/{id}', 'Driver@editRide');
    Route::post('/edit-ride/{id}', 'Driver@editRide');
});

/**
 * Auth routes
*/
Auth::routes();

