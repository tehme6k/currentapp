<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FGRetention extends Model
{
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function category(){
        return $this->hasOne(Category::class, 'id', 'sub_category_id');
    }

    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
