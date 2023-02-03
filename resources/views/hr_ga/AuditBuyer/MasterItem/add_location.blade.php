@extends("layouts.app")

@section("title","Dashboard")

@push("styles")
    <link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}"> 
    <link rel="stylesheet" href="{{asset('/common/css/style2.css')}}"> 
    <link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/styleCC2.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush
@push("sidebar")
    @include('hr_ga.AuditBuyer.layouts.navbar')
@endpush
@section("content")
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- <div class="card-header">
                                <h3 class="card-title">Sub Kategori</h3>
                            </div> -->
                            <div class="card-body">
                            <form action="{{ route('hr_ga.item.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        @include('hr_ga.AuditBuyer.MasterItem.partials.form-add-location',['submit' => 'Submit'])
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
@endsection

@push("scripts")
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "oSearch": {"sSearch": $('[name="options1"]').val() },
      dom: 'Bfrtip',
      buttons: [
        {
            extend: 'excelHtml5',
            title: 'Daftar Lokasi {{$item->item}}'
        },
        {
            extend: 'pdfHtml5',
            title: 'Daftar Lokasi {{$item->item}}'
        }
        ]

      // "buttons": ["copy", "csv", "excel", "pdf", "print", ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      
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
@endpush