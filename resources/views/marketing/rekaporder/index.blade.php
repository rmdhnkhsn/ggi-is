@include('marketing.rekaporder.layouts.header')
@include('marketing.rekaporder.layouts.navbar')
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-lg-2 col-4">
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block mt-2 col-lg-12" style="box-shadow: 2px 2px 5px rgba(0,0,0,0.3);">
                <button type="button" class="close" data-dismiss="alert">×</button>   
                <center> 
                <strong>{{ $message }}</strong>
                </center>
            </div>
            @endif
            <button class="btn-blue-md" data-toggle="modal" data-target="#modal-xl"> Create New<i class="fs-18 ml-2 fas fa-plus"></i></button>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

      <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create New</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('rekap.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('marketing.rekaporder.partials.form-control', ['submit' => 'Create'])
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-edit">
          <div class="modal-dialog modal-xl">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Edit</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body" id="smallBody">
                      <form action="{{ route('rekap.update')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          @include('marketing.rekaporder.partials.form-edit', ['submit' => 'Save'])
                      </form>
                  </div>
              </div>
          </div>
      </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="justify-sb">
                  <div class="title-18">Rekap Order Table</div>
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
                    <a href="{{route('rekap.all')}}" class="btn-blue-md">ALL</a>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <input type="hidden" id="id_rekap_order" value="{{$id_rekap}}">
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
            var url = "{{ route('rekap.rekap_data',[':id']) }}";
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
  var url = "{{ route('rekap.rekap_data',[':id']) }}";
  url=url.replace(':id',id);

  $(function () {
    var table = $('#example1').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        // "dom": '<"search"f><"top">rt<"bottom"ip><"clear">',
        "order": [[ 0, "desc" ]],
        processing: true,
        ajax: url,
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