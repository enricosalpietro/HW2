<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Preferito extends Model
{
    protected $table = 'preferiti';
    public $timestamps = false; 
    
    protected $fillable = [
        'pilota',
        'utente',
    ];

    public function users() {
        return $this->belongsTo("App\Models\User");
    }
}

?>