<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{
    public function index()
    {
        $users = Usuario::all();
        return view('usuario', ['users' => $users]);
    }

      public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // outras regras de validação
            'senha' => 'required|min:8', // regra de validação para o campo 'senha'
            'repetir_senha' => 'required|same:senha', // regra de validação para o campo 'repetir_senha'
        ], [
            'senha.required' => 'A senha é obrigatória.',
            'senha.min' => 'A senha deve ter no mínimo :min caracteres.',
            'repetir_senha.required' => 'A confirmação da senha é obrigatória.',
            'repetir_senha.same' => 'A confirmação da senha não corresponde à senha.',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $user = new Usuario;
        $user->nm_nome = $request->input('nome');
        $user->ds_email = $request->input('email');
        $user->ds_senha = bcrypt($request->input('senha'));
    
        $documento = $request->input('documento');
    
        if (!empty($documento)) {
            // Remove caracteres não numéricos
            $documento = preg_replace('/[^0-9]/', '', $documento);
    
            // Verifica se é um CPF válido
            if (strlen($documento) === 11 && $this->ehCpf($documento)) {
                $user->ds_cpf = $documento;
            }
            // Verifica se é um CNPJ válido
            elseif (strlen($documento) === 14 && $this->ehCnpj($documento)) {
                $user->ds_cnpj = $documento;
            } else {
                $errors = ['documento' => 'CPF ou CNPJ inválido.'];
                return redirect()->back()->withErrors($errors)->withInput();
            }
    
            // Verifica se o CPF já existe na tabela
            if (Usuario::where('ds_cpf', $documento)->exists()) {
                $errors = ['documento' => 'CPF já cadastrado.'];
                return redirect()->back()->withErrors($errors)->withInput();
            }
    
            // Verifica se o CNPJ já existe na tabela
            if (Usuario::where('ds_cnpj', $documento)->exists()) {
                $errors = ['documento' => 'CNPJ já cadastrado.'];
                return redirect()->back()->withErrors($errors)->withInput();
            }
        }
    
        $user->ds_data_nascimento = $request->input('data_nascimento');
        $user->ds_telefone = $request->input('telefone');
        $user->ds_cidade = $request->input('cidade');
        $user->ds_cep = $request->input('cep');
        $user->ds_uf = $request->input('uf');
        $user->ds_endereco = $request->input('endereco');
        $user->save();
    
        return redirect('/acesso')->with('success', 'Usuário criado com sucesso.');
    }
    
    
  

    private function ehCpf($cpf)
    {
        // Remove caracteres não numéricos do CPF    
        $cpf = preg_replace('/\D/', '', $cpf);

        // Verifica se o CPF possui 11 dígitos numéricos
        if (strlen($cpf) !== 11) {
            return false;
        }

        // Verifica se o CPF não é composto por dígitos repetidos
        if (preg_match('/^(\d)\1{10}$/', $cpf)) {
            return false;
        }

        return true;
    }

    private function ehCnpj($cnpj)
    {
        // Remove caracteres não numéricos do CPF    
        $cnpj = preg_replace('/\D/', '', $cnpj);

        // Verifica se o CNPJ possui 14 dígitos numéricos
        if (strlen($cnpj) !== 14) {
            return false;
        }

        // Verifica se o CNPJ não é composto por dígitos repetidos
        if (preg_match('/^(\d)\1{13}$/', $cnpj)) {
            return false;
        }

        return true;
    }

    
}
