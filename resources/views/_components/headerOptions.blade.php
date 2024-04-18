<!--
nav-link_p => para los del header escritorio
nav-link => para los del header tablet y android
-->

<ul class="links">
    <li><a href="{{ route('home') }}" class="{{ $type }}">INICIO</a></li>
    <li><a href="{{ route('calendar') }}" class="{{ $type }}">CALENDARIO</a></li>
    <li><a href="{{ route('my_team') }}" class="{{ $type }}">MI EQUIPO</a></li>
</ul>
<div class="action_btns">
    @auth
        @if (auth()->user()->role == env('ROLE_ADMIN'))
            <a class="action_btn abg" href="{{ route('admin_home') }}"><i class="fa-solid fa-briefcase"></i> ADMINISTRADOR</a>
        @endif
    @endauth

    <a href="{{ route('profile') }}" class="action_btn aby"><i class="fa-solid fa-user"></i> MI PERFIL</a>
    <a href="{{ route('logOut') }}" class="action_btn abr"><i class="fa-solid fa-right-from-bracket"></i>SALIR</a>
</div>
