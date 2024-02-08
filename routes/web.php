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

// Route::get('/', function () {
//     return view('welcome');
//     // return 'Coder\'s Tape';
// });
// Route::view('/', 'welcome');

Route::view('/', 'home')->name('index');

// Route::get('/contact', function () {
//     return view('contact');
// });

// Route::view('/contact', 'contact');

Route::get('/contact', 'ContactFormController@create')->name('contact.create');
Route::post('/contact', 'ContactFormController@store')->name('contact.store');

// Route::get('/about', function () {
//     return view('about');
// });
// Route::view('/about', 'about');
Route::view('/about', 'about')->name('about')->middleware('test');     //test the custom made middleware.

Route::get('/customers', 'CustomersController@index')->name('customers.index');
Route::get('/customers/create', 'CustomersController@create')->name('customers.create');
Route::post('/customers', 'CustomersController@store')->name('customers.store');
Route::get('/customers/{customer}', 'CustomersController@show')->name('customers.show');
Route::get('/customers/{customer}/edit', 'CustomersController@edit')->name('customers.edit');
Route::patch('/customers/{customer}', 'CustomersController@update')->name('customers.update');
Route::delete('/customers/{customer}', 'CustomersController@destroy')->name('customers.destroy');

// //replaced the multiple lines above into one line code, as long as you follow the resource naming convention.
//                                                     //use the auth middleware to locked-up customers list
// Route::resource('/customers', 'CustomersController')->middleware('auth');
// Route::resource('/customers', 'CustomersController');

Auth::routes();
//removed the name() just to provide example or a URL helpers.
Route::get('/home', 'HomeController@index')->name('home');
