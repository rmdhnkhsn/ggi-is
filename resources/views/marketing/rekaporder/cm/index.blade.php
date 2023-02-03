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
                <div class="justify-sb2">
                  <div class="title-18">Cost Manufacture Recap</div>
                  <div class="flexx gap-3">
                    <div class="input-group">
                      <div class="input-group date" id="report_date" data-target-input="nearest">
                        <div class="input-group-append datepiker" data-target="#report_date" data-toggle="datetimepicker">
                          <div class="inputGroupBlue"><i class="fas fa-calendar-alt mr-2 fs-18"></i><i class="fas fa-caret-down"></i></div>
                        </div>
                        <div class="flex gap-3">
                          <input type="text" class="form-control datetimepicker-input borderInput" data-target="#report_date" placeholder="Select Month" style="border-radius:0 10px 10px 0"/>
                          <input type="hidden" id="nilai_filter" type="text" value="" />
                        </div>
                      </div>
                    </div>
                    <a href="{{route('cm.all_data')}}" class="btn-blue-md">ALL</a>
                    <button class="btn-green-md exportExcel">Excel<i class="fs-18 ml-2 fas fa-file-excel"></i></button>
                    <button class="btn-red-md exportPdf">PDF<i class="fs-18 ml-2 fas fa-file-pdf"></i></button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <input type="hidden" id="id_cm" value="{{$id}}">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                            <th>No</th>
                            <th>Buyer</th>
                            <th>Contract</th>
                            <th>Atricle</th>
                            <th>Style Code</th>
                            <th>Style Name</th>
                            <th>Product Name</th>
                            <th>NO OR</th>
                            <th>Ex Factory</th>
                            <th>Pack/PC</th>
                            <th>Quantity Pack</th>
                            <th>Qty Total Breakdown</th>
                            <th>Standar</th>
                            <th>Value</th>
                            <th>CM</th>
                        </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Buyer</th>
                            <th>Contract</th>
                            <th>Atricle</th>
                            <th>Style Code</th>
                            <th>Style Name</th>
                            <th>Product Name</th>
                            <th>NO OR</th>
                            <th>Ex Factory</th>
                            <th>Pack/PC</th>
                            <th>Quantity Pack</th>
                            <th>Qty Total Breakdown</th>
                            <th>Standar</th>
                            <th>Value</th>
                            <th>CM</th>
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
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
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
            var url = "{{ route('cm.data_cm',[':id']) }}";
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
  var id = $('#id_cm').val();
  var url = "{{ route('cm.data_cm',[':id']) }}";
  url=url.replace(':id',id);

  $(function () {
    var table = $('#example1').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        dom: 'Br+-ftip',
        "buttons": [ "excel", "pdf",
        {
            extend: 'pdfHtml5',
            orientation: 'landscape',
            text: 'PDF',
            download: 'open'
        } ],
        "order": [[ 0, "desc" ]],
        processing: true,
        // serverSide: true,
        ajax: url,
        columns: [
            {data: 'id', name: 'id'},
            {data: 'buyer', name: 'buyer'},
            {data: 'contract', name: 'contract'},
            {data: 'article', name: 'article'},
            {data: 'style', name: 'style'},
            {data: 'style_name', name: 'style_name'},
            {data: 'product_name', name: 'product_name'},
            {data: 'no_or', name: 'no_or'},
            {data: 'ex_fact', name: 'ex_fact'},
            {data: 'kemasan', name: 'kemasan'},
            {data: 'quantity_pack', name: 'quantity_pack'},
            {data: 'total_breakdown', name: 'total_breakdown'},
            {data: 'standar', name: 'standar'},
            {data: 'nilai', name: 'nilai'},
            {data: 'cm', name: 'cm'},
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

  $('.exportExcel').click(function(){
      $(".buttons-excel").click();
  })
  $('.exportPdf').click(function(){
      $(".buttons-pdf").click();
  })
</script>
<script>
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  });
</script>