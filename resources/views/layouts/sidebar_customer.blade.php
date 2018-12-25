<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if(Auth::check())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('user.png') }} " class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ \Auth::user()->name  }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>


            <!-- search form (Optional) -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
                </div>
            </form>
            <!-- /.search form -->
        @endif
    <!-- Sidebar Menu -->
        @if(Auth::check() and Auth::user()->role='customer')
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">CUSTOMER MENU</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Tes Menu Customer</span></a></li>
                <li class="active"><a href="{{ url('/invoice/list') }}"><i class="fa fa-link"></i> <span>List Pesanan Anda</span></a></li>
            </ul>
        @endif

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>
            <li class="active"><a href="{{ url('/') }}"><i class="fa fa-link"></i> <span>Home</span></a></li>

            <li><a href="{{ url('/shopping-cart') }}"><i class="fa fa-link"></i> <span>Shopping Cart</span></a></li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span>Category Product</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @foreach(\App\Category::all() as $category)
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o"></i>
                                <span>{{ $category->name }} ({{ $category->products()->count() }})</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>




        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
