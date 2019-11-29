<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
     use SoftDeletes;

    protected $table = 'posts';
    
    protected $hidden = ['created_at','updated_at'];
    
    protected $fillable = ['iduser','subject','idpokemon','content'];
    
    public $timestamps=true;
    
    
    public function pokemon() {
        return $this->belongsTo('App\Pokemon' , 'idpokemon');
    }
    
    public function user() {
        return $this->belongsTo('App\User' , 'iduser');
    }
}
