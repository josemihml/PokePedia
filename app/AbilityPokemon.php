<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AbilityPokemon extends Model
{
    use SoftDeletes;
    
    protected $table = 'ability_pokemon' ;
    
    protected $hidden = ['created_at','updated_at'];
    
    protected $fillable = ['idability, idpokemon'];
    
    public function ability() {
        return $this->belongsTo('App\Ability', 'idability');
    }
    
    public function pokemon() {
        return $this->belongsTo('App\Pokemon', 'idpokemon');
    }
    
}
