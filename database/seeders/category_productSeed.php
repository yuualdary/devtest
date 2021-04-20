<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class category_productSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category_product = array(
           
            array(
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'category_id' => '5edaccd6-6d1c-447e-bf37-91cabad0250a',
                'product_id'=> '65f43081-21cc-4648-ad59-18230cf823a5',
            ),
            array(
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'category_id' => '6f3879c4-9dc5-440c-9410-92bf9c432a64',
                'product_id' => '0411ff5d-a2f2-40cb-b6e1-94b03cf5b3ba',
            ),
        );
        
        DB::table('category_products')->insert($category_product);
    }
}
