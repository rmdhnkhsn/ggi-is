@extends("layouts.app")
@section("title","Monitoring Booking")
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
            <div class="col-md-9 mx-auto">
                <div class="cards" style="padding:30px 26px">
                    <div class="row">
                        <div class="col-12 justify-sb">
                            <div class="title-20">Monitoring Booking Room</div>
                            <div class="relative nextPrevDate">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="inputGroupBlue" style="width:50px;height:40px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" id="datepicker" class="form-control border-input-10 tanggal_booking" name="" value="" placeholder="Input Date" />
                                </div>
                                <button class="prev-day change_tanggal_booking" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Previous Date"><i class="fas fa-angle-left "></i></button>
                                <button class="next-day change_tanggal_booking" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Next Date"><i class="fas fa-angle-right"></i></button>
                            </div>
                        </div>
                        <input type="hidden" class="form-control border-input-10 kode_branch" name="" value="{{$branch}}" placeholder="Input Date" />

                        <div class="col-12 mb-3 mt-1">
                            <div class="borderlight"></div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="title-sm mb-2 d-block">Pilih Ruangan</div>
                                    <ul class="nav nav-pills rMeeting" id="branchRoom" role="tablist">
                                        <!-- Add Child Here -->
                                    </ul>
                                </div>
                                
                                <div class="col-12 my-2">
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h5>AM</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>PM</h5>
                                        </div>
                                    </div>
                                    <div class="tab-content" id="tab-content">
                                        <!-- Add Child Here -->
   
                                    </div>
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
<script src="{{asset('common/js/moment.min.js')}}"></script>

<!-- CALENDAR NEXT AND PREV -->
<script src="{{asset('/common/assets/plugins/CalendarNextPrev.js')}}"></script>

<script>
  $(function () {
    $('[data-toggle="popover"]').popover()
  })
</script> 

<script>
  $(document).ready(function(){
  $('#datepicker').val(moment().format('MM/DD/YYYY'));
      $('#datepicker').datepicker();
    $('.next-day').on('click', function () {
        var date = $('#datepicker').datepicker('getDate');
        date.setDate(date.getDate() +1)
        $('#datepicker').datepicker('setDate', date);
    });
    
    $('.prev-day').on('click', function () {
        var date = $('#datepicker').datepicker('getDate');
        date.setDate(date.getDate() -1)
        $('#datepicker').datepicker('setDate', date);
    });
    $('.today-date').on('click', function () {
        var date = moment().format('MM/DD/YYYY');
        $('#datepicker').datepicker('setDate', date);
    });
  });
</script>

<script>
    var current_time = moment().format('HH:mm:ss')
    var today = moment().format('MM/DD/YYYY')
    $( document ).ready( ()=> {
        let cache = localStorage.getItem('btnNavs')
            setTimeout(() => {
                if(cache > 0 ) {
                    let roomBtn =  document.getElementsByClassName('btnNavTabs')[cache]
                    let tabPane = document.getElementsByClassName('tab-pane')[cache]
                    roomBtn.classList.add('active')
                    roomBtn.setAttribute("aria-selected", "true");
                    tabPane.classList.add('active')
                } else {
                    let roomBtn =  document.getElementsByClassName('btnNavTabs')[0]
                    let tabPane = document.getElementsByClassName('tab-pane')[0]
                    roomBtn.classList.add('active')
                    roomBtn.setAttribute("aria-selected", "true");
                    tabPane.classList.add('active')
                }
            }, 1000);

            const tanggal_booking = $(".tanggal_booking").val()
            const bookingBranch = document.getElementsByClassName('kode_branch')[0].value
            make_skeleton()
            BookingTicket(bookingBranch, tanggal_booking)
    
    })

    $('body').on('click', '.change_tanggal_booking', function () {
        const tanggal_booking = $(".tanggal_booking").val()
            const bookingBranch = document.getElementsByClassName('kode_branch')[0].value
            make_skeleton()
            BookingTicket(bookingBranch, tanggal_booking)
    
    })  




    const createAnak = (data, room, bookingDate)=> {
        let html = ''
        data.map((d)=>{
            var pointer_events = ``
            var checked = ``
            var color = ``
            var is_booked_class = ``
            var nama = ``
            var deskripsi=''
            if (d.is_booked == 1) {
                var pointer_events = `none`
                var color = `#bbb`
                var checked = `checked`
                var nama = d.nama
                var deskripsi = d.deskripsi == null ? '' : d.deskripsi
                var is_booked_class = `booked`
            }else if ((current_time >= d.waktu_finish) && (bookingDate <= today)) {
                var pointer_events = `none`
                var color = `#bbb`
                var is_booked_class = `booked`
            }
            else {
                var color = `#2B2B2B`
            }
               

                html += 
                    ` <div class="${is_booked_class} widthCheck">
                        <div class="flex" style="gap:1rem">
                            <div class="input-group-prepend widthCheck2" style="pointer-events:${pointer_events}">
                                <input type="checkbox" class="check1 checkbox-booking-${d.is_booked}" id="checkbox-${room}-${d.id}"  style="pointer-events:${pointer_events}">                                         
                                <label class="ml-2 pointer no-wrap " style="color:  ${color}" for="checkbox-${room}-${d.id}">${d.waktu_start} - ${d.waktu_finish}</label>
                            </div>
                            <span class="${is_booked_class} labelCheck" style="color:  ${color}" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="${nama}-${deskripsi}">${nama}  ${deskripsi}</span>
                        </div> 
                    </div>`
        })
  $(function () {
    $('[data-toggle="popover"]').popover()
  })
        return html
    }

    const setRoom = (evt)=> {
        localStorage.setItem('btnNavs', evt-1)
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
                    pane += `<div class="list-${room.room} d-flex flex-wrap flex-md-column flex-rowd-flex flex-wrap flex-md-column flex-row">`
                    pane += `<div class="d-flex flex-wrap flex-md-column flex-rowd-flex flex-wrap flex-md-column flex-row heightCheck">`
                    pane += createAnak(room.booking, room.room, bookingDate)
                    pane += `</div></div></div>`

                })
            

                $('#tab-content').append(pane)
                $('#branchRoom').html(html)

                // setTimeout(() => {
                    let roomBtn =  document.getElementsByClassName('btnNavTabs')[parseInt(localStorage.getItem('btnNavs'))]
                    let tabPane = document.getElementsByClassName('tab-pane')[parseInt(localStorage.getItem('btnNavs'))]
                    roomBtn.classList.add('active')
                    roomBtn.setAttribute("aria-selected", "true");
                    tabPane.classList.add('active')
                // }, 500);
            }
        });
    }

    $('body').on('click', '.show-room', function () {
        $('.checkbox-booking-0').prop('checked',false);
    })
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
</script>
<script>

</script>


@endpush

