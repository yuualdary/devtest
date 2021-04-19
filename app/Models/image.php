<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class image extends Model
{
    use HasFactory;
    use UsesUuid;

    protected $fillable=['name','file','enable'];

    public function product_images(){
        
        return $this->hasMany(product_image::class,'image_id','id');
    }
}
