<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelDetails extends Model
{
    protected $fillable = [
    			'name', 
    			'address', 
    			'city', 
    			'state',
    			'country',
    			'zip_code',
    			'phone_number',
    			'email',
    			'image'
    			];

    public function hotelManyRef() {
        return $this->belongsTo(RoomManager::class, 'id', 'hotel_id'); 
    }			 			

}
