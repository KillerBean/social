<?php $__env->startSection('title'); ?>
	Blade
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="jumbotron">
    <h1>Your gender is 
    <?php if($gender == 'male'): ?>
    	male
    <?php elseif($gender == 'female'): ?>
    	female
    <?php else: ?>
    	unknown
    <?php endif; ?>
    </h1>
    <p class="lead">
    <?php if (! (empty($text))): ?>
    <?php echo e($text); ?>

    <?php endif; ?>
    </p>
</div>
<div class="row marketing">
    <div class="col-lg-6">
        <h4>Subheading</h4>
        <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

        <h4>Subheading</h4>
        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

        <h4>Subheading</h4>
        <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
    </div>

    <div class="col-lg-6">
    	<h4>Subheading</h4>
        <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

        <h4>Subheading</h4>
        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

        <h4>Subheading</h4>
        <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>