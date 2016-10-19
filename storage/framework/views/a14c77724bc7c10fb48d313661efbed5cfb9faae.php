<?php $__env->startSection('content'); ?>
<div class='row'>
	<div class='col-md-6 col-md-offset-3'>
		<h3><?php echo e($users->total()); ?> total users</h3>

		<b>In this page (<?php echo e($users->count()); ?> users)</b>

		<ul class='list-group'>
			<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<li class='list-group-item' style='margin-top: 20px;'>
					<span><?php echo e($user->name); ?></span>
					<span class='pull-right clearfix'>Joined(<?php echo e($user->created_at->diffForHumans()); ?>)
					<button class="btn btn-xs btn-primary">Follow</button>
					</span>
				</li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

			<?php echo e($users->links()); ?>

		</ul>
	</div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>