<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipts</title>
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
            font-size: 18px;
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
                                    RECEIPTS FOR {{ \Carbon\Carbon::parse($vr_date)->format('d/m/Y') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>


        </tbody>
    </table>

    @if (count($receipt_members) > 0)
        @php
            $count_new_member = 0;
            $start = 0;
            $all_cheque_payment_member_id = [];
            $total_previous_balance = [];
            $total_previous_balance_carried_forward = [];
            foreach ($category as $cat) {
                $all_cheque_payment_member_id[$cat->id] = [];
                $total_previous_balance[$cat->id] = 0;
                $total_previous_balance_carried_forward[$cat->id] = 0;
            }
        @endphp
        @foreach ($receipt_members as $new_member)
            <table class="{{ !$loop->last ? 'page-break' : '' }}">
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>CBRV</th>
                        <th>DETAILS</th>
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
                        $totalPaymentsToday = [];
                        $total_opening_bank_balance = 0;
                        foreach ($category as $cat) {
                            $categoryAmounts[$cat->id] = 0;
                            $balanceCarriedForward[$cat->id] = 0;
                            //    $totalPayments[$cat->id] = 0;
                            $totalPaymentsToday[$cat->id] = 0;
                            if ($count_new_member > 0) {
                                // dd($total_opening_bank_balance , $total_previous_balance[$cat->id]);
                                $total_opening_bank_balance += $total_previous_balance[$cat->id];
                            } else {
                                $total_opening_bank_balance += Helper::get_openings_balance($cat->id, $pre_vr_date);
                            }
                        }

                        // dd($total_opening_bank_balance);
                        $new_count_cvr = 0;

                        $data_member_group_by_with_reciept_id = $new_member
                            ->sortByDesc('receipt_id') // Sort in descending order
                            ->groupBy('receipt_id')
                            ->toArray();

                    @endphp
                    @if ($count_new_member > 0)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($vr_date)->format('d/m/Y') }}</td>
                            <td></td>
                            <td>Brought Forward</td>
                            <td>0</td>
                            <td>{{ (number_format($total_opening_bank_balance)) }}</td>
                            @foreach ($category as $cat)
                                <td>
                                    {{ number_format($total_previous_balance[$cat->id]) }}
                                </td>
                            @endforeach
                            <td></td>

                        </tr>
                    @else
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($vr_date)->format('d/m/Y') }}</td>
                            <td></td>
                            <td>Opening Balance</td>
                            <td>0</td>
                            <td>{{ number_format($total_opening_bank_balance) }}</td>
                            @foreach ($category as $cat)
                                <td>
                                    {{ number_format(Helper::get_openings_balance($cat->id, $pre_vr_date)) }}
                                </td>
                            @endforeach
                            <td></td>

                        </tr>
                    @endif
                    @foreach ($receipts as $key => $receipt)
                        @if (isset($data_member_group_by_with_reciept_id[$receipt->id]))
                            {{-- @dd($receipt, $data_member_group_by_with_reciept_id[$receipt->id]) --}}
                            @php
                                if (isset($categoryAmounts[$receipt->category_id])) {
                                    foreach ($data_member_group_by_with_reciept_id[$receipt->id] as $value) {
                                        $categoryAmounts[$receipt->category_id] += $value['amount'];
                                        $matchingChequePayments = \App\Models\ChequePaymentMember::where(
                                            'receipt_id',
                                            $value['receipt_id'],
                                        )
                                            ->where('serial_no', $value['serial_no'])
                                            ->where('member_id', $value['member_id'])
                                            ->whereDate('cheq_date', $vr_date)
                                            ->whereHas('chequePayment', function ($query) use ($receipt) {
                                                $query->where('category_id', $receipt->category_id);
                                            });

                                        // Store the IDs
                                        $all_cheque_payment_member_id[$cat->id] = $matchingChequePayments
                                            ->pluck('amount')
                                            ->toArray();

                                        // Sum the amounts
                                        $totalPaymentsToday[$receipt->category_id] += $matchingChequePayments->sum(
                                            'amount',
                                        );
                                    }
                                }

                                // Group member amounts by category_id from the receipt
                                $categoryMemberAmounts = [];
                                $bank_amount = 0;
                                if (isset($data_member_group_by_with_reciept_id[$receipt->id])) {
                                    foreach ($data_member_group_by_with_reciept_id[$receipt->id] as $member) {
                                        $categoryId = $receipt->category_id;

                                        if (!isset($categoryMemberAmounts[$categoryId])) {
                                            $categoryMemberAmounts[$categoryId] = [];
                                        }

                                        // Add the member's amount to the corresponding category
        $categoryMemberAmounts[$categoryId][] = $member['amount'];
        $bank_amount += $member['amount'];
                                    }
                                }
                            @endphp

                            <tr style="">
                                <td rowspan="{{ isset($data_member_group_by_with_reciept_id[$receipt->id]) ? count($data_member_group_by_with_reciept_id[$receipt->id]) + 2 : 1 }}"
                                    style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                    {{ \Carbon\Carbon::parse($receipt->vr_date)->format('d/m/Y') }}
                                </td>
                                <td
                                    style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                                </td>
                                <td
                                    style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                                </td>
                                <td
                                    style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                                </td>
                                <td
                                    style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                                </td>

                                @foreach ($category as $cat)
                                    <td
                                        style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                    </td>
                                @endforeach
                                <td
                                    style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                                </td>
                            </tr>


                            <tr>
                                <td rowspan="{{ count($data_member_group_by_with_reciept_id[$receipt->id]) + 1 }}"
                                    style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0;   border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                    {{ $receipt->vr_no }}
                                </td>
                                <td
                                    style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; ">
                                    {{ $receipt->narration . ' DV No.-' . $receipt->dv_no ?? '-' }}
                                </td>
                                <td
                                    style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-bottom:0;">

                                    0
                                </td>
                                <td
                                    style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-bottom:0;">
                                    {{ $bank_amount }}
                                </td>
                                @foreach ($category as $cat)
                                    <td
                                        style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-bottom:0;">
                                    </td>
                                @endforeach
                                <td
                                    style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom:0;  text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                                </td>
                            </tr>
                            @php
                                $new_count_member = 0;
                            @endphp
                            @if (isset($data_member_group_by_with_reciept_id[$receipt->id]) &&
                                    count($data_member_group_by_with_reciept_id[$receipt->id]) > 0)
                                @foreach ($data_member_group_by_with_reciept_id[$receipt->id] as $index => $member)
                                    @php
                                        $memberName = $members->firstWhere('id', $member['member_id'])->name ?? 'N/A';
                                        $memberDesign =
                                            $members->firstWhere('id', $member['member_id'])->desigs->designation ??
                                            'N/A';
                                    @endphp
                                    <tr
                                        style="{{ $loop->last ? 'border-bottom: 1px solid #000;' : 'border-bottom: 0;' }}">
                                        <td
                                            style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                            {{ $member['serial_no'] }}. {{ $memberName }} - {{ $memberDesign }} (
                                            {{ $member['bill_ref'] ?? '' }})
                                        </td>
                                        <td
                                            style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                                        </td>
                                        <td
                                            style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                                        </td>

                                        @foreach ($category as $cat)
                                            <td
                                                style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                                @if ($receipt->category_id == $cat->id)
                                                    @if (isset($categoryMemberAmounts[$cat->id]))
                                                        {{ number_format($member['amount']) }}
                                                    @endif
                                                @endif
                                            </td>
                                        @endforeach

                                        <td
                                            style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            {{ $new_count_cvr++ }}
                        @endif
                    @endforeach
                    @if (count($new_member) <= 22)
                        @php
                            $pixel_table = 650 - 33.5 * count($new_member);
                        @endphp
                        <tr>
                            <td height="{{ $pixel_table }}px"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            @foreach ($category as $cat)
                                <td>

                                </td>
                            @endforeach
                            <td></td>

                        </tr>
                    @endif
                    @php
                        $total_bank_amount = 0;
                        $total_payment_bank = 0;
                        $balance_carried_forword = 0;
                        foreach ($category as $cat) {


                            if ($count_new_member > 0) {
                                $balance_carried_forword +=
                                    $categoryAmounts[$cat->id] +
                                    $total_previous_balance[$cat->id] -
                                    $totalPaymentsToday[$cat->id];
                                    $total_bank_amount +=  $categoryAmounts[$cat->id] + $total_previous_balance[$cat->id];
                            } else {
                                $balance_carried_forword +=
                                    $categoryAmounts[$cat->id] +
                                    Helper::get_openings_balance($cat->id, $pre_vr_date) -
                                    $totalPaymentsToday[$cat->id];

                                    $total_bank_amount +=
                                $categoryAmounts[$cat->id] + Helper::get_openings_balance($cat->id, $pre_vr_date);
                            $total_payment_bank += $totalPaymentsToday[$cat->id];
                            }
                        }
                    @endphp

                    <tr>
                        <td colspan="3">Total Receipts</td>
                        <td>0</td>
                        <td>
                            {{ number_format($total_bank_amount) }}
                        </td>
                        @foreach ($category as $cat)
                            <td>
                                @if ($count_new_member > 0)
                                    {{ number_format($categoryAmounts[$cat->id] + $total_previous_balance[$cat->id]) }}
                                    @php
                                        $total_previous_balance[$cat->id] =
                                        $categoryAmounts[$cat->id] + $total_previous_balance[$cat->id];
                                    @endphp
                                @else
                                    {{ number_format($categoryAmounts[$cat->id] + Helper::get_openings_balance($cat->id, $pre_vr_date)) }}
                                    @php
                                        $total_previous_balance[$cat->id] =
                                            $categoryAmounts[$cat->id] +
                                            Helper::get_openings_balance($cat->id, $pre_vr_date);
                                    @endphp
                                @endif
                            </td>
                        @endforeach
                        <td></td>
                    </tr>

                    {{-- <tr>
                        <td colspan="3">Total Payments</td>
                        <td>0</td>
                        <td>{{ $total_payment_bank }}</td>
                        @foreach ($category as $cat)
                            <td>
                                {{ $totalPaymentsToday[$cat->id] }}
                            </td>
                        @endforeach
                        <td></td>
                    </tr> --}}

                    {{-- <tr>
                        <td colspan="3">Balance Carried Forward</td>
                        <td>0</td>
                        <td>{{ $balance_carried_forword }}</td>
                        @foreach ($category as $cat)
                            <td>
                                @if ($count_new_member > 0)
                                    @php
                                        $total_previous_balance[$cat->id] =
                                            $categoryAmounts[$cat->id] +
                                            $total_previous_balance[$cat->id] -
                                            $totalPaymentsToday[$cat->id];
                                    @endphp
                                    {{ $total_previous_balance[$cat->id] }}
                                @else
                                    @php
                                        $total_previous_balance[$cat->id] =
                                            $categoryAmounts[$cat->id] +
                                            Helper::get_openings_balance($cat->id, $pre_vr_date) -
                                            $totalPaymentsToday[$cat->id];
                                    @endphp
                                    {{ $total_previous_balance[$cat->id] }}
                                @endif


                            </td>
                        @endforeach
                        <td></td>
                    </tr> --}}
                </tbody>
            </table>
            @php
                $count_new_member++;
            @endphp
        @endforeach

        {{-- {{ dd($all_cheque_payment_member_id) }} --}}
    @else
        <table>
            <thead>
                <tr>
                    <th>DATE</th>
                    <th>CBRV</th>
                    <th>DETAILS</th>
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
                    $total_opening_bank_amount = 0;
                    foreach ($category as $cat) {
                        $categoryAmounts[$cat->id] = 0;
                        $balanceCarriedForward[$cat->id] = 0;
                        $total_opening_bank_amount += Helper::get_openings_balance($cat->id, $pre_vr_date);
                    }
                @endphp

                <tr>
                    <td>{{ \Carbon\Carbon::parse($vr_date)->format('d/m/Y') }}</td>
                    <td></td>
                    <td>Opening Balance</td>
                    <td>0</td>
                    <td>{{ number_format($total_opening_bank_amount )}}</td>
                    @foreach ($category as $cat)
                        <td>
                            {{ number_format(Helper::get_openings_balance($cat->id, $pre_vr_date)) }}
                        </td>
                    @endforeach
                    <td></td>

                </tr>
                @php
                    $new_count_cvr = 0;
                @endphp

                @foreach ($receipts as $key => $receipt)
                    @php

                        if (isset($categoryAmounts[$receipt->category_id])) {
                            $categoryAmounts[$receipt->category_id] += $receipt->amount;
                        }

                        // Group member amounts by category_id from the receipt
                        $categoryMemberAmounts = [];

                        if (isset($receipt->receiptMembers)) {
                            foreach ($receipt->receiptMembers as $member) {
                                $categoryId = $receipt->category_id;

                                if (!isset($categoryMemberAmounts[$categoryId])) {
                                    $categoryMemberAmounts[$categoryId] = [];
                                }

                                // Add the member's amount to the corresponding category
                                $categoryMemberAmounts[$categoryId][] = $member->amount;
                            }
                        }

                    @endphp

                    <tr style="">
                        <td rowspan="{{ isset($receipt->receiptMembers) ? $receipt->receiptMembers->count() + 2 : 1 }}"
                            style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                            {{ \Carbon\Carbon::parse($receipt->vr_date)->format('d/m/Y') }}
                        </td>
                        <td
                            style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                        </td>
                        <td
                            style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                        </td>
                        <td
                            style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                        </td>
                        <td
                            style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                        </td>
                        @foreach ($category as $cat)
                            <td
                                style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                            </td>
                        @endforeach
                        <td
                            style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                        </td>
                    </tr>


                    <tr>
                        <td rowspan="{{ $receipt->receiptMembers->count() + 1 }}"
                            style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0;   border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                            {{ $receipt->vr_no }}
                        </td>
                        <td
                            style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; ">
                            {{ $receipt->narration . ' DV No.-' . $receipt->dv_no ?? '-' }}
                        </td>
                        <td
                            style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-bottom:0;">
                        </td>
                        <td
                            style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-bottom:0;">
                        </td>
                        @foreach ($category as $cat)
                            <td
                                style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-bottom:0;">
                            </td>
                        @endforeach
                        <td
                            style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom:0;  text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                        </td>
                    </tr>
                    @php
                        $new_count_member = 0;
                    @endphp
                    {{-- @dd($receipt->receiptMembers) --}}
                    @if (isset($receipt->receiptMembers) && $receipt->receiptMembers->count() > 0)
                        @foreach ($receipt->receiptMembers as $index => $member)
                            @php
                                $memberName = $members->firstWhere('id', $member->member_id)->name ?? 'N/A';
                                $memberDesign =
                                    $members->firstWhere('id', $member->member_id)->desigs->designation ?? 'N/A';
                            @endphp
                            <tr style="{{ $loop->last ? 'border-bottom: 1px solid #000;' : 'border-bottom: 0;' }}">
                                <td
                                    style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                    {{ $member->serial_no }}. {{ $memberName }} - {{ $memberDesign }}
                                </td>
                                <td
                                    style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                                </td>
                                <td
                                    style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                                </td>
                                @foreach ($category as $cat)
                                    <td
                                        style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                        @if ($receipt->category_id == $cat->id)
                                            @if (isset($categoryMemberAmounts[$cat->id]))
                                                {{ number_format($member->amount) }}
                                            @endif
                                        @endif
                                    </td>
                                @endforeach

                                <td
                                    style="font-size: 18px; line-height: 20px; font-weight: 400; color: #000; border-top: 0; border-bottom: 0; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">

                                </td>
                            </tr>
                        @endforeach
                    @endif
                    {{ $new_count_cvr++ }}
                @endforeach

                <tr>
                    <td height="700px"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @foreach ($category as $cat)
                        <td>

                        </td>
                    @endforeach
                    <td></td>

                </tr>

                {{-- <tr>
                <td></td>
                <td></td>
                <td></td>
                @foreach ($category as $cat)
                    <td>{{ $categoryAmounts[$cat->id] }}</td>
                @endforeach
                <td></td>
            </tr> --}}




                @php
                    $total_bank_amount = 0;
                    $total_payment_bank = 0;
                    $balance_carried_forword = 0;
                    foreach ($category as $cat) {
                        $total_bank_amount +=
                            $categoryAmounts[$cat->id] + Helper::get_openings_balance($cat->id, $pre_vr_date);
                        $total_payment_bank += Helper::total_payment_today($cat->id, $vr_date);

                        $balance_carried_forword +=
                            $categoryAmounts[$cat->id] +
                            Helper::get_openings_balance($cat->id, $pre_vr_date) -
                            Helper::total_payment_today($cat->id, $vr_date);
                    }
                @endphp

                <tr>
                    <td colspan="3">Total Receipts</td>
                    <td>0</td>
                    <td>{{ number_format($total_bank_amount) }} </td>
                    @foreach ($category as $cat)
                        <td>{{ number_format($categoryAmounts[$cat->id] + Helper::get_openings_balance($cat->id, $pre_vr_date)) }}
                        </td>
                    @endforeach
                    <td></td>
                </tr>

                {{-- <tr>
                    <td colspan="3">Total Payments</td>
                    <td>0</td>
                    <td>{{ $total_payment_bank }} </td>
                    @foreach ($category as $cat)
                        <td>
                            {{ Helper::total_payment_today($cat->id, $vr_date) }}

                        </td>
                    @endforeach
                    <td></td>
                </tr> --}}

                {{-- <tr>
                    <td colspan="3">Balance Carried Forward</td>
                    <td>0</td>
                    <td>{{ $balance_carried_forword }} </td>
                    @foreach ($category as $cat)
                        <td>
                            {{ $categoryAmounts[$cat->id] + Helper::get_openings_balance($cat->id, $pre_vr_date) - Helper::total_payment_today($cat->id, $vr_date) }}

                        </td>
                    @endforeach
                    <td></td>
                </tr> --}}


            </tbody>
        </table>
    @endif






</body>

</html>
