@extends('layouts.BackendLayout')
@section('title', 'users')
@section('users')


<!-- Menu update  -->
<section id="menu" class="m-4">
  <h3>Users</h3>
  <div class="card shadow  mb-">
    <div class="mt-3 p-3 pb-0">

     <a href="{{route('create.user')}}"><button type="button" class="btn btn-primary">Add Users</button></a>
     {{-- data-bs-whatever="@mdo" --}}

            <div class="card-body">
              <table id="usersTable" class="table table-bordered" >
                <thead class="thead-dark" >
                  <tr class="text-center">
                    <th>#</th>  
                    <th>Image</th>
                    <th>Signature</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>User ID</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
              </table>
            </div>
         
          </div>
  
   
</section>

@push('scripts')
<script>

 let table = new DataTable('#usersTable',{
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: '{{ route('roleAndPermission.users') }}',
        },
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'image', orderable: false, searchable: false },
            { data: 'signature', orderable: false, searchable: false },
            { data: 'name', orderable: false, searchable: true },
            { data: 'position' },
            { data: 'email', searchable:true },
            { data: 'role', searchable:true },
            { data: 'user_id', searchable:true },
            { data: 'department' },
            { data: 'status' },
            { data: 'actions', orderable: false, searchable: false }
        ]
    });
 $(document).ready(function(){
    $('.btnDelete').click(function(e){
      event.preventDefault();
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
      window.location.href = $(this).attr('href');
      }
    });
  });
  });




 $(document).ready(function() {
        // User Select2
        $('#select-user').select2({
            placeholder: 'Select User',
            allowClear: true,
            ajax: {
                url: '{{ route('live.user') }}',
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
      });
</script>

@endpush

@endsection