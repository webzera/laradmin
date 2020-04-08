@extends('admin.layouts.main')
@section('styles')
<style type="text/css">
.btn-sm{
  padding: 0.25rem 0.5rem;

font-size: 0.7875rem;

line-height: 1.5;

border-radius: 0.2rem;
}
.btn-danger {

    color: #fff;
    background-color: #e3342f;
    border-color: #e3342f;

}
</style>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Album</h1>
          </div><!-- /.col -->
			<div class="col-sm-6">
            <a href="{{route('album.create')}}" type="button" class="float-right btn btn-success"><i class="fa fa-folder"></i> Create New Album</a>
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
              <div class="card-body">
                <h5 class="card-title">Album Images</h5>
				<div class="table-responsive">
          @include('_includes.messages')
				<table class="table table-hover">
				<thead>
					<tr>
          <th>Album Name</th>				
						<th>Images</th>
            <th></th>						            
					</tr>
				</thead>
				<tbody>
          <?php foreach ($allalbum as $album): ?>
					<tr>						
						<td>{{$album->name}}</td>            
            <td>
              <div class="table-responsive">
              <table class="table table-hover">
              <thead>
                <tr>        
                  <th></th>                  
                  <th>Created</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($album->albumimages as $alimages): ?>
                <tr>
                  <td><img src="{{url('/')}}/storage/albumimages/{{ $alimages['images'] }}" height="38px" alt="image" width="100px" />
                    </td>
                  <td>{{Carbon\Carbon::parse($album->created_at)->format('d-m-Y') }}</td>            
            <td>{{$album->status}}</td>
            <td>
        <div class="columns is-mobile">
        <span class="column is-one-half">
        
        <form method="POST" action="{{route('albumimages.destroy', $alimages->id)}}"> 
          @csrf 
          {{ method_field('DELETE') }} 
          <input class="btn-sm btn btn-danger"  value="DELETE" type="submit">
          </form>
        </div>
      </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </td>
        <td>
        <div class="columns is-mobile">
        <span class="column is-one-half">
        <a href="{{route('album.edit', $album->id)}}" class="button is-primary is-fullwidth"><button type="button" class="btn btn-primary btn-sm" style="width: 61px;"> Edit </button></a></span>
        <span class="column is-one-half">
        <form method="POST" action="{{route('album.destroy', $album->id)}}"> 
          @csrf 
          {{ method_field('DELETE') }} 
          <input class="btn btn-danger btn-sm"  value="DELETE" type="submit">
          </form>          
        </li></a>
        </span>
        </div>
      </td>          						
					</tr>
					<?php  endforeach; ?>
				</tbody>
				{{$allalbum->links()}}
        </table>
        {{$allalbum->links()}}
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
