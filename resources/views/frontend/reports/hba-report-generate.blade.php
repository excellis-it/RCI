<!DOCTYPE html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />
<style>
    @page {
        size: 29.7cm 42cm
    }
    .page-break {
       page-break-before: always;
   }
</style>

<body style="background: #fff">

    @foreach($chunkedMembers as $chunkIndex => $members)

    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
        style="border-radius: 0px; margin: 0 auto">

        <tbody>
            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>

                            <tr>
                                <th style=" font-size: 16px;
                                line-height: 18px; width: 33.33%;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 0px 0px 10px 0px;
                                ">
                                    Category: {{ $category->category ?? '' }}

                                </th>
                                <th style=" font-size: 16px;
                                line-height: 18px; width: 33.33%;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                padding: 10px 0px 10px 0px;
                                ">

                                    Center for High Energy Systems & Sciences, Hyderabad <br>
                                    HBA (Principal) Schedule For the Month of {{ $month_name ?? '' }}-{{ $year ?? '' }}
                                </th>
                                <th style=" font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000; width: 33.33%;
                                text-align: right;
                                padding: 0px 0px 10px 0px;
                                ">

                                    15/07/2024 4:27:31 PM <br>
                                    Unit Code - 330000110
                                </th>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>



            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="start">
                        <tbody>
                            <tr style=" ">
                                <th
                                    style="text-align: left;  border: 1px solid black; border-left: 0px; border-right: 0;">
                                    SL.No </th>
                                <th
                                    style="text-align: left;  border: 1px solid black;  border-left: 0px; border-right: 0;">
                                    Emp <br> No </th>
                                <th
                                    style="text-align: left;  border: 1px solid black;  border-left: 0px; border-right: 0;">
                                    Name</th>
                                <th
                                    style="  border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;">
                                    Desig</th>
                                <th
                                    style="  border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;">
                                    NPS A/c No
                                </th>
                                <th
                                    style="  border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;">
                                    Loan Adv
                                </th>
                                <th
                                    style="  text-align: right; border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;">
                                    Loan Rec</th>
                                <th
                                    style="  text-align: right; border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;">
                                    Total Rec</th>
                                <th
                                    style="  text-align: right; border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;">
                                    Loan Bal</th>
                                <th
                                    style="  text-align: right; border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;">
                                    Inst</th>

                            </tr>

                            @foreach($members as $member)
                            <tr>
                                <td
                                    style="  border-left: 0px; border-bottom: 0px; border-bottom: 0px; padding: 0px 5px 0px 5px; border-right: 0; text-align: left;">
                                    {{  $loop->iteration }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px;  border-right: 0; ">
                                    {{ $member->emp_id ?? 'N/A' }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: center;">
                                    {{ $member->name ?? 'N/A' }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: center;">
                                    {{ $member->desigs->designation ?? 'N/A' }} {{ $member->groups->value ?? 'N/A' }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: center;">

                                    0
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; text-align: center; border-left: 0px; border-right: 0; ">
                                    0
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: right;">
                                    0
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: center;">
                                    0
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; text-align: center; border-left: 0px; border-right: 0; ">
                                    0
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: right;">
                                   0
                                </td>

                            </tr>
                            @endforeach
                            {{-- <tr>
                                <td
                                    style="  border-left: 0px; border-bottom: 0px; border-bottom: 0px; padding: 0px 5px 0px 5px; border-right: 0; text-align: left;">
                                    2
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px;  border-right: 0; ">
                                    0367
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: center;">

                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: center;">

                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: center;">

                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; text-align: center; border-left: 0px; border-right: 0; ">
                                    1526600
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: right;">
                                    8980
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: center;">
                                    215520
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; text-align: center; border-left: 0px; border-right: 0; ">
                                    1311080
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: right;">
                                    24/170
                                </td>

                            </tr> --}}


                            <tr>
                                <td colspan="5"
                                    style=" border: 1px solid black; padding: 0px 5px 0px 5px; border-left: 0px; border-bottom: 0;  border-right: 0; font-weight: 600;">
                                    Page 1 Total
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-right: 0; border-bottom: 0; border-left: 0px;">

                                </td>

                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-right: 0; border-bottom: 0; border-left: 0px; font-weight: 600;">
                                    22869
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-right: 0; border-bottom: 0; border-left: 0px;">

                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-right: 0; border-bottom: 0; border-left: 0px;">

                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-right: 0; border-bottom: 0; border-left: 0px;">

                                </td>


                            </tr>
                            <tr>
                                <td colspan="5"
                                    style=" border: 1px solid black; padding: 0px 5px 0px 5px; border-left: 0px;  border-right: 0; font-weight: 600;">
                                    Grand Total
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-right: 0; border-left: 0px;">

                                </td>

                                <td
                                    style="text-align: right; font-weight: 600; border-right: 0; border: 1px solid black; border-right: 0; border-left: 0px;">
                                    22869
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-right: 0; border-left: 0px;">

                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-right: 0; border-left: 0px;">

                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-right: 0; border-left: 0px;">

                                </td>


                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>


            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding-top: 20px;">
                        <tbody>
                            <tr>
                                <td style="font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;">
                                </td>
                                <td style="font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000;
                                text-align: right; padding-left: 10px;">({{ $accountant ?? 'N/A' }} )<br> Accounts Officer
                                    <br> For Director, CHESS <br>Vignyanakancha, Hyd-69
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>


        </tbody>

    </table>

    @if (!$loop->last)
    <div class="page-break"></div>
    @endif
    @endforeach


</body>

</html>