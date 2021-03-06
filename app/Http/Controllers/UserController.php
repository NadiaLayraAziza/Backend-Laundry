<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::latest()->get();
        return response()->json(
            [
                'status' => 200,
                'message' => 'Data berhasil ditampilkan',
                'data' => $data
            ]
        );
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
        $data = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'role' => $request->role
         ]);

        return response()->json(
            [
                'status' => 200,
                'message' => 'Data created successfully.',
                'data' => $data
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        if (is_null($data)) {
            return response()->json(
                [
                    'status' => 404,
                    'message' => 'Data not found'
                ]
            );
        }
        return response()->json(
            [
                'status' => 200,
                'message' => 'Data berhasil ditampilkan',
                'data' => $data
            ]
        );
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
    public function update(Request $request, User $user)
    {
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->telepon = $request->telepon;
        $user->alamat = $request->alamat;
        $user->role = $request->role;
        $user->save();

        return response()->json(
            [
                'status' => 200,
                'message' => 'Data updated successfully.',
                'data' => $user
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(
            [
                'status' => 200,
                'message' => 'Data deleted successfully'
            ]
        );
    }
}
