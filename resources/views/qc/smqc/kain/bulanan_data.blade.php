@extends("layouts.app")
@section("title","Report Fabric")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight6.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/fixedColumns.dataTables.css')}}">
@endpush

@push("sidebar")
    @include('qc.smqc.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">  
    <div class="row mt-3 pb-5">
      <div class="col-12">
        <div class="cards bg-card p-4">
          <div class="row">
            <div class="col-12">
              <div class="flex ml-2" style="gap:.6rem">
                <button class="btn-simple-monitor exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                <button class="btn-simple-delete exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button>
                <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
          <div class="row pb-5">
            <div class="col-12">
                <div class="cards-scroll scrollX" id="scroll-bar">
                  <table id="example1" class="table tbl-content no-wrap">
                    <thead>
                      <tr>
                        <th>Tanggal_Kedatangan</th>
                        <th>Supplier</th>
                        <th>DTG</th>
                        <th>CEK</th>
                        <th>RJK</th>
                        <th>%</th>
                        <th>Context_Design</th>
                        <th>Catatan</th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($final_data as $key => $value)
                        <tr>
                          <td>{{$value['date']}}</td>
                          <td>{{$value['supplier']}}</td>
                          <td>{{$value['fir']}}</td>
                          <td>{{$value['cek']}}</td>
                          <td>{{$value['far_rjct']}}</td>
                          <td>{{$value['persen']}} %</td>
                          <td>{{$value['cd']}}</td>
                          <td>{{$value['remark']}}</td>
                          <td>{{$value['fir_style']}}</td>
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
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
<script src="{{asset('common/js/dataTables-fixed-column-smqc.js')}}"></script>

<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })


    $('.exportExcel').click(function(){
        $(".buttons-excel").click();
    })

    $('.exportPdf').click(function(){
        $(".buttons-pdf").click();
    })
</script>
<script type="text/javascript">
 $(function () {
    $("#example1").DataTable({
        dom: 'Brftip',
        "buttons": [ "excel", "pdf" ],
        fixedColumns:   {
                left: 3
            },
        order:
            [0,'asc'],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endpush