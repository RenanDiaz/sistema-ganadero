<?php
    //Rutas de la aplicacion...

Route::get('/', 'PagesController@index'); //index

Route::get('stock','PagesController@stock');//cattle stock

Route::get('create','PagesController@create');// create new cattle stock

Route::get('insert','PagesController@insert');//insert cattle query

Route::get('modify','PagesController@modify');// modify cattle stock

Route::get('update','PagesController@update'); //update cattle query

Route::get('delete','PagesController@delete');// delete cattle stock

Route::get('supplies','PagesController@supplies'); //supplies stock
