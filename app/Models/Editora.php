<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use App\Models\Livro;

class Editora extends Model
{
    use HasFactory;

    protected $table = 'editoras';

    protected $fillable = [
        'nome'
    ];

    public function livros(){
        return $this->belongsToMany(Livro::class,'cod_edi','cod_edi');
    }
}
