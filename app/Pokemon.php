<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pokemon extends Model
{
    use softDeletes;
    
    protected $table = 'pokemon';
    
    protected $hidden = ['created_at','updated-at'];
    
    protected $fillable = ['name' , 'weight' , 'height' , 'image'];
    
    public $timestamps = true;
    
    public function abilityPokemon() {
        return $this->hasMany('App\AbilityPokemon');
    }
    
    public function post() {
        return $this->hasMany('App\Post');
    }

    
    
}
