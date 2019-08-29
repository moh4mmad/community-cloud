<?php $__env->startSection('title'); ?> Student Deposits | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
			<div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">Student Deposits</h4> </div>
                </div>
            </div>
			<?php if(!empty($student)): ?>
			<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round"><i class="fas fa-user-graduate"></i></div>
                    </div>
                    <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                            <h5 class="mt-0"><?php echo e($id); ?></h5>
                            <p class="mb-0 text-muted"><strong>Student Id</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
	<div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round"><i class="fas fa-graduation-cap"></i></div>
                    </div>
                    <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                            <h5 class="mt-0"><?php echo e($student->name); ?></h5>
                            <p class="mb-0 text-muted"><strong>Student name</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
	<div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round"><i class="fas fa-university"></i></div>
                    </div>
                    <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                            <h5 class="mt-0"><?php echo e($student->Department->short); ?></h5>
                            <p class="mb-0 text-muted"><strong>Department</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
	<div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round"><i class="fas fa-dollar-sign"></i></div>
                    </div>
                    <div class="col-9 align-self-center text-right">
                        <div class="m-l-10">
                            <h5 class="mt-0"><?php echo e($student->TotalDeposit()); ?></h5>
                            <p class="mb-0 text-muted"><strong>Total deposit</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
	

	</div>	
			<?php endif; ?>
            <div class="row">
                <div class="col-xl">
                    <div class="card">
                        <div class="card-body new-user">
						
						   <div style="border: 1px solid #dee2e6;" class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
										    <th class="border-top-0">SL.</th>
											<th class="border-top-0">Date</th>
											<th class="border-top-0">Amount</th>
											<th class="border-top-0">Paidby</th>
                                            <th class="border-top-0">Reference</th>
											<th class="border-top-0">Comments</th>
											<th class="border-top-0">Received by</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php if(!count($deposits)): ?>  <td colspan="7" style="text-align: center">No data found </td> <?php endif; ?>
									<?php $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										    <td><?php echo e($count+1); ?></td>
											<?php
											$date = \Carbon\Carbon::parse($deposit->created_at, 'UTC');
											$date =  $date->format('d-m-Y');
											?>
											<td><?php echo e($date); ?></td>
									        <td><strong><?php echo e(number_format($deposit->amount, 2)); ?></strong></td>
											<td><?php echo e($deposit->paidby); ?></td>
											<td><?php echo e($deposit->reference); ?></td>
											<td><?php echo e($deposit->comments); ?></td>
											<td><?php echo e($deposit->receivedby); ?></td>
											
                                        </tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
                                </table>
								</div>
                        </div>
                        
                    </div>
                    
                </div>
              
            </div>
            
        </div>
        
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('acad.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>