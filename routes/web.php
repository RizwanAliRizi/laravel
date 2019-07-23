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

Auth::routes(['verify' => true]);

Route::get('profile',function(){})->middleware('verified');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/company','CompanyController@index')->name('register_company');
Route::post('/register_company','CompanyController@store')->name('savingcompany');
Route::get('/customer','CustomerController@index')->name('register_customer');
Route::post('/register_customer','CustomerController@store')->name('savingData')->middleware('customer');

//displaying record

Route::get('/display_customer','CustomerController@showcustomer')->name('allcustomer');
Route::get('/display_company','CompanyController@showcompany')->name('allcompanies');


Route::get('/company_customer/{id}','CompanyController@company_customer')->name('company_customer');



// Route::get('/customerDetails/{id}','CustomerController@customerDetails')->name('customerDetails');

Route::get('/editCustomer/{id}', 'CustomerController@edit')->name('edit_cutomer');

//update Customer and delete
Route::post('/updateCustomer','CustomerController@updateCustomer');
Route::get('/deleteCutomer/{id}','CustomerController@deleteCutomer');


//many to many 
 Route::get('/product_form','ProductController@index')->name('product_form');

 //get all products
 Route::get('/all_products','ProductController@show')->name('allproducts');

 Route::post('/createProduct','ProductController@create')->name('saveProduct');

 //Socialite

 Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');



//role permission

Route::get('/grant_permission','PermissionController@index');
Route::get('/assign_role','RoleController@index');

Route::get('/userToAssignRole/{name}','RoleController@assign');
Route::post('/AssigningRolesPermissions/{username}','RoleController@storeRolePermission');
