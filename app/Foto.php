<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = 'foto';
    protected $fillable=['foto','id_usuario'];

    public function usuario(){
        return $this->belongsTo('App\User','id_usuario');
    }
}
