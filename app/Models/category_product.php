<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class category_product extends Model
{
    use HasFactory; 
    use UsesUuid;

    protected $fillable=['product_id','category_id'];

    public function categories(){
        return $this->hasMany(category::class,'id','category_id');
    }

    public function products(){
        return $this->hasMany(product::class,'id','product_id');
    }

}
