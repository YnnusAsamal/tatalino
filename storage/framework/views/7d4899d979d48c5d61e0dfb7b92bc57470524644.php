
<?php $__env->startSection('content'); ?>
<div class="container-fluid mt-3">
    <div class="card shadow">
        <div class="card-header"><h3>Payment Form</h3></div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <label for="">REFERENCE NUMBER:</label> <?php echo e($consumptions->referenceNum); ?>

                </div>
            
            </div>
            <hr>
            <div class="row">
                <div class="col">
                <h4>Customer Details</h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Customer Name:</label> <?php echo e($consumptions->customer->firstname); ?> <?php echo e($consumptions->customer->lastname); ?>

                </div>
                <div class="col">
                    <label for="">Address:</label> <?php echo e($consumptions->customer->address); ?>

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Meter Number:</label> <?php echo e($consumptions->meterNumber); ?> 
                </div>
                <div class="col">
                    <label for="">Contact Number:</label> <?php echo e($consumptions->contactNumber); ?>

                </div>
            </div>
            <hr>
             <div class="row">
                <div class="col">
                    <h4>Payment Details</h4>
                </div>
             </div>
             <div class="row">
                <div class="col">
                    <form action="<?php echo e(route('consumptions.payment', $consumptions->id)); ?>" method="post">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="datePayment" id="" value="<?php echo e(date('Y-m-d')); ?>">
                        <div class="table table-responsive text-center">
                            <table class="table table-condense table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date Consumption</th>
                                        <th>Total Consumption(cubic meter)</th>
                                        <th>Status</th>
                                        <th>Payment Made</th>
                                        <th>Amount (Php)</th>
                                        <th>Balance</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo e($consumptions->dateCons); ?></td>
                                        <td><?php echo e($consumptions->totalCons); ?></td>
                                        <td>
                                            <?php if($consumptions->paidCons == $consumptions->amountCons): ?>
                                            <span class="badge badge-success">Paid</span>
                                            <?php elseif($consumptions->paidCons < $consumptions->amountCons): ?>
                                            <span class="badge badge-danger">Not Fully Paid</span>
                                            <?php else: ?>
                                            <span class="badge badge-danger">Unpaid</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($consumptions->paidCons); ?></td>
                                        <td>Php<?php echo e(number_format($consumptions->amountCons,2)); ?></td>
                                        <td><?php echo e($consumptions->amountCons - $consumptions->paidCons); ?></td>
                                        <td>
                                            <?php if($consumptions->paidCons == $consumptions->amountCons): ?>
                                                PAID ALREADY
                                            <?php else: ?>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updatePaymentModal" id="updatePaymentButton">
                                                Update Payment
                                            </button>
                                            <?php endif; ?>
                                        </td>   
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                    
                </div>
             </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updatePaymentModal" tabindex="-1" aria-labelledby="updatePaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatePaymentModalLabel">Update Payment Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Add your form for updating payment information here -->
                <form action="<?php echo e(route('consumptions.payment', $consumptions->id)); ?>" method="post">
                    <?php echo method_field('PUT'); ?>
                    <?php echo csrf_field(); ?>
                    <!-- Add your form fields here based on what you want to update -->
                    <div class="mb-3">
                        <label for="updatedAmount" class="form-label">Updated Amount (Php)</label>
                        <input type="text" class="form-control" id="updatedAmount" name="paidCons" value="<?php echo e($consumptions->paidCons); ?>"required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Payment</button>   
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Your existing content remains unchanged -->

<script>
    // Add this script to handle modal activation
    document.addEventListener('DOMContentLoaded', function () {
        var updatePaymentModal = new bootstrap.Modal(document.getElementById('updatePaymentModal'));

        // Trigger the modal when the button is clicked
        document.getElementById('updatePaymentButton').addEventListener('click', function () {
            updatePaymentModal.show();
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sample', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waterbilling\resources\views/consumptions/payment.blade.php ENDPATH**/ ?>