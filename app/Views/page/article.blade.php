@extends('main-page')
@section('content')
    <div class="page">
        <div class="container">
            <h2 class="entry-title">Article</h2>
            {{-- <p>Dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi.</p> --}}

            <div class="filterable-items">
                @foreach($articels as $a)
                    <div class="project-item filterable-item">
                        <figure class="featured-image">
                            <a href=""><img src="{{ base_url }}banners/{{ $a['foto'] }}" alt="{{ $a['judul'] }}"></a>
                            <figcaption>
                                <h2 class="project-title"><a href="#">{{ $a['judul'] }}</a></h2>
                                <p class="project-subtotle">{{ $a['sub_judul'] }}</p>
                                <a href="#" class="more-link"><img src="{{ base_url }}assets/images/arrow.png" alt=""></a>
                            </figcaption>
                        </figure>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection