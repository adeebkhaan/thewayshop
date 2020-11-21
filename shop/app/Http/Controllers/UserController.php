<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use Auth;
use Session;
use App\countries;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function userLoginRegister()
   {
   		$categories = Category::with('categories')->where(['parent_id'=>0])->get();
   		return view('front_files.users.register_login',compact('categories'));
   }
   public function userRegister(Request $request)
   {
   		if($request->isMethod('post'))
   		{
   			$data = $request->all();
   			//echo "<pre>";print_r($data);die;
   			$userCount = User::where('email',$data['email'])->count();

   			if($userCount > 0)
   			{
   				return redirect()->back()->with('error','This email already exists please use another email!');
   			}
   			else
   			{
   				$user = new User;

   				$user->name = $data['name'];
   				$user->email = $data['email'];
   				$user->password = bcrypt($data['password']);

   				$user->save();

   				if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])) 
   				{
   					Session::put('frontSession',$data['email']);
   					return redirect('/cart');
   				}
   				
   				
   			}
   		}
   }
   public function userLogout()
   {
   	Session::forget('frontSession');
   	Auth::logout();
   	return redirect('/');
   }

   public function userLogin(Request $request)
   {
   	if ($request->isMethod('post')) {
   		$data = $request->all();

   		if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])) 
   		{
			Session::put('frontSession',$data['email']);
   			return redirect('/cart');
   		}
   		else
   		{
   			return redirect()->back()->with('loginError','Invalid username or password!');
   		}
   	}
   }

   public function account()
   {
   	 $categories = Category::with('categories')->where(['parent_id'=>0])->get();
   	 return view('front_files.users.account',compact('categories'));
   }

   public function changePassword(Request $request)
   {
      if($request->isMethod('post'))
      {
         $data = $request->all();
         $old_password = User::where('id',Auth::User()->id)->first();
         $current_password = $data['current_password'];
         if(Hash::check($current_password,$old_password->password))
         {
            $new_password = bcrypt($data['new_password']);
            User::where('id',Auth::User()->id)->update(['password'=>$new_password]);

            return redirect()->back()->with('success','Password has changed successfully!');
         }
         else
         {
            return redirect()->back()->with('error','Old password is incorrect!');  
         }
      }
   	 $categories = Category::with('categories')->where(['parent_id'=>0])->get();
   	 return view('front_files.users.change_password',compact('categories'));
   }

   public function changeAddress(Request $request)
   {
       $user_id =  Auth::user()->id;
       $userDetails = User::find($user_id);

       if($request->isMethod('post'))
       {
         $data = $request->all();
         $user = User::find($user_id);
         $user->name = $data['name'];
         $user->address = $data['address'];
         $user->city = $data['city'];
         $user->country = $data['country'];
         $user->phone = $data['phone'];
         $user->pincode = $data['pincode'];

         $user->save();
         return redirect()->back()->with('success','Account details has updated successfully!');

       }
       $countries = countries::get();
   	 $categories = Category::with('categories')->where(['parent_id'=>0])->get();
   	 return view('front_files.users.change_address',compact('categories','countries','userDetails'));
   }
}
