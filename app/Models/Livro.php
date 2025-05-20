<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $fillable = ['titulo', 'autor', 'ano', 'user_id'];

    public function indices()
    {
        return $this->hasMany(Indice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
