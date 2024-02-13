<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-primary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <span class="d-none d-md-inline">{{ auth()->user()->name }} <i class="fa fa-power-off"></i></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <li class="user-header bg-primary">
                    <p>
                        {{ auth()->guard('admin')->user()->name }} - Administration
                        <small>Member since {{ Carbon\Carbon::parse(auth()->user()->created_at)->diffForHumans() }}</small>
                    </p>
                </li>

                <li class="user-footer">
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf

                        <button type="submit" class="btn btn-default btn-flat float-right">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
