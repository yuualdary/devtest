<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_image extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','image_id'];

    public function images(){
        
        return $this->belongsTo(image::class);
    }

}
