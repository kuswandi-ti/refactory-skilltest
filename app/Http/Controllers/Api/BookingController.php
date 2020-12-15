<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

use App\Booking;

class BookingController extends Controller
{
    public function booking(Request $request)
    {
    	$user_id 		= $request->user_id;
    	$room_id 		= $request->room_id;    	
    	$total_person 	= (int)$request->total_person;
    	$booking_time 	= $request->booking_time;
    	$noted 			= $request->noted;

    	$room = DB::table('rooms')
	            		->where('id', '=', $room_id)
	                	->get();
	    $room_capacity = 0;
	    if (count($room) > 0)
        {
            foreach($room as $item => $values)
            {
                $room_capacity = is_null($values->room_capacity) ? 0 : (int)$values->room_capacity;
            }
        }

        if ($total_person > $room_capacity)
        {
        	$response = [
	            'success'	=> false,
	            'message'	=> 'Total person '.$total_person.' melebihi kapasitas ruangan. Maksimal person '.$room_capacity,
	        ];

        }
        else
        {
        	$bookings = new Booking();

	    	$bookings->user_id		= $user_id;
	        $bookings->room_id		= $room_id;
	        $bookings->total_person	= $total_person;
	        $bookings->booking_time	= $booking_time;
	        $bookings->noted      	= $noted;

	        $saved = $bookings->save();

	        if ($saved == true)
	        {
	        	$response = [
		            'success' 	=> true,
		            'data'	  	=> $room,
		            'message' 	=> 'Booking berhasil disimpan.',
		        ];
	        }
	        else
	        {
	        	$response = [
		            'success' 	=> false,
		            'message' 	=> 'Booking gagal disimpan !!!',
		        ];
	        }
        }

        return response()->json($response);
    }

    public function checkin(Request $request)
    {
    	$booking_id = $request->booking_id;

    	$booking = DB::table('bookings')
	            		->where('id', '=', $booking_id)
	                	->get();
	    if (count($booking) > 0)
        {
            $bookings 					= Booking::find($booking_id);
			$bookings->check_in_time 	= $request->check_in_time;
			$bookings->check_out_time 	= $request->check_out_time;
			$saved 						= $bookings->save();
			if ($saved == true)
	        {
	        	$checkin = DB::table('bookings')
	            				->where('id', '=', $booking_id)
	                			->get();
	        	$response = [
		            'success'	=> true,
		            'data'		=> $checkin,
		            'message' 	=> 'Check In berhasil disimpan.',
		        ];
	        }
	        else
	        {
	        	$response = [
		            'success' 	=> false,
		            'message' 	=> 'Check In gagal disimpan !!!',
		        ];
	        }
        }
        else
        {
        	$response = [
	            'success' 	=> false,
	            'message' 	=> 'Id Booking tidak terdaftar !!!',
	        ];
        }

        return response()->json($response);
    }
}
