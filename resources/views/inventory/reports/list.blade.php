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
                <h3>Inventory</h3>
                <ul class="breadcome-menu mb-0">
                    <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                    <li><span class="bread-blod">Inventory / Reports</span></li>
                </ul>
            </div>
        </div>
    </div>
    <!--  Row 1 -->


<div class="">

        <div class="card-wrap">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('reports.traffic-control') }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Traffic Control Register</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('reports.security-gate') }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Security Gate Store Register</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('reports.store-inward') }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Stores inward Register</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('reports.rin-controller') }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Rin Controller Register</h5>
                            </div>
                        </div>
                    </a>

                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('reports.certificate-receipt-voucher')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Certificate receipt voucher</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('cda-receipts.index')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Ledger Sheet</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('item-codes.index') }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Bin Card</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('arrears.index')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Register for inventories</h5>
                            </div>
                        </div>
                    </a>

                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('cash-payments.index')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Stock sheet</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('cda-receipts.index')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Inventory Loan register</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('item-codes.index') }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Discrepancy</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('arrears.index')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Internal demand & issue voucher</h5>
                            </div>
                        </div>
                    </a>

                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('cash-payments.index')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Internal return & receipt voucher</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('cda-receipts.index')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Trial store gate pass</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('item-codes.index') }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Armaments and Ammunition register</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('arrears.index')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Disposal Item</h5>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('cash-payments.index')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Statement of damaged</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('cda-receipts.index')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Cash purchase control register</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('item-codes.index') }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Stores outward register</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('arrears.index')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Record of transaction</h5>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('cash-payments.index')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Loan out ledger register</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('cda-receipts.index')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Loan in ledger register</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('item-codes.index') }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CPRV control register</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('arrears.index')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CPIV control register</h5>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('cash-payments.index')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Contingent bill</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('cda-receipts.index')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Contractor's bill</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('item-codes.index') }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Certified issue voucher</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('arrears.index')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Expendable store issue voucher</h5>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('cash-payments.index')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Fitment Voucher</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('uom.index') }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">LVP List</h5>
                            </div>
                        </div>
                    </a>
                </div>
              
            </div>
        </div>
        <!-- Add more cards as needed -->
    </div>

</div>
@endsection

@push('scripts')
    
@endpush
