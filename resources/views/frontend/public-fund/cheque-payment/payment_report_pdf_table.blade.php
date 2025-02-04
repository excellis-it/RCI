@php
    use App\Helpers\Helper;
@endphp
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
                        $vr_no_print = \App\Models\ChequePayment::with('reciepts')->where('id', $new_key)->first();

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
                                                if (!in_array($vr_no_print['reciepts']['id'], $processedReceipts)) {
                                                    $totalReceipts[$cat->id] += $vr_no_print['reciepts']['amount'];
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
                    @if ($total_previous_balance[$cat->id] > 0)
                        @php
                            $total_previous_balance[$cat->id] =
                                $total_previous_balance[$cat->id] - $categoryTotals[$cat->id];
                        @endphp
                        {{ $total_previous_balance[$cat->id] - $categoryTotals[$cat->id] }}
                    @else
                        @php
                            $total_previous_balance[$cat->id] =
                                $categoryAmounts[$cat->id] +
                                Helper::get_openings_balance($cat->id, $pre_vr_date) -
                                $categoryTotals[$cat->id];
                        @endphp
                        {{ $categoryAmounts[$cat->id] + Helper::get_openings_balance($cat->id, $pre_vr_date) - $categoryTotals[$cat->id] }}
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
                    @if ($total_previous_reciepts[$cat->id] > 0)
                        @php
                            $total_previous_reciepts[$cat->id] =
                                $categoryAmounts[$cat->id] + $total_previous_balance[$cat->id];
                        @endphp
                        {{ $categoryAmounts[$cat->id] + $total_previous_balance[$cat->id] }}
                    @else
                        @php
                            $total_previous_reciepts[$cat->id] =
                                $categoryAmounts[$cat->id] + Helper::get_openings_balance($cat->id, $pre_vr_date);
                        @endphp
                        {{ $categoryAmounts[$cat->id] + Helper::get_openings_balance($cat->id, $pre_vr_date) }}
                    @endif

                </td>
            @endforeach
            <td></td>
        </tr>
    </tbody>

</table>
