<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cliente;
use App\Usuario;
use App\Venda;
use App\Produto;

class VendaController extends Controller
{

    function registroVenda(){
        if (session()->has("login")){
            $clientes = Cliente::all();
            $usuarios = Usuario::all();
            return view("registra_venda",["cs" => $clientes], [ "us" => $usuarios ]);
        }else{
            return redirect()->route('tela_login');
        }
    }
    
    function adicionarVenda(Request $req){
        if (session()->has("login")){ 
            $descricao = $req->input('descricao');
            $valorTotal = $req->input('valorTotal');
            $cliente = $req->input('id_cliente');
            $vendedor = $req->input('id_usuario');

            $venda = new Venda();
            $venda->descricao = $descricao;
            $venda->valor = $valorTotal;
            $venda->id_cliente = $cliente;
            $venda->id_usuario = $vendedor;

            if ($venda->save()){
                $msg = "Venda $descricao adicionada com sucesso.";
            } else {
                $msg = "Venda não foi registrada.";
            }

            return view("resultado", [ "mensagem" => $msg]);
        }else{
            return redirect()->route('tela_login');
        }
    }

    function vendasPorUsuario($id){
        if (session()->has("login")){
            /* $id = id do usuario */
            $usuario = Usuario::find($id);
            
            return view('lista_vendas', ["usuario" => $usuario]);
        }else{
            return redirect()->route('tela_login');
        }
    }

    function comprasPorCliente($id){
        if (session()->has("login")){
            /* $id = id do cliente */
            $cliente = Cliente::find($id);
            $usuarios = Usuario::all();
            
            return view('lista_compras', ["cliente" => $cliente], [ "us" => $usuarios ]);
        }else{
            return redirect()->route('tela_login'); 
        }
    }

    function listar(){
        $vendas = Venda::all();

        return view('lista_vendas_geral', ['vendas' => $vendas]);
    }

    function itensVenda($id){
        $venda = Venda::find($id);

        return view('lista_itens_venda', ['venda' => $venda]);
    }

    function telaAdicionarItem($id){
        $venda = Venda::find($id);
        $produtos = Produto::all();

        return view('tela_cadastro_itens', 
            ['venda' => $venda, 'produtos' => $produtos]);
    }

    function adicionarItem(Request $req, $id){
        $id_produto = $req->input('id_produto');
        $quantidade = $req->input('quantidade');

        $produto = Produto::find($id_produto);
        $venda = Venda::find($id);
        $subtotal = $produto->preco * $quantidade;

        $colunas_pivot = [
            'quantidade' => $quantidade,
            'subtotal' => $subtotal
        ];

        # Adicionar item à lista e atualizar valor da venda.
        $venda->produtos()->attach($produto->id, $colunas_pivot);
        $venda->valor += $subtotal;
        $venda->save();

        return redirect()->route('vendas_item_novo', 
            ['id' => $venda->id]);
        // $venda->valor = $venda->valor + $subtotal

    }

    function excluirItem($id, $id_produto){
        $venda = Venda::find($id);
        $subtotal = 0;

        foreach($venda->produtos as $vp){
            if ($vp->id == $id_produto){
                $subtotal = $vp->pivot->subtotal;
                break;
            }
        }

        $venda->valor = $venda->valor - $subtotal; 
        $venda->produtos()->detach($id_produto);
        $venda->save();

        return redirect()->route('vendas_item_novo', 
            ['id' => $id]);
    }
}
