<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function homepage(){
        return view('welcome');
    }

    public function about(){
        $halaman = 'about';
        return view('pages.about', compact('halaman'));
    }

    public function info(){
        return view('pages.info');
    }
}
