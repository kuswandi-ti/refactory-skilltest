<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Image;

use App\Room;

class RoomController extends Controller
{
    public function create_room(Request $request)
    {
    	$rooms = new Room();

    	$rooms->room_name		= $request->room_name;
        $rooms->room_capacity	= $request->room_capacity;

        $photo                  = $request->photo;
        $file_path              = public_path();
        $image_name             = time() . '.' . $this->get_file_extension($photo);
        $img                    = Image::make($photo);
        $img->resize(200, 200);
        $img->save($file_path.'/'.$image_name);

        $rooms->photo        	= $file_path.'/'.$image_name;

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

    function get_file_extension($file_name) {
        return substr(strrchr($file_name,'.'), 1);
    }
}
