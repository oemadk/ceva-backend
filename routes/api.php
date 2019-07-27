<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



    Route::get('statements/{id}', 'MaatwebsiteDemoController@UserStatementsList');
    Route::get('user/statement/{id}/{month}', 'MaatwebsiteDemoController@getUserThings');
    Route::get('send/sms/{number}/{id}/{month}', 'MaatwebsiteDemoController@sendSMS');


Route::post('importExcel', 'MaatwebsiteDemoController@openingBalanceUpload');
Route::post('importExcel2', 'MaatwebsiteDemoController@collectionUpload');
Route::post('importExcel3', 'MaatwebsiteDemoController@discountUpload');
Route::post('importExcel4', 'MaatwebsiteDemoController@invoicesBalance');
Route::post('importExcel5', 'MaatwebsiteDemoController@endingBalance');
Route::post('importExcel6', 'MaatwebsiteDemoController@dueBalance');
Route::get('makestatements', 'MaatwebsiteDemoController@GenerateUsers');