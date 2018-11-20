<?php

Route::name('fileManager.')->prefix('file-manager/')->group(function () {
    Route::post('rename', ['as' => 'rename', 'uses' => 'FileController@rename']);
    Route::post('move', ['as' => 'move', 'uses' => 'FileController@move']);
# Files routes
    Route::group(['prefix' => 'file'], function () {
        Route::get('upload', 'file.upload');
        Route::get('/', ['as' => 'file.index', 'uses' => 'FileController@index']);
        Route::get('/edit/{name}/{path?}', ['as' => 'file.edit', 'uses' => 'FileController@edit']);
        Route::get('/show/{name}/{path?}', ['as' => 'file.show', 'uses' => 'FileController@show']);
        Route::post('/', ['as' => 'file.store', 'uses' => 'FileController@store']);
        Route::put('/update', ['as' => 'file.update', 'uses' => 'FileController@update']);
        Route::post('upload', ['as' => 'upload', 'uses' => 'FileController@upload']);
        Route::post('destroy', ['as' => 'file.destroy', 'uses' => 'FileController@destroy']);
        Route::post('addWaterMark', ['as' => 'file.addWaterMark', 'uses' => 'FileController@addWaterMark']);
        Route::post('download', ['as' => 'file.download', 'uses' => 'FileController@download']);
    });
#Directory Routes
    Route::group(['prefix' => 'directory'], function () {
        Route::post('/', ['as' => 'directory.store', 'uses' => 'DirectoryController@store']);
        Route::post('destroy', ['as' => 'directory.destroy', 'uses' => 'DirectoryController@destroy']);
    });
});