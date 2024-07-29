<!DOCTYPE html>
<html lang="en">
  <title>RCI</title>
  <meta charset="utf-8" />
  

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
                  1
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
                >   {{ $member_detail->name ?? 'N/A'}}<br />
                    {{ $member_detail->emp_id ?? 'N/A'}}<br />
                    {{ $member_detail->desigs->designation ?? 'N/A'}}<br />
                    {{ $member_detail->gpf_number ?? ''}} / {{ $member_detail->pran_number ?? ''}}<br /></td>
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
                {{ $member_children->child1_name ?? ''}}<br />
                {{ $member_children->child1_dob ?? ''}}<br /></td>
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
                {{ $member_children->child1_scll_name ?? ''}}<br />
                {{ $data['child1_class'] ?? ''}}<br />
                {{ $data['child1_academic'] ?? ''}}<br />
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
                {{ $data['child1_amount'] ?? ''}}
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
                {{ $data['child1_amount'] ?? ''}}
                </td>
                </tr>

                @if($data['child2_class'] && $data['child2_academic'] && $data['child2_amount'])
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
                      2
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
                    >   {{ $member_detail->name ?? 'N/A'}}<br />
                        {{ $member_detail->emp_id ?? 'N/A'}}<br />
                        {{ $member_detail->desigs->designation ?? 'N/A'}}<br />
                        {{ $member_detail->gpf_number ?? ''}} / {{ $member_detail->pran_number ?? ''}}<br /></td>
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
                    {{ $member_children->child2_name ?? ''}}<br />
                    {{ $member_children->child2_dob ?? ''}}<br /></td>
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
                    {{ $member_children->child2_scll_name ?? ''}}<br />
                    {{ $data['child2_class'] ?? ''}}<br />
                    {{ $data['child2_academic'] ?? ''}}<br />
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
                    {{ $data['child2_amount'] ?? ''}}
                    </td>
                </tr>
                @else
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
