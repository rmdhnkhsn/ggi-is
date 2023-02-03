@extends("layouts.app")
@section("title","Create Booking")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/placeholder-loading.css')}}">

@endpush


@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="row">
        <form action="{{ route('tiket-it-storeBooking') }}" method="post" enctype="multipart/form-data">
                        @csrf
            <div class="col-md-9 mx-auto">
                <div class="cards" style="padding:30px 26px">
                    <div class="row">
                        <div class="col-12 justify-sb">
                            <div class="title-20">Booking Meeting Room</div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="borderlight"></div>
                        </div>
                        <div class="col-sm-4">
                            <div class="title-sm mb-1">Name</div>
                            <input type="text" class="form-control border-input-10 mb-3" name="nama" value="{{$data->nama}}" placeholder="your name..." readonly>
                        </div>
                        <div class="d-none">
                            <div class="title-sm mb-1">Ruangan Meeting</div>
                            <input type="hidden" class="form-control border-input-10 mb-3" name="room_meeting" id="roomMeeting" value="">
                        </div>
                        <div class="col-sm-4">
                            <div class="title-sm mb-1">Ticket For</div>
                            <input type="text" class="form-control border-input-10 mb-3" name="ticket_for" value="HRGA" placeholder="ticket for..." readonly>
                        </div>
                        <div class="col-sm-4">
                            <div class="title-sm mb-1">Category</div>
                            <input type="text" class="form-control border-input-10 mb-3" name="kategori" value="booking ruangan meeting" readonly>
                        </div>
                        <div class="col-sm-6">
                            <div class="title-sm">Booking Date</div>
                            <div class="input-group mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue" style="width:50px;height:40px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control border-input-10 tanggal_booking" onchange="getRoom()" name="tanggal_booking" 
                                 min={{$tgl_sekarang}} max={{$tanggal7}} placeholder="Select Date"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="title-sm">Branch *</div>
                            <div class="input-group mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-network-wired"></i></span>
                                </div>
                                <select class="form-control borderInput2 kode_branch select2bs4" onchange="getRoom()" name="kode_branch" style="cursor:pointer" required>
                                    @foreach($dataBranch as $key2 => $value2)
                                        <option {{ $user->branchdetail == $value2->branchdetail ? 'selected' : ''}} value="{{$value2->id}}">{{$value2->branchdetail}}</option>    
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="title-sm mb-2 d-block">Pilih Ruangan</div>
                                    <ul class="nav nav-pills rMeeting" id="branchRoom" role="tablist">
                                        <!-- Add Child Here -->
                                    </ul>
                                </div>
                                
                                <div class="col-12 mt-4 mb-2">
                                        <div class="tab-content" id="tab-content">
   
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push("scripts")
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script src="{{asset('common/js/sweetalert2.js')}}"></script>

