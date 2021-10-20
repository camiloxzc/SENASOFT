<div class="sidebar" data-color="purple" data-background-color="white">
    {{-- Logo --}}
    <div class="logo">
        <a href="" class="simple-text logo-normal">
            @lang('app.name')
        </a>
    </div>

    {{-- Nav --}}
    <div class="sidebar-wrapper">
        <ul class="nav">
                    <li class="nav-item {{ Route::is('()') ? 'active' : '' }}">
                        <a class="nav-link" href="#">
                            <i class="material-icons"></i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Route::is('()') ? 'active' : '' }}">
                        <a class="nav-link" href="#">
                            <i class="material-icons"></i>
                            <p>Historias</p>
                        </a>
                    </li>
        </ul>
    </div>
</div>
