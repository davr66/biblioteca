<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use App\Models\Livro;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';

    protected $fillable = [
        'nome','sobrenome'
    ];

    public function livros(){
        return $this->belongsToMany(Livro::class,'cod_author','cod_author2','cod_author');
    }
}

