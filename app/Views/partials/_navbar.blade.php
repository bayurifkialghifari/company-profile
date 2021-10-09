@php
	use App\Models\Pages;

	$pages = Pages::all();
	$url = isset($_GET['url']) ? $_GET['url'] : '/';
@endphp
@foreach($pages as $p)
	<li class="menu-item 
		{{ ($url == substr($p['url'], 1)) || ($url == '/' && $p['nama'] == 'Home') 
			? 'current-menu-item' 
			: '' }}"
	>
		<a href="{{ base_url }}{{ substr($p['url'], 1) }}">{{ $p['nama'] }}</a>
	</li>
@endforeach