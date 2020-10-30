<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>

    </form>
    <ul class="navbar-nav navbar-right">
        @if (auth()->user()->hasRole(['super admin', 'admin']))
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link notification-toggle nav-link-lg beep" aria-expanded="false"><i
                    class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifications
                    {{-- <div class="float-right">
                    <a href="#">Mark All As Read</a>
                </div> --}}
                </div>
                <div class="dropdown-list-content dropdown-list-icons"
                    style="overflow: hidden; outline: currentcolor none medium; touch-action: none;" tabindex="3">
                    @foreach ($notifications as $item)
                    <a href="{{ $item->url }}" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-icon bg-primary text-white">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            {{ $item->action }}
                            <div class="time text-primary">{{ $item->created_at }}</div>
                        </div>
                    </a>

                    @endforeach

                </div>
                {{-- <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
            </div> --}}
                <div id="ascrail2002" class="nicescroll-rails nicescroll-rails-vr"
                    style="width: 9px; z-index: 1000; cursor: default; position: absolute; top: 58px; left: 341px; height: 350px; touch-action: none; opacity: 0.3; display: none;">
                    <div style="position: relative; top: 0px; float: right; width: 7px; height: 307px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px; touch-action: none;"
                        class="nicescroll-cursors"></div>
                </div>
                <div id="ascrail2002-hr" class="nicescroll-rails nicescroll-rails-hr"
                    style="height: 9px; z-index: 1000; top: 399px; left: 0px; position: absolute; cursor: default; display: none; width: 341px; opacity: 0.3;">
                    <div style="position: absolute; top: 0px; height: 7px; width: 350px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px; left: 0px;"
                        class="nicescroll-cursors"></div>
                </div>
            </div>
        </li>

        @endif
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                {{-- <a href="{{ route('users.profile', Auth::user()->id) }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
                </a> --}}
                {{-- <div class="dropdown-divider"></div> --}}
                <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
