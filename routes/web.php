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

/*Route::get('/', function () {
    return view('welcome');
})->name('home');*/

Route::get('/', 'HomeController@carlistview')->name('home');
/*Route::get('/newlogin', function () {
    return view('CustAuth.login');
});

Route::get('/newregister', function () {
    return view('CustAuth.register');
});


Route::get('/newregister', function () {
    return view('CustAuth.register');
});

Route::get('/list', function () {
    return view('CustAuth.register');
});
*/

/*Auth::routes();*/

Route::get('/manufacturer', 'HomeController@addmanufacturer')->name('manufacturer');
Route::post('/manufacturer', 'HomeController@storemanufacturer')->name('manufacturerpost');

Route::get('/carmodel', 'HomeController@addmodelview')->name('carmodel');
Route::post('/carmodel', 'HomeController@addmodel')->name('modeldetailspost');

Route::get('/carlist', 'HomeController@carlistview')->name('carlist');

Route::get('/cardetails/{id}', 'HomeController@carlistdetailsview')->name('cardetails_view');
Route::get('/cardupdate/{id}', 'HomeController@carupdateview')->name('carupdate');
Route::post('/updatemodel/{id}', 'HomeController@updatemodel')->name('updatemodel');
Route::get('/cardelete/{id}', 'HomeController@deletemodel')->name('deletemodel');






