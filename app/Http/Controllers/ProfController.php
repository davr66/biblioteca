<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prof;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;


class ProfController extends Controller
{
    public function index()
    {
        $profs = Prof::all();
        return view('profs',['profs' => $profs]);
    }

    public function cadastro()
    {
        return view('cadastros.cadastroprof');
    }

    public function store( Request $request )
    {
        $prof = new Prof();
        $prof->nome = $request->nome;

        $prof->save();

        return redirect()->route('profs-index');
}

    public function edit($id)
    {
        $profs = Prof::where('cod_prof',$id)->first();
       if(!empty($profs)){
            return view('edit.editprof',['profs' => $profs]);
        }
        else{
        return redirect()->route('profs-index');
        }
    }

    public function update(Request $request, $id)
    {
        $data = [
            'nome' => $request->nome
        ];

        Prof::where('cod_prof',$id)->update($data);
        return redirect()->route('profs-index');
    }

    public function destroy($id)
    {
        Prof::where('cod_prof',$id)->delete();
        return redirect()->route('profs-index');
    }
}
