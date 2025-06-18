<!DOCTYPE html>
<html lang="en">
  <title>RCI</title>
  <meta charset="utf-8" />


  <style>
        .page-break {
            page-break-before: always;
        }
  </style>

<body style="background: #fff">
<table
      width="100%"
      border="0"
      cellpadding="0"
      cellspacing="0"
      bgcolor="#ffffff"
      style="border-radius: 0px; margin: 0 auto; text-align: center"
    >
      <tbody>
        <tr>
          <td style="padding: 0 0px">
            <table
              width="100%"
              border="0"
              cellpadding="0"
              cellspacing="0"
              align="center"
            >
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
                    "
                  >
                    Claim on Accounts of Children Education Allowance in <br />
                    Respect of CHESS
                    @if(isset($data['report_type']) && $data['report_type'] == 'group')
                        <br/> For Category: {{ App\Models\Category::find($data['category'])->category ?? '' }}
                    @endif
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td style="padding: 0 0px">
            <table
              width="100%"
              border="0"
              cellpadding="0"
              cellspacing="0"
              align="center"
            >
              <thead>
                <tr>
                  <th
                    style="
                      width: 50px;
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: none;
                    "
                  >
                    Sr No.
                  </th>
                  <th
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: none;
                    "
                  >
                    Emp Name<br />
                    Emp Code<br />
                    Rank <br />
                    GPFNO/PRAN
                  </th>
                  <th
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: none;
                    "
                  >
                    Child Name<br />
                    Child DOB
                  </th>
                  <th
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: none;
                    "
                  >
                    School Name<br />
                    Class Name <br />
                    Academic Year
                  </th>
                  <th
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: none;
                    "
                  >
                    Amt(Rs.)
                  </th>
                  <th
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: none;
                    "
                  >
                    Total
                  </th>
                </tr>
              </thead>
              <tr><td style="height: 10px;"></td></tr>
              <tbody>
                @if(isset($data['report_type']) && $data['report_type'] == 'group')
                    @php $srNo = 1; @endphp
                    @foreach($children as $group) {{-- $children now holds groupedChildrenData --}}
                        {{-- <tr>
                            <td colspan="6" style="padding: 5px; background-color: #f0f0f0; font-weight: bold; text-align: left;">
                                Employee: {{ $group['member_detail']->name ?? ''}} ({{ $group['member_detail']->emp_id ?? ''}})
                            </td>
                        </tr> --}}
                        @foreach($group['children'] as $child)
                            <tr>
                                <td
                                    style="
                                        font-size: 10px;
                                        line-height: 14px;
                                        font-weight: 400;
                                        color: #000;
                                        text-align: left;
                                        padding: 0px 5px !important;
                                        margin: 0px 0px !important;
                                        border: none;
                                    "
                                >
                                    {{ $srNo++ }}
                                </td>
                                <td
                                    style="
                                        font-size: 10px;
                                        line-height: 14px;
                                        font-weight: 400;
                                        color: #000;
                                        text-align: left;
                                        padding: 0px 5px !important;
                                        margin: 0px 0px !important;
                                        border: none;
                                    "
                                >
                                    {{ $group['member_detail']->name ?? ''}}<br />
                                    {{ $group['member_detail']->emp_id ?? ''}}<br />
                                    {{ $group['member_detail']->desigs->designation ?? ''}}<br />
                                    {{ $group['member_detail']->gpf_number ?? $group['member_detail']->pran_number ?? ''}} <br />
                                </td>
                                <td
                                    style="
                                        font-size: 10px;
                                        line-height: 14px;
                                        font-weight: 400;
                                        color: #000;
                                        text-align: left;
                                        padding: 0px 5px !important;
                                        margin: 0px 0px !important;
                                        border: none;
                                    "
                                >
                                    {{ $child['child_name'] ?? ''}}<br />
                                    {{ $child['child_dob'] ?? ''}}<br />
                                </td>
                                <td
                                    style="
                                        font-size: 10px;
                                        line-height: 14px;
                                        font-weight: 400;
                                        color: #000;
                                        text-align: left;
                                        padding: 0px 5px !important;
                                        margin: 0px 0px !important;
                                        border: none;
                                    "
                                >
                                    {{ $child['child_scll_name'] ?? ''}}<br />
                                    {{ $child['child_class'] ?? ''}}<br />
                                    {{ $child['child_academic'] ?? ''}}<br />
                                </td>
                                <td
                                    style="
                                        font-size: 10px;
                                        line-height: 14px;
                                        font-weight: 400;
                                        color: #000;
                                        text-align: left;
                                        padding: 0px 5px !important;
                                        margin: 0px 0px !important;
                                        border: none;
                                    "
                                >
                                    {{ $child['child_amount'] ?? 0}}
                                </td>
                                <td
                                    style="
                                        font-size: 10px;
                                        line-height: 14px;
                                        font-weight: 400;
                                        color: #000;
                                        text-align: left;
                                        padding: 0px 5px !important;
                                        margin: 0px 0px !important;
                                        border: none;
                                    "
                                >
                                    {{ $child['child_amount'] ?? 0}}
                                </td>
                            </tr>
                        @endforeach
                        {{-- <tr>
                            <td colspan="5" style="text-align: right; font-weight: bold; padding: 5px;">Total for Employee:</td>
                            <td style="font-weight: bold; padding: 5px;">{{ $group['member_total'] ?? 0 }}</td>
                        </tr> --}}
                        <tr><td style="height: 10px;"></td></tr>
                    @endforeach
                @else {{-- Original individual report loop --}}
                    @foreach($children as $key => $child)
                        <tr>
                        <td
                            style="
                                font-size: 10px;
                                line-height: 14px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                border: none;
                            "
                        >
                        {{ $key +1 }}
                        </td>
                        <td
                            style="
                                font-size: 10px;
                                line-height: 14px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                border: none;
                            "
                        >    {{ $member_detail->name ?? ''}}<br />
                            {{ $member_detail->emp_id ?? ''}}<br />
                            {{ $member_detail->desigs->designation ?? ''}}<br />
                            {{ $member_detail->gpf_number ?? $member_detail->pran_number ?? ''}} <br /></td>
                        <td
                            style="
                                font-size: 10px;
                                line-height: 14px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                border: none;
                            "
                        >
                        {{ $child['child_name'] ?? ''}}<br />
                        {{ $child['child_dob'] ?? ''}}<br /></td>
                        <td
                            style="
                                font-size: 10px;
                                line-height: 14px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                border: none;
                            "
                        >
                        {{ $child['child_scll_name'] ?? ''}}<br />
                        {{ $child['child_class'] ?? ''}}<br />
                        {{ $child['child_academic'] ?? ''}}<br />
                        </td>
                        <td
                            style="
                                font-size: 10px;
                                line-height: 14px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                border: none;
                            "
                        >
                        {{ $child['child_amount'] ?? 0}}
                        </td>
                        <td
                            style="
                                font-size: 10px;
                                line-height: 14px;
                                font-weight: 400;
                                color: #000;
                                text-align: left;
                                padding: 0px 5px !important;
                                margin: 0px 0px !important;
                                border: none;
                            "
                        >
                        {{ $child['child_amount'] ?? 0}}
                        </td>
                        </tr>
                    @endforeach
                @endif


              </tbody>
            </table>
          </td>
        </tr>
        <tr style="height: 20px"></tr>
        <tr>
          <td style="padding: 0 0px">
            <table
              width="100%"
              border="0"
              cellpadding="0"
              cellspacing="0"
              align="center"
            >
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
                    "
                  >
                    Net Amount Payable RS. {{$total ?? 0}}
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td style="height: 20px"></td>
        </tr>
        <tr>
          <td style="padding: 0 0px">
            <table
              width="100%"
              border="0"
              cellpadding="0"
              cellspacing="0"
              align="center"
            >
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
                    "
                  >
                    The Income Tax on the Bill will be consolidated along with
                    income tax of other Bills and the same will be recovered
                    subsequently remaining regular pay hills of this financial
                    year.
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td style="height: 20px"></td>
        </tr>
        <tr>
          <td style="padding: 0 0px">
            <table
              width="100%"
              border="0"
              cellpadding="0"
              cellspacing="0"
              align="center"
            >
              <tbody>
                <tr>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    {{ $accountant ?? '' }}<br />
                    ACCOUNTS OFFICER<br />
                    ForDirector
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>



