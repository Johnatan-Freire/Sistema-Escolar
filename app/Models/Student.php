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
        'fone',
        'fone2',
        'cep',
        'endereco',
        'observacao',
    ];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student')->withPivot('situacao', 'situacao_financeira');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function getDebtAttribute()
    {
        return $this->payments()->where('status', 'pending')->sum('amount');
    }

    public function updateFinancialStatus()
    {
        foreach ($this->courses as $course) {
            $totalDebt = $this->payments()->where('course_id', $course->id)->where('status', 'pending')->sum('amount');
            if ($totalDebt > 0) {
                $this->courses()->updateExistingPivot($course->id, ['situacao_financeira' => 'em atraso']);
            } else {
                $this->courses()->updateExistingPivot($course->id, ['situacao_financeira' => 'quitado']);
            }
        }
    }

    public function addCourse(Course $course)
    {
        $this->courses()->attach($course->id, ['situacao' => 'ativo', 'situacao_financeira' => 'regular']);
        Payment::create([
            'student_id' => $this->id,
            'course_id' => $course->id,
            'amount' => $course->preco,
            'status' => 'pending'
        ]);
        $this->updateFinancialStatus();
    }

    public function removeCourse(Course $course)
    {
        $this->courses()->detach($course->id);
        Payment::where('student_id', $this->id)->where('course_id', $course->id)->delete();
        $this->updateFinancialStatus();
    }
}
