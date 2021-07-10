<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Gara extends Model
{
    protected $table = 'races';
    protected $primaryKey ='id_gara';
    public $timestamps = false; 
    
}

?>