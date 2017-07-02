<!-- Header Navbar -->
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="hidden-xs">{{ ucfirst(Auth::user()->name) }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    <span class="glyphicon glyphicon-log-out" area-hidden="true"></span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
</nav>