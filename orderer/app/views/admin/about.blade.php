<h3>Algemeen</h3>
<p>Orderer werd ontwikkeld door <a href="https://github.com/rubenvanassche">Ruben Van Assche</a>.
<p>Dank aan: Laravel, Bootstrap, jQuery, Bootswatch, Sir-Trevor-Js
<h3>Systeem</h3>
<p><b>Orderer Versie:</b> 1.2</p>
<p><b>Laravel Versie:</b> 4.2</p>
<p><b>MySQL Versie:</b> {{$mysql_version}}</p>
<p><b>PHP Versie:</b> {{phpversion()}}</p>
<p><b>PHP Extensies:</b>
@foreach( get_loaded_extensions() as $extension)
	{{$extension}},
@endforeach<p>
<p><b>PHP Magic Quotes Ingeschakeld:</b>
@if(get_magic_quotes_gpc())
<span color="red">JA</span>
@else
Nee
@endif
</p>
<h3>License</h3>
<a href="{{url('admin/license')}}">Read</a>