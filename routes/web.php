<?php

// www.misitio.com = Route::get('/');
// www.misitio.com/contacto = Route::get('contacto', function(){});



// Route::get('/', ['as' => 'home', function() Esta forma es como se declaran las rutas de navegación sin usar los controladores
// 	{
// 		// echo "<a href=". route('contactanos'), ">Contacto</a><br>";
// 		// echo "<a href=". route('contactanos'), ">Contacto</a><br>";
// 		// echo "<a href=". route('contactanos'), ">Contacto</a><br>";
// 		// echo "<a href=". route('contactanos'), ">Contacto</a><br>";
// 		// echo "<a href=". route('contactanos'), ">Contacto</a><br>";
// 		return view('home');

// 	}]);

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']); //Esta linea declara la ruta a mostrar usando un controlador


Route::get('contactos', ['as' => 'contactos','uses' => 'PagesController@contact']);


Route::get('saludos/{nombre?}', ['as' => 'saludos', 'uses' => 'PagesController@saludo'])->where('nombre', "[A-Za-z]+");