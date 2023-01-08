<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Serie extends Model
{
    use HasFactory;

    protected $table = 'series';

    protected $primarykey = 'cod_serie';

    protected $fillable = [
        'cod_serie','num_serie','curso'
    ];

    public function aluno(){
        return $this->belongsToMany(Aluno::class,'cod_serie','cod_serie');
    }
}
