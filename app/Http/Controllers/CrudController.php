<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\RoomManager;
use App\BookingManager;
use App\RoomType;
use App\HotelDetails;
use App\RoomTypePrice;
use Validator;

class CrudController extends Controller
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
	* Hotel Details (update data)
	*/
    public function UpdateHotelDetails(Request $request, $id) {
    	$data_request = [
            'hotel_name'         => 'required',
    		'hotel_address'      => 'required',
    		'hotel_city'         => 'required',
    		'hotel_state'        => 'required',
    		'hotel_country'      => 'required',
    		'hotel_zip_code'     => 'required',
    		'hotel_phone_number' => 'required',
    		'hotel_email'        => 'required|email',
    		'hotel_image'        => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
        $validator = validator::make($request->all(), $data_request);
        if($validator->fails()) {
            $data_request = [
            	'hotel_name'         => request('hotel_name'),
	    		'hotel_address'      => request('hotel_address'),
	    		'hotel_city'         => request('hotel_city'),
	    		'hotel_state'        => request('hotel_state'),
	    		'hotel_country'      => request('hotel_country'),
	    		'hotel_zip_code'     => request('hotel_zip_code'),
	    		'hotel_phone_number' => request('hotel_phone_number'),
	    		'hotel_email'        => request('hotel_email'),
    			'room_image' => 'noimage.jpg',
                'error'      => 'Something went wrong please see below.',
                'errors'     => $validator->errors()
            ];
            return back()->with($data_request);
        }

        HotelDetails::where('id', $id)->update([
        	'name'         => request('hotel_name'),
    		'address'      => request('hotel_address'),
    		'city'         => request('hotel_city'),
    		'state'        => request('hotel_state'),
    		'country'      => request('hotel_country'),
    		'zip_code'     => request('hotel_zip_code'),
    		'phone_number' => request('hotel_phone_number'),
    		'email'        => request('hotel_email')
        ]);

        if($request->hasFile('hotel_image')) {
        	$filenameWithExt = $request->file('hotel_image')->getClientOriginalName();
        	$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        	$extension = $request->file('hotel_image')->getClientOriginalExtension();
        	$fileNameToStore = $filename.'_'.$id.'.'.$extension;
        	$path = $request->file('hotel_image')->storeAs('public/upload/hotelImage', $fileNameToStore);
        	 HotelDetails::where('id', $id)->update(['hotel_image'=>$fileNameToStore]);
        }

        return back()->with('success','Item updated successfully!');
    }



	/**
	* Room Manager (save data)
	*/
    public function SaveRoom(Request $request) {

    	$data_request = [
            'room_name'   => 'required',
    		'hotel_id'    => 'required',
    		'room_type'   => 'required',
    		'room_image'  => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ];
        $validator = validator::make($request->all(), $data_request);
        if($validator->fails()) {
            $data_request = [
            	'room_name'  => request('room_name'),
            	'room_type'  => request('room_type'),
            	'hotel_id'  => request('hotel_id'),
                'error'      => 'Something went wrong please see below.',
                'errors'     => $validator->errors()
            ];
            return back()->with($data_request);
        }

        $room = RoomManager::create([
    		'room_name'   => request('room_name'),
    		'hotel_id'    => request('hotel_id'),
    		'room_type_id'   => request('room_type'),
    		'room_image'   => 'noimage.jpg',
    	]);

       	
        if($request->hasFile('room_image')) {
        	$filenameWithExt = $request->file('room_image')->getClientOriginalName();
        	$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        	$extension = $request->file('room_image')->getClientOriginalExtension();
        	$fileNameToStore = $filename.'_'.$room->id.'.'.$extension;
        	$path = $request->file('room_image')->storeAs('public/upload/roomImage', $fileNameToStore);
        	 RoomManager::where('id', $room->id)->update(['room_image'=>$fileNameToStore]);
        }
       
    	return back()->with('success','Item created successfully!');
    }


    /**
	* Room Manager (update data)
	*/
    public function UpdateRoom(Request $request, $id) {
    	$data_request = [
            'room_name'   => 'required',
    		'hotel_id'    => 'required',
    		'room_type'   => 'required',
    		'room_image'  => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
        $validator = validator::make($request->all(), $data_request);
        if($validator->fails()) {
            $data_request = [
            	'room_name'  => request('room_name'),
    			'hotel_id'   => request('hotel_id'),
    			'room_type'  => request('room_type'),
    			'room_image' => 'noimage.jpg',
                'error'      => 'Something went wrong please see below.',
                'errors'     => $validator->errors()
            ];
            return back()->with($data_request);
        }

        RoomManager::where('id', $id)->update([
        	'room_name'   => request('room_name'),
    		'hotel_id'    => request('hotel_id'),
    		'room_type_id'   => request('room_type')
        ]);

        if($request->hasFile('room_image')) {
        	$filenameWithExt = $request->file('room_image')->getClientOriginalName();
        	$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        	$extension = $request->file('room_image')->getClientOriginalExtension();
        	$fileNameToStore = $filename.'_'.$id.'.'.$extension;
        	$path = $request->file('room_image')->storeAs('public/upload/roomImage', $fileNameToStore);
        	 RoomManager::where('id', $id)->update(['room_image'=>$fileNameToStore]);
        }

        return back()->with('success','Item updated successfully!');
    }

    /**
	* Room Manager (delete data)
	*/
    public function DeletingRoom($id) {
    	$room = RoomManager::where('id', $id)->first();
    	if($room->room_image!='noimage.jpg') {
    		unlink(storage_path('app/public/upload/roomImage/'.$room->room_image));
    	}
    	RoomManager::where('id', $id)->delete();

    	return redirect('/room-manager')->with('success','Item delete successfully!');
    }



    /**
	* Room Type Manager (save data)
	*/
	public function SaveRoomType(Request $request) {
		$data_request = [
            'room_type_name'   => 'required'
        ];
        $validator = validator::make($request->all(), $data_request);
        if($validator->fails()) {
            $data_request = [
                'error' => 'Something went wrong please see below.',
                'errors'=> $validator->errors()
            ];
            return back()->with($data_request);
        }

        RoomType::create([
    		'name' => request('room_type_name')
    	]);

        return back()->with('success','Item created successfully!');
	}

	/**
	* Room Manager (update data)
	*/
    public function UpdateRoomType(Request $request, $id) {
    	$data_request = [
            'room_type_name' => 'required',
        ];
        $validator = validator::make($request->all(), $data_request);
        if($validator->fails()) {
            $data_request = [
            	'room_type_name'=> request('room_type_name'),
                'error'         => 'Something went wrong please see below.',
                'errors'        => $validator->errors()
            ];
            return back()->with($data_request);
        }

        RoomType::where('id', $id)->update([
        	'name'   => request('room_type_name')
        ]);
    	return back()->with('success','Item updated successfully!');
    }

    /**
	* Room Type Manager (delete data)
	*/
    public function DeletingRoomType($id) {

    	RoomType::where('id', $id)->delete();

    	return redirect('/room-type-manager')->with('success','Item delete successfully!');
    }

    /**
	* Price List Manager (save data)
	*/
    public function SaveRoomTypePrice(Request $request) {
    	$data_request = [
            'room_type_price' => 'required',
            'room_type' 	  => 'required',
            'hotel' 	   	  => 'required'
        ];
        $validator = validator::make($request->all(), $data_request);
        if($validator->fails()) {
            $data_request = [
                'error' => 'Something went wrong please see below.',
                'errors'=> $validator->errors()
            ];
            return back()->with($data_request);
        }

        RoomTypePrice::create([
    		'room_type_price' => request('room_type_price'),
    		'hotel_id'        => request('hotel'),
    		'room_type_id'    => request('room_type')
    	]);

        return back()->with('success','Item created successfully!');
    }

    /**
	* Price List Manager (update data)
	*/
    public function UpdateRoomTypePrice(Request $request, $id) {
    	$data_request = [
            'room_type_id'    => 'required',
            'hotel_id'        => 'required',
            'room_type_price' => 'required'
        ];
        $validator = validator::make($request->all(), $data_request);
        if($validator->fails()) {
            $data_request = [
            	'room_type_price'=> request('room_type_price'),
                'error'         => 'Something went wrong please see below.',
                'errors'        => $validator->errors()
            ];
            return back()->with($data_request);
        }

        RoomTypePrice::where('id', $id)->update([
        	'room_type_id'    => request('room_type_id'),
        	'hotel_id'        => request('hotel_id'),
        	'room_type_price' => request('room_type_price')
        ]);
    	return back()->with('success','Item updated successfully!');
    }

    /**
	* Price List Manager (delete data)
	*/
    public function DeletingRoomTypePrice($id) {
    	RoomTypePrice::where('id', $id)->delete();
    	return redirect('/price-list-manager')->with('success','Item deleted successfully!');
    }




    /**
	* Booking Manager (save data)
	*/
    public function SaveBookingManager(Request $request) {
    	$data_request = [
            'room_name'    => 'required',
            'date_range'   => 'required',
            'fullname'     => 'required',
            'email' 	   => 'required|email',
            'total_nights' => 'required',
            'total_price'  => 'required'
        ];
        $validator = validator::make($request->all(), $data_request);
        if($validator->fails()) {
            $data_request = [
            	'room_name'    => request('room_name'),
	            'date_range'   => request('date_range'),
	            'fullname'     => request('fullname'),
	            'email' 	   => request('email'),
	            'total_nights' => request('total_nights'),
	            'total_price'  => request('total_price'),
                'error' => 'Something went wrong please see below.',
                'errors'=> $validator->errors()
            ];
            return back()->with($data_request);
        }

        $date_range = explode('-', request('date_range'));
        BookingManager::create([
    		'room_id'      => request('room_name'),
            'date_start'   => $date_range[0],
            'date_end'     => $date_range[1],
            'fullname'     => request('fullname'),
            'email' 	   => request('email'),
            'total_nights' => request('total_nights'),
            'total_price'  => request('total_price'),
    	]);

        return back()->with('success','Item created successfully!');
    }

    /**
	* Booking Manager (update data)
	*/
    public function UpdateBookingManager(Request $request, $id) {
    	$data_request = [
            'room_name'    => 'required',
            'date_range'   => 'required',
            'fullname'     => 'required',
            'email' 	   => 'required|email',
            'total_nights' => 'required',
            'total_price'  => 'required'
        ];
        $validator = validator::make($request->all(), $data_request);
        if($validator->fails()) {
            $data_request = [
            	'room_name'    => request('room_name'),
	            'date_range'   => request('date_range'),
	            'fullname'     => request('fullname'),
	            'email' 	   => request('email'),
	            'total_nights' => request('total_nights'),
	            'total_price'  => request('total_price'),
                'error' => 'Something went wrong please see below.',
                'errors'=> $validator->errors()
            ];
            return back()->with($data_request);
        }

        $date_range = explode('-', request('date_range'));
        BookingManager::where('id', $id)->update([
    		'room_id'      => request('room_name'),
            'date_start'   => $date_range[0],
            'date_end'     => $date_range[1],
            'fullname'     => request('fullname'),
            'email' 	   => request('email'),
            'total_nights' => request('total_nights'),
            'total_price'  => request('total_price')
    	]);

        return back()->with('success','Item updated successfully!');
    }

    /**
	* Booking Manager (delete data)
	*/
    public function DeletingBookingManager($id) {
    	BookingManager::where('id', $id)->delete();
    	return redirect('/booking-manager')->with('success','Item deleted successfully!');
    }


}
