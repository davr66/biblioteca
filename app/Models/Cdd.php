<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use App\Models\Livro;

class Cdd extends Model
{
    use HasFactory;

    protected $table = 'cdds';

    protected $primarykey = 'cod_cdd';

    protected $fillable = [
        'cod_cdd','assunto'
    ];

    public function livros(){
        return $this->belongsToMany(Livro::class,'cod_cdd','cod_cdd');
    }
}
