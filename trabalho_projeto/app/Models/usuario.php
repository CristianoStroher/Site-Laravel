<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'cpf',
        'cnpj',
        'data_nascimento',
        'telefone',
        'cidade',
        'cep',
        'uf',
        'endereco'
    ];

};