@extends("layouts.app")
@section("title","Factory Audit")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-factory.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style2.css')}}"> 
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

<style>
  .badge-default{
  float: left;
  width: 210px;
  height:110px;
  display: block;
}
.hr{
    border: 3px;
    color: black;
}
</style>
@endpush
@push("sidebar")
  @include('qc.factory_audit.layouts.navbar')
@endpush

@section("content")
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <span class="main-title">FA Report Detail</span>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-sm">
                            <tbody>
                                <tr>
                                    <th>Po Number</th>
                                </tr>
                                <tr>
                                    <td>{{ $data->t_v4801c_doco }}</td>
                                </tr>
                                <tr>
                                    <th>Style</th>
                                </tr>
                                <tr>
                                    <td>{{ $data->style }}</td>
                                </tr>
                                <tr>
                                    <th>Buyer Name</th>
                                </tr>
                                <tr>
                                    <td>{{ $data->buyer }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-sm">
                            <tbody>
                                <tr>
                                    <th>Article</th>
                                </tr>
                                <tr>
                                    <td>{{ $data->article }}</td>
                                </tr>
                                <tr>
                                    <th>Color</th>
                                </tr>
                                <tr>
                                    <td>{{ $data->color }}</td>
                                </tr>
                                <tr>
                                    <th>Auditor</th>
                                </tr>
                                <tr>
                                    <td>{{ $data->auditor_name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-sm">
                            <tbody>
                                <tr>
                                    <th>ShipMent TOD</th>
                                </tr>
                                <tr>
                                    <td>{{ $data->tanggal }}</td>
                                </tr>
                                <tr>
                                    <th>Destination</th>
                                </tr>
                                <tr>
                                    <td>{{ $data->factory }}</td>
                                </tr>
                                <tr>
                                    <th>Order Qty</th>
                                </tr>
                                <tr>
                                    <td>{{ $data->order_qty }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
       
           <div class="col-3">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-sm">
                            <tbody>
                                <tr>
                                    <th>Total Carton</th>
                                </tr>
                                <tr>
                                    <td>{{ $data->total_carton }}</td>
                                </tr>
                                <tr>
                                    <th>Sample Carton</th>
                                </tr>
                                <tr>
                                    <td>{{ $data->sample_carton }}</td>
                                </tr>
                                <tr>
                                    <th>Sample Pcs</th>
                                </tr>
                                <tr>
                                    <td>{{ $data->sample_pcs }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body p-0">
                        <span class="badge fa-status-badge">1</span>
                        <div class="header-detail">
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <th>FA Date</th>
                                        <th>Total Reject</th>
                                        <th>Audit Result</th>
                                        <th style="color:blue;">FA DATA</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>{{ $data->status }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr color="black">
                        </div>
                        <table class="table table-sm">
                            <tbody>
                                <tr>
                                    <th>No</th>
                                    <th>Remark</th>
                                    <th>Qty Reject</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Tidak Ada Barcodan (M)</td>
                                    <td>3</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-body p-0">
                        <span class="badge fa-revision-badge mb-1">2</span>
                        <div class="header-detail">
                             <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <th>FA Date</th>
                                        <th>Total Reject</th>
                                        <th>Audit Result</th>
                                        <th style="color:red;">REVISION</th>

                                    </tr>
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->total_reject }}</td>
                                        <td>{{ $data->revisian }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr class="mb-1" color="black">
                        </div>
                        <table class="table table-sm">
                            <tbody>
                                <tr>
                                    <th>No</th>
                                    <th>Remark</th>
                                    <th>Qty Reject</th>
                                </tr>
                            @foreach ($menus as $key)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $key['remark'] }}</td>
                                    <td>{{ $key['qty_reject'] }}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
             
            <!--end colspan -->
        </div>
    <!-- /.row -->
    </div>
  <!-- /.container-fluid -->
</section>


@endsection

@push("scripts")

@endpush