@extends("layouts.app")
@section("title","Monitoring Partial")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTables-cardPart3.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/fixedColumns.dataTables.css')}}">
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
              <a href="{{ route('input.partial.index' ,[$data_kontrak->branch, $data_kontrak->no_kontrak] )}}" class="nav-link"></i>INPUT PARTIAL</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('rekap.partial.index' ,$data_kontrak->no_kontrak )}}" class="nav-link"></i>REKAP PARTIAL</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a href="#" class="nav-link active"></i>MONITORING PARTIAL</a>
              <div class="blue-slide2"></div>
            </li>
          </ul>
        </div>
        <div class="cardPart">
          <div class="cardHead">
            <div class="joblist-date p-3">
              <div class="title-24-blue no-wrap mt-1">MONITORING PARTIAL</div>
              <div class="margin-date flex gap-2">
                <button class="btn-icon-green exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel" style="width:35px;height:35px"><i class="fs-20 fas fa-file-excel"></i></button>
                <button class="btn-icon-red exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF" style="width:35px;height:35px"><i class="fs-20 fas fa-file-pdf"></i></button>
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
                        <th class="bg-thead2" rowspan="2" style="padding-top:2rem">NO</th>
                        <th class="bg-thead2" rowspan="2" style="padding-top:2rem">KODE BARANG</th>
                        <th class="bg-thead2" rowspan="2" style="padding-top:2rem">JENIS BARANG</th>
                        <th class="bg-thead2" rowspan="2" style="padding-top:2rem">QTY KONTRAK</th>
                        <th rowspan="2" style="padding-top:2rem">SATUAN</th>
                        @foreach($pemasukan_group as $key => $value)
                        <th class="text-center">{{$value['id_no_aju']}}</th>
                        @endforeach
                        <th rowspan="2" style="padding-top:2rem">JUMLAH MASUK</th>
                        <th rowspan="2" style="padding-top:2rem">TERSISA</th>
                      </tr>
                      <tr class="bg-thead2">
                        @foreach($pemasukan_group as $key1 => $value1)
                        <th class="fw-500">{{$value1['tanggal']}}</th>
                        @endforeach
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data_barangJadi as $key2 =>$value2)
                      <tr>
                        <td>{{$key2+1}}</td>
                        <td>{{$value2['item_number']}} </td>
                        <td>{{$value2['deskripsi']}}</td>
                        <td>{{$value2['qty']}}</td>
                        <td>{{$value2['satua']}}</td>
                        @foreach($pemasukan_group as $key4=>$value4)
                        <?php 
                              $data=collect($data_pemasukan);
                              $cek_data = $data->where('id_barangjadi',$value2['id'])->where('id_no_aju',$value4['id_no_aju'])->count();
                              if ($cek_data != 0) {
                                  $jumlah=$data->where('id_barangjadi',$value2['id'])->where('id_no_aju',$value4['id_no_aju'])->sum('qty');
                                  $qty=$jumlah;
                              }
                              else{
                                $qty='-';
                              }
                          ?>
                        <td>{{$qty}}</td>
                        @endforeach
                        <td>{{$value2['jumlah_pemasukan']}}</td>
                        <td>{{$value2['sisa']}}</td>
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
<script src="{{asset('common/js/dataTables-fixed-column.js')}}"></script>
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
        fixedColumns:   {
            left: 4
        },
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