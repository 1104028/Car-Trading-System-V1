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

Route::get('/', 'HomeController@Index')->name('index');
Route::get('/buy/{CompanyID}/{BodyType}/{YearMin}/{YearMax}/{PriceMin}/{PriceMax}', 'HomeController@Buy')->name('buy');
Route::get('/About', 'HomeController@About')->name('About');
Route::get('/Contact', 'HomeController@Contact')->name('Contact');
Route::post('/Contact', 'HomeController@ContactPost')->name('ContactPost');
Route::get('/CarDetails/{carid}', 'HomeController@CarDetails')->name('CarDetails');
Route::get('/GetQuotaion/{carid}', 'HomeController@GetQuotaion')->name('GetQuotaion');
Route::post('/GetQuotaion', 'HomeController@GetQuotaionPost')->name('GetQuotaionPost');
Route::get('/Paybill', 'HomeController@Paybill')->name('Paybill');
Route::get('/BankTransaction', 'HomeController@BankTransaction')->name('BankTransaction');
Route::post('/BankTransaction', 'HomeController@BankTransactionPost')->name('BankTransactionPost');

Auth::routes();

Route::post('/brandlist', 'JsonResultsController@BrandList')->name('brandlist');
Route::post('/modellist', 'JsonResultsController@ModelList')->name('modellist');
Route::post('/seaportlist', 'JsonResultsController@SeaPortList')->name('seaportlist');
Route::post('/verificationcode', 'JsonResultsController@VerificationCode')->name('verificationcode');
Route::post('/modelexist', 'JsonResultsController@IsModelNameExists')->name('modelexist');
Route::post('/clientip', 'JsonResultsController@ClientInformation')->name('clientip');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('/admin', 'AdminController@Index')->name('adminindex');

    Route::resource('emailconfigurations', 'EmailController');
    Route::resource('clientinfo', 'CompanyInformation');

    Route::get('/registration', 'AdminController@Create')->name('registration');
    Route::post('/registration', 'AdminController@Store')->name('registrationpost');

    Route::resource('bodytype', 'BodyTypeController');
    Route::resource('car', 'ModelController');
    Route::get('/addcarimage/{modelid}', 'ModelController@AddModelImage')->name('modelimageadd');
    Route::post('/addcarimage', 'ModelController@AddModelImagesPost')->name('modelimagepost');

    Route::resource('contacts', 'ContactsController');
    Route::resource('bestseller', 'BestSellerController');
    Route::resource('latestcar', 'LatestCarController');
    Route::resource('order', 'OrderController');
    Route::resource('brand', 'BrandController');
    Route::resource('company', 'CompanyController');
    Route::resource('country', 'CountryController');
    Route::resource('seaport', 'SeaPortController');

    Route::get('/invoice/{oderid}', 'OrderController@Invoice')->name('invoice');
    Route::post('/invoice', 'OrderController@InvoicePost')->name('invoicepost');

});
