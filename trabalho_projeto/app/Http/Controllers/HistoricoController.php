<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historico;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HistoricoController extends Controller
{
    public function historico()
    {
        $historicos = Historico::all();
        return view('historico', ['historicos' => $historicos]);
    }
    
}

