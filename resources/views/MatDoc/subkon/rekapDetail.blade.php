@extends("layouts.app")
@section("title","Rekap Detail")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTables-cardPart.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush


@section("content")

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <a href="{{ route('subkon.monitoring',$no_kontrak)}}" class="rc-col-2">
        <div class="cards h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons fas fa-desktop"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc">MONITORING</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('subkon.rekapitulasi',$no_kontrak)}}" class="rc-col-2">
        <div class="cards h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons fas fa-book"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc">REKAPITULASI</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('subkon.rekapDetail',$no_kontrak)}}" class="rc-col-2">
        <div class="cards bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons-active fas fa-file-contract"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc-active">REKAP DETAIL</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="cardPart">
          <div class="cardHead">
            <div class="joblist-date p-3">
              <div class="title-24-blue no-wrap mt-1">REKAP DETAIL 262</div>
              <div class="margin-date flexx gap-2">
                <button type="button" class="btn-icon-green exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel" style="width:35px;height:35px"><i class="fs-18 fas fa-file-excel"></i></button>
                <button type="button" class="btn-icon-red exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF" style="width:35px;height:35px"><i class="fs-18 fas fa-file-pdf"></i></button>
                <button type="button" class="btnSoftBlue ml-1" data-toggle="modal" data-target="#filterRekap"><i class="fs-18 mr-2 fas fa-filter"></i>Filter</button>
                @include('MatDoc.subkon.partials.filterRekap')
              </div>
            </div>
          </div>
          <div class="section"></div>
          <div class="cardBody p-3">
            <div class="row">
              <div class="col-12 pb-5">
                <button id="btnSearch"><i class="fas fa-search"></i></button>  
                <div class="cards-scroll scrollX" id="scroll-bar">
                  <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                    <thead>
                      <tr class="bg-thead2">
                        <th width="30px">NO</th>
                        <th width="50px">ITEM CODE</th>
                        <th width="50px">WO</th>
                        <th>JENIS BARANG</th>
                        <th width="50px">QTY</th>
                        <th width="50px">SATUAN</th>
                        <th width="50px">TERSISA</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($rekap_detail as $k =>$v)
                      <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$v['kode_barang']}}</td>
                        <td>{{$v['no_wo']}}</td>
                        <td>{{$v['nama_barang']}}</td>
                        <td>{{$v['qty']}}</td>
                        <td>{{$v['satuan']}}</td>
                        <td>{{$v['tersisa']}}</td>
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
</script>
@endpush