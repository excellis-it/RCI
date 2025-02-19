<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipts</title>
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
                                    RECEIPTS FOR {{ \Carbon\Carbon::parse($vr_date)->format('d/m/Y') }}
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
                                    {{-- <span
                                        style="font-size: 10px;
                  line-height: 14px;
                  font-weight: 400;">PUBLIC
                                        FUND A/c No - 32924542255 CASH BOOK</span> --}}
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
                <th>VR No.</th>
                <th>DETAILS</th>
                <th>CASH</th>
                <th>BANK</th>
                <th>CGOs</th>
                <th>NGOs</th>
                <th>TA/DA</th>
                <th>GPF</th>
                <th>MEDICAL</th>
                <th>MISC</th>
                <th>TOTAL</th>
                <th>SIGN</th>
            </tr>
        </thead>
        <tbody>
            @php
                // Initialize variables for each category amount
                $cashAmount = 0;
                $bankAmount = 0;
                $cgosAmount = 0;
                $ngosAmount = 0;
                $taDaAmount = 0;
                $gpfAmount = 0;
                $medicalAmount = 0;
                $miscAmount = 0;
            @endphp

            @foreach ($receipts as $receipt)
                @php
                    // Sum up amounts based on category_id
                    if ($receipt->category_id == 1) {
                        $cashAmount += $receipt->amount;
                    } elseif ($receipt->category_id == 2) {
                        $bankAmount += $receipt->amount;
                    } elseif ($receipt->category_id == 3) {
                        $cgosAmount += $receipt->amount;
                    } elseif ($receipt->category_id == 4) {
                        $ngosAmount += $receipt->amount;
                    } elseif ($receipt->category_id == 5) {
                        $taDaAmount += $receipt->amount;
                    } elseif ($receipt->category_id == 6) {
                        $gpfAmount += $receipt->amount;
                    } elseif ($receipt->category_id == 7) {
                        $medicalAmount += $receipt->amount;
                    } elseif ($receipt->category_id == 8) {
                        $miscAmount += $receipt->amount;
                    }
                @endphp
                <tr>
                    <td>{{ \Carbon\Carbon::parse($receipt->vr_date)->format('d/m/Y') }}</td>
                    <td>{{ $receipt->vr_no }}</td>
                    <td><span>{{ $receipt->narration }} DV No.- {{ $receipt->dv_no }}</span><br>

                        @if (isset($receipt->receiptMembers) && $receipt->receiptMembers->count() > 0)
                            @foreach ($receipt->receiptMembers as $index => $member)
                                @php
                                    $memberCoreInfo = \App\Models\MemberCoreInfo::where('member_id', $member->member_id)
                                        ->orderBy('id', 'desc')
                                        ->first();
                                    $memberName = $members->firstWhere('id', $member->member_id)->name ?? 'N/A';
                                    $memberDesign =
                                        $members->firstWhere('id', $member->member_id)->desigs->designation ??
                                        'N/A';
                                    // $bankAccountNo = $memberCoreInfo ? $memberCoreInfo->bank_acc_no : 'N/A';
                                @endphp


                                <span>{{ $member->serial_no }}. {{ $memberName }} - {{ $memberDesign }}</span>
                                <br>
                                {{-- <td>{{ $memberName }}</td>
                                {{-- <td>{{ $memberDesign }}</td>
                            <td>{{ $bankAccountNo }}</td>
                            <td>{{ $member->amount }}</td>
                            <td>{{ $member->bill_ref }}</td>
                            <td>{{ $member->cheq_no }}</td>
                            <td>{{ $member->cheq_date }}</td> --}}
                            @endforeach
                        @endif
                    </td>

                    {{-- <td>
                        <span>{{ $receipt->narration }}</span>
                        @if (isset($receipt->receiptMembers) && $receipt->receiptMembers->count() > 0)
                            <ul>
                                @foreach ($receipt->receiptMembers as $member)
                                    <li>{{ $member->serial_no }}.
                                        {{ $members->firstWhere('id', $member->member_id)->name ?? 'N/A' }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </td> --}}

                    <td>{{ $receipt->category_id == 1 ? $receipt->amount : '' }}</td> <!-- CASH -->
                    <td>{{ $receipt->category_id == 2 ? $receipt->amount : '' }}</td> <!-- BANK -->
                    <td>{{ $receipt->category_id == 3 ? $receipt->amount : '' }}</td> <!-- CGOs -->
                    <td>{{ $receipt->category_id == 4 ? $receipt->amount : '' }}</td> <!-- NGOs -->
                    <td>{{ $receipt->category_id == 5 ? $receipt->amount : '' }}</td> <!-- TA/DA -->
                    <td>{{ $receipt->category_id == 6 ? $receipt->amount : '' }}</td> <!-- GPF -->
                    <td>{{ $receipt->category_id == 7 ? $receipt->amount : '' }}</td> <!-- Medical -->
                    <td>{{ $receipt->category_id == 8 ? $receipt->amount : '' }}</td> <!-- Misc -->
                    <td>{{ $receipt->amount }}</td> <!-- Total -->
                    <td></td>
                </tr>
            @endforeach
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
