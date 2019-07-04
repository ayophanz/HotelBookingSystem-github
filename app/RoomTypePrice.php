<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomTypePrice extends Model
{
     protected $fillable = [
    			'room_type_id',
                'hotel_id',
                'room_type_price'
    			];
    			 		
    public function hotelRef() {
        return $this->belongsTo(HotelDetails::class, 'hotel_id', 'id'); 
    }

    public function roomTypeRef() {
        return $this->belongsTo(RoomType::class, 'room_type_id', 'id'); 
    }
}
