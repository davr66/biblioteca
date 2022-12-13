<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use App\Models\Author;
use App\Models\Editora;
use App\Models\Cdd;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::all();
        return view('livros',['livros' => $livros]);
    }

    public function cadastro()
    {
        $cdds = Cdd::all();
        $editoras = Editora::all();
        $authors = Author::all();
        return view('cadastros.cadastrolivro',['authors' => $authors],['cdds' => $cdds])->with(['editoras' => $editoras]);
    }

    public function store( Request $request )
    {
        if(!empty($request->ex)){
            for ($i=1; $i <= $request->ex; $i++) {
                if (!empty($request->vol)) {
                    $livro = new Livro();
                    $livro->titulo = $request->titulo;
                    $livro->cod_author = $request->cod_author;
                    $livro->publi = $request->publi;
                    $livro->aquis = $request->aquis;
                    $livro->ex = $i;
                    $livro->vol = $request->vol;
                    $livro->cod_cdd = $request->cod_cdd;
                    $livro->cod_edi = $request->cod_edi;
                    $livro->local = $request->local;

                    $livro->save();
                }else {
                    $livro = new Livro();
                    $livro->titulo = $request->titulo;
                    $livro->cod_author = $request->cod_author;
                    $livro->publi = $request->publi;
                    $livro->aquis = $request->aquis;
                    $livro->ex = $i;
                    $livro->vol = null;
                    $livro->cod_cdd = $request->cod_cdd;
                    $livro->cod_edi = $request->cod_edi;
                    $livro->local = $request->local;

                    $livro->save();
                }
            }
        }else{
            if (!empty($request->vol)) {
                $livro = new Livro();
                $livro->titulo = $request->titulo;
                $livro->cod_author = $request->cod_author;
                $livro->publi = $request->publi;
                $livro->aquis = $request->aquis;
                $livro->ex = null;
                $livro->vol = $request->vol;
                $livro->cod_cdd = $request->cod_cdd;
                $livro->cod_edi = $request->cod_edi;
                $livro->local = $request->local;

                $livro->save();
            }else {
                $livro = new Livro();
                $livro->titulo = $request->titulo;
                $livro->cod_author = $request->cod_author;
                $livro->publi = $request->publi;
                $livro->aquis = $request->aquis;
                $livro->ex = null;
                $livro->vol = null;
                $livro->cod_cdd = $request->cod_cdd;
                $livro->cod_edi = $request->cod_edi;
                $livro->local = $request->local;

                $livro->save();
            }
        }

        $livro->save();

        return redirect()->route('livros-index');
}

    public function edit($id)
    {
        $cdds = Cdd::all();
        $editoras = Editora::all();
        $authors = Author::all();
        $livro = Livro::where('num_reg',$id)->first();

       if(!empty($livro)){
        $data = [
            'livro' => $livro,
            'cdds'=> $cdds,
            'editoras'=> $editoras,
            'authors'=> $authors
        ];

            return view('edit.editlivro',$data);

        }
        else{
        return redirect()->route('livros-index');
        }
    }

    public function update(Request $request, $id)
    {
        if (!empty($request->ex)) {
            if (!empty($request->vol)) {
                $data = [
                    'titulo' => $request->titulo,
                    'cod_author' => $request->cod_author,
                    'publi' => $request->publi,
                    'aquis' => $request->aquis,
                    'ex' => $request->ex,
                    'vol' => $request->vol,
                    'cod_cdd' => $request->cod_cdd,
                    'cod_edi' => $request->cod_edi,
                    'local' => $request->local
                ];
            }else{
            $data = [
                'titulo' => $request->titulo,
                'cod_author' => $request->cod_author,
                'publi' => $request->publi,
                'aquis' => $request->aquis,
                'ex' => $request->ex,
                'vol' => null,
                'cod_cdd' => $request->cod_cdd,
                'cod_edi' => $request->cod_edi,
                'local' => $request->local
            ];
        }
    }else{
            if (!empty($request->vol)) {
                $data = [
                    'titulo' => $request->titulo,
                    'cod_author' => $request->cod_author,
                    'publi' => $request->publi,
                    'aquis' => $request->aquis,
                    'ex' => null,
                    'vol' => $request->vol,
                    'cod_cdd' => $request->cod_cdd,
                    'cod_edi' => $request->cod_edi,
                    'local' => $request->local
                ];
            }else{
                $data = [
                    'titulo' => $request->titulo,
                    'cod_author' => $request->cod_author,
                    'publi' => $request->publi,
                    'aquis' => $request->aquis,
                    'ex' => null,
                    'vol' => null,
                    'cod_cdd' => $request->cod_cdd,
                    'cod_edi' => $request->cod_edi,
                    'local' => $request->local
                ];
            }
    }
        livro::where('num_reg',$id)->update($data);
        return redirect()->route('livros-index');
    }

    public function destroy($id)
    {
        livro::where('num_reg',$id)->delete();
        return redirect()->route('livros-index');
    }
}
