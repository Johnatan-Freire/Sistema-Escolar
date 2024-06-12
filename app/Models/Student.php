<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'nome_responsavel',
        'cpf_responsavel',
        'data_nascimento_responsavel',
        'numero',
        'numero2',
        'cep',
        'endereco',
        'curso',
        'situacao_cadastral',
        'situacao_financeira',
        'observacao',
    ];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function getDebtAttribute()
    {
        return $this->courses->sum('preco');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student');
    }
}
