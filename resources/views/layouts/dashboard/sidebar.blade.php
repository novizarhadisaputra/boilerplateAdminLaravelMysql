<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href={{ route('dashboard') }}>Dashboard Page</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href={{ route('dashboard') }}>DP</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>

            @can('master data menu')
            <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
            </li>
            @endcan

            @can('master data menu')
            <li class="nav-item dropdown {{ request()->is('master-data/*')  ?'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i> <span>Master Data</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('master-data/roles') || request()->is('master-data/roles/*') ? 'active' : '' }}"><a class="nav-link" href={{ route('roles.index') }}>Roles</a></li>
                    <li class="{{ request()->is('master-data/permissions') || request()->is('master-data/permissions/*') ? 'active' : '' }}"><a class="nav-link" href={{ route('permissions.index') }}>Permissions</a></li>
                    <li class="{{ request()->is('master-data/departments') || request()->is('master-data/departments/*') ? 'active' : '' }}"><a class="nav-link" href={{ route('departments.index') }}>Departments</a></li>
                    <li class="{{ request()->is('master-data/sections') || request()->is('master-data/sections/*') ? 'active' : '' }}"><a class="nav-link" href={{ route('sections.index') }}>Sections</a></li>
                    {{-- <li class="{{ request()->is('master-data/status-work-order') || request()->is('master-data/status-work-order/*') ? 'active' : '' }}"><a class="nav-link" href={{ route('status-work-order.index') }}>Status Work Order</a></li> --}}
                    {{-- <li class="{{ request()->is('master-data/status-abnormality') || request()->is('master-data/status-abnormality/*') ? 'active' : '' }}"><a class="nav-link" href={{ route('status-abnormality.index') }}>Status Abnormality</a></li> --}}
                    <li class="{{ request()->is('master-data/categories') || request()->is('master-data/categories/*') ? 'active' : '' }}"><a class="nav-link" href={{ route('categories.index') }}>Categories</a></li>
                    <li class="{{ request()->is('master-data/safety-patrol-categories') || request()->is('master-data/safety-patrol-categories/*') ? 'active' : '' }}"><a class="nav-link" href={{ route('categories.index') }}>Safety Patrol Categories</a></li>
                </ul>
            </li>
            @endcan

            @can('management menu')
            <li class="nav-item dropdown {{ request()->is('management/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user-cog"></i> <span>Management</span></a>
                @can('users menu')
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('management/users') || request()->is('management/users/*') ? 'active' : '' }}"><a class="nav-link" href={{ route('users.index') }}>Users</a></li>
                </ul>
                @endcan
                @can('roles and permissions', Model::class)
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('management/roles-and-permissions') || request()->is('management/roles-and-permissions/*') ? 'active' : '' }}"><a class="nav-link" href={{ route('roles-and-permissions.index') }}>Roles and Permissions</a></li>
                </ul>
                @endcan
            </li>
            @endcan

            @can('request menu', Model::class)
            <li class="nav-item dropdown {{ request()->is('request/*') ?'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-inbox"></i> <span>Request</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('request/work-order') || request()->is('request/work-order/*') ? 'active' : '' }}"><a class="nav-link" href={{ route('work-order.index') }}>Work order</a></li>
                    <li class="{{ request()->is('request/abnormality') || request()->is('request/abnormality/*') ? 'active' : '' }}"><a class="nav-link" href={{ route('abnormality.index') }}>Abnormality</a></li>
                    <li class="{{ request()->is('request/safety-patrol') || request()->is('request/safety-patrol/*') ? 'active' : '' }}"><a class="nav-link" href={{ route('safety-patrol.index') }}>Safety Patrol</a></li>
                </ul>
            </li>
            @endcan



        </ul>
    </aside>
</div>
