<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{
    function telaCadastro(){
        if (session()->has("login")){
            return view("tela_cadastro_usuario");
        }else{
            return redirect()->route('tela_login');
        } 
    }

    function telaAlteracao($id){
        if (session()->has("login")){
            $usuario = Usuario::find($id);

            return view("tela_alterar_usuario", [ "u" => $usuario ]);
        }else{
            return redirect()->route('tela_login');
        }    
    }

    function adicionar(Request $req){
        if (session()->has("login")){
            $nome = $req->input('nome');
            $login = $req->input('login');
            $senha = $req->input('senha');

            $usuario = new Usuario();
            $usuario->nome = $nome;
            $usuario->login = $login;
            $usuario->senha = $senha;

            if ($usuario->save()){
                $msg = "Usuário $nome adicionado com sucesso.";
            } else {
                $msg = "Usuário não foi cadastrado.";
            }

            return view("resultado", [ "mensagem" => $msg]);
        }else{
            return redirect()->route('tela_login');
        }   
    }

    function alterar(Request $req, $id){
        if (session()->has("login")){
            $usuario = Usuario::find($id);

            $nome = $req->input('nome');
            $login = $req->input('login');
            $senha = $req->input('senha');

            $usuario->nome = $nome;
            $usuario->login = $login;
            $usuario->senha = $senha;

            if ($usuario->save()){
                $msg = "Usuário $nome alterado com sucesso.";
            } else {
                $msg = "Usuário não foi alterado.";
            }

            return view("resultado", [ "mensagem" => $msg]);
        }else{
            return redirect()->route('tela_login');
        } 
    }

    function excluir($id){
        $usuario = Usuario::find($id);

        if ($usuario->delete()){
            $msg = "Usuário $id excluído com sucesso.";
        } else {
            $msg = "Usuário não foi excluído.";
        }

        return view("resultado", [ "mensagem" => $msg]);
    }

    function listar(){
        if (session()->has("login")){
            $usuarios = Usuario::all();

            return view("lista", [ "us" => $usuarios ]);
        }else{

        return redirect()->route('tela_login');
        }
    }

}
