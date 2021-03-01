<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Metodo para mostrar los diferentes usuarios con sus grupos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['users']=User::with('group')->paginate(10);
        return view('users.index',$datos);
    }

/**
 * Metodo para filtrar por los diferentes campos de la tabla
 *
 * @param Request $request
 * @return void
 */
    public function filtro(Request $request){

        $name = $request->get('buscarpor');
        $campo = $request->get('campo');

        $users = User::where("$campo",'like',"%$name%")->paginate(10);
        
        return view('users.index', compact('users'));

    }


    /**
     * Metodo para redireccionar a la creacion
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Editamos y mandamos los grupos también
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',["user" => $user, "groups" => Group::all()]);
    }

    /**
     * Metodo para actaulizar los usuarios
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {

        
        $rol = Auth::user()->rol;

        
        $user->rol = $request->rol;
        $user->name = $request->name;
        $user->mote = $request->mote;
        $user->rango = $request->rango;
        $user->group_id = $request->group_id;
        $user->email = $request->email;
        if($request->hasFile('image_path')){

            $user['image_path'] = $request->file('image_path')->store('uploads','public');
        }

        $user->save();

        return redirect()->route('users.index',['user'=>$user->id])->with(['status' => __('Has editado el Usuario correctamente')]); 
    }

    /**
     * Metodo para destruir usuarios
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index',['user'=>$user->id])->with(['status' => __('Has eliminado la tuna correctamente')]);
 
    }

/**
 * metodo para redirigir a la vista de configuración de perfil
 *
 * @return void
 */
    public function config()
   {
    return view('users.config',['groups'=>Group::all()]);
   }

   /**
    * Meotodo para actualizar el perfil del usuario
    *
    * @param Request $request
    * @return void
    */
   public function updateperfil(Request $request)
   {
      $user = User::find(Auth::user()->id);
      

      

      $user->rol = $request->rol;
      $user->name = $request->name;
      $user->mote = $request->mote;
      $user->rango = $request->rango;
      $user->group_id = $request->group_id;
      $user->email = $request->email;
      if($request->hasFile('image_path')){

        $user['image_path'] = $request->file('image_path')->store('uploads','public');
    }

      $user->save();

      return redirect()->route('users.index',['user'=>$user->id])->with(['status' => __('Has modificado tu perfil correctamente')]);
   }


   


}
