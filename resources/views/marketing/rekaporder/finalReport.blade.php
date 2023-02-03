@include('marketing.rekaporder.layouts.header')
@include('marketing.rekaporder.layouts.navbar')
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="justify-sb">
                  <div class="title-18">Final Report</div>
                  <div class="flex gap-3">
                    <div class="input-group">
                      <div class="input-group date" id="report_date" data-target-input="nearest">
                        <div class="input-group-append datepiker" data-target="#report_date" data-toggle="datetimepicker">
                          <div class="inputGroupBlue"><i class="fas fa-calendar-alt mr-2 fs-18"></i><i class="fas fa-caret-down"></i></div>
                        </div>
                        <input type="text" class="form-control datetimepicker-input borderInput" data-target="#report_date" placeholder="Select Month" style="border-radius:0 10px 10px 0"/>
                        <input type="hidden" id="nilai_filter" type="text" value="" />
                      </div>
                    </div>
                    <a href="{{route('rekap.final_all')}}" class="btn-blue-md">ALL</a>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <input type="hidden" id="id_rekap_order" value="{{$id_final}}">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                            <th>ID</th>
                            <th>No PO</th>
                            <th>Buyer</th>
                            <th>Order Date</th>
                            <th>ExFact Date</th>
                            <th>Download</th>
                        </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>No PO</th>
                            <th>Buyer</th>
                            <th>Order Date</th>
                            <th>ExFact Date</th>
                            <th>Download</th>
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
<script>
  jQuery(document).ready(function($) {
    $('#report_date').datetimepicker({
      format: 'Y-MM',
      showButtonPanel: true,
      useCurrent: false,
    })
    
    var filter_count = 0;
    var filter=$('#nilai_filter').val();
    $("#report_date").on("change.datetimepicker", ({date}) => {
      console.log(filter_count);
        if (filter_count == 0) {
            var month = $("#report_date").find("input").val();
            // console.log( month)
            var url = "{{ route('rekap.rekapFinal',[':id']) }}";
            url=url.replace(':id',month);
            window.location.href = url;
          }
          filter_count++
    })
    var month = $("#month").val();
    $('.input-date-fa').val(month + '')
  });
</script>
<script type="text/javascript">
  var id = $('#id_rekap_order').val();
  var url = "{{ route('rekap.rekapFinal',[':id']) }}";
  url=url.replace(':id',id);

  $(function () {
    var table = $('#example1').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "order": [[ 0, "desc" ]],
        processing: true,
        serverSide: true,
        ajax: url,
        columns: [
            {data: 'id', name: 'id'},
            {data: 'no_po', name: 'no_po'},
            {data: 'buyer', name: 'buyer'},
            {data: 'date', name: 'date'},
            {data: 'ex_fact', name: 'ex_fact'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
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