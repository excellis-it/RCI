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
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>

    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
        style="border-radius: 0px; margin: 0 auto; text-align: center">
        <tbody>
            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td
                                    style="
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
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td
                                    style="
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
                <td style="height: 20px;"></td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th>DATE</th>
                <th>Vr No</th>
                <th>DETAILS</th>
                <th>CASH</th>
                <th>BANK</th>
                <th>CGOs</th>
                <th>NGOs</th>
                <th>TA/DA</th>
                <th>GPF</th>
                <th>MEDICAL</th>
                <th>MISC</th>
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
                    <td>{{ $receipt->narration }}</td>
                    <td>{{ $receipt->category_id == 1 ? $receipt->amount : '' }}</td> <!-- CASH -->
                    <td>{{ $receipt->category_id == 2 ? $receipt->amount : '' }}</td> <!-- BANK -->
                    <td>{{ $receipt->category_id == 3 ? $receipt->amount : '' }}</td> <!-- CGOs -->
                    <td>{{ $receipt->category_id == 4 ? $receipt->amount : '' }}</td> <!-- NGOs -->
                    <td>{{ $receipt->category_id == 5 ? $receipt->amount : '' }}</td> <!-- TA/DA -->
                    <td>{{ $receipt->category_id == 6 ? $receipt->amount : '' }}</td> <!-- GPF -->
                    <td>{{ $receipt->category_id == 7 ? $receipt->amount : '' }}</td> <!-- Medical -->
                    <td>{{ $receipt->category_id == 8 ? $receipt->amount : '' }}</td> <!-- Misc -->
                    <td>{{ $receipt->member_name }}</td>
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
