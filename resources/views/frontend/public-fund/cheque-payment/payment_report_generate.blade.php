<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Report</title>
    <style>
        @page {
            margin: 5px !important;
            padding: 5px !important;
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
    @endphp
    <center>
        <img src="{{ public_path('storage/' . $logo->logo) }}" style="max-width: 50px;">
    </center>
    <br>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
        style="border-radius: 0px; margin: 0 auto; text-align: center; border-color: inherit;">
        <tbody>
            <tr style="border-color: inherit;">
                <td style="padding: 0 0px; border-color: inherit;border:none;">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td
                                    style="
                                    border:none;
                      font-size: 14px;
                      line-height: 20px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    Payments FOR {{ \Carbon\Carbon::parse($chq_date)->format('d/m/Y') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding: 0 0px; border:none;">
                    <table style="border:none;" width="100%" border="0" cellpadding="0" cellspacing="0"
                        align="center">
                        <tbody>
                            <tr style="border:none;">
                                <td
                                    style="
                                    border:none;
                      font-size: 20px;
                      line-height: 18px;a
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    CHESS, Hyderabad<br>
                                    <span
                                        style="font-size: 20px;
                  line-height: 20px;
                  font-weight: 400;">PUBLIC
                                        FUND A/c No - {{ $settings->public_bank_ac ?? '' }} CASH BOOK</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="height: 20px;border:none;"></td>
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
                        <th>CBRV</th>
                        <th>DETAILS</th>
                        <th>Cheque No</th>
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

                        $data_member_group_by_with_cheque_number = $new_member
                            ->sortByDesc('cheq_no') // Sort in descending order
                            ->groupBy('cheq_no')
                            ->toArray();

                        // dd($data_member_group_by_with_cheque_number, $payment_members->toArray(), $payments->toArray());

                    @endphp


                    @foreach ($payments as $key => $payment)
                        @if (isset($data_member_group_by_with_cheque_number[$key]))
                            @php
                                $groupedData = collect($data_member_group_by_with_cheque_number[$key])->groupBy(
                                    'cheque_payments_id',
                                );
                                // dd(count($groupedData));
                                $new_count = 0;
                                foreach ($groupedData as $get_data) {
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
                            @foreach ($groupedData as $new_key => $check_payment)
                                @php
                                    $vr_no_print = \App\Models\ChequePayment::with('reciepts')
                                        ->where('id', $new_key)
                                        ->first();

                                @endphp
                                <tr>

                                    <td rowspan="{{ count($check_payment) + 1 }}"
                                        style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0;   border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                        {{ $vr_no_print->vr_no }}
                                    </td>
                                    <td
                                        style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; ">
                                        {{ $new_count_cvr == 0 ? 'Cheque No.-' . $key ?? '-' : '' }}
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
                                                ({{ $member['member']['pers_no'] ?? '' }}.
                                                {{ $member['member']['name'] ?? '' }})
                                            </td>
                                            <td
                                                style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                                {{ $new_count_cvr == 0 && $count == 0 ? $key ?? '-' : '' }}
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
                                                                $processedReceipts[] = $vr_no_print['reciepts']['id']; // Mark as processed
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

                    <tr>
                        <td colspan="4">Total Payments</td>
                        @foreach ($category as $cat)
                            <td>{{ $categoryTotals[$cat->id] }}</td>
                        @endforeach
                        <td></td>
                    </tr>

                    <tr>
                        <td colspan="4">Balance Carried Forward</td>
                        @foreach ($category as $cat)
                            <td>
                                @if ($start > 0)
                                    @php
                                    $total_previous_balance1[$cat->id] = $total_previous_balance[$cat->id];
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

                    <tr>
                        <td colspan="4">Total Receipts</td>
                        @foreach ($category as $cat)
                            {{-- <td>{{ $totalReceipts[$cat->id] }}</td> --}}
                            <td>
                                @if ($start > 0)
                                    @php
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
                    <th>CBRV</th>
                    <th>DETAILS</th>
                    <th>Cheque No</th>
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
                                {{ $vr_no_print->vr_no }}
                            </td>
                            <td
                                style="font-size: 20px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; ">
                                {{ $new_count_cvr == 0 ? 'Cheque No.-' . $key ?? '-' : '' }}
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
                                        ({{ $member->member->pers_no ?? '' }}. {{ $member->member->name ?? '' }})
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
                    <td colspan="4">Total Payments</td>
                    @foreach ($category as $cat)
                        <td>{{ $categoryTotals[$cat->id] }}</td>
                    @endforeach
                    <td></td>
                </tr>

                <tr>
                    <td colspan="4">Balance Carried Forward</td>
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

                <tr>
                    <td colspan="4">Total Receipts</td>
                    @foreach ($category as $cat)
                        {{-- <td>{{ $totalReceipts[$cat->id] }}</td> --}}
                        <td>
                            {{ $categoryAmounts[$cat->id] + Helper::get_openings_balance($cat->id, $pre_vr_date) }}
                        </td>
                    @endforeach
                    <td></td>
                </tr>
            </tbody>

        </table>
    @endif







</body>

</html>
