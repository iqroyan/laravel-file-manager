<?php

Route::name('fileManager.')->prefix('file-manager/')->group(function () {
    Route::get('', 'Esmaily\FileManager\Controllers\FileController@index')->name('index');
    Route::post('rename', 'Esmaily\FileManager\Controllers\FileController@rename')->name('rename');
    Route::post('move', 'Esmaily\FileManager\Controllers\FileController@move')->name('move');
# Files routes
    Route::get('upload', 'Esmaily\FileManager\Controllers\FileController@upload')->name('upload');
    Route::get('edit/{name}/{path?}', 'Esmaily\FileManager\Controllers\FileController@edit')->name('edit');
    Route::get('show/{name}/{path?}', 'Esmaily\FileManager\Controllers\FileController@show')->name('show');
    Route::post('file/store', 'Esmaily\FileManager\Controllers\FileController@store')->name('file.store');
    Route::put('update', 'Esmaily\FileManager\Controllers\FileController@update')->name('update');
    Route::post('upload', 'Esmaily\FileManager\Controllers\FileController@upload')->name('upload');
    Route::delete('file/destroy/{file}', 'Esmaily\FileManager\Controllers\FileController@destroy')->name('file.destroy');
    Route::post('addWaterMark', 'Esmaily\FileManager\Controllers\FileController@addWaterMark')->name('addWaterMark');
    Route::post('download', 'Esmaily\FileManager\Controllers\FileController@download')->name('download');
#Directory Routes
    Route::post('directory/store', 'Esmaily\FileManager\Controllers\DirectoryController@store')->name('directory.store');
    Route::delete('directory/destroy/{directory}', 'Esmaily\FileManager\Controllers\DirectoryController@destroy')->name('directory.destroy');
});