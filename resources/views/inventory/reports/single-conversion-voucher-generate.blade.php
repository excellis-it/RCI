
<!DOCTYPE html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />

<body style="background: #fff">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
    <tbody>
      <tr>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
            <tbody>
              <tr>
                <td></td>

                <td style="font-size: 10px; text-align: right; font-weight: bold;">DRDO.SM.27
                </td>
              </tr>
              <tr>
                <td style="font-size: 10px"></td>
                <td style="
                      text-align: center;
                      font-weight: bold;
                      font-size: 10px;
                      width: 100%;
                    ">
                  Centre for High Energy System and Sciences <br />
                  CONVERSION VOUCHER
                </td>
                <td style="font-size: 10px; text-align: right"></td>
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
                <td style="font-size: 16px;  width: 70%;
                        line-height: 18px;
                        font-weight: 400;
                        color: #000;
                        text-align: left;">Group/ Division: <br> <br>
                  Type of Voucher: One to One / Many to One / One to Many &nbsp;&nbsp;&nbsp; Date: <br> <br>
                  ICC No.: {{ $inv_no->number }} 
                </td>
                <td valign="top" style="font-size: 16px; width: 30%;
                        line-height: 18px; 
                        font-weight: 400;
                        color: #000;
                        text-align: left; padding-left: 10px;">
                  Voucher No: {{ $conversionVoucher->voucher_no }} <br> <br>
                  Voucher Date: {{ \Carbon\Carbon::parse($conversionVoucher->voucher_date)->format('d-m-Y') }}
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>

      <tr>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="margin-top: 2rem">
            <tbody>
              <tr>
                <th valign="top" rowspan="2"
                  style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center; font-weight: 600;">
                  SL.N <br>
                  O.
                </th>
                <th valign="top" colspan="6"
                  style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center; font-weight: 600;">
                  Strike Off
                </th>
                <th valign="top" colspan="6"
                  style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center; font-weight: 600;">
                  Brought on Charge
                </th>
                <th valign="middle" rowspan="2"
                  style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center; font-weight: 600;">
                  Reasons for <br> Conversion
                </th>
              </tr>

              <tr>

                <td valign="top" style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  Item <br> Code
                </td>
                <td valign="top" style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  Ledger <br> No/Page <br> No/
                </td>
                <td valign="top" style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  Description <br> of Item to <br> be Struck <br> off Charge
                </td>
                <td valign="top" style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  C/ <br> NC/ <br> NCF
                </td>
                <td valign="top" style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  Q <br>ty
                </td>
                <td valign="top" style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  Rate <br> per <br> Unit
                </td>
                <td valign="top" style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  Item <br> Code
                </td>
                <td valign="top" style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  Ledger <br> No/<br>Page No<br>/
                </td>
                <td valign="top" style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  Description <br> of Items <br> Brought on <br> Charge
                </td>
                <td valign="top" style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  C/ <br> NC/ <br> NCF
                </td>
                <td valign="top" style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  Qty
                </td>
                <td valign="top" style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  Rate per <br> Unit
                </td>
              </tr>
              <tr>

                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  1</td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  2
                </td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  3
                </td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  4
                </td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  5
                </td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  6
                </td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  7
                </td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  8
                </td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  9
                </td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  10
                </td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  11
                </td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  12
                </td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  13
                </td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  14
                </td>
              </tr>
              <tr style="height: 60px;">

                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                 1. &nbsp;</td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                    {{ $itemDesc->code }}
                </td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  0001
                </td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                    {{ $itemDesc->description }}
                </td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                    {{ $itemDesc->item_type }}
                </td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  {{ $conversionVoucher->quantity ?? 0}}
                </td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                  50
                </td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                    {{ $itemDesc->code }}
                </td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                    0001
                </td>   
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                    {{ $itemDesc->description }}
                </td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                    {{ $itemDesc->item_type }}
                </td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                    {{ $conversionVoucher->quantity ?? 0}}
                </td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                    50
                </td>
                <td style="border: 1px solid #000; padding: 5px; font-size: 10px; text-align: center;  font-weight: 600; ">
                    test
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
                        line-height: 18px; width: 100%;
                        font-weight: 600;
                        color: #000;
                        text-align: left; padding-left: 10px;">Authority:________________________
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
                        line-height: 18px; width: 50%;
                        font-weight: 400;
                        color: #000;
                        text-align: left; padding-left: 10px;">Items mentioned at Column No. 4 have been Struck off
                  Charge and <br>
                  Items mentioned at Column No. 10 have been brought on charge
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
                        line-height: 18px; width: 80%;
                        font-weight: 600;
                        color: #000;
                        text-align: left; padding-left: 10px;">Inventory/ICC Holder <br>
                  (Name & Designation.)<br>
                  Date:
                </td>
                <td style="font-size: 16px;
                line-height: 18px; width: 20%;
                font-weight: 600;
                color: #000;
                text-align: left; padding-left: 10px;">O l/c Ledger <br>
                  (Name & Designation.)<br>Date:
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