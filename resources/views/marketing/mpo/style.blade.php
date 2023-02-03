@include('marketing.layouts.header')
@include('marketing.layouts.navbar2')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-1">
            <a href="{{ route('marketing.masterpo')}}" class="btn btn-block btn-secondary btn-sm" style="box-shadow: 3px 3px 3px rgba(0,0,0,0.2);"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
          </div>
          <div class="col-sm-1">
            <a href="{{ route('masterpo.astyle', $data->id)}}" class="btn btn-block btn-info btn-sm" style="box-shadow: 3px 3px 3px rgba(0,0,0,0.2);"><i class="fas fa-plus"></i> Add</a>
          </div>

          <!-- <div class="col-sm-2">
            <div class="btn-group">
              <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-download"></i>  Export</button>
              <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" href="{{ route('mline.excel')}}">Excel</a>
                <a class="dropdown-item" href="{{ route('mline.pdf')}}">PDF</a>
              </div>
            </div>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.2);">
              <div class="card-header">
                <h3 class="card-title">Style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <button class="btn btn-outline-secondary" style="margin: 0px 12px 20px 0px">{{$data->po_number}}</button>
                    <button class="btn btn-outline-secondary" style="margin: 0px 12px 20px 0px">{{$data->buyer}}</button>
                    <button class="btn btn-outline-secondary" style="margin: 0px 12px 20px 0px">{{$data->order_date}}</button>

                            <tr>
                                <th style="text-align: center">Style Number</th>
                                <th style="text-align: center">Article</th>
                                <th style="text-align: center">Product Name</th>
                                <th style="text-align: center">Total QTY Order</th>
                                <th style="text-align: center">OR Number</th>
                                <th style="text-align: center">EX Fact</th>
                                <th style="text-align: center">FOB</th>
                                <!-- <th>Action</th> -->
                            </tr>
                    </thead>
                    <tbody>
                        @foreach($style as $st)
                        <tr>
                            <td style="text-align: center">{{$st->style_number}}</td>
                            <td style="text-align: center">{{$st->article}}</td>
                            <td style="text-align: center">{{$st->product_name}}</td>
                            <td style="text-align: center">{{$st->total_qty}}</td>
                            <td style="text-align: center">{{$st->or_number}}</td>
                            <td style="text-align: center">{{$st->ex_fact}}</td>
                            <td style="text-align: center">{{$st->fob}}</td>


                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@include('layouts.footer')
<!-- <script type="text/javascript">
//   $(function () {
//     var table = $('#example1').DataTable({
//         "responsive": true, "lengthChange": true, "autoWidth": false,
//         processing: true,
//         serverSide: true,
//         ajax: "{{ route('marketing.masterpo') }}",

//         columns: [
//             {data: 'po_number', name: 'po_number'},
//             {data: 'buyer', name: 'buyer'},
//             {data: 'order_date', name: 'order_date'},
//             {data: 'md_user', name: 'md_user'},
//             {data: 'foto', name: 'foto'},
//             {data: 'action', name: 'action', orderable: false, searchable: false},
//         ]
//     });
//   });
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example1 tfoot th').each( function () {
        var title = $('#example1 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    });
 
    // DataTable
    var table = $('#example1').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        });
    });
  });
</script> -->