<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\BMI;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $request;
    public function index()
    {
        //
        $user_list = User::all();
        return view('user.index', compact('user_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
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
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:30',
            'born'      => 'required|date',
            'gender'    => 'required|in:L,P',
            'email'     => 'required|email|max100|unique:users',
            'password'  => 'required|confirmed|min:6',
        ]);

        if($validator->fails()){
            return redirect('create')
                    ->withInput()
                    ->withErrors($validator);
        }

        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect('bmishow');
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
        return redirect('user');
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
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
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
        $user = User::findOrFail($id);
        $data = $request->all();

        $validasi = Validator::make($data,[
            'name'      => 'required|string|max:30',
            'born'      => 'required|date',
            'gender'    => 'required|in:L,P',
            'email'     => 'required|email|max100|unique:users',
            'password'  => 'required|confirmed|min:6',
        ]);

        if($validasi->fails()){
            return redirect('user/create')
                    ->withErrors($validasi)
                    ->withInput();
        }

        if($request->has('password')){
            $data['password'] = bcrypt($data['password']);
        }
        else{
            $data = array_except($data, ['password']);
        }

        $user->update($data);
        return redirect('user');
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
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('user');
    }

    public function profil(){
        $id = Auth::id();
        $user = User::findOrFail($id);
        //return compact('user');
        return view('user.profil');
    }
}
