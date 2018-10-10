

<?php $__env->startSection('title', ' Access Level'); ?>

<?php $__env->startSection('header'); ?>
<?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<style type="text/css">
    
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

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
    <div class="uk-width-large-10-10">
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
            <div class="uk-width-xLarge-2-10 uk-width-large-2-10">
                <div class="md-list-outside-wrapper">
                    <?php echo $__env->make('inc.settings_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
            <div class="uk-width-xLarge-8-10  uk-width-large-8-10">
                <div class="md-card">
                    <div class="user_content">
                        <div class="uk-margin-top">
                            <?php echo Form::open(['url' => route('access_level_update'), 'method' => 'post', 'class' => 'uk-form-stacked', 'id' => 'user_edit_form']); ?>

                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-5 uk-vertical-align">
                                    <label for="role_id" class="uk-vertical-align-middle">Select Role</label>
                                </div>
                                <div class="uk-width-medium-2-5">
                                    <select id="role_id" name="role_id" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select with tooltip">
                                        <option value="">Select role</option>
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <?php if($role->id == $role_id): ?>
                                            <option value="<?php echo e($role->id); ?>" selected><?php echo e($role->name); ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <div class="uk-overflow-container">
                                        <table class="uk-table uk-table-hover">
                                            <thead>
                                            <tr>
                                                <th>Module</th>
                                                <th>Create
                                                <input type="checkbox" class="squaredOne" id="all_mark" />
                                                </th>
                                                <th>Read
                                                <input type="checkbox" class="squaredOne" id="all_mark2" />
                                                </th>
                                                <th>Update
                                                <input type="checkbox" class="squaredOne" id="all_mark3" />
                                                </th>
                                                <th>Delete
                                                <input type="checkbox" class="squaredOne" id="all_mark4" />
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $count = 1; ?>
                                            <?php $__currentLoopData = $access_levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $access_level): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <tr>
                                                <td><?php echo e($access_level->module->module_name); ?></td>
                                                <td>
                                                    <input type="hidden" name="module[]" value="<?php echo e($access_level->module->id); ?>">
                                                    <?php if($access_level->create == 1): ?>
                                                        <input type="checkbox" name="create_<?php echo e($access_level->module->id); ?>" id="create_<?php echo e($access_level->module->id); ?>" class="aa squaredOne" checked/>
                                                    <?php else: ?>
                                                        <input type="checkbox" name="create_<?php echo e($access_level->module->id); ?>" id="create_<?php echo e($access_level->module->id); ?>" class="aa squaredOne"/>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($access_level->read == 1): ?>
                                                        <input type="checkbox" name="read_<?php echo e($access_level->module->id); ?>" id="read_<?php echo e($access_level->module->id); ?>" class="bb squaredOne" checked/>
                                                    <?php else: ?>
                                                        <input type="checkbox" name="read_<?php echo e($access_level->module->id); ?>" id="read_<?php echo e($access_level->module->id); ?>" class="bb squaredOne" />
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($access_level->update == 1): ?>
                                                        <input type="checkbox" name="update_<?php echo e($access_level->module->id); ?>" id="update_<?php echo e($access_level->module->id); ?>val_check_ski" class="cc squaredOne" checked/>
                                                    <?php else: ?>
                                                        <input type="checkbox" name="update_<?php echo e($access_level->module->id); ?>" id="update_<?php echo e($access_level->module->id); ?>val_check_ski" class="cc squaredOne" />
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($access_level->delete == 1): ?>
                                                        <input type="checkbox" name="delete_<?php echo e($access_level->module->id); ?>" id="delete_<?php echo e($access_level->module->id); ?>" class="dd squaredOne" checked/>
                                                    <?php else: ?>
                                                        <input type="checkbox" name="delete_<?php echo e($access_level->module->id); ?>" id="delete_<?php echo e($access_level->module->id); ?>" class="dd squaredOne" />
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-1-1 uk-float-right">
                                    <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                    <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                                </div>
                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $('#role_id').change(function(){
            var id = $("#role_id :selected").val();
            var base_url = window.location.origin;
            var redirect_url = base_url + '/settings/access-level/edit/' + id;
            window.location.href = redirect_url;
        });
    </script>
    <script type="text/javascript">
        $('#settings_menu_user_access').addClass('md-list-item-active');
    </script>
    <script type="text/javascript">
        $('#all_mark').click(function() {   
            $('.aa').each(function(){
                if($('#all_mark').is(':checked')){
                    $(this).prop('checked',true);
                }
                else{
                    $(this).prop('checked',false);
                }
                
            })
        });

        $('#all_mark2').click(function() {   
            $('.bb').each(function(){
                if($('#all_mark2').is(':checked')){
                    $(this).prop('checked',true);
                }
                else{
                    $(this).prop('checked',false);
                }
                
            })
        });

        $('#all_mark3').click(function() {   
            $('.cc').each(function(){
                if($('#all_mark3').is(':checked')){
                    $(this).prop('checked',true);
                }
                else{
                    $(this).prop('checked',false);
                }
                
            })
        });

        $('#all_mark4').click(function() {   
            $('.dd').each(function(){
                if($('#all_mark4').is(':checked')){
                    $(this).prop('checked',true);
                }
                else{
                    $(this).prop('checked',false);
                }
                
            })
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>