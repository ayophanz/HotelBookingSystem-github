<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HotelDetails;
use App\RoomManager;
use App\BookingManager;
use App\RoomType;
use App\RoomTypePrice;

class PagesController extends Controller
{

   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

   /**
   * Hotel Details (display page)
   */
   public function HotelDetails() {
   	$details = HotelDetails::all();
   	return view('pages.HotelDetails.HotelDetails')->with('details', $details);
   }

   /**
   * Hotel Details (Edit page)
   */
   public function EditHotelDetails($id) {
      $hotel = HotelDetails::where('id', $id)->first();

      if(!$hotel)
         return abort(404);     
      
      return view('pages.HotelDetails.EditHotelDetails')->with('hotel', $hotel);
   }

   /**
   * Room Manager (display page)
   */
   public function RoomManager() {
	   $rooms = RoomManager::all();
   	return view('pages.RoomManager.RoomManager')->with('rooms', $rooms);
   }

   /**
   * Room Manager (Add page)
   */
   public function AddRoom() {
    	$hotels = HotelDetails::all();
      $room_types = RoomType::all();
   	return view('pages.RoomManager.AddRoomManager')->with(['hotels'=>$hotels, 'room_types'=>$room_types]);
   }

   /**
   * Room Manager (Edit page)
   */
   public function EditRoom($id) {
      $room = RoomManager::where('id', $id)->first();

      if(!$room)
         return abort(404);

      $hotels = HotelDetails::select('id', 'name')->where('id', '!=', $room->hotel_id)->get();
      $room_types = RoomType::select('id', 'name')->where('id', '!=', $room->room_type_id)->get();
   	
      return view('pages.RoomManager.EditRoomManager')->with(['room'=>$room, 'hotels'=>$hotels, 'room_types'=>$room_types]);
   }

   /**
   * Room Manager (Delete page)
   */
   public function DeleteRoom($id) {
      $room = RoomManager::where('id', $id)->first();

      if(!$room)
         return abort(404);

      return view('pages.RoomManager.DeleteRoomManager')->with('room',$room);
   }



   /**
   * Room Type Manager (Display page)
   */
   public function RoomTypeManager() {
      $roomTypes = RoomType::all();
   	return view('pages.RoomTypeManager.RoomTypeManager')->with('roomTypes', $roomTypes);
   }

   /**
   * Room Type Manager (Add page)
   */
   public function AddRoomType() {
      return view('pages.RoomTypeManager.AddRoomTypeManager');
   }

   /**
   * Room Type Manager (Edit page)
   */
   public function EditRoomType($id) {
      $room_type = RoomType::where('id', $id)->first();
      
      if(!$room_type)
         return abort(404);

      return view('pages.RoomTypeManager.EditRoomTypeManager')->with('room_type', $room_type);
   }

   /**
   * Room Type Manager (Delete page)
   */
   public function DeleteRoomType($id) {
      $room_type = RoomType::where('id', $id)->first();

      if(!$room_type)
         return abort(404);

      return view('pages.RoomTypeManager.DeleteRoomTypeManager')->with('room_type', $room_type);
   }



   /**
   * Room Type Price Manager (Display page)
   */
   public function PriceListManager() {
      $room_type_price = RoomTypePrice::all();
   	return view('pages.PriceListManager.PriceListManager')->with('room_type_price', $room_type_price);
   }

   /**
   * Room Type Price Manager (Add page)
   */
   public function AddRoomTypePrice() {
      $room_types = RoomType::all();
      return view('pages.PriceListManager.AddPriceListManager')->with('room_types', $room_types);
   }

   /**
   * Room Type Price Manager (Add page)
   */
   public function EditRoomTypePrice($id) {
      $price = RoomTypePrice::where('id', $id)->first();

      if(!$price)
         return abort(404);

      $room_types = RoomType::where('id', '!=', $price->room_type_id)->get();
      $hotels = HotelDetails::where('id', '!=', $price->hotel_id)->get();
      return view('pages.PriceListManager.EditPriceListManager')->with(['hotels'=>$hotels, 'room_types'=>$room_types, 'price'=>$price]);
   }

   /**
   * Room Type Price Manager (Delete page)
   */
   public function DeleteRoomTypePrice($id) {
      $price = RoomTypePrice::where('id', $id)->first();

      if(!$price)
         return abort(404);

      return view('pages.PriceListManager.DeletePriceListManager')->with('price',$price);
   }


   /**
   * Booking Manager (Display page)
   */
   public function BookingManager() {
      $guests = BookingManager::orderBy('created_at', 'asc')->get();
   	return view('pages.BookingManager.BookingManager')->with('guests', $guests);
   }

   /**
   * Booking Manager (Display page)
   */
   public function AddBookingManager() {

      $rooms = RoomManager::all();
      return view('pages.BookingManager.AddBookingManager')->with(['rooms'=>$rooms]);
   }

   /**
   * Booking Manager (Edit page)
   */
   public function EditBookingManager($id) {
      $guest = BookingManager::where('id', $id)->first();

      if(!$guest)
         return abort(404);

      $price = RoomTypePrice::where('room_type_id', $guest->roomRef->roomTypeRef->id)
               ->where('hotel_id', $guest->roomRef->hotelRef->id)
               ->first();

      $rooms = RoomManager::where('id','!=', $guest->room_id)->get();
      return view('pages.BookingManager.EditBookingManager')->with(['rooms'=>$rooms, 'guest'=>$guest, 'price'=>$price ]);
   }

   /**
   * Booking Manager (Delete page)
   */
   public function DeleteBookingManager($id) {
      $guest =  BookingManager::where('id', $id)->first();

      if(!$guest)
         return abort(404);

      $price = RoomTypePrice::where('room_type_id', $guest->roomRef->roomTypeRef->id)
               ->where('hotel_id', $guest->roomRef->hotelRef->id)
               ->first();
      return view('pages.BookingManager.DeleteBookingManager')->with(['guest'=>$guest, 'price'=>$price]);
   }

}
