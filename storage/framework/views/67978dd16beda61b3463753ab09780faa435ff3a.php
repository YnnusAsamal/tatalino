


<?php $__env->startSection('content'); ?>


<?php if($message = Session::get('success')): ?>
<div class="alert alert-success">
  <p><?php echo e($message); ?></p>
</div>
<?php endif; ?>


<div class ="py-12 mx-3 m-4">
    <div class="card">
        <div class ="card-header">
            <div class="pull-left">
                <h4>Users Management</h4>
            </div>
                <div class="pull-right">
                    <a class="btn btn-success btn-sm" href="<?php echo e(route('users.create')); ?>"> Create New User</a>
                </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover table-condense text-center">
                <tr>
                    <thead class="thead-dark text-center">
                        <th width="280px">No</th>
                        <th width="280px">Name</th>
                        <th width="280px">Email</th>
                        <th width="280px">Roles</th>
                        <th width="280px">Department</th>
                        <th width="280px">Action</th>
                    </thead>
                </tr>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td><?php echo e(++$i); ?></td>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td>
                        <?php if(!empty($user->getRoleNames())): ?>
                        <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="badge badge-success"><?php echo e($v); ?></label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($user->department); ?></td>
                    <td>
                        <!-- <a class="btn btn-info" href="<?php echo e(route('users.show',$user->id)); ?>">Show</a> -->
                        <a class="btn btn-primary" href="<?php echo e(route('users.edit',$user->id)); ?>">Edit</a>
                        <?php echo Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']); ?>

                            <?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>

                        <?php echo Form::close(); ?>

                    </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
            <div class="card-footer">
                <?php echo $data->render(); ?>

            </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sample', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tatalino\resources\views/users/index.blade.php ENDPATH**/ ?>