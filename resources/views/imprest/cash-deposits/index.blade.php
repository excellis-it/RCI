@extends('imprest.layouts.master')

@section('title', 'Cash Deposit')

@section('content')
@php
    use App\Helpers\Helper;
@endphp
<section id="loading">
    <div id="loading-content"></div>
</section>
    <div class="container-fluid">


        <div class="breadcome-list">
            <div class="d-flex">
                <div class="arrow_left"><a href="" class="text-white"><i class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Cash Deposits</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Cash Deposits</span></li>
                    </ul>
                </div>
            </div>
        </div>

        @include('imprest.cash-deposits.create')

        <div class="row card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        {{-- <a href="{{ route('cash-deposits.create') }}" class="btn btn-primary">Add New Cash Deposit</a> --}}

                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>VR No</th>
                                <th>VR Date</th>
                                <th>RCT No</th>
                                <th>RCT Date</th>
                                <th>Amount</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cashDeposits as $deposit)
                                <tr>
                                    <td>{{ $deposit->vr_no }}</td>
                                    <td>{{ $deposit->vr_date->format('d-m-Y') }}</td>
                                    <td>{{ $deposit->rct_no }}</td>
                                    <td>{{ $deposit->rct_date->format('d-m-Y') }}</td>
                                    <td>{{ number_format($deposit->amount, 2) }}</td>
                                    <td>{{ $deposit->created_at->format('d-m-Y H:i') }}</td>
                                </tr>
                            @endforeach

                            @if ($cashDeposits->count() == 0)
                                <tr>
                                    <td colspan="6" class="text-center">No cash deposits found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end">
                    {{ $cashDeposits->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            const maxAmount = {{ Helper::getImprestCashInHand() }};

            $('#amount').on('input', function() {
                const value = parseFloat($(this).val());
                if (value > maxAmount) {
                    $(this).val(maxAmount);
                    $('#amountError').text('Amount cannot exceed the cash in hand: ' + maxAmount).show();
                } else {
                    $('#amountError').hide();
                }
            });
        });
    </script>
@endpush
