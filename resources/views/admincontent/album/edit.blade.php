@extends('admin.master')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('album.update', $album->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Album</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_album" value="{{$album->nama_album}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-10">
                                <img src="{{asset('images/'.$album->gambar)}}" style="width: 100px;" alt="">
                            </div>
                        </div>   
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Ganti Gambar</label>
                            <div class="col-sm-10">
                            <input type="file" class="form-control" name="gambar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="/album" class="btn btn-warning">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
</div>



@endsection