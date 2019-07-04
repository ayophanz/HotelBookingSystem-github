<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\HotelDetails;
use Faker\Generator as Faker;

$factory->define(HotelDetails::class, function (Faker $faker) {
    $hotel_details = [
        	'name'=>'VIP Hotel', 
        	'address'=>'Corrales Avenue', 
        	'city'=>'Cagayan de oro',
        	'state'=>'Misamis Oriental',
        	'country'=> 'Phillippines',
        	'zip_code'=>'9000',
        	'phone_number'=>'123',
        	'email'=>'hotel@mail.com',
        	'image'=>'hotel_image_1.jpg',
        	'created_at' => date('Y-m-d H:i:s', time()),
			'updated_at' => date('Y-m-d H:i:s', time()) 
    ];
    return $hotel_details;
});
