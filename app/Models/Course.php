<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'nome',
        'carga_horaria',
        'dias',
        'turno',
        'descricao',
        'imagem',
        'preco',
    ];

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}