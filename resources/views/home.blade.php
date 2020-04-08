@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="card-deck">
          <div class="card bg-primary">
            <div class="card-body text-center">
            <a href="{{ route('slider.index') }}"><h2 class="card-text">Slider</h2></a>
            </div>
          </div>            
        </div>
        <div class="card-deck">
          <div class="card bg-success">
            <div class="card-body text-center">
            <a href="{{ route('page.index') }}"><h2 class="card-text">Pages</h2></a>
            </div>
          </div>        
                    
        </div>

{{-- <div id="app"><example-component></example-component></div> --}}
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection
