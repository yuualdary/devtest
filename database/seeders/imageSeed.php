<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class imageSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $image = array(
            array(
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Controller XBOX 360 ',
                'file'=>'Sorry, I Cannot upload file using seed, can only upload on postman',
                'enable'=>'1',

               
            ),
            array(
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Monitor LG MP27G',
                'file'=>'Sorry, I Cannot upload file using seed, can only upload on postman',
                'enable'=>'1',
            ),
            array(
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'name' => 'Keyboard Razer Blackwidow 2018',
                'file'=>'Sorry, I Cannot upload file using seed, can only upload on postman',
                'enable'=>'1',
            ),
            // array(
            //     'id' => '6ba38325-6815-4190-957e-bb773225a691',
            //     'name' => 'MSI Laptop Photo',
            //     'file'=> '/photo/image/6ba38325-6815-4190-957e-bb773225a691.jpg',
            //     'enable'=>'1',
            // ),
            // array(
            //     'id' => 'cbba6c21-c757-435c-affe-54ccb234fe8b',
            //     'name' => 'Iphone 11 Photo',
            //     'file'=>'/photo/image/cbba6c21-c757-435c-affe-54ccb234fe8b.jpg',
            //     'enable'=>'1',
            // ),
        );
        
        DB::table('images')->insert($image);
    }
}
