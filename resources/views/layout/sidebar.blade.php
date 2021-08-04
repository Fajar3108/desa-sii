<div id="left-sidebar" class="sidebar">
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ auth()->user()->name }}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account">
                    <li><a href="{{ route('users.show') }}"><i class="icon-user"></i>My Profile</a></li>
                    <li class="divider"></li>
                    <li>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button class="btn btn-danger text-white  btn-block"><i class="icon-power mr-2"></i>Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Tab panes -->
        <div class="tab-content p-l-0 p-r-0">
            <div class="tab-pane active" id="menu">
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu">
                        <li class="{{ Request::segment(1) === 'dashboard' ? 'active' : null }}">
                            <a href="{{ route('dashboard') }}"><i class="icon-home"></i> <span>Dashboard</span></a>
                        </li>
                        @if (auth()->user()->role->name == 'admin')
                        <li class="{{ Request::segment(1) === 'users' ? 'active' : null }}">
                            <a href="{{ route('users.index') }}"><i class="icon-users"></i> <span>User</span></a>
                        </li>
                        <li class="{{ Request::segment(1) === 'citizen' ? 'active' : null }}">
                            <a href="{{ route('citizen.index') }}"><i class="icon-users"></i> <span>Penduduk</span></a>
                        </li>

                        @endif
                        <li class="{{ Request::segment(1) === 'category' ? 'active' : null }}">
                            <a href="/category"><i class="icon-folder"></i> <span>Album</span></a>
                        </li>
                        <li class="{{ Request::segment(1) === 'post' ? 'active' : null }}">
                            <a href="{{ route('post.index') }}"><i class="icon-folder"></i> <span>Artikel</span></a>
                        </li>
                        @if (auth()->user()->role->name == 'admin')
                        <li class="dropdown">
                            <a role="button" class="dropdown-toggle" id="dropdownMenuSetting" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-wrench"></i> <span>Pengaturan</span></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuSetting">
                                <li><a class="dropdown-item {{ Request::segment(1) === 'setting' ? 'active text-white' : null }}" href="/setting">General</a></li>
                                <li><a class="dropdown-item {{ Request::segment(1) === 'slider' ? 'active text-white' : null }}" href="/slider">Slider</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
