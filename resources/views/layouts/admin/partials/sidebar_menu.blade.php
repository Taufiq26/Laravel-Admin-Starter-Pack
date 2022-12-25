<header class="main-nav">
    <div class="sidebar-user text-center">
        <img class="img-90 rounded-circle" src="{{asset('assets/images/dashboard/1.png')}}" alt="" />
        <div class="badge-bottom"><span class="badge badge-primary">On</span></div>
        <a href="user-profile"> <h6 class="mt-3 f-14 f-w-600">{{ Session::get('full_name') }}</h6></a>
        <p class="mb-0 font-roboto">{{ Session::get('email') }}</p>
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
                        @if($parent->access != NULL)
                            @if($parent->access->view == 1)
                            <li class="sidebar-main-title">
                                <div>
                                    <h6>{{ $parent->name }}</h6>
                                </div>
                            </li>
                            @endif
                        @endif

                        <?php foreach(getMenuPrefix() as $prefix): ?>
                            @if($prefix->parent_id == $parent->id)
                                
                                @if($prefix->access != NULL)
                                    @if($prefix->access->view == 1)
                                    <li class="dropdown">
                                        <a class="nav-link menu-title {{ prefixActive($prefix->prefix) }}" href="javascript:void(0)"><i data-feather="{{ $prefix->icon }}"></i><span>{{ $prefix->name }}</span></a>    

                                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock($prefix->prefix) }};">
                                            <?php foreach(getMenuItem() as $menu): ?>
                                                @if($menu->parent_id == $prefix->id)
                                                    
                                                    @if($menu->access != NULL)
                                                        @if($menu->access->view == 1)
                                                        <li>
                                                            <a href="{{ route($menu->url) }}" class="{{routeActive($menu->url)}}">
                                                                {{ $menu->name }}
                                                            </a>
                                                        </li>
                                                        @endif
                                                    @endif

                                                @endif
                                            <?php endforeach; ?>
                                        </ul>

                                    </li>
                                    @endif
                                @endif

                            @endif
                        <?php endforeach; ?>

                    <?php endforeach; ?>

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
