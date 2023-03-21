<li class="{{request()->is('home')? 'active':''}}">
    <a title="Inicio" href="{{route('home')}}" aria-expanded="false"><span class="educate-icon educate-home icon-wrap" aria-hidden="true"></span> <span class="mini-click-non">Inicio</span></a>
</li>
<li class="{{request()->is('titulados*')? 'active':''}}">
    <a title="Lista de titulados" href="{{route('titulados.index')}}" aria-expanded="false"><span class="educate-icon educate-student icon-wrap" aria-hidden="true"></span> <span class="mini-click-non">Lista de titulados</span></a>
</li>
<li class="{{request()->is('mensajes*')? 'active':''}}">
    <a title="Mensajes" href="{{route('mensajes.index')}}" aria-expanded="false"><span class="educate-icon educate-comment" aria-hidden="true"></span> <span class="mini-click-non">Mensajes</span></a>
</li>