<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $guarded=[];


    public function song(){
        return $this->belongsTo(Song::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
