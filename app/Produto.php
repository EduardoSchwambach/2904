<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    function usuario(){
    	return $this->belongsTo('App\Usuario', 'id_usuario', 'id');
    }

    function cliente(){
        return $this->belongsTo('App\Cliente', 'id_cliente', 'id');
    }

    function produtos(){
    	return $this->belongsToMany('App\Produto', 'produtos_vendas', 'id_venda', 'id_produto')
    	->withPivot(['id', 'quantidade', 'subtotal'])
    	->withTimestamps();
    }

    function tipo_produto(){
        return $this->belongsTo('App\Cliente', 'id_tipo', 'id');
    }
}
