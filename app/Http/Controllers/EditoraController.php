<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Editora;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;

class EditoraController extends Controller
{
    public function index()
    {
        $editoras = Editora::all();
        return view('editoras',['editoras' => $editoras]);
    }

    public function cadastro()
    {
        return view('cadastros.cadastroeditora');
    }

    public function store( Request $request )
    {
        $editora = new Editora();
        $editora->nome = $request->nome;

        $editora->save();

        return redirect()->route('editoras-index');
}

    public function edit($id)
    {
        $editoras = Editora::where('cod_edi',$id)->first();
       if(!empty($editoras)){
            return view('edit.editeditora',['editoras' => $editoras]);
        }
        else{
        return redirect()->route('editoras-index');
        }
    }

    public function update(Request $request, $id)
    {
        $data = [
            'nome' => $request->nome
        ];

        Editora::where('cod_edi',$id)->update($data);
        return redirect()->route('editoras-index');
    }

    public function destroy($id)
    {
        Editora::where('cod_edi',$id)->delete();
        return redirect()->route('editoras-index');
    }
}
