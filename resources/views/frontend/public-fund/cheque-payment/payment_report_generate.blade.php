<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            font-size: 12px;
        }
    </style>
</head>

<body>

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
                      font-size: 10px;
                      line-height: 14px;
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
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    CHESS, Hyderabad<br>
                                    <span
                                        style="font-size: 10px;
                  line-height: 14px;
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
                foreach ($category as $cat) {
                    $categoryAmounts[$cat->id] = 0;
                }
            @endphp

            @foreach ($payments as $key => $payment)
                {{-- @php
                    if (isset($categoryAmounts[$receipt->category_id])) {
                        $categoryAmounts[$receipt->category_id] += $receipt->amount;
                    }
                @endphp --}}
                <tr>
                    <td>{{ \Carbon\Carbon::parse($payment->first()->created_at)->format('d/m/Y') }}</td>
                    <td>
                        @foreach ($payment as $vr_no_print)
                            {{ $vr_no_print->vr_no }}
                            <br>
                        @endforeach
                    </td>

                    <td>
                        {{-- <span>{{ $receipt->narration }} DV No.- {{ $receipt->dv_no }}</span><br> --}}
                        @foreach ($payment as $item)
                        @dd($item->reciepts)
                        @if (isset($item->reciepts) && $item->reciepts->count() > 0)
                            @foreach ($receipt->reciepts as $index => $reciept)
                                <span>
                                    @if (isset($reciept->member) && $reciept->member->count() > 0)
                                        @foreach ($reciept->member as $member)
                                            {{ $member->pers_no }}. {{ $member->name }} -
                                            {{ $member->desigs->designation ?? '-' }}
                                        @endforeach
                                    @endif
                                </span><br>
                            @endforeach
                        @endif
                        @endforeach
                    </td>
                    <td>{{ $key ?? '-' }}</td>
                    @foreach ($category as $cat)
                        <td>
                            {{-- {{ $receipt->category_id == $cat->id ? $receipt->amount : '' }} --}}
                        </td>
                    @endforeach
                    <td></td>
                </tr>
            @endforeach

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                @foreach ($category as $cat)
                    <td></td>
                @endforeach
                <td></td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Total Payments</td>
                @foreach ($category as $cat)
                    <td>{{ $categoryAmounts[$cat->id] }}</td>
                @endforeach
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Balance Carried Forward</td>
                @foreach ($category as $cat)
                    <td>{{ $balanceCarriedForward[$cat->id] ?? '' }}</td>
                @endforeach
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Total Receipts</td>
                @foreach ($category as $cat)
                    <td>{{ $totalReceipts[$cat->id] ?? '' }}</td>
                @endforeach
                <td></td>
            </tr>
        </tbody>
    </table>


    {{-- <h3>Summary</h3>
    <ul>
        <li>CASH Total: {{ $cashAmount }}</li>
        <li>BANK Total: {{ $bankAmount }}</li>
        <li>CGOs Total: {{ $cgosAmount }}</li>
        <li>NGOs Total: {{ $ngosAmount }}</li>
        <li>TA/DA Total: {{ $taDaAmount }}</li>
        <li>GPF Total: {{ $gpfAmount }}</li>
        <li>Medical Total: {{ $medicalAmount }}</li>
        <li>Misc Total: {{ $miscAmount }}</li>
    </ul> --}}

</body>

</html>
