<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;


class product_image extends Model
{
    use HasFactory;
    use UsesUuid;

    protected $fillable = ['product_id','image_id'];

    public function images(){
        
        return $this->hasOne(image::class,'id','image_id');
    }
    public function products(){
        
        return $this->hasOne(product::class,'id','product_id');
    }

}
