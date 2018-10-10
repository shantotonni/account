<?php $__env->startSection('title', 'Report Balance Sheet'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <style>
        @media  print {
            .md-card-toolbar {
                display: none;
            }

            .uk-table tr td {
                padding: 1px 0px;
                border: none !important;
                width: 100%;
                font-size: 11px !important;
            }

            .uk-table tr th {
                padding: 1px 0px;
                border-top: 1px solid black;
                border-bottom: 1px solid black;
                width: 100%;
                font-size: 11px !important;
            }
            body{
                margin-top: -60px;
            }

        }
        table#profit thead tr th:nth-child(odd){
            text-align: left;
            font-size: 18px;
            color: black;
        }
        table#profit thead tr th:nth-child(even){
            text-align: right;
            font-size: 18px;
            color: black;
        }
        table#profit tbody tr td:nth-child(odd){
            text-align: left;
            font-size: 14px;

        }

        table#profit tbody tr td:nth-child(even){
            text-align: right;
            font-size: 14px;


        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content_header'); ?>
    <div id="top_bar">
        <div class="md-top-bar">

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $BalanceSheet = app('App\Lib\BalanceSheet'); ?>
    <?php 
    $BalanceSheet->setDate($start,$end);
     ?>
    <div class="uk-width-medium-10-10 uk-container-center reset-print">
        <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>
            <div class="uk-width-large-10-10">
                <div class="md-card md-card-single main-print">
                    <div id="invoice_preview">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions hidden-print">
                                <i class="md-icon material-icons" id="invoice_print"></i>



                                <!--end  -->
                                <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}" aria-haspopup="true" aria-expanded="true"> <a href="#" data-uk-modal="{target:'#coustom_setting_modal'}"><i class="material-icons">&#xE8B8;</i><span>Custom Setting</span></a>

                                </div>
                                <!--coustorm setting modal start -->
                                <div class="uk-modal" id="coustom_setting_modal">
                                    <div class="uk-modal-dialog">
                                        <?php echo Form::open(['url' => 'report/account/balance/and/sheet', 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'user_profile']); ?>



                                        <div class="uk-width-large-2-2 uk-width-2-2">

                                            <div class="uk-width-large-2-2 uk-width-2-2">
                                                <div class="uk-input-group">
                                                    <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                    <label for="uk_dp_1">To</label>
                                                    <input required class="md-input" type="text" id="uk_dp_1" name="to_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="uk-modal-footer uk-text-right">
                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                                            <button type="submit" name="submit" class="md-btn md-btn-flat md-btn-flat-primary">Search</button>
                                        </div>
                                        <?php echo Form::close(); ?>

                                    </div>
                                </div>
                                <!--end  -->
                            </div>

                            <h3 class="md-card-toolbar-heading-text large" id="invoice_name"></h3>
                        </div>
                        <div class="md-card-content invoice_content print_bg" style="height: 100%;">

                            <div class="uk-grid" data-uk-grid-margin="" >

                                <div class="uk-width-small-5-5 uk-text-center">
                                    <p style="line-height: 5px;" class="uk-text-large"> <?php echo e($OrganizationProfile->display_name); ?></p>
                                    <p style="line-height: 5px;" class="heading_b uk-text-success">Balance Sheet</p>
                                    <p style="line-height: 5px;" class="uk-text-small">From <?php echo e($start); ?>  To <?php echo e($end); ?></p>
                                </div>
                            </div>
                            <div class="uk-grid uk-margin-large-bottom">
                                <div class="uk-width-1-1">
                                    <table id="profit" class="uk-table">



                                        <?php 
                                           $totalcurrentasset= 0;
                                           $total_fixed_assets = 0;
                                           $total_currentLibilities = 0;
                                           $total_longTermLibilities = 0;
                                           $total_currentYearEarning = 0;





                                         ?>
                                        <tbody>
                                        <tr class="uk-text-upper" style="background-color: lightslategray ;text-align: center; color: white !important;">
                                            <th style="color: white; text-align: left;">Asset</th>
                                            <th style="color: white; text-align: right">Total</th>

                                        </tr>
                                        <?php if($current_asset): ?>
                                        <tr style="background-color: #ececec">
                                            <td > Current Asset</td>
                                            <td></td>
                                        </tr>
                                        <?php $__currentLoopData = $current_asset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <?php 
                                                $totalcurrentasset+=$value['total'];
                                             ?>
                                            <tr>
                                                <td > <?php echo e($value['name']); ?></td>
                                                <td><?php echo e($value['total']); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        <?php endif; ?>
                                        <?php if($others_asset): ?>
                                        <tr style="background-color: #ececec">
                                            <td > Other Asset</td>
                                            <td></td>
                                        </tr>
                                        <?php $__currentLoopData = $others_asset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <?php 
                                                $totalcurrentasset+=$value['total'];
                                             ?>
                                            <tr>
                                                <td > <?php echo e($value['name']); ?></td>
                                                <td><?php echo e($value['total']); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                       <?php endif; ?>


                                        <?php if($others_current_asset): ?>
                                            <tr style="background-color: #ececec">
                                                <td > Other Current Asset</td>
                                                <td></td>
                                            </tr>
                                            <?php $__currentLoopData = $others_current_asset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php 
                                                    $totalcurrentasset+=$value['total'];
                                                 ?>
                                                <tr>
                                                    <td > <?php echo e($value['name']); ?></td>
                                                    <td><?php echo e($value['total']); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        <?php endif; ?>
                                        <?php if($cash): ?>
                                        <tr style="background-color: #ececec">
                                            <td > Cash</td>
                                            <td></td>
                                        </tr>
                                        <?php $__currentLoopData = $cash; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <?php 
                                                $totalcurrentasset+=$value['total'];
                                             ?>
                                            <tr>
                                                <td > <?php echo e($value['name']); ?></td>
                                                <td><?php echo e($value['total']); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        <?php endif; ?>

                                        <?php if($bank): ?>
                                            <tr style="background-color: #ececec">
                                                <td > Bank</td>
                                                <td></td>
                                            </tr>
                                            <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php 
                                                    $totalcurrentasset+=$value['total'];
                                                 ?>
                                                <tr>
                                                    <td > <?php echo e($value['name']); ?></td>
                                                    <td><?php echo e($value['total']); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        <?php endif; ?>
                                        <?php if($stock): ?>
                                            <tr style="background-color: #ececec">
                                                <td > Cash</td>
                                                <td></td>
                                            </tr>
                                            <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <?php 
                                            $totalcurrentasset+=$value['total'];
                                             ?>
                                                <tr>
                                                    <td > <?php echo e($value['name']); ?></td>
                                                    <td><?php echo e($value['total']); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        <?php endif; ?>
                                        <tr style="background-color: #ececec;">
                                            <td style="text-align: right"> Total Current Assets</td>
                                            <td> <?php echo e($totalcurrentasset); ?></td>
                                        </tr>

                                        <?php if($FixedAsset): ?>
                                            <tr style="background-color: #ececec">
                                                <td > Fixed Assets</td>
                                                <td></td>
                                            </tr>

                                            <?php $__currentLoopData = $FixedAsset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php 
                                                    $total_fixed_assets+=$value['total'];
                                                 ?>
                                                <tr>
                                                    <td > <?php echo e($value['name']); ?></td>
                                                    <td><?php echo e($value['total']); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        <?php endif; ?>
                                            <?php if($total_fixed_assets>0): ?>
                                            <tr style="background-color: #ececec">
                                                <td style="text-align: right"> Total Fixed Assets</td>
                                                <td> <?php echo e($total_fixed_assets); ?></td>
                                            </tr>
                                           <?php endif; ?>

                                        <tr style="background-color: lightgray">
                                            <td style=" text-align: right; color: black;font-size: 18px;"> Total Assets</td>
                                            <td style="font-size: 18px;"><?php echo e($totalcurrentasset+$total_fixed_assets); ?></td>
                                        </tr>
                                        <tr class="uk-text-upper" style="background-color: lightslategray ;text-align: center; color: white !important;">
                                            <th style="color: white">Liabilities & Equities</th>
                                            <th style="color: white;text-align: right">Total</th>

                                        </tr>
                                        <?php if($currentLibilities): ?>
                                            <tr style="background-color: #ececec">
                                                <td > Current Liabilities </td>
                                                <td></td>
                                            </tr>
                                            <?php $__currentLoopData = $currentLibilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php 
                                                    $total_currentLibilities+=$value['total'];
                                                 ?>
                                                <tr>
                                                    <td > <?php echo e($value['name']); ?></td>
                                                    <td><?php echo e($value['total']); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            <tr style="background-color: #ececec">
                                                <td style="text-align: right"> Total Current Liabilities </td>
                                                <td> <?php echo e($total_currentLibilities); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if($longTermLibilities): ?>
                                            <tr style="background-color: #ececec">
                                                <td > Long Term Liabilities </td>
                                                <td></td>
                                            </tr>
                                            <?php $__currentLoopData = $longTermLibilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php 
                                                    $total_longTermLibilities+=$value['total'];
                                                 ?>
                                                <tr>
                                                    <td > <?php echo e($value['name']); ?></td>
                                                    <td><?php echo e($value['total']); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            <tr style="background-color: #ececec">
                                                <td style="text-align: right"> Total Long Term Liabilities </td>
                                                <td> <?php echo e($total_longTermLibilities); ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if($currentYearEarning || $Totalnetprofit): ?>
                                            <tr style="background-color: #ececec">
                                                <td > Equitiy </td>
                                                <td></td>
                                            </tr>
                                            <tr >
                                                <td > Current Year Earning </td>
                                                <td><?php echo e($Totalnetprofit); ?></td>
                                            </tr>
                                            <?php $__currentLoopData = $currentYearEarning; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php 
                                                    $total_currentYearEarning+=$value['total'];
                                                 ?>
                                                <tr>
                                                    <td > <?php echo e($value['name']); ?></td>
                                                    <td><?php echo e($value['total']); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            <tr style="background-color: #ececec">
                                                <td style="text-align: right"> Total Equitiy </td>
                                                <td> <?php echo e($total_currentYearEarning+$Totalnetprofit); ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <tr style="background-color: lightgray; font-size: 18px; color: black;">
                                            <td style="text-align: right; font-size: 18px;"> Total Liabilities & Equitiy </td>
                                            <td style="font-size: 18px;"> <?php echo e($total_currentLibilities+$total_longTermLibilities+$total_currentYearEarning+$Totalnetprofit); ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <span class="uk-text-muted uk-text-small uk-text-italic">Notes:</span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <!-- handlebars.js -->
    <script src="<?php echo e(url('admin/bower_components/handlebars/handlebars.min.js')); ?>"></script>
    <script src="<?php echo e(url('admin/assets/js/custom/handlebars_helpers.min.js')); ?>"></script>

    <!--  invoices functions -->
    <script src="<?php echo e(url('admin/assets/js/pages/page_invoices.min.js')); ?>"></script>
    <script type="text/javascript">
        $('#sidebar_reports').addClass('current_section');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>