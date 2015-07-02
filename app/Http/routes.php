<?php
    //Rutas de la aplicacion...

Route::get('/', 'PagesController@index'); //index

Route::get('stock','PagesController@stock');//cattle stock

Route::get('create','PagesController@create');// create new cattle stock

Route::post('insert','PagesController@insert');//insert cattle query

Route::get('modify','PagesController@modify');// modify cattle stock

Route::post('update','PagesController@update'); //update cattle query

Route::get('delete','PagesController@delete');// delete cattle stock

Route::get('supplies','PagesController@supplies'); //supplies stock

Route::get('nuevo','PagesController@nuevo'); //supplies stock

Route::post('insertar','PagesController@insertar'); //insert supplies

Route::post('eliminar','PagesController@eliminar'); //insert supplies

Route::post('actualizar','PagesController@actualizar'); //insert supplies

Route::post('modificar','PagesController@modificar'); //insert supplies
