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

Auth::routes();
Route::view('/login/success', 'layout.login.success');
Route::resource('achievement', 'AchievementController');
Route::resource('activity', 'ActivityController');
Route::resource('album', 'AlbumController');

Route::resource('announcement', 'AnnouncementController');
    Route::post('/announcement/deleted', 'AnnouncementController@deleted')->name('announcement.deleted');
    Route::post('/announcement/{announcement}/restore', 'AnnouncementController@restore')->name('announcement.restore');
    Route::delete('/announcement/{announcement}/forcedelete', 'AnnouncementController@forcedelete')->name('announcement.forcedelete');

Route::resource('contactus', 'ContactusController');
Route::resource('facility', 'FacilityController');

Route::resource('manage', 'ManageController');
    Route::post('/manage/readed', 'ManageController@readed')->name('manage.readed');
    Route::post('/manage/{manage}/restore', 'ManageController@restore')->name('manage.restore');
    Route::delete('/manage/{manage}/forcedelete', 'ManageController@forcedelete')->name('manage.forcedelete');

Route::get('/myaccount', 'MyaccountController@index')->name('myaccount.index');
    Route::patch('/myaccount/{myaccount}/firstupdate', 'MyaccountController@firstupdate')->name('myaccount.firstupdate');
    Route::patch('/myaccount/{myaccount}/lastupdate', 'MyaccountController@lastupdate')->name('myaccount.lastupdate');

Route::view('/', 'layout.home')->name('layout.home');
Route::view('/extracurricular', 'layout.extracurricular')->name('layout.extracurricular');
Route::view('/history', 'layout.history')->name('layout.history');

Route::get('/home', 'HomeController@index')->name('home');
