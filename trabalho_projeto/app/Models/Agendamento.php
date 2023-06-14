<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = 'est_cas_estadia';

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'cpf',
        'data_nascimento',
        'telefone',
        'cidade',
        'cep',
        'uf',
        'endereco'
    ];

};