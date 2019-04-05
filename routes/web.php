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
Route::view('success', 'layout.success')->name('success');

Route::resource('announcement', 'AnnouncementController');
    Route::patch('/announcement/updatefile/{annFile}', 'AnnouncementController@updatefile')->name('announcement.updatefile');
    Route::post('/announcement/deleted', 'AnnouncementController@deleted')->name('announcement.deleted');
    Route::get('/announcement/deleted/get', 'AnnouncementController@deleted')->name('announcement.deleted.get');
    Route::post('/announcement/{announcement}/restore', 'AnnouncementController@restore')->name('announcement.restore');
    Route::delete('/announcement/{announcement}/forcedelete', 'AnnouncementController@forcedelete')->name('announcement.forcedelete');

Route::resource('contactus', 'ContactusController');
Route::resource('facility', 'FacilityController');

Route::resource('manage', 'ManageController');
    Route::post('/manage/readed', 'ManageController@readed')->name('manage.readed');
    Route::get('/manage/readed/get', 'ManageController@readed')->name('manage.readed.get');
    Route::post('/manage/{manage}/restore', 'ManageController@restore')->name('manage.restore');
    Route::delete('/manage/{manage}/forcedelete', 'ManageController@forcedelete')->name('manage.forcedelete');

Route::get('/myaccount', 'MyaccountController@index')->name('myaccount.index');
    Route::patch('/myaccount/{myaccount}/firstupdate', 'MyaccountController@firstupdate')->name('myaccount.firstupdate');
    Route::patch('/myaccount/{myaccount}/lastupdate', 'MyaccountController@lastupdate')->name('myaccount.lastupdate');

// Route::view('/', 'layout.home')->name('layout.home');
Route::view('/extracurricular', 'layout.extracurricular')->name('layout.extracurricular');
Route::view('/history', 'layout.history')->name('layout.history');
Route::view('/edufair', 'layout.edufair')->name('layout.edufair');

Route::get('/promnight', 'PromnightController@male')->name('promnight.male');
Route::get('/promnight/female', 'PromnightController@female')->name('promnight.female');
    Route::get('/', 'PromnightController@male');
    Route::post('/promnight/store', 'PromnightController@store')->name('promnight.store');
    Route::post('/promnight/vote/male', 'PromnightController@votemale')->name('promnight.votemale');
    Route::post('/promnight/vote/female', 'PromnightController@votefemale')->name('promnight.votefemale');
    Route::get('/promnight/admin', 'PromnightController@admin')->name('promnight.admin');
    Route::view('success/male', 'layout.promnight.successmale')->name('success.male');
    Route::view('success/female', 'layout.promnight.successfemale')->name('success.female');
    Route::delete('/promnight/{id}', 'PromnightController@destroy')->name('promnight.destroy');


// Route::get('/home', 'HomeController@index')->name('home');
