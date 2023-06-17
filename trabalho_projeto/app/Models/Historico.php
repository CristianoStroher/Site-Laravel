<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    protected $table = 'est_cas_pessoa';

    public function index()
    {
        $historicos = Historico::all();
        return view('historico', ['est_cas_pessoa' => $historicos]);
    }

};