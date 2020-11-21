<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Products;
use App\Category;
use App\products_attributes;
use Session;
use App\Cart;
use DB;
use App\countries;
use Auth;
use App\User;
use App\delivery_addresses;
use App\orders;
use App\ordered_products;

class productsController extends Controller
{
    public function addProduct(Request $request)
    {
    	if ($request->ismethod('post')) 
        {

    		$data = $request->all();

            // validation

            $this->validate($request,[

                'category_id' => 'required',
                'product_name' => 'required',
                'product_code' => 'required',
                'product_colour' => 'required',
                'product_description' => 'required',
                'product_price' => 'required',
                'product_image' => 'required'
            ]);


    		$product = new Products;

            $product->category_id = $data['category_id'];
    		$product->product_name = $data['product_name'];
    		$product->product_code = $data['product_code'];
    		$product->product_colour = $data['product_colour'];
    		$product->product_description = $data['product_description'];
    		$product->product_price = $data['product_price'];

            // upload image

            if ($request->hasfile('product_image'))
            {
                
               $file = $request->file('product_image');

                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/products/',$filename);


                $product->product_image = $filename;
            }

            $product->save();

            return redirect('/admin/all-products')->with('success','Product has been added successfully!');


    	}
        // Categories Dropdown menu code

        $categories = Category::where(['parent_id'=> 0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach ($categories as $cat) {
            
            $categories_dropdown .="<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
            foreach($sub_categories as $sub_cat) {

                $categories_dropdown .="<option value='".$sub_cat->id."'>&nbsp;--&nbsp".$sub_cat->name."</option>";
            }

        }

    	return view('admin_files.products.addProduct',compact('categories_dropdown'));
    }

    // All products

    public function allProducts()
    {
        $data = Products::all();

        return view('admin_files.products.allproducts',compact('data'));
    }

    // Edit Product

    public function editProduct(Request $request,$id){

        if ($request->ismethod('post')) 
        {

            $data = $request->all();

            // validation

            $this->validate($request,[

                'product_name' => 'required',
                'product_code' => 'required',
                'product_colour' => 'required',
                'product_description' => 'required',
                'product_price' => 'required'
            ]);


            $product =  Products::find($id);

            $product->category_id = $data['category_id'];
            $product->product_name = $data['product_name'];
            $product->product_code = $data['product_code'];
            $product->product_colour = $data['product_colour'];
            $product->product_description = $data['product_description'];
            $product->product_price = $data['product_price'];

            // upload image

            if ($request->hasfile('product_image'))
            {
                
               $file = $request->file('product_image');

                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/products/',$filename);


                $product->product_image = $filename;

                
            }
           

             $product->save();

            return redirect('admin/all-products')->with('success','Product has been updated successfully!');
           

        }

        $product = Products::find($id);

        // Categories Dropdown menu code

        $categories = Category::where(['parent_id'=> 0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach ($categories as $cat) 
        {
            
            if($cat->id == $product->category_id)
            {

                $selected = "selected";
            }else
            {
                $selected = "";
            }
        
            $categories_dropdown .="<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
           
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();

                foreach($sub_categories as $sub_cat)
                {
                if($sub_cat->id == $product->category_id)
                {
 
                    $selected = "selected";
                }else
                {
                    $selected = "";
                }
                $categories_dropdown .="<option value='".$sub_cat->id."' ".$selected.">&nbsp;--&nbsp".$sub_cat->name."</option>";
             }
        }
        return view('admin_files.products.editProduct',compact('product','id','categories_dropdown'));
    }

    // Delete Product

    public function deleteProduct($id){

        $product = Products::find($id);

        $product->delete();

        return redirect()->back()->with('success','Product has been deleted!');
    }

    // Product Details

    public function products($id){

        $productDetails = Products::with('attributes')->where('id',$id)->first();
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();

        return view('front_files.products.product_details',compact('productDetails','categories'));
    }

    // Product Attributes

    public function addAttributes(Request $request,$id)
    {
        $productDetails = Products::with('attributes')->where('id',$id)->first();

        if($request->isMethod('post'))
        {
            $data = $request->all();
            //echo "<pre>";print_r($data);die;
            foreach ($data['sku'] as $key => $val) 
            {
                
                if(!empty($val))
                {
                    // Prevent Duplication

                    $attrCountSku = products_attributes::where('sku',$val)->count();
                        if($attrCountSku > 0)
                        {
                            return redirect('admin/add-product-attributes/'.$id)->with('error','SKU already exists please add another sku!');
                        }
                    $attrCountSize = products_attributes::where(['product_id'=>$id, 'size'=>$data['size'][ $key ]])->count(); 
                         if($attrCountSize > 0)
                        {
                            return redirect('admin/add-product-attributes/'.$id)->with('error',''.$data['size'][$key].' Size already exists please add another size');
                        }
                    $attribute = new products_attributes;
                    
                    $attribute->product_id = $id;
                    $attribute->sku = $val;
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];  
                        
                    $attribute->save(); 
                }
            }
            return redirect('admin/add-product-attributes/'.$id)->with('success','Attributes have added successfully!');
        }
        return view('admin_files.products.add_attributes',compact('productDetails'));
    }

    // Delete Products Attributes

    public function deleteAttributes($id)
    {
        $attribute = products_attributes::find($id);
        $attribute->delete();

      return redirect()->back()->with('success','Attribute has deleted!');   
    }

    // Edit Products Attribute

    public function editAttributes(Request $request,$id)
    {
        if ($request->ismethod('post')) {
            
            $data = $request->all();
            foreach ($data['attr'] as $key => $attr) {
                
                products_attributes::where(['id' => $data['attr'][$key]])->update(['sku'=>$data['sku'][$key],
                    'size'=>$data['size'][$key],'price'=>$data['price'][$key],'stock'=>$data['stock'][$key]]);
            }
            return redirect()->back()->with('success','Attributes have updated successfully');
        }
    }

    // Get Product Price

    public function getprice(Request $request)
    {

       $data = $request->all();
       
       $proArr = explode("-",$data['idSize']);
       $proAttr = products_attributes::where(['product_id'=>$proArr[0],'size'=>$proArr[1]])->first();
       echo $proAttr->price;
    }

    // Add to Cart

    public function addToCart(Request $request)
    {
        $data = $request->all();

        $this->validate($request,[

            'product_size' => 'required',
        ]);

        if (empty($data['user_email'])) 
        {
            $data['user_email'] = '';
        }
        $session_id = Session::get('session_id');
        if (empty($session_id)) 
        {
             $session_id = Str::random(40);
             Session::put('session_id',$session_id);
        }
        $sizeArr = explode('-',$data['product_size']);

        $countProducts =  DB::table('carts')->where(['product_id'=>$data['product_id'],'product_colour'=>$data['product_colour'],'product_price'=>$data['product_price'],'product_size'=>$sizeArr[1],'session_id'=>$session_id])->count();

        if ($countProducts > 0) 
        {
           return redirect()->back()->with('error','This Product already exists in cart!');
        }
        else
        {
        DB::table('carts')->insert(['product_id'=>$data['product_id'],'product_name'=>$data['product_name'],'product_colour'=>$data['product_colour'],'product_size'=>$sizeArr[1],'product_quantity'=>$data['product_quantity'],'product_code'=>$data['product_code'],'product_price'=>$data['product_price'],'user_email'=>$data['user_email'],'session_id'=>$session_id]);
        
            return redirect('/cart')->with('success','Product has added to cart successfully!');
        }
    }
   
   // Cart

    public function cart(Request $request)
    {
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        $session_id = Session::get('session_id');
        $userCart = DB::table('carts')->where(['session_id'=>$session_id])->get();
        
        foreach ($userCart as $key => $products) {
            
            $productDetails = Products::where(['id'=>$products->product_id])->first();
            $userCart[$key]->product_image = $productDetails->product_image;
        }
      
        return view('front_files.products.cart',compact('categories','userCart','session_id'));
    }
    // Remove Cart Product

    public function removeCartProduct($id)
    {
        $product = Cart::find($id);

        $product->delete();

        return redirect()->back()->with('success','Product has removed from cart!');
    }
    // Update Product Quantity

    public function updateProductQuantity($id,$quantity)
    {
        DB::table('carts')->where('id',$id)->increment('product_quantity',$quantity);

        return redirect('/cart')->with('success','Product quantity has updated successfully!');
    }

    // Checkout

    public function checkout(Request $request)
    {
        $user_id =  Auth::user()->id;
        $user_email = Auth::user()->email;
        $shippingDetails = delivery_addresses::where('user_id',$user_id)->first();

        $userDetails = User::find($user_id);
        $countries = countries::get();

        // check if shipping address exits
        $shippingCount = delivery_addresses::where('user_id',$user_id)->count();
        $shippingDetails = array();
        if ($shippingCount > 0)
        {
            $shippingDetails = delivery_addresses::where('user_id',$user_id)->first();

        }
        //Update Cart Table With Email 

        $session_id = Session::get('session_id');
        DB::table('carts')->where(['session_id'=>$session_id])->update(['user_email'=>$user_email]);
         
        if($request->isMethod('post'))
        {
            $data = $request->all();
            // update user details 
            User::where('id',$user_id)->update(['name'=>$data['billing_name'],'address'=>$data['billing_address'],'city'=>$data['billing_city'],'country'=>$data['billing_country'],'phone'=>$data['billing_phone'],'pincode'=>$data['billing_pincode']]);

            if ($shippingCount > 0) 
            {
                delivery_addresses::where('user_id',$user_id)->update(['name'=>$data['shipping_name'],'address'=>$data['shipping_address'],'city'=>$data['shipping_city'],'country'=>$data['shipping_country'],'phone'=>$data['shipping_phone'],'pincode'=>$data['shipping_pincode']]);
            }
            else
            {
                // new shipping address
                $shipping = new delivery_addresses;

                $shipping->user_id = $user_id;
                $shipping->user_email = $user_email;
                $shipping->name = $data['shipping_name'];
                $shipping->address = $data['shipping_address'];
                $shipping->city = $data['shipping_city'];
                $shipping->country = $data['shipping_country'];
                $shipping->phone = $data['shipping_phone'];
                $shipping->pincode = $data['shipping_pincode'];

                $shipping->save();
            }
                return redirect('/order-review');
        }
        return view('front_files.products.checkout',compact('userDetails','countries','shippingDetails'));
    }

    // Order Review

    public function orderReview()
    {
        $session_id = Session::get('session_id');
        $user_id =  Auth::user()->id;
        $shippingDetails = delivery_addresses::where('user_id',$user_id)->first();
        $userDetails = User::find($user_id);
        $countries = countries::get();
        $userCart = DB::table('carts')->where(['session_id'=>$session_id])->get();
        
        foreach ($userCart as $key => $products) {
            
            $productDetails = Products::where(['id'=>$products->product_id])->first();
            $userCart[$key]->product_image = $productDetails->product_image;
        }
        return view('front_files.orders.order_review',compact('userDetails','countries','shippingDetails','userCart'));
    }
    public function placeOrder(Request $request){
        
        if($request->isMethod('post')){
            
            $user_id = Auth::user()->id;
            $user_email = Auth::user()->email;
            $data = $request->all();

            $shippingDetails = delivery_addresses::where(['user_email'=>$user_email])->first();

           // Getting user shipping details

            $order = new orders;

            $order->user_id = $user_id;
            $order->user_email = $user_email;
            $order->name = $shippingDetails->name;
            $order->address = $shippingDetails->address;
            $order->city = $shippingDetails->city;
            $order->country = $shippingDetails->country;
            $order->phone = $shippingDetails->phone;
            $order->pincode = $shippingDetails->pincode;
            $order->order_status = "new";
            $order->payment_method = $data['payment_method'];
            $order->grand_total = $data['grand_total'];

            $order->save();

            $order_id = DB::getPdo()->lastinsertID();
            $cartProducts = DB::table('carts')->where(['user_email'=>$user_email])->get();

            foreach($cartProducts as $product){

                $cartPro = new ordered_products;

                $cartPro->order_id = $order_id;
                $cartPro->user_id = $user_id;
                $cartPro->product_id = $product->product_id;
                $cartPro->product_code = $product->product_code;
                $cartPro->product_name = $product->product_name;
                $cartPro->product_size = $product->product_size;
                $cartPro->product_price = $product->product_price;
                $cartPro->product_quantity = $product->product_quantity;

                $cartPro->save();
                
            }
            Session::put('order_id',$order_id);
            Session::put('grand_total',$data['grand_total']);

            if($data['payment_method'] == 'Cash on Delivery'){

                return redirect('/thanks');    
            }
            else{

                 return redirect('/stripe'); 
            }
            

        }
    }

    public function thanks(){

        $user_email = Auth::user()->email;
        DB::table('carts')->where('user_email',$user_email)->delete();

        return view('front_files.orders.thanks');
    }
    public function stripe(Request $request){
         $user_email = Auth::user()->email;
         DB::table('carts')->where('user_email',$user_email)->delete();
         if ($request->ismethod('post')) {
          
            $data = $request->all();

            //echo "<pre>";print_r($data);die;

            \Stripe\Stripe::setApiKey('sk_test_51HNE9kHFGm1B1AUmZttpNCCFYgbhHe9kAjRLI0azqbVwRyxxx4YOYBPqWrDsMZPr3FeAVdUCeSfLzc2qC3qITe6J00QSt9huYZ');

            $token = $_POST['stripeToken'];
            $charge = \Stripe\charge::Create([

                'amount' => $request->input('total_amount'),
                'currency' => 'usd',
                'description' => $request->input('name'),
                'source' => $token,
            ]);
            //dd($charge);
            return redirect()->back()->with('success','Your payment has done successfully!');
         }
        return view('front_files.orders.stripe');
    }

    public function userOrders(){

        $user_id = Auth::user()->id;
        $Orders = orders::with('user_orders')->where('user_id',$user_id)->get();
        
        return view('front_files.orders.userOrders',compact('Orders'));
    }
    
    public function viewOrders(){

        $Orders = orders::with('user_orders')->get();

        return view('admin_files.orders.viewOrders',compact('Orders'));
    }
    public function viewOrdersDetails($order_id){

        $orderDetails = orders::with('user_orders')->where('id',$order_id)->first();
        $user_id = $orderDetails->user_id;
        $userDetails = User::where('id',$user_id)->first();
        
        $shippingDetails = delivery_addresses::where('user_id',$user_id)->first();

        return view('admin_files.orders.orderDetails',compact('orderDetails','userDetails','shippingDetails'));
    }
}
