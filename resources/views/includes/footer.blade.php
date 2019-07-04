  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Easy & Userfriendly admin
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="#">Hotel Booking System</a>.</strong> All rights reserved.
  </footer>
</div>

<!-- REQUIRED SCRIPTS -->

<!--all pages-->

<script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
<script type="text/javascript">
   Vue.component('page-title',{
        template: `<div class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <h1 class="m-0 text-dark"><slot></slot></h1>
                        </div>
                      </div>
                    </div>
                  </div>`
    });

    new Vue({
        el: "#root-title"
    });
</script>


<!--load js on specific page-->

@if (\Request::is('/') || \Request::is('room-manager') || \Request::is('price-list-manager'))
<script src="{{asset('/dist/thirdPartyCss&Js/lightbox.vue.min.js')}}"></script>
<script>
  new Vue({
          components: {
            VuePureLightbox,
          },
        }).$mount('#root')
@endif
</script>


@if (\Request::is('new-room') || \Request::is('edit-room/*') || \Request::is('new-book')) 
<script src="{{asset('/js/select2.min.js')}}"></script>
<script>
    new Vue({
      el: '#root',
      mounted() {
        $('#hotel_id').select2();
        $('#room_type').select2();
      }
    })

  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#preview').attr('src', e.target.result);
            $('#preview').show();
        }
        reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endif

@if(\Request::is('edit-hotel-details/*'))
<script>
function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#preview').attr('src', e.target.result);
          $('#preview').show();
      }
      reader.readAsDataURL(input.files[0]);
  }
}    
</script>
@endif

@if(\Request::is('new-book') || \Request::is('edit-book/*'))
<script src="{{asset('/js/select2.min.js')}}"></script>
<script src="{{asset('/dist/thirdPartyCss&Js/moment.min.js')}}"></script>
<script src="{{asset('/dist/thirdPartyCss&Js/datepicker.min.js')}}"></script>
<script>
  new Vue({
      el: '#root',
      mounted() {
        $('#room_name').select2();
        $('#date_range').daterangepicker();
        $('#date_range').on('apply.daterangepicker', function(ev, picker) {
          var result = $(this).val().replace(/\s/g, '');
          var result = result.split('-');
          const date_start = new Date(result[0]);
          const date_end = new Date(result[1]);
          const diffTime = Math.abs(date_end.getTime() - date_start.getTime());
          const diff = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
          $('#total_nights').val(diff);
          $('#total_price').val(parseInt(diff)*parseFloat($('#room_name').find(':selected').attr('data-price')));
        });

        $('#room_name').on('change', function(){
          if(parseInt($('#total_nights').val())==0) {
             $('#total_price').val(parseFloat($(this).find(':selected').attr('data-price')));
          }else{
            $('#total_price').val(parseFloat($(this).find(':selected').attr('data-price'))*parseInt($('#total_nights').val()));
          }
        });
      }
    })

</script>
@endif

