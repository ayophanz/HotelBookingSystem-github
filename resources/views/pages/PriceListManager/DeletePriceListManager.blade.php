
@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div id="root-title">
    <page-title>Delete Room Type Price</page-title>
</div>

<!-- /.content-header -->
<div class="content" id="root">
    <div class="row justify-content-center align-self-center">
        <div class="col-7">
          @include('/includes/messages')
          <div class="card card-danger card-flat">
              <div class="card-header">
                <h3 class="card-title">Are you sure?</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{url('/deleting-room-type-price')}}/{{$price->id}}" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="room_type_id">Room Type</label>
                    <input type="text" class="form-control" id="room_type_id" name="room_type_id" placeholder="" value="{{$price->roomTypeRef->name}}" disabled>                
                  </div>
                  <div class="form-group">
                    <label for="hotel_id">Hotel Name</label> 
                    <input type="text" class="form-control" id="hotel_id" name="hotel_id" placeholder="" value="{{$price->hotelRef->name}}" disabled>              
                  </div>
                  <div class="form-group">
                    <label for="room_type_price">Price</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">$</span>
                    </div>
                    <input type="text" class="form-control" id="room_type_price" name="room_type_price" placeholder="" value="{{ $price->room_type_price }}" disabled>
                    <div class="input-group-append">
                      <span class="input-group-text">.00</span>
                    </div>
                    </div> 
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-danger btn-flat"><i class="fas fa-trash-alt"></i> Delete</button>
                  <a href="{{ url('/price-list-manager') }}"><button type="button" class="btn btn-secondary btn-flat">Back to list</button></a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection

