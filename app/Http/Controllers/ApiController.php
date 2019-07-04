<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomTypePrice;
use App\BookingManager;
use App\Http\Resources\RoomTypePriceResource;

class ApiController extends Controller
{	
	/**
	* For room type pricing
	*/
	public function pricingIndex() {
		$data = RoomTypePrice::with('hotelRef')->with('roomTypeRef')->get();		
		return RoomTypePriceResource::collection($data);
	}

	public function pricingShow($id) {
		$single_data = RoomTypePrice::where('id', $id)->with('hotelRef')->with('roomTypeRef')->get();
		return new RoomTypePriceResource($single_data);
	}

	public function pricingStore(Request $request) {
		$room_type = $request->isMethod('put') ? RoomTypePrice::findOrfail($request->id) : new RoomTypePrice();
		$room_type->hotel_id = $request->input('hotel_id');
		$room_type->room_type_id = $request->input('room_type_id');
		$room_type->room_type_price = $request->input('room_type_price');

		if($room_type->save()) {
			return new RoomTypePriceResource($room_type);
		}
	}

	public function pricingDestroy($id) {

		$single_data = RoomTypePrice::findOrfail($id);
		if($single_data->delete()) {
			return new RoomTypePriceResource($single_data);
		}
		
	}

    
    /**
	* For booking
	*/
	public function bookingStore(Request $request) {
		$booking = $request->isMethod('put') ? BookingManager::findOrfail($request->id) : new BookingManager();
		$booking->room_id      = $request->input('room_id');
		$booking->date_start   = $request->input('date_start');
		$booking->date_end     = $request->input('date_end');
		$booking->fullname     = $request->input('fullname');
		$booking->email        = $request->input('email');
		$booking->total_nights = $request->input('total_nights');
		$booking->total_price  = $request->input('total_price');
		$booking->user_id  	   = $request->input('user_id');

		if($booking->save()) {
			return new RoomTypePriceResource($booking);
		}
	}
}
