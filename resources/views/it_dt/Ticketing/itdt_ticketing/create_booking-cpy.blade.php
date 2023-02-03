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
                        <div class="col-12">
                            <div class="title-sm mb-1">Name</div>
                            <input type="text" class="form-control border-input-10 mb-3" name="nama" value="{{$data->nama}}" placeholder="your name..." readonly>
                        </div>
                        <div class="col-md-6">
                            <div class="title-sm mb-1">Ticket For</div>
                            <input type="text" class="form-control border-input-10 mb-3" name="ticket_for" value="HRGA" placeholder="ticket for..." readonly>
                        </div>
                        <div class="col-md-6">
                            <div class="title-sm mb-1">Category</div>
                            <input type="text" class="form-control border-input-10 mb-3" name="kategori" value="booking ruangan meeting" readonly>
                        </div>
                        <div class="col-12">
                            <span class="title-sm">Booking Date</span>
                            <div class="input-group mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue" style="width:50px;height:40px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control border-input-10 tanggal_booking" name="tanggal_booking" 
                                 min={{ $tgl_sekarang }} max={{ $tanggal7 }} placeholder="Select Date"/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="title-sm mb-2 d-block">Pilih Ruangan</div>
                                    <ul class="nav nav-pills rMeeting" id="kategori_lembur" role="tablist">
                                        <li class="nav-item show-room">
                                            <a class="btnNavTabs active position-relative" aria-selected="true" data-toggle="pill" id="btnRMeeting1" href="#RMeeting1" value="Ruang Meeting 1" role="tab">
                                                R. Meeting 1 <div class="kapasitas">Kapasitas Max  8 orang</div>
                                                <span class="badge pil-badge position-absolute" style=" color:#fff; bottom : 0; right : 50%; transform: translate(50%, 65%); background-color: #0073EE ">CLN</span>
                                            </a>
                                        </li>
                                        <li class="nav-item show-room">
                                            <a class="btnNavTabs position-relative" data-toggle="pill" id="btnRMeeting2" href="#RMeeting2" value="Ruang Meeting 2" role="tab">
                                                R. Meeting 2 <div class="kapasitas">Kapasitas Max 4 orang</div>
                                                <span class="badge pil-badge position-absolute" style=" color:#fff; bottom : 0; right : 50%; transform: translate(50%, 65%); background-color: #0073EE ">CLN</span>
                                            </a>
                                        </li>
                                        <li class="nav-item show-room">
                                            <a class="btnNavTabs position-relative" data-toggle="pill" id="btnRMeeting3" href="#RMeeting3" value="Ruang Meeting 3" role="tab">
                                                R. Meeting 3 <div class="kapasitas">Kapasitas Max 4 orang</div>
                                                <span class="badge pil-badge position-absolute" style=" color:#fff; bottom : 0; right : 50%; transform: translate(50%, 65%); background-color: #0073EE ">CLN</span>
                                            </a>
                                        </li>
                                        <li class="nav-item show-room">
                                            <a class="btnNavTabs position-relative" data-toggle="pill" id="btnRMeeting4" href="#RMeeting4" value="Ruang Meeting 4" role="tab">
                                                R. Meeting 4 <div class="kapasitas">Kapasitas Max 10 orang</div>
                                                <span class="badge pil-badge position-absolute" style=" color:#fff; bottom : 0; right : 50%; transform: translate(50%, 65%); background-color: #0073EE ">CLN</span>
                                            </a>
                                        </li>
                                        <li class="nav-item show-room">
                                            <a class="btnNavTabs position-relative" data-toggle="pill" id="btnRMeeting5" href="#RMeeting5" value="Ruang Meeting 5" role="tab">
                                                R. Meeting 5 <div class="kapasitas">Kapasitas Max 6 orang</div>
                                                <span class="badge pil-badge position-absolute" style=" color:#fff; bottom : 0; right : 50%; transform: translate(50%, 65%); background-color: #0073EE ">CLN</span>
                                            </a>
                                        </li>
                                        <li class="nav-item show-room ">
                                            <a class="btnNavTabs position-relative" data-toggle="pill" id="btnRMeeting6" href="#RMeeting6" value="Ruang Meeting 6" role="tab">
                                                R. Meeting 6 <div class="kapasitas">Kapasitas Max 8 orang</div>
                                                <span class="badge pil-badge position-absolute" style=" color:#fff; bottom : 0; right : 50%; transform: translate(50%, 65%); background-color: #0073EE ">INTERNAL ONLY</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                
                                <div class="col-12 mt-4 mb-2">
                                        <div class="tab-content ">
                                            <div class="tab-pane active show fade"id="RMeeting1" role="tabpanel">
                                                <div class="row loading">
                                                </div>
                                                <div class="list-Meeting1"></div>
                                            </div>
                                            <div class="tab-pane" id="RMeeting2" role="tabpanel">
                                                <div class="row loading">
                                                </div>
                                                <div class="list-Meeting2"></div>
                                            </div>
                                            <div class="tab-pane fade" id="RMeeting3" role="tabpanel">
                                                <div class="row loading">
                                                </div>
                                                <div class="list-Meeting3"></div>
                                            </div>
                                            <div class="tab-pane fade" id="RMeeting4" role="tabpanel">
                                                <div class="row loading">
                                                </div>
                                                <div class="list-Meeting4"></div>
                                            </div>
                                            <div class="tab-pane fade "id="RMeeting5" role="tabpanel">
                                                <div class="row loading">
                                                </div>
                                                <div class="list-Meeting5"></div>
                                            </div>
                                            <div class="tab-pane fade "id="RMeeting6" role="tabpanel">
                                                <div class="row loading">
                                                </div>
                                                <div class="list-Meeting6"></div>
                                            </div>
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
{{-- <script src="{{asset('common/js/moment.min.js')}}"></script> --}}

