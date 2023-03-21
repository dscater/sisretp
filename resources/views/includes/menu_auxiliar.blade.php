<li class="{{request()->is('home')? 'active':''}}">
    <a title="Inicio" href="{{route('home')}}" aria-expanded="false"><span class="educate-icon educate-home icon-wrap" aria-hidden="true"></span> <span class="mini-click-non">Inicio</span></a>
</li>
<li class="{{request()->is('titulados*')? 'active':''}}">
    <a title="Titulados" href="{{route('titulados.index')}}" aria-expanded="false"><span class="educate-icon educate-student icon-wrap" aria-hidden="true"></span> <span class="mini-click-non">Titulados</span></a>
</li>
<li class="{{request()->is('carreras*')? 'active':''}}">
    <a title="Carreras" href="{{route('carreras.index')}}" aria-expanded="false"><span class="educate-icon educate-department icon-wrap" aria-hidden="true"></span> <span class="mini-click-non">Carreras</span></a>
</li>
<li class="{{request()->is('reportes*')? 'active':''}}">
    <a title="Reportes" href="{{route('reportes.index')}}" aria-expanded="false"><span class="fa fa-file-pdf icon-wrap" aria-hidden="true"></span> <span class="mini-click-non">Reportes</span></a>
</li>