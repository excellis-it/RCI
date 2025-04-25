<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment Report</title>
        <style>
            @page {
                margin: 25px !important;
                padding: 25px !important;
            }

            body {
                margin: 5px !important;
                padding: 5px !important;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th,
            td {
                border: 1px solid #000;
                padding: 8px;
                text-align: left;
                font-size: 20px;
                line-height: 20px;
            }

            th {
                /* border-bottom: 1px solid #000; */
            }

            .page-break {

                page-break-after: always;

            }
        </style>
    </head>

    <body>
        @php
            use App\Helpers\Helper;

            // Generate sequential serial numbers for unique cheque numbers
            $chequeSerialNumbers = [];
            $serialCounter = 1;

            if (isset($payments) && count($payments) > 0) {
                foreach ($payments as $key => $payment) {
                    if (!isset($chequeSerialNumbers[$key])) {
                        $chequeSerialNumbers[$key] = $serialCounter++;
                    }
                }
            }
        @endphp
        <center>
            <img src="{{ public_path('storage/' . $logo->logo) }}" style="max-width: 50px;padding-bottom: 5px">
        </center>

        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
            style="border-radius: 0px; margin: 0 auto; text-align: center; border-color: inherit;">
            <tbody>
                <tr style="border-color: inherit; border:none;">
                    <td style="padding: 0 0px;border-color: inherit; border:none;">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                            <tbody>
                                <tr style="border-color: inherit; border:none;">
                                    <td
                                        style="font-size: 14px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important;
      text-transform: uppercase; border-color: inherit; border:none;">
                                        {{ $print_date }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                            <tbody>
                                <tr style="border-color: inherit; border:none;">
                                    <td
                                        style="
      font-size: 14px;
      line-height: 14px;
      font-weight: 600;
      color: #000;
      text-align: center;
      padding: 0px 5px !important;
      margin: 0px 0px !important;
      text-transform: uppercase;

      border-color: inherit; border:none;
    ">
                                        CENTER FOR HIGHENERGY SYSTEMS & SCIENCES (CHESS) <br />
                                        RCI CAMPUS, HYDERABAD - 500 069 <br />
                                        PUBLIC FUND A/c No - {{ $settings->public_bank_ac ?? '' }} CASH BOOK
                                        <br>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr style="border-color: inherit; margin-bottom: 10px; border:none;">
                    <td style="padding: 0 0px; border-color: inherit;border:none;">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                            <tbody>
                                <tr>
                                    <td
                                        style="
                                border:none;
                  font-size: 14px !important;
                  color: #000;
                  text-align: left;
                  padding: 0px 5px !important;
                  margin: 0px 0px !important;
                  font-weight: 600;

                ">
                                        PAYMENTS FOR {{ \Carbon\Carbon::parse($chq_date)->format('d/m/Y') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>


            </tbody>
        </table>
        {{-- @dd($payment_members->toArray()) --}}


        @if (count($payment_members) > 0)
            @php
                $total_previous_reciepts = [];
                $total_previous_balance = [];
                $total_previous_balance1 = [];
                $start = 0;
                foreach ($category as $cat) {
                    $total_previous_reciepts[$cat->id] = 0;
                    $total_previous_balance[$cat->id] = 0;
                    $total_previous_balance1[$cat->id] = 0;
                }
            @endphp
            @foreach ($payment_members as $new_member)
                <table class="{{ !$loop->last ? 'page-break' : '' }}">
                    <thead>
                        <tr>
                            <th>DATE</th>
                            <th>CBPV</th>
                            <th>DETAILS</th>
                            <th>Cheque No</th>
                            <th>CASH</th>
                            <th>BANK</th>
                            @foreach ($category as $cat)
                                <th>{{ strtoupper($cat->name) }}</th>
                            @endforeach
                            <th>SIGN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $categoryAmounts = [];
                            $balanceCarriedForward = [];
                            // $totalPayments = [];
                            foreach ($category as $cat) {
                                $categoryAmounts[$cat->id] = 0;
                                $balanceCarriedForward[$cat->id] = 0;
                                //    $totalPayments[$cat->id] = 0;
                            }

                        @endphp

                        @foreach ($receipts as $receipt)
                            @php

                                if (isset($categoryAmounts[$receipt->category_id])) {
                                    $categoryAmounts[$receipt->category_id] += $receipt->amount;
                                }
                            @endphp
                        @endforeach

                        @php
                            // Initialize totals and processed receipt IDs
                            $categoryTotals = [];
                            $balanceCarriedForward = [];
                            $totalReceipts = [];
                            $processedReceipts = []; // To track processed receipt IDs
                            $total_bank_amount = 0;

                            foreach ($category as $cat) {
                                $categoryTotals[$cat->id] = 0;
                                $balanceCarriedForward[$cat->id] = 0;
                                $totalReceipts[$cat->id] = 0;
                            }

                            $data_member_group_by_with_cheque_number = $new_member
                                ->sortByDesc('cheq_no') // Sort in descending order
                                ->groupBy('cheq_no')
                                ->toArray();

                            // dd($data_member_group_by_with_cheque_number, $payment_members->toArray(), $payments->toArray());

                        @endphp



                        @if ($start > 0)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($chq_date)->format('d/m/Y') }}</td>
                                <td></td>
                                <td>Bought Forward</td>
                                <td></td>
                                <td>0</td>
                                <td>{{ $total_bank_balnace_forword }}</td>
                                @foreach ($category as $cat)
                                    <td>
                                        {{-- @php
                                        $total_previous_balance1[$cat->id] = $total_previous_balance[$cat->id];
                                        $total_previous_reciepts[$cat->id] = $total_previous_balance1[$cat->id];
                                    @endphp --}}
                                        {{ $total_previous_balance[$cat->id] }}
                                    </td>
                                @endforeach

                                <td></td>
                            </tr>
                        @endif




                        @foreach ($payments as $key => $payment)
                            @if (isset($data_member_group_by_with_cheque_number[$key]))
                                @php
                                    $groupedData = collect($data_member_group_by_with_cheque_number[$key])->groupBy(
                                        'cheque_payments_id',
                                    );
                                    // dd(count($groupedData));
                                    $new_count = 0;
                                    $bank_amount = 0;

                                    foreach ($groupedData as $vr_key => $get_data) {
                                        $vr = \App\Models\ChequePayment::with('reciepts')
                                            ->where('id', $vr_key)
                                            ->first();

                                        foreach ($get_data as $get_member) {
                                            // dd($get_member);
                                            //  echo $get_member['cheque_payment']['category_id'].'<br>';
                                            foreach ($category as $cat) {
                                                if (
                                                    isset($get_member['cheque_payment']) &&
                                                    $get_member['cheque_payment']['category_id'] == $cat->id
                                                ) {
                                                    $bank_amount += $get_member['amount'];
                                                }
                                            }
                                        }

                                        if (isset($get_data)) {
                                            $new_count += count($get_data) + 1;
                                        }
                                    }

                                    $new_count_cvr = 0;
                                @endphp
                                <tr style="border-top: 0; border-top: 1px solid #000">
                                    <td rowspan="{{ $new_count + 1 }}"
                                        style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                        {{ \Carbon\Carbon::parse($payment->first()->cheq_date)->format('d/m/Y') }}
                                    </td>
                                    <td
                                        style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 0px !important; margin: 0px 0px !important;">
                                        {{ $chequeSerialNumbers[$key] ?? '' }}
                                    </td>
                                    <td
                                        style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                                    </td>
                                    <td
                                        style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                        0
                                    </td>
                                    <td
                                        style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                        {{ $bank_amount }}
                                    </td>
                                    @foreach ($category as $cat)
                                        <td
                                            style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                        </td>
                                    @endforeach
                                    <td
                                        style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                                    </td>
                                </tr>
                                @foreach ($groupedData as $new_key => $check_payment)
                                    @php
                                        $vr_no_print = \App\Models\ChequePayment::with('reciepts')
                                            ->where('id', $new_key)
                                            ->first();

                                    @endphp
                                    <tr>

                                        <td rowspan="{{ count($check_payment) + 1 }}"
                                            style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0;   border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                            {{-- {{ $vr_no_print->vr_no }} --}}
                                            {{-- {{ $chequeSerialNumbers[$key] ?? '' }} --}}
                                        </td>
                                        <td
                                            style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                            {{ $new_count_cvr == 0 ? 'CHQ PMT, CHQ NO.-' . $key . ', ' . (isset($vr_no_print->cheq_date) ? \Carbon\Carbon::parse($vr_no_print->cheq_date)->format('d-m-Y') : '') : '' }}
                                        </td>
                                        <td
                                            style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                                        </td>
                                        <td
                                            style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                        </td>
                                        <td
                                            style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                        </td>
                                        @foreach ($category as $cat)
                                            <td
                                                style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                            </td>
                                        @endforeach
                                        <td
                                            style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                                        </td>
                                    </tr>
                                    @php
                                        $new_count_member = 0;
                                    @endphp
                                    @if (isset($check_payment))
                                        @foreach ($check_payment as $count => $member)
                                            <tr>
                                                <td
                                                    style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                                    ({{ $count + 1 }})
                                                    {{ $member['member']['name'] ?? '' }},
                                                    {{ $member['member']['desigs']['designation'] ?? '' }} (CBRE -
                                                    {{ $vr_no_print->vr_no ?? '' }},
                                                    {{ isset($vr_no_print->vr_date) && $vr_no_print->vr_date ? \Carbon\Carbon::parse($vr_no_print->vr_date)->format('d/m/Y') : '' }})
                                                </td>
                                                <td
                                                    style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                                    {{ $new_count_cvr == 0 && $count == 0 ? $key ?? '-' : '' }}
                                                </td>
                                                <td
                                                    style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                                </td>
                                                <td
                                                    style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                                </td>
                                                @foreach ($category as $cat)
                                                    <td
                                                        style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                                        @if (isset($member['reciepts']) && $member['reciepts']['category_id'] == $cat->id)
                                                            {{ $member['amount'] ? $member['amount'] : 0 }}
                                                            @php
                                                                $categoryTotals[$cat->id] += $member['amount'];
                                                                // Skip if this receipt has already been processed
                                                                if (
                                                                    !in_array(
                                                                        $vr_no_print['reciepts']['id'],
                                                                        $processedReceipts,
                                                                    )
                                                                ) {
                                                                    $totalReceipts[$cat->id] +=
                                                                        $vr_no_print['reciepts']['amount'];
                                                                    $processedReceipts[] =
                                                                        $vr_no_print['reciepts']['id']; // Mark as processed
                                                                }

                                                            @endphp
                                                        @endif
                                                    </td>
                                                @endforeach
                                                <td
                                                    style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                                                </td>
                                            </tr>
                                            {{ $new_count_member++ }}

                                            {{-- @dd($data_member_group_by_with_cheque_number[$key], $payments->toArray(), $member['cheque_payment']) --}}
                                        @endforeach
                                    @endif
                                    {{ $new_count_cvr++ }}
                                @endforeach
                            @endif
                        @endforeach


                        @php
                            $total_bank_payments = 0;
                            $total_bank_payments_reciepts = 0;
                            $total_bank_balnace_forword = 0;
                            foreach ($category as $cat) {
                                $total_bank_payments += $categoryTotals[$cat->id];
                                if ($start > 0) {
                                    $total_bank_payments_reciepts += $total_previous_balance[$cat->id];
                                    $total_bank_balnace_forword +=
                                        $total_previous_balance[$cat->id] - $categoryTotals[$cat->id];
                                } else {
                                    $total_bank_payments_reciepts +=
                                        $categoryAmounts[$cat->id] +
                                        Helper::get_openings_balance($cat->id, $pre_vr_date);
                                    $total_bank_balnace_forword +=
                                        $categoryAmounts[$cat->id] +
                                        Helper::get_openings_balance($cat->id, $pre_vr_date) -
                                        $categoryTotals[$cat->id];
                                }
                            }

                        @endphp

                        <tr>
                            <td colspan="4">Total Payments</td>
                            <td>0</td>
                            <td>{{ $total_bank_payments }}</td>
                            @foreach ($category as $cat)
                                <td>{{ $categoryTotals[$cat->id] }}</td>
                            @endforeach
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4">Total Receipts</td>
                            <td>0</td>
                            <td>{{ $total_bank_payments_reciepts }}</td>
                            @foreach ($category as $cat)
                                {{-- <td>{{ $totalReceipts[$cat->id] }}</td> --}}
                                <td>
                                    @if ($start > 0)
                                        @php
                                            $total_previous_balance1[$cat->id] = $total_previous_balance[$cat->id];
                                            $total_previous_reciepts[$cat->id] = $total_previous_balance1[$cat->id];
                                        @endphp
                                        {{ $total_previous_reciepts[$cat->id] }}
                                    @else
                                        @php
                                            $total_previous_reciepts[$cat->id] =
                                                $categoryAmounts[$cat->id] +
                                                Helper::get_openings_balance($cat->id, $pre_vr_date);
                                        @endphp
                                        {{ $total_previous_reciepts[$cat->id] }}
                                    @endif

                                </td>
                            @endforeach
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4">Balance Carried Forward</td>
                            <td>0</td>
                            <td>{{ $total_bank_balnace_forword }}</td>
                            @foreach ($category as $cat)
                                <td>
                                    @if ($start > 0)
                                        @php
                                            $total_previous_balance[$cat->id] =
                                                $total_previous_balance[$cat->id] - $categoryTotals[$cat->id];
                                        @endphp
                                        {{ $total_previous_balance[$cat->id] }}
                                    @else
                                        @php
                                            $total_previous_balance[$cat->id] =
                                                $categoryAmounts[$cat->id] +
                                                Helper::get_openings_balance($cat->id, $pre_vr_date) -
                                                $categoryTotals[$cat->id];
                                        @endphp
                                        {{ $total_previous_balance[$cat->id] }}
                                    @endif

                                </td>
                            @endforeach
                            <td></td>
                        </tr>


                    </tbody>

                </table>
                @php
                    $start++;
                @endphp
            @endforeach
        @else
            <table>
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>CBPV</th>
                        <th>DETAILS</th>
                        <th>Cheque No</th>
                        <th>CASH</th>
                        <th>BANK</th>
                        @foreach ($category as $cat)
                            <th>{{ strtoupper($cat->name) }}</th>
                        @endforeach
                        <th>SIGN</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                        $categoryAmounts = [];
                        $balanceCarriedForward = [];
                        // $totalPayments = [];
                        foreach ($category as $cat) {
                            $categoryAmounts[$cat->id] = 0;
                            $balanceCarriedForward[$cat->id] = 0;
                            //    $totalPayments[$cat->id] = 0;
                        }

                    @endphp

                    @foreach ($receipts as $receipt)
                        @php

                            if (isset($categoryAmounts[$receipt->category_id])) {
                                $categoryAmounts[$receipt->category_id] += $receipt->amount;
                            }
                        @endphp
                    @endforeach

                    @php
                        // Initialize totals and processed receipt IDs
                        $categoryTotals = [];
                        $balanceCarriedForward = [];
                        $totalReceipts = [];
                        $processedReceipts = []; // To track processed receipt IDs

                        foreach ($category as $cat) {
                            $categoryTotals[$cat->id] = 0;
                            $balanceCarriedForward[$cat->id] = 0;
                            $totalReceipts[$cat->id] = 0;
                        }

                    @endphp




                    @foreach ($payments as $key => $payment)
                        @php
                            $new_count = 0;
                            foreach ($payment as $vr_no_print) {
                                if (
                                    isset($vr_no_print->chequePaymentMembers) &&
                                    $vr_no_print->chequePaymentMembers->count() > 0
                                ) {
                                    $new_count += $vr_no_print->chequePaymentMembers->count() + 1;
                                }
                            }
                            $new_count_cvr = 0;
                        @endphp
                        <tr style="border-top: 0; border-top: 1px solid #000">
                            <td rowspan="{{ $new_count + 1 }}"
                                style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                {{ \Carbon\Carbon::parse($payment->first()->cheq_date)->format('d/m/Y') }}
                            </td>
                            <td
                                style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                {{ $chequeSerialNumbers[$key] ?? '' }}
                            </td>
                            <td
                                style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                            </td>
                            <td
                                style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                            </td>
                            @foreach ($category as $cat)
                                <td
                                    style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                </td>
                            @endforeach
                            <td
                                style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                            </td>
                        </tr>

                        @foreach ($payment as $new_key => $vr_no_print)
                            <tr>

                                <td rowspan="{{ $vr_no_print->chequePaymentMembers->count() + 1 }}"
                                    style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0;   border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                    {{-- {{ $vr_no_print->vr_no }} --}}
                                    {{ $vr_no_print->cheq_no_serial }}
                                </td>
                                <td
                                    style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; ">
                                    {{-- {{ $new_count_cvr == 0 ? 'Cheque No.-' . $key ?? '-' : '' }} --}}
                                    {{ $new_count_cvr == 0 ? 'CHQ PMT, CHQ NO.-' . $key . ', ' . (isset($vr_no_print->cheq_date) ? \Carbon\Carbon::parse($vr_no_print->cheq_date)->format('d-m-Y') : '') : '' }}
                                </td>
                                <td
                                    style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                                </td>
                                @foreach ($category as $cat)
                                    <td
                                        style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                    </td>
                                @endforeach
                                <td
                                    style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                                </td>
                            </tr>
                            @php
                                $new_count_member = 0;
                            @endphp
                            @if (isset($vr_no_print->chequePaymentMembers) && $vr_no_print->chequePaymentMembers->count() > 0)
                                @foreach ($vr_no_print->chequePaymentMembers as $count => $member)
                                    <tr>
                                        <td
                                            style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                            ({{ $count + 1 }})
                                            {{ $member['member']['name'] ?? '' }},
                                            {{ $member['member']['desigs']['designation'] ?? '' }} (CBRE -
                                            {{ $vr_no_print->vr_no ?? '' }},
                                            {{ isset($vr_no_print->vr_date) && $vr_no_print->vr_date ? \Carbon\Carbon::parse($vr_no_print->vr_date)->format('d/m/Y') : '' }})
                                        </td>
                                        <td
                                            style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                            {{ $new_key == 0 && $count == 0 ? $key ?? '-' : '' }}
                                        </td>
                                        @foreach ($category as $cat)
                                            <td
                                                style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                                @if (isset($member->reciepts) && $member->reciepts->category_id == $cat->id)
                                                    {{ $member->amount ? $member->amount : 0 }}
                                                    @php

                                                        $categoryTotals[$cat->id] += $member->amount;
                                                        // Skip if this receipt has already been processed
                                                        if (!in_array($vr_no_print->reciepts->id, $processedReceipts)) {
                                                            $totalReceipts[$cat->id] += $vr_no_print->reciepts->amount;
                                                            $processedReceipts[] = $vr_no_print->reciepts->id; // Mark as processed
                                                        }
                                                    @endphp
                                                @endif
                                            </td>
                                        @endforeach
                                        <td
                                            style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                                        </td>
                                    </tr>


                                    {{ $new_count_member++ }}
                                @endforeach
                            @endif
                            {{ $new_count_cvr++ }}
                        @endforeach
                    @endforeach

                    <tr>
                        <td height="700px"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>

                        </td>
                        @foreach ($category as $cat)
                            <td>

                            </td>
                        @endforeach

                        <td></td>
                    </tr>

                    @php
                        $total_bank_payments = 0;
                        $total_bank_payments_reciepts = 0;
                        $total_bank_balnace_forword = 0;
                        foreach ($category as $cat) {
                            $total_bank_payments += $categoryTotals[$cat->id];
                            $total_bank_payments_reciepts +=
                                $categoryAmounts[$cat->id] + Helper::get_openings_balance($cat->id, $pre_vr_date);
                            $total_bank_balnace_forword +=
                                $categoryAmounts[$cat->id] +
                                Helper::get_openings_balance($cat->id, $pre_vr_date) -
                                $categoryTotals[$cat->id];
                        }

                    @endphp

                    <tr>
                        <td colspan="4">Total Payments</td>
                        <td>{{ $total_bank_payments }}</td>
                        <td></td>
                        @foreach ($category as $cat)
                            <td>{{ $categoryTotals[$cat->id] }}</td>
                        @endforeach
                        <td></td>
                    </tr>



                    <tr>
                        <td colspan="4">Total Receipts</td>
                        <td>{{ $total_bank_payments_reciepts }}</td>
                        <td></td>
                        @foreach ($category as $cat)
                            {{-- <td>{{ $totalReceipts[$cat->id] }}</td> --}}
                            <td>
                                {{ $categoryAmounts[$cat->id] + Helper::get_openings_balance($cat->id, $pre_vr_date) }}
                            </td>
                        @endforeach
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4">Balance Carried Forward</td>
                        <td>{{ $total_bank_balnace_forword }}</td>
                        <td></td>
                        @foreach ($category as $cat)
                            {{-- <td>
                    @php
                        $balanceCarriedForward[$cat->id] = $totalReceipts[$cat->id] - $categoryTotals[$cat->id];
                    @endphp
                    {{ $balanceCarriedForward[$cat->id] }}
                </td> --}}
                            <td>
                                {{ $categoryAmounts[$cat->id] + Helper::get_openings_balance($cat->id, $pre_vr_date) - $categoryTotals[$cat->id] }}
                            </td>
                        @endforeach
                        <td></td>
                    </tr>
                </tbody>

            </table>
        @endif







    </body>

</html>
