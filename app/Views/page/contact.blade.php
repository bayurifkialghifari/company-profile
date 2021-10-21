@php
    
    use App\Core\Request;
    use App\Models\Websites;

    $websites = Websites::all();
    $webs = [];

    foreach($websites as $r)
    {
    	$webs[$r['name']] = $r['content']; 
    }
@endphp
@extends('main-page')
@section('content')
    <div class="page">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="map"><div class="gmap_canvas"><iframe width="800" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><style>.gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}</style></div></div>

                    <div class="contact-detail">
                        <address>
                            <div class="contact-icon">
                                <img src="{{ base_url }}assets/images/icon-marker.png" class="icon">
                            </div>
                            <p><strong>{{ $webs['company_name'] }}</strong> <br>{{ $webs['company_address'] }}</p>
                        </address>
                        <a class="phone"><span class="contact-icon"><img src="{{ base_url }}assets/images/icon-phone.png" class="icon"></span> {{ $webs['company_phone'] }}</a>
                        <a href="mailto:{{ $webs['company_mail'] }}" target="_blank" class="email"><span class="contact-icon"><img src="{{ base_url }}assets/images/icon-envelope.png" class="icon"></span> {{ $webs['company_mail'] }}</a>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-1">
                    <div class="contact-form">
                        <h2 class="section-title">Write us</h2>
                        <p>Dolores eos qui ratione voluptatem sequi nesciunt neque porro quisquam dolorem.</p>

                        <form action="#">
                            <input type="text" placeholder="Your name..">
                            <input type="text" placeholder="Email..">
                            <input type="text" placeholder="website..">
                            <textarea placeholder="Message..."></textarea>
                            <p class="text-right">
                                <button type="submit">Send message</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection