<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'nome',
        'cpf',
        'nome_responsavel',
        'cpf_responsavel',
        'numero',
        'numero2',
        'cep',
        'endereco',
        'curso',
        'situacao_cadastral',
        'situacao_financeira',
        'observacao',
    ];
}