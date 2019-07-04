
@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div id="root-title">
    <page-title>Delete Room</page-title>
</div>

<!-- /.content-header -->
<div class="content" id="root">
    <div class="row justify-content-center align-self-center">
        <div class="col-7">
          <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Are you sure?</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{url('/deleting-room')}}/{{$room->id}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="room_name">Room Name</label>
                    <input type="text" class="form-control" id="room_name" name="room_name" disabled placeholder="" value="{{ $room->room_name }}">
                  </div>
                  <div class="form-group">
                    <label for="hotel_id">Hotel</label>    
                      <input type="text" class="form-control" id="hotel_id" name="hotel_id" disabled placeholder="" value="{{ $room->hotelRef->name }}">      
                  </div>
                  <div class="form-group">
                    <label for="room_type">Room Type</label>
                    <input type="text" class="form-control" id="room_type" name="room_type" disabled placeholder="" value="{{ $room->room_type }}">  
                  </div>
                  <div class="form-group">
                    <label for="room_image">Hotel Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" disabled class="custom-file-input" id="room_image" name="room_image" >
                        <label class="custom-file-label" for="room_image">Choose Photo</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                    <div class="preview-wrapper">
                      <img id="preview" src="{{asset('/storage/upload/roomImage')}}/{{$room->room_image}}" alt="your image" /> 
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-danger btn-flat"><i class="fas fa-trash-alt"></i> Delete</button>
                  <a href="{{ url('/room-manager') }}"><button type="button" class="btn btn-secondary btn-flat">Back to list</button></a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection
