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
                    <a href="{{ route('categories.index') }}" class="nav-link ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Catégories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Produits</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('providers.index') }}" class="nav-link ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Fournisseurs</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
