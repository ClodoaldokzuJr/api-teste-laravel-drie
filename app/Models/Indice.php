<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indice extends Model
{
    protected $fillable = ['titulo', 'pagina', 'livro_id'];

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }
}
