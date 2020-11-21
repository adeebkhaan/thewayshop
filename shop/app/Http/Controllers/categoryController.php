<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class categoryController extends Controller
{
    public function addCategory(Request $request)
    {
    	if ($request->isMethod('post')) 
    	{
    		$data = $request->all();

    		// Validation

    		$this->validate($request,[
    			
    			'category_name' => 'required',
    			'url' => 'required',
    			'category_description' => 'required'

    		]);
    		
    		$category = new Category;

    		$category->name = $data['category_name'];
    		$category->parent_id = $data['parent_id'];
    		$category->url = $data['url'];
    		$category->description = $data['category_description'];

    		$category->save();

    		return redirect('/admin/view-categories')->with('success','Category has added successfully!');

    	}
    	$levels = Category::where(['parent_id'=> 0 ])->get();

    	return view('admin_files.Categories.addcategory',compact('levels'));
    }

    // View Category

    public function viewCategories()
    {
        $categories = Category::all();

        return view('admin_files.Categories.view_categories',compact('categories'));
    }

    // Edit Category

    public function editCategory(Request $request,$id)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();

            // Validation

            $this->validate($request,[
                
                'category_name' => 'required',
                'url' => 'required',
                'category_description' => 'required'

            ]);

            $category = Category::find($id);

            $category->name = $data['category_name'];
            $category->parent_id = $data['parent_id'];
            $category->url = $data['url'];
            $category->description = $data['category_description'];

            $category->save();

            return redirect('/admin/view-categories')->with('success','Category has updated successfully!');

        }
        $levels = Category::where(['parent_id'=>0])->get();
        $category = Category::find($id);
        return view('admin_files.Categories.edit_category',compact('category','id','levels'));
    }

    // Delete Description

    public function deleteCategory($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect('/admin/view-categories')->with('success','Category has deleted!');

    }
}
