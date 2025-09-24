
<?php $__env->startSection('content'); ?>
<div class="container-fluid mt-3">
    <div class="card shadow">
        <div class="card-header">
            <h4 class="float-start">Consumption List</h4>
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Consumption
            </button>
            <!-- <div class="button-modal float-end">
                <a href="<?php echo e(route('consumptions.create')); ?>" class="btn btn-primary">
                    Add Consumption
                </a>
            </div> -->
        </div>
        <div class="card-body">
            <div class="row">
            <form action="<?php echo e(route('consumptions.index')); ?>" method="GET">
                <label for="year">Year:</label>
                <input type="number" name="year" value="<?php echo e($selectedYear); ?>" min="2000" max="<?php echo e(date('Y')); ?>" class="form-control">
                    
                <label for="month">Month:</label>
                <input type="number" name="month" value="<?php echo e($selectedMonth); ?>" min="1" max="12" class="form-control">
                <br>
                <button type="submit" class="btn btn-sm btn-warning">Filter</button>
                <a href="<?php echo e(route('consumptions.index')); ?>" class="btn btn-sm btn-primary">Refresh</a>
            </form>
            </div>
            <hr>
        
                <div class="table table-responsive">
                    <table class="table table-condense table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>No.</th>
                                <th>Date</th>
                                <th>Reference Number</th>
                                <th>Meter Number</th>
                                <th>Customer Name</th>
                                <th>Current Reading</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        <h3>ALL RECORDS</h3>
                        <?php $__currentLoopData = $filteredConsumptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cons): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><?php echo e($cons->dateCons); ?></td>
                            <td><?php echo e($cons->referenceNum); ?></td>
                            <td><?php echo e($cons->meterNumber); ?></td>
                            <td>
                            <?php if($cons->customer): ?> <!-- Check if the customer relationship is loaded -->
                                <?php echo e($cons->customer->firstname); ?> <?php echo e($cons->customer->lastname); ?>

                            <?php else: ?>
                                Customer not available
                            <?php endif; ?>
                            </td>
                            <td><?php echo e($cons->totalCons); ?></td>
                            <td>Php <?php echo e(number_format($cons->amountCons,2)); ?></td>
                            <td>
                                <?php if($cons->statusCons =='Paid'): ?>
                                <span class="badge badge-success">Paid</span>
                                <?php else: ?>
                                <span class="badge badge-danger">Unpaid</span>
                                <?php endif; ?>
                              
                            </td>
                            <td class="text-center">
                                <a href="<?php echo e(route('consumptions.edit', $cons->id)); ?>" class="btn btn-secondary btn-sm">Edit</a>
                                <a href="<?php echo e(route('consumptions.show', $cons->id)); ?>" class="btn btn-info btn-sm">Print</a>
                                <a href="<?php echo e(route('consumptions.paymentShow', $cons->id)); ?>" class="btn btn-warning btn-sm">Payment</a>
                                <a href="<?php echo e(route('consumptions.destroy', $cons->id)); ?>" class="btn btn-danger btn-sm" data-confirm-delete="true">Remove</a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Consumption</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('consumptions.storeSingle')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label for="">Choose Customer</label>
                            <select name="customer_id" id="customerSelect" class="form-select">
                                <option>--SELECT--</option>
                                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cons): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cons->id); ?>"><?php echo e($cons->firstname); ?> <?php echo e($cons->lastname); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Date</label>
                            <input type="text" name="dateCons" id="" class="form-control" value="<?php echo e(date('Y-m-d')); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Meter Number</label>
                            <input type="text" name="meterNumber" id="meterNumberInput" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Contact Number</label>
                            <input type="text" name="contactNumber" id="contactNumberInput" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Current Reading</label>
                            <input type="text" name="totalCons" id="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>  

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const customerSelect = document.getElementById("customerSelect");
        const meterNumberInput = document.getElementById("meterNumberInput");
        const contactNumberInput = document.getElementById("contactNumberInput");

        customerSelect.addEventListener("change", function() {
            const selectedCustomerId = parseInt(this.value);

            if (selectedCustomerId) {
                fetch(`/get-customer-info/${selectedCustomerId}`)
                    .then(response => response.json())
                    .then(data => {
                        meterNumberInput.value = data.meterNumber;
                        contactNumberInput.value = data.contactNumber;
                    })
                    .catch(error => {
                        console.error('Error fetching customer info:', error);
                    });
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sample', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\waterbilling\resources\views/consumptions/index.blade.php ENDPATH**/ ?>