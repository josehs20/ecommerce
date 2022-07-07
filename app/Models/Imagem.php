<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    use HasFactory;
    protected $table = "imagems";
    protected $fillable = [
        'nome',
        'prioridade',
        'id_produto',
    ];

    public function produto()
    {
        return $this->belongsTo('App\Models\Produto');
    }
}
