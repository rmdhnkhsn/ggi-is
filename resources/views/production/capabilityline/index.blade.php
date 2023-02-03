@extends("layouts.app")
@section("title","Capability Line")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
  .table-responsive {
  display: block;
  width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch; }
  .table-responsive > .table-bordered {
    border: 0; }

  .no-wrap td,
  .no-wrap th {
  white-space: nowrap; }

</style>
@endpush
@push("sidebar")
  @include('ppic.schedule.layouts.navbar')
@endpush

@section("content")
<section class="content">
    <!-- Main content -->
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->   
        <div class="row mt-2">
          <div class="col-12">
            <span class="reject-cutting-tittle">Capability Line</span>
          </div>
        </div>

        <div class="row">
          <div class="col-12">

            <ul class="nav nav-tabs rc-tabs mb-4" role="tablist">
              <!-- <li class="nav-item-show">
                <a class="nav-link py-2 active" data-toggle="tab" href="#proses" role="tab"></i>Reject Cutting
                  <span class="number-badge">adsf</span>
                </a>
                <div class="rc-slide"></div>
              </li> -->
              <!-- <li class="nav-item-show">
                <a class="nav-link py-2" data-toggle="tab" href="#ganti" role="tab"></i>Reject Sudah Diganti
                  <span class="number-badge">qwer</span>
                </a>
                <div class="rc-slide"></div>
              </li> -->
            </ul>
            <a href="{{route('capabilityline.create')}}" type="button" class="btn btn-info">+ Add Data</a>
            <div class="tab-content card-block">
              <div class="tab-pane active" id="proses" role="tabpanel">
                  <div class="row mt-3">
              <div class="col-12">
                <div class="card">
                  <!-- <div class="card-header">
                    <h3 class="card-title">Master Reject Cutting</h3>
                  </div> -->
                  <!-- /.card-header -->
                  <div class="card-body table-responsive">
                        <table id="tabelReject" class="table table-bordered table-striped no-wrap">
                          <thead>
                            <tr>
                                <th>Branch</th>
                                <th>Line</th>
                                <th>Sub</th>
                                <th>SPV</th>
                                <th>Item</th>
                                <th>Buyer</th>
                                <th>Persentase</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($master_line as $d)
                            <tr>
                              <td>{{$d->prodline->branch->branch_kode}}</td>
                              <td>{{$d->prodline->sub.' L'.$d->prodline->line}}</td>
                              <td>{{$d->line_sub}}</td>
                              <td>{{$d->spv}}</td>
                              <td>{{$d->item}}</td>
                              <td>{{$d->buyer}}</td>
                              <td>{{$d->persentase}}</td>
                              <td>
                                @if(Auth::user()->role=='SYS_ADMIN'||Auth::user()->role=='PPIC_PLANNER')
                                  <a href="{{route('capabilityline.edit',['id'=>$d->id])}}">Edit</a>  
                                  <a href="{{route('capabilityline.destroy',['id'=>$d->id])}}">Delete</a>
                                @endif
                              </td>
                            </tr>
                            @endforeach

                          </tbody>
                          <tfoot>
                            <tr>
                                <th>Branch</th>
                                <th>Line</th>
                                <th>Sub</th>
                                <th>SPV</th>
                                <th>Item</th>
                                <th>Buyer</th>
                                <th>Persentase</th>
                                <th>Action</th>
                            </tr>
                          </tfoot>
                          </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                </div>
              </div>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push("scripts")
<script>
  var table = $('#tabelReject').DataTable();
</script>

@endpush
  

  