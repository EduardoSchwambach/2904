<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_produto extends Model
{
    function produtos(){
        return $this->belongsTo('App\Tipo_produto', 'id_produto', 'id');
    }
}