<div class="page-break"></div>



    <table
      width="100%"
      border="0"
      cellpadding="0"
      cellspacing="0"
      bgcolor="#ffffff"
      style="border-radius: 0px; margin: 0 auto; text-align: center"
    >
      <tbody>
        <tr>
          <td style="padding: 0 0px">
            <table
              width="100%"
              border="0"
              cellpadding="0"
              cellspacing="0"
              align="center"
            >
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
                    "
                  >
                    Center For High Energy Systems and Science
                  </td>
                </tr>
                <tr>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    Unit Code: 3300000110
                  </td>
                </tr>
                <tr>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    @if ($request->report_type == 'individual')
                        {{ $member_detail->emp_id ?? ''}}
                    @else
                        {{-- Employee ID for group reports will be inside the loop --}}
                    @endif
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>

        <tr>
          <td style="height: 20px"></td>
        </tr>
        <tr>
          <td style="padding: 0 0px">
            <table
              width="100%"
              border="0"
              cellpadding="0"
              cellspacing="0"
              align="center"
            >
              <tbody>
                <tr>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    "
                  >
                    To<br />
                    CDA<br />
                    HYDRABAD<br />
                    HYDRABAD<br />
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td style="padding: 0 0px">
            <table
              width="100%"
              border="0"
              cellpadding="0"
              cellspacing="0"
              align="center"
            >
              <tbody>
                <tr>
                  <td
                    style="
                      width: 100px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Total Rupees
                  </td>
                  <td
                    style="
                      width: 100px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Rs. {{ $total ?? 0 }} / -
                  </td>
                  <td colspan="4">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                      <tbody>
                        <tr>
                          <td colspan="4" style="font-size: 14px; line-height: 18px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;       margin: 0px 0px !important; border: 1px solid #000;">
                            Claim on Account of Reimbursement of Children Education
                            Allowance in Respect of
                          </td>
                        </tr>
                        <tr>
                          <td
                            style="
                              font-size: 14px;
                              line-height: 18px;
                              font-weight: 600;
                              color: #000;
                              text-align: left;
                              padding: 0px 5px !important;
                              margin: 0px 0px !important;
                              border: 1px solid #000;
                            "
                          >
                            Emp Name
                          </td>
                          <td
                            style="
                              font-size: 14px;
                              line-height: 18px;
                              font-weight: 600;
                              color: #000;
                              text-align: left;
                              padding: 0px 5px !important;
                              margin: 0px 0px !important;
                              border: 1px solid #000;
                            "
                          >
                            Child Name
                          </td>
                          <td
                            style="
                              font-size: 14px;
                              line-height: 18px;
                              font-weight: 600;
                              color: #000;
                              text-align: left;
                              padding: 0px 5px !important;
                              margin: 0px 0px !important;
                              border: 1px solid #000;
                            "
                          >
                            GPF/PRAN
                          </td>
                          <td
                            style="
                              font-size: 14px;
                              line-height: 18px;
                              font-weight: 600;
                              color: #000;
                              text-align: left;
                              padding: 0px 5px !important;
                              margin: 0px 0px !important;
                              border: 1px solid #000;
                            "
                          >
                            Academic Year
                          </td>
                        </tr>
                        {{-- Conditional rendering for individual or group report --}}
                        @if ($request->report_type == 'individual')


                                @foreach($children as $child)
                                 <tr>

                                 <td
                                            style="
                                                font-size: 14px;
                                                line-height: 18px;
                                                font-weight: 600;
                                                color: #000;
                                                text-align: left;
                                                padding: 0px 5px !important;
                                                margin: 0px 0px !important;
                                                border: 1px solid #000;
                                            "
                                        >{{ $member_detail->name  ?? '' }}</td>
                                <td
                                    style="
                                        font-size: 14px;
                                        line-height: 18px;
                                        font-weight: 600;
                                        color: #000;
                                        text-align: left;
                                        padding: 0px 5px !important;
                                        margin: 0px 0px !important;
                                        border: 1px solid #000;
                                    "
                                >{{ $child['child_name'] ?? ''}}</td>
                                <td
                                    style="
                                        font-size: 14px;
                                        line-height: 18px;
                                        font-weight: 600;
                                        color: #000;
                                        text-align: left;
                                        padding: 0px 5px !important;
                                        margin: 0px 0px !important;
                                        border: 1px solid #000;
                                    "
                                >
                                {{ $member_detail->pran_number ?? $member_detail->gpf_number ?? '' }}
                                </td>
                                <td
                                    style="
                                        font-size: 14px;
                                        line-height: 18px;
                                        font-weight: 600;
                                        color: #000;
                                        text-align: left;
                                        padding: 0px 5px !important;
                                        margin: 0px 0px !important;
                                        border: 1px solid #000;
                                    "
                                >
                                {{ $child['child_academic'] ?? ''}}<br />
                                </td>
                            </tr>
                            @endforeach
                        @elseif ($request->report_type == 'group')
                            @foreach($children as $group) {{-- $children here is $groupedChildrenData from the controller --}}
                                @foreach($group['children'] as $child)
                                    <tr>
                                        <td
                                            style="
                                                font-size: 14px;
                                                line-height: 18px;
                                                font-weight: 600;
                                                color: #000;
                                                text-align: left;
                                                padding: 0px 5px !important;
                                                margin: 0px 0px !important;
                                                border: 1px solid #000;
                                            "
                                        >{{ $group['member_detail']->name ?? '' }}</td>
                                        <td
                                            style="
                                                font-size: 14px;
                                                line-height: 18px;
                                                font-weight: 600;
                                                color: #000;
                                                text-align: left;
                                                padding: 0px 5px !important;
                                                margin: 0px 0px !important;
                                                border: 1px solid #000;
                                            "
                                        >{{ $child['child_name'] ?? ''}}</td>
                                        <td
                                            style="
                                                font-size: 14px;
                                                line-height: 18px;
                                                font-weight: 600;
                                                color: #000;
                                                text-align: left;
                                                padding: 0px 5px !important;
                                                margin: 0px 0px !important;
                                                border: 1px solid #000;
                                            "
                                        >
                                        {{ $group['member_detail']->pran_number ?? $group['member_detail']->gpf_number ?? '' }}
                                        </td>
                                        <td
                                            style="
                                                font-size: 14px;
                                                line-height: 18px;
                                                font-weight: 600;
                                                color: #000;
                                                text-align: left;
                                                padding: 0px 5px !important;
                                                margin: 0px 0px !important;
                                                border: 1px solid #000;
                                            "
                                        >
                                        {{ $child['child_academic'] ?? ''}}<br />
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endif
                      </tbody>
                    </table>
                  </td>

                </tr>

                <tr>
                  <td
                    colspan="2"
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >

                  </td>
                  <td
                    colspan="4"
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Bill No : {{ $bill_no ?? 0 }} Date : {{ $today ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td
                    colspan="2"
                    style="
                      height: 100px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Cheque may be issued in favour of officers
                  </td>
                  <td
                    colspan="4"
                    style="
                      height: 100px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Signature
                  </td>
                </tr>
                <tr>
                  <td
                    colspan="6"
                    style="
                      height: 100px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    "
                  >
                    For the use of CDA HYDERABAD Office
                  </td>
                </tr>
                <tr>
                  <td
                    colspan="6"
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    "
                  >
                    Bill is passed for Rs.
                  </td>
                </tr>
                <tr>
                  <td
                    colspan="6"
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    "
                  >
                    Rupees
                  </td>
                </tr>
                <tr>
                  <td
                    colspan="6"
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                      border-bottom: 1px solid #000;
                    "
                  >
                    for payment as under.
                  </td>
                </tr>
                <tr>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Treasury
                  </td>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Name of Payee
                  </td>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Amount of cheque
                  </td>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Name & date of cheque
                  </td>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Initial of SO (A) I Supdt 'D' Section
                  </td>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Initials of Officer I/o 'D' Section
                  </td>
                </tr>
                <tr>
                  <td
                    style="
                      height: 50px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  ></td>
                  <td
                    style="
                      height: 50px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  ></td>
                  <td
                    style="
                      height: 50px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  ></td>
                  <td
                    style="
                      height: 50px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  ></td>
                  <td
                    style="
                      height: 50px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  ></td>
                  <td
                    style="
                      height: 50px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  ></td>
                </tr>
                <tr>
                  <td
                    colspan="2"
                    style="
                      height: 50px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-bottom: 1px solid #000;
                      border-left: 1px solid #000;
                    "
                  >
                    Sr. Auditor
                  </td>
                  <td
                    colspan="2"
                    style="
                      height: 50px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-bottom: 1px solid #000;
                    "
                  >
                    SO (A) AA0
                  </td>
                  <td
                    colspan="2"
                    style="
                      height: 50px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-bottom: 1px solid #000;
                      border-right: 1px solid #000;
                    "
                  >
                    AO / Sr. AO
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="page-break"></div>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
    style="border-radius: 0px; margin: 0 auto; text-align: center">
    <tbody>
      <tr>
        <td style="padding: 0 0px">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
            <tbody>
              <tr>
              <td colspan="9" style="
                font-size: 25px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                SANCTION
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
          <td>
            <table style="width: 100%;">
              <tbody>
                <tr>
                  <td colspan="9" style="
                    font-size: 16px;
                    line-height: 24px;
                    font-weight: 400;
                    color: #000;
                    text-align: justify;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    text-indent: 50px;
                  ">
                   Sanction of the competent authority for Rs.{{ $total ? number_format($total) : 0 }}/- (Rupees {{ ucwords(str_replace('-', ' ',(\NumberFormatter::create('en_IN', \NumberFormatter::SPELLOUT)->format($total)))) }} Only) is hereby accorded in accordance with the provisions contained in Ministry of Defence, Deparment of Defence Research & Development Organisation, New Delhi letter No.DRDO/RD/Pers-10/1161/92/109/D(R&D) dated 07/01/1993 &  DOPT, Ministry of Personnel, Public Grievances & Pesions OM No A-27012/02/20217 - Estt(AL) dated 17/01/2018 for payment of Children Education Allowance to the following individuals of CHESS shown below:
                  </td>
                </tr>
                <tr>
                  <td style="
                    height: 30px;
                  ">
                </td>
              </tr>

              </tbody>
            </table>
          </td>
        </tr>
      <tr>
        <td style="
          height: 50px;
        ">
       @if($request->report_type == 'group')
<table style="width: 80%; margin: auto; border-collapse: collapse;">
    <thead>
        <tr>
            <th style="
              font-size: 16px;
              line-height: 20px;
              font-weight: 600;
              color: #000;
              text-align: left;
              padding: 5px 5px !important;
              margin: 0px 0px !important;
              vertical-align: top;
              border-left: 1px solid #000;
              border-right: 1px solid #000;
              border-bottom: 1px solid #000;
              border-top: 1px solid #000;
            ">Emp Code</th>
            <th style="
              font-size: 16px;
              line-height: 20px;
              font-weight: 600;
              color: #000;
              text-align: left;
              padding: 5px 5px !important;
              margin: 0px 0px !important;
              vertical-align: top;
              border-right: 1px solid #000;
              border-bottom: 1px solid #000;
              border-top: 1px solid #000;
            ">Emp Name (Dr/Mr/Ms)</th>
            <th style="
              font-size: 16px;
              line-height: 20px;
              font-weight: 600;
              color: #000;
              text-align: left;
              padding: 5px 5px !important;
              margin: 0px 0px !important;
              vertical-align: top;
              border-right: 1px solid #000;
              border-bottom: 1px solid #000;
              border-top: 1px solid #000;
            ">PRAN/GPF</th>
            <th style="
              font-size: 16px;
              line-height: 20px;
              font-weight: 600;
              color: #000;
              text-align: left;
              padding: 5px 5px !important;
              margin: 0px 0px !important;
              vertical-align: top;
              border-right: 1px solid #000;
              border-bottom: 1px solid #000;
              border-top: 1px solid #000;
            ">Total Amount Sanctioned</th>
        </tr>
    </thead>
    <tbody>
        @foreach($children as $group) {{-- $children contains groupedChildrenData in this case --}}
        <tr>
            <td style="
              font-size: 16px;
              line-height: 20px;
              font-weight: 400;
              color: #000;
              text-align: left;
              padding: 5px 5px !important;
              margin: 0px 0px !important;
              vertical-align: top;
              border-left: 1px solid #000;
              border-right: 1px solid #000;
              border-bottom: 1px solid #000;
            ">
                {{ $group['member_detail']->emp_code ?? '' }}
            </td>
            <td style="
              font-size: 16px;
              line-height: 20px;
              font-weight: 400;
              color: #000;
              text-align: left;
              padding: 5px 5px !important;
              margin: 0px 0px !important;
              vertical-align: top;
              border-right: 1px solid #000;
              border-bottom: 1px solid #000;
            ">
                {{ $group['member_detail']->name ?? '' }}
            </td>
            <td style="
              font-size: 16px;
              line-height: 20px;
              font-weight: 400;
              color: #000;
              text-align: left;
              padding: 5px 5px !important;
              margin: 0px 0px !important;
              vertical-align: top;
              border-right: 1px solid #000;
              border-bottom: 1px solid #000;
            ">
            {{ $group['member_detail']->gpf_number ?? '' }}{{ $group['member_detail']->pran_number ?? '' }}
            </td>
            <td style="
              font-size: 16px;
              line-height: 20px;
              font-weight: 400;
              color: #000;
              text-align: left;
              padding: 5px 5px !important;
              margin: 0px 0px !important;
              vertical-align: top;
              border-right: 1px solid #000;
              border-bottom: 1px solid #000;
            ">
                {{ number_format($group['member_total'], 2) }}
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3" style="
              font-size: 16px;
              line-height: 20px;
              font-weight: 400;
              color: #000;
              text-align: right; /* Align 'Total' to the right */
              padding: 5px 5px !important;
              margin: 0px 0px !important;
              vertical-align: top;
              border-left: 1px solid #000;
              border-right: 1px solid #000;
              border-bottom: 1px solid #000;
            ">
                Total
            </td>
            <td style="
              font-size: 16px;
              line-height: 20px;
              font-weight: 400;
              color: #000;
              text-align: left;
              padding: 5px 5px !important;
              margin: 0px 0px !important;
              vertical-align: top;
              border-right: 1px solid #000;
              border-bottom: 1px solid #000;
            ">
                {{ $total ? number_format($total, 2) : 0.00 }}
            </td>
        </tr>
    </tbody>
</table>

@elseif($request->report_type == 'individual')
    @if($member_detail)
    {{-- @dd($member_detail) --}}
        <table style="width: 80%; margin: auto; border-collapse: collapse; margin-bottom: 20px;">
            <thead>
                <tr>
                    <th colspan="2" style="
                        font-size: 18px;
                        line-height: 22px;
                        font-weight: 700;
                        color: #000;
                        text-align: center;
                        padding: 10px;
                        border: 1px solid #000;
                        background-color: #f2f2f2;
                    ">Member Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="
                        font-size: 16px;
                        line-height: 20px;
                        font-weight: 600;
                        color: #000;
                        text-align: left;
                        padding: 5px;
                        border: 1px solid #000;
                    ">Emp Code:</td>
                    <td style="
                        font-size: 16px;
                        line-height: 20px;
                        font-weight: 400;
                        color: #000;
                        text-align: left;
                        padding: 5px;
                        border: 1px solid #000;
                    ">{{ $member_detail->emp_id ?? '' }}</td>
                </tr>
                <tr>
                    <td style="
                        font-size: 16px;
                        line-height: 20px;
                        font-weight: 600;
                        color: #000;
                        text-align: left;
                        padding: 5px;
                        border: 1px solid #000;
                    ">Emp Name:</td>
                    <td style="
                        font-size: 16px;
                        line-height: 20px;
                        font-weight: 400;
                        color: #000;
                        text-align: left;
                        padding: 5px;
                        border: 1px solid #000;
                    ">{{ $member_detail->name ?? '' }}</td>
                </tr>
                <tr>
                    <td style="
                        font-size: 16px;
                        line-height: 20px;
                        font-weight: 600;
                        color: #000;
                        text-align: left;
                        padding: 5px;
                        border: 1px solid #000;
                    ">PRAN/GPF:</td>
                    <td style="
                        font-size: 16px;
                        line-height: 20px;
                        font-weight: 400;
                        color: #000;
                        text-align: left;
                        padding: 5px;
                        border: 1px solid #000;
                    ">{{ $member_detail->gpf_number ?? '' }}{{ $member_detail->pran_number ?? '' }}</td>
                </tr>
            </tbody>
        </table>


    @else
        <p>No member details found for the individual report.</p>
    @endif
@else
    <p>Invalid report type.</p>
@endif
          </td>
        </tr>
        <tr>
          <td>
            <table style="width: 100%;">
              <tbody>
                <tr>
                  <td style="
                    font-size: 16px;
                    line-height: 20px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 20px 5px !important;
                    margin: 0px 0px !important;
                    vertical-align: top;
                  ">
                    Net Ammount payment of Rs.{{ $total ? number_format($total) : 0 }}/- (Rupees {{ ucwords(str_replace('-', ' ',(\NumberFormatter::create('en_IN', \NumberFormatter::SPELLOUT)->format($total)))) }} Only)
                  </td>
                </tr>


              </tbody>
            </table>
          </td>
        </tr>

              <tr>
              <td colspan="9" style="
                font-size: 20px;
                line-height: 30px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 50px 5px 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                SANCTIONED /NOT SANCTIONED
                </td>
              </tr>


                            <tr>
              <td colspan="9" style="
                font-size: 20px;
                line-height: 30px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 50px 5px 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                ({{$director_name ?? ''}})<BR>DS & Director
                </td>
              </tr>



 <tr>
                <td style="
                font-size: 16px;
                line-height: 20px;
                font-weight: normal;
                color: #000;
                text-align: left;
                padding: 50px 5px !important;
                margin-top: 50px !important;
                height: 100px;

              ">
                  NO.CHESS/FIN/MISC/Tele@/{{$year}}/<br>Government of India<br>
                Ministry of Defence<br>
                Defence Research & Development Organisation <br>
                CENTER FOR HIGH ENERGY SYSTEMS & SCIENCES(CHESS)<br>
                Od RCI Utility Building <br>
                PO: Vigyanakancha
                RCI, HYDRABAD-500 069
                </td>
                <td style="
                font-size: 16px;
                line-height: 14px;
                font-weight: bold;
                color: #000;
                text-align: right;
                padding: 50px 5px !important;
                margin-top: 50px !important;
                height: 100px;
              ">

                </td>

              </tr>


    </tbody>
  </table>
  </body>
</html>


