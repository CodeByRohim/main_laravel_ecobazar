@extends('layouts.BackendLayout')
@section('Categories')
@section('title', 'Manage Category')
<!-- Categories update  -->
<section id="menu" class="ml-3 mr-3 mt-5 m-5">
  <h4>Categories Section</h4>
      <div class="row justify-between">
        <div class="card shadow  mb-5 bg-white col-lg-8">
          <div class="card-body">
            <table class="table table-bordered">
              <thead class="thead-dark">
                <tr class="text-center">
                  <th style="width: 100px;">sl. no</th>
                  <th>Title</th>                 
                  <th>Status</th>
                  <th style="width: 100px;">Actions</th>
                </tr>
                
               
               @forelse($categories as $index=>$category):
                <tr class="text-center">
                  <td> {{ ++$index}} </td>
                  <td class="">{{ str()->headline($category->title)  }}</td>
                  <td>
                    
                    {!! getGeneralStatus($category->status) !!}
                  </td>
                  <td class="btn-group">
                    {{-- Edit Button --}}
                    <a href="{{route('category.index', $category->id)}}" class="btn btn-primary" 
                       >Edit</a> 
                
                    {{-- Delete Button --}}
                    <a href="{{ route('category.destroy', $category->id) }}" class="btn btn-danger btnDelete" 
                       >Delete</a>
                    
                </td>
                </tr>
                @empty
                <tr>
                  <td colspan="4" class="text-center">No data found</td>
                </tr>
                @endforelse

            </table>
          </div>
        </div>
        <div class="card shadow p-3 mb-5 bg-white rounded col-lg-4">
          <h4 class="text-center">{{ $editCategory ? 'Update' : 'Add'}} Categories Title</h4>
          @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
              <form action="{{route('category.store', $editCategory?->id)}}" method="POST" > 
                @csrf      
                  <div class="row ml-3">
                      <div>
                         <input type="hidden" name="id" value="{{ $editCategory?->id }}">
                          <label class="d-block mt-3" for="title">Categories Title<span class="text-danger">*</span></label>
                          <input class="form-control"  id="title" type="text" name="title" value="{{ $editCategory->title ?? old('title') }}" >
                         
                          @error('title') 
                          <span class="text-danger">
                            {{$message ?? ''}}
                          </span>
                        @enderror
                        @if($editCategory)
                        <div class="form-check form-switch mt-2">
                           <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{ $editCategory?->status ? 'checked' : '' }}
                          name="status" value="{{ true }}" >                      
                            <div class="d-flex justify-content-between ">
                              <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                              <a href="{{route('category.index')}}" class="bg-primary rounded text-white p-2">New</a>
                            </div>
                          </div>
                          @endif
                            
                      </div>
                      
                  </div>
                  <div class="mt-1 ml-3"><button class="btn btn-primary" type="submit">{{ $editCategory ? 'Update' : 'Submit'}}</button></div>
              </form>
          </div>
      </div>
    </section>

@push('scripts')
@include('Backend.Category.scripts')
@endpush  
@endsection