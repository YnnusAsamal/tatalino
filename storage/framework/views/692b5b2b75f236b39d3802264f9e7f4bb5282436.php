
<?php $__env->startSection('content'); ?>
<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            <h4 class="float-start">Cost <i>/cubic meter</i></h4>
            <div class="button-modal float-end">
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add Cost
                </button> -->
            </div>
        </div>

        <div class="card-body">
        <div class="row">
            <div class="col-6 p-1">
                <div class="card" style="background-color: #9fa8da;">
                <div class="card-body pb-0">
                <i class="fa fa-tint fa-3x pb-4"></i>
                <?php $__currentLoopData = $costs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="d-flex justify-content-between">
                   
                    <p class="mb-0 h5">Php <?php echo e(number_format($cost->cost,'2')); ?></p>

                               
                    
                    <p class="mb-0 hour">/Cubic Meter</p>
                </div>
              </div>
              <hr>
              <div class="card-body pt-0">
                <a href="<?php echo e(route('costs.edit', $cost->id)); ?>" class="btn btn-warning btn-sm">Update</a>
                <!-- <a href="" class="btn btn-danger btn-sm">Remove</a> -->
                <!-- <h6 class="font-weight-bold mb-1">Seattle</h6>
                <p class="mb-0">Light rain</p> -->
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-center" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Cost</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo e(route('costs.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <label for="">Costs</label>
                    <input type="text" name="cost" id="" class="form-control">
                </div>
                
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>

      </form>
      
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sample', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waterbilling\resources\views/costs/index.blade.php ENDPATH**/ ?>