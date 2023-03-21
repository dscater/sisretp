<li class="{{request()->is('home')? 'active':''}}">
    <a title="Inicio" href="{{route('home')}}" aria-expanded="false"><span class="educate-icon educate-home icon-wrap" aria-hidden="true"></span> <span class="mini-click-non">Inicio</span></a>
</li>
@if(Auth::user()->status == 1 && !Auth::user()->titulado)
<li class="{{request()->is('titulados*')? 'active':''}}">
    <a title="Mi perfil" href="{{route('titulados.create')}}" aria-expanded="false"><span class="educate-icon educate-student icon-wrap" aria-hidden="true"></span> <span class="mini-click-non">Mi perfil</span></a>
</li>
@endif
@if(Auth::user()->status == 1 && Auth::user()->titulado)
<li class="{{request()->is('titulados/show*')? 'active':''}}">
    <a title="Mi perfil" href="{{route('titulados.show',Auth::user()->titulado->id)}}" aria-expanded="false"><span class="educate-icon educate-student icon-wrap" aria-hidden="true"></span> <span class="mini-click-non">Mi perfil</span></a>
</li>
<li class="{{request()->is('titulados/edit*')? 'active':''}}">
    <a title="Editar perfil" href="{{route('titulados.edit',Auth::user()->titulado->id)}}" aria-expanded="false"><span class="fa fa-edit" aria-hidden="true"></span> <span class="mini-click-non">Editar perfil</span></a>
</li>
<li class="{{request()->is('mensajes*')? 'active':''}}">
    <a title="Mensajes" href="{{route('mensajes.index')}}" aria-expanded="false"><span class="educate-icon educate-message icon-wrap" aria-hidden="true"></span> <span class="mini-click-non">Mensajes</span></a>
</li>
@endif