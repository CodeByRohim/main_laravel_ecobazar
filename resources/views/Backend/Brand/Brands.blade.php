@extends('layouts.BackendLayout')
@section('Categories')
@section('title', 'Manage brand')
<!-- brands update  -->
<section id="menu">
  <div class="m-4"><h4>Brands Section</h4></div>
      <div class="row m-4">
        <div class="col-lg-8">
          <div class="card shadow">
            <div class="card-body">
              <table class="table table-bordered">
                <thead class="thead-dark">
                  <tr class="text-center">
                    <th>sl. no</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Icon</th>
                    <th>Actions</th>
                  </tr>
          
          
                 @forelse($brands as $index=>$brand)
          
                  <tr class="text-center align-middle">
                    <td> {{ ++$index}} </td>
                    <td class="">{{ str()->headline($brand->title)  }}</td>
                    <td>
                        {!! getGeneralStatus($brand->status) !!}
                    </td>
                    <td>
                      <img src="{{asset('storage/' . $brand?->icon)}}" alt="" style="width: 50px;">
                    </td>
                    <td class="">
                      {{-- Edit Button --}}
                      <a href="{{route('brand.index', $brand->id)}}" class="btn btn-primary"
                         >Edit</a>
          
                      {{-- Delete Button --}}
                      <a href="{{ route('brand.destroy', $brand->id) }}" class="btn btn-danger btnDelete"
                         >Delete</a>
                  </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="5" class="text-center">No data found</td>
                  </tr>
                  @endforelse
              </table>
            </div>
          </div>
        </div>


        @canany(['create-brand','edit-brand'])
        <div class="col-lg-4">
          <div class="card shadow p-3 rounded">
            <h4 class="text-center">{{ $editBrand ? 'Update' : 'Add'}} Brands Title</h4>
            {{-- @if (session('success'))
            
            @endif --}}
                <form action="{{route('brand.store', $editBrand?->id)}}" method="POST" enctype="multipart/form-data" class="form-group">
                  @csrf
                    <div class="row ml-3">
                        <div>
                           <input type="hidden" name="id" value="{{ $editBrand?->id }}">
                            <label class="d-block mt-3" for="title">Brands Title<span class="text-danger">*</span></label>
                            <input class="form-control"  id="title" type="text" name="title" value="{{ $editBrand->title ?? old('title') }}" >
                            @error('title')
                            <span class="text-danger">
                              {{$message ?? ''}}
                            </span>
                          @enderror



                          <label class="d-block mt-3" for="title">Brands Icon<span class="text-danger">*</span></label>
                          <input class="form-control"  id="icon" type="file" name="icon" >
                            @error('icon')
                            <span class="text-danger alert alert-danger mt-2">
                              {{$message ?? ''}}
                            </span>
                          @enderror
          
                            <div class="preview_box mt-3">
                              <img class="image d-none" src="" alt="preview" width="100px" height="100px">
                            </div>
          



                          @if($editBrand)
                          <img src="{{asset('storage/' .$editBrand->icon)}}" alt="" width="100px" height="100px">
                          <div class="form-check form-switch mt-2">
          
                             <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{ $editBrand?->status ? 'checked' : '' }} name="status" value="{{ true }}" >
                              <div class="d-flex justify-content-between ">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                                <a href="{{route('brand.index')}}" class="bg-primary rounded text-white p-2">New</a>
                              </div>
                            </div>
                            @endif
          
                        </div>
          
                    </div>
                    <div class="mt-1 ml-3"><button class="btn btn-primary" type="submit">{{ $editBrand ? 'Update' : 'Submit'}}</button></div>
                </form>
            </div>
                </div>
       @endcanany

              </div>
    </section>
    @endsection
@push('scripts')
   <script>
  $(document).ready(function() {
      FilePond.registerPlugin(FilePondPluginImagePreview);
    $('#icon').filepond({ 
    allowImagePreview: true,
    allowMultiple: true,
    imagePreviewMaxHeight: 120,
    allowReorder: true,
    storeAsFile: true,
    });
  })
    </script>
       @if (session('success'))
        <script>
          const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
      }
    });
    Toast.fire({
      icon: "success",
      title: "Role Added Successfully"
    });
        </script>
            @endif 
@endpush  
