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

Route::get('/','frontController@index');
Route::get('/contact-us','frontController@contactUs');
Route::get('/about-us','frontController@aboutUs');
Route::post('/get-messages','frontController@getMessages');
Route::get('product-details/{id}','productsController@products');
Route::get('get-product-price','productsController@getprice');
Route::get('categories/{category_id}','frontController@categories');


// Route for user login register
Route::get('/login-register','UserController@userLoginRegister');
// Route for user logout
Route::get('/user-logout','UserController@userLogout');
// Route for user registeration
Route::post('/user-register','UserController@userRegister');
// Route for user login
Route::post('/user-login','UserController@userLogin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Route for frontLogin

Route::group(['middleware' => ['frontLogin']], function(){

	// Route for accout
	Route::match(['get','post'],'/account','UserController@account');
	// Route for change password
	Route::match(['get','post'],'/change-password','UserController@changePassword');
	// Route for change address
	Route::match(['get','post'],'/change-address','UserController@changeAddress');
	// Route for checkout
	Route::match(['get','post'],'/checkout','productsController@checkout');
	// Route for add to cart
	Route::match(['get','post'],'add-cart','productsController@addToCart');
	// Route for Cart
	Route::match(['get','post'],'cart','productsController@cart');
	// Route for Remove Cart Product
	Route::match(['get','post'],'cart/remove-product/{id}','productsController@removeCartProduct');
	// Route for Update Product Quantity
	Route::match(['get','post'],'cart/update-product-quantity/{id}/{quantity}','productsController@updateProductQuantity');
	// Route for order review
	Route::match(['get','post'],'order-review','productsController@orderReview');
	// Route for Place order
	Route::match(['get','post'],'place-order','productsController@placeOrder');
	// Route for showing thanks message
	Route::get('thanks','productsController@thanks');
	Route::match(['get','post'],'stripe','productsController@stripe');
	// Route for orders
	Route::get('orders','productsController@userOrders');
	
});



Route::group(['middleware' => ['auth','admin']], function(){

// Category Route

	Route::match(['get','post'],'/admin/add-category','categoryController@addCategory');
	Route::match(['get','post'],'/admin/view-categories','categoryController@viewCategories');
	Route::match(['get','post'],'/admin/edit-category/{id}','categoryController@editCategory');
	Route::match(['get','post'],'/admin/delete-category/{id}','categoryController@deleteCategory');


// Products Route

	Route::match(['get','post'],'/admin','adminController@index');
	Route::match(['get','post'],'/admin/add-product','productsController@addProduct');
	Route::match(['get','post'],'/admin/all-products','productsController@allProducts');
	Route::match(['get','post'],'/admin/edit-product/{id}','productsController@editProduct');
	Route::match(['get','post'],'/admin/delete-product/{id}','productsController@deleteProduct');

// Add Attributes Route

	Route::match(['get','post'],'/admin/add-product-attributes/{id}','productsController@addAttributes');
	Route::match(['get','post'],'/admin/delete-product-attributes/{id}','productsController@deleteAttributes');
	Route::match(['get','post'],'/admin/edit-product-attributes/{id}','productsController@editAttributes');

// Banners Route

	Route::match(['get','post'],'/admin/add-banner','bannersController@addBanner');
	Route::match(['get','post'],'/admin/view-banners','bannersController@viewBanners');
	Route::match(['get','post'],'/admin/edit-banner/{id}','bannersController@editBanner');
	Route::match(['get','post'],'/admin/delete-banner/{id}','bannersController@deleteBanner');
// Orders Route

	Route::get('/admin/orders','productsController@viewOrders');
	Route::get('/admin/orders/{id}','productsController@viewOrdersDetails');
// Route for messages

	Route::get('/admin/users-messages','adminController@seeMessages');
});