<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoteBook extends Model
{
    //
    protected $table="notebook";
    protected $fillable=['name','body','user_id'];  
    public function user(){
        return $this->belongsTo('App\User');
    }
}