@extends("layouts.app")
@section("title","Input Partial")
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
              <a href="" class="nav-link active"></i>INPUT PARTIAL</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('rekap.partial.index' ,$data_kontrak->no_kontrak )}}" class="nav-link"></i>REKAP PARTIAL</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('monitoring.partial.index' ,$data_kontrak->no_kontrak )}}" class="nav-link"></i>MONITORING PARTIAL</a>
              <div class="blue-slide2"></div>
            </li>
          </ul>
        </div>
        <form  action="{{route('input.qty.partial')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" value="{{$data_kontrak->no_kontrak}}" name="no_kontrak">
          <input type="hidden" value="{{$data_kontrak->branch}}" name="branch">

          <div class="cardPart">
            <div class="cardHead">
              <div class="joblist-date p-3">
                <div class="title-24-blue no-wrap mt-1">DAFTAR WO</div>
                <div class="margin-date">
                    <button type="submit" class="btn-blue-md d-inline-flex">Partial <i class="fs-18 ml-2 fas fa-caret-right"></i></button>
                </div>
              </div>
            </div>
            <div class="section3"></div>
            <div class="cardBody p-3">
              <div class="row">
                <div class="col-12 pb-5">
                  <button id="btnSearch"><i class="fas fa-search"></i></button>  
                  <div class="card-close-orange mt-2 py-1 px-2">
                    <div class="txt-orange">Keterangan : Silahkan pilih WO yang akan dikirim terlebih dahulu, selanjutnya click tombol partial  untuk melajutkan proses selanjutnya</div>
                    <button type="button" class="close-icon" data-effect="fadeOut"><i class="fa fa-times"></i></button>
                  </div>
                  <div class="cards-scroll scrollX" id="scroll-bar">
                    <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                      <thead>
                        <tr class="bg-thead2">
                          <th></th>
                          <th>NO</th>
                          <th>KONTRAK KERJA</th>
                          <th>WO NUMBER</th>
                          <!-- <th>QTY</th> -->
                          <th>TANGGAL KONTRAK</th>
                          <th>JATUH TEMPO</th>
                          <th>SUPPLIER</th>
                          <th>BRANCH</th>
                          <th>PLANNER</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($wo_kontrak as $key=>$value)
                        <tr>
                          <td>
                          <input type="checkbox" class="check1" name="ceklis[]" value="{{$key}}">
                          </td>
                          <td>{{$key+1}}</td>
                          <td>{{$value->first()->no_kontrak}}</td>
                          <td>{{$key}}</td>
                          <!-- <td></td> -->
                          <td>{{$value->first()->tgl_kontrak}}</td>
                          <td>{{$value->first()->jatuh_tempo}}</td>
                          <td>{{$value->first()->supplier}}</td>
                          <td>{{$value->first()->supplier_branch}}</td>
                          <td>{{$value->first()->nama_planner}}</td>
                        </tr>
                        @endforeach
                      </tbody> 
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section> 

@endsection

@push("scripts")
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
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