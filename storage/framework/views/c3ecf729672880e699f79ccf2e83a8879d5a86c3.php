<?php $__env->startSection('title', 'Recruit Expense '); ?>

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
            <li data-uk-dropdown class="uk-hidden-small">
                <a href="#"><i class="material-icons">&#xE02E;</i><span>Search By Sector</span></a>
                <div class="uk-dropdown uk-dropdown-scrollable">
                    <ul class="uk-nav uk-nav-dropdown">
                        <li><a href="<?php echo e(route('order_expense_sector')); ?>">All Sector</a></li>
                        <?php $__currentLoopData = $Categories->ExpenseSector(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recruitCategory): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <li><a href="<?php echo e(route('document_category_search', ['id' => $recruitCategory->id])); ?>"><?php echo e($recruitCategory->title); ?></a></li>
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
            <?php echo Form::open(['url' => array('order/recruit/expense/update', $recruit->id), 'method' => 'post', 'class' => 'uk-form-stacked', 'id' => 'user_edit_form', 'files' => 'true']); ?>

                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-10-10">
                        <div class="md-card">
                            <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">

                                
                                <div class="user_heading_content">
                                    <h2 class="heading_b"><span class="uk-text-truncate">Edit Recruit Expense</span></h2>
                                </div>
                            </div>
                            <div class="user_content">
                                <div class="uk-margin-top">
                                   
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label for="category_id" class="uk-vertical-align-middle">Sector</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <select id="contact_category_id" name="sector_id" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" required>
                                                <option value="">Select Sector</option>
                                                <?php $__currentLoopData = $sector; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact_category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                    <option value="<?php echo e($contact_category->id); ?>" <?php echo e($recruit->expenseSectorid == $contact_category->id ? 'selected="selected"' : ''); ?>><?php echo e($contact_category->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label for="contact_category_id" class="uk-vertical-align-middle">Pax Id</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <?php 
                                            $k=1;
                                            ?>
                                            <?php $__currentLoopData = $recruit->paxId; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                <div class="uk-grid form_section" id="form_row">
                                                    <div class="uk-width-1-1">

                                                        <div class="uk-input-group">

                                                            <select id="pax_id"  name="pax_id[]" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}">
                                                                <option value="">Select Pax</option>
                                                                <?php $__currentLoopData = $pax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                    <?php if($v->id==$value->id): ?>
                                                                    <option selected value="<?php echo e($value->id); ?>"><?php echo e($value->paxid); ?></option>
                                                                    <?php else: ?>
                                                                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->paxid); ?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            </select>


                                                            <span class="uk-input-group-addon">
                                                          <a href="#" class="btnSectionRemove"><i class="material-icons md-24"></i></a>
                                                            </span>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


                                            <div class="uk-grid form_section" id="form_row">
                                                <div class="uk-width-1-1">

                                                    <div class="uk-input-group">

                                                        <select id="pax_id"  name="pax_id[]" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}">
                                                            <option value="">Select Pax</option>
                                                            <?php $__currentLoopData = $pax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->paxid); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                        </select>


                                                        <span class="uk-input-group-addon">
                                                          <a href="#" class="btnSectionClone" data-section-clone="#form_row"><i class="material-icons md-24"></i></a>
                                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="display_name">Created At</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <?php echo e($recruit->created_at); ?>

                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="display_name">Updated At</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <?php echo e($recruit->updated_at); ?>

                                        </div>
                                    </div>


                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-1-1 uk-float-right">
                                            <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                                        </div>
                                    </div>

                             </div>
                         </div>









                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $('#sidebar_recruit').addClass('current_section');
        $('#sidebar_order_expense_accounts').addClass('act_item');
        $(window).load(function(){
            $("#tiktok2").trigger('click');
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>