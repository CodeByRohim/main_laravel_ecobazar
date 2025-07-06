@extends('layouts.BackendLayout')
@section('title', 'Manage Category')
@section('Categories')

<section id="menu">
  <div class="m-4"><h4>Categories Section</h4></div>

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
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse($categories as $index => $category)
                <tr class="text-center">
                  <td>{{ ++$index }}</td>
                  <td>{{ str()->headline($category->title) }}</td>
                  <td>{!! getGeneralStatus($category->status) !!}</td>
                  <td class="">
                    <a href="{{ route('category.index', $category->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('category.destroy', $category->id) }}" class="btn btn-danger btnDelete">Delete</a>
                  </td>
                </tr>
              @empty
                <tr><td colspan="4" class="text-center">No data found</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card shadow p-3 rounded">
        <h4 class="text-center">{{ $editCategory ? 'Update' : 'Add' }} Category Title</h4>
        <form action="{{ route('category.store', $editCategory?->id) }}" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{ $editCategory?->id }}">
          <label class="mt-3" for="title">Category Title<span class="text-danger">*</span></label>
          <input class="form-control" id="title" type="text" name="title" value="{{ $editCategory->title ?? old('title') }}">

          @error('title')
            <span class="text-danger">{{ $message }}</span>
          @enderror

          @if($editCategory)
            <div class="form-check form-switch mt-2 d-flex justify-content-between align-items-center">
              <div>
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                       name="status" value="1"
                       {{ $editCategory->status ? 'checked' : '' }}>
                <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
              </div>
              <a href="{{ route('category.index') }}" class="bg-primary rounded text-white p-2">New</a>
            </div>
          @endif

          <div class="mt-3">
            <button class="btn btn-primary" type="submit">{{ $editCategory ? 'Update' : 'Submit' }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
