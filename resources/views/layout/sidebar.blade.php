<div id="left-sidebar" class="sidebar">
    <div class="sidebar-scroll">
        <div class="user-account">
            <img src="{{ asset('assets/img/user.png') }}" class="rounded-circle user-photo" alt="User Profile Picture">
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ auth()->user()->name }}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account">
                    <li><a href=""><i class="icon-user"></i>My Profile</a></li>
                    <li><a href=""><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="{{route('logout')}}"><i class="icon-power"></i>Logout</a></li>
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
                        <li class="{{ Request::segment(1) === 'citizen' ? 'active' : null }}">
                            <a href="{{ route('citizen.index') }}"><i class="icon-users"></i> <span>Penduduk</span></a>
                        </li>
                        <li class="{{ Request::segment(1) === 'family' ? 'active' : null }}">
                            <a href="{{ route('family.index') }}"><i class="icon-heart"></i> <span>Keluarga</span></a>
                        </li>
                        <li class="{{ Request::segment(1) === 'gallery' ? 'active' : null }}">
                            <a href="{{ route('gallery.index') }}"><i class="icon-camera"></i> <span>Gallery</span></a>
                        </li>
                        <li class="{{ Request::segment(1) === 'category' ? 'active' : null }}">
                            <a href="/category"><i class="icon-folder"></i> <span>Album</span></a>
                        </li>
                        <li class="{{ Request::segment(1) === 'post' ? 'active' : null }}">
                            <a href="{{ route('post.index') }}"><i class="icon-folder"></i> <span>Artikel</span></a>
                        </li>
                        <li class="{{ Request::segment(1) === 'setting' ? 'active' : null }}">
                            <a href="/setting"><i class="icon-wrench"></i> <span>Pengaturan</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
