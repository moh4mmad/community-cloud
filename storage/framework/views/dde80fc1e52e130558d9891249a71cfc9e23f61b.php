<?php $__env->startSection('title'); ?>
Admin Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>
<?php
   $total_users = \App\User::count();
   $total_airdrop = \App\Airdrop::count();
   $total_ac_users = \App\User::where('active', 1)->count();
   $airdrops = \App\Airdrop::orderBy('id', 'desc')->limit(15)->get();
?>
   
            
            <div class="page-header">
              <h1>Dashboard</h1>
            </div>
    
            <!-- content -->
            <div id="content">
                
                <div class="row animated-div-3d">
                  <div class="col-xs-6 col-md-2">
                  	<p>
					<span class="pull-right label label-white label-top-right-padding-5"><?php echo e($total_users); ?></span>
                      <a href="" class="btn btn-block btn-primary" role="button">
                          <i class="fa fa-users fa-3x"></i><br />
                          Total Users
                      </a>
                   </p>
                  </div>
                  <div class="col-xs-6 col-md-2">
                  	<p>
                      <span class="pull-right label label-white label-top-right-padding-5"><?php echo e($total_airdrop); ?></span>
                      <a href="" class="btn btn-block btn-primary" role="button">
                          <span class="fa fa-user fa-3x"></span><br />
                          Total Airdrop
                      </a>
                    </p>
                  </div>
                  <div class="col-xs-6 col-md-2">
                  	<p>
                      <span class="pull-right label label-white label-top-right-padding-5"><?php echo e($total_ac_users); ?></span>
                      <a href="" class="btn btn-block btn-primary" role="button">
                          <span class="fa fa-fw fa-3x fa-bolt"></span><br />
                          Total Active users
                      </a>
                    </p>
                  </div>
                </div>
                
                <div class="clearfix">&nbsp;</div>
                
                
            </div>    
            
        <div class="row">
				    <div class="col-xs-12 col-md-12">
				        
				        <!-- panel start -->
				        <div class="panel panel-default">
				            <div class="panel-heading">
				                <h3 class="panel-title"><i class="fa fa-table"></i> Latest submitted airdrops</h3>
				            </div>
				            <div class="panel-body">
				
				               
								<table class="table table-striped table-hover">
							        <thead>
							          <tr class="black">
							            <th>User</th>
							            <th>Name</th>
										<th>Email</th>
							            <th>Wallet</th>
							            <th>Telegram</th>
							            <th>Twitter</th>
							          </tr>
							        </thead>
							        <tbody>
							         <?php $__currentLoopData = $airdrops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $airdrop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									  <?php
									  $user = \App\User::where('id',$airdrop->userid)->first();
									  ?>
									  <tr>
							            <td><?php echo e($user->name); ?></td>
							            <td><?php echo e($airdrop->surname); ?></td>
							            <td><?php echo e($airdrop->email); ?></td>
							            <td><?php echo e($airdrop->wallet); ?></td>
										<td><?php echo e($airdrop->telegram); ?></td>
										<td><?php echo e($airdrop->twitter); ?></td>
							          </tr>
									  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							      </table>
				            </div>
				        </div>
				    </div>
				</div>
				
<?php $__env->stopSection(); ?>






<?php echo $__env->make('admin.html.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>