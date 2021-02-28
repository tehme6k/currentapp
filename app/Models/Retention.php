<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retention extends Model
{
    use HasFactory;
}

use SoftDeletes;
protected $fillable = [
    'user_id',
    'poduct_id',
    'category_id',
    'date',
    'part_number',
    'lot_number',
    'exp_date',    
];

public function user(){
    return $this->hasOne(User::class, 'id', 'user_id');
}

public function category(){
    return $this->hasOne(Product::class, 'id', 'category');
}

public function product(){
    return $this->hasOne(User::class, 'id', 'product_id');
}