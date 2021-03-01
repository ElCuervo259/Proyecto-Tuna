<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GroupController extends Controller
{
    /**
     * metodo que nos permitira ver en tablas el conetnid de grupos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $tuna = Auth::user()->group_id;
        $rol = Auth::user()->rol;

        
            if($rol == "Admin"){

                $datos['groups']=Group::paginate(10);
            return view('groups.index',$datos);        

            }else{
                
                $datos['groups']=Group::where('id',$tuna)->paginate(10);

                return view('groups.index',$datos);
            }

    }

    /**
     * Metodo que nos redirecciona al formulario de creacion 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Funcion para almacenar grupos
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validación
      $request->validate([
         'name' => 'required|string',
      ]);

      //Recoger datos
      $name = $request->name;

      $group = new Group();
      $group->name = $name;

      $group->save();

      return redirect()->route('dashboard')->with(['status'=>'La Tuna ha sido Creada con éxito']);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * metodo que redirecciona a la edicion 
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('groups.edit',compact('group'));


    }

    /**
     * metodo para actualizar grupos
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {

        $group->name = $request->name;

        $group->save();

        return redirect()->route('groups.index',['group'=>$group->id])->with(['status' => __('Has editado la tuna correctamente')]); 
    }

    /**
     * metodo para destruir grupos
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {

       $group->delete();
       return redirect()->route('groups.index',['group'=>$group->id])->with(['status' => __('Has eliminado la tuna correctamente')]);

        
    }
}
