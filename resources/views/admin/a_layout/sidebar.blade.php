<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel  mt-3 pb-3 mb-3 d-flex">

            <div class="pull-left info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('category.index')}}"><i class="fa fa-circle-o"></i>Category</a></li>
                    <li class="active"><a  href="{{route('product.index')}}"><i class="fa fa-circle-o"></i>Product</a></li>

                    <li><a href="{{route('adminuser.index')}}"><i class="fa fa-circle-o"></i> User</a></li>
                    <li><a href="{{route('productimage.index')}}"><i class="fa fa-circle-o"></i> Product Image</a></li>
                    <li><a href="{{route('pages.index')}}"><i class="fa fa-circle-o"></i> Pages</a></li>
                </ul>
            </li>
        </ul>
    </div>
            <!-- /.sidebar -->
</aside>
