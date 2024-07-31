<!DOCTYPE html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />
<head>

</head>

<body style="background: #fff">

    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
        style="border-radius: 0px; margin: 0 auto">

        <tbody>
            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" cellpadding="0" cellspacing="0" align="center"
                        style="border-bottom: 1px solid #000;">
                        <tbody>
                            <tr>
                                <td style="width: 25%; text-align: left; padding-right: 70px;"> <img
                                        style="width: 35%; padding: 0px 0px 10px 0px;"
                                        src="https://excellis.co.in/rci//public/storage/logo/vdwXoIX2O0liZAlBvYhJBzcLPgg4qYLlrLnmk3Yu.png"
                                        alt=""></td>
                                <td style=" font-size: 16px;
                                line-height: 18px; width: 50%;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 0px 0px 10px 0px;
                                ">
                                    Center For High Energy Systems and Science CHESS
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td style="padding: 20px 0px 0 0">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="top">
                        <tbody>
                            <tr valign="top">
                                <th style=" font-size: 16px;
                                line-height: 18px; width: 33.33%;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 0px 0px 10px 0px;
                                ">
                                    No.<br>
                                    CDA HYDERABAD, <br>
                                    HYDERABAD
                                </th>
                                <th style=" font-size: 16px;
                                line-height: 18px; width: 33.33%;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                padding: 0px 0px 10px 0px;
                                ">

                                    PRIORITY
                                </th>
                                <th style=" font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000; width: 33.33%;
                                text-align: left;
                                padding: 0px 0px 10px 0px;
                                ">

                                    Unit Code (युनिट कोड): 330000110 <br>
                                    Proj. Name (परीयोजना का नाम): <?php echo e($project->name); ?> <br>
                                    Bill No (विल): <?php echo e($tadaAdv->bill_no); ?><br>
                                    Indent No: 20<?php echo e(time()); ?> <br>
                                    MO No: BUO20<?php echo e(time()); ?> <br>
                                    Date (तारीख): <?php echo e(date('jS F, Y')); ?>

                                </th>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td style="font-size: 16px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 30px 5px 0px 5px
                ">
                    Requisition for Advance
                </td>
            </tr>
            <tr>
                <td style="font-size: 16px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 30px 5px 0px 5px
                ">
                    Received from the Jt. controller of defence accounts, the sum of <span
                        style="text-decoration: underline;">Rs. <?php echo e($tadaAdv->amount_allowed); ?> <?php echo e(\App\Helpers\Helper::convert($tadaAdv->amount_allowed)); ?>

                    </span> on account of TA/DA in respect of Designation <?php echo e($member['desigs']->designation); ?> while proceeding on
                    temporary duty to <?php if($data->count() > 0): ?> <?php echo e($data[0]->from_location); ?> <?php endif; ?> ete vide this establishment movement order No./ BUO20<?php echo e(time()); ?> Dt.
                    <?php echo e(date('jS F,Y',strtotime($tadaAdv->bill_date))); ?>

                </td>
            </tr>
            <tr>
                <td style="font-size: 16px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 10px 5px 0px 5px
                ">
                    (Copy attached with calculation statement) Dept Date: <?php echo e(date('jS F,Y',strtotime($tadaAdv->dept_date))); ?> , Dep Time: <?php echo e(date('jS F,Y',strtotime($tadaAdv->dept_date))); ?>

                </td>
            </tr>

            <tr>
                <td style="padding: 20px 0px 0 0">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="top">
                        <tbody>
                            <tr valign="top">
                                <th style=" font-size: 16px;
                                line-height: 18px; width: 33.33%;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 0px 0px 10px 0px;
                                ">
                                    Employee Bank Details:<br>
                                    <?php if($memberInfo): ?>
                                        <?php
                                            $bank = DB::table('banks')->where('id',$memberInfo->bank)->get()->first();
                                        ?>
                                        Bank Name:  <?php if(isset($bank)): ?> <?php echo e($bank->bank_name); ?> <?php endif; ?> <br>
                                    <?php endif; ?>

                                    Bank IFSC Code: <?php if($memberInfo): ?> <?php echo e($memberInfo->ifsc); ?> <?php endif; ?><br>
                                    Account Number: <?php if($memberInfo): ?> <?php echo e($memberInfo->bank_acc_no); ?> <?php endif; ?>
                                </th>
                                <th style=" font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000; width: 33.33%;
                                text-align: right;
                                padding: 0px 0px 10px 0px;
                                ">

                                    Signature (हस्ताक्षर)<br>
                                    (PIS NO: 2004AC1214) <br>
                                    <?php echo e($member['desigs']->designation); ?><br>
                                    Pay Level: <?php if($memberPerInfo): ?> <?php echo e($memberPerInfo->pm_level); ?> <?php endif; ?> <br>
                                    PAN Νo.: <?php if($memberInfo): ?> <?php echo e($memberInfo->pan_no); ?> <?php endif; ?> <br>

                                </th>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>

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


                                </th>
                                <th style=" font-size: 16px;
                                line-height: 18px; width: 33.33%;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                padding: 10px 0px 10px 0px;
                                ">
                                    Countersigned. <br>
                                    Mr. D. MADHU SUDAN REDDY <br>
                                    ACCOUNTS OFFICER <br>

                                </th>
                                <th style=" font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000; width: 33.33%;
                                text-align: center;
                                padding: 0px 0px 10px 0px;
                                ">


                                </th>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
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


                                </th>
                                <th style=" font-size: 16px;
                                line-height: 18px; width: 33.33%;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                padding: 10px 0px 10px 0px;
                                ">
                                    Advance for temporary duty in respect of <?php echo e($member->name); ?> <?php echo e($member['desigs']->designation); ?>


                                </th>
                                <th style=" font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000; width: 33.33%;
                                text-align: center;
                                padding: 0px 0px 10px 0px;
                                ">


                                </th>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td style="font-size: 16px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 30px 5px 0px 5px
                ">
                    Details of Expenditure
                </td>
            </tr>

            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr style=" border: 1px solid black;">
                                <th style=" border: 1px solid black; text-align: left; padding: 0 10px;">Recoupment bill on account TA/DA advance in R/O
                                    <br>
                                    <?php echo e($member->name); ?>

                                    <?php echo e($member['desigs']->designation); ?>

                                    alongwith movement order is submitted <br>
                                    herewith as per details given below:
                                </th>
                                <th style=" border: 1px solid black;">Food Details</th>
                                <th style=" border: 1px solid black;">Hotel Details.</th>
                                <th style=" border: 1px solid black;">Total DA</th>
                                <th style=" border: 1px solid black;">Ticket Amount</th>
                            </tr>
                            <?php
                                $totalDA = 0;
                            ?>
                            <?php if($data): ?>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php
                                    $totalDA= $totalDA+$val->total_da;
                                ?>
                                <tr>
                                    <td style=" border: 1px solid black; padding: 0 10px;"><?php echo e($val->from_location); ?> TO <?php echo e($val->to_location); ?>

                                    </td>
                                    <td style=" border: 1px solid black; padding: 0px 5px 0px 5px;"><?php echo e($val->food_day); ?> DAYS@ <?php echo e($val->food_amount); ?></td>
                                    <td style=" border: 1px solid black; padding: 0px 5px 0px 5px;"><?php echo e($val->hotel_day); ?> DAYS@ <?php echo e($val->hotel_amount); ?></td>
                                    <td style=" border: 1px solid black; padding: 0px 5px 0px 5px;"><?php echo e($val->total_da); ?></td>
                                    <td style=" border: 1px solid black; padding: 0px 5px 0px 5px;"><?php echo e($val->total_da); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>



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
                                text-align: left;">Total DA: <?php echo e($totalDA); ?> Total TA: <?php echo e($tadaAdv->amount_allowed); ?> <br> <br>
                                Total: (DA+TA) Rs. <?php echo e($tadaAdv->amount_allowed); ?> <br>


                                Grand Total: Rs. <?php echo e($tadaAdv->amount_allowed); ?> <br>
                                Amount in words: <?php echo e(\App\Helpers\Helper::convert($tadaAdv->amount_allowed)); ?> <br> <br>
                                End:
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
<?php /**PATH C:\xampp53\htdocs\RCI\resources\views/frontend/member-info/tada-advance/report-priority.blade.php ENDPATH**/ ?>