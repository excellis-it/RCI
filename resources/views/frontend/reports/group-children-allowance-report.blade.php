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
                @foreach($members as $member)
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
                  {{ $loop->iteration }}
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
                >   {{ $member->name ?? 'N/A'}}<br />
                    {{ $member_detail->emp_id ?? 'N/A'}}<br />
                    {{ $member_detail->desigs->designation ?? 'N/A'}}<br />
                    {{ $member_detail->gpf_number ?? 'N/A'}} / {{ $member_detail->pran_number ?? 'N/A'}}<br /></td>
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
                {{ $member->memberFamily->child1_name ?? 'N/A'}}<br />
                {{ $member->memberFamily->child1_name->child1_dob ?? 'N/A'}}<br /></td>
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
                {{ $member->memberFamily->child1_scll_name ?? 'N/A'}}<br />
                {{ $member->memberFamily->child1_class ?? 'N/A'}}<br />
                {{ $member->memberFamily->child1_academic ?? 'N/A'}}<br />
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
                {{ $member->memberFamily->child1_amount ?? 0}}
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
                {{ $member->memberFamily->child1_amount ?? 0}}
                </td>
                </tr>

              
                @if(isset($member->memberFamily->child2_class) && $member->memberFamily->child2_academic && $member->memberFamily->child2_amount)
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
                      {{ $loop->iteration }}
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
                    >   {{ $member->name ?? 'N/A'}}<br />
                        {{ $member->emp_id ?? 'N/A'}}<br />
                        {{ $member->desigs->designation ?? 'N/A'}}<br />
                        {{ $member->gpf_number ?? 'N/A'}} / {{ $member->pran_number ?? 'N/A'}}<br /></td>
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
                    {{ $member->memberFamily->child2_name ?? 'N/A'}}<br />
                    {{ $member->memberFamily->child2_dob ?? 'N/A'}}<br /></td>
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
                    {{ $member->memberFamily->child2_scll_name ?? 'N/A'}}<br />
                    {{ $member->memberFamily->child2_class ?? 'N/A'}}<br />
                    {{ $member->memberFamily->child2_academic ?? 'N/A'}}<br />
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
                    {{ $data['child2_amount'] ?? ''}}
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
                    {{ $member->memberFamily->child2_amount ?? ''}}
                    </td>
                </tr>
                @else
                @endif
                @endforeach
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
                    income tax of other Bills and the same will be recoverd
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
                    Mr. D. MADHU SUDAN REDDY<br />
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
  </body>
</html>


<div class="page-break"></div>







