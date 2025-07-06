@extends('layouts.BackendLayout')
@section('title', 'users-create')
@section('users')

 <div class="card m-4 p-4">
 <a class="m-end mb-3 text-end" href="{{ url()->previous() }}"><button class="btn btn-primary">Back</button></a>
   <form method="POST" action="{{ route('admin.users.storeOrUpdate') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-md-3 mb-3">
        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
        <input type="text" name="name" value="{{$editUser ? $editUser->name : old('name')}}" class="form-control" id="name">
        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
      </div>
      <div class="col-md-3 mb-3">
        <label for="position" class="form-label">Position</label>
        <input type="text" name="position" value="{{$editUser ? $editUser->position : old('position')}}" class="form-control" id="position">
        @error('position') <small class="text-danger">{{ $message }}</small> @enderror
      </div>
      <div class="col-md-3 mb-3">
        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
        <input type="email" name="email" value="{{$editUser ? $editUser->email : old('email')}}" class="form-control" id="email">
        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
      </div>
      <div class="col-md-3 mb-3">
        <label for="department" class="form-label">Department</label>
        <input type="text" name="department" value="{{$editUser ? $editUser->department : old('department')}}" class="form-control" id="department">
        @error('department') <small class="text-danger">{{ $message }}</small> @enderror
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-4 mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" value="{{$editUser ? $editUser->phone : old('phone')}}" class="form-control" id="phone">
        @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" name="image" class="form-control" id="image">
        @error('image') <small class="text-danger">{{ $message }}</small> @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="signature" class="form-label">Signature</label>
        <input type="file" name="signature" class="form-control" id="signature">
        @error('signature') <small class="text-danger">{{ $message }}</small> @enderror
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-4 mb-3">
        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
        <input type="password" value="{{$editUser ? $editUser->password : old('password')}}" name="password" class="form-control" id="password">
        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>
        <input type="password"  name="password_confirmation" class="form-control" id="confirmPassword">
        @error('password_confirmation') <small class="text-danger">{{ $message }}</small> @enderror
      </div>
      <div class="col-md-4 mb-3">
        <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
        <select name="role" class="form-control" id="role">
          <option value="">-- Select Role --</option>
         
          @foreach($roles as $role)
            <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>
              {{ $role->name }}
            </option>
          @endforeach
        
        
        </select>
        @error('role') <small class="text-danger">{{ $message }}</small> @enderror
      </div>
    </div>
   
    <div class="col-12 mt-3">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck" onclick="togglePassword()">
        <label class="form-check-label" for="gridCheck">Show Password</label>
      </div>
    </div>
    <div class="col-12 mt-2">
      <button type="submit" class="btn btn-primary">Create User</button>
    </div>
   </form>
 </div>

   @push('scripts')
  <script>
      document.getElementById('gridCheck').addEventListener('change', function () {
  const password = document.getElementById('password');
  const confirm = document.getElementById('confirmPassword');
  const type = this.checked ? 'text' : 'password';
  password.type = type;
  confirm.type = type;
});

    </script>
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            position: "top-end",
            title: 'Success',
            text: {{ session('success') }},
            timer: 3000,
            showConfirmButton: false
        });
    </script>
@endif
@endpush
@endsection
