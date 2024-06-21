<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'carga_horaria',
        'descricao',
        'imagem',
        'preco',
    ];

    public function schedules()
    {
        return $this->hasMany(CourseSchedule::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student')->withPivot('situacao', 'situacao_financeira');
    }
}
