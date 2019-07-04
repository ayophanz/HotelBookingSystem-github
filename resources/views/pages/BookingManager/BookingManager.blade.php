
@extends('layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<div id="root-title">
    <page-title>Booking Manager</page-title>
</div>

<!-- /.content-header -->
<div class="content">
  <div class="row">
    <div class="col-12">
    @include('/includes/messages')
    </div>
  </div>
  <div class="row custom-btn-layout">
    <div class="col-md-1">
      <a href="{{ url('/new-book') }}"><button type="button" class="btn btn-block btn-success btn-flat"><i class="fas fa-plus-square"></i> Add</button></a>
     </div>
  </div>
  <div class="row">
    <div class="col-12">
      <!-- Custom Tabs -->
      <div class="card">
        <div class="card-header d-flex p-0">
          <h3 class="card-title p-3">Reservations</h3>
          <ul class="nav nav-pills ml-auto p-2">
            <li class="nav-item"><a class="nav-link active" href="#calendar_view" data-toggle="tab"><i class="fas fa-calendar-alt fa-2x"></i></a></li>
            <li class="nav-item"><a class="nav-link" href="#list_view" data-toggle="tab"><i class="fas fa-list fa-2x"></i></a></li>
          </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane active" id="calendar_view">
              <div class="row">
                <div class="col-12">
                  <div class="calendar-wrapper">
                    <div id='calendar'></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="list_view">

              <div class="row">
                <div class="col-12">
                    <div class="card">
                      <div class="card-header"></h3>
                        <div class="card-tools">
                        </div>
                      </div>
                      <div class="card-body table-responsive p-0" id="root">
                        <table class="table table-hover display" id="rootTable">
                          <thead>
                            <tr>
                              <th>Date</th>
                              <th>Room</th>
                              <th>Fullname</th>
                              <th>email</th>
                              <th>nights</th>
                              <th>Amount</th>
                              <th>Customer ID</th>
                              <th>Edit</th>
                              <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($guests as $guest)
                              @if($guest->roomRef)
                                <tr>
                                    <td>{{$guest->date_start}} - {{$guest->date_end}}</td>
                                    <td>{{$guest->roomRef->room_name}}</td>
                                    <td>{{$guest->fullname}}</td>
                                    <td>{{$guest->email}}</td>
                                    <td>{{$guest->total_nights}}</td>
                                    <td>{{$guest->total_price}}</td>
                                    <td>{{(($guest->user_id)? $guest->user_id : 'Unavailable')}}</td>
                                    <td>
                                      <a href="{{url('edit-book')}}/{{$guest->id}}">
                                        <button type="button" class="btn btn-sm btn-edit btn-primary btn-flat btn-block"><i class="fas fa-edit"></i> Edit</button>
                                      </a>
                                    </td>
                                    <td>
                                      <a href="{{url('delete-book')}}/{{$guest->id}}">
                                        <button type="button" class="btn btn-sm btn-danger btn-flat btn-block"><i class="fas fa-trash-alt"></i> Delete</button>
                                      </a>
                                    </td>
                                </tr>
                              @endif  
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


