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

    // banners ok--------------------

          if($request->hasFile('banner_image')){ 
            $name = $request->title . "-banner." . "." . time() . "." . $request->banner_image->extension();
            $path = $request->banner_image->storeAs('banners', $name, 'public'); 
            }

           $banner = Banner::findOrNew($id);
          
        
          if ($request->hasFile('banner_image') && $banner->banner_image) {
                // Delete old image if exists
                Storage::disk('public')->delete($banner->banner_image);
                }

                 $banner->banner_image = $path ?? $banner->banner_image;
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
