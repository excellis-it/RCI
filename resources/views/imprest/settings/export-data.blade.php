@extends('imprest.layouts.master')
@section('title')
    Import Export Imprest
@endsection

@push('styles')
@endpush


@section('content')
    <section id="loading">
        <div id="loading-content"></div>
    </section>
    <div class="container-fluid">
        <div class="breadcome-list">
            <div class="d-flex">
                <div class="arrow_left"><a href="" class="text-white"><i class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3> Import Export Imprest Data</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Imprest </span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <!-- Export Section -->
                <div class="col-5">
                    <h3>Export Data</h3>
                    <form action="{{ route('csv.export') }}" method="GET" class="mt-5">
                        <div class="mb-3">

                            <input type="hidden" name="data_type" id="data_type" class="form-control" value="imprest">
                        </div>
                        <button type="submit" class="btn btn-primary w-50">Export</button>
                    </form>
                </div>

                <div class="col-2"></div>

                <!-- Import Section -->
                <div class="col-5">
                    <h3>Import Data</h3>
                    <form id="importForm" action="{{ route('csv.import') }}" method="POST" enctype="multipart/form-data"
                        class="mt-5">
                        @csrf
                        <div class="mb-3">

                            <input type="hidden" name="data_type" id="data_type" class="form-control" value="imprest">
                        </div>
                        <div class="mb-3">
                            <label for="csv_file" class="form-label">CSV File</label>
                            <input type="file" name="csv_file" id="csv_file" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success w-50">Import</button>
                    </form>

                    <!-- Modal for Conflict Resolution -->
                    <div class="modal fade" id="conflictModal" tabindex="-1" aria-labelledby="conflictModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="conflictModalLabel">Warning</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center text-warning">Data already exist in the database!</p>
                                    <p hidden>Conflict detected for record with ID: <span id="conflict-id"></span></p>
                                    <p>Are you sure to replace the existing data?</p>
                                    <button id="replace-btn" class="btn btn-warning">Yes</button>
                                    <button class="btn btn-warning ms-3" data-bs-dismiss="modal">No</button>
                                    {{-- <button id="insert-btn" class="btn btn-secondary">Insert as New</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Progress Modal -->
                    <div class="modal fade" id="progressModal" tabindex="-1" aria-labelledby="progressModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="progressModalLabel">Uploading...</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar" style="width: 0%;" id="uploadProgress"></div>
                                    </div>
                                    <p class="mt-3 text-center">Please wait while the file is being uploaded.</p>
                                </div>
                            </div>
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
            const $form = $('#importForm');
            const $progressModal = new bootstrap.Modal($('#progressModal')[0], {});
            const $progressBar = $('#uploadProgress');
            const $conflictModal = new bootstrap.Modal($('#conflictModal')[0], {});
            let currentData = null; // To store data for conflict resolution

            $form.on('submit', function(event) {
                event.preventDefault();

                // Show the progress modal
                $progressModal.show();

                const formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        if (data.conflict) {
                            $progressModal.hide();
                            $("#progressModal").modal('hide');
                            // Show the conflict modal and stop the progress modal from hiding
                            currentData = data.data;
                            $('#conflict-id').text(currentData.id);
                            setTimeout(() => {

                                $conflictModal.show();
                                $("#progressModal").modal('hide');
                            }, 800);

                        } else {
                            // When no conflict, show success and hide progress modal
                            $progressBar.css('width', '100%').removeClass(
                                'progress-bar-animated');
                            setTimeout(function() {
                                $progressModal.hide();
                                toastr.success('Data imported successfully!');
                                window.location.reload();
                            }, 1000);
                        }
                    },
                    error: function(error) {
                        $progressBar.css('width', '0%').removeClass('progress-bar-animated');
                        $progressModal.hide();
                        alert('An error occurred during the import process: ' + error.message);
                    }
                });
            });

            // Resolve conflict: Replace
            $('#replace-btn').on('click', function() {
                resolveConflict(true);
            });

            // Resolve conflict: Insert as New
            $('#insert-btn').on('click', function() {
                resolveConflict(false);
            });



            function resolveConflict(replace) {
                const formData = new FormData();
                formData.append('replace', replace);
                formData.append('csv_file', $('#csv_file')[0].files[0]);
                formData.append('data_type', 'imprest');

                $progressModal.show(); // Show progress modal during the conflict resolution process
                $.ajax({
                    url: '{{ route('csv.import') }}', // AJAX request URL
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // CSRF token for security
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success(
                            'Data imported successfully!'); // Success message after completion
                            $progressModal.hide(); // Hide progress modal
                            $conflictModal.hide(); // Hide the conflict modal
                            window.location.reload(); // Reload the page to reflect changes
                        } else {
                            toastr.error(
                            'An error occurred while resolving the conflict.'); // Error handling
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.error('Request failed: ' + error); // Error message in case of failure
                        $progressModal.hide(); // Hide progress modal in case of error
                    }
                });
            }

        });
    </script>
@endpush
