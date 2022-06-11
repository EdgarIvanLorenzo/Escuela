<?php

namespace App\Http\Controllers;

use App\Models\Sesion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;


class SesionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //Creacion del controlador para mostrat la vista
        return view('Sesion.sesion');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //Retornamos la vista para crear un nuevo usuario
        return view('Sesion.createSesion');
    }


    //Metodo para aguardar en el store
    public function store(Request $request)
    {
        //Recibimos los datos
        info("Entramos al metodo store");
        //$data = $request->all();//Recojemos todos los datos
        //todo Recojemos los datos excepto el token
        $data= $request->except(['_token','Contra1']); //Tal cual nos trae el nombre de la propiedad
        Sesion::insert($data);
        return response()->json($data); //Mandamos como json los datos que vienen del formulario

    }

    //Funcion para mostrar todos los datos de la tabla
    public function show(Sesion $sesion)
    {
        $data=Sesion::all();
        return response()->json($data);

    }

    //Obtener un usuario por nombre
    public function getUserForName($data){
        return $data;
        /*$user  = Sesion::where('Usuario', '=', $data->Usuario)->where('Contra','=',$data->Contra)->get();
        $numberData =0;
        $numberData=count($user);
        if($numberData==0){
            return view('Sesion.notExist');
        }else{
            return redirect('Materia');
        }*/

    }

    public function getUserForNameData(Request $request)
    {
        //Traemos lo del formulario que agrego el usuario
        $data = $request->except('_token'); //Tal cual nos trae el nombre de la propiedad
        $user  = Sesion::where('Usuario', '=', $data["Nombre"])->where('Contra','=',$data["Contra"])->get();
        $numberData = 0;
        $numberData = count($user);
        if($numberData==0 || $numberData==null || $numberData=='undefined'){
            return view('Sesion.notExist');
        }else{
            return redirect('Materia');
        }
    }


    public function edit(Sesion $sesion)
    {
        //
    }


    public function update(Request $request, Sesion $sesion)
    {
        //
    }


    public function destroy(Sesion $sesion)
    {
        //
    }
}
