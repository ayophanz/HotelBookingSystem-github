<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomManager extends Model
{
    protected $fillable = [
    			'room_name', 
    			'hotel_id', 
    			'room_type_id', 
    			'room_image'
    			];


    protected $with = ['hotelRef', 'roomTypeRef', 'roomTypePriceRef', 'hotelPriceRef'];           

    public function hotelRef() {
        return $this->belongsTo(HotelDetails::class, 'hotel_id', 'id'); 
    }

    public function roomTypeRef() {
        return $this->belongsTo(RoomType::class, 'room_type_id', 'id'); 
    }

    public function hotelPriceRef() {
        return $this->belongsTo(RoomTypePrice::class, 'hotel_id', 'hotel_id'); 
    }

    public function roomTypePriceRef() {
        return $this->belongsTo(RoomTypePrice::class, 'room_type_id', 'room_type_id'); 
    }

}
