<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public $timestamps = false;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //Extraemos los datos de la tabla Materia
        $datosMateria['materias']=Materia::all();
        //Se lo indesamos al index de la vista
        return view('Materias.materia',$datosMateria);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('Materias.createMateria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {
        //todo Recojemos los datos excepto el token
        $data= $request->except('_token'); //Tal cual nos trae el nombre de la propiedad
        Materia::insert($data); //Insertamos el dato a la tabla materia con el Modelo Materia
        return redirect('Materia');
    }


    public function show(Materia $materia)
    {
        //
    }


    //Buscar una materia por su id
    public function edit($id)
    {
        $materia  = Materia::findOrFail($id);
        return view('Materias.updateMateria',compact('materia'));
    }


    public function update(Request $request, $id)
    {
        //Actualizar un registro
        //todo Recojemos los datos excepto el token
        $data = $request->except(['_token','_method']); //Tal cual nos trae el nombre de la propiedad
        Materia::where('id','=',$id)->update($data); //Actualizamos el registro
        return redirect('Materia');
    }

    //Metodo para eliminar un registro
    public function destroy($id)
    {
        Materia::destroy($id);
        return redirect('Materia');
    }
}
