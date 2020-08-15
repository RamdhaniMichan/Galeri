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
                    <form action="{{route('user.update', $user->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama User</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                            </div>
                        </div>   
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Level</label>
                            <div class="col-sm-10">
                              <div class="form-check">
                                  <input type="radio" class="form-check-input" name="level" value="operator" 
                                    @if($user->level == 'operator')
                                        checked
                                    @endif
                                  >
                                  <label for="" class="form-check-label">Operator</label>
                              </div>
                              <div class="form-check">
                                <input type="radio" class="form-check-input" name="level" value="admin" 
                                    @if($user->level == 'admin')
                                        checked
                                    @endif
                                >
                                <label for="" class="form-check-label">Admin</label>
                              </div>
                            </div>
                        </div>  
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" name="password">
                            </div>
                        </div>    
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Password Confirmation</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" name="password_confirmation">
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