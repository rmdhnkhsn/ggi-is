@extends("layouts.app")
@section("title","Admin Ticketing")
@push("styles")
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style_maps.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push("sidebar")
    @include('it_dt.Ticketing.itdt_ticketing.layouts.navbar')
@endpush
@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row ITticketing pb-4">
      <div class="col-lg-8">
        <div class="row">
          <div class="col-12">
            <div class="cards-18 p-4">
              <div class="btnTicket">
                <div class="title-22 text-left">Dashboard Accounting Ticketing</div>
                <div class="btnTicket2">
                  <a href="{{ route('create-ticket')}}" class="btn-blue-md">Create Ticket<i class="fs-18 ml-3 fas fa-ticket-alt"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="cards-18 p-4" style="min-height:100vh">
              <ul class="nav nav-tabs sr-md-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item-show">
                  <a class="nav-link relative active" data-toggle="tab" href="#adm_waiting" role="tab"></i>
                    <i class="fs-28 fas fa-hourglass-half"></i>
                    <div class="f-14">Waiting</div>
                    @if($waiting>0)
                    <span class="tabs-badge">{{$waiting}}</span>
                    @endif
                  </a>
                  <div class="sr-slide"></div>
                </li>
                <li class="nav-item-show">
                  <a class="nav-link relative" data-toggle="tab" href="#adm_process" role="tab"></i>
                    <i class="fs-28 fas fa-tools"></i>
                    <div class="f-14">On Process</div>
                    @if($process>0)
                    <span class="tabs-badge">{{$process}}</span>
                    @endif
                  </a>
                  <div class="sr-slide"></div>
                </li>
                <li class="nav-item-show">
                  <a class="nav-link relative" data-toggle="tab" href="#adm_pending" role="tab"></i>
                    <i class="fs-28 fas fa-history"></i>
                    <div class="f-14">Reject</div>
                    @if($reject>0)
                    <span class="tabs-badge">{{$reject}}</span>
                    @endif
                  </a>
                  <div class="sr-slide"></div>
                </li>
                <li class="nav-item-show">
                  <a class="nav-link relative" data-toggle="tab" href="#adm_done" role="tab"></i>
                    <i class="fs-28 fas fa-check-double"></i>
                    <div class="f-14">Done</div>
                    @if($done>0)
                    <span class="tabs-badge">{{$done}}</span>
                    @endif
                  </a>
                  <div class="sr-slide"></div>
                </li>
              </ul>
              <div class="tab-content card-block">
                <div class="tab-pane active" id="adm_waiting" role="tabpanel">
                @if($waiting>0)
                  @include('it_dt.Ticketing.itdt_ticketing.Accounting.partials_admin.tab-waiting')
                @else
                <div class="no-ticket-queue">
                  <img src="{{url('images/iconpack/noticket.svg')}}"><br>
                  <span class="no-ticket-capt">No Ticket Yet</span>
                </div>
                @endif
                </div>
                <div class="tab-pane" id="adm_process" role="tabpanel">
                @if($process>0)
                  @include('it_dt.Ticketing.itdt_ticketing.Accounting.partials_admin.tab-process')
                @else
                <div class="no-ticket-queue">
                  <img src="{{url('images/iconpack/noticket.svg')}}"><br>
                  <span class="no-ticket-capt">No Ticket Yet</span>
                </div>
                @endif
                </div>
                <div class="tab-pane" id="adm_pending" role="tabpanel">
                @if($reject>0)
                  @include('it_dt.Ticketing.itdt_ticketing.Accounting.partials_admin.tab-reject')
                @else
                <div class="no-ticket-queue">
                  <img src="{{url('images/iconpack/noticket.svg')}}"><br>
                  <span class="no-ticket-capt">No Ticket Yet</span>
                </div>
                @endif
                </div>
                <div class="tab-pane" id="adm_done" role="tabpanel">
                @if($done>0)
                  @include('it_dt.Ticketing.itdt_ticketing.Accounting.partials_admin.tab-done')
                @else
                <div class="no-ticket-queue">
                  <img src="{{url('images/iconpack/noticket.svg')}}"><br>
                  <span class="no-ticket-capt">No Ticket Yet</span>
                </div>
                @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="row">
          <div class="col-12 sr-notification">
            <div class="cards-18" style="max-height:855px; padding:1.3rem">
              <div class="row">
                <div class="col-12">
                  <div class="title-16 mb-1" style="font-weight:500">Notification</div>
                  <div class="cards-scroll pr-1 mt-1 scroll-Y" id="scroll-bar-sm" style="max-height:534px">
                  @foreach($waiting_acc as $key => $value)
                      <div class="notification">
                        <div class="notification-icon"><i class="fas fa-bell"></i></div>
                        <div class="notification-desc">                    
                          <div class="notification-title text-truncate"><span class="txt-blue fw-600">NEW</span> Ticket</div> 
                          <div class="notification-number text-truncate">{{$value->nama}} - {{$value->kategori}}</div>
                        </div>
                      </div>
                  @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="cards-18" style="max-height:855px; padding:1.6rem 1.3rem">
              <div class="row">
                <div class="col-12">
                  <div class="title-16 mb-1" style="font-weight:500">Support</div>
                  <div class="cards-scroll pr-1 mt-1 scrollY" id="scroll-bar" style="max-height:378px">
                    @foreach($it_support as $key => $value)
                    <div class="technician">
                      <div class="tech-count">{{$value['jumlah_asiggn']}}</div>
                      <div class="tech-desc">
                        <div class="tech-name text-truncate">{{$value['nama']}}</div> 
                        @if($value['proses']!=null)
                          <div class="tech-status text-truncate"><span class="txt-blue fw-500">ON Progress</span> {{$value['branchdetail']}} -{{$value['no']}} </div> 
                        @else
                          <div class="tech-status text-truncate"><span class="txt-ygreen fw-500">Ready to serve</span></div> 
                        @endif
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    @include('it_dt.Ticketing.itdt_ticketing.partials.adminChat.floating-chat')
  </div>
