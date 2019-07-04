<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 1)->create();
        factory(App\HotelDetails::class, 1)->create();

        $room_type = [
        	[
        	'name'=>'Deluxe', 
        	'created_at' => date('Y-m-d H:i:s', time()),
			'updated_at' => date('Y-m-d H:i:s', time())
        	],
        	[
        	'name'=>'Standard', 
        	'created_at' => date('Y-m-d H:i:s', time()),
			'updated_at' => date('Y-m-d H:i:s', time()),
        	],
        	[
        	'name'=>'Queen',
        	'created_at' => date('Y-m-d H:i:s', time()),
			'updated_at' => date('Y-m-d H:i:s', time()) 
        	]
        ];
        DB::table('room_types')->insert($room_type);

		$rooms = [[],[]];
		$alp = ['A','B','C','D','E','F','G','H','I','J'];
		$count = 1;
        for ($i=0;$i<10;$i++) { 
        	$rooms[$i]['room_name'] = 'Room '.$alp[$i];
        	$rooms[$i]['hotel_id'] = 1;
        	$rooms[$i]['room_type_id'] = $count;
        	$rooms[$i]['room_image'] ='noimage.jpg';
        	$rooms[$i]['created_at'] = date('Y-m-d H:i:s', time());
        	$rooms[$i]['updated_at'] = date('Y-m-d H:i:s', time());
        	$count = (($count>=3)? 1 : $count+=1);
        }
        DB::table('room_managers')->insert($rooms);

        $prices = [[],[]];
		$count = 1;
        for ($i=0;$i<10;$i++) { 
        	$prices[$i]['room_type_id'] = $i+1;
        	$prices[$i]['hotel_id'] = 1;
        	$prices[$i]['room_type_price'] = $count*100;
        	$prices[$i]['created_at'] = date('Y-m-d H:i:s', time());
        	$prices[$i]['updated_at'] = date('Y-m-d H:i:s', time());
        	$count = (($count>=3)? 1 : $count+=1);
        }
        DB::table('room_type_prices')->insert($prices);


        $count = 1;
        $count2 = 0;
        $start_day = 1;
        $end_day = 3;
        $names = ['Julia Morris','Matt Demon','Saitam kon','Evan yu','Gon kon','Killua Kon','Genos Kon','Naruto Uzumaki','Itachi Uchiha','Sakura Haruka'];
        $bookings = [[],[]];
        for ($i=0;$i<10;$i++) { 
        	if($start_day>=26) $count2 = 0;
           	$start_day = ($count2 += $count);
        	$end_day = ($count2 += ($count+1));
        	$bookings[$i]['room_id'] = $i+1;
        	$bookings[$i]['date_start'] = '07/'.$start_day.'/2019';
        	$bookings[$i]['date_end'] = '07/'.$end_day.'/2019';
        	$bookings[$i]['fullname'] = $names[$i];
        	$bookings[$i]['email'] = Str::random(10).'@yopmail.com';
        	$bookings[$i]['total_nights'] = $count+1;
        	$bookings[$i]['total_price'] = ($end_day-$start_day)*($count*100);
        	$bookings[$i]['created_at'] = date('Y-m-d H:i:s', time());
			$bookings[$i]['updated_at'] = date('Y-m-d H:i:s', time());
			$count = (($count>=3)? 1 : $count+=1); 
        }
        DB::table('booking_managers')->insert($bookings);     	

    }
}
