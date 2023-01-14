<?php $__env->startSection('title'); ?>
    Roles
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Roles</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>">Home</a></li>
                        <li class="breadcrumb-item">Users Management</li>
                        <li class="breadcrumb-item active">Roles</li>
                    </ol>
                </div>
                <div class="col-lg-6">
                    
                <!-- Bookmark Start-->
                <?php if($access['create'] == 1): ?>
                    <div class="bookmark">
                        <ul>
                            <li>
                                <button class="btn btn-primary" type="button" id="btn_insert"><i class="fa fa-plus-square"></i> Role</button>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>
                <!-- Bookmark Ends-->
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
	                        <table class="display datatables" id="dataTableRoles">
	                            <thead>
	                                <tr>
	                                    <th>No</th>
	                                    <th>Name</th>
	                                    <th>Description</th>
	                                    <th>Action</th>
	                                </tr>
	                            </thead>
	                        </table>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="form-role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="form" method="post">
                <input type="hidden" name="postType" id="postType">
                <input type="hidden" name="id" id="id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Role</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control" name="description" placeholder="Description" id="description" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" id="btn_close">Close</button>
                        <button class="btn btn-secondary" type="submit">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
    <?php echo $__env->make('services.roles.roles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/laravel-admin-starter-pack/resources/views/users_management/roles/index.blade.php ENDPATH**/ ?>