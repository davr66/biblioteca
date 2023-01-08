<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Serie;

class Aluno extends Model
{
    use HasFactory;

    protected $table = 'alunos';

    protected $primarykey = 'cod_aluno';

    protected $fillable = [
        'nome','cod_serie'
    ];

    public function series(){
        return $this->hasOne(Serie::class,'cod_serie','cod_serie');
    }
}
