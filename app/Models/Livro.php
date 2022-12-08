<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $table = 'livros';

    protected $primarykey = 'num_reg';

    protected $fillable = [
        'titulo','publi','aquis','ex','vol','cod_cdd','cod_autor','cod_edi','local','disponivel',
    ];
}
