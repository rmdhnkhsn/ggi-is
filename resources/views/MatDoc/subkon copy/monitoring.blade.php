@extends("layouts.app")
@section("title","Monitoring")
@push("styles")
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush


@section("content")

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <a href="#" class="rc-col-2">
        <div class="cards bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons-active fas fa-desktop"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc-active">Monitoring SUBKON</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('subkon.rekapitulasi',$no_kontrak)}}" class="rc-col-2">
        <div class="cards h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons fas fa-file-contract"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc">Rekapitulasi Subkon</div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <div class="row">
      <div class="col-12 justify-center">
        <div class="title-24">Monitoring Pengeluaran Barang SUBKON 261</div>
      </div>
    </div>
    @include('MatDoc.subkon.partials.monitoring.card-flat')
    <div class="row mt-4">
      <div class="col-12 px-2">
        <ul class="nav nav-tabs sb-md-tabs mb-4" role="tablist">
            <li class="nav-item-show">
                <a class="nav-link active" data-toggle="tab" href="#S1" role="tab"></i>SUBKON 261</a>
                <div class="sb-slide"></div>
            </li>
            <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#S2" role="tab"></i>SUBKON 262</a>
                <div class="sb-slide"></div>
            </li>
        </ul>
        <div class="tab-content card-block">
            <div class="tab-pane active" id="S1" role="tabpanel">
              @include('MatDoc.subkon.partials.monitoring.subkon_261')
            </div>
            <div class="tab-pane" id="S2" role="tabpanel">
              @include('MatDoc.subkon.partials.monitoring.subkon_262')
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/export_btn/buttons2.js')}}"></script>
<!-- <script src="{{asset('common/js/export_btn/buttons.html5.js')}}"></script> -->

<script>
  jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
  });
</script>

<script>
  // $(document).ready( function () {
  //   var table = $('#DTtable1').DataTable({
  //     "pageLength": 10,
  //     "dom": '<"search"f><"top">rt<"bottom"p><"clear">',
  //   });
  // });

  $(function () {
    $("#DTtable1").DataTable({
      dom: 'Brftp',
      "buttons": [ "excel", "pdf" ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>




<script>
  $(function () {
    $("#DTtable262").DataTable({
      dom: 'Brftp',
      "buttons": [ "excel", "pdf" ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

<script src="{{asset('assets/js/toastr.min.js')}}"></script>
<script src="{{asset('common/js/sweetalert2.js')}}"></script>

@if(Session::has('success'))
  <script>
    window.onload = function() {
      Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Data Berhasil Disimpan',
      showConfirmButton: false,
      timer: 1500
      })
    };
  </script>
@endif
@if(Session::has('error'))
  <script>
    window.onload = function() { 
        Swal.fire({
        icon: 'error',
        title: 'No Aju Sudah Terdaftar',
        text: 'Harap lengkapi data dengan benar'
      })
    }
  </script>
@endif
<script>
  $('.select2bs4').select2({
      theme: 'bootstrap4',
      minimumInputLength: 3,
      ajax: {
        url: 'http://10.8.0.108/jdeapi/public/api/itemnumber/search=',
        dataType: 'json',
        delay: 250,
        data: function (params) {
          var query = {
            F4101_ITM: params.term,
            select:'F4101_ITM'
          }
          
          return query;
        },
        processResults: function (data) {
          return {
          results:  $.map(data, function (item) {
                return {
                    text: item.F4101_ITM,
                    id: item.F4101_ITM
                }
            })

          };

        },
      }
  })

  $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
  });
  $('#item_number').change(function(){
    var ID = $(this).val();
    if(ID){
        $.ajax({
        data: {
          ID: ID,
        },
        url: '{{ route("subkon.get.item") }}',           
        type: "post",
        dataType: 'json', 
          success:function(res){               
            if(res){
              // console.log(res);
                $("#deskripsi").val(res.F4101_DSC1);
                
            }else{
            }
          }
        });
    }else{

    }      
  });
</script>

<script>
  $('.select2bs_262').select2({
      theme: 'bootstrap4',
      minimumInputLength: 3,
      ajax: {
        url: 'http://10.8.0.108/jdeapi/public/api/itemnumber/search=',
        dataType: 'json',
        delay: 250,
        data: function (params) {
          var query = {
            F4101_DSC1: params.term,
            select:'F4101_DSC1,F4101_ITM'
          }
          
          return query;
        },
        processResults: function (data) {
          return {
          results:  $.map(data, function (item) {
                return {
                    text: item.F4101_DSC1,
                    id: item.F4101_DSC1
                }
            })

          };

        },
      }
  })

  $('.select2bs_pemasukan').select2({
        theme: 'bootstrap4'
  })
  $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
  });
  $('#nama_barang').change(function(){
    var ID = $(this).val();
    console.log(ID )
    if(ID){
        $.ajax({
        data: {
          ID: ID,
        },
        url: '{{ route("subkon.get.garment") }}',           
        type: "post",
        dataType: 'json', 
          success:function(res){               
            if(res){
              // console.log()
                $("#kdbarang").val(res.item_number);
                $("#satuanReturn").val(res.satuan);

                
            }else{
            }
          }
        });
    }else{
    }      
  });
</script>

<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>


<script>

  document.getElementById('buttonpengeluaran').addEventListener('click', function(e) {
    if(e.target.parentNode.parentNode.getElementsByTagName('input')[1].value != ''  && e.target.parentNode.parentNode.getElementsByTagName('input')[2].value != '') {
      showLoading();
      e.target.parentNode.parentNode.parentNode.submit();
    } else {
      alert('harap isi nomor BPB dan No Aju Terlebih dahulu.')
    }
  })

  function showLoading(){
        let timerInterval
        swal({
            title: 'Please Wait . . .',
            html: ' ',
            // icon: "https://www.boasnotas.com/img/loading.gif",
            button: false,
            timerProgressBar: true,
            className : 'iniLoading',
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
                // showSuccessAlert()
            }
            }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                // console.log('I was closed by the timer')
               
            }
        })
    }

  $('[data-toggle="popover"]').popover();
  
  $('.add262').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    const form = document.getElementById('myForm262');
    const kodebarang = document.getElementById('kdbarang').value;
    console.log(url);

    if( kodebarang == '' ) {
      Swal.fire({
          icon: 'error',
          title: 'Kode barang tidak boleh kosong',
          text: 'Periksa Kembali',
        })
    } else {
      swal({
          title: 'Are you sure?',
          text: 'add garment',
          icon: 'warning',
          buttons: ["cancel", "yes"],
      }).then(function(value) {
          if (value) {
            form.submit();
              // window.location.href = url;
          }
      });
    }
  });

  $('.add261').on('click', function (event) {
    event.preventDefault();
    const form = document.getElementById('myForm261');
    const itemnumber = document.getElementById('item_number').value;

    if( itemnumber == '' ) {
      Swal.fire({
          icon: 'error',
          title: 'Item number tidak boleh kosong',
          text: 'Periksa Kembali',
        })
    } else {
      swal({
          title: 'Are you sure?',
          text: 'add garment',
          icon: 'warning',
          buttons: ["cancel", "yes"],
      }).then(function(value) {
          if (value) {
            form.submit();
          }
      });
    }
  });
</script>
@endpush