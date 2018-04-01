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
    Route::group(['prefix' => '{idEntity}/subentidades'], function () {
        Route::get('/nueva', 'SubEntityController@create')->name('entity.subentity.create');
        Route::post('/guardar', 'SubEntityController@store')->name('entity.subentity.store');
        Route::get('/{idSubEntity}', 'SubEntityController@show')->name('entity.subentity.show');
        Route::get('/{idSubEntity}/editar', 'SubEntityController@edit')->name('entity.subentity.edit');
        Route::put('/{idSubEntity}/actualizar', 'SubEntityController@update')->name('entity.subentity.update');
        Route::group(['prefix' => '{idSubEntity}/prefixs'], function () {
            Route::get('/nuevo', 'PrefixController@create')->name('entity.subentity.prefix.create');
            Route::post('/guardar', 'PrefixController@store')->name('entity.subentity.prefix.store');
            Route::get('/{idPrefix}/editar', 'PrefixController@edit')->name('entity.subentity.prefix.edit');
            Route::put('/{idPrefix}/actualizar', 'PrefixController@update')->name('entity.subentity.prefix.update');
        });
        Route::group(['prefix' => '{idSubEntity}/boxes'], function () {
            Route::get('/nuevo', 'BoxController@create')->name('entity.subentity.box.create');
            Route::post('/guardar', 'BoxController@store')->name('entity.subentity.box.store');
            Route::get('/{idBox}/editar', 'BoxController@edit')->name('entity.subentity.box.edit');
            Route::put('/{idBox}/actualizar', 'BoxController@update')->name('entity.subentity.box.update');
        });
    });
});
