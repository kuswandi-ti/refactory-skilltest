<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;

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
	    	$users = new User();

	    	$users->name		= $request->name;
	        $users->email		= $request->email;
	        $users->password	= bcrypt($request->password);
	        $users->photo   	= $request->photo;

	        $saved = $users->save();

	        if ($saved == true)
	        {
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
}
