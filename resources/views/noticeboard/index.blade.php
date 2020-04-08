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
            <h1 class="m-0 text-dark">Notice Board</h1>
          </div><!-- /.col -->
			<div class="col-sm-6">
            {{-- <a href="{{route('noticeboard.create')}}" type="button" class="float-right btn btn-success"><i class="fa fa-folder"></i> Create Notice Board</a> --}}

          <!-- Button to Open the Modal -->
<button type="button" class="float-right btn btn-success" data-toggle="modal" data-target="#myModal">
  <i class="fa fa-folder"></i> Create Notice Board
</button>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Notice Board Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="{{route('noticeboard.store')}}" enctype="multipart/form-data" method="post">
      {{ csrf_field() }}
        <div class="row">
          <div class="col-md-6">          
            <div class="form-group">
            <label for="notice_title">Notice Title</label>
            <input type="text" class="form-control{{ $errors->has('notice_title') ? ' is-invalid' : '' }}" name="notice_title" id="notice_title" placeholder="Enter notice title" required>
            </div>

            <div class="form-group">
            <label for="notice_class">Notice Class</label>
            <select name="notice_class" id="notice_class" class="form-control{{ $errors->has('notice_class') ? ' is-invalid' : '' }}" required>
                        <option value="999">--All class--</option>
                        <?php $allstandards=App\Standardlist::all(); ?>
                         @foreach ($allstandards as $row)
                          <option value="{{ $row->std_name }}">{{ $row->std_name }}</option>
                        @endforeach                   
                        </select>
            
            </div>
          </div>
          <div class="col-md-6">          
            <div class="form-group">
            <label for="notice_date">Notice Date</label>
            <input type="date" class="form-control{{ $errors->has('notice_content') ? ' is-invalid' : '' }}" name="notice_date" id="notice_date" required>
            </div>
            <div class="form-group">
            <label for="notice_section">Notice Section</label>
            <select name="notice_section" id="notice_section" class="form-control{{ $errors->has('notice_section') ? ' is-invalid' : '' }}" required>
                        <option value="999">--All section--</option>
                        <?php $allsections=App\Sectionlist::all(); ?>
                         @foreach ($allsections as $row)
                          <option value="{{ $row->sec_name }}">{{ $row->sec_name }}</option>
                        @endforeach                   
                        </select>
            
            </div>
          </div>
        </div>      

      <div class="form-group">
        <label for="notice_content">Content</label>
        <textarea required class="form-control{{ $errors->has('notice_content') ? ' is-invalid' : '' }}" rows="3" name="notice_content" placeholder="Enter content of the notice"></textarea>        
      </div>
     
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success float-right">Submit</button>        
      </div>
        </form>
    </div>
  </div>
</div>





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
              @include('flash::message')
                <h5 class="card-title">Notice Board List</h5>

				<div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th>Title</th>      
      <th>Content</th>
      <th>Date</th>
      <th>Class</th>
      <th>Section</th>      
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($allnoticeboard as $noticeboard): ?>
      <tr>
      <td>{{$noticeboard->notice_title}}</td>
      <td>{{$noticeboard->notice_content}}</td>
      <td>{{$noticeboard->notice_date}}</td>
      <td>{{$noticeboard->notice_class}}</td>      
      <td>{{$noticeboard->notice_section}}</td>            
      <td>
        <div class="columns is-mobile">
        <div class="column is-one-half">
          <button data-toggle="modal" data-target="#myModal{{$noticeboard->id}}" type="button" class="btn btn-primary btn-sm" > Edit </button>        
        </div>
        <span class="column is-one-half">
        <form method="POST" action="{{route('noticeboard.destroy', $noticeboard->id)}}"> 
          @csrf 
          {{ method_field('DELETE') }} 
          <input class="btn-sm btn btn-danger"  value="Delete" type="submit">
          </form>          
        </li></a>
        </span>
        </div>

        {{-- for noticeboard edit --}}
        <div class="modal" id="myModal{{$noticeboard->id}}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">{{$noticeboard->notice_title}} Details</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form action="{{route('noticeboard.update', $noticeboard->id)}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
              <div class="row">
                <div class="col-md-6">          
                  <div class="form-group">
                  <label for="notice_title">Notice Title</label>
                  <input value="{{$noticeboard->notice_title}}" type="text" class="form-control{{ $errors->has('notice_title') ? ' is-invalid' : '' }}" name="notice_title" id="notice_title" placeholder="Enter notice title" required>
                  </div>

                  <div class="form-group">
                  <label for="notice_class">Notice Class</label>
                  <select name="notice_class" id="notice_class" class="form-control{{ $errors->has('notice_class') ? ' is-invalid' : '' }}" required>
                        <option value="999">--All class--</option>
                        <?php $allstandards=App\Standardlist::all(); ?>
                         @foreach ($allstandards as $row)
                          <option <?php  if($noticeboard) if($noticeboard->notice_class==$row->std_name) { ?>selected <?php } ?> value="{{ $row->std_name }}">{{ $row->std_name }}</option>
                        @endforeach                   
                        </select>                  
                  </div>
                </div>
                <div class="col-md-6">          
                  <div class="form-group">
                  <label for="notice_date">Notice Date</label>
                  <input value="{{$noticeboard->notice_date}}" type="date" class="form-control{{ $errors->has('notice_date') ? ' is-invalid' : '' }}" name="notice_date" id="notice_date" required>
                  </div>
                  <div class="form-group">
                  <label for="notice_section">Notice Section</label>
                  <select name="notice_section" id="notice_section" class="form-control{{ $errors->has('notice_section') ? ' is-invalid' : '' }}" required>
                        <option value="999">--All section--</option>
                        <?php $allsections=App\Sectionlist::all(); ?>
                         @foreach ($allsections as $row)
                          <option <?php  if($noticeboard) if($noticeboard->notice_section==$row->sec_name) { ?>selected <?php } ?> value="{{ $row->sec_name }}">{{ $row->sec_name }}</option>
                        @endforeach                   
                        </select>
                  
                  </div>
                </div>
              </div>      

            <div class="form-group">
              <label for="notice_content">Content</label>
              <textarea required class="form-control{{ $errors->has('notice_content') ? ' is-invalid' : '' }}" rows="3" name="notice_content" placeholder="Enter content of the notice">{{$noticeboard->notice_content}}</textarea>        
            </div>
     
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success float-right">Submit</button>        
        </div>
          </form>
      </div>
    </div>
  </div>
{{-- notice board edit end --}}





      </td>
    </tr>
  <?php  endforeach; ?>

  </tbody>
{{$allnoticeboard->links()}}
</table>
{{$allnoticeboard->links()}}
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

@section('scripts')

@endsection
