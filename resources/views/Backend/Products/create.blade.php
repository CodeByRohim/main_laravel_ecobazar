 @extends('layouts.BackendLayout')
@section('AddProduct')
@section('title', 'Add Pruduct')
@push('css')
<!-- include summernote css/js -->
{{-- <script src="{{asset('Backend/assets/js/summernote.min.js')}}"></script> --}}
<link href="{{asset('Backend/assets/css/summernote-bs5.css')}}" rel="stylesheet">
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/>
<style>
  .filepond--item{
    width: 100px;
  }
</style>
@endpush
<!-- Menu update  -->
<div>
  
  <h3 class="m-4">{{ $editProduct ? 'Update' : 'Add'}} Product Section</h3>
  <div class="row m-4">
    <div class="card shadow  mb-5">
      <div class="card-header">
        <h4 class="text-center">{{$editProduct ? 'Update' : 'Add'}} Product</h4>
      </div>
      <div class="card-body">
        <form action="{{route('products.store', $editProduct?->id)}}"  method="POST" enctype="multipart/form-data">
          @csrf
          
          {{-- {{dd($editProduct?->id)}} --}}
          {{-- <input type="hidden" name="id" value="{{ $editProduct ? $editProduct->id : '' }}"> --}}
         <input type="hidden" name="id" value="{{ $editProduct?->id }}">
          @if (session('success'))
          <div class="alert alert-success mt-2">{{ session('success') }}</div>
          @endif
          <div class="row">
            <div class="col-lg-6 form-group">
              <input type="text" class="form-control" name="title" value="{{ $editProduct ? $editProduct->title : old('title')}}" placeholder="Enter Product Name">
                @error('title')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6 form-group">
              <input type="text" class="form-control" name="slug" value="{{$editProduct ? $editProduct->slug : old('slug')}}" placeholder="Enter Product Slug">
                @error('slug')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-lg-3 form-group">
              <input type="number" class="form-control" value="{{$editProduct ? $editProduct->price : old('price')}}" name="price" placeholder="Enter Product Price">
                @error('price')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-3 form-group">
              <input type="text" class="form-control" value="{{ $editProduct ? $editProduct->selling_price : old('selling_price')}}"  name="selling_price" placeholder="Product Selling Price">
                @error('selling_price')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
           <div class="col-lg-3 form-group">
              <input type="text" class="form-control" name="qty" value="{{ $editProduct ? $editProduct->qty : old('qty')}}" placeholder="Enter Product Quantity">
                @error('qty')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
          </div>
           <div class="col-lg-3 form-group">
              <input type="text" class="form-control" name="alert_qty" value="{{ $editProduct ? $editProduct->alert_qty : old('alert_qty')}}" placeholder="Enter Product Alert Quantity">
                @error('alert_qty')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
          </div>

         <div class="row mt-3">
          <div class="col-lg-6">
            <label for="">Select Category</label>
            <select name="category" id="select-category" >
              <option value="{{$editProduct ? $editProduct->category : old('category')}}"></option>                 
            </select>
              @error('category')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-lg-6">
            <label for="">Select Brand</label>
            <select name="brand" id="select-brand">
              <option value="{{$editProduct ? $editProduct->brand : old('brand')}}"></option> 
            </select>
            @error('brand')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
          </div>
         </div>

        <div class="mt-3">
            <div class="col-lg-12">
              <label for="short_detail" class="text-bold">Short Details</label>
              <textarea class="form-control" id="short_detail" name="short_detail"   placeholder="Short Details">
               {{$editProduct ? $editProduct->short_detail : old('short_detail')}}
              </textarea>
            </div>
        </div>
        <div class="mt-3">
            <div class="col-lg-12">
              <label for="long_detail">Long Details</label>
              <textarea class="form-control" id="long_detail" name="long_detail"   placeholder="Long Details">
                {{$editProduct ? $editProduct->long_detail : old('long_detail')}}
              </textarea>
            </div>
        </div>

        <div class="row mt-3">
          <div class="col-lg-6">
            <label for="featured_image">Featured Image</label>
            <input type="file" class="form-control" name="featured_image" value="{{ $editProduct ? $editProduct->featured_image : old('featured_image')}}" id="featuredImage">
            @error('featured_image')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
          </div>
           <div class="col-lg-6 ">
            <label for="gallery_image">Galley Image</label>
            <input type="file" class="form-control " name="gallery_image[]" value="{{ $editProduct ? $editProduct->gallery_image : old('gallery_image')}}" id="galleryImage" multiple >
            @error('gallery_image')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-lg-6">
            <input type="text" class="form-control" name="sku" value="{{ $editProduct ? $editProduct->sku : old('sku')}}" placeholder="Product SKU">
            @error('sku')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-lg-6">
            <input type="text" class="form-control" name="video" value="{{ $editProduct ? $editProduct->video : old('video')}}" placeholder="Video Link">
            @error('video')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="mt-3 col-lg-12">         
          <textarea class="form-control" name="additional_info" id="" cols="20" rows="5"  placeholder="Additional Information">{{$editProduct ? $editProduct->additional_info : old('additional_info')}}</textarea>
          @error('additional_info')
          <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
        </div>
           @if($editProduct)
              <div class="form-check form-switch mt-2">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{ $editProduct?->status ? 'checked' : '' }}
                name="status" value="{{ true }}" >                      
                  <div class="d-flex justify-content-between ">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                      <a href="{{route('products.index')}}" class="bg-primary rounded text-white p-2">New</a> 
                  </div>
                </div> 
          @endif 
         

        <button type="submit" class="btn btn-primary mt-3">{{ $editProduct ? 'Update' : 'Submit'}}</button>
        </form>
      </div>     
