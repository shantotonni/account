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

    <style>

        td{
            border: 1px solid;
            text-align: center;
        }


    </style>

</head>
<body style="font-family: freeserif; font-size: 10pt;">



<div role="main" >

    <div class="app" style="padding-top: 100px">
        <p style="font-weight: 400;font-size: 20px">তারিখঃ
            <?php
            $currentDate =  $basis[0]->dateOfApplication;
            $engDATE = array(1,2,3,4,5,6,7,8,9,0,January,February,March,April,May,June,July,August,September,October,November,December,Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday);
            $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
বুধবার','বৃহস্পতিবার','শুক্রবার'
            );
            $convertedDATE = str_replace($engDATE, $bangDATE, $currentDate);
            echo "$convertedDATE";
            ?>

        </p>
        <p style="font-weight: 400;font-size: 20px">বরাবর</p>
        <p style="font-weight: 400;font-size: 20px;margin-left: 40px;padding: 0;line-height: 12px">প্রেসিডেন্ট</p>
        <p style="font-weight: 400;font-size: 20px;margin-left: 40px ;padding: 0;line-height: 12px">গামকা</p>
        <p style="font-weight: 400;font-size: 20px;margin-left: 40px ;padding: 0;line-height: 12px">২৫০৫/২৫০৬ মাদানি এভিনিউ</p>
        <p style="font-weight: 400;font-size: 20px;margin-left: 40px ;padding: 0;line-height: 12px">ভাটারা, (১০০ ফিটরাস্তা) ঢাকা-১২১২</p>
        <p style="font-weight: 400;font-size: 20px">বিষয়ঃ মেডিকেল স্লিপের জন্য আবেদন </p>
        <p style="font-weight: 400;font-size: 20px">জনাব,</p>
        <div class="content">
            <p style="font-size: 20px">নিম্নলিখিত, <?php echo $basis[0]->country_name; ?>  আরবগামী ইচ্ছুক যাত্রীদের স্বাস্থ্যগত পরীক্ষা নিশ্চিত করার লক্ষ্যে আপনার দপ্তর থেকে প্রয়োজনীয় মেডিকেল স্লিপ প্রদান এর জন্য বিনীত অনুরোধ করছি ।
            </p>
        </div>

        <br>
        <table class="table table-bordered">
            <thead>
            <tr style="text-align: center">
                <td style="height: 40px;text-align: center;font-size: 17px">ক্রমিক নং </td>
                <td style="height: 40px;text-align: center;font-size: 17px">যাত্রীর নাম</td>
                <td style="height: 40px;text-align: center;font-size: 17px">পাসপোর্ট নাম্বার</td>

            </tr>
            </thead>
            <?php
            $i=1;
            ?>
            <tbody>
            <?php $__currentLoopData = $basis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td style="height: 40px;font-size: 17px"><?php echo $i++; ?></td>
                    <td style="font-size: 17px"><?php echo $value->display_name; ?></td>
                    <td style="font-size: 17px"><?php echo $value->passportNumber; ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tbody>
        </table>
        <br>

        <div class="content">
            <p style="font-size: 20px">
                উল্লেক্ষ্য ,উপরোক্ত যাত্রীদের ভিসা প্রাপ্তির প্রক্রিয়া সম্পন্ন করার জন্য মেডিকেল স্লিপ প্রয়োজন সুতরাং ভিসা সংক্রান্ত সকল দায় দায়িত্ব আমাদের।
            </p>
        </div>
        <br>

        <h4>ধন্যবাদান্তে</h4>

        <h4> <h4><?php echo $formbasis->ownerNameBN; ?></h4></h4>
        <h4> <h4><?php echo $formbasis->ownerDesignationBN; ?></h4></h4>
        <h4> <h4><?php echo $formbasis->companyNameBN; ?></h4></h4>

    </div>

</div> <!-- /container -->

</body>
</html>