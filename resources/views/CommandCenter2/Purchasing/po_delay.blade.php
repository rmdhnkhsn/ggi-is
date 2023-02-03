@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
  <!-- <link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}"> -->
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  <link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/styleCC1.css')}}">
@endpush

@section("content")
<!-- <section class="content-header">
      <div class="container-fluid">
      </div>
</section> -->

<section class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card border-alus" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.2);">
            <div class="card-header">
              <h3 class="card-title">Filter</h3>
            </div>

            <div class="card-body">
              <form class="form-inline" action="{{route('cpurchasing.po_delayed_detail')}}" method="get" name="frmFilter" id="frmFilter" enctype="multipart/form-data">
                  <div class="form-group row ml-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Originator</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control ml-3" name="originator" id="originator" value="{{is_null(Request::get('originator')) ?'':Request::get('originator')}}" placeholder="Originator">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Find</button>
              </form>
            </div>

          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card border-alus" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.2);">
            <div class="card-header">
              <h3 class="card-title">Po Due Date</h3>
            </div>
            <div class="card-body">
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped no-wrap">
                    <thead>
                          <tr>
                              <th>Order Date</th>
                              <th>Date Promised</th>
                              <th>Date Today</th>
                              <th>Due Date</th>
                              <th>PO</th>
                              <th>Originator</th>
                              <th>Type</th>
                              <th>Line</th>
                              <th>Short Itm</th>
                              <th>Description</th>
                              <th>Qty Order</th>
                              <th>Qty Open</th>
                              <th>Last Status</th>
                              <th>Next Status</th>
                          </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $i=>$d)
                      <tr>
                          <td>{{$d->date_transaction}}</td>
                          <td>{{$d->date_promise}}</td>
                          <td>{{$d->date_today}}</td>
                          <td>
                            @if($d->due_receipt_days>=0)
                              <span class="badge badge-warning">Due {{$d->due_receipt_days}}</span>
                            @else 
                              <span class="badge badge-danger">Delay {{$d->due_receipt_days}}</span>
                            @endif
                          </td>
                          <td>{{$d->f4311_doco.'/'.$d->f4311_dcto.'/'.$d->f4311_kcoo}}</td>
                          <td>{{$d->f4311_torg}}</td>
                          <td>{{$d->tipe}}</td>
                          <td>{{$d->f4311_lnid}}</td>
                          <td>{{$d->f4311_itm}}</td>
                          <td>{{$d->f4311_dsc1}}</td>
                          <td>{{$d->f4311_uorg}}</td>
                          <td>{{$d->f4311_uopn}}</td>
                          <td>{{$d->f4311_lttr}}</td>
                          <td>{{$d->f4311_nxtr}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                    <!-- <tfoot>
                          <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                    </tfoot> -->
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
<script type="text/javascript">
  $(function () {
    var dtable=$("#example1").DataTable({
        dom: 'Bfrtip',
        buttons: [
        'csv',
        {
            extend: 'pdfHtml5',
            text: 'PDF',
            download: 'open',
				    orientation: 'landscape',
        }
      ]
    });

    // $('#originator').on( 'keyup', function () {
    //   dtable.search( this.value ).draw();
    // } );

    // var table = $('#example1').DataTable({
    //     "responsive": false, "lengthChange": true, "autoWidth": false, "scrollX": true,
    //     scrollCollapse: true,
    //     processing: true,
    //     serverSide: true,
    //     ajax: "{{ route('cpurchasing.po_delayed_detail') }}",
    //     columns: [
    //         {data: 'po_number', name: 'po_number'},
    //         {data: 'f4311_torg', name: 'f4311_torg'},
    //         {data: 'tipe', name: 'tipe'},
    //         {data: 'f4311_lnid', name: 'f4311_lnid'},
    //         {data: 'f4311_itm', name: 'f4311_itm'},
    //         {data: 'f4311_dsc1', name: 'f4311_dsc1'},
    //         {data: 'f4311_uorg', name: 'f4311_uorg'},

    //         {data: 'f4311_uopn', name: 'f4311_uopn'},
    //         {data: 'f4311_lttr', name: 'f4311_lttr'},
    //         {data: 'f4311_nxtr', name: 'f4311_nxtr'},
    //         {data: 'date_promise', name: 'date_promise'},
    //         {data: 'date_today', name: 'date_today'},
    //         {data: 'days', name: 'days'}
    //     ]
    // });
  });

  // $(document).ready(function() {

  //   // Setup - add a text input to each footer cell
  //   $('#example1 tfoot th').each( function () {
  //       var title = $('#example1 thead th').eq( $(this).index() ).text();
  //       $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
  //   });
 
  //   // DataTable
  //   var table = $('#example1').DataTable();
 
  //   // Apply the search
  //   table.columns().every( function () {
  //       var that = this;
 
  //       $( 'input', this.footer() ).on( 'keyup change', function () {
  //           that
  //               .search( this.value )
  //               .draw();
  //       });
  //   });
  // });

</script>
<script>
  // $(function () {
  //   $(document).on('click', '[data-toggle="lightbox"]', function(event) {
  //     event.preventDefault();
  //     $(this).ekkoLightbox({
  //       alwaysShowClose: true
  //     });
  //   });

  //   // $('.filter-container').filterizr({gutterPixels: 3});
  //   $('.btn[data-filter]').on('click', function() {
  //     $('.btn[data-filter]').removeClass('active');
  //     $(this).addClass('active');
  //   });
  // })
</script>
@endpush