<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserAPIResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
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
        $users = UserAPIResource::collection(User::orderBy('lastname')->get());
        return response()->json([
            'success' => true,
            'users' => $users,
        ]);
    }

    public function changeStatus(Request $request, $id){
       //dd($request->status);
        $this->validate($request, [
             'status' => 'required|boolean',
         ]);
        //$action = $request->status ? 'habilitado':'desabilitado';
        $user = User::findOrFail($id);
        //dd($user);
        $user->enabled = $request->status;
        if ($user->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Solicitud procesada con éxito'
            ],201);
        }
        return response()->json([
            'success' => false,
            'message' => 'Ocurrió un error al procesar la solicitud',
        ],400);
    }
}
