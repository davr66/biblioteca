<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('authors',['authors' => $authors]);
    }

    public function cadastro()
    {
        return view('cadastros.cadastroauthor');
    }

    public function store( Request $request )
    {
        $author = new Author();
        $author->nome = $request->nome;
        $author->sobrenome = $request->sobrenome;

        $author->save();

        return redirect()->route('authors');
}

    public function edit($id)
    {

        $authors = Author::where('cod_author',$id)->first();
       if(!empty($authors)){
            return view('edit.editauthor',['authors' => $authors],);
        }
        else{
        return redirect()->route('authors');
        }
    }

    public function update(Request $request, $id)
    {
        $data = [
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
        ];

        Author::where('cod_author',$id)->update($data);
        return redirect()->route('authors-index');
    }

    public function destroy($id)
    {
        Author::where('cod_author',$id)->delete();
        return redirect()->route('authors-index');
    }
}
