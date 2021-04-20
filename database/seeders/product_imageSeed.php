<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class product_imageSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $product_image = array(
           
            array(
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'image_id' => '6ba38325-6815-4190-957e-bb773225a691',
                'product_id'=> '65f43081-21cc-4648-ad59-18230cf823a5',
            ),
            array(
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'image_id' => 'cbba6c21-c757-435c-affe-54ccb234fe8b',
                'product_id' => '0411ff5d-a2f2-40cb-b6e1-94b03cf5b3ba',
            ),
        );
        
        DB::table('product_images')->insert($product_image);
    }
}
