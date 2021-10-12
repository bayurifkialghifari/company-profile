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
				<div class="col-md-4">
					
					<h3 class="section-title">About Us</h3>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam aperiam eaque ipsa quae illo inventore veritatis quasi architecto beatae vitae dicta explicabo nemo ipsam voluptatem quia voluptas aspernatur.</p>
					<a href="#" class="button">Read more</a>
					
				</div>
				<div class="col-md-4">
					
					<h3 class="section-title">High QUality</h3>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam aperiam eaque ipsa quae illo inventore veritatis quasi architecto beatae vitae dicta explicabo nemo ipsam voluptatem quia voluptas aspernatur.</p>
					<a href="#" class="button">Read more</a>
					
				</div>
				<div class="col-md-4">
					
					<h3 class="section-title">Safety Control</h3>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam aperiam eaque ipsa quae illo inventore veritatis quasi architecto beatae vitae dicta explicabo nemo ipsam voluptatem quia voluptas aspernatur.</p>
					<a href="#" class="button">Read more</a>
					
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
						<li>
							<div class="date">30.09.2014</div>
							<h3 class="entry-title"><a href="#">Adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim...</a></h3>
						</li>
						<li>
							<div class="date">30.09.2014</div>
							<h3 class="entry-title"><a href="#">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia consequuntur...</a></h3>
						</li>
					</ul>
				</div>
			</div> <!-- .row -->
			
		</div> <!-- .container -->
	</div> <!-- .fullwidth-block -->
@endsection