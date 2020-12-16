<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Mail;
use Carbon\Carbon;
use App\Mail\SendMail;

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
	        	// Dapatkan informasi user
	        	$users = DB::table('users')
			            		->where('id', '=', $user_id)
			                	->get();
			    $nama_user 	= '';
			    $email_user = '';
			    if (count($users) > 0)
		        {
		            foreach($users as $item => $values)
		            {
		                $nama_user = is_null($values->name) ? 0 : $values->name;
		                $email_user = is_null($values->email) ? 0 : $values->email;
		            }
		        }

		        // Dapatkan informasi room
	        	$rooms = DB::table('rooms')
			            		->where('id', '=', $room_id)
			                	->get();
			    $room_name 	= '';
			    if (count($rooms) > 0)
		        {
		            foreach($rooms as $item => $values)
		            {
		                $room_name = is_null($values->room_name) ? 0 : $values->room_name;
		            }
		        }

	        	$body_message = "Proses booking berhasil<br>";
	        	$body_message .= "<br>Detail informasi booking :";
	        	$body_message .= "<ul>";
	        	$body_message .= 	"<li>Nama : <b>".$nama_user."</b></li>";
	        	$body_message .= 	"<li>Room : <b>".$room_name."</b></li>";
	        	$body_message .= 	"<li>Total Person : <b>".$total_person."</b></li>";
	        	$body_message .= 	"<li>Tanggal Booking : <b>".$booking_time."</b></li>";
	        	$body_message .= 	"<li>Informasi : <b>".$noted."</b></li>";
	        	$body_message .= "</ul>";
		        Mail::to($email_user)->send(new SendMail($body_message));
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
	        	// Dapatkan informasi booking
		    	$bookings = DB::table('bookings')
				            		->where('id', '=', $booking_id)
				                	->get();
			    $user_id 		= '';
			    if (count($bookings) > 0)
		        {
		            foreach($bookings as $item => $values)
		            {
		            	$user_id 		= is_null($values->user_id) ? '' : $values->user_id;
		            }
		        }

		        // Dapatkan informasi user
		    	$users = DB::table('users')
			            		->where('id', '=', $user_id)
			                	->get();
			    $email_user = '';
			    if (count($users) > 0)
		        {
		            foreach($users as $item => $values)
		            {
		                $email_user = is_null($values->email) ? 0 : $values->email;
		            }
		        }

		        // Send email
	            $body_message = "Proses checkin berhasil<br>";
	        	$body_message .= "<br>Detail informasi checkin :";
	        	$body_message .= "<ul>";
	        	$body_message .= 	"<li>Tanggal Checkin : <b>".$request->check_in_time."</b></li>";
	        	$body_message .= 	"<li>Tanggal Checkout : <b>".$request->check_out_time."</b></li>";
	        	$body_message .= "</ul>";
		        Mail::to($email_user)->send(new SendMail($body_message));

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

    public function check_booking(Request $request)
    {
    	$booking_id 	= $request->booking_id;

    	// Dapatkan informasi booking
    	$bookings = DB::table('bookings')
		            		->where('id', '=', $booking_id)
		                	->get();
	    $booking_time 	= '';
	    $user_id 		= '';
	    if (count($bookings) > 0)
        {
            foreach($bookings as $item => $values)
            {
            	$user_id 		= is_null($values->user_id) ? '' : $values->user_id;
                $booking_time 	= is_null($values->booking_time) ? '' : $values->booking_time;
            }
        }

        // Dapatkan informasi user
    	$users = DB::table('users')
	            		->where('id', '=', $user_id)
	                	->get();
	    $email_user = '';
	    if (count($users) > 0)
        {
            foreach($users as $item => $values)
            {
                $email_user = is_null($values->email) ? 0 : $values->email;
            }
        }

        $date_now = Carbon::now();
        if (date_format(date_create($booking_time), "Y-m-d") == $date_now->toDateString())
        {
        	$body_message = "Tanggal booking anda sama dengan hari ini";
	        Mail::to($email_user)->send(new SendMail($body_message));
        	$response = [
	            'success'	=> true,
	            'message'	=> 'Tanggal booking anda sama dengan hari ini',
	        ];
        }
        else
        {
        	$response = [
	            'success'	=> true,
	            'message'	=> 'Tanggal booking anda tidak sama dengan hari ini',
	        ];
        }

        return response()->json($response);
    }
}
