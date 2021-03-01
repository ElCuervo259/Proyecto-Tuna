<?php

namespace App\Http\Controllers;

use App\Models\Theatre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TheatreController extends Controller
{


    /**
    * Crea una nueva instancia del controlador
    */
   public function __construct()
   {
      //Garantiza que los métodos del controlador sean con usuario autenticado. Esto se puede hacer también en la ruta
      $this->middleware('auth');
   }


    /**
     * Metodo para mostrar los teatros
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['theatres']=Theatre::paginate(10);
            return view('theatres.index',$datos);
    }

/**
 * Metodo para filtrar los diferentes campos de la tabla
 *
 * @param Request $request
 * @return void
 */
    public function filtro(Request $request){

        $name = $request->get('buscarpor');
        $campo = $request->get('campo');

        $theatres = Theatre::where("$campo",'like',"%$name%")->paginate(10);
        
        return view('theatres.index', compact('theatres'));

    }

    /**
     * Metodo para redireccionar a la creacion
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theatres.create');
    }

    /**
     * Metodo para almacenar los teatros
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validación
      $request->validate([
        'name' => 'required|string',
        'address' => 'required|string',
        'capacidad' => 'required|integer',
     ]);


        

     //Recoger datos
     $name = $request->name;
     $address = $request->address;
     $capacidad = $request->capacidad;
    

     $theatre = new Theatre();

     $theatre->name = $name;
     $theatre->address = $address;
     $theatre->capacidad = $capacidad;

     //controlamos como muestra la vista en caso de tener imagenes almacenadas

     if($request->hasFile('image_path')){

        $theatre['image_path'] = $request->file('image_path')->store('uploads','public');
    }
     

     $theatre->save();

     return redirect()->route('dashboard')->with(['status'=>'El Teatro ha sido Creada con éxito']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Theatre  $theatre
     * @return \Illuminate\Http\Response
     */
    public function show(Theatre $theatre)
    {
        //
    }

    /**
     * Metodo para redireccioar a la edicion
     *
     * @param  \App\Models\Theatre  $theatre
     * @return \Illuminate\Http\Response
     */
    public function edit(Theatre $theatre)
    {
        return view('theatres.edit',compact('theatre'));
    }

    /**
     * Metodo para actualizar los teatros
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Theatre  $theatre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theatre $theatre)
    {
        $theatre->name = $request->name;
        $theatre->address = $request->address;
        $theatre->capacidad = $request->capacidad;

        //en caso de contener imagenes
        if($request->hasFile('image_path')){

            $theatre['image_path'] = $request->file('image_path')->store('uploads','public');
        }

        $theatre->save();

        return redirect()->route('theatres.index',['theatre'=>$theatre->id])->with(['status' => __('Has editado el teatro correctamente')]);
    }

    /**
     * Metodo para destruir 
     *
     * @param  \App\Models\Theatre  $theatre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theatre $theatre)
    {
        $theatre -> delete();

        return redirect()->route('theatres.index',['theatre'=>$theatre->id])->with(['status' => __('Has eliminado El teatro correctamente')]);

    }
}
