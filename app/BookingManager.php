<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingManager extends Model
{
    protected $fillable = [
    			'room_id', 
    			'date_start', 
    			'date_end', 
    			'fullname',
    			'email',
    			'total_nights',
    			'total_price',
    			'user_id'
    			];

    protected $with = ['roomRef'];            
    			 			
    public function roomRef() {
        return $this->belongsTo(RoomManager::class, 'room_id', 'id'); 
    }
}
