@extends('admin.master')

@section('content')

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
        <table id="dataTable" class="table table-bordered table-striped">
        	@stack('dataTable')
          
        </table>
              </div>
            </div>
          </div>



@endsection

