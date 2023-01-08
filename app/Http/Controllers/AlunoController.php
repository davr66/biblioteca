<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Models\Serie;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;

class AlunoController extends Controller
{
    public function index()
    {
        $series = Serie::all();
        $alunos = Aluno::all();
        return view('alunos',['series' => $series],['alunos' => $alunos]);
    }

    public function cadastro()
    {
        $series = Serie::all();
        return view('cadastros.cadastroaluno',['series' => $series]);
    }

    public function store( Request $request )
    {
        $aluno = new Aluno();
        $aluno->nome = $request->nome;
        $aluno->cod_serie = $request->num_serie;

        $aluno->save();

        return redirect()->route('alunos-index');
}

    public function edit($id)
    {
        $series = Serie::all();
        $alunos = Aluno::where('cod_aluno',$id)->first();
       if(!empty($alunos)){
            return view('edit.editaluno',['alunos' => $alunos],['series' => $series]);
        }
        else{
        return redirect()->route('alunos-index');
        }
    }

    public function update(Request $request, $id)
    {
        $data = [
            'nome' => $request->nome,
            'cod_serie' => $request->num_serie,
        ];

        Aluno::where('cod_aluno',$id)->update($data);
        return redirect()->route('alunos-index');
    }

    public function destroy($id)
    {
        Aluno::where('cod_aluno',$id)->delete();
        return redirect()->route('alunos-index');
    }
}