<script>

    const setRoom = (evt)=> {
        document.getElementById('roomMeeting').value = evt
    }

    var current_time = moment().format('HH:mm:ss');
    var today = moment().format('YYYY-MM-DD')

    function getRoom() {
        const branchSelected = document.getElementsByClassName('kode_branch')[0].value
        const bookingDate = document.getElementsByClassName('tanggal_booking')[0].value
        console.log(bookingDate)
        if(branchSelected != '' && bookingDate != ''){
            make_skeleton()
            BookingTicket(branchSelected, bookingDate)
        }
    }

    const createAnak = (data, room, bookingDate)=> {
        let html = ''
        data.map((d)=>{
            var pointer_events = ``
            var checked = ``
            var color = ``
            var is_booked_class = ``
            if (d.is_booked == 1) {
                var pointer_events = `none`
                var color = `#bbb`
                var checked = `checked`
                var nama = d.nama
                var deskripsi = d.deskripsi
                var is_booked_class = `booked`
            }else if ((current_time >= d.waktu_finish) && (bookingDate <= today)) {
                var pointer_events = `none`
                var color = `#bbb`
                var is_booked_class = `booked`
            }
            else {
                var color = `#2B2B2B`
            }
                html += `
                <div class="${is_booked_class}">
                    <div class="input-group-prepend" style="pointer-events:${pointer_events}">
                        <input type="checkbox" class="check1 checkbox-booking-${d.is_booked}" id="checkbox-${room}-${d.id}" style="pointer-events:${pointer_events}" name="id_waktu[]" value="${d.id}">                                        
                        <label class="ml-2 pointer" style="color: ${color}" for="checkbox-${room}-${d.id}">${d.waktu_start} - ${d.waktu_finish}</label>
                    </div>
                </div>`
        })
        return html
        
    }

    function BookingTicket(branchSelected, bookingDate){
        $.ajax({
            data: {
                branchSelected: branchSelected,
                bookingDate: bookingDate,
                from: "create_ticket"
            },
            url: '{{ route("show-booking-ticket") }}',           
            type: "get",
            dataType: 'json',            
            success: function (data) {
                document.getElementById('tab-content').innerHTML = '';
                let html = ''
                let pane = ''
                data.map((room)=>{
                    html += `<li class="nav-item show-room" onclick="setRoom(${room.id_room})">`
                    html += `<a class="btnNavTabs position-relative" aria-selected="false"  data-toggle="tab" href="#${room.room}" value="Ruang Meeting 1" role="tab">${room.deskripsi}`
                    html += `<div class="kapasitas">Kapasitas Max  ${room.kapasitas} Orang</div>`
                    html += `<span class="badge pil-badge position-absolute" style=" color:#fff; bottom : 0; right : 50%; transform: translate(50%, 65%); background-color: #0073EE ">${room.branch}</span></a></li>`
                    pane += `<div class="tab-pane" id="${room.room}" role="tabpanel">`
                    pane += `<div class="row loading"></div>`
                    pane += `<div class="list-${room.room}">`
                    pane += `<div class="d-flex flex-wrap flex-md-column flex-rowd-flex flex-wrap flex-md-column flex-row heightCheck2">`
                    pane += createAnak(room.booking, room.room, bookingDate)
                    pane += `</div></div></div>`

                })
                pane +=
                    `<div class="mt-2">
                        <div class="title-sm mb-1">Description</div>
                        <div class="input-group mb-3">
                            <textarea class="form-control border-input-10" id="" name="deskripsi" value="" placeholder="Add Description" style="height:120px"></textarea>
                        </div>
                    </div>
                    <div class="mt-2 my-2">
                        <input type="hidden" class="form-control border-input-10 mb-3" name="nama" value="{{$data->nama}}" placeholder="your name...">
                        <input type="hidden" class="form-control border-input-10 mb-3" name="nik" value="{{$data->nik}}" placeholder="your name...">
                        <input type="hidden" class="form-control border-input-10 mb-3" name="ext" value="{{$data->ext}}" placeholder="your name...">
                        <input type="hidden" class="form-control border-input-10 mb-3" name="ip" value="{{$data->ip}}" placeholder="your name...">
                        <input type="hidden" class="form-control border-input-10 mb-3" name="ticket_for" value="Booking" placeholder="ticket for...">
                        <input type="hidden" class="form-control border-input-10 mb-3" name="ticket_booked_for" value="RBO" placeholder="ticket for...">
                        <input type="hidden" class="form-control border-input-10 mb-3" name="kategori" value="Booking Ruang Meeting" placeholder="ticket for...">
                        <input type="hidden" class="form-control" id="bagian" name="bagian" value="{{$user->departemensubsub}}" >
                        <button type="submit" class="btn-blue-md btn-block saveCreate">Create Ticket</button>
                    </div>`

                $('#tab-content').append(pane)
                $('#branchRoom').html(html)
            }
        });
    }

    $('body').on('click', '.show-room', function () {
        $('.checkbox-booking-0').prop('checked',false);
    })
</script>


<script>
  $('#Date').datetimepicker({
    format: 'DD-MM-YYYY',
    showButtonPanel: false
  })

  $('.select2bs4').select2({
        theme: 'bootstrap4'
  })
</script>

<script>
  $('.saveCreate').on('click', function (event) {
    swal({
      position: 'center',
      icon: 'success',
      title: 'Success',
      text: 'Your ticket has been succesfully created',
      buttons: false,
      timer: 1500
    })
  });

  $('.solvedAlert').on('click', function (event) {
    swal({
      position: 'center',
      icon: 'success',
      title: 'Success',
      text: 'Problem Has Been Solved',
      buttons: false,
      timer: 1500
    })
  });
</script>


<script>
    function make_skeleton() {
        var output = '';
        for (var count = 0; count < 6; count++) {
            output += '<div class="col-4">';
            output += '<div class="ph-item">';
            output += '<div class="ph-col-12">';
            output += '<div class="ph-picture"></div>';
            output += '<div class="ph-row">';
            output += '<div class="ph-col-6 big"></div>';
            output += '<div class="ph-col-4 empty big"></div>';
            output += '<div class="ph-col-12"></div>'
            output += '<div class="ph-col-12"></div>'
            output += '</div>';
            output += '</div>';
            output += '</div>';
            output += '</div>';
        }
        $('.loading').html(output)
    }

    function showSuccessAlert(){
        Swal.fire({
            icon: 'warning',
            title: 'Room Not Available ',
            text: "Room at this hour is not available, Please choose another room or at another hour.",
            showConfirmButton: false,
            timer: 2500,
        })
    }
    $('body').on('click', '.booked', function () {
        showSuccessAlert()
    })

</script>

@endpush

