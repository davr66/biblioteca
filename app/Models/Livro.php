<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Relations\hasOne;
use App\Models\Author;
use App\Models\Editora;
use App\Models\Cdd;


class Livro extends Model
{
    use HasFactory;

    protected $table = 'livros';

    protected $primarykey = 'num_reg';

    protected $fillable = [
        'titulo','publi','aquis','ex','vol','cod_cdd','cod_author','cod_edi','local','disponivel',
    ];

    public function authors(){
        return $this->hasOne(Author::class,'cod_author','cod_author');
    }

    public function editoras(){
        return $this->hasOne(Editora::class,'cod_edi','cod_edi');
    }

    public function cdds(){
        return $this->hasOne(Cdd::class,'cod_cdd','cod_cdd');
    }
}
