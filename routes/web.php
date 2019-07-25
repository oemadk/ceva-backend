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

Route::get('importExport', 'MaatwebsiteDemoController@importExport');
Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
Route::post('importExcel', 'MaatwebsiteDemoController@openingBalanceUpload');
Route::post('importExcel2', 'MaatwebsiteDemoController@collectionUpload');
Route::post('importExcel3', 'MaatwebsiteDemoController@discountUpload');
Route::post('importExcel4', 'MaatwebsiteDemoController@invoicesBalance');
Route::post('importExcel5', 'MaatwebsiteDemoController@endingBalance');
Route::get('makestatement', 'MaatwebsiteDemoController@makeStatements');
Route::get('show/statement', 'MaatwebsiteDemoController@showstatement');
Route::get('send/sms', 'MaatwebsiteDemoController@sendSMS');
