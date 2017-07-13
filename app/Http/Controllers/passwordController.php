<?php

namespace App\Http\Controllers;
use Auth;
use Validator;
use Hash;
use App\User;

use Illuminate\Http\Request;

class passwordController extends Controller
{
    public function admin_credential_rules(array $data)
	{
	  $messages = [
	    'current-password.required' => 'Please enter current password',
	    'password.required' => 'Please enter password',
	  ];

	  $validator = Validator::make($data, [
	    'current-password' => 'required',
	    'password' => 'required|same:password',
	    'password_confirmation' => 'required|same:password',     
	  ], $messages);

	  return $validator;
	}  

	public function changePassword(Request $request)
	{
	  if(Auth::Check())
	  {
	    $request_data = $request->All();
	    $validator = $this->admin_credential_rules($request_data);
	    if($validator->fails())
	    {
	      return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
	    }
	    else
	    {  
	      $current_password = Auth::User()->password;           
	      if(Hash::check($request_data['current-password'], $current_password))
	      {           
	        $user_id = Auth::User()->id;                       
	        $obj_user = User::find($user_id);
	        $obj_user->password = Hash::make($request_data['password']);;
	        $obj_user->save(); 
	        return redirect(route('setting.index'));
	      }
	      else
	      {           
	        $error = array('current-password' => 'Please enter correct current password');
	        return response()->json(array('error' => $error), 400);   
	      }
	    }        
	  }
	  else
	  {
	    return redirect(route('setting.index'));
	  }    
	}

}
