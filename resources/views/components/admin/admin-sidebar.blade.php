<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth()->user()->photo }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('user.profile', auth()->user()->id) }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                @if (auth()->user()->userHasRole('super-admin'))
                    <li class="nav-item menu-open">
                        <a href="{{ route('admin.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <x-admin.sidebar_link.admin-sidebar-department-link></x-admin.sidebar_link.admin-sidebar-department-link>

                    <x-admin.sidebar_link.admin-sidebar-doctor-link></x-admin.sidebar_link.admin-sidebar-doctor-link>

                    <x-admin.sidebar_link.admin-sidebar-staff-link></x-admin.sidebar_link.admin-sidebar-staff-link>

                    <x-admin.sidebar_link.admin-sidebar-service-link></x-admin.sidebar_link.admin-sidebar-service-link>
                @endif

                @if (auth()->user()->userHasRole('super-admin') ||
                        auth()->user()->userHasRole('doctor'))
                    <!-- <x-admin.sidebar_link.admin-sidebar-patient-link></x-admin.sidebar_link.admin-sidebar-patient-link> -->
                @endif

                @if (auth()->user()->userHasRole('doctor'))
                    <x-admin.sidebar_link.admin-sidebar-appointment-link></x-admin.sidebar_link.admin-sidebar-appointment-link>
                @endif

                @if (auth()->user()->userHasRole('staff'))
                    <x-admin.sidebar_link.admin-sidebar-appointment-link></x-admin.sidebar_link.admin-sidebar-appointment-link>
                @endif

                <x-admin.sidebar_link.admin-sidebar-profile-link></x-admin.sidebar_link.admin-sidebar-profile-link>
                <x-admin.sidebar_link.admin-sidebar-patient-link></x-admin.sidebar_link.admin-sidebar-patient-link>

                <!-- <li class="nav-item menu-open">
                    <a href="{{ route('admin.message.doctor') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Message Doctor
                        </p>
                    </a>
                </li> -->

            </ul>
        </nav>

    </div>

</aside>
