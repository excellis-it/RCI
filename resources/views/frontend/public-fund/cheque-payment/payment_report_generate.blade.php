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
    @php
        $total_previous_reciepts = [];
        $total_previous_balance = [];
        
        foreach ($category as $cat) {
            $total_previous_reciepts[$cat->id] = 0;
            $total_previous_balance[$cat->id] = 0;
        }
    @endphp
    @foreach ($payment_members as $new_member)
        @include('frontend.public-fund.cheque-payment.payment_report_pdf_table', $new_member)
    @endforeach


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
