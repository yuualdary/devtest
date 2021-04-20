<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class product extends Model
{
    use HasFactory;
    use UsesUuid;

    protected $fillable=['name','description','enable'];

    public function category_products(){
        return $this->hasMany(category_product::class,'id','category_products');
    }

    public function product_images(){
        return $this->hasOne(category_product::class,'product_id','id');
    }

}
