<?php

namespace App\Http\Controllers;

use App\Models\CargaMateria;
use App\Models\Grupo;
use App\Models\Materia;
use Illuminate\Http\Request;

class CargaMateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //Extraemos los datos de la tabla Grupo
        $datos['datosGrupo']= Grupo::all();
        //Se lo indesamos al index de la vista
        return view('CargaMaterias.grupos',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return array
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $data =$request->except("_token");
        $materias = $data['idMateria'];
        foreach ($materias as $materia){
            $data['idMateria']=$materia;
            CargaMateria::insert($data);
        }
        return redirect('CargaMaterias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CargaMateria  $cargaMateria
     * @return \Illuminate\Http\Response
     */
    public function show(CargaMateria $cargaMateria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CargaMateria  $cargaMateria
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(CargaMateria $cargaMateria,$id)
    {
        $grupo['grupo'] = Grupo::findOrFail($id);
        $materias['materias'] =Materia::all();
        return view('CargaMaterias.carga',$grupo,$materias);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CargaMateria  $cargaMateria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CargaMateria $cargaMateria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CargaMateria  $cargaMateria
     * @return \Illuminate\Http\Response
     */
    public function destroy(CargaMateria $cargaMateria)
    {
        //
    }
}
