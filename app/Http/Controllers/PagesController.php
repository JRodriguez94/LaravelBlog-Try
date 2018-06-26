<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function contact()
    {
        return view('contactos');
    }

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
