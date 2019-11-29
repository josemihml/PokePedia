<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    
    protected $table = 'comments';
    
    protected $hidden = ['created_at','updated_at'];
    
    protected $fillable = ['iduser','idpost','content'];
    
    public function post() {
        return $this->belongsTo('App\Post', 'idpost');
    }
    
    public function user() {
        return $this->belongsTo('App\User', 'iduser');
    }
    
    
}
