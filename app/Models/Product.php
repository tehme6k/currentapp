<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;


use SoftDeletes;
protected $fillable = [
    'user_id',
    'category_id',
    'sub_category_id',
    'part_number',
    'name', 
];


public function user(){
    return $this->hasOne(User::class, 'id', 'user_id');
}

public function category(){
    return $this->hasOne(Category::class, 'id', 'category_id');
}

public function sub(){
    return $this->hasOne(SubCategory::class, 'id', 'sub_category_id');
}

}