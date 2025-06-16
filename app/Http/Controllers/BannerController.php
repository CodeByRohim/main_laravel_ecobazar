<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
class BannerController extends Controller
{
    public function index($id = null){
        $editBanner = Banner::find($id) ?? null;
        $banners = Banner::latest()->get();
        return view('Backend.Banner.index', compact('editBanner','id','banners'));
    }
    function storeOrUpdate(BannerRequest $request,$id = null){

          $banner = Banner::findOrNew($id);
         // ========== BANNER IMAGES UPLOAD ==========
        //   dd($request->banner_image->extension());
        if($request->hasFile('banner_image')){
           
                if ($banner->banner_image) {
                // Delete old image if exists
                $oldBannerImage = $banner->banner_image;
                Storage::disk('public')->delete($oldBannerImage ?? '');
                }
          
            $name = $request->title . "-banner." . "." . time() . "." . $request->banner_image->extension();
            $path = $request->banner_image->storeAs('banners', $name, 'public');
            $bannerImage = $path;
            
            }
           $banner->banner_image = $bannerImage;
        
        
         //========== SAVE BANNER DATA ==========
         if($id){
             $banner->status = $request->status ?? false;
            }
        $banner->title = $request->title;
        $banner->discount = $request->discount;
        $banner->description = $request->description;
        $banner->quick_link = $request->quick_link;   
        $banner->save();
      return to_route('banner.index')->with('success', $id ? 'Banner updated successfully' : 'Banner created successfully');
    }
}
