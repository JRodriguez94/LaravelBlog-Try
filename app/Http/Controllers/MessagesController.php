<?php

namespace App\Http\Controllers;

use DB;
use App\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('auth', ['except' => ['create','store']]);
    }

    public function index()
    {
        //$messages = DB::table('messages')->get(); //Usando QueryBuilder
        
        $messages = Message::all(); //Usando Eloquent

        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return "Mensaje Storage";
        //return $request->all(); //Devuelve todos los datos.
        //return $request->input("nombre"); //Devuelve un campo espesifico. 

        //Guarda Mensajes con QueryParam / QueryBuilder(?)
        // DB::table('messages')->insert([

        // Asignación de datos mediante QueryBuilder
        //     "nombre" => $request->input('nombre'),
        //     "email" => $request->input('email'),
        //     "mensaje" => $request->input('mensaje'),
        //     "created_at" => Carbon::now(),
        //     "updated_at" => Carbon::now(),
        // ]);

        //Asignación de datos mediante eloquent 1 
        // $message = new Message;
        // $message->nombre = $request->input('nombre');
        // $message->email = $request->input('email');
        // $message->mensaje =$request->input('mensaje');
        // $message->save();

        //Asignación de datos mediante Eloquent 2 para datos espesificos. 
        // Message::create(
        //     [
        //         "nombre" => $request->input('nombre'),
        //         "email" => $request->input('email'),
        //         "mensaje" => $request->input('mensaje'),
        //     ]
        // );

        //dd($request->all()); // --------- Inspecciona los valores que se mandan y el proceso se para despues de esta linea (como un break)
        
        //Model::unguard();
        
        //Asignación de datos mediante Eloquent 3
        /*
            Para utilizar este metodo, se tiene que espesificar en el modelo
            los campos a solicitar (si lo dejas así te va a arrojar todos y eso eso permite
            el ingreso masivo de datos) mediante el metodo  protected $filable = ["array de elementos permitidos];
        */
        Message::create($request->all());
        //return $request; //Quitar para que funcione

        return redirect()->route('mensajes.create')->with('info', 'Hemos recibido tu mensaje');
    }
        

       

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Muestra  un usuario espsifico usando QueryBuilder
       // $message = DB::table('messages')->where('id', $id)->first();

        //Muestra a un usuario espesifico usando Eloquent
        /*
            La función findOrFail evita que el sistema de un error
            si el id proporcionado no existe. En lugar de darnos un error
            de Unfinded object, nos redirecciona ana vista de erro 404
        */
        $message = Message::findOrFail($id);

        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Muestra  un usuario espsifico usando QueryBuilder
        //$message = DB::table('messages')->where('id', $id)->first();
        
        /*
            La función findOrFail evita que el sistema de un error
            si el id proporcionado no existe. En lugar de darnos un error
            de Unfinded object, nos redirecciona ana vista de erro 404
        */

        
        $message = Message::findOrFail($id);

        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Actualizar mediante QueryBuilder
        // DB::table('messages')->where('id', $id)->update(
        // [
        //     "nombre" => $request->input('nombre'),
        //     "email" => $request->input('email'),
        //     "mensaje" => $request->input('mensaje'),
        //     "updated_at" => Carbon::now(),
        // ]);

        /*
            La función findOrFail evita que el sistema de un error
            si el id proporcionado no existe. En lugar de darnos un error
            de Unfinded object, nos redirecciona ana vista de erro 404
        */
        //dd($request->all());
        $message = Message::findOrFail($id)->update($request->all()); //Manda allamar el metodo update que recibe todo el request.



        //Redireccionar
        return redirect()->route('mensajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return "Este elemento con el id: " . $id . " será destruido";

        //Eliminar mensaje usando QueryBuilder
        //DB::table('messages')->where('id', $id)->delete();
        
        //Eliminar un mensaje usando Eloquent
        $message = Message::findOrFail($id)->delete(); //Manda allamar el metodo update que recibe todo el request.
        //Redireccionar
        return redirect()->route('mensajes.index');
    }
}
