<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/sobre', function () {
    return view('welcome');
});

//ROTAS DO USUARIO
Route::get('/usuario/cadastro', 'UsuarioController@telaCadastro')
	->name('usuario_cadastro');

Route::get('/usuario/alterar/{id}', 'UsuarioController@telaAlteracao')->name('usuario_update');
	
Route::post('/usuario/adicionar', 'UsuarioController@adicionar')
		->name('usuario_add');
Route::post('/usuario/alterar/{id}', 'UsuarioController@alterar')->name('usuario_alterar');

Route::get('/usuario/excluir/{id}', 'UsuarioController@excluir')->name('usuario_delete');

Route::get('/usuario/listar', 'UsuarioController@listar')->name('listar');

//ROTAS DE LOGIN
Route::get('/tela_login', 'AppController@tela_login')->name('tela_login');
Route::post('/login', 'AppController@login')->name('logar');
Route::get('/logout', 'AppController@logout')->name('logout');

//INDEX
Route::get('/index', 'AppController@index')->name('index');

//ROTAS DO CLIENTE
Route::get('/cliente/cadastro', 'ClienteController@telaCadastroCliente')
	->name('cliente_cadastro');

Route::get('/cliente/alterar/{id}', 'ClienteController@telaAlteracaoCliente')->name('cliente_update');
	
Route::post('/cliente/adicionar', 'ClienteController@adicionarCliente')
		->name('cliente_add');
Route::post('/cliente/alterar/{id}', 'ClienteController@alterarCliente')->name('cliente_alterar');

Route::get('/cliente/excluir/{id}', 'ClienteController@excluirCliente')->name('cliente_delete');

Route::get('/cliente/listar', 'ClienteController@listarCliente')->name('listarCliente');

//ROTAS DE VENDA
Route::get('venda/registro', 'VendaController@registroVenda')->name('registro');
Route::post('/venda/adicionar', 'VendaController@adicionarVenda')->name('venda_add');
Route::get('/venda/usuario/{id}', 'VendaController@vendasPorUsuario')->name('vendas_usuario');
Route::get('/venda/cliente/{id}', 'VendaController@comprasPorCliente')->name('compras_cliente');

Route::get('/venda/{id}/itens/novo', 'VendaController@telaAdicionarItem')->name('vendas_item_novo');
Route::post('/venda/{id}/itens/adicionar', 'VendaController@adicionarItem')->name('vendas_item_add');
Route::get('/venda/{id}/itens/remover/{id_produto}', 'VendaController@excluirItem')->name('vendas_item_delete');