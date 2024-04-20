<!--
nav-link_p => para los del header escritorio
nav-link => para los del header tablet y android
-->

<ul class="links">
    <li><a href="{{ route('admin_home') }}" class="{{ $type }}">INICIO</a></li>
    <li><a href="{{ route('admin_teams') }}" class="{{ $type }}">EQUIPOS</a></li>
    <li><a href="{{ route('admin_players') }}" class="{{ $type }}">JUGADORES</a></li>
    <li><a href="{{ route('admin_games') }}" class="{{ $type }}">PARTIDOS</a></li>
</ul>

<div class="action_btns">
    <a class="action_btn abg" href="{{ route('home') }}"><i class="fa-solid fa-futbol"></i> PRESIDENTE</a>
    <a href="{{ route('logOut') }}" class="action_btn abr"><i class="fa-solid fa-right-from-bracket"></i> SALIR</a>
</div>
