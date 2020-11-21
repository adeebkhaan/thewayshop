<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\User;
use App\orders;
use App\usersMessages;

class adminController extends Controller
{
    public function index(){

    	$productsCount = Products::all()->last();
    	$usersCount = User::all()->last();
    	$ordersCount = orders::all()->last();
    	return view('admin_files.index',compact('productsCount','usersCount','ordersCount'));
    }

    public function seeMessages(){

    	$messages = usersMessages::get();

    	return view('admin_files.messages',compact('messages'));
    }
}
