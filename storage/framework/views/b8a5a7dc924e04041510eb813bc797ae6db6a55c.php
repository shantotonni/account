<?php $__env->startSection('title', 'Conveyance Bill'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<style type="text/css">
    .uk-form-select{
        color:rgba(0, 0, 0, 0.8) !important;


    }
    .squaredOne {
        -webkit-appearance: none;
    background-color: #fafafa;
    border: 10px solid #cacece;
    box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05);
    padding: 9px;
    border-radius: 3px;
    display: inline-block;
    position: relative;
}

.squaredOne:active, .squaredOne:checked:active {
    box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px 1px 3px rgba(0,0,0,0.1);
}

.squaredOne:checked {
    background-color: #e9ecee;
    border: 10px solid #009E89;
    box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05), inset 15px 10px -12px rgba(255,255,255,0.1);
    color: #99a1a7;
}

.squaredOne:checked:after {
    content: '\2714';
    font-size: 15px;
    position: absolute;
    top: -10.5px;
    left: -7px;
    color: white;
}
    .styled-select select {
        background: transparent;
        border: none;
        font-size: 18px;
        height: 29px;
        padding: 5px; /* If you add too much padding here, the options won't show in IE */
        width: 90%;

    }

    .styled-select.slate {
        
        height: 34px;
        width: 240px;
        z-index: 10;
    }

    .styled-select.slate select {

        border-bottom: 1px solid #ccc;
        font-size: 16px;
        height: 34px;
        width: 268px;
    }
    .styled-select.slate option{
        font-size: 16pt;

    }
    .slate   { background-color: #ddd; }
    .slate select   { color: #000; }
    @media  screen and (-webkit-min-device-pixel-ratio:0)
    {
        .styled-select.slate {
            background: url(<?php echo e(asset('admin/assets/icons/arrow_down.jpg')); ?>) no-repeat right center;

        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('top_bar'); ?>
<div id="top_bar">
    <div class="md-top-bar">
        <ul id="menu_top" class="uk-clearfix">
            <li data-uk-dropdown class="uk-hidden-small">
                <a href="#"><i class="material-icons">&#xE02E;</i><span>Inventory</span></a>
                <div class="uk-dropdown">
                    <ul class="uk-nav uk-nav-dropdown">
                        <li><a href="<?php echo e(route('inventory_create')); ?>">Create Inventory</a></li>
                        <li><a href="<?php echo e(route('inventory')); ?>">All Inventory</a></li>
                    </ul>
                </div>
            </li>

            <li data-uk-dropdown class="uk-hidden-small">
                <a href="#"><i class="material-icons">&#xE02E;</i><span>Category</span></a>
                <div class="uk-dropdown uk-dropdown-scrollable">
                    <ul class="uk-nav uk-nav-dropdown">
                        
                        <li><a href="<?php echo e(route('inventory_category')); ?>">All Category</a></li>
                    </ul>
                </div>
            </li>
            <li data-uk-dropdown class="uk-hidden-small">
                <a href="<?php echo e(route('stock_create')); ?>"><i class="material-icons">&#xE02E;</i><span>Add Stock</span></a>
            </li>
        </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(Session::has('message')): ?>
    <div class="uk-alert uk-alert-success" data-uk-alert="">
        <a href="#" class="uk-alert-close uk-close"></a>
        <?php echo e(Session::get('message')); ?>

    </div>
<?php endif; ?>
    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
        <div class="uk-width-large-10-10">

                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-10-10">
                        <div class="md-card">
                            <div class="md-card-toolbar" style="">
                                <div class="md-card-toolbar-actions hidden-print">




                                    <!--end  -->
                                    <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}" aria-haspopup="true" aria-expanded="true"> <a href="#" data-uk-modal="{target:'#coustom_setting_modal'}"><i class="material-icons">&#xE8B8;</i><span>Custom Setting</span></a>

                                    </div>
                                    <!--coustorm setting modal start -->
                                    <div class="uk-modal" id="coustom_setting_modal">
                                        <div class="uk-modal-dialog">
                                            <?php echo Form::open(['url' => 'conveyancebill', 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'user_profile']); ?>

                                            <div class="uk-modal-header">
                                                <h3 class="uk-modal-title">Select Date Range <?php echo e(session('branch_id')==1?"and Branch":''); ?>   <i class="material-icons" data-uk-tooltip="{pos:'top'}" title="headline tooltip">&#xE8FD;</i></h3>
                                            </div>

                                            <div class="uk-width-large-2-2 uk-width-2-2">
                                                <?php if(session('branch_id')==1): ?>
                                                    <div class="uk-width-medium-2-2">
                                                        <div class="uk-input-group">
                                                            <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-building"></i></span>

                                                            <select style="width: 90%" class="styled-select slate"  id="report_account_id" name="branch_id" >

                                                                <?php if(isset($branch_id)): ?>
                                                                    <?php $__currentLoopData = $branchs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                        <option <?php echo e(($branch_id==$branch->id)?"selected":''); ?> value="<?php echo e($branch->id); ?>"><?php echo e($branch->branch_name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                <?php else: ?>
                                                                    <?php $__currentLoopData = $branchs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                        <option  value="<?php echo e($branch->id); ?>"><?php echo e($branch->branch_name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                                                <?php endif; ?>
                                                            </select>

                                                        </div>
                                                        <br/>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="uk-width-large-2-2 uk-width-2-2">
                                                    <div class="uk-input-group">
                                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                        <label for="uk_dp_1">From</label>
                                                        <input value="<?php echo e(isset($from_date)?$from_date:date('Y-m-d')); ?>" required class="md-input" type="text" id="uk_dp_1" name="from_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                                    </div>
                                                </div>
                                                <div class="uk-width-large-2-2 uk-width-2-2">
                                                    <div class="uk-input-group">
                                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                        <label for="uk_dp_1">To</label>
                                                        <input value="<?php echo e(isset($to_date)?$to_date:date('Y-m-d')); ?>" required class="md-input" type="text" id="uk_dp_1" name="to_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
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
                            <div class="user_heading">
                                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                </div>
                                <div class="user_heading_content">
                                    <h2 class="heading_b"><span class="uk-text-truncate">Conveyance Bill Form</span></h2>
                                </div>
                            </div>
                            <div class="user_content">
                                <div class="uk-overflow-container uk-margin-bottom">
                                    <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                    <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Conveyance Bill ID</th>
                                            <th>Representative Name</th>
                                            <th>Date</th>
                                            <th class="uk-text-center">Action</th>
                                        </tr>
                                        </thead>

                                        <tfoot>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Conveyance Bill ID</th>
                                            <th>Representative Name</th>
                                            <th>Date</th>
                                            <th class="uk-text-center">Action</th>
                                        </tr>
                                        </tfoot>

                                        <tbody>
                                        <?php $i = 1; ?>
                                        <?php $__currentLoopData = $conveyance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <tr>
                                                <td><?php echo e($i++); ?></td>
                                                <td><?php echo e($all->id); ?></td>
                                                <td><?php echo e($all->user->name); ?></td>
                                                <td><?php echo e($all->date); ?></td>
                                                <td class="uk-text-center">

                                                    <a href="<?php echo e(route('cnb_show', $all->id)); ?>"><i data-uk-tooltip="{pos:'top'}" title="View" class="md-icon material-icons">visibility</i></a>
                                                    <a href="<?php echo e(route('cnb_edit', $all->id)); ?>"><i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i></a>
                                                    <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                    <input class="inventory_id" type="hidden" value="<?php echo e(route('cnb_delete',$all->id)); ?>">

                                                    <a href="<?php echo e(route('cnb_pdf', $all->id)); ?>"><i data-uk-tooltip="{pos:'top'}" title="PDF" class="md-icon material-icons">picture_as_pdf</i></a>

                                                    <?php if(empty($all->approved_by)): ?>
                                                        <input type="checkbox" data-uk-tooltip="{pos:'top'}" title="Approved" class="aa squaredOne" id="approved" name="approved_by" onclick="myfunc(this,'<?php echo e($all->id); ?>')"/>
                                                    <?php else: ?>
                                                        <input type="checkbox" data-uk-tooltip="{pos:'top'}" title="Approved" class="aa squaredOne" id="approved" name="approved_by" onclick="myfunc(this,'<?php echo e($all->id); ?>')" checked/>
                                                    <?php endif; ?>

                                                    <?php if(empty($all->approved_by_chairman)): ?>
                                                        <input type="checkbox" data-uk-tooltip="{pos:'top'}" title="Approved By Chairman" class="aa squaredOne" id="approved_by_chairman" name="approved_by_chairman" onclick="myfunction(this,'<?php echo e($all->id); ?>')"/>
                                                    <?php else: ?>
                                                        <input type="checkbox" data-uk-tooltip="{pos:'top'}" title="pproved By Chairman" class="aa squaredOne" id="approved_by_chairman" name="approved_by_chairman" onclick="myfunction(this,'<?php echo e($all->id); ?>')" checked/>
                                                    <?php endif; ?>
                                                    
                                                    
                                                    <?php if(empty($all->checked_by)): ?>
                                                    <a href="<?php echo e(route('cnb_check',$all->id)); ?>"><i data-uk-tooltip="{pos:'top'}" title="Check" class="md-icon material-icons">filter_1</i></a>
                                                    <?php else: ?>
                                                    <a href="<?php echo e(route('cnb_check',$all->id)); ?>"><i data-uk-tooltip="{pos:'top'}" title="Check" class="md-icon material-icons" style="color: green;">filter_1</i></a>
                                                    <?php endif; ?>


                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Add branch plus sign -->

                            </div>
                        </div>
                    </div>
                </div>


        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script>
        $('.delete_btn').click(function () {
            var url = $(this).next('.inventory_id').val();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = url;
            })
        })
    </script>

    <script type="text/javascript">
        $('#sidebar_money_out').addClass('current_section');
        $('#sidebar_cnb_view').addClass('act_item');

        $(window).load(function(){
            $("#tiktok6").trigger('click');
        })
    </script>

    <script type="text/javascript">
        function myfunc(abcd,x){
            
            var state = $(abcd).attr("checked") === "checked" ? true : false;
            
            if(state === true){
                var z ='/conveyancebill/approve/update/' + x +'/'+ 1;
                console.log(z);
                
                $.get(z, function( data,status ) {
                    console.log(status);
                  swal("Disapproved!", "Successfully Disapproved The Form!!", "warning");
                });
                $(abcd).removeAttr("checked");

                // $.ajax({
                //     type: "get", url: z,
                //     success: function (data, text) {
                //         swal("Disapproved!", "Successfully Disapproved The Form!!", "warning");
                //         $(abcd).removeAttr("checked");
                //     },
                //     error: function (request, status, error) {
                //         swal("Fail!", "No Access The Form!!", "warning");
                //         $(abcd).prop('checked', true);
                //     }
                // });

                
                
              
            }
            else if(state === false){
                var z ='/conveyancebill/approve/update/' + x +'/'+ 0;
                
                $.get(z, function( data ) {
                  swal("Approved!", "Successfully Approved The Form!", "success");
                });
                $(abcd).attr("checked", "checked");
                 
            }
            
        }

    function myfunction(abcd,x){
            
            var state = $(abcd).attr("checked") === "checked" ? true : false;
            
            if(state === true){
                var z ='/conveyancebill/approved-by-chairman/update/' + x +'/'+ 1;
                
                $.get(z, function( data ) {
                  swal("Disapproved!", "Successfully Disapproved By Chairman!!", "warning");
                });
                $(abcd).removeAttr("checked");
                
              
            }
            else if(state === false){
                var z ='/conveyancebill/approved-by-chairman/update/' + x +'/'+ 0;
                
                $.get(z, function( data ) {
                  swal("Approved!", "Successfully Approved By Chairman!", "success");
                });
                $(abcd).attr("checked", "checked");
                 
            }
            
        }
        
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>