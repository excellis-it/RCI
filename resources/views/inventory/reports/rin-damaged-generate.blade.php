@foreach ($rins as $key => $rin)
    @if ($key > 0)
        <div style="page-break-before: always;"></div>
    @endif
    <!DOCTYPE html>
    <html lang="en">
        <title>RCI</title>
        <meta charset="utf-8" />
        <style>
            @page {
            margin: 25px;
            padding: 25px;
        }
        </style>

        <body style="background: #fff">
            <center>
                <img src="{{ public_path('storage/' . $logo->logo) }}" style="max-width: 50px;">
            </center>
            <br>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
                style="border-radius: 0px; margin: 0 auto">
                <tbody>
                    <tr>
                        <td style="padding: 0 0px">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                <tbody>
                                    <tr style=" padding: 0px 0px 10px 0px; text-align: right; font-weight: 600;">
                                        <td
                                            style=" font-size: 10px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000;
                                text-align: right;
                                padding: 0px 0px 10px 0px;
                                ">
                                            DRDO.SM.05
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            style=" font-size: 10px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                padding: 0px 0px 10px 0px;
                                ">

                                            CENTER FOR HIGH ENERGY SYSTEM & SCIENCES, Hyderabad<br />
                                            RECEIPT & INSPECTION NOTE (RIN)


                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                <tbody>
                                    <tr
                                        style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000;">
                                        <th colspan="2"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: left; font-size: 10px;">
                                            RIN
                                            NO: {{ $rin->rin_no ?? '' }}</th>
                                        <th colspan="2"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: left; font-size: 10px;">
                                            RIN
                                            Date: {{ optional($rin->created_at)->format('d-m-y') ?? '' }}</th>
                                        <th colspan="3"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: left; font-size: 10px;">
                                            SIR No:
                                            {{ $rin->sirNo->sir_no ?? 'N/A' }}</th>
                                        <th colspan="3"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: left; font-size: 10px;">
                                            SIR
                                            Date :
                                            {{ isset($rin->sirNo->sir_date) && $rin->sirNo->sir_date ? date('d-m-Y', strtotime($rin->sirNo->sir_date)) : 'N/A' }}
                                        </th>
                                        <th
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: left; font-size: 10px; border-right:1px solid #000;">
                                            Demand No.: {{ $rin->sirNo->demand_no ?? 'N/A' }}</th>
                                    </tr>
                                    <tr>
                                        <td rowspan="3"
                                            style="border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; font-weight: 600; border-right: 0; font-size: 10px;">
                                            Received From (Name & <br> address):<br>
                                            <span
                                                style="font-weight: 400; !important">{{ $rin->vendorDetail->name ?? 'N/A' }}
                                                &
                                                {{ $rin->vendorDetail->address ?? 'N/A' }}</span>

                                        </td>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; font-weight: 600; border-left: 0; border-bottom: 0; font-size: 10px;">


                                        </td>

                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;  font-size: 10px;">
                                            DC/PRC/Invoice No.: {{ $rin->sirNo->invoice_no ?? 'N/A' }}</td>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; font-weight: 600; font-size: 10px;">
                                            &nbsp;</td>
                                        <td colspan="5"
                                            style="border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-right: 0; font-size: 10px;">
                                            Group / Division:
                                            {{ $rin->sirNo->inventoryNumber->group->group_name ?? ($rin->sirNo->inventoryNumber->division ?? 'N/A') }}
                                        </td>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-left: 0; font-size: 10px;">
                                        </td>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; font-size: 10px;">
                                            Inventory No (ICC): {{ $rin->sirNo->inventoryNumber->number ?? 'N/A' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; font-weight: 600; border-top: 0; border-bottom: 0; border-left: 0; font-size: 10px;">
                                            &nbsp;</td>

                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;font-size: 10px;">
                                            DC/PRC/Invoice Date:
                                            {{ isset($rin->sirNo->invoice_date) && $rin->sirNo->invoice_date ? date('d-m-Y', strtotime($rin->sirNo->invoice_date)) : 'N/A' }}
                                        </td>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; font-weight: 600;font-size: 10px;">
                                            &nbsp;</td>
                                        <td colspan="5"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-right: 0;font-size: 10px;">
                                            SO/Contract/Authority No.:
                                            {{ $rin->sirNo?->supplyOrder?->order_number ?? 'N/A' }}<br>
                                            GeM Contract No.</td>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-left: 0;font-size: 10px;">
                                        </td>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;font-size: 10px;">
                                            SO/Contract/ <br> Authority Date:
                                            {{ isset($rin->sirNo?->supplyOrder?->created_at) && $rin->sirNo?->supplyOrder?->created_at ? date('d-m-Y', strtotime($rin->sirNo?->supplyOrder?->created_at)) : 'N/A' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; font-weight: 600; border-top: 0; border-left: 0;font-size: 10px;">
                                            &nbsp;</td>

                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;font-size: 10px;">
                                            Store Received Date:
                                            {{ isset($rin->sirNo->sir_date) && $rin->sirNo->sir_date ? date('d-m-Y', strtotime($rin->sirNo->sir_date)) : 'N/A' }}
                                        </td>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; font-weight: 600;font-size: 10px;">
                                            &nbsp;</td>
                                        <td colspan="5"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-right: 0;font-size: 10px;">
                                            Budget
                                            Head Details
                                        </td>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-left: 0;font-size: 10px;">
                                            &nbsp;</td>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;font-size: 10px;">
                                            Project No.:
                                            {{ $rin->sirNo->inventoryNumber->project->project_code ?? 'N/A' }}
                                        </td>
                                    </tr>
                                    <tr
                                        style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000;">
                                        <th rowspan="2"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: left;font-size: 10px;">
                                            SI.
                                            No.</th>
                                        <th rowspan="2"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: left;font-size: 10px;">
                                            Item
                                            Code</th>
                                        <th rowspan="2"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: left;font-size: 10px;">
                                            Nomenclatures/
                                            Description of Stores</th>
                                        <th rowspan="2"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: left;font-size: 10px;">
                                            Unit
                                            Cost</th>
                                        <th rowspan="2"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: left;font-size: 10px;">
                                            Total
                                            Cost</th>
                                        <th rowspan="2"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: center;font-size: 10px;">
                                            Item
                                            Type (C /NC/
                                            NCF)</th>
                                        <th rowspan="2"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: left;font-size: 10px;">
                                            A/U
                                        </th>
                                        <th colspan="3"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: center;font-size: 10px;">
                                            Quantity</th>
                                        <th rowspan="2"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: left;font-size: 10px;">
                                            Remarks Reasons
                                            for Rejection<br> (Separate sheet may be<br> attached if required)</th>
                                    </tr>

                                    <tr>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;font-size: 10px;">
                                            Received</td>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;font-size: 10px;">
                                            Accepted*</td>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;font-size: 10px;">
                                            Rejected*</td>
                                    </tr>
                                    @php
                                        $total_basic_cost = 0;
                                        $taxes_amount = 0;
                                        $total_amount = 0;
                                        $total_items = 0;
                                    @endphp
                                    @foreach ($rin->rinDamagedItems as $key => $item)
                                        @php
                                            $total_items = $key + 1;
                                        @endphp
                                        <tr>
                                            <td
                                                style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;font-size: 10px;">
                                                &nbsp;{{ $key + 1 ?? '' }}.</td>
                                            <td
                                                style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-right: 0;font-size: 10px;">
                                                {{ $item->itemCode->code ?? '' }}</td>
                                            <td
                                                style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-left: 0;font-size: 10px;">
                                                {{ $item->itemCode->item_name ?? '' }},
                                                {{ $item->itemCode->description ?? '' }}
                                            </td>
                                            <td
                                                style="text-align:right; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;font-size: 10px;">
                                                {{ formatIndianCurrency($item->unit_cost, 2) ?? '' }}</td>
                                            <td
                                                style="text-align:right; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;font-size: 10px;">
                                                {{ formatIndianCurrency($item->total_cost, 2) ?? '' }}</td>
                                            <td
                                                style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-right: 0;font-size: 10px;">
                                                {{ $item->itemCode->item_type ?? '' }}</td>
                                            <td
                                                style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-left: 0;font-size: 10px;">
                                                {{ $item->au_status ?? '' }}</td>
                                            <td
                                                style="text-align:right; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: center;font-size: 10px;">
                                                {{ $item->received_quantity ?? '' }}</td>
                                            <td
                                                style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: center;font-size: 10px;">
                                            </td>
                                            <td
                                                style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: center;font-size: 10px;">
                                            </td>
                                            <td
                                                style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: center;font-size: 10px;">
                                                {{ Str::of($item->remarks)->limit(20) ?? '' }}</td>
                                        </tr>
                                        @php
                                            $total_basic_cost += $item->total_cost;
                                            $taxes_amount += $item->gst_amount;
                                            $total_amount += $item->total_cost + $item->gst_amount;
                                        @endphp
                                    @endforeach
                                    {{-- <tr>
                                <td
                                    style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;font-size: 10px;">
                                    &nbsp;1.</td>
                                <td
                                    style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-right: 0;font-size: 10px;">
                                    {{ $rin->itemCode->code ?? '' }}</td>
                                <td
                                    style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-left: 0;font-size: 10px;">
                                    {{ $rin->itemCode->item_name ?? '' }}, {{ $rin->itemCode->description ?? '' }}</td>
                                <td
                                    style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;font-size: 10px;">
                                </td>
                                <td
                                    style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;font-size: 10px;">
                                </td>
                                <td
                                    style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-right: 0;font-size: 10px;">
                                    {{ $rin->itemCode->item_type ?? '' }}</td>
                                <td
                                    style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-left: 0;font-size: 10px;">
                                    {{ $rin->au_status ?? '' }}</td>
                                <td
                                    style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: center;font-size: 10px;">
                                    {{ $rin->received_quantity ?? '' }}</td>
                                <td
                                    style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: center;font-size: 10px;">
                                    {{ $rin->accepted_quantity ?? '' }}</td>
                                <td
                                    style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: center;font-size: 10px;">
                                    {{ $rin->rejected_quantity ?? '' }}</td>
                                <td
                                    style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: center;font-size: 10px;">
                                    000</td>
                            </tr> --}}
                                    <tr>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;font-size: 10px;">
                                            &nbsp;</td>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-right: 0;font-size: 10px;">
                                        </td>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-left: 0;font-size: 10px;">
                                        </td>

                                        <td colspan="4"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: right; font-weight: 600;font-size: 10px;">
                                            Total Number of <br>
                                            Items:</td>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;font-size: 10px;">
                                            {{ $total_items ?? '' }}
                                        </td>
                                        <td colspan="2"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-left: 0; font-weight: 600;font-size: 10px;">
                                            Total Basic Cost (Rs)</td>
                                        <td
                                            style="text-align:right; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;font-size: 10px;">
                                            {{ formatIndianCurrency($total_basic_cost, 2) ?? '' }}
                                        </td>

                                    </tr>
                                    <tr>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;font-size: 10px;">
                                            &nbsp;</td>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-right: 0;font-size: 10px;">
                                        </td>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-left: 0;font-size: 10px;">
                                        </td>

                                        <td colspan="4"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: right; font-weight: 600;font-size: 10px;">
                                            Applicable Taxes (Tax Type & Percentage):</td>
                                        <td
                                            style="text-align:right; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;font-size: 10px;">
                                            <span>GST & <br>{{ formatIndianCurrency($rin->gst, 2) ?? '' }} % </span>

                                        </td>
                                        <td colspan="2"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-left: 0; font-weight: 600;font-size: 10px;">
                                            Taxes (Amount):</td>
                                        <td
                                            style="text-align:right; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; font-size: 10px;">
                                            {{ formatIndianCurrency($taxes_amount, 2) ?? '' }}
                                        </td>

                                    </tr>
                                    <tr>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;font-size: 10px;">
                                            &nbsp;</td>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-right: 0;font-size: 10px;">
                                        </td>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-left: 0;font-size: 10px;">
                                        </td>

                                        <td colspan="4"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: right; font-weight: 600;font-size: 10px;">
                                            Applicable Other Charges :</td>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;font-size: 10px;">
                                        </td>
                                        <td colspan="2"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-left: 0; font-weight: 600;font-size: 10px;">
                                            Other Charges (Amount):</td>
                                        <td
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: center;font-size: 10px;">
                                        </td>

                                    </tr>
                                    <tr>

                                        <td colspan="10"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; text-align: right; font-weight: 600;font-size: 10px;">
                                            Total Cost Inclusive of Taxes, Duties and Other Charges :</td>
                                        @php

                                            $words = App\Helpers\Helper::convert($total_amount);
                                        @endphp
                                        <td colspan="1"
                                            style="text-align:right; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-left: 0; font-weight: 600;font-size: 10px;">
                                            {{ formatIndianCurrency($total_amount, 2) ?? '' }} <br>({{ $words ?? '' }})
                                        </td>


                                    </tr>
                                    <tr>

                                        <td colspan="4"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 10px; text-align: left; font-weight: 600;font-size: 10px;">
                                            Certified that above stores have been received and handed over to User
                                            Division
                                            Rep.
                                            <br>
                                            <br><br>
                                            O I/C CRDS
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            Date:___________ <br>
                                            <br>
                                        </td>
                                        <td colspan="4"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-left: 0; font-weight: 600; border-right: 0;font-size: 10px;">
                                            <span style="padding-right: 10;">1.</span> Inspection carried out
                                            satisfactorily **.
                                            <br>
                                            <span style="padding-right: 10;">2.</span> Certified that the above stores
                                            have
                                            been
                                            received, inspected and accepted. <br>
                                            <span style="padding-right: 10;">3.</span> Installation/Commissioning
                                            satisfactorily
                                            completed on (if applicable) <br>
                                            <br><br>
                                            Inspection Authority/Division Officer
                                            <br>
                                            Name: <span
                                                style="font-weight: 400; !important">{{ $rin->authority->user_name ?? '' }}
                                            </span><br>
                                            Designation: <span
                                                style="font-weight: 400; !important">{{ $rin->designation->designation ?? '' }}</span><br>
                                            Date: ____________
                                            <br><br>
                                        </td>
                                        <td colspan="3"
                                            style=" border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 5px; border-left: 0; font-weight: 600;font-size: 10px;">

                                            <br><br><br><br><br><br>
                                            Inspection Authority/Division Officer
                                            <br>
                                            Name: <span
                                                style="font-weight: 400; !important">{{ $rin->authority->user_name ?? '' }}
                                            </span><br>
                                            Designation: <span
                                                style="font-weight: 400; !important">{{ $rin->designation->designation ?? '' }}</span><br>
                                            Date: ____________
                                            <br><br>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                <tbody>
                                    <tr>
                                        <td style="font-weight: 600; padding-top: 20px;font-size: 10px;">*-To be filled
                                            by
                                            the
                                            group/division <br>
                                            *Inspection Report Audited by QA Division enclosed, wherever applicable..
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>


                </tbody>

            </table>

        </body>

    </html>
@endforeach
