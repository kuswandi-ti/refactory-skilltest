<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Room;

class RoomController extends Controller
{
    public function create_room(Request $request)
    {
    	$rooms = new Room();

    	$rooms->room_name		= $request->room_name;
        $rooms->room_capacity	= $request->room_capacity;
        $rooms->photo        	= $request->photo;

        $saved = $rooms->save();

        if ($saved == true)
        {
        	$response = [
	            'success' => true,
	            'message' => 'Ruangan berhasil disimpan.',
	        ];
        }
        else
        {
        	$response = [
	            'success' => false,
	            'message' => 'Ruangan gagal disimpan !!!',
	        ];
        }

        return response()->json($response);
    }

    public function list_rooms()
    {
    	$rooms = Room::all();

    	$response = [
            'success' 	=> true,
            'data' 		=> $rooms,
        ];

        return response()->json($response);
    }
}
