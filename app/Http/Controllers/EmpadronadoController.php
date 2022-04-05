<?php

namespace App\Http\Controllers;

use App\Models\Empadronado;
use App\Models\User;
use App\Models\EmpadronadoUser;
use Illuminate\Support\Facades\Auth;
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

    public function get($nombre_dni = null)
    {
        if (!isset($nombre_dni))
        {
            $empadronados = new EmpadronadoCollection(
                Empadronado::with('users')
                            ->orderBy('apellido')
                            ->orderBy('nombre')
                            ->paginate(50)
            );
            return $empadronados;
        }
        $empadronados = new EmpadronadoCollection(
            Empadronado::with('users')
                        ->nombreodni($nombre_dni)
                        ->orderBy('apellido')
                        ->orderBy('nombre')
                        ->paginate(50)
        );
        return $empadronados;
    }

    public function getNumeros()
    {
        $total = count(Empadronado::all());
        $llamados = count(EmpadronadoUser::all());
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

    public function setLlamado(Request $request, $id)
    {
        $this->validate($request, [
            'llamado' => 'required|boolean',
        ]);
        $empadronado = Empadronado::findOrFail($id);
        $user = User::findOrFail(Auth::user()->id);

        if (!$empadronado->isLlamado($user->id)) {
            $empadronado->users()->attach($user->id);
            return response()->json([
                'success' => true,
                'message' => 'Llamada registrada con éxito'
            ],201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Ocurrió un error al registrar la llamada',
        ],400);
    }

    public function setIV(Request $request, $id)
    {
        $this->validate($request, [
            'intencion' => 'required|integer',
        ]);
       $empadronado = Empadronado::findOrFail($id);

       $empadronado->intencion_voto = $request->intencion;

       if ($empadronado->save()) {
           return response()->json([
               'success' => true,
               'message' => 'intención de voto registrada con éxito'
           ],201);
       }
       return response()->json([
           'success' => false,
           'message' => 'Ocurrió un error al registrar la intención de voto',
       ],400);
    }
}
