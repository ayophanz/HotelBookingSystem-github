
@extends('layouts.master')

@section('content')


<!-- Content Header (Page header) -->
<div id="root-title">
    <page-title>Room Manager</page-title>
</div>

<!-- /.content-header -->
<div class="content">
  <div class="row">
    <div class="col-12">
      @include('/includes/messages')
    </div>
  </div>
	<div class="row">
		<div class="col-md-1">
			<a href="{{ url('/new-room') }}"><button type="button" class="btn btn-block btn-success btn-flat"><i class="fas fa-plus-square"></i> Add</button></a>
		</div>
	</div>
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">List of rooms</h3>

                <div class="card-tools">

                </div>
              </div>
              <!-- /.card-header -->

              <div class="card-body table-responsive p-0" id="root">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Room Name</th>
                      <th>Hotel</th>
                      <th>Room Type</th>
                      <th>Room Image</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($rooms as $room)
                    @if($room->hotelRef && $room->roomTypeRef)
                        <tr>
                            <td>{{$room->room_name}}</td>
                            <td>{{$room->hotelRef->name}}</td>
                            <td>{{$room->roomTypeRef->name}}</td>
                            <td>
                                <vue-pure-lightbox
                                class="img-hotel"
                                thumbnail='{{asset('/storage/upload/roomImage')}}/{{$room->room_image}}'
                                :images="[
                                  '{{asset('/storage/upload/roomImage')}}/{{$room->room_image}}',
                                ]"></vue-pure-lightbox>
                            </td>
                            <td>
                              <a href="{{url('edit-room')}}/{{$room->id}}">
                                <button type="button" class="btn btn-sm btn-edit btn-primary btn-flat btn-block"><i class="fas fa-edit"></i> Edit</button>
                              </a>
                            </td>
                            <td>
                              <a href="{{url('delete-room')}}/{{$room->id}}">
                                <button type="button" class="btn btn-sm btn-danger btn-flat btn-block"><i class="fas fa-trash-alt"></i> Delete</button>
                              </a>
                            </td>
                        </tr>
                    @endif    
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

