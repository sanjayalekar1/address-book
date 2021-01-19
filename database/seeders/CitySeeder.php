<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('cities')->insert([
        
            [
            'city_name' => 'Ahmednagar',
            ],
            [
            'city_name' => 'Pune',
            ],
            [
            'city_name' => 'Mumbai',
            ],
            [
            'city_name' => 'Nagpur',
            ],
            [
            'city_name' => 'Nashik',
            ],
            [
            'city_name' => 'Aurangabad',
            ],
            [
            'city_name' => 'Dhule',
            ],
            [
            'city_name' => 'Sangali',
            ],
            [
            'city_name' => 'Satara',
            ],
            [
            'city_name' => 'Kolhapur',
            ],
            [
            'city_name' => 'Beed',
            ]
            
            
       
        ]);
       
    }
}
