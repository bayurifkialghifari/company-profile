@php
    
    use App\Models\Websites;

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
@endphp

@extends('main-page')
@section('content')
	<div class="fullwidth-block latest-projects-section">
		<div class="container">
			<h2 class="section-title">Our latest projects</h2>
			<div class="row">
				@foreach($portofolios as $p)
				<div class="col-sm-6 col-md-3">
					<div class="project">
						<figure class="project-thumbnail"><img src="{{ base_url }}portofolios/{{ $p['foto'] }}" alt="{{ $p['judul'] }}"></figure>
						<h3 class="project-title"><a href="#">{{ $p['judul'] }}</a></h3>
						<small class="project-subtitle">{{ $p['sub_judul'] }}</small>
						<p>{{ $p['deskripsi'] }}</p>
						<a href="#" class="more-link"><img src="{{ base_url }}assets/images/arrow.png" alt=""></a>
					</div>
				</div>
				@endforeach
			</div> <!-- .row -->
		</div> <!-- .container -->
	</div> <!-- .fullwidth-block.latest-projects-section -->

	<div class="fullwidth-block image-block" data-bg-image="{{ base_url }}assets/dummy/section-img.png"></div>

	<div class="fullwidth-block">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					
					<h3 class="section-title">About Us</h3>
					<p>
						{{ $webs['company_name'] }} adalah perusahaan konsultan mandiri yang
						bediri sejak tahun 2020 & berkembang hingga
						saat ini. Perusahaan ini telah lebih dari 1 tahun
						berkarya dan sangat berperan aktif dalam
						pembangunan di tanah air.
					</p>

					<p>
						<i><b>" SOLUSI TERBAIK UNTUK KONSTRUKSI,
							PERAWATAN GEDUNG, MEKANIKAL
							ELEKTEIKAL "</b></i>
					</p>
					<a href="{{ base_url }}about-us" class="button">Read more</a>
					
				</div>
			</div>

			<hr class="separator">

			<div class="row">
				<div class="col-md-6">
					<h2 class="section-title">Testimonials</h2>
					<div class="testimonial-slider">
						<ul class="slides">
							@foreach($testimonials as $t)
								<li>
									<blockquote>
										<p>{{ $t['deskripsi'] }}</p>
										<cite>{{ $t['penulis'] }}</cite>
									</blockquote>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="col-md-6">
					<h2 class="section-title">Articels</h2>
					<ul class="news">
						@foreach($articels as $ar)
							<li>
								<div class="date">{{ date_format(date_create($ar['created_at']), 'Y-m-d') }}</div>
								<h3 class="entry-title"><a href="{{ base_url }}articel/{{ $ar['judul'] }}|{{ $ar['id'] }}">{{ $ar['judul'] }}</a></h3>
							</li>
						@endforeach
					</ul>
				</div>
			</div> <!-- .row -->
			
		</div> <!-- .container -->
	</div> <!-- .fullwidth-block -->
@endsection