<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::latest()->paginate(2);

        return view('categories.list',['categories' => $categories]);
        
    }

    public function create(){

        return view('categories.new');

    }
  
    public function store(Request $request){
        //Validate data
        $request->validate([
            'title' => ' required|unique:categories|max:200'
        ]);

        $category = new category;
        $category->title = $request->title;
        $category->save();
        return redirect('/')->withSuccess('New Category Created');
    }

    public function edit($id){
       $category = Category::where('id',$id)->first();

       return view('categories.edit',compact ('category'));

    }
    public function update(Request $request, $id){
        $category = Category::where('id',$id)->first();
        $category->title = $request->title;
        $category->save();
        return redirect('/')->withSuccess('Category Updated Successfully');

    }
    
    public function destroy($id){
        $category = Category::whereId($id)->first();
        $category->delete();
        return redirect('/')->withSuccess('Category Deleted Successfully');
    }

} 
