<!-- Main Sidebar Container -->
<aside class="main-sidebar fixed-seidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <span class="brand-text text-center"><a href="{{ route('home') }}" class="brand-link text-decoration-none h3">
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
                    <a href="{{ route('home') }}" class="nav-link {{ (request()->is('admin/home')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Tableau de bord</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}"
                        class="nav-link {{ (request()->is('admin/users')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Clients</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('plats.index') }}"
                        class="nav-link {{ (request()->is('admin/plats')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-concierge-bell"></i>
                        <p>Plats</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('commandes.index') }}"
                        class="nav-link {{ (request()->is('admin/commandes')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>Commande</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.avis') }}"
                        class="nav-link {{ (request()->is('admin/avis')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-star"></i>
                        <p>Avis</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
