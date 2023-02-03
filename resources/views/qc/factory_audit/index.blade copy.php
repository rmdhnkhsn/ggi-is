@extends("layouts.app")
@section("title","Factory Audit")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style2.css')}}"> 
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush
@push("sidebar")
  @include('qc.factory_audit.layouts.navbar')
@endpush

@section("content")

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <span class="main-title">Factory Audit</span>
            </div>
        </div>
    </div>
</div>
   
  <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped no-wrap">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>WO</th>
                                        <th>Buyer</th>
                                        <th>Style</th>
                                        <th>Order Qty</th>
                                        <th>Status FA</th>
                                        <th>Revision</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value['t_v4801c_doco'] }}</td>
                                            <td>{{ $value['buyer'] }}</td>
                                            <td>{{ $value['style'] }}</td>
                                            <td>{{ $value['order_qty'] }}</td>
                                            <td>{{ $value['status'] }}</td>
                                            <td>{{ $value['revisian'] }}</td>
                                            <td>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>WO</th>
                                        <th>Buyer</th>
                                        <th>Style</th>
                                        <th>Order Qty</th>
                                        <th>Status FA</th>
                                        <th>Revision</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
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
        // Setup - add a text input to each footer cell
        $('#example1 tfoot th').each( function () {
            var title = $('#example1 thead th').eq( $(this).index() ).text();
            $(this).html( '<input type="text" style="height:2em;" placeholder="Search '+title+'" />' );
        } );
    
        // DataTable
        var table = $('#example1').DataTable(
          {
            "pageLength": 5,
            "responsive": false, "lengthChange": true, "autoWidth": false, "scrollX": true,
          }
        );
    
        // Apply the search
        table.columns().every( function () {
            var that = this;
    
            $( 'input', this.footer() ).on( 'keyup change', function () {
                that
                    .search( this.value )
                    .draw();
            } );
        } );
    } );
</script>
@endpush