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

Route::get('/index', 'Controller@index');

Route::get('/getlistproduct/{id}/{cd}','ProdListingController@listproductAjax');
Route::post('/about/message', 'Controller@sendQuestion');

Route::get('/tour/{id}','TourDetailController@tourProduct');

Route::post('/tour/submit/postsubmittour','TourDetailController@submitdata');

Route::get('/download/{file}', 'DownloadController@download');

Route::get('/about', function () {
    return view('about');
});
Route::get('/wifi', function () {
    return view('wifiform');
});
Route::get('/visa', function () {
    return view('wifiform');
});
Route::get('/attraction', function () {
    return view('wifiform');
});
Route::get('/travel-insurance', function () {
    return view('wifiform');
});
Route::get('/promo', 'PromoController@promolist');

Route::get('/custom-trip', function () {
    return view('customtrip');
});
Route::get('/afterconfirm', function () {
    return view('afterconfirm');
});
Route::post('/customtrip/submit','CustomTripController@submitdata');

Route::get('/faq', function () {
    return view('faq');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/askquestion', function () {
    return view('send_email');
});
Route::get('/footer/emailsubscribe', 'Controller@emailsubscribe');

Route::get('/{id}','ProdListingController@listproduct');

Route::get('mail/send', 'MailController@send');
Route::get('/getFloor1', 'MainAjaxController@ajaxFloor1');

Route::get('/', 'Controller@index');
