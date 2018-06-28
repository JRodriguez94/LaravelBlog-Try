<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
	// protected $request;

	public function __construct()
	{
		$this->middleware('example', ['except' => ['home']]);
	} 

    public function home()
    {
		return view('home');

		//-------------- Con este bloque de codigo podemos mandar un header con tokens y cookies dento del response
		// return response('contenido de la respuesta', 201)
		// 	->header('X-TOKEN', 'secret')
		// 	->header('X-TOKEN', 'secret-2')
		// 	->cookie('X-COOKIE', 'cookie');
    }

	//---------------------------------------  Se eliminan estos metodos porque ya están definidos en el controlador MessagesController
    // public function contact()
    // {
    //     return view('contactos');
	// }
	
	// public function mensajes(\App\Http\Requests\CreateMessageRequest $request)
	// {
	// 	$data = $request->all();

	// 	return back()->with('info', 'Tu mensaje ha sido enviado correctamente (:');

	// 	//------------ Redireccionar vistas con un mensaje de información como parametro dentro de la sessión.
	// 	// return redirect()
	// 	// 	->route('contactos')
	// 	// 	->with('info', 'Tu mensaje ha sido enviado conrrectamente :)');



	// 	//return 'procesando el mensaje';
		
	// 	// if($request->has('nombre'))
	// 	// {
	// 	// 	return "Si tiene nombre. Es " . $request->input('nombre');
	// 	// }
	
	// 	// return "No tiene nombre";

	// 	//return $request->all();
	// }

    public function saludo($nombre = "Invitado")
    {
        $html = "<h2>Contenido html</h2>"; //Simula algo que ingresó el usuario mediante un formulario
		//$script = "<script>alert('Problema XSS - Coss Site Scripting!')</script>"; //esto es una simulacion de injecccion de codigo mediante un formulario.
		// return view('saludo',['nombre' => $nombre]);
		//	return view('saludo', compact('nombre')); //Esta linea hace los mismo que la linea comentada arriba

		$consolas = [
			"Play Station 4",
			"Xbox One",
			"Wii U"
		];

		$bandas = [
			// "Interpol",
			// "The war on drugs"
		];

		return view('saludo', compact('nombre', 'html', /*'script',*/'consolas','bandas'));
    }
}