<script>
  $('#Date').datetimepicker({
    format: 'DD-MM-YYYY',
    showButtonPanel: false
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

<script src="{{asset('common/js/sweetalert2.js')}}"></script>
<script>

  // A $( document ).ready() block.
  $( document ).ready(function() {
      let load = document.getElementsByClassName('formloading')[0];
      load.addEventListener('submit', function() {
        // console.log('ok');
            showLoading();
      })
  });
    function showLoading(){
        let timerInterval
        Swal.fire({
            title: 'Please Wait . . .',
            html: ' ',
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
            }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
               
            }
        })
    }
</script>

<script>
 $(document).on('click', '#btnRMeeting1', function(){
     document.getElementById('RM1').value ='RM1';
 }); 
  $(document).on('click', '#btnRMeeting2', function(){
     document.getElementById('RM2').value ='RM2';
 }); 
  $(document).on('click', '#btnRMeeting3', function(){
     document.getElementById('RM3').value ='RM3';
 }); 
  $(document).on('click', '#btnRMeeting4', function(){
     document.getElementById('RM4').value ='RM4';
 }); 
  $(document).on('click', '#btnRMeeting5', function(){
     document.getElementById('RM5').value ='RM5';
 }); 
  $(document).on('click', '#btnRMeeting6', function(){
     document.getElementById('RM6').value ='RM6';
 }); 

 $('body').on('click', '.show-room', function () {
    // console.log(123)
    $('.checkbox-booking-0').prop('checked',false);
 })

$('body').on('change', '.tanggal_booking', function () {
    make_skeleton()

    var tanggal_booking = $(this).val()
    // console.log(tanggal_booking)

    var ruang_meeting = ["Meeting1", "Meeting2", "Meeting3", "Meeting4", "Meeting5" , "Meeting6"]
    for (let i = 0; i < ruang_meeting.length; i++) {
        showBookingTicket(tanggal_booking, ruang_meeting[i])
    }
})

var current_time = moment().format('HH:mm:ss');
var today = moment().format('YYYY-MM-DD')

function showBookingTicket(tanggal_booking, ruang_meeting){
    $.ajax({
        data: {
            tanggal_booking: tanggal_booking,
            ruang_meeting: ruang_meeting,
            from: "create_ticket"
        },
        url: '{{ route("show-booking-ticket") }}',           
        type: "get",
        dataType: 'json',            
        success: function (data) {
            // html = `<div class="d-flex flex-wrap flex-md-column flex-rowd-flex flex-wrap flex-md-column flex-row" style="height: 200px">`
            html = `<div class="d-flex flex-wrap flex-md-column flex-rowd-flex flex-wrap flex-md-column flex-row heightCheck2">`
            // html = `<div class="bookContainer">`
            for (let j = 0; j < data.length; j++) {
                var pointer_events = ``
                var checked = ``
                var color = ``
                var is_booked_class = ``
                if (data[j].is_booked == 1) {
                    var pointer_events = `none`
                    var color = `#bbb`
                    var checked = `checked`
                    var nama = data[j].nama
                    var deskripsi = data[j].deskripsi
                    var is_booked_class = `booked`
                }else if ((current_time >= data[j].waktu_finish) && (tanggal_booking <= today)) {
                    var pointer_events = `none`
                    var color = `#bbb`
                    var is_booked_class = `booked`
                }
                else {
                    var color = `#2B2B2B`
                }

                html += 
                    `<div class="`+is_booked_class+`">
                        <div class="input-group-prepend" style="pointer-events:`+pointer_events+`">
                            <input type="checkbox" class="check1 checkbox-booking-`+data[j].is_booked+`" id="checkbox-`+ruang_meeting+`-`+data[j].id+`" style="pointer-events:`+pointer_events+`" name="id_waktu_`+ruang_meeting+`[]" value="`+data[j].id+`">                                        
                            <label class="ml-2 pointer" style="color: `+color+`" for="checkbox-`+ruang_meeting+`-`+data[j].id+`">`+data[j].waktu_start+` - `+data[j].waktu_finish+`</label>
                        </div>
                    </div>`
            }

            html +=
                `</div>
                <div class="mt-2">
                    <div class="title-sm mb-1">Description</div>
                    <div class="input-group mb-3">
                        <textarea class="form-control border-input-10" id="" name="deskripsi_`+ruang_meeting+`" value="" placeholder="Add Description" style="height:120px"></textarea>
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
            $('.list-'+ruang_meeting+'').html(html)
            $('.loading').html("")
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

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
        text: "Room at this hour is not available, Please choose another room.",
        showConfirmButton: false,
        timer: 2500,
    })
}
$('body').on('click', '.booked', function () {
     showSuccessAlert()
 })

</script>

@endpush

