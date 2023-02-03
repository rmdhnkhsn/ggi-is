@extends("layouts.app")
@section("title","Subkon")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2GreyFull.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- <link rel="stylesheet" href="{{asset('/common/css/dataTables/fixedColumns.dataTables.css')}}"> -->
<style>
  /* .dropdown-menu.show {
    transform  : translate3d(-180px, -80px, 0px) !important; 
  } */
  .modal-backdrop {
    z-index: -1;
  }
</style>


@endpush


@section("content")

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <a href="#" class="rc-col-2">
        <div class="cards bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons-active fas fa-database"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc-active">All Data SUBKON</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="cards" style="padding: 1.5rem 1.8rem 2.2rem 1.8rem;margin-bottom:0">
          <div class="col-12 mb-2">
            <div class="title-20 text-left">Data kontrak kerja</div>
          </div>

          <div class="col-12 flexx" style="gap:.7rem">
            <form action="{{route('subkon.index.filter')}}" method="post" enctype="multipart/form-data" class="flexx" style="gap:.7rem;width:100%">
              @csrf
              <div class="input-group date relative mt-3" id="download" data-target-input="nearest">
                <div class="title-sm filterAbs">First Date</div>
                <div class="input-group-append datepiker" data-target="#download" data-toggle="datetimepicker">
                  <div class="inputGroupBlue" >
                    <i class="fs-18 fas fa-calendar-alt mr-2"></i> <span class="fs-14">Date</span><i class="ml-2 fas fa-caret-down"></i>
                  </div>
                </div>
                    <input type="text" name="tgl_awal" value="{{$tgl_awal}}" class="form-control datetimepicker-input borderInput" data-target="#download" placeholder="Select Date" />
              </div>
              <div class="input-group date relative mt-3" id="download1" data-target-input="nearest">
                <div class="title-sm filterAbs">Finish Date</div>
                <div class="input-group-append datepiker" data-target="#download1" data-toggle="datetimepicker">
                  <div class="inputGroupBlue" >
                    <i class="fs-18 fas fa-calendar-alt mr-2"></i> <span class="fs-14">Date</span><i class="ml-2 fas fa-caret-down"></i>
                  </div>
                </div>
                    <input type="text" name="tgl_akhir" value="{{$tgl_akhir}}" class="form-control datetimepicker-input borderInput" data-target="#download1" placeholder="Select Date" />
              </div>
              <button type="submit" class="btn-blue mt-3"><i class="fas fa-filter"></i></button> 
            </form>
    
            <div class="btnDownload mt-3">
              <form action="{{route('subkon.jatuh.tempo')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden"  name="tgl_awal" value="{{$tgl_awal}}"/>
                  <input type="hidden"  name="tgl_akhir" value="{{$tgl_akhir}}"/>
                  <button type="submit" class="btn-red btn-block">Download<i class="icon-fa-pdf fas fa-file-pdf"></i></button> 
              </form>
            </div>
            <button type="button" class="btn-blue no-wrap mt-3" data-toggle="modal" data-target="#buat_kontrak">Buat Kontrak<i class="ml-2 fs-20 fas fa-plus"></i></button>
            @include('MatDoc.subkon.partials.buat_kontrak')
          </div>
        </div>
      </div>
    </div>

<!-- item satuan beda -->
@if($errors->any())
  <div class="list-group">
    <span class="list-group-item list-group-item-action list-group-item-danger"> 

      Kontrak kerja di tolak..!, Periksa satuan Item Berikut ini : 
      @foreach ($errors->all() as $error)
        <span class="font-weight-bold"> {{ $error }},  </span>
      @endforeach
      item yang sama tidak boleh memiliki satuan yang berbeda.
    </span>    
  </div>
