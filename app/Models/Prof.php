<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Prof extends Model
{
    use HasFactory;

    protected $table = 'profs';

    protected $primarykey = 'cod_prof';

    public function emprestimos(){
        return $this->belongsToMany(Emprestimo::class,'cod_prof','cod_prof');
    }
}
