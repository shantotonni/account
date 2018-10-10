<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <style>
        body{
            text-transform:uppercase;
        }

        table#header tr td {
            text-align: center;
            text-transform:uppercase;
            width: 33%;
            font-size: 12px;
            font-weight: bold;

        }

        table#body tr td {
            text-align: center;
        }
        table#body tr tr:first-child td {
            border-bottom: 1px solid grey;
            padding: 10px;
        }

    </style>
</head>

<body>

<table id="header"  style="width: 100%">
    <tr>
        <td>modele serial</td>
        <td> Agent Billing Details</td>

    </tr>

</table>
<hr  style="height: 2px; color: #0a001f" />
<table id="body" style="width: 100%; text-align: right; vertical-align: top; font-size: 10px;">

    <tr>
        <td style="border-bottom: 1px solid black; padding: 7px;">Serial</td>
        <td style="border-bottom: 1px solid black; padding: 7px;">Passenger<br/>Name</td>
        <td style="border-bottom: 1px solid black;padding: 7px;">Ticket<br/>Number</td>
        <td style="border-bottom: 1px solid black; padding: 7px;">Issue Date</td>
        <td style="border-bottom: 1px solid black; padding: 7px;">Transaction <br/> Amount</td>
        <td style="border-bottom: 1px solid black; padding: 7px;">Fare Amount</td>
        <td style="border-bottom: 1px solid black; padding: 7px; width: 100px;"> <br/>Tax </td>
        <td style="border-bottom: 1px solid black; padding: 7px;"> <br/>Commission Rate </td>
        <td style="border-bottom: 1px solid black; padding: 7px;"> <br/>Amt Rate </td>
        <td style="border-bottom: 1px solid black; padding: 7px;width: 100px;"> Tax on Comm </td>
        <td style="border-bottom: 1px solid black; padding: 7px;"> Balance <br> Payable</td>


    </tr>


    <?php $i=1; ?>
    <?php $__currentLoopData = $ita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>


        <?php echo $total=$value->Ticket_order->sum('amount'); ?>

        <?php echo $total_tax =$total_tax+$total; ?>

        <?php echo $fare= $fare+$value->fareAmount; ?>

        <?php echo $balance=($value->fareAmount)+$total; ?>

        <?php echo $amt=($value->fareAmount)*(($value->commissionRate)/100); ?>

        <?php echo $total_amt = $amt+$total_amt; ?>

        <?php echo $total_tex_com+= $value->taxOnCommission; ?>

        <?php echo $com = $value->taxOnCommission; ?>

        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $value->first_name." ".$value->last_name; ?></td>
            <td><?php echo $value->ticket_number; ?></td>
            <td><?php echo $value->issuDate; ?></td>
            <td><?php echo $balance; ?></td>
            <?php echo $total_trans += $balance; ?>

            <td><?php echo $f= $value->fareAmount; ?></td>
            <?php echo $fare_to_amount+=$f; ?>


            <td width="50px">
                <?php $__currentLoopData = $value->Ticket_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <?php echo $item->amount; ?> <?php echo $item->title; ?><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </td>
            <td><?php echo $value->commissionRate; ?></td>
            <td><?php echo (integer)$amt; ?></td>
            <td>
                - <?php echo (integer)$value->taxOnCommission; ?>

            </td>

            <td> <?php echo (integer)$b=$balance-$amt+$com; ?> </td>
            <?php echo $balance_total+= $b; ?>

        </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <tr >
        <td style="border-top: 1px solid black">Total</td>
        <td style="border-top: 1px solid black"></td>
        <td style="border-top: 1px solid black"></td>
        <td style="border-top: 1px solid black"></td>
        <td style="border-top: 1px solid black"><?php echo e($total_trans); ?></td>
        <td style="border-top: 1px solid black"> <?php echo e($fare_to_amount); ?></td>

        <td style="border-top: 1px solid black" width="50px">
            <?php echo e($total_tax); ?>

        </td>
        <td style="border-top: 1px solid black"></td>
        <td style="border-top: 1px solid black"><?php echo e((integer)$total_amt); ?></td>
        <td style="border-top: 1px solid black">
            <?php echo e((integer)$total_tex_com); ?>

        </td>
        <td style="border-top: 1px solid black">  <?php echo e((integer)$balance_total); ?> </td>
    </tr>

</table>

<?php if(count($ita)==0): ?>
    <div style="padding-top: 50px; ">

        <p style="text-align: center;color: red;">There is no Billing Found</p>
    </div>

<?php endif; ?>

</body>

</html>