@extends('inventory.layouts.master')
@section('title')
    Inventory Report Generate
@endsection

@push('styles')
    <style>

    </style>
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
                    <h3>{{ $report_title }} - Report</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Inventory / Reports</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">

                        <form action="{{ route('reports.inventory.generate') }}" method="post" id="report-form">
                            @csrf
                            <input type="hidden" name="type" value="{{ $report_type }}" id="type">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Date</label>
                                        <input type="text" id="daterange" name="daterange" class="form-control" />
                                        <small id="helpId" class="form-text text-danger"></small>
                                    </div>

                                </div>

                                <div class="form-group col-md-3 ">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Select Paper Type</label>
                                        <select class="form-select" name="paper_type">
                                            {{-- <option value="" disabled selected>Select Portrait/Landscape</option> --}}
                                            <option value="portrait" selected>Portrait</option>
                                            <option value="landscape">Landscape</option>
                                        </select>
                                        <small id="helpId" class="form-text text-danger"></small>
                                    </div>

                                </div>

                                <div class="form-group col-md-3 ">


                                    <div class="mb-3">
                                        <label for="" class="form-label"> &nbsp; </label>
                                        <button type="submit" class="listing_add ">Generate PDF</button>
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#daterange').daterangepicker({
                opens: 'right', // Position of the picker
                locale: {
                    format: 'YYYY-MM-DD' // Date format
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#report-form').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();
                var re_type = $('#type').val();

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    xhrFields: {
                        responseType: 'blob' // Important for handling binary data
                    },
                    success: function(blob, status, xhr) {
                        // Check if the response contains an error
                        const contentType = xhr.getResponseHeader("Content-Type");
                        if (contentType && contentType.includes("application/json")) {
                            const reader = new FileReader();
                            reader.onload = function() {
                                try {
                                    const response = JSON.parse(reader.result);
                                    if (response.error) {
                                        toastr.error(response.error);
                                        return;
                                    }
                                } catch (err) {
                                    console.error("Error parsing JSON:", err);
                                }
                            };
                            reader.readAsText(blob);
                            return;
                        }

                        // If no error, process the blob as a file download
                        var url = window.URL.createObjectURL(blob);
                        var a = document.createElement('a');
                        a.href = url;
                        a.download = re_type + '.pdf';
                        document.body.appendChild(a);
                        a.click();
                        window.URL.revokeObjectURL(url);
                    },
                    error: function(xhr, status, error) {
                        console.error('There was an error with your request:', error);
                        if (xhr.status === 201) {
                            try {
                                const response = JSON.parse(xhr.responseText);
                                toastr.error(response.error || 'Data Not Found!');
                            } catch (err) {
                                toastr.error('Data Not Found!');
                            }
                        } else {
                            toastr.error('Data Not Found!');
                        }
                    }
                });

            });
        });
    </script>
@endpush
