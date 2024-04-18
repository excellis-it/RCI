@extends('imprest.layouts.master')
@section('title')
    Advance Settlement Edit
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
                <div class="arrow_left"><a href="{{ route('advance-settlement.index') }}" class="text-white"><i
                            class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Advance Settlement Edit</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Edit</span></li>
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

                            <form action="{{ route('advance-settlement.update', $advance_settlement->id) }}" method="POST"
                                id="advance-settlement-create-form">
                                @method('PUT')
                                @csrf

                                <div class="row">

                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Adv No</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="adv_no" id="adv_no"
                                                    value="{{ $advance_settlement->adv_no ?? '' }}" placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Adv dt</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="date" class="form-control" name="adv_date" id="adv_date"
                                                    value="{{ $advance_settlement->adv_date ?? '' }}" placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Adv amt</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="adv_amount" id="adv_amount"
                                                    value="{{ $advance_settlement->adv_amount ?? '' }}" placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Project</label>
                                            </div>
                                            <div class="col-md-12">
                                                <select name="project_id" id="project_id" class="form-control">
                                                    <option value="">Select</option>
                                                    @foreach ($projects as $project)
                                                        <option value="{{ $project->id }}"
                                                            {{ isset($advance_settlement->project_id) && $project->id == $advance_settlement->project_id ? 'selected' : '' }}>
                                                            {{ $project->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Vr No</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="var_no" id="var_no"
                                                    value="{{ $advance_settlement->var_no ?? '' }}" placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Vr dt</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="date" class="form-control" name="var_date" id="var_date"
                                                    value="{{ $advance_settlement->var_date ?? '' }}" placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Vr amt</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="var_amount" id="var_amount"
                                                    value="{{ $advance_settlement->var_amount ?? '' }}" placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>var Type</label>
                                            </div>
                                            <div class="col-md-12">
                                                <select name="var_type_id" id="var_type_id" class="form-control">
                                                    <option value="">Select</option>
                                                    @foreach ($variable_types as $variable_type)
                                                        <option value="{{ $variable_type->id }}"
                                                            {{ isset($advance_settlement->var_type_id) && $variable_type->id == $advance_settlement->var_type_id ? 'selected' : '' }}>
                                                            {{ $variable_type->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Chq No</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="chq_no" id="chq_no"
                                                    value="{{ $advance_settlement->chq_no ?? '' }}" placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Chq dt</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="date" class="form-control" name="chq_date"
                                                    id="chq_date" value="{{ $advance_settlement->chq_date ?? '' }}"
                                                    placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- save cancel button design in right corner --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row justify-content-end">
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="form-group col-md-6 mb-2">
                                                        <button type="submit" class="listing_add">Update</button>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-2">
                                                        <button type="submit" class="listing_exit">Cancel</button>
                                                    </div>
                                                </div>
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

        <hr>
        <div class="row">
            <div class="col-lg-6">

                <div class="recov-table">
                    <table class="table customize-table mb-0 align-middle bg_tbody" id="loan-table">
                        <thead class="text-white fs-4 bg_blue">
                            <tr>
                                <th>Firm</th>
                                <th>Bill Amount</th>
                                <th>Balance</th>

                            </tr>
                        </thead>
                        <tbody class="tbody_height_scroll">
                            @include('imprest.advance-settlement.bill-table')

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6" id="loan-form">
                @include('imprest.advance-settlement.bill-form')
            </div>
        </div>
    </div>
    
@endsection

@push('scripts')

    <script>
        $(document).ready(function() {
        $('#advance-settlement-bills-create-form').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
        

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                success: function(response) {
                   
                    var route = "{{ route('advance-settlement-bills.edit', ['id' => ':id']) }}";
                    route = route.replace(':id', id);
                    
                    // var route = '/members-loan-edit/' + data.id;
                    // Construct table row HTML
                    var newRow = '<tr class="edit-route-advance-bill"  data-id="'+ id +'" data-route="' + route +
                        '">';
                    newRow += '<td>' + data.loan_name +
                        '</td>'; // Use loanName directly if it's a string, adjust accordingly
                    newRow += '<td>' + (data.present_inst_no ? data
                        .present_inst_no : 'N/A') + '</td>';
                    newRow += '<td>' + data.total_amount + '</td>';
                    newRow += '<td>' + new Date(data.created_at).toLocaleDateString(
                        'en-GB', {
                            day: '2-digit',
                            month: '2-digit',
                            year: 'numeric'
                        }).split('/').join('-'); + '</td>';
                    newRow += '<td>' + (data.remark ? data.remark : 'N/A') +
                        '</td>';
                    newRow += '</tr>';

                    // Append new row to table
                    $('#loan-table tbody').append(newRow);
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
