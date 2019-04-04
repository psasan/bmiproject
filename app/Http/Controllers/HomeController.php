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
        if($count_bmi!=0){
            do{
                if($data[$i]['id_user']==$id){
                    $bmi[$counter] = $data[$i]['bmi'];
                    $berat[$counter] = $data[$i]['berat'];
                    $tinggi[$counter] = $data[$i]['tinggi'];
                    $tanggal[$counter] = date('d/m',strtotime($data[$i]['tanggal']));
                    $counter++;
                }
                $i++;
            }while($i<$iakhir);
        }
        else{
            $bmi[] = null;
            $berat[] = null;
            $tinggi[] = null;
            $tanggal[] = null;
        }

        
        $firstbmi = $data->where('id_user',$id)->first();
        $lastbmi = $data->where('id_user',$id)->last();
        $numtinggi = $firstbmi->tinggi - $lastbmi->tinggi;
        $numberat = $firstbmi->berat - $lastbmi->berat;
        $numbmi = $firstbmi->bmi - $lastbmi->bmi;

        if($numtinggi < 0){
            $numtinggi = $numtinggi * -1;
        }
        if($numberat < 0){
            $numberat = $numberat * -1;
        }
        if($numbmi < 0){
            $numbmi = $numbmi * -1;
        }

        return view('home', compact('list_bmi', 'count_bmi', 'berat', 'tinggi', 'tanggal', 'bmi', 'firstbmi', 'lastbmi', 'numtinggi', 'numberat', 'numbmi'));
        
    }
}
