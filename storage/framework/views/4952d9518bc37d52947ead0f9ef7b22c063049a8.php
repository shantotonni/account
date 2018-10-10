<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Visa Acceptance </title>
    <style>
        .flex-container {
            display: -webkit-flex;
            display: flex;
            width: 750px;
            height: auto;
            margin:0 auto;
            text-transform:uppercase;

        }
        .flex-item {
            width: 30%;
            margin: 1px;
        }

        .flex-item-2 {

            width: 50%;
        }

        .flex-item-3 {
            width: 50%;
            margin-left: 300px;
            margin-top: -20px;
        }
        .padding {
            padding:15px 0px;
        }
        table tr td{
          border:none;
        }

    </style>
</head>

<body style="font-family: freeserif;">
<?php $Reference = app('App\Lib\Helpers'); ?>
<div>
    <div id="testdiv">
        <div class="flex-container" style=" padding: 20px 0px; line-height:3px;">
            <div style="width:20%"><img height="80" width="80" src="<?php echo e(asset('uploads/op-logo/'.$logo->logo)); ?>" /></div>
            <div style="width:80%;text-align:center; float: left; margin-left: 100px; margin-top: -85px; line-height: 25px; ">
                <span style="font-size:30px;"> <?php echo e($company_info->companyNameEN); ?> </span>
                <div style="font-size:15px; background-color: #e5e5e5 "> Government Approved Recruitment License No. <?php echo e($company_info->licenceEN); ?> </div>
                <div style="line-height: 15px;"> <?php echo e($company_info->addressEN); ?> </div>

                <div  style="line-height: 20px;">Phone: <?php echo e($logo->contact_number); ?></div>

                <div style="font-size: 30px; padding: 10px;"> <span style="background-color: #e5e5e5 ; padding: 20px;">&nbsp; Visa Acceptance &nbsp;</span></div>
            </div>

        </div>


        <div class="flex-container padding">
            <div class="flex-item-2" >  </div>
            <div class="flex-item-3" style="text-align: right"> <span style="text-align: right; padding:0px 50px;">Date: &nbsp;<?php echo e($visa->visaentry->date); ?></span>&nbsp;</div>

        </div>

        <div class="flex-container padding">
            <div>Local Reference : &nbsp; &nbsp;<?php echo e($Reference->getReference($visa->visaentry->local_Reference)); ?> .</div>
        </div>
        <div class="flex-container padding">
            <div class="flex-item-2" >Visa Number :&nbsp; <?php echo e($visa->visaentry->visaNumber); ?>  &nbsp;</div>
            <div class="flex-item-3"> <span style="text-align: left; padding:0px 50px;">&nbsp;Visa Issue Date : &nbsp;<?php echo e($visa->visaentry->visaIssuedate); ?></span>&nbsp;</div>

        </div>

        <div class="flex-container padding">
            <div >Company Name : &nbsp;&nbsp;<?php echo e($Reference->getCompanyname($visa->visaentry->company_id)); ?></div>


        </div>
        <div class="flex-container padding">
            <div class="flex-item-2" >Number Of Visa: &nbsp; <?php echo e($visa->visaentry->numberofVisa); ?> .</div>
            <div class="flex-item-3"> <span style="text-align: left; padding:0px 50px;"> &nbsp; Destination: &nbsp; <?php echo e($visa->visaentry->destination); ?> .</span>&nbsp;</div>

        </div>

        <div class="flex-container">
            <div>Register Serial:   &nbsp;&nbsp;  <?php echo e($visa->visaentry->registerSerial); ?> .</div>
        </div>

        <div class="flex-container " style="padding-top: 30px;">
            <div>Passenger Details:   &nbsp;&nbsp;  </div>
        </div>
        <div class="flex-container">
            <table style="width: 100%; text-align: center" border="1">
                <tr style="background-color: #e5e5e5 ;">
                    <td> Serial </td>
                    <td> Pax Id</td>
                    <td> Name</td>
                    <td> Address</td>
                    <td> Phone Number</td>
                </tr>
               <?php $__currentLoopData = $passenger; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td><?php echo e(++$key); ?>  </td>
                    <td> <?php echo e($item->paxid); ?></td>
                    <td> <?php echo e($item->passenger_name); ?></td>
                    <td> <?php echo e($Reference->getCustomerAddress($item->id)); ?> </td>
                    <td> <?php echo e($Reference->getCustomerNumber($item->customer_id)); ?> </td>
                </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </table>
        </div>


        <div class="flex-container" style="padding-top: 30px;">

            <div>Papers:   &nbsp;&nbsp;  </div>
        </div>
        <div class="flex-container">
            <table style="width: 100%;" >
                <tr>
                    <td>
                       1. Visa Advice:  <?php echo e($visa->visaadvice_status? "Ok": "Not Ok"); ?> <br/>
                        Comments: <?php echo e($visa->visaadvice_comment); ?>

                    </td>

                    <td>
                       4. Okala: <?php echo e($visa->okala_status? "Ok": "Not Ok"); ?> <br/>
                        Comments: <?php echo e($visa->okala_comment); ?>

                    </td>

                </tr>

                <tr>
                    <td>
                        2.  Consulator: <?php echo e($visa->consulator_status? "Ok": "Not Ok"); ?> <br/>
                        Comments: <?php echo e($visa->consulator_comment); ?>

                    </td>

                    <td>
                        5. Power Of Attorney: <?php echo e($visa->powerofattorny_status? "Ok": "Not Ok"); ?> <br/>
                        Comments: <?php echo e($visa->powerofattorny_comment); ?>

                    </td>

                </tr>
                <tr>
                    <td>
                        3. Botaka : <?php echo e($visa->botaka_status? "Ok": "Not Ok"); ?> <br/>
                        Comments: <?php echo e($visa->botaka_comment); ?>

                    </td>

                    <td>
                        6 Contact Form: <?php echo e($visa->contactform_status? "Ok": "Not Ok"); ?><br/>
                        Comments: <?php echo e($visa->contactform_comment); ?>

                    </td>

                </tr>


            </table>
        </div>
        <div class="flex-container padding">
            <div style="width:100%; text-transform:uppercase; font-size:15px;" >
                Total Passenger Charge: <input type="text" size="50" value="<?php echo e($Reference->getBillAmount($visa->visaentry->bill_id)); ?>">
            </div>

        </div>

        <div class="flex-container">
            <div style="width:100%; text-transform:uppercase; font-size:15px;" >
                In Word:&nbsp;&nbsp; <?php echo e($Reference->getBillAmount_in_word($visa->visaentry->bill_id)); ?> .
            </div>

        </div>
        <br/>
        <br/>

        <br/>

        <br/>
        <br/>     <br/>




        <div class="flex-container" >
            <div class="flex-item-2" ></div>
            <div class="flex-item-3" style="text-align: right">
                <span style="text-align: right; padding:0px 50px; text-decoration: overline">Acceptor </span>&nbsp;

            </div>

        </div>
    </div>
</div>


</body>

</html>