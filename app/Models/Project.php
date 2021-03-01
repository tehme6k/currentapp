<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
}

use SoftDeletes;
protected $fillable = [
    'user_id',
    'base_id',
    'secondary_id',
    'version', 
];


public function user(){
    return $this->hasOne(User::class, 'id', 'user_id');
}

public function base(){
    return $this->hasOne(Category::class, 'id', 'base_id');
}

public function secondary(){
    return $this->hasOne(Category::class, 'id', 'secondary_id');
}