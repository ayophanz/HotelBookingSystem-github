
@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div id="root-title">
    <page-title>Edit Room Type Price</page-title>
</div>

<!-- /.content-header -->
<div class="content" id="root">
    <div class="row justify-content-center align-self-center">
        <div class="col-7">
          @include('/includes/messages')
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Room Type details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{url('/update-room-type-price')}}/{{$price->id}}" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="room_type_id">Room Type</label>
                    <select onchange="getRoomType(this)" class="form-control" id="room_type_id" name="room_type_id" style="width: 100%;"  tabindex="-1" aria-hidden="true">
                      <option selected="selected" value="{{$price->room_type_id}}">{{$price->roomTypeRef->name}}</option>
                      @foreach($room_types as $type)
                         <?php $selected = '';?>
                        @if(Session::get('room_type_id') && Session::get('room_type_id')==$type->id )
                          <?php $selected = 'selected';?>
                        @endif  
                         <option <?php echo $selected;?> value="{{ $type->id }}">{{ $type->name }}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('room_type_id'))
                        <div class="alert alert-danger custom-alert-error" role="alert">
                            {{ $errors->first('room_type_id') }}
                        </div>
                    @endif                  
                  </div>
                  <div class="form-group">
                    <label for="hotel_id">Hotel Name</label> 
                    <select onchange="getRoomType(this)" class="form-control" id="hotel_id" name="hotel_id" style="width: 100%;"  tabindex="-1" aria-hidden="true">
                      <option selected="selected" value="{{$price->hotel_id}}">{{$price->hotelRef->name}}</option>
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
                    <label for="room_type_price">Price</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">$</span>
                    </div>
                    <input type="text" class="form-control" id="room_type_price" name="room_type_price" placeholder="" value="{{ ( Session::get('room_type_price') ? Session::get('room_type_price') : $price->room_type_price) }}">
                    <div class="input-group-append">
                      <span class="input-group-text">.00</span>
                    </div>
                    </div>
                    @if ($errors->has('room_type_price'))
                        <div class="alert alert-danger custom-alert-error" role="alert">
                            {{ $errors->first('room_type_price') }}
                        </div>
                    @endif 
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-flat">Update</button>
                  <a href="{{ url('/price-list-manager') }}"><button type="button" class="btn btn-secondary btn-flat">Back to list</button></a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection

