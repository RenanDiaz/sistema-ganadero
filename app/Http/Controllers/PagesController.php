<?php namespace App\Http\Controllers;


use Illuminate\Routing\Controller;

class PagesController extends Controller {

	public function index(){

        return view('pages.index');//Home page
    }

    public  function stock(){

        return view('pages.stock');//Inventario de Ganado
    }

    public function input(){

        return view('pages.input'); //Inventario de insumo
    }
}
