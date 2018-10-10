

<?php $__env->startSection('title', 'Inventory'); ?>

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
    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
        <div class="uk-width-large-10-10">
            <?php echo Form::open(['url' => route('inventory_store'), 'method' => 'post', 'class' => 'uk-form-stacked', 'id' => 'user_edit_form']); ?>

                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-10-10">
                        <div class="md-card">
                            <div class="user_heading">
                                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                </div>
                                <div class="user_heading_content">
                                    <h2 class="heading_b"><span class="uk-text-truncate">Create New Item</span></h2>
                                </div>
                            </div>
                            <div class="user_content">
                                <div class="uk-margin-top">
                                    <h3 class="full_width_in_card heading_c">
                                        General info
                                    </h3>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label for="item_category_id" class="uk-vertical-align-middle">Category<span style="color: red;" class="asterisc">*</span></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <select id="item_category_id" name="item_category_id" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select with tooltip" required>
                                                <option value="">Select category</option>
                                                <?php $__currentLoopData = $item_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->item_category_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
                                            <?php if($errors->first('item_category_id')): ?>
                                                <div class="uk-text-danger uk-margin-top">Category is required.</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="item_name">Name<span style="color: red;" class="asterisc">*</span></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="item_name">Item Name</label>
                                            <input class="md-input" type="text" id="item_name" name="item_name" value="<?php echo e(old('item_name')); ?>" required/>
                                            <?php if($errors->first('item_name')): ?>
                                                <div class="uk-text-danger uk-margin-top">Name is required.</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="item_about">About</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="item_about">Item About</label>
                                            <textarea class="md-input" name="item_about" id="item_about" cols="30" rows="4"><?php echo e(old('item_about')); ?></textarea>
                                            <?php if($errors->first('item_about')): ?>
                                                <div class="uk-text-danger uk-margin-top">About is required.</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <h3 class="full_width_in_card heading_c">
                                        <span class="">
                                            <label for="sales_information" class="inline-label">Sales Information</label>
                                        </span>
                                    </h3>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="item_sales_rate">Rate</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="item_sales_rate">Item Sales Rate</label>
                                            <input class="md-input" type="text" id="item_sales_rate" name="item_sales_rate" value="<?php echo e(old('item_sales_rate')); ?>" />
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label for="item_sales_tax" class="uk-vertical-align-middle">Tax</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <select id="item_sales_tax" name="item_sales_tax" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select with tooltip" >
                                                <option value="">Select Tax</option>
                                                 <?php $__currentLoopData = $taxs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxsdata): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                 <option value="<?php echo e($taxsdata->id); ?>"><?php echo e($taxsdata->tax_name); ?></option>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
                                            <?php if($errors->first('item_sales_tax')): ?>
                                                <div class="uk-text-danger uk-margin-top">Tax is required.</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="item_sales_description">Description</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="item_sales_description">Description</label>
                                            <textarea class="md-input" name="item_sales_description" id="item_sales_description" cols="30" rows="4"><?php echo e(old('item_sales_description')); ?></textarea>
                                            <?php if($errors->first('item_sales_description')): ?>
                                                <div class="uk-text-danger uk-margin-top">Description is required.</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <h3 class="full_width_in_card heading_c">
                                        <span class="">
                                            <label for="purchase_information" class="inline-label">Purchase Information</label>
                                        </span>
                                    </h3>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="item_purchase_rate">Rate</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="item_purchase_rate">Item Purchase Rate</label>
                                            <input class="md-input" type="text" id="item_purchase_rate" name="item_purchase_rate" value="<?php echo e(old('item_purchase_rate')); ?>"/>
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="item_purchase_description">Description</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="item_purchase_description">Description</label>
                                            <textarea class="md-input" name="item_purchase_description" id="item_purchase_description" cols="30" rows="4"><?php echo e(old('item_purchase_description')); ?></textarea>
                                            <?php if($errors->first('item_purchase_description')): ?>
                                                <div class="uk-text-danger uk-margin-top">Description is required.</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="reorder_point">Re-order (Point)</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="reorder_point">Item Reorder Point</label>
                                            <input class="md-input" type="text" id="reorder_point" name="reorder_point" value="<?php echo e(old('reorder_point')); ?>"/>
                                            <?php if($errors->first('reorder_point')): ?>
                                                <div class="uk-text-danger uk-margin-top">Invalid Input.</div>
                                            <?php endif; ?>
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
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $('#sidebar_inventory').addClass('current_section');
        $('#sidebar_inventory_inventory').addClass('act_item');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>