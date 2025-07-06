 @extends('layouts.BackendLayout')
@section('AllProducts')
@section('title', 'Role List')

<!-- Menu update  -->
<section id="menu" class=" m-4">
  <h3>Role Mangement</h3>
  <div class="card shadow  mb-2">
    <div class="d-flex justify-content-between align-items-center mt-3 p-3">
      <h4>Role List</h4>
     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRole">Add Role</button>

<div class="modal fade" id="addRole" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('role.store') }}" >
          @csrf
          <div class="mb-3">
            <label for="role-name" class="col-form-label">Enter role:</label>
            <input type="text"  name="name" class="form-control" id="role-name">
          </div>
          <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
        <button type="submit" class="btn btn-primary">Add Role</button>
      </div>
        </form>
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
                    <th>Permissions</th>
                    <th>Actions</th>
                  </tr>
              </table>
            </div>
          </div>
</section>
@push('scripts')
<script>
let table = new DataTable('#roleTable', {
  processing: true,
  serverSide: true,
  responsive: true,
  ajax: {
   url: '{{ route('roleAndPermission.role') }}'
  },
    columns: [
        { data: 'DT_RowIndex', orderable:false, sortable:false, searchable: false },  
        { data: 'name', orderable: false },
        { data: 'permission', orderable: false, searchable: true },     
        { data: 'actions', orderable: false, searchable: false }
    ]
    
});

$(document).on('click', '.read-more', function(e){
    e.preventDefault();
    const fullText = $(this).data('full');
    $('#modalBodyContent').html(fullText);
    $('#shortDetailModal').modal('show');
});
</script>
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