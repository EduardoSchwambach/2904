<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    function vendas(){
    	return $this->hasMany('App\Venda', 'id_usuario', 'id');
    }
}
