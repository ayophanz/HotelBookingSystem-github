
@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div id="root-title">
    <page-title>Add Room Type</page-title>
</div>

<!-- /.content-header -->
<div class="content" id="root">
    <div class="row justify-content-center align-self-center">
        <div class="col-7">
        	@include('/includes/messages')
        	<div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Room Type details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{url('/save-new-room-type')}}" method="post">
              	{{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="room_type_name">Room Type Name</label>
                    <input type="text" class="form-control" id="room_type_name" name="room_type_name" placeholder="">
                    @if ($errors->has('room_type_name'))
                        <div class="alert alert-danger custom-alert-error" role="alert">
                            {{ $errors->first('room_type_name') }}
                        </div>
                    @endif 
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success btn-flat">Save</button>
                  <a href="{{ url('/room-type-manager') }}"><button type="button" class="btn btn-secondary btn-flat">Back to list</button></a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection


