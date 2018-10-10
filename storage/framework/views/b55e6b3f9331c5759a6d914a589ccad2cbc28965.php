<?php $__env->startSection('title', 'Recruit Expense'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('top_bar'); ?>
<div id="top_bar">
    <div class="md-top-bar">
        <ul id="menu_top" class="uk-clearfix">


            <li data-uk-dropdown class="uk-hidden-small">
                <a href="#"><i class="material-icons">&#xE02E;</i><span>Sector</span></a>
                <div class="uk-dropdown">
                    <ul class="uk-nav uk-nav-dropdown">
                        <li><a href="<?php echo e(route('order_expense_sector_create')); ?>">Create Sector</a></li>
                        <li><a href="<?php echo e(route('order_expense_sector')); ?>">All Sector </a></li>
                    </ul>
                </div>
            </li>
            <?php $Categories = app('App\Lib\Category'); ?>
            <?php $Helper = app('App\Lib\Helpers'); ?>
            <li data-uk-dropdown class="uk-hidden-small">
                <a href="#"><i class="material-icons">&#xE02E;</i><span>Search By Sector</span></a>
                <div class="uk-dropdown uk-dropdown-scrollable">
                    <ul class="uk-nav uk-nav-dropdown">
                        <li><a href="<?php echo e(route('order_expense_sector')); ?>">All Sector</a></li>
                        <?php $__currentLoopData = $Categories->ExpenseSector(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documentCategory): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <li><a href="<?php echo e(route('document_category_search', ['id' => $documentCategory->id])); ?>"><?php echo e($documentCategory->title); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
        <div class="uk-width-large-10-10">
            <form action="" class="uk-form-stacked" id="user_edit_form">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-10-10">
                        <div class="md-card">
                            <div class="user_heading">
                                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                </div>
                                <div class="user_heading_content">
                                    <h2 class="heading_b"><span class="uk-text-truncate">Expense List</span></h2>
                                </div>
                            </div>
                            <?php
                            $i=1;
                           ?>
                            <div class="user_content">
                                <div class="uk-overflow-container uk-margin-bottom">
                                    <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                    <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Date</th>
                                            <th>Sector</th>
                                            <th>Pax Id</th>
                                            <th>Vendor</th>
                                            <th>Amount</th>
                                            <th class="uk-text-center">Action</th>
                                        </tr>
                                        </thead>

                                        <tfoot>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Date</th>
                                            <th>Sector</th>
                                            <th>Pax Id</th>
                                            <th>Vendor</th>
                                            <th>Amount</th>
                                            <th class="uk-text-center">Action</th>
                                        </tr>
                                        </tfoot>

                                        <tbody>
                                        <?php if($sector): ?>
                                        <?php $__currentLoopData = $sector; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <tr>
                                                <td><?php echo e($i++); ?></td>
                                                <td><?php echo e($value->created_at); ?></td>
                                                <td><?php echo e($value->Sector->title); ?></td>
                                                <td>
                                                    <?php $__currentLoopData = $value->paxId; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                     <?php echo e($v->paxid); ?>


                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                </td>
                                                <td><?php echo $Helper->vendor($value->expense_id); ?>  </td>
                                                <td><?php echo e($value->amount['amount']); ?></td>
                                                <td class="uk-text-center">
                                                    <a href="<?php echo e(route('order_from_expense',['id'=>$value->id,'ex'=>$value->expense_id ])); ?>"><i data-uk-tooltip="{pos:'top'}" title="expense"  class="material-icons">attach_money</i></a>

                                                    <a href="<?php echo e(route('order_expense_accounts_edit',['id'=>$value['id']])); ?>"><i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i></a>
                                                    <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}"  title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                    <input class="expense_id" type="hidden" value="<?php echo e($value['expense_id']); ?>">
                                                    <input id="recruite_id" type="hidden" value="<?php echo e($value['id']); ?>">

                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        <?php endif; ?>    
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Add branch plus sign -->

                                <div class="md-fab-wrapper branch-create">
                                    <a id="add_branch_button" href="<?php echo e(route('order_expense_accounts_create')); ?>" class="md-fab md-fab-accent branch-create">
                                        <i class="material-icons">&#xE145;</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>

        $('.delete_btn').click(function () {
            var id = $(this).next('.expense_id').val();
            var recruite_id = document.getElementById("recruite_id").value;
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {

                if(id){
                    window.location.href = "<?php echo e(route('order_expenses_delete')); ?>"+"/"+recruite_id+"/"+id;
                }else{
                    window.location.href = "<?php echo e(route('order_expenses_delete')); ?>"+"/"+recruite_id;
                }

            })
        })



        $('#sidebar_recruit').addClass('current_section');
        $('#sidebar_order_expense_accounts').addClass('act_item');
        $(window).load(function(){
            $("#tiktok2").trigger('click');
        })
    </script>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>