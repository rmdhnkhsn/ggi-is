@include('marketing.rekaporder.layouts.header')
@include('marketing.rekaporder.layouts.navbar')
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="justify-sb">
                  <div class="title-18">Rekap Order Table</div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                            <th>ID</th>
                            <th>No PO</th>
                            <th>No OR</th>
                            <th>Buyer</th>
                            <th>Standard</th>
                            <th>InHand / Projection</th>
                            <th>Order Date</th>
                            <th>ExFact Date</th>
                            <th>Detail</th>
                            <th>Action</th>
                        </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>No PO</th>
                            <th>No OR</th>
                            <th>Buyer</th>
                            <th>Standard</th>
                            <th>InHand / Projection</th>
                            <th>Order Date</th>
                            <th>ExFact Date</th>
                            <th>Detail</th>
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
@include('marketing.rekaporder.layouts.footer')
<script type="text/javascript">
  $(function () {
    var table = $('#example1').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        // "dom": '<"search"f><"top">rt<"bottom"ip><"clear">',
        "order": [[ 0, "desc" ]],
        processing: true,
        // serverSide: true,
        ajax: "{{route('rekap.all')}}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'no_po', name: 'no_po'},
            {data: 'no_or', name: 'no_or'},
            {data: 'buyer', name: 'buyer'},
            {data: 'standar', name: 'standar'},
            {data: 'inhand_or_projection', name: 'inhand_or_projection'},
            {data: 'date', name: 'date'},
            {data: 'ex_fact', name: 'ex_fact'},
            {data: 'is_detail_exist', name: 'is_detail_exist'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
  $('body').on('click', '.editProduct', function (event) {

    event.preventDefault();
    var id = $(this).data('id');
    $.get('edit/' + id , function (data) {
        $('#modal-edit').modal('show');
        $('#id').val(data.id);
        $('#name').val(data.buyer);
        $('#date').val(data.date);
        $('#standard').val(data.standar);
        $('#inhand').val(data.inhand_or_projection);
        $('#ex_fact').val(data.ex_fact);
        $('#detail').val(data.no_po);
        console.log(data.no_po)
    })
  });
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
</script>
<script>
$('.select2bs4').select2({
      theme: 'bootstrap4'
    })

// order date 
$('#reservationdate').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: true
    });
$( "#datepicker" ).datepicker({
  showButtonPanel: true
});


// order date buat form edit 
$('#reservationdate2').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: true
    });
$( "#datepicker" ).datepicker({
  showButtonPanel: true
});

// ex_fact date 
$('#reservationdate3').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: true
    });
$( "#datepicker" ).datepicker({
  showButtonPanel: true
});

// ex_fact buat form edit 
$('#reservationdate4').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: true
    });
$( "#datepicker" ).datepicker({
  showButtonPanel: true
});
</script>