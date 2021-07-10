<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Commento extends Model
{
    public $timestamps = false;
    protected $table = 'comments';
    protected $primaryKey ='id_commento';

    protected $fillable = [
        'utente', 'commento' ,
    ];

    public function users() {
        return $this->belongsTo("App\Models\User");
    }
    /*public function gara() {
        return $this->belongsTo("App\Models\Gara");
    }*/
}

?>