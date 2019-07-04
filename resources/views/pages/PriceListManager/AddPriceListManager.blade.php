
@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div id="root-title">
    <page-title>Add Room Type Price</page-title>
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
              <form role="form" action="{{url('/save-new-room-type-price')}}" method="post">
              	{{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="room_type">Room Type</label>
                    <select onchange="getRoomType(this)" class="form-control" id="room_type_id" name="room_type" style="width: 100%;"  tabindex="-1" aria-hidden="true">
                      <option value="0">Please Select</option>
                      @foreach($room_types as $type)
                         <option value="{{ $type->id }}">{{ $type->name }}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('room_type'))
                        <div class="alert alert-danger custom-alert-error" role="alert">
                            {{ $errors->first('room_type') }}
                        </div>
                    @endif                  
                  </div>
                  <div class="form-group">
                    <label for="hotel">Hotel Name</label> 
                    <select onchange="getRoomType(this)" class="form-control" id="hotel_id" name="hotel" style="width: 100%;"  tabindex="-1" aria-hidden="true">
                    </select>
                    @if ($errors->has('hotel'))
                        <div class="alert alert-danger custom-alert-error" role="alert">
                            {{ $errors->first('hotel') }}
                        </div>
                    @endif                
                  </div>
                  <div class="form-group">
                    <label for="room_type_price">Price</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">$</span>
                    </div>
                    <input type="text" class="form-control" id="room_type_price" name="room_type_price" placeholder="" value="{{ ( Session::get('room_type_price') ? Session::get('room_type_price') : '') }}">
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
                  <button type="submit" class="btn btn-success btn-flat">Save</button>
                  <a href="{{ url('/price-list-manager') }}"><button type="button" class="btn btn-secondary btn-flat">Back to list</button></a>
                </div>
              </form>
            </div>


            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>
                  Remainders
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="callout callout-info">
                  <h5>Please read</h5>
                  <p>Once you already assigned specific room type to specific hotel it is no longer available to select again, instead use edit or the hotel doesn't have room, add room first. </p>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
@endsection

