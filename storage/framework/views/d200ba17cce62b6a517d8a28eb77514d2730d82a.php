<?php $__env->startSection('title'); ?>
    Users
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Users</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>">Home</a></li>
                        <li class="breadcrumb-item">Users Management</li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
                <div class="col-lg-6">
                    
                <!-- Bookmark Start-->
                <?php if($access['create'] == 1): ?>
                    <div class="bookmark">
                        <ul>
                            <li>
                                <button class="btn btn-primary" type="button" id="btn_insert"><i class="fa fa-plus-square"></i> User</button>
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
	                        <table class="display datatables" id="dataTableUsers">
	                            <thead>
	                                <tr>
	                                    <th>No</th>
	                                    <th>Name</th>
                                        <th>Role</th>
	                                    <th>Email</th>
	                                    <th>Phone</th>
                                        <th>Verified</th>
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
    <div class="modal fade" id="form-users" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form id="form" method="post">
                <input type="hidden" name="postType" id="postType">
                <input type="hidden" name="id" id="id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Users</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="card card-absolute">
                            <div class="card-header bg-primary">
                                <h6 class="text-white">Account</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Role</label>
                                    <select class="form-select" name="role_id" id="role_id">
                                        <?php foreach ($roles as $role): ?>
                                            <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Username" id="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" id="password" required>
                                </div>
                            </div>
                        </div>

                        <div class="card card-absolute">
                            <div class="card-header bg-primary">
                                <h6 class="text-white">Profile</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="full_name" placeholder="Name" id="full_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" id="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Phone" id="phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <textarea id="address" name="address" class="form-control" placeholder="Address" required></textarea>
                                </div>
                                <input class="form-control" type="hidden" name="is_verified" name="is_verified" value="1">
                            </div>
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
    <?php echo $__env->make('services.users.users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/laravel-admin-starter-pack/resources/views/users_management/users/index.blade.php ENDPATH**/ ?>