@if(\Request::is('booking-manager'))
<script src="{{asset('/dist/thirdPartyCss&Js/sweetalert2.min.js')}}"></script>
<script src="{{asset('/dist/thirdPartyCss&Js/moment.min.js')}}"></script>
<script src="{{asset('/dist/thirdPartyCss&Js/fullcalendar.min.js')}}"></script>
<script>
  new Vue({
    el: '#root',
    mounted() {
        queryCalendar();
        $(document).on('change', '.custom-select-month-header', function(){
          var y = $('.custom-select-year-header').val();
          var m = moment([parseInt(y), $(this).val(), 1]).format('YYYY-MM-DD');
          $('#calendar').fullCalendar('gotoDate', m ); 
        });

        $(document).on('change', '.custom-select-year-header', function(){
          var m = $('.custom-select-month-header').val();
          var y = moment([$(this).val(), parseInt(m), 1]).format('YYYY-MM-DD');
          $('#calendar').fullCalendar('gotoDate', y ); 
        });
    }
  })

  function queryCalendar() {
    const months = ["JAN", "FEB", "MAR","APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];
    var select_month = [];
    var select_year = []; 
    $.ajax({
        type        : 'GET',
        url         : '{{url('/reservations')}}',
        dataType    : 'json', 
        encode      : true
    }).done(function(data) {
        var temp_data = new Array();
        for (var i = 0; i < data.books.length; i++) {
          if(data.books[i].room_ref.room_type_ref && data.books[i].room_ref.hotel_ref) {
            var start = new Date(data.books[i].date_start); 
            var end = new Date(data.books[i].date_end);

            var formatted_start = start.getDate() + "-" + months[start.getMonth()] + "-" + start.getFullYear();
            var formatted_end = end.getDate() + "-" + months[end.getMonth()] + "-" + end.getFullYear();

            select_month[start.getMonth()] = months[start.getMonth()];
            select_year[i] = start.getFullYear();
            temp_data[i] = {
                'title':data.books[i].fullname+' ('+formatted_start+' - '+formatted_end+')',
                'start':new Date(data.books[i].date_start),
                'end'  :new Date(data.books[i].date_end),
                'allDay': false,
                'description': data.books[i].total_nights+' | '+data.books[i].total_price+' | '+data.books[i].email+' | '+data.books[i].room_ref.room_name,
                'backgroundColor': '#3fc3ee',
                'textColor':'white',
                'url':'#/'+data.books[i].id,
                'extendedProps': [
                data.books[i].total_nights,
                data.books[i].total_price,
                data.books[i].room_ref.hotel_ref.name,
                data.books[i].room_ref.room_type_ref.name,
                data.books[i].room_ref.room_name,
                data.books[i].email,
                data.books[i].user_id,
                data.books[i].id,
                data.books[i].fullname
                ]
            };
          }
        }
        var source = { 
          header:{
            left:'prev,next today',
            center:'title'
          },
          height: 700,
          contentHeight: 800,
          defaultDate: new Date(),
          navLinks: false, // can click day/week names to navigate views
          editable: false,
          eventLimit: true, // allow "more" link when too many events
          eventClick: function(data, event, view) {
            bookInfo(data,months);
          },
          eventRender: function(event, element) {
              element.css("font-size", "1.2em");
              element.css("padding", "5px");
              element.css('border', '0px');
              element.find('.fc-time').text('');     
              element.find('.fc-time').prepend('<i class="fas fa-calendar-alt"></i>');

          },
          events: temp_data
       };
       $('#calendar').fullCalendar( source );

       select_month.sort();
       select_month.reverse();
       var append_month = '<option value="0">Please select month</option>';
       select_month.forEach(function(item,i) {
          append_month = append_month +'<option value="'+i+'">'+item+'</option>';
        });

       select_year.sort();
       select_year.reverse();
       let uniqueYear = [...new Set(select_year)];
       var append_year = '<option value="0">Please select year</option>';
       uniqueYear.forEach(function(item,i) {
          append_year = append_year +'<option value="'+item+'">'+item+'</option>';
       });

       $(".fc-right").prepend('<select class="custom-select-month-header fc-state-default fc-corner-left fc-corner-right" style="height:2.1em;">'+append_month+'</select>');

       $(".fc-right").prepend('<select class="custom-select-year-header fc-state-default fc-corner-left fc-corner-right" style="height:2.1em;">'+append_year+'</select>');

    });
  } 
  
  function bookInfo(data,months) {
    var start = new Date(data.start);
    var formatted_start = start.getDate() + "-" + months[start.getMonth()] + "-" + start.getFullYear();
    var end = new Date(data.end);
    var formatted_end = end.getDate() + "-" + months[end.getMonth()] + "-" + end.getFullYear();
    Swal.fire({
          title: '<strong>Guest: <span style="color: #3fc3ee;">'+data.extendedProps[8]+'</span></strong>',
          type: 'info',
          html:
            '<h3>Booking Details</h3>'+
            '<ul>'+
            '<li class="title-list"><span class="title-head">Schedule & Payment: </span></li>'+
            '<li ><span>Date: </span>'+formatted_start+' - '+formatted_end+'</li>'+
            '<li><span>Night(s): </span>'+data.extendedProps[0]+'</li>'+
            '<li><span>Amount: </span>'+data.extendedProps[1]+'</li>'+
            '<li class="title-list"><span class="title-head">Hotel Info: </span></li>'+
            '<li><span>Hotel: </span>'+data.extendedProps[2]+'</li>'+
            '<li><span>Room Type: </span>'+data.extendedProps[3]+'</li>'+
            '<li><span>Room Name: </span>'+data.extendedProps[4]+'</li>'+
            '<li class="title-list"><span class="title-head">Guest Info: </span></li>'+
            '<li><span>Guest Email: </span>'+data.extendedProps[5]+'</li>'+
            '<li><span>Guest id: </span>'+((data.extendedProps[6])? data.extendedProps[6]: 'Unavailable')+'</li>'+
            '</ul>',
          showCloseButton: true,
          showCancelButton: true,
          focusConfirm: false,
          confirmButtonText: '<i class="fas fa-edit"></i> Edit',
          confirmButtonAriaLabel: '',
          cancelButtonText: '<i class="fas fa-trash-alt"></i> Delete',
          cancelButtonAriaLabel: '',
          cancelButtonColor: '#d33',
        });

        $('.swal2-confirm').on('click', function(){
            window.location.href = '{{url('/edit-book')}}/'+data.extendedProps[7];
        });
        $('.swal2-cancel').on('click', function(){
            window.location.href = '{{url('/delete-book')}}/'+data.extendedProps[7];
        });

  }

</script>
@endif

@if (\Request::is('new-room-type-price') || \Request::is('edit-room-type-price/*')) 
<script src="{{asset('/js/select2.min.js')}}"></script>
<script>
  new Vue({
    el: '#root',
    mounted() {
      $('#room_type_id').select2();
      $('#hotel_id').select2();
    }
  })

  function getRoomType(selected) {
    $.ajax({
      url: '{{url('/search-for-hotel')}}/'+selected.value,
      type: 'get',
      dataType: 'json',
      success: function(data) {
        $('#hotel_id').text('');
        var output = '';
        for (var i=0;i<data.length;i++) {
          output += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
        }
        $('#hotel_id').append(output);
      },
      error: function(data) {

      }
    });
  }
</script>
@endif

</body>
</html>
