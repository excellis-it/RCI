@extends('frontend.layouts.master')
@section('title')
    Members List
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
                    <h3>Member Listing</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Member Listing</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div id="form">
                            @include('frontend.members.form')
                        </div>

                        {{-- <div class="row">
                            <div class="col-md-12 mb-4 mt-4">
                                <div class="row justify-content-end">
                                    <div class="col-md-5 col-lg-3 mb-2 mt-4">
                                        <div class="position-relative">
                                            <input type="text" class="form-control search_table" value=""
                                                id="search" placeholder="Search">
                                            <span class="table_search_icon"><i class="fa fa-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive rounded-2">
                                    <table class="table customize-table mb-0 align-middle bg_tbody">
                                        <thead class="text-white fs-4 bg_blue">
                                            <tr>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="designation"
                                                    style="cursor: pointer">Designation Name <span id="designation_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="full_name"
                                                    style="cursor: pointer">Full Name <span id="full_name_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="order"
                                                    style="cursor: pointer">Order <span id="order_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                        <th>Category</th>
                                                <th>Type</th>
                                                <th>Payscale</th>
                                                <th>Payband</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll">
                                            @include('frontend.designations.table')
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                                    <input type="hidden" name="hidden_column_name" id="hidden_column_name"
                                        value="id" />
                                    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="desc" />
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
       
    </div>
@endsection

@push('scripts')
{{-- 
<script>
    $(document).ready(function() {
        //pers no view
        $('#pers_no').on('keyup', function() {
            var pers_no = $(this).val();
            $('#pers_no_view').val(pers_no);
        });

        //emp_id view
        $('#emp_id').on('keyup', function() {
            var emp_id = $(this).val();
            $('#emp_id_view').val(emp_id);
        });

        //name_view 
        $('#name').on('keyup', function() {
            var name = $(this).val();
            $('#name_view').val(name);
        });
        //desig_view
        $('#desig').on('keyup', function() {
            var desig = $(this).val();
            $('#desig_view').val(desig);
        });

        //basic_view
        $('#basic').on('keyup', function() {
            var basic = $(this).val();
            $('#basic_view').val(basic);
        });
        //grade_view
        $('#grade').on('keyup', function() {
            var grade = $(this).val();
            $('#grade_view').val(grade);
        });
        //devision_view
        $('#devision').on('keyup', function() {
            var devision = $(this).val();
            $('#devision_view').val(devision);
        });
    });
</script> --}}

<script>
   $(document).ready(function() {
        var randomId = 'RCI-CHESE-' + Math.random().toString().substr(2, 8);
        document.getElementById('emp_id').value = randomId;
    });
</script>

<script>
    $(document).ready(function() {
        $('#member-create-form').submit(function(e) {
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
