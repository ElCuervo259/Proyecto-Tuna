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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['theatres']=Theatre::paginate(10);
            return view('theatres.index',$datos);
    }


    public function filtro(Request $request){

        $name = $request->get('buscarpor');
        $campo = $request->get('campo');

        $theatres = Theatre::where("$campo",'like',"%$name%")->paginate(10);
        
        return view('theatres.index', compact('theatres'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theatres.create');
    }

    /**
     * Store a newly created resource in storage.
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Theatre  $theatre
     * @return \Illuminate\Http\Response
     */
    public function edit(Theatre $theatre)
    {
        return view('theatres.edit',compact('theatre'));
    }

    /**
     * Update the specified resource in storage.
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
        if($request->hasFile('image_path')){

            $theatre['image_path'] = $request->file('image_path')->store('uploads','public');
        }

        $theatre->save();

        return redirect()->route('theatres.index',['theatre'=>$theatre->id])->with(['status' => __('Has editado el teatro correctamente')]);
    }

    /**
     * Remove the specified resource from storage.
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
