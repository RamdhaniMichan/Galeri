@extends('admin.master')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data User
                    <a href="{{route('user.create')}}" class="btn btn-primary float-right"><i class="fa fa-plus"></i>Tambah User</a>
                  </h6>
                </div>
                <div class="card-body">
                    @if(Session::has('pesan'))
                    <div class="alert alert-success">
                        {{Session::get('pesan')}}
                    </div>
                    @endif
                    <table class="table table-striped">
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                        <tbody>
                            @forelse($user as $data)
                            <tr>
                            <td>{{++$no}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->level}}</td>
                            <td><a href="{{route('user.edit', $data->id)}}"><button class="btn btn-info">Edit</button></a>
                                <a href="{{route('user.destroy', $data->id)}}" onclick="return confirm('Hapus Data')"><button class="btn btn-info">Delete</button></a></td>
                            </tr>
                            @empty
                            <td colspan="5" style="text-align :center;">Empty Data</td>
                            @endforelse
                        </tbody>
                    </table>
                    {{-- <div>Jumlah Album: {{$jumlah_album}}</div> --}}
                    <div>{{$user->links()}}</div>
                </div>
            </div>
		</div>
	</div>
</div>



@endsection