<ul class="nav navbar-nav navbar-right">
<li>
<a href="#">
<i class="glyphicon glyphicon-user text-success"></i>
{$smarty.session.nombres} {$smarty.session.apellidos}</a>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong class="caret"></strong></a>
<ul class="dropdown-menu">
<li>
<a href="/reserva/procesos/acceso?tipo=salir">Salir</a>
</li>
</ul>
</li>
</ul>