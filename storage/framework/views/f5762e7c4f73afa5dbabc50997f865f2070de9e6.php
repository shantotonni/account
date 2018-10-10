<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
    #company_header{
        font-size:9px;
    }
    #flight_card{
        font-size:12px;
    }
    #companyinfo{
        clear: both;
    }
    #table_content tr td{
        border: 1px solid black;
    }
    #table_content
    {
        width: 60%;
        font-size:11px;
        margin: 0 auto;


    }
    #table_title{
        text-align: right;
        width: 25%;
    }
    #table_conttent{
        text-align: left;
        width: 75%;
    }
</style>
    <title>Flight Card</title>
</head>

<body>

<div id="company_header">

    <div class="companyinfo" style="text-align: center;">
        <img style="text-align: center;" class="logo_regular" src="<?php echo e(url('uploads/op-logo/logo.png')); ?>" alt="" height="35" width="71"/>
        <div style="line-height:22px;font-size:17px;width: 100%; text-align: center;"><?php echo e($OrganizationProfile->company_name); ?></div>
        <div><?php echo e($OrganizationProfile->street); ?>,<?php echo e($OrganizationProfile->city); ?>,<?php echo e($OrganizationProfile->state); ?>,<?php echo e($OrganizationProfile->country); ?></div>

        <div style=""><?php echo e($OrganizationProfile->email); ?>,<?php echo e($OrganizationProfile->contact_number); ?></div>

        <div id="flight_card" style="margin-top: 10px; text-transform: uppercase; text-decoration: underline; font-weight: 600;  font-family: Arial, Verdana, sans-serif"> Flight Card</div>
    </div>

    <div  style="margin-top: 10px; width: 100%">
        <table id="table_content" cellspacing="0" cellpadding="5">
               <tr>
                   <td id="table_title">Passenger Name :</td>
                   <td id="table_conttent"> <?php echo e($flightcard->paxId['passenger_name']); ?></td>
               </tr>

               <tr>
                   <td id="table_title">Pax Id: </td>
                   <td id="table_conttent"> <?php echo e($flightcard->paxId['paxid']); ?> </td>
               </tr>
               <tr>
                   <td id="table_title">Passport Number :</td>
                   <td id="table_conttent"><?php echo e($flightcard->paxId['passportNumber']); ?> </td>
               </tr>
               <tr>
                   <td id="table_title">Contact Number :</td>
                   <td id="table_conttent"> <?php echo e(isset($flightcard->paxId->recruit_customer)?$flightcard->paxId->recruit_customer['contact_number']:''); ?></td>
               </tr>
               <tr>
                   <td id="table_title">Reference Name: </td>
                   <td id="table_conttent"> <?php echo e($flightcard->paxId->customer_id?$flightcard->paxId->customer['display_name']:''); ?></td>
               </tr>
               <tr>
                   <td id="table_title">Expected Date of Flight: </td>
                   <td id="table_conttent"> <?php echo e($flightcard['flightDate']); ?> </td>
               </tr>
       </table>
    </div>

</div>

</body>
</html>