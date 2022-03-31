<?php

namespace App\Http\Controllers;

use App\Models\Empadronado;
use App\Http\Resources\EmpadronadoCollection;
use Illuminate\Http\Request;

class EmpadronadoController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('padron.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function get()
    {
        $empadronados = new EmpadronadoCollection(
            Empadronado::orderBy('apellido')
                        ->orderBy('nombre')
                        ->paginate(50)
        );
        return $empadronados;
    }

    public function getNumeros()
    {
        $total = count(Empadronado::all());
        $llamados = count(Empadronado::where('llamado',1)->get());
        $favor = count(Empadronado::where('intencion_voto',2)->get());
        $contra = count(Empadronado::where('intencion_voto',3)->get());

        $data = [
            'total' => $total,
            'llamados' => $llamados,
            'favor' => $favor,
            'contra' => $contra,
        ];

        return $data;
    }
}
