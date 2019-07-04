
@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div id="root-title">
    <page-title>Delete Room Type</page-title>
</div>

<!-- /.content-header -->
<div class="content" id="root">
    <div class="row justify-content-center align-self-center">
        <div class="col-7">
          <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Are your sure?</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{url('/deleting-room-type')}}/{{$room_type->id}}" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="room_type_name">Room Type Name</label>
                    <input type="text" class="form-control" id="room_tye_name" name="room_type_name" disabled placeholder="" value="{{ $room_type->name }}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-danger btn-flat"><i class="fas fa-trash-alt"></i> Delete</button>
                  <a href="{{ url('/room-type-manager') }}"><button type="button" class="btn btn-secondary btn-flat">Back to list</button></a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection


