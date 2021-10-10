@php
    
    use App\Core\Request;
    use App\Models\Websites;
    use App\Models\Banners;

    $websites = Websites::all();
    $webs = [];

    foreach($websites as $r)
    {
    	$webs[$r['name']] = $r['content']; 

    	if($r['name'] == 'website_logo')
    	{
    		$logo_desc = $r['deskripsi'];
    	}
    }

    $banner = (new Banners)->select('banners.*, pages.nama as page')
	->leftJoin('pages', 'banners.page_id', 'pages.id')
	->where('pages.nama', $class)
	->get();
@endphp

<!DOCTYPE html>
<html lang="id-ID">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		<link rel="shortcut icon" href="{{ base_url }}assets/admin/img/favicon.ico"/>
				
		<title>{{ $webs['website_name'] }} | {{ isset($title) ? $title : '' }}</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400|" rel="stylesheet" type="text/css">
		<link href="{{ base_url }}assets/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="{{ base_url }}assets/style.css">
		
		<!--[if lt IE 9]>
		<script src="{{ base_url }}assets/js/ie-support/html5.js"></script>
		<script src="{{ base_url }}assets/js/ie-support/respond.js"></script>
		<![endif]-->
		<meta content="{{ $webs['website_keyword'] }}" name="keywords">
		<meta content="" name="description">
		<meta content="{{ $webs['website_author'] }}" name="author">
		<meta property="og:locale" content="{{ $webs['og_locale'] }}">
		<meta property="og:site_name" content="{{ $webs['website_name'] }}">
		<meta property="og:title" content="{{ $webs['og_title'] }}">
		<meta property="og:type" content="{{ $webs['og_type'] }}">
		<meta property="og:url" content="{{ base_url }}{{ isset($_GET['url']) ? $_GET['url'] : ''  }}"> 
		<meta property="og:description" content="{{ $webs['og_description'] }}">
		<link rel="schema.DC" href="http://purl.org/dc/elements/1.1/">
		<meta name="DC.title" content="{{ $webs['website_name'] }}"> 
		<meta name="DC.publisher" content="{{ $webs['website_author'] }}"> 
		<meta name="DC.publisher.url" content="{{ base_url }}"> 
		<meta name="DC.description" content="{{ $webs['og_description'] }}"> 
		<meta name="DC.subject" content=""> 
		<meta name="DC.creator.name" content="{{ $webs['website_author'] }}"> 
		<meta name="DC.language" content="{{ $webs['og_locale'] }}"> 

	</head>


	<body>
		
		<div id="site-content">
			<div class="site-header">
				<div class="container">
					<a href="#" id="branding">
						<img src="{{ base_url }}assets/images/{{ $webs['website_logo'] }}" alt="{{ $logo_desc }}" class="logo">
						<div class="logo-text">
							<h1 class="site-title">{{ $webs['website_name'] }}</h1>
							<small class="site-description">{{ $webs['website_tagline'] }}</small>
						</div>
					</a> <!-- #branding -->

					<!-- Default snippet for navigation -->
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							@include('partials._navbar')
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>
				</div>
			</div> <!-- .site-header -->

			@if($banner->num_rows > 0)
			<div class="hero hero-slider">
				<ul class="slides">
					@foreach($banner as $banner)
						<li data-bg-image="{{ base_url }}banners/{{ $banner['foto'] }}">
							<div class="container">
								<div class="slide-title">
									@if($banner['nama'] != '' || $banner['nama'] != '-')
										<span>{{ $banner['nama'] }}</span> <br>
									@endif
									@if($banner['deskripsi'] != '' || $banner['deskripsi'] != '-')
										<span>{{ $banner['deskripsi'] }}</span>
									@endif
								</div>
							</div>
						</li>
					@endforeach
				</ul> <!-- .slides -->
			</div> <!-- .hero-slider -->
			@endif

			<main class="main-content">
				@yield('content')
			</main> <!-- .main-content -->

			<footer class="site-footer">
				@include('partials._footer')
			</footer> <!-- .site-footer -->
		</div>

		<script src="{{ base_url }}assets/js/jquery-1.11.1.min.js"></script>
		<script src="{{ base_url }}assets/js/plugins.js"></script>
		<script src="{{ base_url }}assets/js/app.js"></script>
		
	</body>

</html>