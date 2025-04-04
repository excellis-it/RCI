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
                        <a href="{{ route('members.download-import-formatfile') }}" class="btn btn-success mb-3">Download
                            Excel
                            Format Template</a>

                        <form action="{{ route('members.import-excel-data') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="import_file" class="form-label">Upload Excel File</label>
                                <input type="file" class="form-control" name="import_file" id="import_file"
                                    accept=".xlsx, .xls" required>
                                <small class="form-text text-muted">
                                    Upload an Excel file with sheets only named 'CGO GPF', 'CGO NPS', 'NIE', 'CGO NPS' and
                                    'NIE NPS'
                                    containing member data.
                                    Each sheet must have column headers exactly matching the template.
                                </small>
                            </div>

                            <button type="submit" class="btn btn-primary">Import</button>
                        </form>

                        @if (session('error'))
                            <div class="alert alert-danger mt-3">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@push('scripts')
@endpush
