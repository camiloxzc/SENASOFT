<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-dark bg-custom">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="#">@lang('dashboard.title')</a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="material-icons">account_circle</i>
                        <p class="d-lg-none d-md-block">
                            Account
                        </p> {{ Auth::user()->name ?? 'Testing' }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="#">@lang('auth.user.profile.title')</a>
                        <a class="dropdown-item" href="#">@lang('auth.user.setting.title')</a>
                        @auth
                        <div class="dropdown-divider"></div>
                        <a
                            class="dropdown-item"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        >
                            @lang('auth.logout.title')
                        </a>
                    </div>
                    <form id="logout-form"action="{{ route('logout') }}"method="POST" class="hidden">
                        @csrf
                    </form>
                        @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>
