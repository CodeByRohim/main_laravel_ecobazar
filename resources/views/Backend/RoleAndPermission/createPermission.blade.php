@extends('layouts.BackendLayout')
@section('title', 'Create Permission')
@section('backend')

<div class="container py-4">
    <h2>Create New Permission</h2>

    <form action="{{ route('permission.store.new') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Group Name</label>
            <input type="text" name="group_name" class="form-control" placeholder="e.g. Enter Management" required>
        </div>

        <div class="mb-3">
            <label>Action</label>
            <input type="text" name="action" class="form-control" placeholder="e.g. create / show / edit / delete" required>
        </div>

        <div class="mb-3">
            <label>Generated Permission Name</label>
            <input type="text" id="name_preview" class="form-control" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const group = document.querySelector('[name="group_name"]');
        const action = document.querySelector('[name="action"]');
        const preview = document.querySelector('#name_preview');

        function updatePreview() {
            const groupVal = group.value.toLowerCase().replace(/\s+/g, '-');
            const actionVal = action.value.toLowerCase();
            preview.value = groupVal && actionVal ? `${groupVal}.${actionVal}` : '';
        }
       
        group.addEventListener('input', updatePreview);
         action.addEventListener('input', updatePreview);
       
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
  title: "Permission Added Successfully"
});
    </script>
@endif
@endpush
