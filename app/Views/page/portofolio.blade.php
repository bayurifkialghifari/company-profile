@extends('main-page')
@section('content')
    <div class="page">
        <div class="container">
            <h2 class="entry-title">adipiscing elit sed do eiusmod tempor incididunt.</h2>
            <p>Dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi.</p>

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