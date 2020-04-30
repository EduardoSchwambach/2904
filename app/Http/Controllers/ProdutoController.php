<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Tipo_produto;

class ProdutoController extends Controller
{
    function cadastro_produto(){
        if (session()->has("login")){
            $tipo_produto = Tipo_produto::all();
            return view("cadastro_produtos",["tp" => $tipo_produto]);
        }else{
            return redirect()->route('tela_login');
        }
    }
    
    function adicionar_produto(Request $req){
        if (session()->has("login")){ 
            $nome = $req->input('nome');
            $descricao = $req->input('descricao');
            $preco = $req->input('preco');
            $tipo_produto = $req->input('tipo_produto');
            $unidade = $req->input('unidade');

            $produto = new Produto();
            $produto->nome = $nome;
            $produto->descricao = $descricao;
            $produto->preco = $preco;
            $produto->tipo_produto = $tipo_produto;
            $unidade->unidade_venda = $unidade;

            if ($produto->save()){
                $msg = "produto $descricao adicionada com sucesso.";
            } else {
                $msg = "produto não foi registrada.";
            }

            return view("resultado", [ "mensagem" => $msg]);
        }else{
            return redirect()->route('tela_login');
        }
    }
}
