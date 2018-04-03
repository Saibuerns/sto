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
Route::group(['prefix' => 'entidades'], function () {
    Route::get('/', 'EntityController@index')->name('entity.index');
    Route::get('/nueva', 'EntityController@create')->name('entity.create');
    Route::post('/guardar', 'EntityController@store')->name('entity.store');
    Route::get('/{idEntity}/editar', 'EntityController@edit')->name('entity.edit');
    Route::put('/{idEntity}/actualizar', 'EntityController@update')->name('entity.update');
    Route::delete('/{idEntity}/baja', 'EntityController@delete')->name('entity.delete');

});
Route::group(['prefix' => 'subentidades'], function () {
    Route::get('/', 'SubEntityController@index')->name('subentity.index');
    Route::get('/nueva/{idEntity?}', 'SubEntityController@create')->name('subentity.create');
    Route::post('/guardar', 'SubEntityController@store')->name('subentity.store');
    Route::get('/{idSubEntity}', 'SubEntityController@show')->name('subentity.show');
    Route::get('/{idSubEntity}/editar', 'SubEntityController@edit')->name('subentity.edit');
    Route::put('/{idSubEntity}/actualizar', 'SubEntityController@update')->name('subentity.update');
});
Route::group(['prefix' => 'prefixs'], function () {
    Route::get('/nuevo', 'PrefixController@create')->name('prefix.create');
    Route::post('/guardar', 'PrefixController@store')->name('prefix.store');
    Route::get('/{idPrefix}/editar', 'PrefixController@edit')->name('prefix.edit');
    Route::put('/{idPrefix}/actualizar', 'PrefixController@update')->name('prefix.update');
    Route::delete('/{idPrefix}/eliminar', 'PrefixController@delete')->name('prefix.delete');
});
Route::group(['prefix' => 'boxes'], function () {
    Route::get('/nuevo', 'BoxController@create')->name('box.create');
    Route::post('/guardar', 'BoxController@store')->name('box.store');
    Route::get('/{idBox}/editar', 'BoxController@edit')->name('box.edit');
    Route::put('/{idBox}/actualizar', 'BoxController@update')->name('box.update');
    Route::delete('/{idBox}/eliminar', 'BoxController@delete')->name('box.delete');
});
Route::group(['prefix' => 'numeros'], function () {
    Route::get('/entidades', 'NumberController@create')->name('number.create1');
    Route::get('{idEntity}/subentidades', 'NumberController@create2')->name('number.create2');
    Route::get('{idSubEntity}/nuevo', 'NumberController@store')->name('number.store');
});
Route::group(['prefix' => 'components'], function () {
    Route::get('{idEntity}/subentitys', 'SubEntityController@getSubEntitys');
    Route::get('{idSubEntity}/boxes', 'BoxController@getBoxes');
    Route::get('subentitys/{idSubEntity}/prefixs/{prefix}/exist', 'PrefixController@getPrefixByPrefix');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
