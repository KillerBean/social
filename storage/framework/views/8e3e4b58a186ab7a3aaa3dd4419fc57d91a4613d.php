<?php $__env->startSection('content'); ?>
<div class='row'>
	<div>
		<ul class='list-group'>
			<?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<li class='list-group-item'>
					<span><?php echo e($field); ?> <===> <?php echo e($value); ?></span>
				</li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</ul>
	</div>
	
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>