@if (count($last_month_debit_data) > 0)

      <div class="page-break"></div>
    @foreach ($last_month_debit_data as $key_new => $debit_statements)
    @if (count($debit_statements['data']) > 0)
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border-radius: 0px; margin: 0 auto; text-align: center">
        <tbody>
          <tr>
            <td style="padding: 0 0px">
              <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                <tbody>
                  <tr>
                    <td style="
                          font-size: 18px;
                          line-height: 14px;
                          font-weight: 500;
                          color: #000;
                          text-align: center;
                          padding: 10px 5px !important;
                          margin: 0px 0px !important;
                          text-transform: uppercase;
                        ">
                          CHANGE STATEMENT (DEBITS) - {{ $category_fund_type }} BILL FOR THE MONTH OF
                          {{ $number_month }}
                          / {{ $year ?? '0' }}
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>


          <tr>
            <td style="padding: 0 0px">
              <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                <thead>
                  <tr>
                    <th style="
                          font-size: 10px;
                          line-height: 14px;
                          font-weight: 600;
                          color: #000;
                          text-align: center;
                          padding: 0px 5px !important;
                          margin: 0px 0px !important;
                          border-top: 1px solid #000;
                          border-left: 1px solid #000;
                        ">

                    </th>
                    <th style="
                          font-size: 10px;
                          line-height: 14px;
                          font-weight: 600;
                          color: #000;
                          text-align: center;
                          padding: 0px 5px !important;
                          margin: 0px 0px !important;
                          border-top: 1px solid #000;
                          border-left: 1px solid #000;
                        ">
                      GPF/PRAN
                    </th>
                    <th style="
                          font-size: 10px;
                          line-height: 14px;
                          font-weight: 600;
                          color: #000;
                          text-align: center;
                          padding: 0px 5px !important;
                          margin: 0px 0px !important;
                          border-top: 1px solid #000;
                          border-left: 1px solid #000;
                        ">
                      GPF
                    </th>
                    <th style="
                          font-size: 10px;
                          line-height: 14px;
                          font-weight: 600;
                          color: #000;
                          text-align: center;
                          padding: 0px 5px !important;
                          margin: 0px 0px !important;
                          border-top: 1px solid #000;
                          border-left: 1px solid #000;
                        ">
                      GPF ADV
                    </th>
                    <th style="
                          font-size: 10px;
                          line-height: 14px;
                          font-weight: 600;
                          color: #000;
                          text-align: center;
                          padding: 0px 5px !important;
                          margin: 0px 0px !important;
                          border-top: 1px solid #000;
                          border-left: 1px solid #000;
                        ">
                      CGEGIS
                    </th>
                    <th style="
                          font-size: 10px;
                          line-height: 14px;
                          font-weight: 600;
                          color: #000;
                          text-align: center;
                          padding: 0px 5px !important;
                          margin: 0px 0px !important;
                          border-top: 1px solid #000;
                          border-left: 1px solid #000;
                        ">
                      CGHS
                    </th>
                    <th style="
                          font-size: 10px;
                          line-height: 14px;
                          font-weight: 600;
                          color: #000;
                          text-align: center;
                          padding: 0px 5px !important;
                          margin: 0px 0px !important;
                          border-top: 1px solid #000;
                          border-left: 1px solid #000;
                        ">
                      HBA ADV
                    </th>
                    <th style="
                          font-size: 10px;
                          line-height: 14px;
                          font-weight: 600;
                          color: #000;
                          text-align: center;
                          padding: 0px 5px !important;
                          margin: 0px 0px !important;
                          border-top: 1px solid #000;
                          border-left: 1px solid #000;
                        ">
                      HBA INT
                    </th>
                    <th style="
                          font-size: 10px;
                          line-height: 14px;
                          font-weight: 600;
                          color: #000;
                          text-align: center;
                          padding: 0px 5px !important;
                          margin: 0px 0px !important;
                          border-top: 1px solid #000;
                          border-left: 1px solid #000;
                        ">
                      INC TAX
                    </th>
                    <th style="
                          font-size: 10px;
                          line-height: 14px;
                          font-weight: 600;
                          color: #000;
                          text-align: center;
                          padding: 0px 5px !important;
                          margin: 0px 0px !important;
                          border-top: 1px solid #000;
                          border-left: 1px solid #000;
                        ">
                      EDU CESS
                    </th>
                    <th style="
                          font-size: 10px;
                          line-height: 14px;
                          font-weight: 600;
                          color: #000;
                          text-align: center;
                          padding: 0px 5px !important;
                          margin: 0px 0px !important;
                          border-top: 1px solid #000;
                          border-left: 1px solid #000;
                        ">
                      MISC DR
                    </th>
                    <th style="
                          font-size: 10px;
                          line-height: 14px;
                          font-weight: 600;
                          color: #000;
                          text-align: center;
                          padding: 0px 5px !important;
                          margin: 0px 0px !important;
                          border-top: 1px solid #000;
                          border-left: 1px solid #000;
                        ">
                      NPS 10%
                    </th>
                    <th style="
                          font-size: 10px;
                          line-height: 14px;
                          font-weight: 600;
                          color: #000;
                          text-align: center;
                          padding: 0px 5px !important;
                          margin: 0px 0px !important;
                          border-top: 1px solid #000;
                          border-left: 1px solid #000;
                        ">
                      NPS 14%
                    </th>
                    <th style="
                          font-size: 10px;
                          line-height: 14px;
                          font-weight: 600;
                          color: #000;
                          text-align: center;
                          padding: 0px 5px !important;
                          margin: 0px 0px !important;
                          border-left: 1px solid #000;
                          border-top: 1px solid #000;
                        ">
                      NPSADJ(10%)
                    </th>
                    <th style="
                          font-size: 10px;
                          line-height: 14px;
                          font-weight: 600;
                          color: #000;
                          text-align: center;
                          padding: 0px 5px !important;
                          margin: 0px 0px !important;
                          border-top: 1px solid #000;
                          border-left: 1px solid #000;
                        ">
                      NPSADJ(14%)
                    </th>
                    <th style="
                          font-size: 10px;
                          line-height: 14px;
                          font-weight: 600;
                          color: #000;
                          text-align: center;
                          padding: 0px 5px !important;
                          margin: 0px 0px !important;
                          border-left: 1px solid #000;
                          border-top: 1px solid #000;
                          /* border-right: 1px solid #000; */
                        ">
                      LF
                    </th>
                    <th style="
                          font-size: 10px;
                          line-height: 14px;
                          font-weight: 600;
                          color: #000;
                          text-align: center;
                          padding: 0px 5px !important;
                          margin: 0px 0px !important;
                          border-left: 1px solid #000;
                          border-top: 1px solid #000;
                          /* border-right: 1px solid #000; */
                        ">
                      ELEC
                    </th>
                    <th style="
                          font-size: 10px;
                          line-height: 14px;
                          font-weight: 600;
                          color: #000;
                          text-align: center;
                          padding: 0px 5px !important;
                          margin: 0px 0px !important;
                          border-left: 1px solid #000;
                          border-top: 1px solid #000;
                          /* border-right: 1px solid #000; */
                        ">
                      WATER
                    </th>
                    <th style="
                          font-size: 10px;
                          line-height: 14px;
                          font-weight: 600;
                          color: #000;
                          text-align: center;
                          padding: 0px 5px !important;
                          margin: 0px 0px !important;
                          border-left: 1px solid #000;
                          border-top: 1px solid #000;
                          border-right: 1px solid #000;
                        ">
                      FURN
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-top: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-top: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-top: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-top: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-top: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-top: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-top: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-top: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-top: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-top: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-top: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-top: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-top: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-top: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-top: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-top: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-top: 1px solid #000;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: LEFT;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-top: 1px solid #000;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-top: 1px solid #000;
                    border-left: 1px solid #000;
                    border-right: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                  </tr>
                  <tr>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    LAST CHARGE {{ $previousMonth }}
                    / {{ $previousYear }}
                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>

                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                       {{$debit_statements['totals']['gpa_sub'] ?? 0}}

                    </td>
                     <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                                            {{ $debit_statements['totals']['gpf_adv'] ?? 0}}

                    </td>
                     <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                        {{ $debit_statements['totals']['cgegis'] ?? 0}}

                    </td>
                     <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                       {{ $debit_statements['totals']['cghs']  ?? 0}}

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                       {{  $debit_statements['totals']['hba_adv']   ?? 0}}

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                       {{    $debit_statements['totals']['hba_int'] ?? 0}}

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                      {{ $debit_statements['totals']['i_tax'] ?? 0}}

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                       {{  $debit_statements['totals']['ecess'] ?? 0}}

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                       {{  $debit_statements['totals']['misc1']  ?? 0}}

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                      {{  $debit_statements['totals']['nps_10_rec'] ?? 0}}

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                      {{ $debit_statements['totals']['npsg']  ?? 0}}

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                      {{$debit_statements['totals']['npsg_adj'] ?? 0}}

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                     {{   $debit_statements['totals']['nps_14_adj']  ?? 0}}

                    </td>

                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                   {{$debit_statements['totals']['licence_fee'] ?? 0}}

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                   {{$debit_statements['totals']['elec'] ?? 0}}

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-right: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                  {{ $debit_statements['totals']['water']  ?? 0}}
                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-right: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                  {{ $debit_statements['totals']['furn']  ?? 0}}
                    </td>
                  </tr>


                  <tr>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-right: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                  </tr>
                  @php
                  $this_month_totals =
                      ['gpa_sub' => 0,
                                    'gpf_adv' => 0,
                                    'cgegis' => 0,
                                    'cghs' => 0,
                                    'hba_adv' => 0,
                                    'hba_int' => 0,
                                    'i_tax' => 0,
                                    'ecess' => 0,
                                    'misc1' => 0,
                                    'nps_10_rec' => 0,
                                    'npsg' => 0,
                                    'npsg_adj' => 0,
                                    'nps_14_adj' => 0,
                                    'misc_1' => 0,
                                    'licence_fee' => 0,
                                    'elec' => 0,
                                    'water' => 0,
                                    'furn' => 0,]
                  @endphp
        @foreach ($debit_statements['data'] as $debit_statement)
        {{-- @dd($debit_statement) --}}
            @php
                    $this_month_data_loan_hba_adv_sum = \App\Models\MemberMonthlyDataLoanInfo::where(
                    'member_id',
                    $debit_statement['member_id'],
                )->whereHas('member', function ($query) use ($compareDate) {
                    $query->where(function ($q) use ($compareDate) {
                        $q->whereNull('pay_stop_date')
                        ->orWhere('pay_stop_date', '>', $compareDate);
                    });
                })
                    ->where('month', $themonth)
                    ->where('year', $year)
                    ->where('loan_id', 1)
                    ->orderBy('id', 'desc')
                    ->sum('inst_amount');

                     $this_month_data_loan_gpf_adv_sum = \App\Models\MemberMonthlyDataLoanInfo::where(
                    'member_id',
                    $debit_statement['member_id'],
                )->whereHas('member', function ($query) use ($compareDate) {
                    $query->where(function ($q) use ($compareDate) {
                        $q->whereNull('pay_stop_date')
                        ->orWhere('pay_stop_date', '>', $compareDate);
                    });
                })
                    ->where('month', $themonth)
                    ->where('year', $year)
                    ->where('loan_id', 10)
                    ->orderBy('id', 'desc')
                    ->sum('inst_amount');

                    $this_month_data_loan_hba_adv_int = \App\Models\MemberMonthlyDataLoanInfo::where(
                    'member_id',
                    $debit_statement['member_id'],
                )->whereHas('member', function ($query) use ($compareDate) {
                    $query->where(function ($q) use ($compareDate) {
                        $q->whereNull('pay_stop_date')
                        ->orWhere('pay_stop_date', '>', $compareDate);
                    });
                })
                    ->where('month', $themonth)
                    ->where('year', $year)
                    ->where('loan_id', 2)
                    ->orderBy('id', 'desc')
                    ->sum('inst_amount');

                $this_month_debit = \App\Models\MemberMonthlyDataDebit::whereHas('member', function ($query) use ($compareDate) {
                    $query->where(function ($q) use ($compareDate) {
                        $q->whereNull('pay_stop_date')
                        ->orWhere('pay_stop_date', '>', $compareDate);
                    });
                })
                ->where('member_id', $debit_statement['member_id'])
                ->where('month', $themonth)
                ->where('year', $year)
                ->orderBy('id', 'desc')
                ->first();



                $last_month_field['gpa_sub']    = $debit_statement['gpa_sub'] ?? 0;
                $last_month_field['gpf_adv']    = $debit_statement['gpf_adv'] ?? 0;
                $last_month_field['cgegis']     = $debit_statement['cgegis'] ?? 0;
                $last_month_field['cghs']       = $debit_statement['cghs'] ?? 0;
                $last_month_field['hba_adv']    = $debit_statement['hba_adv'] ?? 0;
                $last_month_field['hba_int']    = $debit_statement['hba_int'] ?? 0;
                $last_month_field['i_tax']      = $debit_statement['i_tax'] ?? 0;
                $last_month_field['ecess']      = $debit_statement['ecess'] ?? 0;
                $last_month_field['misc1']      = $debit_statement['misc1'] ?? 0;
                $last_month_field['nps_10_rec'] = $debit_statement['nps_10_rec'] ?? 0;
                $last_month_field['npsg']       = $debit_statement['npsg'] ?? 0;
                $last_month_field['npsg_adj']   = $debit_statement['npsg_adj'] ?? 0;
                $last_month_field['nps_14_adj'] = $debit_statement['nps_14_adj'] ?? 0;
                $last_month_field['licence_fee']= $debit_statement['licence_fee'] ?? 0;
                $last_month_field['elec']       = $debit_statement['elec'] ?? 0;
                $last_month_field['water']      = $debit_statement['water'] ?? 0;
                $last_month_field['furn']       = $debit_statement['furn'] ?? 0;

                $this_month_totals['gpa_sub']     += ($this_month_debit->gpa_sub ?? 0) - $debit_statement['gpa_sub'];
                $this_month_totals['gpf_adv']     += ($this_month_data_loan_gpf_adv_sum ?? 0) - $debit_statement['gpf_adv'];
                $this_month_totals['cgegis']      += ($this_month_debit->cgegis ?? 0) - $debit_statement['cgegis'];
                $this_month_totals['cghs']        += ($this_month_debit->cghs ?? 0) - $debit_statement['cghs'];
                $this_month_totals['hba_adv']     += ($this_month_data_loan_hba_adv_sum ?? 0)  - $debit_statement['hba_adv'];
                $this_month_totals['hba_int']     += ($this_month_data_loan_hba_adv_int ?? 0)  - $debit_statement['hba_int'];
                $this_month_totals['i_tax']       += ($this_month_debit->i_tax ?? 0) - $debit_statement['i_tax'];
                $this_month_totals['ecess']       += ($this_month_debit->ecess ?? 0) - $debit_statement['ecess'];
                $this_month_totals['misc1']       += ($this_month_debit->misc1 ?? 0) - $debit_statement['misc1'];
                $this_month_totals['nps_10_rec']  += ($this_month_debit->nps_10_rec ?? 0) - $debit_statement['nps_10_rec'];
                $this_month_totals['npsg']        += ($this_month_debit->npsg ?? 0) - $debit_statement['npsg'];
                $this_month_totals['npsg_adj']    += ($this_month_debit->npsg_adj ?? 0) - $debit_statement['npsg_adj'];
                $this_month_totals['nps_14_adj']  += ($this_month_debit->nps_14_adj ?? 0) - $debit_statement['nps_14_adj'];
                $this_month_totals['licence_fee'] += ($this_month_debit->licence_fee ?? 0) - $debit_statement['licence_fee'];
                $this_month_totals['elec']        += ($this_month_debit->elec ?? 0) - $debit_statement['elec'];
                $this_month_totals['water']       += ($this_month_debit->water ?? 0) - $debit_statement['water'];
                $this_month_totals['furn']        += ($this_month_debit->furn ?? 0) - $debit_statement['furn'];
            @endphp

                 <tr>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                        {{ $debit_statement['member']['name'] ?? '-' }}

                    </td>
                     <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                       {{ $debit_statement['member']['pran_number'] ?? '0' }}
                    </td>
                     <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                  {{-- {{dd($last_month_field['gpa_sub'])}} --}}
                        {{ (($this_month_debit->gpa_sub ?? 0) - $last_month_field['gpa_sub']) }}
                    </td>
                     <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                     {{ (($this_month_data_loan_gpf_adv_sum ?? 0) - $last_month_field['gpf_adv']) }}
                    </td>

                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                       {{ (($this_month_debit->cgegis ?? 0) - $last_month_field['cgegis']) }}
                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                      {{ (($this_month_debit->cghs ?? 0) - $last_month_field['cghs']) }}
                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                       {{ (($this_month_data_loan_hba_adv_sum  ?? 0)- $last_month_field['hba_adv']) }}
                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                      {{ (($this_month_data_loan_hba_adv_int ?? 0) - $last_month_field['hba_int']) }}
                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                       {{ (($this_month_debit->i_tax ?? 0) - $last_month_field['i_tax']) }}
                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                       {{ (($this_month_debit->ecess ?? 0) - $last_month_field['ecess']) }}
                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                       {{ (($this_month_debit->misc1 ?? 0) - $last_month_field['misc1']) }}
                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                       {{ (($this_month_debit->nps_10_rec ?? 0) - $last_month_field['nps_10_rec']) }}
                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                      {{ (($this_month_debit->npsg ?? 0) - $last_month_field['npsg']) }}
                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                       {{ (($this_month_debit->npsg_adj ?? 0) - $last_month_field['npsg_adj']) }}
                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                      {{ (($this_month_debit->nps_14_adj ?? 0) - $last_month_field['nps_14_adj']) }}
                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                  {{-- @dd($debit_statement['details']['member_debit']->licence_fee , $last_month_field['licence_fee']) --}}
                   {{ (($this_month_debit->licence_fee ?? 0) - $last_month_field['licence_fee']) }}
                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                  {{ (($this_month_debit->elec ?? 0) - $last_month_field['elec']) }}
                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                   {{ (($this_month_debit->water ?? 0) - $last_month_field['water']) }}
                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-right: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                   {{ (($this_month_debit->furn ?? 0) - $last_month_field['furn']) }}
                    </td>
                  </tr>
                    @endforeach




                  <tr>



                        <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">


                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">


                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">


                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">


                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-right: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">

                    </td>
                  </tr>
                  <tr>



                        <td colspan="2" style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                      TOTAL
                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                      {{($debit_statements['totals']['gpa_sub'] ?? 0) + ($this_month_totals['gpa_sub'] ?? 0)}}
                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                       {{($debit_statements['totals']['gpf_adv'] ?? 0) + ($this_month_totals['gpf_adv'] ?? 0)}}
                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                       {{($debit_statements['totals']['cgegis'] ?? 0) + ($this_month_totals['cgegis'] ?? 0)}}
                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                       {{($debit_statements['totals']['cghs'] ?? 0) + ($this_month_totals['cghs'] ?? 0)}}
                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                       {{($debit_statements['totals']['hba_adv'] ?? 0) + ($this_month_totals['hba_adv'] ?? 0)}}
                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                        {{($debit_statements['totals']['hba_int'] ?? 0) + ($this_month_totals['hba_int'] ?? 0)}}
                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                        {{($debit_statements['totals']['i_tax'] ?? 0) + ($this_month_totals['i_tax'] ?? 0)}}
                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                        {{($debit_statements['totals']['ecess'] ?? 0) + ($this_month_totals['ecess'] ?? 0)}}
                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                        {{($debit_statements['totals']['misc1'] ?? 0) + ($this_month_totals['misc1'] ?? 0)}}
                    </td>
                                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                        {{($debit_statements['totals']['nps_10_rec'] ?? 0) + ($this_month_totals['nps_10_rec'] ?? 0)}}
                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                        {{($debit_statements['totals']['npsg'] ?? 0) + ($this_month_totals['npsg'] ?? 0)}}
                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                       {{($debit_statements['totals']['npsg_adj'] ?? 0) + ($this_month_totals['npsg_adj'] ?? 0)}}
                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">  {{($debit_statements['totals']['nps_14_adj'] ?? 0) + ($this_month_totals['nps_14_adj'] ?? 0)}}
                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                    {{($debit_statements['totals']['licence_fee'] ?? 0) + ($this_month_totals['licence_fee'] ?? 0)}}
                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                    {{($debit_statements['totals']['elec'] ?? 0) + ($this_month_totals['elec'] ?? 0)}}
                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                    {{($debit_statements['totals']['water'] ?? 0) + ($this_month_totals['water'] ?? 0)}}
                    </td>
                    <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-right: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                    {{($debit_statements['totals']['furn'] ?? 0) + ($this_month_totals['furn'] ?? 0)}}
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
       @endif


       @endforeach
@endif
