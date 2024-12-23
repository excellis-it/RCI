@if (count($amt) > 0)
    <table class="table customize-table mb-0 align-middle bg_tbody">
        <thead class="text-white fs-4 bg_blue">
            <tr>
                <th>Date</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($amt as $amount)
                <tr>
                    <td>{{ date('d-m-Y', strtotime($amount->created_at)) }}</td>

                    <td>{{$amount->amount}}</td>

                </tr>
            @endforeach


        </tbody>
    </table>
@else
    <tr>
        <td class="text-center">No Amount Found</td>
    </tr>
@endif
