<!--
nav-link_p => para los del header escritorio
nav-link => para los del header tablet y android
-->

<ul class="links">
    <li><a href="{{ route('home') }}" class="{{ $type }}">HOME1</a></li>
    <li><a href="{{ route('homesito2') }}" class="{{ $type }}">HOME2</a></li>
    <li><a href="{{ route('homesato3') }}" class="{{ $type }}">HOME3</a></li>
    <li><a href="{{ route('homexd4') }}" class="{{ $type }}">HOME4</a></li>
</ul>

<div>
    @auth
        @if (auth()->user()->role == env('ROLE_ADMIN'))
            <a class="action_btn" href="{{ route('admin_home') }}"><i class="fa-solid fa-briefcase"></i> MI LIGA</a>
        @endif
    @endauth
    <a href="#" class="action_btn"><i class="fa-solid fa-user"></i> MI PERFIL</a>
    <a href="{{ route('logOut') }}" class="action_btn"><i class="fa-solid fa-right-from-bracket"></i> SALIR</a>
</div>
