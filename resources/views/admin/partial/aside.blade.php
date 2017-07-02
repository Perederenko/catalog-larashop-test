<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ route('dashboard') }}"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
            <li><a href="{{ route('admin.categories.index') }}"><i class="fa fa-link"></i> <span>Categories</span></a></li>
            <li><a href="{{ route('admin.products.index') }}"><i class="fa fa-link"></i> <span>Products</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>