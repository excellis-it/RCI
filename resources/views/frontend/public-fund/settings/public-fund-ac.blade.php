@extends('frontend.public-fund.layouts.master')
@section('title')
    Setings
@endsection

@push('styles')
@endpush

@php
    use App\Helpers\Helper;
@endphp

@section('content')
    <section id="loading">
        <div id="loading-content"></div>
    </section>
    <div class="container-fluid">
        <div class="breadcome-list">
            <div class="d-flex">
                <div class="">
                    <h3>Public Fund Bank Account No.</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Bank Account</a> <span class="bread-slash"></span></li>

                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div id="form">
                            <form action="{{ route('settings.store') }}" method="POST" id="public_bank_account_form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="row">

                                            <div class="form-group col-md-12 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Bank Account No.</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="public_bank_ac"
                                                            id="public_bank_ac">
                                                        <span class="text-danger"></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label></label>
                                        <div class="row">
                                            <div class="form-group col-md-8 mb-2">
                                                <button type="submit" class="listing_add">Save</button>
                                            </div>

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
                $('#public_bank_account_form').submit(function(e) {
                    e.preventDefault();

                    var formData = $(this).serialize();

                    $.ajax({
                        url: $(this).attr('action'),
                        type: $(this).attr('method'),
                        data: formData,
                        success: function(response) {
                            //windows load with toastr message
                            window.location.reload();
                        },
                        error: function(xhr) {
                            // Handle errors (e.g., display validation errors)
                            //clear any old errors
                            $('.text-danger').html('');
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                // Assuming you have a div with class "text-danger" next to each input
                                $('[name="' + key + '"]').next('.text-danger').html(value[
                                    0]);
                            });
                        }
                    });
                });
            });
        </script>
    @endpush
