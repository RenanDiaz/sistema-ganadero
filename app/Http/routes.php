<?php
    //Rutas de la aplicacion...

Route::get('/', 'PagesController@index'); //index

Route::get('stock','PagesController@stock');//cattle stock

Route::get('supplies','PagesController@supplies'); //supplies stock
