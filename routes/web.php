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

Route::get('couponSes', 'CartController@couponSes')->name('couponSes');
Route::post('/cart/{id}', 'CartController@addToCart')->name('addToCart');
Route::get('/getCart', 'CartController@getCart')->name('getCart');
Route::post('/update_cart/{id}', 'CartController@update_cart')->name('update_cart');
Route::post('/cartAdd/{id}', 'CartController@cartAdd')->name('cartAdd');
Route::post('/flashCart/{id}', 'CartController@flashCart')->name('flashCart');
Route::get('/getCartProduct', 'CartController@getCartProduct')->name('getCartProduct');
Route::get('/cart_total', 'CartController@cart_total')->name('cart_total');
Route::get('/cart_count', 'CartController@cart_count')->name('cart_count');

Route::post('cash_delivery', 'PaymentController@cash_delivery')->name('cash_delivery');


Route::get('/', 'HomeController@perfectfit')->name('perfectfit');
Route::get('/admin/dashboard', 'HomeController@index')->name('home');

Auth::routes();



Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('products', 'ProductController');
Route::resource('sales', 'SaleController');
Route::resource('clients', 'ClientController');
Route::resource('groups', 'GroupController');
Route::resource('drawers', 'DrawerController');
Route::resource('discounts', 'OfferController');
Route::resource('variants', 'VariantController');
Route::resource('sku', 'SkuController');
Route::resource('menu', 'MenuController');
Route::resource('categories', 'CategoryController');
Route::resource('subcategories', 'SubcategoryController');
Route::resource('brands', 'BrandController');
Route::resource('images', 'ImageController');
Route::resource('slider', 'SliderController');
Route::resource('currencies', 'CurrencyController');


Route::post('/search_category/{search}', 'CategoryController@search_category')->name('search_category');
Route::post('/search_menu/{search}', 'MenuController@search_menu')->name('search_menu');


Route::post('/filter_products', 'ProductController@filter_products')->name('filter_products');

Route::group(['middleware' => ['auth:admin']], function () {

    // Route::get('/admin', function () {
    //     return redirect('/admin/dashboard');
    // });
    // Dashboard
    Route::any('user_count', 'DashboardController@user_count')->name('user_count');
    Route::any('school_count', 'DashboardController@school_count')->name('school_count');
    Route::any('week_sales_count', 'DashboardController@week_sales_count')->name('week_sales_count');
    Route::any('sellers_count', 'DashboardController@sellers_count')->name('sellers_count');
    Route::any('total_sales_count', 'DashboardController@total_sales_count')->name('total_sales_count');

    // Charts
    Route::any('schools_chart', 'DashboardController@schools_chart')->name('schools_chart');
    Route::any('sellers_chart', 'DashboardController@sellers_chart')->name('sellers_chart');
    Route::any('sales_chart', 'DashboardController@sales_chart')->name('sales_chart');



    Route::resource('shipping', 'ShippingaddressController');
    Route::resource('billing', 'BillingaddressController');
});