</section>
@endsection

@push("scripts")
<script>
  $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
  });
</script>

<script>
  $('.select2bs90').select2({
    theme: 'bootstrap4'
  })
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })

  $('.select2bs5').select2({
    theme: 'bootstrap4'
  })
</script>
<script>
    /*=============== ACCORDION ===============*/
  $(document).ready(function(){
    const options = document.getElementsByClassName('select2-selection--single');
    Array.from(options).forEach(function (element) {
        element.style = "height : 40px !important";
        console.log(element);
      });
	  $('[data-toggle="popover"]').popover();
	});
  const accordionItems = document.querySelectorAll('.accordion_item')
 
  accordionItems.forEach((item) =>{
      const accordionHeader = item.querySelector('.accordion_header')

      accordionHeader.addEventListener('click', () =>{
          const openItem = document.querySelector('.accordion-open')
          
          toggleItem(item)

          if(openItem && openItem!== item){
              toggleItem(openItem)
          }
      })
  })

  const toggleItem = (item) =>{
      const accordionContent = item.querySelector('.accordion_content')

      if(item.classList.contains('accordion-open')){
          accordionContent.removeAttribute('style')
          item.classList.remove('accordion-open')
      }else{
          accordionContent.style.height = accordionContent.scrollHeight + 'px'
          item.classList.add('accordion-open')
      }
  }
</script>

<script type="text/javascript">
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    // $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function () {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>

<script>
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

  function search_error(elem) {
    var error=$(elem).val();
    // console.log(error);

    if (error!==''||error!=='undefined') {
      var data=get_error(error);

      if (!jQuery.isEmptyObject(data)) {
        // alert(JSON.stringify(data.gp_tun));
      const option = document.getElementsByClassName('option2');
      Array.from(option).forEach(function (element) {
        element.innerHTML ='';
      });
    
      for (const property in data) {
        Array.from(option).forEach(function (element) {
              const node = document.createElement("option");
              const textnode = document.createTextNode(property);
              node.appendChild(textnode);
              element.appendChild(node);
      });
      }
      } else {

      }

    }
  }

  function get_error(error) {
    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
    });
    var return_first1 = function () {
        var lbr = 0;
                $.ajax({
                    async: false,
                    data: {
                      ID: error,
                    },
                    url: '{{ route("get.error.ticket") }}',
                    type: 'POST',
                    success: function (response) {
                        // alert(JSON.stringify(response));
                        lbr = response;

                    },
                    error: function (jqXHR, exception) {
                        var msg = '';
                        if (jqXHR.status === 0) {
                            msg = 'KOMPUTER SEDANG OFFLINE';
                            desc = 'Periksa sambungan koneksi anda';
                        } else if (jqXHR.status == 404) {
                            msg = 'WO Tidak ditemukan';
                            desc = 'Harap Masukan Nomor WO dengan benar';
                        } else if (jqXHR.status == 500) {
                            msg = 'WO TIDAK DITEMUKAN';
                            desc = 'Harap Masukan Nomor WO dengan benar';
                        } else if (exception === 'parsererror') {
                            msg = 'Requested JSON parse failed.';
                        } else if (exception === 'timeout') {
                            msg = 'WAKTU HABIS';
                            desc = 'Sistem tidak merespon ketika mencari WO';
                        } else if (exception === 'abort') {
                            msg = 'PENCARIAN WO DIBATALKAN';
                            desc = 'Silahkan tulis ulang no WO';
                        } else {
                            msg = 'Uncaught Error.\n' + jqXHR.responseText;
                        }
                        // Swal({
                        //     icon: 'error',
                        //     title: msg,
                        //     text: desc
                        //   })
                    },
                });
        return lbr;
    }(); 
    return return_first1;
  }
