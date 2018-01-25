<?php

namespace Tournament\API\V1\Controllers;

use Illuminate\Http\Request;

use Tournament\Http\Requests;
use Tournament\Http\Controllers\Controller;
use Tournament\Entities\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//        return response()->json([
//            [1, 'rass', 'hoss'],
//            [2, 'rassoul', 'hosseini']
//        ]);
        return response()->json(User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
//    public function store(Requests\AuthRequest $request)
    public function store(Request $request)
    {
        return User::create([
            'fname' => $request->firstName,
            'lname' => $request->firstName,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

//        return response()->json($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        die('kiir');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
