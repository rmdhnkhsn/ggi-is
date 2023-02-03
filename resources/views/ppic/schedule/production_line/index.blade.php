@extends("layouts.app")
@section("title","Production Line")
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
            <div class="col-12 justify-sb2">
              <div class="title-20-grey">Data Production Line</div>
              <div class="filterSMV">
                @if(Auth::user()->role=='SYS_ADMIN'||Auth::user()->role=='PPIC_PLANNER')
                  <a href="{{route('ppic.schedule.prodline.create')}}" type="button" class="btn-blue-md">Add Line <i class="fs-18 ml-2 fas fa-plus"></i></a>
                @endif
              </div>
            </div>
            <div class="col-12 pb-5">
              <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
              <div class="cards-scroll scrollX" id="scroll-bar">
                <table id="DTtable" class="table tbl-content no-wrap">
                  <thead>
                    <tr class="bg-thead2">
                      <th>Branch</th>
                      <th>Sub</th>
                      <th>Line</th>
                      <th>Total.Operator</th>
                      <th>Cost (USD/Hour)</th>
                      <th>Active</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($master_line as $d)
                    <tr>
                      <td>{{$d->branch->branch_kode}}</td>
                      <td>{{$d->sub}}</td>
                      <td>{{$d->line}}</td>
                      <td><a href="{{route('ppic.schedule.prodline.totaloperator',['id'=>$d->id])}}" style="text-decoration:underline">{{$d->total_operator}}</a></td>
                      <td>{{$d->line_cost}}</td>
                      <td>{{$d->is_active}}</td>
                      <td>
                        @if(Auth::user()->role=='SYS_ADMIN'||Auth::user()->role=='PPIC_PLANNER')
                        <div class="container-tbl-btn">
                          <a href="{{route('ppic.schedule.prodline.edit',['id'=>$d->id])}}" class="btn-icon-yellow" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Edit"><i class="fs-18 fas fa-pencil-alt"></i></a>
                        </div>
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
  $(function () {
    $('[data-toggle="popover"]').popover()
  })
</script>

@endpush
  

  