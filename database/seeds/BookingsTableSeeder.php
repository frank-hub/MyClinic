<?php

use Illuminate\Database\Seeder;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        for($num = 0;$num<30;$num++){
            DB::table('bookings')->insert([
                'name'=>str_random(10),
                'email'=>str_random(10).'@gmail.com',
                'phone'=>'07272772',
                'start'=>'12/1/2017',
                'illness'=>'diabetes'
    
            ]);
        }
    }
}
