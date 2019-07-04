<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $fillable = [
    			'name'
    			];

   public function roomTypeManyRef() {
        return $this->hasMany(RoomManager::class, 'id', 'room_type_id'); 
   } 			 		
}
