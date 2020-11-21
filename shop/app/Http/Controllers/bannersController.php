<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banners;

class bannersController extends Controller
{
    public function addBanner(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		$data = $request->all();

    		// Validation

    		$this->validate($request,[

    			'banner_name' => 'required',
    			'text_style' => 'required',
    			'link' => 'required',
    			'banner_image' => 'required'
    		]);

    		$banner = new Banners;

    		$banner->name = $data['banner_name'];
    		$banner->text_style = $data['text_style'];
    		$banner->sort_order = $data['sort_order'];
    		$banner->content = $data['banner_content'];
    		$banner->link = $data['link'];

    		// Upload Image

    		if ($request->hasfile('banner_image'))
            {
                
               $file = $request->file('banner_image');

                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/banners/',$filename);


                $banner->image = $filename;
            }
            $banner->save();

            return redirect('/admin/view-banners')->with('success','Banner has added successfully!');


    	}
    	return view('admin_files.Banners.add_banner');
    }

// View Banner

    public function viewBanners()
    {
    	$data = Banners::all();

    	return view('admin_files.Banners.view_banners',compact('data'));
    }

// Edit Banner 

	public function editBanner(Request $request,$id)
	{
		if($request->isMethod('post')){

			$data = $request->all();

			// Validation

			$this->validate($request,[

    			'banner_name' => 'required',
    			'text_style' => 'required',
    			'link' => 'required'
    		]);

    		$banner = Banners::find($id);

    		$banner->name = $data['banner_name'];
    		$banner->text_style = $data['text_style'];
    		$banner->sort_order = $data['sort_order'];
    		$banner->content = $data['banner_content'];
    		$banner->link = $data['link'];

    		// Upload Image

    		if ($request->hasfile('banner_image'))
            {
                
               $file = $request->file('banner_image');

                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/banners/',$filename);


                $banner->image = $filename;
            }
            $banner->save();

            return redirect('/admin/view-banners')->with('success','Banner has updated successfully!');

		}
		
		$banner = Banners::find($id);
		return view('admin_files.Banners.edit_banner',compact('banner','id'));	
	}   

	public function deleteBanner($id)
	{
		$banner = Banners::find($id);

		$banner->delete();
	
	    return redirect('/admin/view-banners')->with('success','Banner has deleted!!');
	
	} 
}
