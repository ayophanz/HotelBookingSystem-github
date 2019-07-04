
@extends('layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<div id="root-title">
    <page-title>Hotel Details</page-title>
</div>

<!-- /.content-header -->
<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">List of hotels</h3>

                <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->

              <div class="card-body table-responsive p-0" id="root">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Address</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Country</th>
                      <th>Zip Code</th>
                      <th>Phone Number</th>
                      <th>Email</th>
                      <th>Image</th>
                      <th>Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($details as $detail)
                        <tr>
                            <td>{{$detail->name}}</td>
                            <td>{{$detail->address}}</td>
                            <td>{{$detail->city}}</td>
                            <td>{{$detail->state}}</td>
                            <td>{{$detail->country}}</td>
                            <td>{{$detail->zip_code}}</td>
                            <td>{{$detail->phone_number}}</td>
                            <td>{{$detail->email}}</td>
                            <td>
                                <vue-pure-lightbox
                                class="img-hotel"
                                thumbnail='{{asset('/storage/upload/hotelImage')}}/{{$detail->image}}'
                                :images="[
                                  '{{asset('/storage/upload/hotelImage')}}/{{$detail->image}}',
                                ]"></vue-pure-lightbox>
                            </td>
                            <td>
                               <a href="{{url('/edit-hotel-details')}}/{{$detail->id}}">
                                  <button type="button" class="btn btn-sm btn-edit btn-block btn-primary btn-flat"><i class="fas fa-edit"></i> Edit</button>
                               </a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </div>
</div>
@endsection
