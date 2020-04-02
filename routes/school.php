<?php

Route::group(['namespace' => 'School'], function() {

    Route::resource('schools', 'SchoolController');


    Route::get('/', 'HomeController@index')->name('school.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('school.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('school.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('school.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('school.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('school.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('school.password.reset');

    // Must verify email
    Route::get('email/resend','Auth\VerificationController@resend')->name('school.verification.resend');
    Route::get('email/verify','Auth\VerificationController@show')->name('school.verification.notice');
    Route::get('email/verify/{id}','Auth\VerificationController@verify')->name('school.verification.verify');


    //
    Route::get('search_school/{search}', 'SchoolController@search_school')->name('search_school');


});
