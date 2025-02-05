@extends('inventory.layouts.master')
@section('title')
    Settings - PDF Paper Type
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
                    <h3>Settings - PDF Paper Type</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Settings</span></li>
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
                            <form action="{{ route('settings.pdf-page-type.save') }}" method="POST" id="save-form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">



                                            <div class="form-group col-md-4 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>PDF Paper Type</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <select class="form-select" name="paper_type">
                                                            {{-- <option value="" disabled selected>Select Portrait/Landscape</option> --}}
                                                            <option value="portrait" {{ $setting->pdf_page_type == 'portrait' ? 'selected' : ''}}>Portrait
                                                            </option>
                                                            <option value="landscape" {{ $setting->pdf_page_type == 'landscape' ? 'selected' : ''}}>Landscape</option>
                                                        </select>
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label></label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-primary">
                                                            Save
                                                        </button>

                                                        <span class="text-danger"></span>
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
    @endsection
