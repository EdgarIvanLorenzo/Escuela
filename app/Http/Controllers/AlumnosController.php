<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use App\Models\Grupo;
use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //Acedemos a todos los registros de la tabla Alumnos
        $alumnos['alumnos'] = Alumnos::all();
        return view('Alumnos.alumnosList',$alumnos);
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        //Metodo store
        $data = $request->except('_token');
        Alumnos::insert($data);
        return redirect('Alumnos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function show(Alumnos $alumnos)
    {
        //
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
