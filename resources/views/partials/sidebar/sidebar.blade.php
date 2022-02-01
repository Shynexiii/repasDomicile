<!-- Main Sidebar Container -->
<aside class="main-sidebar fixed-seidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <span class="brand-text text-center"><a href="{{ route("home") }}" class="brand-link text-decoration-none h3">
        {{ config('app.name') }}
    </a></span>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Clients</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('plats.index') }}" class="nav-link ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Plats</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Commande</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
