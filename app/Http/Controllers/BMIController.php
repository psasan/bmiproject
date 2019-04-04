<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\BMI;
use App\User;
use Session;

class BMIController extends Controller
{
    protected $request;
    public function index()
    {
        //
        $bmi_list = BMI::orderBy('tanggal','asc');
        $bmi_count = BMI::count();
        return view('bmi.index', compact('bmi_list','bmi_count'));
    }

    public function create()
    {
        //
        return view('bmi.create');
    }

    public function generate(Request $request)
    {
        //
        $input = new BMI;
        
        $input->tinggi = $request->tinggi;
        $input->berat  = $request->berat;
        $input->bmi    = $request->bmi;
        $input->id_user= $request->id_user;

        $validator = Validator::make($request->all(), [
            'tinggi'        => 'required|numeric|max:253|min:60',
            'berat'         => 'required|numeric|max:500|min:25',
        ]);

        if($validator->fails()){
            return redirect('create')
                    ->withInput()
                    ->withErrors($validator);
        }
        else{
            $t = $request->tinggi/100;
            $b = $request->berat;
            $hitung = number_format((float)$b/$t/$t,2,'.','');
            $input['tanggal'] = date("Y-m-d");
            $input['bmi'] = $hitung;
            
            if(Auth::user()){
                $num = Auth::id();
                $input['id_user'] = $num;

                $cek = BMI::get()->where('id_user',$num);
                $cek = $cek->last();
                if(!empty($cek) && $cek->tanggal == $input->tanggal){
                    $cek['tinggi'] = $input['tinggi'];
                    $cek['berat'] = $input['berat'];
                    $cek['bmi'] = $input['bmi'];
                    $cek->update();
                    Session::flash('flash_message', 'Data hari ini telah diupdate!');
                    return redirect('bmishow');
                }
            }
            else{
                $input['id_user'] = 0;
                $cek = BMI::get()->where('id_user',0);
                $cek = $cek->first();
                
                if(!empty($cek)){
                    $cek['tanggal'] = $input['tanggal'];
                    $cek['tinggi'] = $input['tinggi'];
                    $cek['berat'] = $input['berat'];
                    $cek['bmi'] = $input['bmi'];
                    $cek->update();
                    return redirect('bmishow');
                }
            }
        }

        $input->save();
        Session::flash('flash_message', 'Data berhasil diinputkan!');
        return redirect('bmishow');
    }

    public function show()
    {
        //
        if(Auth::user()){
            $id = BMI::get()->where('id_user',Auth::id());
            $bmi = $id->last();
        }
        else{
            $id = BMI::get()->where('id_user',0);
            $bmi = $id->last();
        }
        //return compact('test');
        return view('bmi.show',compact('bmi'));
    }

    public function edit($id){
        $bmi = BMI::findOrFail($id);
        return view('bmi.edit',compact('bmi')); 
    }

    public function update($id, Request $request){
        $bmi = BMI::findOrFail($id);
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'tinggi'        => 'required|numeric|max:253|min:60',
            'berat'         => 'required|numeric|max:500|min:25',
        ]);
 
        if($validator->fails()){
            return redirect('bmi/edit')
                    ->withInput()
                    ->withErrors($validator);
        }
        else{
            $t = $request->tinggi/100;
            $b = $request->berat;
            $hitung = number_format((float)$b/$t/$t,2,'.','');
            $input['bmi'] = $hitung;
            $bmi['bmi'] = $input['bmi'];
        }
        
        $bmi->update($request->all());
        Session::flash('flash_message', 'Data telah diupdate!');
        return redirect('home');
    }
}
