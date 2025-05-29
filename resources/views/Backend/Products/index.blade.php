 @extends('layouts.BackendLayout')
@section('AllProducts')
@section('title', 'All Pruducts')
<style>
  .card{
    width: fit-content;
  }
</style>
<!-- Menu update  -->
<section id="menu" class="mt-5 m-2">
  <h3>Product Menu Section</h3>
  <div class=" card shadow  mb-5 bg-white">
    {{-- {{dd($products)}} --}}
            <div class="card-body">
              {{$products}}
              <table id="productTable" class="table table-bordered" >
                <thead class="thead-dark" >
                  <tr class="text-center">
                    <th style="width: 100px;">sl. no</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Selling Price</th>
                    <th>Quantity</th>
                    <th>Alert Quantity</th>
                    <th>Short Details</th>
                    <th>Long Details</th>
                    <th>Featured Image</th>
                    <th>Gallery Image</th>
                    <th>Additional Info</th>
                    <th>Video</th>
                    <th style="width: 100px;">Actions</th>
                  </tr>
                   @if($categories->isEmpty())
                  <tr>
                    <td colspan="13" class="text-center">No data found</td>
                  </tr>
                  @endif
              @foreach($products as $index=>$product)
              
                  <tr class="text-center">
                    <td  class=""> {{++$index}} </td>
                    <td class="">{{ $product->title }} </td>
                    <td class="">{{ $product->category->title }}</td>
                    <td class="">{{$product->brand?->title ?? 'no brand'}}</td>
                    <td class="">{{ $product->price}}</td>
                    <td class="">{{ $product->selling_price}}</td>
                    <td class="">{{ $product->qty}}</td>
                    <td class="">{{ $product->alert_qty}}</td>
                    <td class="">
                        {{ strip_tags(Str::limit($product->short_detail, 25)) }}
                        @if(strlen($product->short_detail) > 10)
                            <a href="#" data-bs-toggle="modal" data-bs-target="#shortDetailModal{{ $product->id }}">More</a>
                        @endif
                    </td>
                          
                    <td class="">
                        {{ strip_tags(Str::limit($product->long_detail, 25)) }}
                        @if(strlen($product->long_detail) > 10)
                            <a href="#" data-bs-toggle="modal" data-bs-target="#longDetailModal{{ $product->id }}">More</a>
                        @endif
                    </td>
                    <td class="">
                      @if($product->featured_image)
                      <img class="img-fluid" width="50" height="50" src="{{ asset('storage/' . $product->featured_image) }}" alt="">
                      @else
                      <span class="text-danger">No Image</span>
                      @endif
                    </td>
                    <td class="d-flex flex-wrap align-items-center">
                      @if($product->gallery_image)
                          @foreach(json_decode($product->gallery_image) as $gallery)
                              <img class="img-fluid me-1" width="50" height="50" src="{{ asset('storage/' . $gallery) }}" alt="">
                          @endforeach
                      @else
                         <span class="text-danger">No Image</span>
                      @endif
                    </td>
                    <td>{{$product->additional_info}}</td>
                    <td class="">{{$product->video}}</td>
                    <td class="btn-group">
                      {{-- Edit Button --}}
                    <a href="{{ route('products.create', $product->id) }}" class="btn btn-primary" 
                  >Edit</a> 
                                    
                      <a href="{{ route('products.delete', $product->id) }}" class="btn btn-danger btnDelete" >Delete</a>

                    </td>
                  </tr>
              @endforeach 
                
              </table>
            </div>
          </div>
           <!-- Modal -->
     @foreach($products as $product)
     <div class="modal fade" id="longDetailModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Long Description</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! nl2br(e(strip_tags(($product->long_detail)))) !!}      
                </div>
            </div>
        </div>
    </div>
    @endforeach
          @foreach($products as $product)
    <div class="modal fade" id="shortDetailModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Short Description</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! nl2br(e(strip_tags(($product->short_detail)))) !!}
                    
                </div>
            </div>
        </div>
    </div>
    @endforeach  
    <!-- End Modal -->
        {{-- <div class="card shadow p-3 mb-5 bg-white rounded ">
          <div  class="card-body position-relative">
            <h4 class="text-center">Product Categories</h4>
            <div class="preview_box text-center" style="max-width: 350px; position: absolute; transform: translate(-120%, -20%); display: none; left:0%; background-color: #fff; border: 1px solid #000; padding: 10px; border-radius: 5px; box-shadow: 0 0 5px rgba(0,0,0,0.5); z-index: 9999;">
              <img src="https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM=" alt="" class="img-fluid image" style="width: 100%; height: 200px; object-fit: cover; object-position: center;">
              <h4 class="title">...</h4>
              <p class="discount"></p>
              <p class="price"></p>
            </div>
           
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
    
                <form action="{{route('products.create')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="row">
                        <div>
                          <input type="hidden" name="id" value="{{ isset($category->id) ? $category->id : '' }}">
                            <label class="d-block mt-3" for="name">Product Name <span class="text-danger">*</span></label>
                            <input class="form-control" style="width: 330px;"  id="name" type="text" name="title" value="{{old('name')}}">
                           @error('name')
                            <span class="text-danger">
                              {{ $message}}
                            </span>
                           @enderror
                            <label class="d-block mt-3" for="discount">Product discount </label>
                            <input class="form-control" id="discount" type="text" name="discount" value="{{old('discount')}} ">
                            @error('discount')
                            <span class="text-danger">
                              {{ $message}} 
                            </span>
                            @enderror
                            <label class="d-block mt-3" for="price">Product Price</label>
                            <input class="form-control" id="price" type="text" name="price" value="{{ old('price')}}">
                            @error('price')
                            <span class="text-danger">
                              {{ $message}} 
                            </span>
                            @enderror
                            <label class="d-block mt-3" for="category">Select Categories</label>
                            <select class="form-control" id="category" name="category_id">
                            @foreach($categories as $index => $category)
                            <option value="{{$category->id}}">
                              {{ $category->title}}
                            </option>
                            @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger">
                              {{ $message}}
                            </span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-center">
                            <label for="menu-img-input" class="d-block text-center">Product Image <span class="text-danger">*</span></label>
                        <label class="d-block mt-1" for="menu-img-input"><img src=" 'storage/' . " alt="" class="image img-fluid rounded-circle" style="width:140px; height:140px;object-fit:cover;object-position:center" >
                        </label>
                        <input name="image" class="d-none" id="menu-img-input" type="file">
                        @error('image')
                        <span class="text-danger">
                          {{$message}} 
                        </span>
                        @enderror
                        </div>
                    </div>
                    <div class="mt-3">
                      <button type="button" id="preview" class="btn btn-warning text-dark">Show Preview</button>
                      <button class="btn btn-primary" type="submit">
                        {{ isset($category->id) ? 'Update' : 'Submit' }}
                    </button>
                    
                    </div>
                </form>
          </div>
        </div> --}}