</script>
<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function() {
            location.reload();
        }, 210000);
    })
</script>
<script>
  // ==========================================================
  function Process(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.imageUploadWrap4').hide();

      reader.onload = function (e) {
          $(".fileUploadImg4").attr("src", e.target.result);
          $(".fileUploadContent4").show();
      };
      reader.readAsDataURL(input.files[0]);

    } else {
      removeProcess();
    }
  }
  function removeProcess() {
    $('.fileUploadInput4').replaceWith($('.fileUploadInput4').clone());
    $('.fileUploadContent4').hide();
    $('.imageUploadWrap4').show();
  }
  $('.imageUploadWrap4').bind('dragover', function () {
      $('.imageUploadWrap4').addClass('image-dropping');
  });
  $('.imageUploadWrap4').bind('dragleave', function () {
      $('.imageUploadWrap4').removeClass('image-dropping');
  });
    // ==========================================================
    function Pending(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.imageUploadWrap5').hide();

      reader.onload = function (e) {
          $(".fileUploadImg5").attr("src", e.target.result);
          $(".fileUploadContent5").show();
      };
      reader.readAsDataURL(input.files[0]);

    } else {
      removePending();
    }
  }
  function removePending() {
    $('.fileUploadInput5').replaceWith($('.fileUploadInput5').clone());
    $('.fileUploadContent5').hide();
    $('.imageUploadWrap5').show();
  }
  $('.imageUploadWrap5').bind('dragover', function () {
      $('.imageUploadWrap5').addClass('image-dropping');
  });
  $('.imageUploadWrap5').bind('dragleave', function () {
      $('.imageUploadWrap5').removeClass('image-dropping');
  });
</script>

<script>
  function RealisasiBalance(clicked_id){
    // console.log(clicked_id);
    $('#realisasi'+clicked_id).modal('show');
    const rencana = document.getElementById("rencana"+clicked_id).value;
    // console.log(rencana);
    $("input").keyup(function () {
      $("#realisasiAmount"+clicked_id).val(function () {
          const realisasi_amount = parseFloat($("#realisasiAmount"+clicked_id).val());
          // console.log(realisasi_amount);
          return realisasi_amount;
      });
      $("#balanceAmount"+clicked_id).val(function () {
          const rencana = parseFloat($("#rencana"+clicked_id).val());
          const realisasi_amount = parseFloat($("#realisasiAmount"+clicked_id).val());
          const hasil = rencana - realisasi_amount;
          const hasiRp = `${convertToRupiah(parseFloat(hasil).toFixed(2))}`;
          return hasiRp;
      });
    });
  }
    function convertToRupiah(NominalAmount){
      var rupiah = '';
      let angka = NominalAmount.replace(".", ",");		
      // console.log(result)
      var angkarev = angka.toString().split('').reverse().join('');
      for(var i = 0; i < angkarev.length; i++) {
        if(i%3 == 0) {
          var angkaKoma=angkarev.substr(i,3)
          var lastChar = angkaKoma.substr(angkaKoma.length - 1); 
          if(lastChar!=','){
          rupiah += angkarev.substr(i,3)+'.';
          }
          else{
            rupiah += angkarev.substr(i,3)+'';
          }
        }
      }
      
      return rupiah.split('',rupiah.length-1).reverse().join('');
    }
</script>

<!------------------------------js chat awal -------------------------------------------------------->

@endpush