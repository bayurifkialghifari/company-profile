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
<div class="container">
	<div class="pull-left">

		<address>
			<strong>{{ $webs['company_name'] }}</strong>
			<p>{{ $webs['company_address'] }}</p>
		</address>

		<a href="#" class="phone">{{ $webs['company_phone'] }}</a>
	</div> <!-- .pull-left -->
	<div class="pull-right">

		<div class="social-links">

			{{-- <a href="#"><i class="fa fa-facebook"></i></a> --}}
			{{-- <a href="#"><i class="fa fa-google-plus"></i></a> --}}
			{{-- <a href="#"><i class="fa fa-twitter"></i></a> --}}
			{{-- <a href="#"><i class="fa fa-pinterest"></i></a> --}}

		</div>

	</div> <!-- .pull-right -->

	<div class="colophon">Copyright {{ date('Y') }} {{ $webs['company_name'] }}. All rights reserved.</div>
	{{-- Designed by <a href="http://www.vandelaydesign.com/" title="Designed by VandelayDesign.com" target="_blank">VandelayDesign.com</a>.  --}}

</div>