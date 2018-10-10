
<div class="uk-width-xLarge-2-10 uk-width-large-2-10">
    <div class="md-list-outside-wrapper">
        <ul class="md-list md-list-outside">

            <li class="active">
                <a href="#" class="md-list-content" data-invoice-id="2">
                    <span class="md-list-heading uk-text-truncate">Dashboard</span>
                </a>
            </li>
            <li>

                <a href="<?php echo e(route('customer_information_edit',$id)); ?>" class="md-list-content customer_information" >

                    <span class="md-list-heading uk-text-truncate">Information</span>
                </a>
            </li>
            <li class="">
                <a href="#" class="md-list-content customer_agent" data-invoice-id="2">
                    <span class="md-list-heading uk-text-truncate">Agent </span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo e(route('customer_account',$id)); ?>" class="md-list-content customer_account" data-invoice-id="2">
                    <span class="md-list-heading uk-text-truncate">Account </span>
                </a>
            </li>

            <li class="">
                <a href="<?php echo e(route('customer_document',$id)); ?>" class="md-list-content customer_document">

                    <span class="md-list-heading uk-text-truncate">Documents</span>
                </a>
            </li>
            <li class="">

                <a href="<?php echo e(route('customer_order',$id)); ?>" class="md-list-content customer_orderdetails" data-invoice-id="2">

                    <span class="md-list-heading uk-text-truncate">Order Details</span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo e(route('customer_okala',$id)); ?>" class="md-list-content customer_okala" data-invoice-id="2">
                    <span class="md-list-heading uk-text-truncate">Okala</span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo e(route('customer_medicalSlip',$id)); ?>" class="md-list-content customer_medicalslip" data-invoice-id="2">
                    <span class="md-list-heading uk-text-truncate">Medical Slip</span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo e(route('customer_mofa',$id)); ?>" class="md-list-content customer_mofa" data-invoice-id="2">
                    <span class="md-list-heading uk-text-truncate">Mofa </span>
                </a>
            </li>

            <li class="">
                <a href="<?php echo e(route('customer_musaned',$id)); ?>" class="md-list-content customer_mosaned" data-invoice-id="2">
                    <span class="md-list-heading uk-text-truncate">Musaned </span>
                </a>
            </li>

            <li class="">
                <a href="<?php echo e(route('customer_stamping',$id)); ?>" class="md-list-content customer_stamping" data-invoice-id="2">
                    <span class="md-list-heading uk-text-truncate">Stamping</span>
                </a>
            </li>

            <li class="">
                <a href="<?php echo e(route('customer_ft',$id)); ?>" class="md-list-content customer_finger" data-invoice-id="2">
                    <span class="md-list-heading uk-text-truncate">Ft & Tranning</span>
                </a>
            </li>

            <li class="">
                <a href="<?php echo e(route('customer_manpower',$id)); ?>" class="md-list-content customer_manpower" data-invoice-id="2">
                    <span class="md-list-heading uk-text-truncate">Manpower</span>
                </a>
            </li>

            <li id="finger">
                <a href="<?php echo e(route('customer_flight',$id)); ?>" class="md-list-content customer_flight" data-invoice-id="2">
                    <span class="md-list-heading uk-text-truncate">Flight</span>
                </a>
            </li>

        </ul>
    </div>
</div>

