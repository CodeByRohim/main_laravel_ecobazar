 @extends('layouts.BackendLayout')
@section('AllProducts')
@section('title', 'Assign User To Role')

<!-- Menu update  -->
<section id="menu" class=" m-4">
  <h3>Roles</h3>
  <div class="card shadow  mb-2">
    <div class="d-flex justify-content-between align-items-center mt-3 p-3">
      <h4>User list of {{$role->name}} role</h4>
     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRole">Add User/Users</button>

<!-- Assign Role Modal -->
<div class="modal fade" id="addRole" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Assign Role to User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <form id="assignRoleForm" method="POST" action="{{ route('assign.role.store') }}">
    @csrf
    <input type="hidden" name="role_id" value="{{ $role->id }}">

    <div class="mb-3">
        <label class="form-label">Select User:</label>
        <select name="model_id" class="form-control" required>
            @foreach($allUsers as $id => $user)
                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->user_id }})</option>
            @endforeach
        </select>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Assign Role</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
</form>


        <!-- Success/Error Message -->
        <div id="assignRoleMessage" class="mt-2"></div>
      </div>
    </div>
  </div>
</div>

    </div>
   
            <div class="card-body">
              <table id="roleTable" class="table table-bordered" >
                <thead class="thead-dark" >
                  <tr class="text-center">
                    <th style="width: 100px;">sl. no</th>  
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>User Number</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    {{-- @foreach($users as $id => $user)
                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
            @endforeach --}}
        @foreach($assignedUsers as $index => $user)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
            <td>{{$user->user_id}}</td>
            <td>
              <a class="text-white" href="#"><i class='bx bg-danger p-2 rounded bx-trash-alt'  ></i>  </a>
            </td>
        </tr>
        
        @endforeach
    </tbody>
              </table>
            </div>
          </div>
</section>
@push('scripts')

</scrip>
 @if(session('success'))
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
@include('Backend.Category.scripts')
@endpush
@endsection