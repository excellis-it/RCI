@extends('inventory.layouts.master')
@section('title')
    Inventory Report Generate
@endsection

@push('styles')
    <style>
        .inv-report-title {
            font-size: 15px;
            text-align: center;
        }

        .inv-report-card-body {
            padding-left: 15px;
            padding-right: 15px;
            height: 80px !important;
        }

        .inv-report-list .card {
            transition: transform 0.3s ease-in-out;
        }

        .inv-report-list .card:hover {
            transform: scale(1.1);
        }
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
                    <h3>Reports</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Inventory / Reports</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->


        <div class="">

            <div class="card-wrap inv-report-list">
                <div class="row justify-content-center">
                    <!-- Alphabetically sorted cards -->
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.armaments-ammunition-register') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Armaments and Ammunition register</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.bin-card') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Bin Card</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.cash-purchase-control-register') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Cash purchase control register (CPCR)</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.certificate-receipt-voucher') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Certificate receipt voucher (CRV)</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.inventory', 'certificate_issue') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Certificate Issue Vouchers (CIV)</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.certified-issue-voucher') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Certified issue voucher (CIV)</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.contingent-bill') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Contingent bill</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.contractors-bill') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Contractor's bill</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.inventory', 'conversion_voucher') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Conversion Vouchers (CV)</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.cprv-control-register') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">CPRV control register</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.cpiv-control-register') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">CPIV control register</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.inventory', 'credit_voucher') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Credit Vouchers</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.inventory', 'debit_voucher') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Debit Vouchers</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.discrepancy-report') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Discrepancy</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.disposal-item-report') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Disposal Item</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.expendable-store-issue-voucher') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Expendable store issue voucher (EX)</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.inventory', 'external_issue') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">External Issue Vouchers (EIV)</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.fitment-voucher') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Fitment Voucher</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.internal-demand-issue-voucher') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Internal demand & issue voucher (IDIV)</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.internal-return-receipt-voucher') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Internal return & receipt voucher (IRRV)</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.inventory-loan-register') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Inventory Loan register</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.inventory', 'inventory_numbers') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Inventory Numbers (NEW)</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.item-names-report') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Item Names</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.inventory-items-report') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Inventory Items</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.ledger-sheet') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Ledger Sheet</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.loan-in-ledger-register') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Loan in ledger register</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.loan-out-ledger-register') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Loan out ledger register</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.lvp-list') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">LVP List</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.record-of-transaction') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Record of transaction</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.register-for-inventories') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Register for inventories (INV)</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.rin-controller-list') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Rin Control Register (RIN)</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('security-gate-stores.index') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Security Gate Store Register</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.inventory', 'statement_of_damaged') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Statement of damaged</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.stock-sheet') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Stock sheet</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.store-inward-list') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Stores inward Register (SIR)</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.stores-outward-register') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Stores outward register (SOB)</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.inventory', 'transfer_voucher') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Transfer Vouchers (TV)</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('traffic-controls.index') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Traffic Control Register</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('reports.trial-store-gate-pass') }}">
                            <div class="card">
                                <div class="card-body inv-report-card-body">
                                    <h5 class="card-title inv-report-title">Trial store gate pass</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    @endsection

    @push('scripts')
    @endpush
