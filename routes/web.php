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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/articles/create',[
    'uses' => 'ArticlesController@create',
    'as' => 'articles.create'
]);
Route::get('article',[
    'uses' => 'ArticlesController@index',
    'as' => 'article'
]);
Route::get('article/users',[
    'uses' => 'ArticlesController@user',
    'as' => 'article.users'
]);
Route::get('author',[
    'uses' => 'ArticlesController@getArticleByUserId',
    'as' => 'article.author'
]);
Route::get('article/edit/{id}',[
    'uses' => 'ArticlesController@edit',
    'as' => 'article.edit'
]);
Route::put('article/update/{id}',[
    'uses' => 'ArticlesController@update',
    'as' => 'article.update'
]);
Route::get('article/delete/{id}',[
    'uses' => 'ArticlesController@delete',
    'as' => 'article.delete'
]);
Route::get('home',[
    'uses' => 'HomeController@index',
    'as' => 'home'
]);


