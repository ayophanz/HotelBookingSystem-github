
@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div id="root-title">
    <page-title>Delete Booking</page-title>
</div>

<!-- /.content-header -->
<div class="content" id="root">
    <div class="row justify-content-center align-self-center">
        <div class="col-7">
          @include('/includes/messages')
          <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Are you sure?</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{url('/deleting-book')}}/{{$guest->id}}" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="room_name">Room</label>
                    <input type="text" class="form-control" disabled readonly name="date_range" id="date_range" value="{{ $guest->roomRef->room_name }} | {{$guest->roomRef->roomTypeRef->name}} | {{$guest->roomRef->hotelRef->name}} | USD: {{$price->room_type_price}}" />
                  </div>
                  <div class="form-group">
                    <label>Select your date</label>
                    <input type="text" class="form-control" disabled readonly name="date_range" id="date_range" value="{{$guest->date_start}} - {{$guest->date_end}}" />
                  </div>
                  <div class="form-group">
                    <label for="fullname">Fullname</label>
                    <input type="text" class="form-control" disabled id="fullname" name="fullname" placeholder="" value="{{ $guest->fullname }}">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" disabled id="email" name="email" placeholder="" value="{{ $guest->email }}">
                  </div>
                  <div class="form-group">
                    <label for="total_nights">Total nights</label>
                    <input type="number" class="form-control" disabled readonly id="total_nights" name="total_nights" placeholder="" value="{{ $guest->total_nights }}"> 
                  </div>
                  <div class="form-group">
                    <label for="total_price">Total Price</label>
                    <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                      <input type="text" class="form-control" disabled readonly id="total_price" name="total_price" placeholder="" value="{{  $guest->total_price }}">
                      <div class="input-group-append"><span class="input-group-text">.00</span></div>
                    </div>
                  </div>                      
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-danger btn-flat"><i class="fas fa-trash-alt"></i> Delete</button>
                  <a href="{{ url('/booking-manager') }}"><button type="button" class="btn btn-secondary btn-flat">Back to list</button></a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection

