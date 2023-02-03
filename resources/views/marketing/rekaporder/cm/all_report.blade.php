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
                    <button class="btn-green-md exportExcel">Excel<i class="fs-18 ml-2 fas fa-file-excel"></i></button>
                    <button class="btn-red-md exportPdf">PDF<i class="fs-18 ml-2 fas fa-file-pdf"></i></button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
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
<script type="text/javascript">
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
        ajax: "{{route('cm.all_data')}}",
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