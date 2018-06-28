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

// Route::get('test', function()
//     {
//         $user = new App\User;
//         $user->name = 'Ako';
//         $user->email = 'Ako@Algo.com';
//         $user->password = bcrypt('Ako1234');
//         $user->save();
//         return $user;
//     }
// );


Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home'])->middleware('example'); //Esta linea declara la ruta a mostrar usando un controlador


//Route::get('contactos', ['as' => 'contactos','uses' => 'PagesController@contact']);
//Route::post('contactos', 'PagesController@mensajes');

//Se eliminan estas rutas porque ya están definidas en el metodo resource
Route::get('saludos/{nombre?}', ['as' => 'saludos', 'uses' => 'PagesController@saludo'])->where('nombre', "[A-Za-z]+");
Route::resource('mensajes', 'MessagesController');

//--------------Rutas que fueron remplasadas por el metodo resource
// Route::get('mensajes', ['as' => 'messages.index', 'uses' => 'MessagesController@index']);
// Route::get('mensajes/create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
// Route::post('mensajes', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
// Route::get('mensajes/{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
// Route::get('mensajes/{id}/edit', ['as' => 'messages.edit', 'uses' => 'MessagesController@edit']);
// Route::put('mensajes/{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
// Route::delete('mensajes/{id}', ['as' => 'messages.destroy', 'uses' => 'MessagesController@destroy']);

Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('login');