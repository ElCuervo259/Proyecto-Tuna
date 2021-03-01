<?php

namespace App\Http\Controllers;

use App\Models\Prize;
use App\Models\Group;
use Illuminate\Http\Request;

class PrizeController extends Controller
{
    /**
     * Metodo que nos permite listar los premios junto con los grupos a los que pertenecen
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['prizes']=Prize::with('group')->paginate(10);
            return view('prizes.index',$datos);
    }

/**
 * Metodo que nos permite realizar filtros a las tablas de premios
 *
 * @param Request $request
 * @return void
 */
    public function filtro(Request $request){

        $name = $request->get('buscarpor');
        $campo = $request->get('campo');

        $prizes = Prize::where("$campo",'like',"%$name%")->paginate(10);
        
        return view('prizes.index', compact('prizes'));

    }

    /**
     * Metodo para crear premios empleando tambien los grupos a los que se otorgan.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Prize $prize)
    {
        return view('prizes.create')->with(["prize" => $prize, "groups" => Group::all()]);  
    }

    /**
     * Metodo para almacenar los premios
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validación
      $request->validate([
        'name' => 'required',
        'group_id' => 'required',
        
     ]);


        

     //Recoger datos
     $name = $request->name;
     $group_id = $request->group_id;
     
    

     $prize = new Prize();

     $prize->name = $name;
     $prize->group_id = $group_id;
     

     $prize->save();

     return redirect()->route('dashboard')->with(['status'=>'El Premio ha sido creado con éxito']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prize  $prize
     * @return \Illuminate\Http\Response
     */
    public function show(Prize $prize)
    {
        //
    }

    /**
     * Metodo que nos recundece a la edicion de premios jutno con los grupos
     *
     * @param  \App\Models\Prize  $prize
     * @return \Illuminate\Http\Response
     */
    public function edit(Prize $prize)
    {
        return view('prizes.edit',["prize" => $prize, "groups" => Group::all()]);
    }

    /**
     * Metodo para actualizar los premios
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prize  $prize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prize $prize)
    {
        $prize->name = $request->name;
        $prize->group_id = $request->group_id;
        
       

        $prize->save();

        return redirect()->route('prizes.index',['prize'=>$prize->id])->with(['status' => __('Has editado el premio correctamente')]);
    }

    /**
     * metodo para destruir premios
     *
     * @param  \App\Models\Prize  $prize
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prize $prize)
    {
        $prize -> delete();

        return redirect()->route('prizes.index',['prize'=>$prize->id])->with(['status' => __('Has eliminado El teatro correctamente')]);
    }
}
