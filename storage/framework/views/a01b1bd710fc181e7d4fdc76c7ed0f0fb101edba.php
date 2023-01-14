<header class="main-nav">
    <div class="sidebar-user text-center">
        <img class="img-90 rounded-circle" src="<?php echo e(asset('assets/images/dashboard/1.png')); ?>" alt="" />
        <div class="badge-bottom"><span class="badge badge-primary">On</span></div>
        <a href="user-profile"> <h6 class="mt-3 f-14 f-w-600"><?php echo e(Session::get('full_name')); ?></h6></a>
        <p class="mb-0 font-roboto"><?php echo e(Session::get('email')); ?></p>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>

                    <?php foreach (getMenuParent() as $parent):?>
                        <?php if($parent->access != NULL): ?>
                            <?php if($parent->access->view == 1): ?>
                            <li class="sidebar-main-title">
                                <div>
                                    <h6><?php echo e($parent->name); ?></h6>
                                </div>
                            </li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php foreach(getMenuPrefix() as $prefix): ?>
                            <?php if($prefix->parent_id == $parent->id): ?>
                                
                                <?php if($prefix->access != NULL): ?>
                                    <?php if($prefix->access->view == 1): ?>
                                    <li class="dropdown">
                                        <a class="nav-link menu-title <?php echo e(prefixActive($prefix->prefix)); ?>" href="javascript:void(0)"><i data-feather="<?php echo e($prefix->icon); ?>"></i><span><?php echo e($prefix->name); ?></span></a>    

                                        <ul class="nav-submenu menu-content" style="display: <?php echo e(prefixBlock($prefix->prefix)); ?>;">
                                            <?php foreach(getMenuItem() as $menu): ?>
                                                <?php if($menu->parent_id == $prefix->id): ?>
                                                    
                                                    <?php if($menu->access != NULL): ?>
                                                        <?php if($menu->access->view == 1): ?>
                                                        <li>
                                                            <a href="<?php echo e(route($menu->url)); ?>" class="<?php echo e(routeActive($menu->url)); ?>">
                                                                <?php echo e($menu->name); ?>

                                                            </a>
                                                        </li>
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>

                                    </li>
                                    <?php endif; ?>
                                <?php endif; ?>

                            <?php endif; ?>
                        <?php endforeach; ?>

                    <?php endforeach; ?>

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
<?php /**PATH /Applications/MAMP/htdocs/laravel-admin-starter-pack/resources/views/layouts/admin/partials/sidebar_menu.blade.php ENDPATH**/ ?>