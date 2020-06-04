<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('backend/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <?php $currentUser = Auth::user() ?>
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ $currentUser->gravatar() }}" class="img-circle elevation-2" alt="">
            </div>
            <div class="info">
                <a href="/" class="d-block">{{ $currentUser->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ url('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Blog
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('blog.index') }}" class="nav-link active">
                                <i class="fa fa-circle-o"></i>
                                All Posts
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('blog.create') }}" class="nav-link">
                                <i class="fa fa-circle-o"></i>
                                Add New
                            </a>
                        </li>




                    </ul>
                </li>


                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link active">
                                <i class="fa fa-folder-open"></i>
                                All Categories
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('categories.create') }}" class="nav-link">
                                <i class="fa fa-file-alt"></i>
                                Add New
                            </a>
                        </li>
                    </ul>
                </li>




                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link active">
                                <i class="fa fa-user-friends"></i>
                                All Users
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('users.create') }}" class="nav-link">
                                <i class="fa fa-file-alt"></i>
                                Add New
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                       onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">

                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            {{ __('Logout') }}
                        </p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
