<?php

namespace App\Http\Controllers;

use App\Models\Show;
use App\Models\Theatre;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    /**
     * Metodo para mostrar las actuaciones con sus respectivos grupos y teatrs
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tuna = Auth::user()->group_id;
        $rol = Auth::user()->rol;
        
        if($rol == 'Admin'){
        //ordeno por tunas
        $datos['shows']= Show::with(['group', 'theatre'])->orderBy('group_id')->paginate(10);
            return view('shows.index',$datos);

            //en caso de que un usuario visualice solo podrá ver las actuaciones en las que participa
        }else{

            $datos['shows']= Show::where('group_id',$tuna)->with(['group', 'theatre'])->orderBy('group_id')->paginate(10);
            return view('shows.index',$datos);

        }
    }

    /**
     * Metodo para filtrar los registros de las tablas
     *
     * @param Request $request
     * @return void
     */
    public function filtro(Request $request){

        $name = $request->get('buscarpor');
        $campo = $request->get('campo');

        $shows = Show::where("$campo",'like',"%$name%")->paginate(10);
        
        return view('shows.index', compact('shows'));

    }

    /**
     *Metodo para redirigir a la creacion de actucion
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Show $show)
    {
        return view('shows.create')->with(["show" => $show, "groups" => Group::all(), "theatres" =>Theatre::all()]);
    }

    /**
     * Metodo para almacenar las actuaciones
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validación
      $request->validate([
        'day' => 'required',
        'group_id' => 'required',
        'theatre_id' => 'required',
     ]);


        

     //Recoger datos
     $day = $request->day;
     $group_id = $request->group_id;
     $theatre_id = $request->theatre_id;
    

     $show = new Show();

     $show->day = $day;
     $show->group_id = $group_id;
     $show->theatre_id = $theatre_id;

     $show->save();

     return redirect()->route('dashboard')->with(['status'=>'La actuacion ha sido Creada con éxito']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function show(Show $show)
    {
        //
    }

    /**
     * metodo para redirigi a la edicion
     *
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function edit(Show $show)
    {
        return view('shows.edit',["show" => $show, "groups" => Group::all(), "theatres" =>Theatre::all()]);
    }

    /**
     * Metodo para actualziar
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Show $show)
    {
        $show->day = $request->day;
        $show->group_id = $request->group_id;
        $show->theatre_id = $request->theatre_id;
        

        $show->save();

        return redirect()->route('shows.index',['show'=>$show->id])->with(['status' => __('Has editado la actuacion correctamente')]); 
    }
    

    /**
     * Metodo para destruir registros
     *
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function destroy(Show $show)
    {
        $show -> delete();
        return redirect()->route('shows.index',['show'=>$show->id])->with(['status' => __('Has eliminado La actuacion correctamente')]);
    }
}
