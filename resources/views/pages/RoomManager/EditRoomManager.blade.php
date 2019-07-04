
@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div id="root-title">
    <page-title>Edit Room</page-title>
</div>

<!-- /.content-header -->
<div class="content" id="root">
    <div class="row justify-content-center align-self-center">
        <div class="col-7">
          @include('/includes/messages')
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Room details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{url('/update-room')}}/{{$room->id}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="room_name">Room Name</label>
                    <input type="text" class="form-control" id="room_name" name="room_name" placeholder="" value="{{ (Session::get('room_name') ? Session::get('room_name') : $room->room_name) }}">
                    @if ($errors->has('room_name'))
                        <div class="alert alert-danger custom-alert-error" role="alert">
                            {{ $errors->first('room_name') }}
                        </div>
                    @endif 
                  </div>
                  <div class="form-group">
                    <label for="hotel_id">Hotel</label>
                    <select class="form-control" id="hotel_id" name="hotel_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                      <option selected="selected" value="{{$room->hotel_id}}">{{$room->hotelRef->name}}</option>
                      @foreach($hotels as $hotel)
                        <?php $selected = '';?>
                        @if(Session::get('hotel_id') && Session::get('hotel_id')==$hotel->id )
                          <?php $selected = 'selected';?>
                        @endif
                         <option <?php echo $selected;?> value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('hotel_id'))
                        <div class="alert alert-danger custom-alert-error" role="alert">
                            {{ $errors->first('hotel_id') }}
                        </div>
                    @endif                  
                  </div>
                  <div class="form-group">
                    <label for="room_type">Room Type</label>
                    <select class="form-control" id="room_type" name="room_type" style="width: 100%;" tabindex="-1" aria-hidden="true">
                      <option selected="selected" value="{{$room->roomTypeRef->id}}">{{$room->roomTypeRef->name}}</option>
                      @foreach($room_types as $type)
                        <?php $selected = '';?>
                        @if(Session::get('room_type') && Session::get('room_type')==$type->id )
                          <?php $selected = 'selected';?>
                        @endif
                         <option <?php echo $selected;?> value="{{ $type->id }}">{{ $type->name }}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('room_type'))
                        <div class="alert alert-danger custom-alert-error" role="alert">
                            {{ $errors->first('room_type') }}
                        </div>
                    @endif   
                  </div>
                  <div class="form-group">
                    <label for="room_image">Room Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" onchange="readURL(this)" class="custom-file-input" id="room_image" name="room_image" >
                        <label class="custom-file-label" for="room_image">Choose Photo</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                    @if ($errors->has('room_image'))
                        <div class="alert alert-danger custom-alert-error" role="alert">
                            {{ $errors->first('room_image') }}
                        </div>
                    @endif 
                    <?php
                    $link = (($errors->has('room_image')) ? asset('/storage/upload/roomImage/noimage.jpg') : asset('/storage/upload/roomImage').'/'. $room->room_image);
                    ?>
                    <div class="preview-wrapper">
                      <img id="preview" src="{{$link}}" alt="Room Image" /> 
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-flat">Update</button>
                  <a href="{{ url('/room-manager') }}"><button type="button" class="btn btn-secondary btn-flat">Back to list</button></a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection

