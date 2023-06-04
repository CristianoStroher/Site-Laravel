<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    protected $table = 'est_cas_pessoa';

    protected $fillable = [
        'nm_nome',
        'ds_email',
        'ds_senha',
        'ds_cpf',
        'ds_telefone',
        'ds_cidade',
        'ds_cep',
        'ds_uf',
        'ds_endereco'
    ];

};