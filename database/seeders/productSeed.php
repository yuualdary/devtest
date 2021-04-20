<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class productSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $product = array(
            array(
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'XBOX 360 ',
                'description'=>'Controller Wireless',
                'enable'=>'1',

               
            ),
            array(
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'LG MP27G',
                'description'=> 'Monitor 27 Inch IPS',
                'enable'=>'1',
            ),
            array(
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Razer Blackwidow 2018',
                'description'=> 'Keyboard Mechanical',
                'enable'=>'1',
            ),
            array(
                'id' =>'0411ff5d-a2f2-40cb-b6e1-94b03cf5b3ba',
                'name' => 'Iphone 11 Pro',
                'description'=> 'Chipset A13 Bionic',
                'enable'=>'1',
            ),
            array(
                'id' =>'65f43081-21cc-4648-ad59-18230cf823a5',
                'name' => 'Laptop MSI ',
                'description'=> 'Interl I9-9900K',
                'enable'=>'1',
            ),
        );
        
        DB::table('products')->insert($product);
    }
}
