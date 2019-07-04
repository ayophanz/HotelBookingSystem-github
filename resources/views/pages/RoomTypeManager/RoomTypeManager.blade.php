

@extends('layouts.master')

@section('content')


<!-- Content Header (Page header) -->
<div id="root-title">
    <page-title>Room Type Manager</page-title>
</div>

<!-- /.content-header -->
<div class="content">
    <div class="row justify-content-center align-self-center">
        <div class="col-8">
          <div class="row">
            <div class="col-12">
              @include('/includes/messages')
            </div>
          </div>
        	<div class="row">
				<div class="col-md-2">
					<a href="{{ url('/new-room-type') }}"><button type="button" class="btn btn-block btn-success btn-flat"><i class="fas fa-plus-square"></i> Add</button></a>
				</div>
			</div>
            <div class="card">
              <div class="card-header">List of room types</h3>

                <div class="card-tools">
                </div>
              </div>
              <!-- /.card-header -->

              <div class="card-body table-responsive p-0" id="root">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Room Type Name</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($roomTypes as $type)
                        <tr>
                            <td>{{$type->name}}</td>
                            <td>
                              <a href="{{url('edit-room-type')}}/{{$type->id}}">
                                <button type="button" data-id="{{$type->id}}" class="btn btn-edit btn-primary btn-flat btn-block"><i class="fas fa-edit"></i> Edit</button>
                              </a>
                            </td>
                            <td>
                              <a href="{{url('delete-room-type')}}/{{$type->id}}">
                                <button type="button" class="btn btn-danger btn-flat btn-block"><i class="fas fa-trash-alt"></i> Delete</button>
                              </a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </div>
</div>
@endsection


