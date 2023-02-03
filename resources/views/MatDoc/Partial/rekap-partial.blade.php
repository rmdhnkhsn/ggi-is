@extends("layouts.app")
@section("title","Rekap Partial")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTables-cardPart3.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
@endpush

@section("content")
<style>
  .blue-md-tabs2 .nav-item-show {
    border: none !important;
  }
  .nav-tabs {
    border-bottom: 1px solid #f2f2f2
  }
</style>
<section class="content">
  <div class="container-fluid pb-5">
    @include('MatDoc.Partial.components.header-card')
    <div class="row">
      <div class="col-12">
        <div class="cards3" style="margin-bottom:-1px">
          <ul class="nav nav-tabs blue-md-tabs2 justify-start" role="tablist">
            <li class="nav-item-show">
              <a href="{{ route('input.partial.index' ,[$data_kontrak->branch,$data_kontrak->no_kontrak] )}}" class="nav-link"></i>INPUT PARTIAL</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a href="#" class="nav-link active"></i>REKAP PARTIAL</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('monitoring.partial.index' ,$data_kontrak->no_kontrak )}}" class="nav-link"></i>MONITORING PARTIAL</a>
              <div class="blue-slide2"></div>
            </li>
          </ul>
        </div>
        <div class="cardPart">
          <div class="cardHead">
            <div class="joblist-date p-3">
              <div class="title-24-blue no-wrap mt-1">REKAP PARTIAL</div>
              <div class="margin-date flex gap-2">
                <button class="btn-icon-green exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel" style="width:35px;height:35px"><i class="fs-18 fas fa-file-excel"></i></button>
                <button class="btn-icon-red exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF" style="width:35px;height:35px"><i class="fs-18 fas fa-file-pdf"></i></button>
              </div>
            </div>
          </div>
          <div class="section3"></div>
          <div class="cardBody p-3">
            <div class="row">
              <div class="col-12 pb-5">
                <button id="btnSearch"><i class="fas fa-search"></i></button>
                <div class="cards-scroll scrollX" id="scroll-bar">
                  <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                    <thead>
                      <tr class="bg-thead2">
                        <th width="20px">NO</th>
                        <th width="60px">ID</th>
                        <th width="60px">SURAT JALAN</th>
                        <th width="90px">TANGGAL</th>
                        <th>DAFTAR WO</th>
                        <th width="40px">TOTAL QTY</th>
                        <th width="50px">ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $key => $value)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$value['id_sj']}}</td>
                        <td>{{$value['no_surat_jalan']}}</td>
                        <td>{{$value['tanggal_sj']}}</td>
                        <td>{{$value['daftar_wo']}}</td>
                        <td>{{$value['qty']}}</td>
                        <td>
                          @if($value['id_no_aju']==null)
                          <div class="container-tbl-btn flex gap-2">
                            <a href="{{ route('edit.qty.partial', [$value['id_sj'], $data_kontrak->no_kontrak] )}}" class="btn-icon-yellow" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Edit Data"><i class="fs-18 fas fa-pencil-alt"></i></a>
                            <a href="{{ route('delete.qty.partial', [$value['id_sj'], $data_kontrak->no_kontrak] )}}" class="btn-icon-pink deleteData" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Delete Data"><i class="fs-18 fas fa-trash"></i></a>
                          </div>
                          @else
                          <div class="badge-green" style="width:100px">Receive</div>
                          @endif
                        </td>
                      </tr>
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
</section> 

@endsection

@push("scripts")
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>

<script>
  $('.deleteData').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
      swal({
        title: "Apakah Anda Yakin?",
        text: "Setelah mengkonfirmasi, data akan secara permanent di hapus",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ff3f3f",
        confirmButtonText: "Yes",
        cancelButtonText: "No ",
        closeOnConfirm: false,
        closeOnCancel: false
      },
    function(isConfirm){
        if (isConfirm) {
          window.location.href = url; 
          swal("Data Dihapus", "Data berhasil dihapus dari daftar rekap partial", "success");       // submitting the form when user press yes
        } else {
        swal("Batal", "Data Anda Kembali Aman", "error");
        }
    }); 
  });
</script>
<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
        "pageLength": 10,
        dom: 'Bfrtp',
        "buttons": [ {extend: 'excel', title: ''}, "pdf",
        {
            extend: 'pdfHtml5',
            orientation: 'landscape',
            text: 'PDF',
            download: 'open'
        }],
    });
  });
  
  $('.exportExcel').click(function(){
      $(".buttons-excel").click();
  })

  $('.exportPdf').click(function(){
      $(".buttons-pdf").click();
  })
</script>
<script>
  $(function () {
    $('[data-toggle="popover"]').popover()
  })

  $('.close-icon').on('click',function() {
    $(this).closest('.card-close-orange').fadeOut();
  })
</script>
@endpush