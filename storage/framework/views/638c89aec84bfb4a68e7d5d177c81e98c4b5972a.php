<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
    <style>


    </style>

</head>
<body style="font-family: freeserif; font-size: 10pt;">

<div role="main" class="container">
    <div class="row">
        <div class="col-md-4">
            <img style="width: 60px;height: 60px;padding-top: -10px" src="<?php echo asset('uploads/op-logo/'.$logo->logo); ?>" alt="">
        </div>
        <div class="col-md-8" style="text-align: center;padding-top: -70px">
            <h1 style="font-weight: 900;text-transform: uppercase;"><?php echo isset($frombasis->companyNameEN) ? $frombasis->companyNameEN:''; ?></h1>
            <h4 style="font-weight: 400;text-transform: uppercase">(processing report)</h4>
        </div>
    </div>
    <div class="container">
        <div class="row" style="margin: 0;padding: 0">
            <div style="margin: 0;padding: 0">
                <p style="margin: 0;padding: 0;text-transform: uppercase">rsl:<?php echo isset($visaentry->registerSerial) ? $visaentry->registerSerial:''; ?></p>
                <p style="margin: 0;padding: 0;text-transform: uppercase">rsl:<?php echo isset($visa->date )? $visa->date:''; ?></p>
            </div>
            <div style="margin: 0;padding-top: -40px;margin-right: 100px">
                <p style="margin: 0;padding: 0;text-align: right;text-transform: uppercase">vls no: <?php echo isset($visa->vls_number) ? $visa->vls_number:''; ?></p>
                <p style="margin: 0;padding: 0;text-align: right;text-transform: uppercase">group: <?php echo isset($customer->group) ? $customer->group:''; ?></p>
                <p style="margin: 0;padding: 0;text-align: right;text-transform: uppercase">sect: <?php echo isset($visaentry->iqamaSector) ? $visaentry->iqamaSector:''; ?></p>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-md-4">
                <h5 style="text-transform: uppercase;font-size: 13px">name: <?php echo isset($recruit->passenger_name) ? $recruit->passenger_name:''; ?></h5>
                <h5 style="text-transform: uppercase;font-size: 13px">father's name:<?php echo isset($customer->fatherName) ? $customer->fatherName:''; ?> </h5>
                <h5 style="text-transform: uppercase;font-size: 13px">visa no: <?php echo isset($visaentry->visaNumber) ? $visaentry->visaNumber:''; ?> </h5>
                <h5 style="text-transform: uppercase;font-size: 13px">date of visa receving: <?php echo isset($visaentry->visaIssuedate) ? $visaentry->visaIssuedate:''; ?></h5>
                <h5 style="text-transform: uppercase;font-size: 13px">local ref: <?php echo isset($local->first_name) ? $local->first_name:''; ?>,<?php echo isset($local->last_name) ? $local->last_name:''; ?></h5>
                <h5 style="text-transform: uppercase;font-size: 13px">local ref (phone): <?php echo isset($local->phone_number_1) ? $local->phone_number_1:''; ?></h5>

            </div>
            <div class="col-md-4" style="padding-left: 370px;padding-top: -165px">
                <h5 style="text-transform: uppercase;font-size: 13px">p.p. no: <?php echo isset($recruit->passportNumber) ? $recruit->passportNumber:''; ?></h5>
                <h5 style="text-transform: uppercase;font-size: 13px">profession: <?php echo isset($customer->professionEn) ? $customer->professionEn:''; ?></h5>
                <h5 style="text-transform: uppercase;font-size: 13px">phone no.of sponsor:</h5>
                <h5 style="text-transform: uppercase;font-size: 13px">foreign ref:<?php echo isset($company->name) ? $company->name:''; ?></h5>
                <h5 style="text-transform: uppercase;font-size: 13px">foreign ref (phone): </h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h5 style="text-transform: uppercase;font-size: 13px">1. sub.dt to emb.(for profe): <?php echo isset($visaentry->submissionDate) ? $visaentry->submissionDate:''; ?></h5>
                <h5 style="text-transform: uppercase;font-size: 13px">3. submit dt.to gamca: <?php echo isset($gamca->submission_date) ? $gamca->submission_date:''; ?></h5>
                <h5 style="text-transform: uppercase;font-size: 13px">5. p.p. receving date: <?php echo isset($recruit->passportissuedate) ? $recruit->passportissuedate:''; ?> </h5>
                <h5 style="text-transform: uppercase;font-size: 13px">7. medical fit/unfit:dt:
                    <?php if(isset($medicalslip->status)): ?>
                    <?php if($medicalslip->status==0): ?>
                        UnFit
                        <?php else: ?>
                    Fit
                    <?php endif; ?>
                        <?php endif; ?>
                </h5>
                <h5 style="text-transform: uppercase;font-size: 13px">13. b.m.e.t. clearence dt:<?php echo isset($manpower->receivingDate) ? $manpower->receivingDate:''; ?></h5>

            </div>
            <div class="col-md-6" style="padding-left: 370px;padding-top: -140px">
                <h5 style="text-transform: uppercase;font-size: 13px">2. delivery dt: </h5>
                <h5 style="text-transform: uppercase;font-size: 13px">6. date of medical test: <?php echo isset($medicalslip->testdate) ? $medicalslip->testdate:''; ?></h5>
                <h5 style="text-transform: uppercase;font-size: 13px">8. medical report date: <?php echo isset($medicalslip->reportdate) ? $medicalslip->reportdate:''; ?></h5>
                <h5 style="text-transform: uppercase;font-size: 13px">10.sub.dt.from emb(stamping):</h5>
                <h5 style="text-transform: uppercase;font-size: 13px">12.sub.dt.from bmet(stamping): <?php echo isset($manpower->issuingDate) ? $manpower->issuingDate:''; ?></h5>
                <h5 style="text-transform: uppercase;font-size: 13px">15. flight date:<?php echo isset($flight->flightDate) ? $flight->flightDate:''; ?></h5>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th colspan="2" style="border-right: none;text-transform: uppercase ">service charge</th>
                <th colspan="3" style="border-right: none;text-align: center;text-transform: uppercase">ldr.page no</th>
            </tr>
            <tr>
                <th>Date</th>
                <th>Particulars</th>
                <th>Folio/rct.no</th>
                <th>Amount</th>
                <th>total</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $temptotal=isset($invoice->total_amount)?$invoice->total_amount:0;
            ?>
            <?php $__currentLoopData = $payrecentry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php 

                    $amount=$value->amount;
                    $temptotal=($temptotal-$amount);

                 ?>
            <tr>
                <td><?php echo $value->created_at->toDateString(); ?></td>
                <td><?php echo $value->paymentReceive->note; ?></td>
                <td>PR-<?php echo decbin($value->id); ?></td>
                <td><?php echo $amount; ?></td>
                <td><?php echo $temptotal; ?></td>
            </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

            </tbody>
        </table>

        <div class="row">
            <div class="col-md-6">
                <p style="text-transform: uppercase;font-weight: 900;">account's section</p>
                <p style="text-transform: uppercase;font-weight: 900;margin-top: 30px;text-decoration: overline">signature</p>
            </div>
            <div class="col-md-6" style="text-align: right;padding-top: -80px;margin: 0">
                <p style="text-transform: uppercase;font-weight: 900;">proprietor</p>
                <p style="text-transform: uppercase;font-weight: 900;margin-top: 30px;text-decoration: overline">signature</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p style="text-transform: uppercase;font-weight: 900;">remarks(if any): <?php echo $visa->remarks; ?></p>
            </div>
        </div>
    </div>

</div> <!-- /container -->

</body>
</html>