<?php $__env->startSection('title'); ?>
    Menus Access
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Menus Access</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>">Home</a></li>
                        <li class="breadcrumb-item">Users Management</li>
                        <li class="breadcrumb-item active">Menus Access</li>
                    </ol>
                </div>
                <div class="col-lg-6">
                    
                <!-- Bookmark Start-->
                <?php if($access['create'] == 1): ?>
                    <div class="bookmark">
                        <ul>
                            <li>
                                <button class="btn btn-primary" type="button" id="btn_insert"><i class="fa fa-plus-square"></i> Menu Access</button>
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
                        <div class="row">
                            <div class="col-sm-12 col-md-10">
                                <label for="role">Choose Role</label>
                                <select name="role" id="role" class="form-control">
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-2 d-flex justify-content-center">
                                <button 
                                    id="refresh" 
                                    type="button" 
                                    class="btn btn-primary" 
                                    style="bottom: 0; position: absolute;"
                                >
                                Refresh</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
	                        <table class="display datatables" id="dataTableMenus">
	                            <thead>
	                                <tr>
	                                    <th>No</th>
	                                    <th>Menu Name</th>
	                                    <th>View</th>
	                                    <th>Create</th>
                                        <th>Update</th>
                                        <th>Delete</th>
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
    <div class="modal fade" id="form-menus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="form" method="post">
                <input type="hidden" name="postType" id="postType">
                <input type="hidden" name="id" id="id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Menu Access</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Role</label>
                            <select class="form-select" name="role_id" id="role_id">
                                <?php foreach($roles as $role):?>
                                    <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Menu</label>
                            <select class="form-select" name="menu_id" id="menu_id">
                                <?php foreach($menus as $menu):?>
                                    <option value="<?php echo e($menu->id); ?>"><?php echo e($menu->name); ?> [<?php echo e(($menu->parent_id == null) ? 'Parent' : 'in '.$menu->parent->name); ?>]</option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <hr/>
                        <h6>Grant the Access</h6>
                        <hr/>

                        <div class="form-group">
                            <label for="">View</label>
                            <br/>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="view" id="view1" value="1" checked>
                                <label class="form-check-label" for="view1">Allow</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="view" id="view2" value="0">
                                <label class="form-check-label" for="view2">Deny</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Create</label>
                            <br/>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="create" id="create1" value="1" checked>
                                <label class="form-check-label" for="create1">Allow</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="create" id="create2" value="0">
                                <label class="form-check-label" for="create2">Deny</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Update</label>
                            <br/>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="update" id="update1" value="1" checked>
                                <label class="form-check-label" for="update1">Allow</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="update" id="update2" value="0">
                                <label class="form-check-label" for="update2">Deny</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Delete</label>
                            <br/>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="delete" id="delete1" value="1" checked>
                                <label class="form-check-label" for="delete1">Allow</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="delete" id="delete2" value="0">
                                <label class="form-check-label" for="delete2">Deny</label>
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
    <?php echo $__env->make('services.menu-access.menu-access', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/laravel-admin-starter-pack/resources/views/users_management/menu-access/index.blade.php ENDPATH**/ ?>