@extends('imprest.layouts.master')
@section('title')
    Advance Settlement List
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
                <div class="arrow_left"><a href="{{ route('advance-settlement.index') }}" class="text-white"><i
                            class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Advance Settlement Create</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Advance Settlement Create</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->

        <div class="row">
            <div class="col-md-6 text-start mb-3">
                <h5>Cash In Bank - {{ Helper::bankPayments() }}</h5>
            </div>
            <div class="col-md-6 text-end mb-3">
                <h5> Cash In hand - {{ Helper::cashPayments() }}</h5>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div id="form">


                            <form action="" method="post" id="searchAdv-form">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Adv No</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="adv_no"
                                                    value="{{ old('adv_no') ?? '' }}" placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Adv Date</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="date" class="form-control" name="adv_date"
                                                    value="{{ old('adv_date') ?? '' }}" placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label></label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="submit" class="btn btn-primary" id="searchAdv" value="Search">

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </form>



                            <div id="advDataDiv">



                            </div>


                        </div>


                    </div>
                </div>
            </div>
        </div>


        <div class="row">

        </div>



    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
    $("#searchAdv-form").submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            type: "post",
            url: "{{ route('advance-settle-bills.get-adv') }}",
            data: formData,
            dataType: "json",
            success: function(response) {
                // Clear previous error messages
                $(".text-danger").text("");

                if (response.isdata == 1) {
                    $("#advDataDiv").html(response.view);
                } else {
                    // If no data found, display an error below the Adv No field
                    $("input[name='adv_no']").next(".text-danger").text("Adv No Not found");
                    $("input[name='adv_date']").next(".text-danger").text("Adv Date Not found");
                }
            },
            error: function(xhr) {
                // Handle server-side validation errors
                $(".text-danger").text(""); // Clear previous error messages

                var errors = xhr.responseJSON.errors;
                if (errors) {
                    $.each(errors, function(key, value) {
                        // Display errors below respective fields
                        $("input[name='" + key + "']").next(".text-danger").text(value[0]);
                    });
                }
            }
        });
    });
});

</script>
@endpush
