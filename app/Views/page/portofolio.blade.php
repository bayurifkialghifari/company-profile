@extends('main-page')
@section('content')
    <div class="page">
        <div class="container">
            <h2 class="entry-title">portofolio</h2>
            <p><br></p>

            <div class="filterable-items">
                @foreach($portofolios as $p)
                    <div class="project-item filterable-item">
                        <figure class="featured-image">
                            <a><img src="{{ base_url }}portofolios/{{ $p['foto'] }}" alt="{{ $p['judul'] }}" width="100%" height="200px"></a>
                            <figcaption>
                                <h2 class="project-title"><a href="#">{{ $p['judul'] }}</a></h2>
                                <p class="project-subtotle">{{ $p['sub_judul'] }}</p>
                                <p>{{ substr($p['deskripsi'], 0, 100) }}</p>
                                {{-- <a href="#" class="more-link"><img src="images/arrow.png" alt=""></a> --}}
                            </figcaption>
                        </figure>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection