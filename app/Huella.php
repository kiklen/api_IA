<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Huella extends Model
{
    protected $table = 'huella';
    protected $fillable=['huella','id_usuario'];

    public function usuario(){
        return $this->belongsTo('App\User','id_usuario');
    }
}
