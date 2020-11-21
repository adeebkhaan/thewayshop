<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banners;
use App\Category;
use App\Products;
use App\usersMessages;

class frontController extends Controller
{
    public function index(){

    	$banners = Banners::all()->sortBy('sort_order');
    	$categories = Category::with('categories')->where(['parent_id'=>0])->get();
    	$products = Products::paginate(9);

    	return view('front_files.index',compact('banners','categories','products'));
    }

    public function categories($category_id)
    {
    	$categories = Category::with('categories')->where(['parent_id'=>0])->get();
    	$products = Products::where(['category_id'=>$category_id])->get();
    	$category_name =  Category::where(['id'=>$category_id])->first();

    	return view('front_files.categories.categories',compact('categories','products','category_name'));
    }
    public function contactUs(){

        return view('front_files.contact_us');
    }
    public function getMessages(Request $request){

        $data = $request->all();

        //echo "<pre>";print_r($data);

        $message = new usersMessages;

        $message->user_name = $data['name'];
        $message->user_email = $data['email'];
        $message->user_message = $data['message'];

        $message->save();
        return redirect()->back()->with('success','Your message sent successfully!');
    }
    public function aboutUs(){

        return view('front_files.aboutUs');
    }
}
