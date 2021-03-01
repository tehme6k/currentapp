<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    public function retentions(){
        return $this->hasMany(Ret::class);
  
    }
}