@endif
<!-- end item satuan beda -->

    <div class="row mt-3 pb-5">
      <div class="col-12">
        <div class="cards p-4">
          <div class="row">
            <div class="col-12">
              <div class="title-20 ml-2 text-left">Data All Subkon</div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 pb-5">
              <div class="cards-scroll p-2 scrollX" id="scroll-bar">
                <button id="btnSearch"><i class="fas fa-search"></i></button>  
                <table id="DTtable" class="table tbl-content-12 no-wrap" width="100%">
                  <thead>
                    <tr class="font-tr no-wrap">
                      <th>NO Kontrak Kerja</th>
                      <th>Branch</th>
                      <th>Jatuh Tempo</th>
                      <th>Customer Bond NO</th>
                      <th>NO BPJ</th>
                      <th>BPJ DATE</th>
                      <th>NO SKEP</th>
                      <th>Status</th>
                      <th>Nama PIC</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($subkon as $key=>$value)
                    @if($value['status_kontrak']=='Close')
                        <tr >
                          <td data-container="body" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Kontrak {{$value['sub_no_kontrak']}} Close">
                            <span class="grey-badge">{{$value['sub_no_kontrak']}}</span> 
                          </td>
                          <td>{{$value['branch']}}</td>
                          <td>{{$value['jatuh_tempo']}}</td>
                          <td>{{$value['no_bound']}}</td>
                          <td>{{$value['no_bpj']}}</td>
                          <td>{{$value['tgl_bpj']}}</td>
                          <td>{{$value['no_skep']}}</td>
                          <td>close</td>
                          <td>{{$value['nama']}}</td>
                          <td>
                              @include('MatDoc.subkon.partials.btn_action')
                          </td>
                        </tr>
                      @elseif($value['jatuh_tempo']<=$jatuh_tempo)
                        <tr>
                          <td data-toggle="popover" data-trigger="hover" title="Kontrak {{$value['sub_no_kontrak']}}" data-content="Segera jatuh tempo pada : {{$value['jatuh_tempo']}}"><span class="text-ping">{{$value['sub_no_kontrak']}}</span></td> 
                          <td data-toggle="popover" data-trigger="hover" title="Kontrak {{$value['sub_no_kontrak']}}" data-content="Segera jatuh tempo pada : {{$value['jatuh_tempo']}}"><span class="text-ping">{{$value['branch']}}</span></td>
                          <td data-toggle="popover" data-trigger="hover" title="Kontrak {{$value['sub_no_kontrak']}}" data-content="Segera jatuh tempo pada : {{$value['jatuh_tempo']}}"><span class="text-ping">{{$value['jatuh_tempo']}}</span></td>
                          <td data-toggle="popover" data-trigger="hover" title="Kontrak {{$value['sub_no_kontrak']}}" data-content="Segera jatuh tempo pada : {{$value['jatuh_tempo']}}"><span class="text-ping">{{$value['no_bound']}}</span></td>
                          <td data-toggle="popover" data-trigger="hover" title="Kontrak {{$value['sub_no_kontrak']}}" data-content="Segera jatuh tempo pada : {{$value['jatuh_tempo']}}"><span class="text-ping">{{$value['no_bpj']}}</span></td>
                          <td data-toggle="popover" data-trigger="hover" title="Kontrak {{$value['sub_no_kontrak']}}" data-content="Segera jatuh tempo pada : {{$value['jatuh_tempo']}}"><span class="text-ping">{{$value['tgl_bpj']}}</span></td>
                          <td data-toggle="popover" data-trigger="hover" title="Kontrak {{$value['sub_no_kontrak']}}" data-content="Segera jatuh tempo pada : {{$value['jatuh_tempo']}}"><span class="text-ping">{{$value['no_skep']}}</span></td>
                          @if(($value['balance261']=='0')&&($value['balance']=='0')&&($value['status']=='1')&&($value['no_skep']!=null || $value['no_bpj']!=null || $value['no_bound']!=null || $value['tgl_bpj']!=null))
                          <td>rekomendasi close</td>
                          @elseif(($value['status']==1) && ($value['no_skep']!=null || $value['no_bpj']!=null || $value['no_bound']!=null || $value['tgl_bpj']!=null))
                          <td>Berjalan</td>
                          @elseif($value['no_skep']!=null || $value['no_bpj']!=null || $value['no_bound']!=null || $value['tgl_bpj']!=null)
                          <td>legalitas</td>
                          @else
                          <td>Pengajuan</td>
                          @endif
                          <td data-toggle="popover" data-trigger="hover" title="Kontrak {{$value['sub_no_kontrak']}}" data-content="Segera jatuh tempo pada : {{$value['jatuh_tempo']}}"><span class="text-ping">{{$value['nama']}}</span></td>
                                                
                          <td>
                              @include('MatDoc.subkon.partials.btn_action')
                          </td>
                        </tr>
                      @else
                      <tr>
                          <td>{{$value['sub_no_kontrak']}}</td>
                          <td>{{$value['branch']}}</td>
                          <td>{{$value['jatuh_tempo']}}</td>
                          <td>{{$value['no_bound']}}</td>
                          <td>{{$value['no_bpj']}}</td>
                          <td>{{$value['tgl_bpj']}}</td>
                          <td>{{$value['no_skep']}}</td>
                          @if(($value['balance261']=='0')&&($value['balance']=='0')&&($value['status']=='1')&&($value['no_skep']!=null || $value['no_bpj']!=null || $value['no_bound']!=null || $value['tgl_bpj']!=null))
                          <td>rekomendasi close</td>
                          @elseif(($value['status']=='1')&&($value['no_skep']!=null || $value['no_bpj']!=null || $value['no_bound']!=null || $value['tgl_bpj']!=null))
                          <td>Berjalan</td>
                          @elseif($value['no_skep']!=null || $value['no_bpj']!=null || $value['no_bound']!=null || $value['tgl_bpj']!=null)
                          <td>legalitas</td>
                          @else
                          <td>Pengajuan</td>
                          @endif
                          <td>{{$value['nama']}}</td>
                          <td>
                              @include('MatDoc.subkon.partials.btn_action')
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
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<!-- <script src="{{asset('common/js/dataTables-fixed-column-min.js')}}"></script> -->

