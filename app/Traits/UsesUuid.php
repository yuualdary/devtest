<?php
namespace App\Traits;
use illuminate\Support\Str;
trait UsesUuid{
    public static function bootUsesUuid(){
        static::creating(function ($model){
            if (! $model->getKey()){
                $model->{$model->getKeyName()}=(string) Str::uuid();//str adalah helper uuid
            }
        });
    }

    public function getIncrementing(){
        return false;
    }
    
    public function getKeyType(){
        return 'string';
    }
    
}

?>