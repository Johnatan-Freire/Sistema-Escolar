<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'nome' => 'Rafael Galvao Medeiros',
                'cpf' => '123.456.789-00',
                'data_nascimento' => '2000-10-09', 
                'nome_responsavel' => 'Maria Silva',
                'cpf_responsavel' => '987.654.321-00',
                'data_nascimento_responsavel' => '1978-10-30',
                'numero' => '61987451452',
                'numero2' => '61932569856',
                'cep' => '12345-678',
                'endereco' => 'Santa Maria',
                'curso' => 'Operador de computador',
                'situacao_cadastral' => 'Ativo',
                'situacao_financeira' => 'Regular',
                'observacao' => 'Aluno PDC',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Leila Galvao Medeiros',
                'cpf' => '234.567.890-01',
                'data_nascimento' => '2005-08-09',
                'nome_responsavel' => 'Carlos Pereira',
                'cpf_responsavel' => '876.543.210-01',
                'data_nascimento_responsavel' => '1988-08-19', 
                'numero' => '91954785874',
                'numero2' => '61925899852',
                'cep' => '23456-789',
                'endereco' => 'Gama',
                'curso' => 'Montagem e configuração',
                'situacao_cadastral' => 'Trancado',
                'situacao_financeira' => 'atradado',
                'observacao' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Johnatan Freire dos Santos',
                'cpf' => '345.678.910-11',
                'data_nascimento' => '2003-12-15', 
                'nome_responsavel' => 'Adelvania Pereira',
                'cpf_responsavel' => '765.432.198-89',
                'data_nascimento_responsavel' => '1990-05-12',
                'numero' => '91954785874',
                'numero2' => '61925899852',
                'cep' => '23456-789',
                'endereco' => 'Santa Maria',
                'curso' => 'Excel',
                'situacao_cadastral' => 'Cancelado',
                'situacao_financeira' => 'Regular',
                'observacao' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Julia Hellen Rodrigues',
                'cpf' => '234.567.890-01',
                'data_nascimento' => '2008-07-22',
                'nome_responsavel' => 'Mario Santos',
                'cpf_responsavel' => '876.543.210-01',
                'data_nascimento_responsavel' => '1980-02-05',
                'numero' => '91954785874',
                'numero2' => '61925899852',
                'cep' => '23456-789',
                'endereco' => 'Gama',
                'curso' => 'Excel',
                'situacao_cadastral' => 'Formado',
                'situacao_financeira' => 'Quitado',
                'observacao' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
