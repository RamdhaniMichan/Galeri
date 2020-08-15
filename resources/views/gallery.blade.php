@extends('layouts.app')

@section('content')

<section id="album" class="py-1 text-center bg-light">
    <div class="container">
        <h3>{{$albums->nama_album}}</h3><hr>
        <div class="row">
            @foreach($galeris as $data)
            <div class="card" style="width: 13rem;">
            <a href="{{asset('images/'.$data->foto)}}" data-lightbox="image-1"
                data-title="{{$data->keterangan}}">
                <img src="{{asset('images/'.$data->foto)}}" alt="" class="card-img-top"
                    style="width: 200px; height: 150px;">
                <div class="card-body">
                    <h6 class="card-title">{{$data->nama_galeri}}</h6></a>
                    <a href="{{route('like.foto', $data->id)}}"
                        class="btn btn-primary btn-sm"><i class="fa fa-thumb-up">Like</i>
                        <span class="badge badge-light">{{$data->suka}}</span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
           <div>{{$galeris->links()}}</div>
        </div>
    </div>
</section>

@endsection