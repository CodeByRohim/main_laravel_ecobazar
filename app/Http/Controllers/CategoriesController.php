<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index($id =null)
    {
        
        $categories = Category::latest()->get();
        $editCategory = null;
        if ($id) {
            $editCategory = $categories->where('id', $id)->first();
            // dd($editCategory);
        }
    
        return view('Backend.Category.Categories', compact('categories', 'editCategory'));
        
    }
  
    public function storeOrUpdate(Request $request, $id = null){
       
        $request->validate([
            'title' => 'required|min:3|string|max:255',
            
        ]);
        $isExists = Category::where('id', '!=', $id)->where('slug', str()->slug($request->title))->exists();
       if ($isExists) {
            return back()->withErrors(['title'=> 'Category already exists']);
            exit();
        }
        $category = Category::findOrNew($id);
        $category->title = $request->title;
        $category->slug = str()->slug($request->title);
        if($id){
            $category->status = $request->status ?? false;
        }
        $category->save();
        if($id){
            return redirect()->back()->with('success', 'Category updated successfully');
        }
        return redirect()->back()->with('success', 'Category created successfully');
    }
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
   
}
