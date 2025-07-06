@extends('layouts.BackendLayout')
@section('title', 'Update Role')
@section('backend')
<div class="container py-4">
        <form action="{{ route('permission.store', $role->id ?? 'missing-id') }}" method="POST">
    <div class="row">
        <div class="col-lg-6"><a href="{{ url()->previous() }}" class="btn btn-danger mb-2 btn-sm" >Back</a></div>
        <div class="col-lg-6 text-end"><button type="submit" class="btn btn-primary">Save Permissions</button></div>
    </div>
        <h2 class="mb-4">Assign Permissions</h2>
            @csrf
    
@foreach ($permissions as $groupName => $perms)
    <div class="card mb-4 shadow-sm">
        <div class="card-header fw-bold">
            {{ ucfirst($groupName) }} - Management
        </div>
        <div class="card-body">
            @foreach ($perms as $permission)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" 
                           name="permissions[]" 
                           value="{{ $permission->name }}" 
                           id="perm-{{ $permission->id }}"
                           {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>
                    <label class="form-check-label" for="perm-{{ $permission->id }}">
                        {{ Str::after($permission->name, '.') }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
@endforeach

        </form>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.select-all').forEach(selectAllCheckbox => {
            selectAllCheckbox.addEventListener('change', function () {
                const section = this.getAttribute('data-section');
                const checkboxes = document.querySelectorAll(`.permission-section[data-section="${section}"] input[type="checkbox"]`);
                checkboxes.forEach(cb => cb.checked = this.checked);
            });
        });
    });
</script>
@endpush
