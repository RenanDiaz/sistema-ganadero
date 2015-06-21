<?php namespace App\Http\Controllers;


use Illuminate\Routing\Controller;

class PagesController extends Controller {

	public function index(){

        return view('pages.index');//Home page
    }

    public  function stock(){

        return view('pages.stock');//Inventario de ganado
    }

    public function supplies(){

        return view('pages.supplies'); //Inventario de insumos
    }
}
