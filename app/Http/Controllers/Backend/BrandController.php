<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
class BrandController extends Controller
{
    function index($id = null)
    {
        $editBrand =Brand::find($id) ?? null;
        $brands = Brand::get();
        return view('Backend.Brand.Brands', compact('editBrand', 'id', 'brands'));
    }


    function storeOrUpdate(Request $request, $id = null)
    {
        $request->validate([
            'title' => "required|min:3|unique:brands,title,$id",
            'icon' => $id ? 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048' : 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        
        
        
        $brand = Brand::findOrNew($id);

        $brand->title = $request->title;

        if ($request->hasFile('icon') && $brand->icon) {
            Storage::disk('public')->delete($brand->icon);
        }

        if($request->hasFile('icon')) {
                $titleIcon = $request->title . "." . $request->icon->extension();
                $icon = $request->icon->storeAs('brands', $titleIcon , 'public');
            }
        $brand->icon = $icon ?? $brand->icon;
        
        $brand->slug = str()->slug($request->title);
        $isExists = Brand::where('id', '!=', $id)->where('slug', str()->slug($request->title))->exists();
        if ($isExists) {
            return back()->withErrors(['title'=> 'Brand already exists']);
            exit();
        }
        if($id){
            $brand->status = $request->status ?? false;
        }
            $brand->save();
            notify()->success('Brand updated successfully!');
            return to_route('brand.index');
    }
    /*
    public function storeOrUpdate(Request $request, $id = null)
{
    $request->validate([
        'title' => "required|min:3|unique:brands,title,$id", // Check for unique title
        'icon' => $id ? 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' : 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Handle file for new brand vs update
    ]);
    
    // Store the icon if there's a new file uploaded
    if ($request->hasFile('icon')) {
        $titleIcon = str()->slug($request->title) . "." . $request->icon->extension();
        $icon = $request->icon->storeAs('brands', $titleIcon, 'public');
    }
    
    // Handle the brand instance (whether new or updating)
    $brand = Brand::findOrNew($id);
    $brand->title = $request->title;
    
    // If updating, delete old icon before saving the new one
    if ($id && $request->hasFile('icon') && $brand->icon) {
        Storage::disk('public')->delete($brand->icon); // Delete old icon file if exists
    }

    // Assign the new icon or keep the old one if not updating
    $brand->icon = isset($icon) ? $icon : $brand->icon;
    
    // Generate and check for unique slug
    $slug = str()->slug($request->title);
    $isExists = Brand::where('id', '!=', $id)->where('slug', $slug)->exists();
    if ($isExists) {
        return back()->withErrors(['title' => 'Brand already exists'])->withInput();
    }

    // Set status if updating
    $brand->slug = $slug;
    $brand->status = $request->status ?? $brand->status; // Maintain old status if not updated

    // Save the brand data
    $brand->save();

    notify()->success($id ? 'Brand updated successfully!' : 'Brand created successfully!');
    return to_route('brand.index');
}
*/

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
    
        // Delete image if exists
        if ($brand->icon && Storage::disk('public')->exists($brand->icon)) {
            Storage::disk('public')->delete($brand->icon);
        }
    
        // Delete database row
        $brand->delete();
    
        notify()->success('Brand deleted successfully!');
        return to_route('brand.index');
    }
}
