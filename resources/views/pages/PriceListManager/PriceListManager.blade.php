
@extends('layouts.master')

@section('content')


<!-- Content Header (Page header) -->
<div id="root-title">
    <page-title>Price List Manager</page-title>
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
			<a href="{{ url('/new-room-type-price') }}"><button type="button" class="btn btn-block btn-success btn-flat"><i class="fas fa-plus-square"></i> Add</button></a>
		</div>
	</div>
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">Rooms Prices</h3>

                <div class="card-tools">
                </div>
              </div>
              <!-- /.card-header -->

              <div class="card-body table-responsive p-0" id="root">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Room Type & Hotel</th>
                      <th>Room Type Price</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($room_type_price as $type)
                      @if($type->roomTypeRef)
                        <tr>
                          <td>{{$type->roomTypeRef->name}} - {{$type->hotelRef->name}}</td>
                          <td>{{$type->room_type_price}}</td>
                          <td>
                            <a href="{{url('edit-room-type-price')}}/{{$type->id}}">
                              <button type="button" data-id="{{$type->id}}" class="btn btn-sm btn-edit btn-primary btn-flat btn-block"><i class="fas fa-edit"></i> Edit</button>
                            </a>
                          </td>
                          <td>
                            <a href="{{url('delete-room-type-price')}}/{{$type->id}}">
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

