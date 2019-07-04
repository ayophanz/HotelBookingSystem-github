<?php

namespace App\Http\Controllers;
use App\RoomManager;
use App\BookingManager;
use App\HotelDetails;
use App\RoomTypePrice;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function SearchHotel($id) {
   		$hotel_id = array();
   		$rooms = RoomManager::where('room_type_id', $id)->get();
   		foreach ($rooms as $room) {
        if(!$room->hotelPriceRef || !$room->roomTypePriceRef) {
          array_push($hotel_id, $room->hotel_id);
        }
   		}
   		$hotels = HotelDetails::select('name', 'id')->whereIn('id', $hotel_id)->get();   
   		return response()->json($hotels);
   }

   public function ShowReservations() {
      $books = BookingManager::all();
      return response()->json(['books'=> $books]);
   }
}