</section>
@push('scripts')
<script>
let table = new DataTable('#productTable', {
  processing: true,
  serverSide: true,
  ajax: "{{ route('products.data') }}",
    columns: [
        { DT_RowId: 'id', orderable: false, searchable: false,sortable: false },
        { data: 'category', orderable: false, searchable: false },
        { data: 'brand', orderable: false, searchable: false },      
        { data: 'title', orderable: false },
        { data: 'price', orderable: false, searchable: false },
        { data: 'selling_price', orderable: false, searchable: false },
        { data: 'qty', orderable: false, searchable: false },
        { data: 'alert_qty', orderable: false, searchable: false },
        { data: 'short_detail', orderable: false, searchable: false },
        { data: 'long_detail', orderable: false, searchable: false },
          { data: 'featured_image', render: function(data) {
              return `<img src="${data}" alt="Featured Image" width="50" height="50">`;
          }},
          { data: 'gallery_image', render: function(data) {
              let images = JSON.parse(data);
              return images.map(img => `<img src="${img}" alt="Gallery Image" width="50" height="50">`).join('');
          }},
        { data: 'additional_info', orderable: false, searchable: false },
        { data: 'video', orderable: false, searchable: false },
        { data: 'actions', orderable: false, searchable: false }
    ]
    // perPage: 10,
    // perPageSelect: [10, 25, 50, 100],
    // searchable: true,
    // sortable: true,
    // labels: {
    //     placeholder: "Search...",
    //     perPage: "{select} items per page",
    //     noRows: "No data found",
    //     info: "Showing {start} to {end} of {rows} entries"
    // }
});
</script>
@include('Backend.Category.scripts')
@endpush
@endsection