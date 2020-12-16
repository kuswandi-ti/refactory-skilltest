<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;

use Mail;
use App\Mail\SendMail;
use Image;

use App\User;

class UserController extends Controller
{
    public function login(Request $request)
    {    	
    	$data = User::where('email', $request->email)->first();
    	if ($data === null)
    	{
	    	$response = [
	            'success' => false,
	            'message' => 'Email tidak terdaftar !!!',
	        ];
    	}
    	else
    	{
    		if (Hash::check($request->password, $data->password))
    		{
                $response = [
		            'success' => true,
		            'message' => 'Login berhasil',
		        ];
            } 
            else
            {
                $response = [
		            'success' => false,
		            'message' => 'Password salah !!!',
		        ];
            }
    	}

    	return response()->json($response);
    }

    public function register(Request $request)
    {    	
    	$data = User::where('email', $request->email)->first();
    	if ($data === null)
    	{
	    	$users 				= new User();

	    	$users->name		= $request->name;
	        $users->email		= $request->email;
	        $users->password	= bcrypt($request->password);

	        $photo 				= $request->photo;
    		$file_path 			= public_path();
    		$image_name 		= $request->name . '.' . $this->get_file_extension($photo);
    		$img 				= Image::make($photo);
    		$img->resize(200, 200);
    		$img->save($file_path.'/'.$image_name);

	        $users->photo   	= $file_path.'/'.$image_name;

	        $saved 				= $users->save();

	        if ($saved == true)
	        {
		        $body_message = "Registrasi user berhasil";
		        Mail::to($request->email)->send(new SendMail($body_message));
	        	$response = [
		            'success' => true,
		            'message' => 'User berhasil register.',
		        ];
	        }
	        else
	        {
	        	$response = [
		            'success' => false,
		            'message' => 'User gagal register !!!',
		        ];
	        }
    	}
    	else
    	{
    		$response = [
	            'success' => false,
	            'message' => 'Email sudah terdaftar !!!',
	        ];
    	}

    	return response()->json($response);
    }

    function get_file_extension($file_name) {
		return substr(strrchr($file_name,'.'), 1);
	}
}
