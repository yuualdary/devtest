<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class categorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category = array(
            array(
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Controller',
                'enable'=>'1',

               
            ),
            array(
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Monitor',
                'enable'=>'1',
            ),
            array(
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Keyboard',
                'enable'=>'1',
            ),
            // array(
            //     'id' => "5edaccd6-6d1c-447e-bf37-91cabad0250a",
            //     'name' => 'Electronic',
            //     'enable'=>'1',
            // ),
            // array(
            //     'id' => "6f3879c4-9dc5-440c-9410-92bf9c432a64",
            //     'name' => 'Handphone/Tablet',
            //     'enable'=>'1',
            // ),
        );
        
        DB::table('categories')->insert($category);
    }
}