<script>
  
  $(document).ready(function(){
	  $('[data-toggle="popover"]').popover();
	});
	
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    "pageLength": 10,
    dom: 'frtp',
    fixedColumns:   {
      right: 1,
      left: 0
    },
    });
    
    $('#mySearchButton').on( 'keyup click', function () {
      table.search($('#mySearchText').val()).draw();
    } );




  });

  $('#download').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: true
  })
  $('#download1').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: true
  })
  $('#persetujuan').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: true
  })
  $('#bpj').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: true
  })
  $('#jatuh_tempo').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: true
  })

  $('#persetujuanC').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: true
  })
  $('#bpjC').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: true
  })
  $('#jatuh_tempoC').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: true
  })
  $('#tgl_kontrakC').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: true
  })

  $(".customFileInput").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".customFileLabelsBlue").addClass("selected").html(fileName).css('padding-left', '190px');
  });
</script>

<script src="{{asset('assets/js/toastr.min.js')}}"></script>

<script>
  $('.deleteFile').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    // console.log('ok');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["cancel", "yes"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
  });
</script>


<!-- <script src="{{asset('common/js/sweetalert2.js')}}"></script> -->

@if(Session::has('success'))
  <script>
    window.onload = function() {
    swal({
      position: 'center',
      icon: 'success',
      type: 'success',
      title: 'Success',
      text: 'Data Berhasil Disimpan',
      showConfirmButton: false,
      timer: 1500
    })

    };


  </script>
@endif
@if(Session::has('error'))
  <script>
    window.onload = function() { 
      swal({
      position: 'center',
      type: 'error',
      icon: 'error',
      title: 'Tidak Tersimpan',
      text: 'No Kontrak Sudah Terdaftar',
      showConfirmButton: false,
      timer: 1500
    })

    }
  </script>
@endif

<script>
  $('.select2bs_supplier').select2({
      theme: 'bootstrap4'
  })
  $('.select2bs').select2({
      theme: 'bootstrap4'
  })
  $('.select2_bu').select2({
      theme: 'bootstrap4'
  })

</script>

<script>
  function editDocument(evt){
    status = evt.value
    const document261 = evt.closest('.row').querySelector('.document-261')
    const document262 = evt.closest('.row').querySelector('.document-262')
    
    if( status == 'noEdit' ) {
      document262.classList.replace('d-block','d-none')
      document261.classList.replace('d-block','d-none')
    } else if( status == '261' ) {
      document261.classList.replace('d-none','d-block')
      document262.classList.replace('d-block','d-none')
    } else if( status == '262' ) {
      document262.classList.replace('d-none','d-block')
      document261.classList.replace('d-block','d-none')
    } else if( status == '261_262' ) {
      document262.classList.replace('d-none','d-block')
      document261.classList.replace('d-none','d-block')
    } else {
      alert('kesalahan di sisi user')
    }
  }
</script>

@endpush
