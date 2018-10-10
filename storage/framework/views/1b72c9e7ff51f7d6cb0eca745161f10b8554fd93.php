<?php $__env->startSection('title', 'Customer Document'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <div class="uk-width-large-10-10">
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
            <?php echo $__env->make('inc.customer_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="uk-width-xLarge-8-10  uk-width-large-8-10">
            <div class="md-card">
                <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">



                    <div class="user_heading_content">
                        <h2 class="heading_b"><span class="uk-text-truncate">Customer Document</span></h2>
                    </div>
                </div>
            <div class="md-card-content">

                <div class="uk-margin-bottom">
                    <a href="#" class="md-btn uk-margin-right" id="printTable">Print Table</a>
                    <div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">
                        <button class="md-btn">Columns <i class="uk-icon-caret-down"></i></button>
                        <div class="uk-dropdown">
                            <ul class="uk-nav uk-nav-dropdown" id="columnSelector"></ul>
                        </div>
                    </div>
                </div>

                <div class="uk-overflow-container uk-margin-bottom">
                    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_pager_filter">
                        <thead>
                        <tr>
                            <th data-priority="critical">Serial</th>
                            <th data-priority="2">Created At</th>
                            <th data-priority="6">Category</th>
                            <th data-priority="6">Pax Id</th>
                            <th data-priority="6">Title</th>
                            <th class="filter-false remove sorter-false uk-text-center" data-priority="1">Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th data-priority="critical">Serial</th>
                            <th data-priority="2">Created At</th>
                            <th data-priority="6">Category</th>
                            <th data-priority="6">Pax Id</th>
                            <th data-priority="6">Title</th>
                            <th class="uk-text-center">Actions</th>
                        </tr>
                        </tfoot>

                        <?php 
                            $i=1;
                         ?>

                        <tbody>

                        <?php if(isset($recruit)): ?>

                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $recruit->created_at; ?></td>
                            <td><?php echo isset($recruit->document->Category['categoryName'])? $recruit->document->Category['categoryName']:''; ?></td>
                            <td><?php echo $recruit->paxid; ?></td>
                            <td><?php echo $recruit->document['title']; ?></td>

                            <?php if($recruit->id==$recruit->document['pax_id']): ?>
                                <td class="uk-text-center">
                                    <a href="<?php echo route('document_edit',$recruit->id); ?>" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                </td>
                            <?php else: ?>
                                <td class="uk-text-center">
                                    <a href="<?php echo route('document_create',$recruit->id); ?>" class="batch-edit"><i class="md-icon material-icons uk-margin-right">+</i></a>
                                </td>
                            <?php endif; ?>

                        </tr>
                            <?php endif; ?>
                        </tbody>

                    </table>
                </div>
                <ul class="uk-pagination ts_pager">
                    <li data-uk-tooltip title="Select Page">
                        <select class="ts_gotoPage ts_selectize"></select>
                    </li>
                    <li class="first"><a href="javascript:void(0)"><i class="uk-icon-angle-double-left"></i></a></li>
                    <li class="prev"><a href="javascript:void(0)"><i class="uk-icon-angle-left"></i></a></li>
                    <li><span class="pagedisplay"></span></li>
                    <li class="next"><a href="javascript:void(0)"><i class="uk-icon-angle-right"></i></a></li>
                    <li class="last"><a href="javascript:void(0)"><i class="uk-icon-angle-double-right"></i></a></li>
                    <li data-uk-tooltip title="Page Size">
                        <select class="pagesize ts_selectize">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                    </li>
                </ul>
            </div>
        </div>
            </div>
       </div>
    </div>
    <script>

        function deleterow(link) {
            UIkit.modal.confirm('Are you sure?', function(){
                window.location.href = link;
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>

        $('#sidebar_recruit').addClass('current_section');
        $('#sidebar_customer').addClass('act_item');
        $('.customer_document').addClass('md-bg-blue-grey-100');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>