<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
}

use SoftDeletes;
protected $fillable = [
    'user_id',
    'category_id',
    'part_number',
    'name',
    'description',   
];


public function user(){
    return $this->hasOne(User::class, 'id', 'user_id');
}

public function category(){
    return $this->hasOne(Product::class, 'id', 'category');
}