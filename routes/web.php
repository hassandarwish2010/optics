<?php

// User routes
//Landing page
Route::get('/', 'Web\LandingController@index')->name('landing');

// About page
Route::get('/about/{permalink}', 'Web\AboutController@index')->name('about');

// Stores page
Route::get('/stores', 'Web\StoresController@index')->name('stores');

// Products page
Route::get('/products', 'Web\ProductsController@index')->name('products');
// Products page
Route::get('/contact_lenses', 'Web\contactLensesController@index')->name('contact_lenses');

// Contact submit
Route::get('contact', 'Web\ContactController@index')->name('contact.get');
Route::post('contact', 'Web\ContactController@submit')->name('contact');

//Admin routes
Route::prefix('admin-panel')->group(function () {

  //Auth routes
  Route::get('/', 'Auth\LoginController@showLoginForm')->name('home.login');
  Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
  Route::post('login', 'Auth\LoginController@login');
  Route::post('logout', 'Auth\LoginController@logout')->name('logout');

  // Password Reset Routes...
  Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
  Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
  Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
  Route::post('password/reset', 'Auth\ResetPasswordController@reset');


  Route::middleware('auth')->group(function () {
    //Dashboard
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::get('/', 'Admin\DashboardController@index')->name('admin.home');

    //Admins
    Route::resource('/admins', 'Admin\AdminsController', ['except' => ['show']]);

    //Categories
    Route::resource('/categories', 'Admin\CategoriesController', ['except' => ['show']]);

    //Brands
    Route::resource('/brands', 'Admin\BrandsController', ['except' => ['show']]);

    //Products
    Route::resource('/products', 'Admin\ProductsController', ['except' => ['show']]);
    //contact_lenses
    Route::resource('/contact_lenses', 'Admin\LensesController', ['except' => ['show']]);

    //Stores
    Route::resource('/stores', 'Admin\StoresController', ['except' => ['show']]);

    //Products gallery
    Route::get('/product-gallery/{product_id}/show', 'Admin\ProductGalleryController@show')->name('show.product.gallery');
    Route::get('/product-gallery/{product_id}/create', 'Admin\ProductGalleryController@create')->name('create.product.gallery');
    Route::post('/product-gallery/{product_id}/store', 'Admin\ProductGalleryController@store')->name('store.product.gallery');
    Route::delete('/product-gallery/{image_id}/destroy', 'Admin\ProductGalleryController@destroy')->name('destroy.product.gallery');

    //Banners
    Route::resource('/banners', 'Admin\BannersController', ['except' => ['show']]);

    //Agents
    Route::resource('/agents', 'Admin\AgentsController', ['except' => ['show']]);

    //Jobs
    Route::resource('/jobs', 'Admin\JobsController', ['except' => ['show']]);

    //News
    Route::resource('/news', 'Admin\NewsController', ['except' => ['show']]);

    //Settings
    Route::get('/setting', 'Admin\SettingController@index')->name('setting.index');
    Route::put('/setting', 'Admin\SettingController@update')->name('setting.update');

    //Mails
    Route::resource('{status}/mails', 'Admin\MailsController', ['except' => ['create', 'edit', 'update', 'store']]);
    Route::post('/mails/{mail_id}/reply', 'Admin\MailsController@reply')->name('mails.reply');

    //Pages
    Route::resource('/about', 'Admin\AboutController', ['except' => ['show']]);

    // Profile page
    Route::get('/profile', 'Admin\ProfileController@get')->name('admin.get.profile');
    Route::post('/profile', 'Admin\ProfileController@save')->name('admin.profile.save');
  });
});
