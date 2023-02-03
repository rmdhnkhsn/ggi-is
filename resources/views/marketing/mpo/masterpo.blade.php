@include('marketing.layouts.header')
@include('marketing.layouts.navbar2')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-1">
            <a href="{{ route('masterpo.create')}}" class="btn btn-block btn-info btn-sm" style="box-shadow: 3px 3px 3px rgba(0,0,0,0.2);"><i class="fas fa-plus"></i> Add PO</a>
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
                <h3 class="card-title">PO Number</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <!-- <th>ab</th>
                        <th>bc</th> -->
                        <tr>
                            <th>PO Number</th>
                            <th>Buyer</th>
                            <th>Order Date</th>
                            <th>MD User</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                        <tr>
                            <th>PO Number</th>
                            <th>Buyer</th>
                            <th>Order Date</th>
                            <th>MD User</th>
                            <th>Image</th>
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
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@include('marketing.layouts.footer')
<script type="text/javascript">
  $(function () {
    var table = $('#example1').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        processing: true,
        serverSide: true,
        ajax: "{{ route('marketing.masterpo') }}",

        columns: [
            {data: 'po_number', name: 'po_number'},
            {data: 'buyer', name: 'buyer'},
            {data: 'order_date', name: 'order_date'},
            {data: 'md_user', name: 'md_user'},
            {data: 'foto', name: 'foto'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });

  $(document).ready(function() {

    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    // fetchstore();

    // function fetchstore()
    // {
    //     $.ajax({
    //         type: "GET",
    //         url: "fetch-store",
    //         datatype: "json",
    //         success: function (response) {
    //             $('tbody').html("");
    //             $.each(response.masterpo, function (key, item) {
    //               $('tbody').append('<tr>\
    //                         <td>'+item.po_number+'</td>\
    //                         <td>'+item.buyer+'</td>\
    //                         <td>'+item.order_date+'</td>\
    //                         <td>'+item.md_user+'</td>\
    //                         <td><img src="marketing/img/'+item.foto+'" width="50px" alt="Foto"></td>\
    //                     </tr>');
    //             });
    //         }

    //     });
    // }

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

</script>
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>