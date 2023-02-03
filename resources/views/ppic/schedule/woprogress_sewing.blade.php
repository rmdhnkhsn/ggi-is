@extends("layouts.app")
@section("title","Progress Sewing")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/fixedColumns.dataTables.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">

@endpush
@push("sidebar")
  @include('ppic.schedule.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <form id="form_wo" action="{{route('ppic.schedule.wo_progress_sewing')}}" method="get">      
      <div class="row">
        <div class="col-12">
          <div class="cards p-3">
            <div class="justify-sb2">
              <div class="title-20-grey">Filter Data Upload Sewing</div>
              <a href="#" class="btnSoftBlue" data-toggle="modal" data-target="#filter">Filter<i class="fas fa-filter"></i></a>
              @include('ppic.schedule.partials.filterDataProgress')
            </div>
          </div>
        </div>
      </div>
    </form>

    <div class="row">
      <div class="col-12">
        <div class="cards p-4">
          <div class="row">
            <div class="col-12 justify-sb2">
              <div class="title-20-grey">Data Upload Sewing / Progress</div>
              <div class="filterSMV flex" style="gap:.5rem">
                <button class="btn-icon-blue exportCsv" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export CSV"><i class="fs-18 fas fa-file-csv"></i></button>
                <button class="btn-icon-red exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button>
              </div>
            </div>
            <div class="col-12 pb-5">
              <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
              <div class="cards-scroll scrollX" id="scroll-bar">
                <table id="DTtable" class="table tbl-content no-wrap">
                  <thead>
                    <tr class="bg-thead2">
                      <th>Branch</th>
                      <th>Line</th>
                      <th>WO.No</th>
                      <th>Date</th>
                      <th>H1</th>
                      <th>H2</th>
                      <th>H3</th>
                      <th>H4</th>
                      <th>H5</th>
                      <th>H6</th>
                      <th>H7</th>
                      <th>H8</th>
                      <th>H9</th>
                      <th>H10</th>
                      <th>H11</th>
                      <th>H12</th>
                      <th>H13</th>
                      <th>H14</th>
                      <th>Total</th>
                      <th>Jam.Kerja</th>
                      <th>Spv</th>
                      <th>Buyer</th>
                      <th>Style</th>
                      <th>CM</th>
                      <th>Smv</th>
                      <th>Target85</th>
                      <th>Target100</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $total_h1=0;
                      $total_h2=0;
                      $total_h3=0;
                      $total_h4=0;
                      $total_h5=0;
                      $total_h6=0;
                      $total_h7=0;
                      $total_h8=0;
                      $total_h9=0;
                      $total_h10=0;
                      $total_h11=0;
                      $total_h12=0;
                      $total_h13=0;
                      $total_h14=0;
                      $total_output=0;
                    @endphp

                    @foreach($wo as $d)
                    @php
                      $total_h1+=$d->jam_1;
                      $total_h2+=$d->jam_2;
                      $total_h3+=$d->jam_3;
                      $total_h4+=$d->jam_4;
                      $total_h5+=$d->jam_5;
                      $total_h6+=$d->jam_6;
                      $total_h7+=$d->jam_7;
                      $total_h8+=$d->jam_8;
                      $total_h9+=$d->over_time_9;
                      $total_h10+=$d->over_time_10;
                      $total_h11+=$d->over_time_11;
                      $total_h12+=$d->over_time_12;
                      $total_h13+=$d->over_time_13;
                      $total_h14+=$d->over_time_14;
                      $total_output+=$d->total_outpot;
                    @endphp

                    <tr>
                      <td>{{$d->kode_branch}}</td>
                      <td>{{$d->line}} </td>
                      <td>{{$d->wo}}</td>
                      <td>{{$d->tanggal}} </td>
                      <td>{{$d->jam_1}} </td>
                      <td>{{$d->jam_2}} </td>
                      <td>{{$d->jam_3}} </td>
                      <td>{{$d->jam_4}} </td>
                      <td>{{$d->jam_5}} </td>
                      <td>{{$d->jam_6}} </td>
                      <td>{{$d->jam_7}} </td>
                      <td>{{$d->jam_8}} </td>
                      <td>{{$d->over_time_9}} </td>
                      <td>{{$d->over_time_10}} </td>
                      <td>{{$d->over_time_11}} </td>
                      <td>{{$d->over_time_12}} </td>
                      <td>{{$d->over_time_13}} </td>
                      <td>{{$d->over_time_14}} </td>
                      <td>{{$d->total_outpot}} </td>
                      <td>{{$d->jam_kerja}} </td>
                      <td>{{$d->spv}} </td>
                      <td>{{$d->buyer}} </td>
                      <td>{{$d->style}} </td>
                      <td>{{$d->cm_pcs}} </td>
                      <td>{{$d->smv}} </td>
                      <td>{{$d->target_85}} </td>
                      <td>{{$d->target_100}} </td>
                    </tr>
                    @endforeach

                    <tr>
                      <td><b>TOTAL</b></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><b>{{$total_h1}}</b> </td>
                      <td><b>{{$total_h2}}</b> </td>
                      <td><b>{{$total_h3}}</b> </td>
                      <td><b>{{$total_h4}}</b> </td>
                      <td><b>{{$total_h5}}</b> </td>
                      <td><b>{{$total_h6}}</b> </td>
                      <td><b>{{$total_h7}}</b> </td>
                      <td><b>{{$total_h8}}</b> </td>
                      <td><b>{{$total_h9}}</b> </td>
                      <td><b>{{$total_h10}}</b> </td>
                      <td><b>{{$total_h11}}</b> </td>
                      <td><b>{{$total_h12}}</b> </td>
                      <td><b>{{$total_h13}}</b> </td>
                      <td><b>{{$total_h14}}</b> </td>
                      <td><b>{{$total_output}}</b> </td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

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
<script>
  $(function () {
      $('[data-toggle="popover"]').popover()
  })

  $('.exportCsv').click(function(){
      $(".buttons-csv").click();
  })

  $('.exportPdf').click(function(){
      $(".buttons-pdf").click();
  })

  $(document).ready(function() {
    $('#DTtable').DataTable({
      info: false,
      dom: 'Bfrtip',
      buttons: [
        'csv',
        {
          extend: 'pdfHtml5',
          orientation: 'landscape',
          text: 'PDF',
          download: 'open'
        }
      ]
    });
  });
</script>

@endpush
  

  