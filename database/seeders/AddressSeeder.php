<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
        
            [
                'first_name' => 'Sanjay',
                'last_name' => 'Alekar',
                'profile_pic' => 'default.png',
                'email' => 'sanjayalekar1@gmail.com',
                'phone' => '9421560096',
                'street' => 'Pargaon Road',
                'zip_code' => '413701',
                'city' => '1',
                'created_at' => Carbon::now()
            ],
            [
                'first_name' => 'Satish',
                'last_name' => 'Rasal',
                'profile_pic' => 'default.png',
                'email' => 'satish@mail.com',
                'phone' => '9421560097',
                'street' => 'Karve Road',
                'zip_code' => '411010',
                'city' => '2',
                'created_at' => Carbon::now()
            ],
            [
                'first_name' => 'Amit',
                'last_name' => 'Jadhav',
                'profile_pic' => 'default.png',
                'email' => 'amit@mail.com',
                'phone' => '9421560098',
                'street' => 'MG Road',
                'zip_code' => '411011',
                'city' => '3',
                'created_at' => Carbon::now()
            ],
            [
                'first_name' => 'Nagesh',
                'last_name' => 'Pandhare',
                'profile_pic' => 'default.png',
                'email' => 'nagesh@mail.com',
                'phone' => '9421560099',
                'street' => 'Malusare Street',
                'zip_code' => '411012',
                'city' => '11',
                'created_at' => Carbon::now()
            ]
       
        ]);
    }
}
