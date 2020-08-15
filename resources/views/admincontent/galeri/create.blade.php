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
                    @if(count($errors) > 0)
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form action="{{route('galeri.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="nama_galeri" placeholder="Isikan Nama Album">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Album</label>
                            <div class="col-sm-10">
                              <select name="id_album" class="form-control" id="">
                                <option value="" selected>Pilih Album</option>
                                @foreach($album as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_album }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                              <textarea name="keterangan" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>   
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Upload Foto</label>
                            <div class="col-sm-10">
                             <input type="file" class="form-control" name="foto">
                            </div>
                        </div>   
                        <div class="form-group row">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="/galeri" class="btn btn-warning">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection