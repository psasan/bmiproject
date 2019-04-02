<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\BMI;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $list_bmi = BMI::where('id_user',$id)->orderBy('id','desc')->simplePaginate(5);
        $count_bmi = BMI::where('id_user',$id)->count();

        $data = BMI::all();
        $iakhir = count($data);
        
        $i = 0;
        $counter = 0;
        
        do{
            if($data[$i]['id_user']==$id){
                $bmi[$counter] = $data[$i]['bmi'];
                $berat[$counter] = $data[$i]['berat'];
                $tanggal[$counter] = date('d-m',strtotime($data[$i]['tanggal']));
                $counter++;
            }
            $i++;
        }while($i<$iakhir);

        //return compact('count_bmi', 'berat', 'tanggal');
        return view('home', compact('list_bmi', 'count_bmi', 'berat', 'tanggal', 'bmi'));
    }
}
