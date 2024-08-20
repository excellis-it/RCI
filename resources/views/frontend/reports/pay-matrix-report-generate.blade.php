<!DOCTYPE html>
<html lang="en">

<style>
    @page {
        size: 29.7cm 42cm
    }
</style>

<body>
    <h2 style="
    font-size: 18px;
    line-height: 22px;
    font-weight: 600;
    color: #000;
    text-align: center;
    padding: 0px 5px !important;
    margin: 0px 0px !important;
    text-transform: uppercase;
  ">Table 5: Pay Matrix (Civilian Employees)</h2>
    <table style="width:100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
        <tr>
            <th style="border-top: 1px solid #000; border-left: 1px solid #000;border-right: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">Pay Band</th>
            @foreach($pay_bands as $pay_band)
            @php 
                $colspan = $pay_level_counts[$pay_band->id] ?? 1;
            @endphp
            <th colspan="{{ $colspan }}" style="border-top: 1px solid #000; border-right: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">  @if($pay_band->low_band !='') {{ $pay_band->low_band ?? 0}} - @endif {{ $pay_band->high_band ?? 0 }}</th>
            @endforeach
            {{-- <th colspan="5" style="border-top: 1px solid #000; border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">5200-20200</th>
            <th colspan="4" style="border-top: 1px solid #000; border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">9300-34800</th>
            <th colspan="3" style="border-top: 1px solid #000; border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">15600-39100</th>
            <th colspan="3" style="border-top: 1px solid #000; border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">37400-67000</th>
            <th style="border-top: 1px solid #000; border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">67000-79000</th>
            <th style="border-top: 1px solid #000; border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">75500-80000</th>
            <th style="border-top: 1px solid #000; border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">80000</th>
            <th style="border-top: 1px solid #000; border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">90000</th> --}}
        </tr>
        <tr>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">Grade Pay</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">1800</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">1900</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">2000</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">2400</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">2800</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">4200</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">4600</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">4800</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">5400</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">5400</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">6600</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">7600</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">8700</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">8900</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">10000</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
        </tr>
        <tr>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">Entry Pay (EP)</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">7000</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">7730</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">8460</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">9910</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">11360</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">13500</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">17140</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">18150</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">20800</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">21000</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">25350</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">29500</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">46100</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">49100</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">53000</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">67000</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">75500</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">80000</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">90000</th>
            
        </tr>
        <tr>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">Level</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">1</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">2</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">3</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">4</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">5</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">6</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">7</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">8</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">9</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">10</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">11</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">12</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">13</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">13A</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">14</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">15</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">16</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">17</th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">18</th>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">Index</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">2.57</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">2.57</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">2.57</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">2.57</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">2.57</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">2.62</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">2.62</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">2.62</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">2.62</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">2.67</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">2.67</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">2.67</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">2.57</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">2.67</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">2.72</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">2.72</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">2.72</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">2.81</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">2.78</td>
        </tr>
        <!-- Table rows start here -->
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">1</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">18000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">19900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">21700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">25500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">29200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">35400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">44900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">47600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">53100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">56100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">67700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">78800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">118500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">131100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">144200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">182200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">205400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">225000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">250000</td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">2</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">18500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">20500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">22400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">26300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">30100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">36500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">46200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">49000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">54700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">57800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">69200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">81200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">122100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">135000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">148500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">187700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">211600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;"></td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;"></td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">3</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">19100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">21100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">23100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">27100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">31000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">37600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">47600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">50500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">56300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">59500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">71800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">83600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">125800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">139100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">153000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">193300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">217900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;"></td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;"></td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">4</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">19700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">21700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">23800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">27900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">32900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">38700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">49000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">53100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">58000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">61300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">74000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">86100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">129600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">143300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">157600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">199100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">224400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;"></td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;"></td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">5</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">20300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">22400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">24500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">28700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">33000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">39900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">50500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">55000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">60000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">63300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">76200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">88700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">133500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">147600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">163200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">201500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;"></td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;"></td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;"></td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">6</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">20900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">23100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">25200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">29600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">41100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">52000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">56200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">61500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">66000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">70500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">78500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">91400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">137500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">152600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">167200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">211300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;"></td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;"></td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;"></td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">19</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">30600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">34000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">37200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">43500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">49600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">60400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">76500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">81200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">90000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">95200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">115500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">134300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">198300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">218800</td>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">20</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">31500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">35000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">38300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">44800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">51100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">62200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">78800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">83600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">92700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">98000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">119000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">138300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">201500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">220700</td>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">21</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">32400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">36100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">39400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">46100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">52600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">64100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">81200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">86100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">95500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">101400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">122600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">142400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">214100</td>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">22</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">33400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">37200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">40600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">47500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">54200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">66000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">83600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">88700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">98400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">104800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">126300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">146700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">220000</td>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">23</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">34400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">38400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">41800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">49000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">55800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">68000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">86100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">91400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">101400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">108200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">130200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">151100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">226300</td>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">24</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">35400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">39600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">43100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">50500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">57500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">70000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">88700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">94100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">104400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">111700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">134200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">155600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">232900</td>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">25</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">36500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">40900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">44400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">52000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">59300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">72100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">91400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">96900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">107500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">115300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">138400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">160300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">239600</td>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">26</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">37600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">42200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">45700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">53600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">61100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">74300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">94100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">99800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">110700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">119000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">142700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">165100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">246500</td>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">27</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">38700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">43600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">47100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">55200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">63000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">76500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">96900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">102800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">114000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">122800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">147100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">170100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">253600</td>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">28</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">39900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">45000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">48500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">56900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">64900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">78800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">99800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">106000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">117400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">126700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">151700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">175200</td>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">29</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">41100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">46500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">50000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">58600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">66900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">81200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">102800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">109300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">120900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">130700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">156400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">180400</td>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">30</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">42300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">48000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">51500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">60400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">68900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">83600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">105900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">112700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">124500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">134800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">161200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">185700</td>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">31</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">43600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">49500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">53000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">62200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">71000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">86100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">109100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">116200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">128200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">139100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">166100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">191100</td>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">32</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">44900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">51100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">54600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">64100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">73100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">88700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">112400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">119800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">132000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">143400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">171100</td>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">33</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">46200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">52800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">56200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">66100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">75300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">91400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">115800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">123500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">135900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">147800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">176200</td>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">34</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">47600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">54500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">57800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">68100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">77600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">94100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">119300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">127300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">139900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">152300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">181400</td>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">35</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">49000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">56200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">59500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">70200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">79900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">96900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">122900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">131100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">144000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">156900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">186700</td>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">36</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">50500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">58000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">61200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">72300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">82300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">99800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">126600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">135000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">148200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">161600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">192200</td>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">37</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">52000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">59900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">63000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">74500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">84800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">102800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">130400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">139100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">152500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">166400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">197800</td>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">38</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">53600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">61700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">64800</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">76700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">87300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">105900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">134300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">143300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">156900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">171400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">203600</td>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">39</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">55200</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">63600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">66600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">79000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">89900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">109100</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">138300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">147600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">161400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">176500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">209500</td>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">40</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">56900</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">65600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">68500</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">81300</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">92600</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">112400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">142400</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">152000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">166000</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">181700</td>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">215500</td>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;"></th>
        </tr>
    </table>
</body>