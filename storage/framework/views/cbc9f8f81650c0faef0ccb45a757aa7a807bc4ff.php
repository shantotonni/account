<?php $__env->startSection('title', 'Add VisaStamping'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="uk-grid" ng-controller="InvoiceController">
        <div class="uk-width-large-10-10">
            <?php if(Session::has('msg')): ?>
                <div class="uk-alert uk-alert-success" data-uk-alert>
                    <a href="#" class="uk-alert-close uk-close"></a>
                    <?php echo Session::get('msg'); ?>

                </div>
            <?php endif; ?>
            <?php echo Form::open(['url' => route('visastamp_store'), 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'my_profile', 'files' => 'true', 'enctype' => "multipart/form-data", 'novalidate']); ?>

            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-xLarge-10-10 uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">New VisaStamp </span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-5 uk-vertical-align">
                                <label class="uk-vertical-align-middle" for="customer_name">Type</label>
                            </div>

                            <div class="uk-width-medium-2-6">
                                <select onchange="onTypeSelected()" name="type" title="type" id="type" name="type" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}">
                                    <option <?php if(old('type')==1): ?> selected <?php endif; ?> value="1">Outgoing </option>
                                    <option <?php if(old('type')==2): ?> selected <?php endif; ?> value="2">Incoming </option>
                                </select>
                                <?php if($errors->has('send_date')): ?>
                                    <span style="color:red"><?php echo $errors->first('send_date'); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="uk-grid" id="sending_date">
                            <div class="uk-width-medium-1-5">
                                <label class="uk-vertical-align-middle"  for="start_date">Sending date </label>
                            </div>
                            <div class="uk-width-2-6">

                                <input class="md-input" type="text"  name="send_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">

                            </div>

                        </div>
                        <div class="uk-grid" id="return_date">
                            <div class="uk-width-medium-1-5">
                                <label class="uk-vertical-align-middle" for="start_date">Return date </label>
                            </div>
                            <div class="uk-width-2-6">
                                <label for="start_date">Return date </label>
                                <input class="md-input" type="text"  name="return_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                <?php if($errors->has('return_date')): ?>
                                    <span style="color:red"><?php echo $errors->first('return_date'); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                            <div class="uk-grid" id="return_date">
                                <div class="uk-width-medium-1-5">
                                    <label class="uk-vertical-align-middle" for="start_date">Comments </label>
                                </div>
                                <div class="uk-width-2-6">
                                    <label for="start_date">Comments</label>
                                    <textarea name="comment" id="" cols="10" rows="5" class="md-input"></textarea>
                                    <?php if($errors->has('return_date')): ?>
                                        <span style="color:red"><?php echo $errors->first('return_date'); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                      </div>

                        <div class="uk-grid" data-uk-grid-margin style="padding-left: 100px">
                            <div class="uk-width-medium-3-5">
                                <div class="md-card">
                                    <div class="md-card-content">
                                        <form action="" data-parsley-validate>
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" id="d_form_section" data-uk-grid-match>

                                                <div class="uk-width-9-10">
                                                    <div class="uk-grid">
                                                        <div class="uk-width-1-1">
                                                            <div class="parsley-row">
                                                                <label>Eapplication No</label>
                                                                <input type="text" class="md-input" name="eapplication_no[]"  required>
                                                                <?php if($errors->has('eapplication_no')): ?>
                                                                    <div class="uk-text-danger"><?php echo e($errors->first('eapplication_no')); ?></div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="uk-grid">
                                                        <div class="uk-width-1-1">
                                                            <div class="uk-grid" data-uk-grid-margin>
                                                                <div class="uk-width-medium-1-1">
                                                                    <select required id="select_demo_1" class="md-input" name="pax_id[]">
                                                                        <option value="" disabled selected hidden>Select...</option>
                                                                            <?php $__currentLoopData = $recruit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                <option value="<?php echo $value->id; ?>"><?php echo $value->paxid; ?></option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                    </select>
                                                                    <?php if($errors->has('pax_id')): ?>
                                                                        <div class="uk-text-danger"><?php echo e($errors->first('pax_id')); ?></div>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="uk-grid">
                                                        <div class="uk-width-1-1">
                                                            <div class="parsley-row">
                                                                <input type="file" class="md-input" name="img_url[]" required>
                                                                <?php if($errors->has('img_url')): ?>
                                                                    <div class="uk-text-danger"><?php echo e($errors->first('img_url')); ?></div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                
                                                    
                                                        
                                                            
                                                        
                                                    
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                                <div class="uk-grid" data-uk-grid-margin-bottom>
                                    <div class="uk-width-medium-1-5">

                                    </div>
                                    <div class="uk-width-1-5">
                                        <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                        <a href="<?php echo e(url()->previous()); ?>" type="button" class="md-btn md-btn-flat uk-modal-close">Close</a>
                                    </div>
                                </div>
                       <br/>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>

    <script>

        $( "#customer_id" ).clone().prependTo( "#customer_id" );
    </script>

    <script>
        var main_node=document.getElementById('repeat0');
        var i=0;
        function addrow() {
            console.log(i);
            var clo=main_node.cloneNode(true);
            clo.id="repeat" + (++i);
            main_node.parentNode.appendChild(clo);
        }

        window.onload=function () {
            document.getElementById("sending_date").style.display = 'none';
            document.getElementById("return_date").style.display = 'block';
        }
        function onTypeSelected(){
            var type=document.getElementById("type").value;
            if(type==2){

                document.getElementById("sending_date").style.display='none';
                document.getElementById("return_date").style.display='block';
            }
            else{
                document.getElementById("sending_date").style.display='block';
                document.getElementById("return_date").style.display='none';
            }

        }
    </script>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>