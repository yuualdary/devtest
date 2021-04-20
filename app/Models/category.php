<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class category extends Model
{
    use HasFactory;
    use UsesUuid;

    protected $fillable=['name','enable'];

    public function category_products(){

        return $this->hasMany(category_product::class,'id','category_id');
    }

    

}
