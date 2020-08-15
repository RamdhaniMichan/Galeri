@extends('layouts.app')

@section('content')

<section id="album" class="py-1 text-center bg-light">
    <div class="container">
        <h3>Album</h3><hr>
        <div class="row">
            @foreach($album as $data)
            <div class="card ml-3" style="width: 13rem;">
                <a href="{{ route('galeri.foto', $data->album_seo)}}">
                    <img src="{{ asset('images/'. $data->gambar) }}" alt="{{$data->nama_album}}"
                    class="card-img-top" style="width: 200px; height: 150px"
                    >
                    <div class="car-body">
                        <h6 class="card-title">
                            {{$data->nama_album}}
                        </h6>
                        ({{$data->photos->count()}} foto)
                    </div>
                </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection