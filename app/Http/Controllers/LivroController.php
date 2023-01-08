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
    public function index(Request $request)
    {
        $cdds = Cdd::all();
        $editoras = Editora::all();
        $authors = Author::all();

        $query = Livro::query();

        //FILTRO DE AUTORES
        if (!empty($request->cod_author)) {
            $query->where('cod_author','=',$request->cod_author);
        }
        //FILTRO DE TITULO
        if (!empty($request->titulo)) {
            $query->where('titulo','like',"%".$request->titulo."%");
        }
        //FILTRO DE ASSUNTO
        if (!empty($request->cod_cdd)) {
            $query->where('cod_cdd','=',"$request->cod_cdd");
        }
        //FILTRO DE DISPONIBILIDADE
        if(!empty($request->disponivel)){
            if($request->disponivel == "disponivel"){
                $query->where('disponivel','=',1);
            }else{
                $query->where('disponivel','=',0);
            }
        }

        $livros = $query->paginate();

        $data = [
            'cdds'=> $cdds,
            'editoras'=> $editoras,
            'authors'=> $authors];

        return view('livros',$data,['livros' => $livros]);
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
        //VERIFICAR SE O LIVRO TEM Nº DE EXEMPLAR
        if(!empty($request->ex)){
            //CADASTRAR DIVERSOS LIVROS AUTOMATICAMENTE
            if ($request->auto == "1") {
                for ($i=1; $i <= $request->ex; $i++) {
                    $livro = new Livro();
                    $livro->data_reg = date('Y-m-d');
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

                }
            //CADASTRAR APENAS UM LIVRO COM NUMERO DE EXEMPLAR
            }else{
                $livro = new Livro();
                $livro->data_reg = date('Y-m-d');
                $livro->titulo = $request->titulo;
                $livro->cod_author = $request->cod_author;
                $livro->publi = $request->publi;
                $livro->aquis = $request->aquis;
                $livro->ex = $request->ex;
                $livro->vol = $request->vol;
                $livro->cod_cdd = $request->cod_cdd;
                $livro->cod_edi = $request->cod_edi;
                $livro->local = $request->local;

                $livro->save();



            }
            }
            //CASO O LIVRO NÃO TENHA Nº DE EXEMPLAR
            else{
                $livro = new Livro();
                $livro->data_reg = date('Y-m-d');
                $livro->titulo = $request->titulo;
                $livro->cod_author = $request->cod_author;
                $livro->publi = $request->publi;
                $livro->aquis = $request->aquis;
                $livro->ex = $request->ex;
                $livro->vol = $request->vol;
                $livro->cod_cdd = $request->cod_cdd;
                $livro->cod_edi = $request->cod_edi;
                $livro->local = $request->local;

                $livro->save();

            }

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
        $data = [
            'titulo' => $request->titulo,
            'cod_author' => $request->cod_author,
            'cod_author2' => $request->cod_author2,
            'publi' => $request->publi,
            'aquis' => $request->aquis,
            'ex' => $request->ex,
            'vol' => $request->vol,
            'cod_cdd' => $request->cod_cdd,
            'cod_edi' => $request->cod_edi,
            'local' => $request->local
        ];

        livro::where('num_reg',$id)->update($data);
        return redirect()->route('livros-index');
    }

    public function destroy($id)
    {
        livro::where('num_reg',$id)->delete();
        return redirect()->route('livros-index');
    }
}