</div>
@push('scripts')
<!-- include plugin -->
    {{-- <script src="{{asset('Backend/assets/js/summernote.min.js')}}"></script> --}}
    <script src="{{asset('Backend/assets/js/summernote-bs5.js')}}"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>  
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>

  <script>
    $(document).ready(function() {
        $('#short_detail,#long_detail').summernote({
        placeholder: 'Write here',
        tabsize: 2,
        height: 110,
        toolbar: [
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['fontsize', ['fontsize']], 
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']]
          ['style', ['style']],
          ['fontname', ['fontname']],
          ['color', ['color']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']],
      ],
      popover: {
        image: [
          ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
          ['float', ['floatLeft', 'floatRight', 'floatNone']],
          ['remove', ['removeMedia']]
        ],
        link: [
          ['link', ['linkDialogShow', 'unlink']]
        ],
        table: [
          ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
          ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
        ],
        air: [
          ['color', ['color']],
          ['font', ['bold', 'underline', 'clear']],
          ['para', ['ul', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture']]
        ]
      },
        });
        });

// ajax for category and brand select2
    $(document).ready(function() {
        // Category Select2
        $('#select-category').select2({
            placeholder: 'Select Category',
            allowClear: true,
            ajax: {
                url: '{{ route('products.live.category') }}',
                method: 'POST',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        _token: '{{ csrf_token() }}',
                        search: params.term
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                }
            }
        });

        // Brand Select2
        $('#select-brand').select2({
            placeholder: 'Select a Brand',
            allowClear: true,
            ajax: {
                url: '{{ route('products.live.brand') }}',
                method: 'POST',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        _token: '{{ csrf_token() }}',
                        search: params.term
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                }
            }
        });
    
    // FilePond for featured image
    FilePond.registerPlugin(FilePondPluginImagePreview);
    $('#featuredImage').filepond({      
       allowImagePreview: true,
       storeAsFile: true,
    });

    $('#galleryImage').filepond({ 
    allowImagePreview: true,
    allowMultiple: true,
    imagePreviewMaxHeight: 120,
    allowReorder: true,
    storeAsFile: true,
    });

    $('input[name="title"]').keyup(function(){
            let title = $(this).val().replaceAll(' ', '-').toLowerCase();
            $('input[name="slug"]').val(title)
        })

        
});
  </script>
@endpush
@endsection
