<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class clienteController extends Controller
{
    function telaCadastroCliente(){
        if (session()->has("login")){
            return view("tela_cadastro_cliente");
        }else{
            return redirect()->route('tela_login');
        } 
    }

    function telaAlteracaoCliente($id){
        if (session()->has("login")){
            $cliente = Cliente::find($id);

            return view("tela_alterar_cliente", [ "u" => $cliente ]);
        }else{
            return redirect()->route('tela_login');
        } 
        
    }

    function adicionarCliente(Request $req){
        if (session()->has("login")){
            $nome = $req->input('nome');
            $endereco = $req->input('endereco');
    
            $cliente = new Cliente();
            $cliente->nome = $nome;
            $cliente->endereco = $endereco;
    
                if ($cliente->save()){
                    $msg = "Cliente $nome adicionado com sucesso.";
                } else {
                    $msg = "Cliente não foi cadastrado.";
                }
    
            return view("resultado", [ "mensagem" => $msg]);
        }else{
            return redirect()->route('tela_login');
        } 
    }

    function alterarCliente(Request $req, $id){
        if (session()->has("login")){
            $cliente = cliente::find($id);

            $nome = $req->input('nome');
            $endereco = $req->input('endereco');
            $cliente->nome = $nome;
            $cliente->endereco = $endereco;
                if ($cliente->save()){
                    $msg = "Cliente $nome alterado com sucesso.";
                } else {
                    $msg = "Cliente não foi alterado.";
                }

            return view("resultado", [ "mensagem" => $msg]);
        }else{
            return redirect()->route('tela_login');
        } 
    }

    function excluirCliente($id){
        if (session()->has("login")){
            $cliente = cliente::find($id);

                if ($cliente->delete()){
                    $msg = "Cliente $id excluído com sucesso.";
                } else {
                    $msg = "Cliente não foi excluído.";
                }

            return view("resultado", [ "mensagem" => $msg]);
        }else{
            return redirect()->route('tela_login');
        } 
    }

    function listarCliente(){
        if (session()->has("login")){
            $clientes = cliente::all();

            return view("listaCliente", [ "us" => $clientes ]);
        }else{
            return redirect()->route('tela_login');
        }       
    }
}
