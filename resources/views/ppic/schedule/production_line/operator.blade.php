@extends("layouts.app")
@section("title","Production Line Operator")
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
    <div class="row">
      <div class="col-12">
        <div class="cards p-4">
          <div class="row">
            <div class="col-12">
              <div class="title-20-grey">Data Operator Line</div>
            </div>
            <div class="col-12 pb-5">
              <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
              <div class="cards-scroll scrollX" id="scroll-bar">
                <table id="DTtable" class="table tbl-content no-wrap">
                  <thead>
                    <tr class="bg-thead2">
                      <th>Sub</th>
                      <th>Line</th>
                      <th>Nik</th>
                      <th>Nama</th>
                      <th>Grup Line</th>
                    </tr>
                  </thead>
                   <tbody>
                      @foreach($data as $d)
                      <tr>
                        <td>{{$d->prodline->sub}}</td>
                        <td>{{$d->prodline->line}}</td>
                        <td>{{$d->nik}}</td>
                        @if($d->karyawan==null)
                        <td></td>
                        @else
                        <td>{{$d->karyawan->nama}}</td>
                        @endif
                        <td>{{$d->group}}</td>
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
<script>
  $(document).ready(function() {
    $('#DTtable').DataTable({
      info: false,
      dom: 'frtip'
    });
  });
</script>

@endpush
  

  