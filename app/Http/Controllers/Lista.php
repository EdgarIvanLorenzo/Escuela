<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use App\Models\CargaMateria;
use App\Models\Grupo;
use App\Models\Materia;
use http\Env\Response;
use Illuminate\Http\Request;

class Lista extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
       $grupos['grupos'] = Grupo::all();
        return view('Lista.lista',$grupos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //Mandar a traer todos los datos de la tabla Grupos
        $grupos['grupos']= Grupo::all();
        return view('Alumnos.alumnosCreate',$grupos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(Request $request)
    {
        //Metodo store
        $data = $request->except('_token');
        return $data;
        /*Alumnos::insert($data);
        return redirect('Alumnos');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumnos  $alumnos
     * @return string
     */
    public function show(Alumnos $alumnos1,$id)
    {
        $alumnos = Alumnos::all()->where('idGrupo','=',$id);
        $materias = CargaMateria::all()->where('idGrupo','=',$id);
        $materia = Materia::all();
        $grupo= Grupo::all()->where('id','=',$id);
        $arrayMateriasName = array();
        $materia2 =array();

        foreach ($materias as $m){
            array_push($materia2,$m['id']);
        }
        foreach ($materia as $ma){
            if(in_array($ma['id'], $materia2)){
                array_push($arrayMateriasName,$ma['Nombre']);
            }
        }


        return view('Lista.generarLista',['grupo'=>$grupo,'alumnos'=>$alumnos,'arrayMateriasName'=>$arrayMateriasName]);

        //return $materia;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumnos  $alumnos
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $alumnos  = Alumnos::findOrFail($id);
        $grupos['grupos'] = Grupo::all();
        //Todo Recargar el formulario con los datos
        return view('Alumnos.alumnosUpdate',compact('alumnos'),$grupos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumnos  $alumnos
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $data = $request->except(['_token','_method']); //Tal cual nos trae el nombre de la propiedad

        Alumnos::where('id','=',$id)->update($data); //Actualizamos el registro
        return redirect('Alumnos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumnos  $alumnos
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Alumnos::destroy($id);
        return redirect('Alumnos');
    }
}
