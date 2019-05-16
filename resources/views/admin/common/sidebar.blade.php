<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/static/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->email }}</p>
                <a href="javascript:;"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview {{ (isset($menu_active) &&  in_array($menu_active,['menu','menu-add'])) ? 'active menu-open': '' }}">
                <a href="javascript:;">
                    <i class="fa fa-th"></i> <span>Quản lý menu</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {{ (isset($menu_active) && ($menu_active == 'menu')) ? 'class=active': '' }}><a href="{{route('list_menu')}}"><i class="fa fa-circle-o"></i>Danh sách menu</a></li>
                    <li {{ (isset($menu_active) && ($menu_active == 'menu-add')) ? 'class=active': '' }}><a href="{{route('add_menu')}}"><i class="fa fa-circle-o"></i>Thêm mới menu</a></li>
                </ul>
            </li>
            <li class="treeview {{ (isset($menu_active) &&  in_array($menu_active,['sub-menu','sub-menu-add'])) ? 'active menu-open': '' }}">
                <a href="javascript:;">
                    <i class="fa fa-table"></i> <span>Quản lý sub menu</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {{ (isset($menu_active) && ($menu_active == 'sub-menu')) ? 'class=active': '' }}><a href="{{route('list_sub_menu')}}"><i class="fa fa-circle-o"></i>Danh sách sub menu</a></li>
                    <li {{ (isset($menu_active) && ($menu_active == 'sub-menu-add')) ? 'class=active': '' }}><a href="{{route('add_sub_menu')}}"><i class="fa fa-circle-o"></i>Thêm mới sub menu</a></li>
                </ul>
            </li>
            <li class="treeview {{ (isset($menu_active) &&  in_array($menu_active,['product', 'product-add'])) ? 'active menu-open': '' }}">
                <a href="javascript:;">
                    <i class="fa fa-files-o"></i> <span>Quản lý sản phẩm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {{ (isset($menu_active) && ($menu_active == 'product')) ? 'class=active': '' }}><a href="{{route('list_product')}}"><i class="fa fa-circle-o"></i>Danh sách sản phẩm</a></li>
                    <li {{ (isset($menu_active) && ($menu_active == 'product-add')) ? 'class=active': '' }}><a href="{{route('add_product')}}"><i class="fa fa-circle-o"></i>Thêm sản phẩm</a></li>
                </ul>
            </li>
            <li class="treeview {{ (isset($menu_active) &&  in_array($menu_active,['banner', 'banner-add'])) ? 'active menu-open': '' }}">
                <a href="javascript:;">
                    <i class="fa fa-laptop"></i> <span>Quản lý banner</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {{ (isset($menu_active) && ($menu_active == 'banner')) ? 'class=active': '' }}><a href="{{route('list_banner')}}"><i class="fa fa-circle-o"></i>Danh sách banner</a></li>
                    <li {{ (isset($menu_active) && ($menu_active == 'banner-add')) ? 'class=active': '' }}><a href="{{route('add_banner')}}"><i class="fa fa-circle-o"></i>Thêm banner</a></li>
                </ul>
            </li>
            <li {{ (isset($menu_active) && ($menu_active == 'setting')) ? 'class=active': '' }}>
                <a href="">
                    <i class="fa fa-cogs"></i> <span>Cài đặt</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>