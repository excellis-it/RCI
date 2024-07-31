<!DOCTYPE html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />

<body style="background: #fff">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
    style="border-radius: 0px; margin: 0 auto; text-align: center">
    <tbody>
      <tr>
        <td style="padding: 0 0px">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
            <tbody>
              <tr>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                    Center Setence Chess
                </td>
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
                <td style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    ">
               Center for High Energy Systems & Sciences, Hyderabad<br>

                </td>
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
                <td style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    ">
               Bill No. :<?php echo e($tadaAdv->bill_no); ?>


                </td>
                <td style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    ">
               Bill Date : <?php echo e(date('jS F, Y',strtotime($tadaAdv->bill_date))); ?>


                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td style="height: 20px;"></td>
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
                                Sr No.
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
                                From
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
                                To
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
                                Dep. Date/Time
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
                                Dist in Km
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
                                Conveynce Mode
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
                                Arrival Date/Time
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
                                    text-transform: uppercase;
                                    ">
                                Amount
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
                                    border-right: 1px solid #000;
                                    text-transform: uppercase;
                                    ">
                                Remarks
                                </th>

                            </tr>



            </thead>
            <tbody>

            <?php if($data): ?>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                <?php echo e($key+1); ?>

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
              <?php echo e($val->from_location); ?>

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
             <?php echo e($val->to_location); ?>

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
                <?php echo e(date('jS F, Y h:ia',strtotime($val->dep_datetime))); ?>

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
                <?php echo e($val->distance); ?>

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
                <?php echo e($val->con_mode); ?>

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
                <?php echo e(date('jS F, Y h:ia',strtotime($val->arrival_datetime))); ?>

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
                border-bottom: 1px solid #000;
                border-left: 1px solid #000;
              ">
                 <?php echo e($val->amount); ?>

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
                border-bottom: 1px solid #000;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                width: 150px;
              ">
                 <?php echo e($val->remark); ?>

                </td>
              </tr>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endif; ?>





            </tbody>
          </table>
        </td>
      </tr>

    </tbody>
  </table>
</body>

</html>
<?php /**PATH C:\xampp82\htdocs\RCI\resources\views/frontend/member-info/tada-advance/report-journey.blade.php ENDPATH**/ ?>