
@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div id="root-title">
    <page-title>Edit Hotel Details</page-title>
</div>

<!-- /.content-header -->
<div class="content" id="root">
    <div class="row justify-content-center align-self-center">
        <div class="col-7">
          @include('/includes/messages')
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Hotel details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{url('/update-hotel-details')}}/{{$hotel->id}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="hotel_name">Name</label>
                    <input type="text" class="form-control" id="hotel_name" name="hotel_name" placeholder="" value="{{ ($errors->has('hotel_name') ? Session::get('hotel_name') : $hotel->name) }}">
                    @if ($errors->has('hotel_name'))
                        <div class="alert alert-danger custom-alert-error" role="alert">
                            {{ $errors->first('hotel_name') }}
                        </div>
                    @endif 
                  </div>
                  <div class="form-group">
                    <label for="hotel_address">Address</label>
                    <input type="text" class="form-control" id="hotel_address" name="hotel_address" placeholder="" value="{{ ($errors->has('hotel_address') ? Session::get('hotel_address') : $hotel->address) }}">
                    @if ($errors->has('hotel_address'))
                        <div class="alert alert-danger custom-alert-error" role="alert">
                            {{ $errors->first('hotel_address') }}
                        </div>
                    @endif 
                  </div>
                  <div class="form-group">
                    <label for="hotel_city">City</label>
                    <input type="text" class="form-control" id="hotel_city" name="hotel_city" placeholder="" value="{{ ($errors->has('hotel_city') ? Session::get('hotel_city') : $hotel->city) }}">
                    @if ($errors->has('hotel_city'))
                        <div class="alert alert-danger custom-alert-error" role="alert">
                            {{ $errors->first('hotel_city') }}
                        </div>
                    @endif 
                  </div>
                  <div class="form-group">
                    <label for="hotel_state">State</label>
                    <input type="text" class="form-control" id="hotel_state" name="hotel_state" placeholder="" value="{{ ($errors->has('hotel_state') ? Session::get('hotel_state') : $hotel->state) }}">
                    @if ($errors->has('hotel_state'))
                        <div class="alert alert-danger custom-alert-error" role="alert">
                            {{ $errors->first('hotel_state') }}
                        </div>
                    @endif 
                  </div>
                  <div class="form-group">
                    <label for="hotel_country">Country</label>
                    <input type="text" class="form-control" id="hotel_country" name="hotel_country" placeholder="" value="{{ ($errors->has('hotel_country') ? Session::get('hotel_country') : $hotel->country) }}">
                    @if ($errors->has('hotel_country'))
                        <div class="alert alert-danger custom-alert-error" role="alert">
                            {{ $errors->first('hotel_country') }}
                        </div>
                    @endif 
                  </div>
                  <div class="form-group">
                    <label for="hotel_zip_code">Zip Code</label>
                    <input type="text" class="form-control" id="hotel_zip_code" name="hotel_zip_code" placeholder="" value="{{ ($errors->has('hotel_zip_code') ? Session::get('hotel_zip_code') : $hotel->zip_code) }}">
                    @if ($errors->has('hotel_zip_code'))
                        <div class="alert alert-danger custom-alert-error" role="alert">
                            {{ $errors->first('hotel_zip_code') }}
                        </div>
                    @endif 
                  </div>
                  <div class="form-group">
                    <label for="hotel_phone_number">Phone Number</label>
                    <input type="text" class="form-control" id="hotel_phone_number" name="hotel_phone_number" placeholder="" value="{{ ($errors->has('hotel_phone_number') ? Session::get('hotel_phone_number') : $hotel->phone_number) }}">
                    @if ($errors->has('hotel_phone_number'))
                        <div class="alert alert-danger custom-alert-error" role="alert">
                            {{ $errors->first('hotel_phone_number') }}
                        </div>
                    @endif 
                  </div>
                  <div class="form-group">
                    <label for="hotel_email">Email</label>
                    <input type="email" class="form-control" id="hotel_email" name="hotel_email" placeholder="" value="{{ ($errors->has('hotel_email') ? Session::get('hotel_email') : $hotel->email) }}">
                    @if ($errors->has('hotel_email'))
                        <div class="alert alert-danger custom-alert-error" role="alert">
                            {{ $errors->first('hotel_email') }}
                        </div>
                    @endif 
                  </div>
                  <div class="form-group">
                    <label for="hotel_image">Room Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" onchange="readURL(this)" class="custom-file-input" id="hotel_image" name="hotel_image" >
                        <label class="custom-file-label" for="hotel_image">Choose Photo</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                    @if ($errors->has('hotel_image'))
                        <div class="alert alert-danger custom-alert-error" role="alert">
                            {{ $errors->first('hotel_image') }}
                        </div>
                    @endif 
                    <?php
                    $link = (($errors->has('hotel_image')) ? asset('/storage/upload/hotelImage/noimage.jpg') : asset('/storage/upload/hotelImage').'/'. $hotel->image);
                    ?>
                    <div class="preview-wrapper">
                      <img id="preview" src="{{$link}}" alt="Hotel Image" /> 
                    </div>
                  </div>                        
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-flat">Update</button>
                  <a href="{{ url('/') }}"><button type="button" class="btn btn-secondary btn-flat">Back to list</button></a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection

