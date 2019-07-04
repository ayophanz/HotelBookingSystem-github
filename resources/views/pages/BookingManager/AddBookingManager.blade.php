
@extends('layouts.master')

@section('content')
 <?php date_default_timezone_set('America/New_York');?>
<!-- Content Header (Page header) -->
<div id="root-title">
    <page-title>New Booking</page-title>
</div>

<!-- /.content-header -->
<div class="content" id="root">
    <div class="row justify-content-center align-self-center">
        <div class="col-7">
          @include('/includes/messages')
          <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Booking details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{url('/save-new-book')}}" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="room_name">Room</label>
                    <select class="form-control" id="room_name" name="room_name" style="width: 100%;"  tabindex="-1" aria-hidden="true">
                      <option data-price="0" value="">Please select</option>
                      @foreach($rooms as $key => $room)
                         <?php $selected = '';?>
                        @if(Session::get('room_name') && Session::get('room_name')==$room->id )
                          <?php $selected = 'selected';?>
                        @endif
                        @if($room->roomTypePriceRef && $room->hotelPriceRef)
                         <option <?php echo $selected;?> data-price="{{$room->roomTypePriceRef->room_type_price}}" value="{{$room->id}}">{{$room->room_name}} | {{$room->roomTypeRef->name}} | {{$room->hotelRef->name}} | USD: {{$room->roomTypePriceRef->room_type_price}}</option>
                         @endif
                      @endforeach
                    </select>
                    @if ($errors->has('room_name'))
                        <div class="alert alert-danger custom-alert-error" role="alert">
                            {{ $errors->first('room_name') }}
                        </div>
                    @endif 
                  </div>
                  <div class="form-group">
                    <label>Select your date</label>
                    @if(Session::get('date_range'))
                      <input type="text" class="form-control" readonly name="date_range" id="date_range" value="{{Session::get('date_range')}}" />
                    @else
                      <input type="text" class="form-control" readonly name="date_range" id="date_range" value="{{date('m/d/Y')}} - {{date('m/d/Y', time() + 86400)}}" />
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="fullname">Fullname</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="" value="{{ (Session::get('fullname') ? Session::get('fullname') : '') }}">
                    @if ($errors->has('fullname'))
                        <div class="alert alert-danger custom-alert-error" role="alert">
                            {{ $errors->first('fullname') }}
                        </div>
                    @endif 
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="" value="{{ (Session::get('email') ? Session::get('email') : '') }}">
                    @if ($errors->has('email'))
                        <div class="alert alert-danger custom-alert-error" role="alert">
                            {{ $errors->first('email') }}
                        </div>
                    @endif 
                  </div>
                  <div class="form-group">
                    <label for="total_nights">Total nights</label>
                    <input type="number" class="form-control" readonly id="total_nights" name="total_nights" placeholder="" value="{{ ($errors->has('total_nights') ? Session::get('total_nights') : '1') }}">
                    @if ($errors->has('total_nights'))
                        <div class="alert alert-danger custom-alert-error" role="alert">
                            {{ $errors->first('total_nights') }}
                        </div>
                    @endif 
                  </div>
                  <div class="form-group">
                    <label for="total_price">Total Price</label>
                    <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                      <input type="text" class="form-control" readonly id="total_price" name="total_price" placeholder="" value="{{ ($errors->has('total_price') ? Session::get('total_price') : '0') }}">
                      <div class="input-group-append"><span class="input-group-text">.00</span></div>
                    </div>
                    @if ($errors->has('total_price'))
                        <div class="alert alert-danger custom-alert-error" role="alert">
                            {{ $errors->first('total_price') }}
                        </div>
                    @endif 
                  </div>                      
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success btn-flat">Save</button>
                  <a href="{{ url('/booking-manager') }}"><button type="button" class="btn btn-secondary btn-flat">Back to list</button></a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection

