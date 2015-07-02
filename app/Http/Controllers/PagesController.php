<?php namespace App\Http\Controllers;


use Illuminate\Routing\Controller;
use App\Inventario_ganado;

class PagesController extends Controller {

	public function index(){

		return view('pages.index');//Home page
	}

	public  function stock(){
		return view('pages.stock');//Inventario de ganado
	}

	public function create(){
		return view('pages.create');//Crear nuevo inventario ganado
	}

	public function insert(){
		return view('pages.insert'); //insertar cattle
	}
	public function modify(){ //Modificar ganado
		return view ('pages.modify');
	}

	public function update(){
		return view('pages.update');
	}
	public function delete(){
		return view('pages.delete'); //Eliminar ganado
	}

	public function supplies(){

		return view('pages.supplies'); //Inventario de insumos
	}
}
