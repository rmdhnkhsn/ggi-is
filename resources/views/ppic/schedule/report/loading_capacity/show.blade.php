@extends("layouts.report_layout")
@section("title","Report Loading Capacity")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('/common/css/data-tables/colReorder.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/fixedHeader.dataTables.min.css')}}">

<style>
.buttons-csv {
  display: none !important;
}
.buttons-pdf {
  display: none !important;
}
.table-border {
  border: 1px solid #ccc;
}

.table-border th,
.table-border td {
  border: 1px solid #ccc;
}

table.dataTable {
  margin-top:0px !important;
}

.table thead tr th {
    font-size: 12px !important;
}

.table tbody tr td {
    font-size: 12px !important;
}

.table tfoot tr th {
    font-size: 12px !important;
}

</style>
@endpush
<!-- @push("sidebar")
  @include('ppic.schedule.layouts.navbar')
@endpush -->

@section("content")

<section class="content">
    <!-- Main content -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- <span class="reject-cutting-tittle">Production Schedule PPIC</span> -->
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card-body table-responsive">
                <table id="tabelReject" class="table table-sm table-border">
                  <thead>
                    <tr style="background:#007bff25">
                        <th colspan="9"></th>
                        @foreach($bulan as $d)
                          <th colspan="2">{{$d}}</th>
                        @endforeach
                        <!-- <th colspan="2">month2</th>
                        <th colspan="2">month3</th>
                        <th colspan="2">month4</th>
                        <th colspan="2">month5</th>
                        <th colspan="2">month6</th>
                        <th colspan="2">month7</th>
                        <th colspan="2">month8</th> -->
                    </tr>
                    <tr style="background:#007bff25">
                        <th>Factory</th>
                        <th>Line</th>
                        <th>End.Sewing</th>
                        <th>Buyer</th>
                        <th>Item</th>
                        <th>Persen</th>
                        <th>Smv</th>
                        <th>Jml.Op</th>
                        <th>Target/Day</th>

                        @foreach($bulan as $d)
                          <th>Kapasitas</th>
                          <th>Hari.Kerja</th>
                        @endforeach

                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $temp_lineid=0;
                    @endphp

                    @foreach($data as $d)
                      @php
                        $target_day=0;
                        if ($d['smv']>0) {
                          $target_day=round((((60*$d['total_op']) / $d['smv']) * ($d['persentase']/100))* $d['jam_kerja'],2);
                        }

                        $factory=$d['factory'];
                        $line=$d['line'];
                        $endsewing=$d['endsewing'];
                        if ($temp_lineid==$d['prodline_id']) {
                          $factory='';
                          $line='';
                          $endsewing='';
                        }
                      @endphp
                      <tr>
                        <td>{{$factory}}</td>
                        <td>{{$line}}</td>
                        <td>{{$endsewing}}</td>
                        <td>{{$d['buyer']}}</td>
                        <td>{{$d['item']}}</td>
                        <td>{{$d['persentase']}}</td>
                        <td>{{$d['smv']}}</td>
                        <td>{{$d['total_op']}}</td>
                        <td>{{number_format($target_day,0)}}</td>

                        @foreach($bulan as $b)
                          @php 
                            $i=$loop->index+1;
                            $kapasitas_tersedia=$target_day*$d['hkj_'.$i];
                          @endphp
                          @if($kapasitas_tersedia>0) 
                          <td style="background:#00C57A">{{number_format($kapasitas_tersedia,0)}}</td>
                          @else 
                          <td>{{number_format($kapasitas_tersedia,0)}}</td>
                          @endif

                          @if($d['hkj_'.$i]>0) 
                          <td style="background:#00C57A">{{$d['hkj_'.$i]}}</td>
                          @else 
                          <td>{{$d['hkj_'.$i]}}</td>
                          @endif
                        @endforeach
                      </tr>

                      @php
                        if ($temp_lineid!==$d['prodline_id']) {
                          $temp_lineid=$d['prodline_id'];
                        }
                      @endphp
                    
                    @endforeach
                  </tbody>
                  <!-- <tfoot>
                    <tr>
                        <th>Factory</th>
                        <th>Line</th>
                        <th>Tanggal.End.Sewing</th>
                        <th>Buyer</th>
                        <th>Item</th>
                        <th>Persen</th>
                        <th>Smv</th>
                        <th>Jml.Op</th>
                        <th>Target/Day</th>
                    </tr>
                  </tfoot> -->
                  </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>

</section>

@endsection

@push("scripts")
<script src="{{asset('/common/js/dataTables.colReorder.min.js')}}"></script>
<script src="{{asset('/common/js/dataTables.fixedHeader.min.js')}}"></script>

<script>
$(document).ready(function() {
    $('#tabelReject').DataTable({
        searching: false,
        paging: false,
        ordering: false,
        info: false,
        fixedHeader: true,
        dom: 'Bfrtip',
        buttons: [
        'csv',
        {
            extend: 'pdfHtml5',
            text: 'PDF',
            download: 'open'
        }
      ]
    });

    $("#btnNavCsv").on("click", function() {
      $(".buttons-csv").click();
    });
    $("#btnNavPdf").on("click", function() {
      $(".buttons-pdf").click();
    });

});
</script>
@endpush
  

  