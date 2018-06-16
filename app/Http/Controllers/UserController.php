<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $data)
    {
        if ($data->ajax()) {
            
            $validator = Validator::make($data->all(), [
            'email' => 'required',
            'password' => 'required',
             ]);

            if ($validator->fails()) {
                $msg = $validator->errors();
                return response()->json($msg);
            }else{
                if (Auth::attempt(['email' => $data->email, 'password' => $data->password, 'state' => 1])) {
                  $msg = "_zgt31";
                  return response()->json($msg);
                 }else{
                    $msg = "error-login";
                    return response()->json($msg);
                   
                }
            }
            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data)
    {
        if ($data->ajax()) {
            
            if ($data->password !== $data->passwordConfirm) {
                $msg = 'no coincide';
                return response()->json($msg);
            }else{
               $validator =  Validator::make($data->all(), [
               'email' => 'required|string|email|max:255|unique:users',
               'password' => 'required',
               ]); 

               if ($validator->fails()) {
                   $msg = $validator->errors();
                   return response()->json($msg);
               }else{
                    $user = User::create([
                       'email' => $data->email,
                       'password' => bcrypt($data->password),
                       'state' => 1
                    ]);
                    Auth::login($user);
                    $msg = 'ok';
                    return response()->json($msg);
               } /* closed segundo else */
            } /* closed primer else */
        } /* closed if ajax */
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
}
