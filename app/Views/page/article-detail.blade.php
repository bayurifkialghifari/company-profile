@extends('main-page')
@section('content')
    <div class="page">
        <div class="container">
            <h2 class="entry-title">{{ $articels['judul'] }}</h2>
            <p>{{ $articels['sub_judul'] }}</p>

            <div class="filterable-items">
                <div class="filterable-item">
                    <a><img src="{{ base_url }}banners/{{ $articels['foto'] }}" alt="{{ $articels['judul'] }}" width="100%"></a>
                    <figure class="featured-image">
                        <figcaption>
                            {!! $articels['isi'] !!}
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>
@endsection