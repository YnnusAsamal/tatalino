


<?php $__env->startSection('content'); ?>


<div class="container-fluid">
    <div class="mt-2 py-2">
        <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
        <?php endif; ?>
    </div>
</div>

<div class="py-12 mx-3 m-4">
    <div class="card">
        <div class="card-header">
            <div class="pull-left">
                <h2>Permission Management</h2>
            </div>
            <div class="pull-right">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-create')): ?>
                <a class="btn btn-success" href="<?php echo e(route('permissions.create')); ?>"> Create Permission</a>
            <?php endif; ?>
            </div>
                <form action="<?php echo e(route('permissions.index')); ?>" method="GET" role="search">
                    <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search Permissions">
                                <span class="fa fa-search-plus"></span>
                            </button>
                        </span>
                        <input type="text" class="form-control mr-2" name="term" placeholder="Search permissions" id="term">
                        <a href="<?php echo e(route('permissions.index')); ?>" class=" mt-1">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                    <span class="fa fa-undo"></span>
                                </button>
                            </span>
                        </a>
                    </div>
                </form>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover table-condense">
                <tr>
                    <thead class="thead-dark">
                        <th width="280px">No</th>
                        <th width="280px">Permission</th>
                        <th width="280px">Guard Name</th>
                        <th width="280px">Action</th>
                    </thead>
                </tr>
                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e(++$i); ?></td>
                    <td><?php echo e($permission->name); ?></td>
                    <td><?php echo e($permission->guard_name); ?></td>
                    <td>
                        <!-- <a class="btn btn-info" href="<?php echo e(route('permissions.show',$permission->id)); ?>">Show</a> -->
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-edit')): ?>
                        <a class="btn btn-primary" href="<?php echo e(route('permissions.edit',$permission->id)); ?>">Edit</a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-destroy')): ?>
                            <?php echo Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']); ?>

                                <?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>

                            <?php echo Form::close(); ?>

                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            <?php echo $permissions->render(); ?>

        </div>
    </div>
</div>







<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sample', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tatalino\resources\views/permissions/index.blade.php ENDPATH**/ ?>