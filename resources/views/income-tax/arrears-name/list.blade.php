@extends('income-tax.layouts.master')
@section('title')
    Manage Arrears Names
@endsection

@push('styles')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="breadcome-list">
            <div class="d-flex">
                <div class="arrow_left"><a href="{{ route('dashboard') }}" class="text-white"><i
                            class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Arrears Names</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="{{ route('dashboard') }}">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Arrears Names</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="create-form">
            @include('income-tax.arrears-name.create')
        </div>

        <div class="edit-form" style="display: none;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card w-100">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Edit Arrears Name</h5>

                            <div class="alert alert-danger error-messages" style="display: none;">
                                <ul></ul>
                            </div>

                            <form id="edit-arrears-form" method="POST" action="">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="arrears_id" id="arrears_id">

                                <div class="mb-3 col-md-4">
                                    <label for="edit_name" class="form-label">Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="edit_name" name="name" required>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="edit_description" class="form-label">Description</label>
                                    <textarea class="form-control" id="edit_description" name="description" rows="3"></textarea>
                                </div>

                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="edit_status" name="status"
                                        value="1">
                                    <label class="form-check-label" for="edit_status">Active</label>
                                </div>

                                <div class="text-end">
                                    <button type="button" class="btn btn-secondary me-2 cancel-edit">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h5 class="card-title fw-semibold">Arrears Names List</h5>

                        </div>
                        {{-- @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($arrearsNames as $arrearsName)
                                        <tr>
                                            <td>{{ $arrearsName->id }}</td>
                                            <td>{{ $arrearsName->name }}</td>
                                            <td>{{ $arrearsName->description ?? 'N/A' }}</td>
                                            <td>
                                                <span class="">
                                                    {{ $arrearsName->status ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td class="sepharate">
                                                <a href="javascript:void(0)" class="edit_pencil edit-arrears-btn"
                                                    data-id="{{ $arrearsName->id }}" data-name="{{ $arrearsName->name }}"
                                                    data-description="{{ $arrearsName->description }}"
                                                    data-status="{{ $arrearsName->status }}">
                                                    <i class="ti ti-pencil"></i>
                                                </a>
                                                {{-- <a type="button" class="edit_pencil delete-arrears-name btn-transparent ms-2"
                                                    data-id="{{ $arrearsName->id }}" data-name="{{ $arrearsName->name }}">
                                                    <i class="ti ti-trash"></i> --}}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (count($arrearsNames) == 0)
                                        <tr>
                                            <td colspan="5" class="text-center">No arrears names found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Delete arrears name functionality
            $('.delete-arrears-name').on('click', function() {
                let id = $(this).data('id');
                let name = $(this).data('name');

                if (confirm(`Are you sure you want to delete "${name}"?`)) {
                    $.ajax({
                        url: `{{ route('arrears-name.destroy', '') }}/${id}`,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.success) {
                                toastr.success(response.message);
                                // Reload the page after deletion
                                setTimeout(function() {
                                    window.location.reload();
                                }, 1000);
                            } else {
                                toastr.error('Error deleting arrears name.');
                            }
                        },
                        error: function() {
                            toastr.error('Error deleting arrears name.');
                        }
                    });
                }
            });

            // Edit button click handler
            $('.edit-arrears-btn').on('click', function() {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let description = $(this).data('description');
                let status = $(this).data('status');

                // Populate edit form
                $('#arrears_id').val(id);
                $('#edit_name').val(name);
                $('#edit_description').val(description);
                $('#edit_status').prop('checked', status == 1);

                // Show edit form, hide create form
                $('.create-form').hide();
                $('.edit-form').show();

                // Set form action URL
                $('#edit-arrears-form').attr('action', `{{ route('arrears-name.update', ':id') }}`.replace(
                    ':id', id));
            });

            // Cancel edit button
            $('.cancel-edit').on('click', function() {
                $('.edit-form').hide();
                $('.create-form').show();
                $('.error-messages').hide();
            });

            // Handle edit form submission
            $('#edit-arrears-form').on('submit', function(e) {
                e.preventDefault();

                let form = $(this);
                let url = form.attr('action');

                $.ajax({
                    type: "POST", // Change from PUT to POST
                    url: url,
                    data: form.serialize(), // This will include _method=PUT from the form
                    success: function(response) {

                        // Reload the page to show updated data
                        setTimeout(function() {
                            window.location.reload();
                        }, 200);

                    },

                });
            });
        });
    </script>
@endpush
