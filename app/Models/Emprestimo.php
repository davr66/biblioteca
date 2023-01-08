<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Relations\hasOne;
use App\Models\Livro;
use App\Models\Aluno;

class Emprestimo extends Model
{
    use HasFactory;

    protected $table = 'emprestimos';

    protected $primarykey = 'cod_emp';

    protected $fillable = [
        'cod_aluno','cod_prof','num_reg'
    ];

    public function alunos(){
        return $this->hasOne(Aluno::class,'cod_aluno','cod_aluno');
    }

    public function livros(){
        return $this->hasOne(Livro::class,'num_reg','num_reg');
    }
}
