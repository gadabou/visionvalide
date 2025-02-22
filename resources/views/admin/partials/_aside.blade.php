<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('admin-assets/dist/img/AdminLTELogo.png') }}" alt="Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">
            VISION VALIDE
        </span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin-assets/dist/img/avatar.png') }}" class="img-circle elevation-2"
                    alt="Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><b>{{ auth()->user()?->name ?: 'Unauthencated' }}</b></a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                       class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.sliders.index') }}"
                       class="nav-link {{ Route::is('admin.sliders.*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-image"></i>
                        <p>Carousels</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.tags.index') }}"
                       class="nav-link {{ Route::is('admin.tags.*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>Tags</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}"
                       class="nav-link {{ Route::is('admin.categories.*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>Categories</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.products.index') }}"
                       class="nav-link {{ Route::is('admin.products.*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-table"></i>
                        <p>Produits</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.images.index') }}"
                       class="nav-link {{ Route::is('admin.images.*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-images"></i>
                        <p>Images</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.publicities.index') }}"
                       class="nav-link {{ Route::is('admin.publicities.*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-video"></i>
                        <p>Publicités</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
