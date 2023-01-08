<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cdd;
use App\Models\Serie;

class PagesController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }

    public function cdds()
    {
        $cdds = Cdd::all();
        return view('cddstable',['cdds' => $cdds]);
    }

    public function sobre(){
        return view('sobre');
    }

}
