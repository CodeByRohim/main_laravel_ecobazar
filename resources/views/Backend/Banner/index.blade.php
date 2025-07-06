@extends('layouts.BackendLayout')
@section('Banner')
@section('title', 'Banner Management')
<section id="menu" class="mx-4 mr-3 mt-5">
  <h4>Banners Management</h4>
      <div class="ro justify-between">
        <div class="card shadow  mb-5 col-lg-12">
          <div class="card-body">
            <table class="table table-bordered">
              <thead class="thead-dark">
                <tr class="align-middle text-center" >
                  <th style="width: 100px;">sl. no</th>
                  <th>Title</th>                 
                  <th>Status</th>
                  <th>Banner Images</th>
                  <th>Discount</th>
                  <th>Description</th>
                  <th>Quick link</th>
                  <th style="width: 100px;">Actions</th>
                </tr>
                
              
               @forelse($banners as $index=>$banner)
               
                <tr class="text-center align-middle">
                  <td> {{ ++$index}} </td>
                  <td class="">{{ str()->headline($banner->title)  }}</td>
                  <td>
                      {!! getGeneralStatus($banner->status) !!}
                  </td>
                  <td>                                
                    <img src="{{asset('storage/' . $banner?->banner_image)}}" alt="" style="width: 80px;">                                  
                  </td>
                  <td>
                      {{ $banner->discount}}
                  </td>
                   <td>
                      {{ $banner->description}}
                  </td>
                   <td>
                      {{ $banner->quick_link}}
                  </td>
                  
                  <td class="btn-group">
                    <a href="{{route('banner.index', $banner->id)}}" class="btn btn-primary" 
                       >Edit</a> 
                    <a href="{{ route('banner.destroy', $banner->id) }}" class="btn btn-danger btnDelete" 
                       >Delete</a>
                </td>
                </tr>
                @empty
                <tr>
                  <td colspan="8" class="text-center">No data found</td>
                </tr>
                @endforelse
            </table>
          </div>
        </div>

        <div class="card shadow p-3 mb-5 rounded col-lg-12"> 
          <h4 class="text-center py-2">{{ $editBanner ? 'Update' : 'Add' }} Banner</h4>
              <form action="{{route('banner.store', $editBanner?->id)}}" method="POST" enctype="multipart/form-data" class="form-group">     
                @csrf      
                  <di class="row ml-3">
                      <div>
                         <input type="hidden" name="id" value="{{ $editBanner?->id }}">

                          <div class="row">
                            <div class="col-lg-6">
                              <label class="d-block mt-3" for="title">Banner Title<span class="text-danger">*</span></label>
                              <input class="form-control"  id="title" type="text" name="title" value="{{ $editBanner->title ?? old('title') }}" >
                              @error('title')
                              <span class="text-danger">
                                {{$message ?? ''}}
                              </span>
                              @enderror
                          </div>
                            
                                <div class="col-lg-6">
                                  <label class="d-block mt-3" for="discount">Discount</label>
                                     <input class="form-control"  id="discount" type="text" name="discount" value="{{ $editBanner->discount ?? old('discount') }}" >
                                       @error('discount')
                                       <span class="text-danger">
                                        {{$message ?? ''}}
                                     </span>
                                     @enderror
                                </div>  
                      </div>

                        <div class="row">
                          <div class="col-lg-6">
                            <label class="d-block mt-3" for="description">Description<span class="text-danger"></span></label>
                              <input class="form-control"  id="description" type="text" name="description" value="{{ $editBanner->description ?? old('description') }}" >
                              @error('description')
                              <span class="text-danger">
                                {{$message ?? ''}}
                              </span>
                            @enderror
                          </div>
                          
                          <div class="col-lg-6">
                            <label class="d-block mt-3" for="quick_link">Quick Link<span class="text-danger"></span></label>
                            <input class="form-control"  id="quick_link" type="text" name="quick_link" value="{{ $editBanner->quick_link ?? old('quick_link') }}" >
                            @error('quick_link')
                            <span class="text-danger">
                              {{$message ?? ''}}
                            </span>
                              @enderror
                          </div>
                        </div>
                      </div>
                      <div>
                        <label class="d-block mt-3" for="bannerImage">Banners Image<span class="text-danger">*</span></label>
                        <input class="form-control"  id="bannerImage" type="file" name="banner_image">
                          @error('banner_image') 
                          <span class="text-danger alert alert-danger mt-2">
                            {{$message ?? ''}}
                          </span>
                        @enderror
                       

                          <div class="preview_box mt-3">          
                            <img class="image d-none img-fluid" src="" alt="preview" width="100px" height="100px">                                        
                          </div>
                       
                        @if($editBanner)   
                        <img src="{{asset('storage/' . $editBanner->banner_image)}}" alt="" width="100px" height="100px">
                        
                        <div class="form-check form-switch mt-2">                   
                           <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{ $editBanner?->status ? 'checked' : '' }} name="status" value="{{ true }}" >                          
                            <div class="d-flex justify-content-between "> 
                              <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                              <a href="{{route('banner.index')}}" class="bg-primary text-white rounded-white p-2">New</a>
                            </div>
                          </div>
                          @endif
                            
                      
                  </div>
                  <div class="mt-1 ml-3"><button class="btn btn-primary" type="submit">{{ $editBanner ? 'Update' : 'Submit'}}</button></div>
              </form>
            

          </div>
      </div>
    </section>
   
@endsection
 @push('scripts')
    <script>
  $(document).ready(function() {
      FilePond.registerPlugin(FilePondPluginImagePreview);
    $('#bannerImage').filepond({ 
    allowImagePreview: true,
    allowMultiple: true,
    imagePreviewMaxHeight: 120,
    allowReorder: true,
    storeAsFile: true,
    });
  })
    </script>
    @endpush