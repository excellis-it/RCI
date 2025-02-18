@extends('frontend.layouts.master')
@section('title')
    Import Members
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
                    <h3>Import Members</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Import Members</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->
        <div class="row card card-body">
            <div class="col-6">
                <div class="">
                    <div class="card-body">
                        <a href="{{ route('members.download-import-formatfile') }}" class="btn btn-success mb-3">Download Excel
                            Format</a>

                        <form action="{{ route('members.import-excel-data') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="member_type" class="form-label">Member Fund Type</label>
                                <select class="form-select" name="member_fund_type" id="member_fund_type" required>
                                    <option value="">Select Member Fund Type</option>
                                    <option value="GPF">GPF</option>
                                    <option value="NPS">NPS</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="import_file" class="form-label">Upload Excel File</label>
                                <input type="file" class="form-control" name="import_file" id="import_file"
                                    accept=".xlsx, .xls" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Import</button>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection

@push('scripts')
@endpush
