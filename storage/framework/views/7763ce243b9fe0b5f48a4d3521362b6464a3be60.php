
<?php $__env->startSection('content'); ?>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col">
            <h3 class="float-left">Category / Themes Section</h3>
            <div class="float-right">
                <button class="btn btn-primary btn-sm float-right" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                    Add Category
                </button>

                <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?php echo e(route('category.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="modal-header">
                                    <h5 class="modal-title">Add New Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Category/Theme</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter category" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Sub Category</label>
                                        <input type="text" name="subcategory" class="form-control" placeholder="Enter subcategory">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-condensed table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Category/Theme</th>
                                    <th>Sub Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><?php echo e($data->name); ?></td>
                                    <td><?php echo e($data->subcategory); ?></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editCategoryModal<?php echo e($data->id); ?>">
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editCategoryModal<?php echo e($data->id); ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="<?php echo e(route('category.update', $data->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Category</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Category/Theme</label>
                                                        <input type="text" name="name" class="form-control" value="<?php echo e($data->name); ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Sub Category</label>
                                                        <input type="text" name="subcategory" class="form-control" value="<?php echo e($data->subcategory); ?>">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
   
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sample', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tatalino\resources\views/category/index.blade.php ENDPATH**/ ?>