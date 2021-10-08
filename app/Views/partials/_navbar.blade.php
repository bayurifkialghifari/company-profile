@php
	use App\Models\Pages;

	$pages = Pages::all();
	$url = isset($_GET['url']) ? $_GET['url'] : '/';
@endphp
@foreach($pages as $p)
	<li class="menu-item {{ $url == $p['url'] ? 'current-menu-item' : '' }}"><a href="{{ base_url }}{{ $p['url'] }}">{{ $p['nama'] }}</a></li>
@endforeach