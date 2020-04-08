@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Album</h1>
          </div><!-- /.col -->
			<div class="col-sm-6">
            <a href="{{route('album.index')}}" type="button" class="float-right btn btn-success"><i class="fa fa-folder"></i>View Albums</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
            	@include('_includes.messages')
              <div class="card-body">
                <h5 class="card-title">Upload Images</h5>
				<div class="table-responsive">
				<form action="{{route('album.update', $alb->id)}}" method="post" enctype="multipart/form-data">
          {{ method_field('PUT') }}
					<div class="form-group">
			        <label for="album_name">Album Name</label>
			        <input value="{{$alb->name}}" type="text" class="form-control" name="name" id="album_name" placeholder="Enter Album name">
			      </div>
			    <div class="form-group">
			        <label for="exampleInputFile">upload images</label>
			        <input type="file" name="images[]" id="exampleInputFile" multiple /> <span style="color: blue" > Check image size 800 x 600 (4:3)</span>
			    </div>
			    {{ csrf_field() }}
			    <button type="submit" class="btn btn-default">Submit</button>
			</form>
			</div>
              </div>
            </div>


          </div>
          <!-- /.col-md-6 -->

          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection
