<?php $__env->startSection('title', 'Product Track'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('angular'); ?>
    <script src="<?php echo e(url('app/inventory/product/product.module.js')); ?>"></script>
    <script src="<?php echo e(url('app/inventory/product/product.controller.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile" ng-controller="ProductController">
        <div class="uk-width-large-10-10">
            <?php echo Form::open(['url' => route('track_store'), 'method' => 'post', 'class' => 'uk-form-stacked', 'id' => 'user_edit_form']); ?>                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-10-10">
                        <div class="md-card">
                            <div class="user_heading">
                                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                </div>
                                <div class="user_heading_content">
                                    <h2 class="heading_b"><span class="uk-text-truncate">Create New Track</span></h2>
                                </div>
                            </div>
                            <div class="user_content">
                                <div class="uk-margin-top">

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="product_name">Name</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="product_name">Product Name</label>
                                            <input class="md-input" type="text" id="product_name" name="product_name" value="<?php echo e(old('product_name')); ?>" required/>
                                            <?php if($errors->first('product_name')): ?>
                                                <div class="uk-text-danger uk-margin-top">Product Name is required.</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="total_product">Total Product</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="total_product">Total Product</label>
                                            <input class="md-input" type="text" id="total_product" name="total_product" value="<?php echo e(old('total_product')); ?>" required/>
                                            <?php if($errors->first('total_product')): ?>
                                                <div class="uk-text-danger uk-margin-top">Invalid Input.</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="product_phase">Phase</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <div class="uk-input-group">
                                                <label>Product Phase</label>
                                                <input type="text" class="md-input" name="product_phase[0]" value="<?php echo e(old('product_phase[0]')); ?>" required/>
                                                <span class="uk-input-group-addon">
                                                    <a ng-click="Append()"><i class="material-icons">&#xE147;</i></a>
                                                </span>
                                            </div>
                                            
                                                
                                            
                                            <?php if(count($errors) > 0): ?>
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        <li><?php echo e(count($errors->all('product_phase'))); ?></li>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin ng-repeat="phase in phases track by $index">
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="product_phase">Phase</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <div class="uk-input-group">
                                                <label>Product Phase</label>
                                                <input type="text" class="md-input" name="product_phase[{{ $index + 1 }}]" required/>
                                                <span class="uk-input-group-addon">
                                                    <a ng-click="Remove($index)"><i class="material-icons">&#xE15C;</i></a>
                                                </span>
                                            </div>
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
        $('#sidebar_inventory_product').addClass('act_item');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>