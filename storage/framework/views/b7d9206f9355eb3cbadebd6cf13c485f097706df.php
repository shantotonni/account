<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">


</head>
<body style="font-family: freeserif; font-size: 10pt;">



<div role="main" style="padding-top: 200px">

    <div class="potro_1">
        <h2 style="text-align: center;text-decoration: underline;">অভিভাবকের অনাপত্তি পত্র</h2>
        <br>
        <br>
        <br>
        <div class="content">
            <p style="line-height: 50px;font-size: 20px;">আমি নিম্ন স্বাক্ষরকারী জনাব, <?php echo $customer->passengerNameBN; ?>, <?php echo $customer->addressBN; ?> ধর্মঃ <?php echo $customer->religionBN; ?>

                <br>
              উল্লেখ্য যে , <?php echo $customer->passengerNameBN; ?> ,<?php echo $customer->relationWithCustomer_1; ?>: <?php echo $customer->guardianName; ?> অনাপত্তি পত্র দাখিল করেছেন।
            </p>
        </div>

    </div>

    <div class="potro_1" style="padding-top: 500px">
        <h2 style="text-align: center;text-decoration: underline;">পাতা / ০২</h2>
        <br>
        <br>
        <br>
        <div class="content">
            <p style="line-height: 20px;line-height: 50px;font-size: 20px;">
                আমি ঘোষনা করিতেছি যে , আমার <?php echo $customer->relationWithCustomer_2; ?>:<?php echo $customer->passengerNameBN; ?> বেগম পাসপোর্ট নং <?php echo $customer->passportNumberBN; ?> <?php echo $customer->destination; ?> নিয়োগকর্তা <?php echo $contact->company_name; ?> এর অধীনে <?php echo $customer->professionBn; ?> হিসাবে চাকুরী নিয়ে <?php echo $customer->destination; ?> গমন করলে আমার কোন ধরনের আপত্তি নাই বা থাকিবে না।
            </p>
        </div>

    </div>


    <div class="potro_1" style="padding-top: 300px">
        <h2 style="text-align: center;text-decoration: underline;">পাতা / ০৩</h2>
        <br>
        <br>
        <br>
        <div class="content">
            <p style="line-height: 50px;font-size: 20px;">
                আমি আরও ঘোষনা করিতেছি যে , ভবিষ্যতে আমার <?php echo $customer->relationWithCustomer_2; ?> কে <?php echo $customer->destination; ?> প্রেরনের জন্য রি/এজেন্সির বিরুদ্ধে কোনরূপ আপত্তি তুলিব না। আমি স্বেচ্ছায় বিনা প্ররোচনায় নিম্নে স্বাক্ষর করিলাম।
            </p>
        </div>
        <br>
        <br>

        <h4 style="text-decoration: underline">অভিভাবকের স্বাক্ষর</h4>
        <br>
        <br>
        <br>

        <h4>নাম        : <?php echo $customer->guardianName; ?></h4>
        <h4>পিতার নাম  : <?php echo $customer->guardianFatherName; ?> </h4>
        <h4>ঠিকানা      : <?php echo $customer->guardianAddressBN; ?>, ধর্ম : <?php echo $customer->guardianReligion; ?> </h4>

    </div>

</div> <!-- /container -->


</body>
</html>