@extends("layouts.app")
@section("title","CM Earning")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRights.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker2.css')}}">
@endpush

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="row pb-5">
            <div class="col-12">
                <div class="cards" style="padding: 1.5rem 1.8rem 2.2rem 1.8rem">
                    <div class="col-12 mb-2">
                        <div class="title-20 text-left">Filter Data</div>
                    </div>
                    <div class="col-12 flexx">
                        <form action="{{route('prod.cm.main')}}" method="post" enctype="multipart/form-data" class="flexx" style="gap:.7rem;width:100%">
                        @csrf
                            <div class="input-group relative mt-3">
                                <div class="title-sm filterAbs">First Date</div>
                                <div class="input-group-append mt-1">
                                    <span class="inputGroupBlue" style="width:45px;height:40px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" name="first"  class="form-control border-input-10 mt-1" placeholder="Select Date" required />
                            </div>
                            <div class="input-group relative mt-3">
                                <div class="title-sm filterAbs">Finish Date</div>
                                <div class="input-group-append mt-1">
                                    <span class="inputGroupBlue" style="width:45px;height:40px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" name="last"  class="form-control border-input-10 mt-1" placeholder="Select Date" required />
                            </div>
                        
                            <div class="input-group relative mt-3">
                                <div class="title-sm filterAbs">Item</div>
                                <input type="text" name="item" class="form-control border-input-10 mt-1" style="border-radius:10px" placeholder="Item" />
                            </div>
                            <div class="input-group relative mt-3">
                                <div class="title-sm filterAbs">Buyer</div>
                                <input type="text" name="buyer" class="form-control border-input-10 mt-1" style="border-radius:10px" placeholder="buyer" />
                            </div>
                            <button type="submit" class="btn-blue" style="margin-top:1.28rem"><i class="mr-1 fas fa-filter"></i>Get</button> 
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="cards p-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-22 text-left no-wrap">CM Earning</div>
                            <!-- <div class="containerFormAll" style="max-width:200px">
                                <input type="text" id="SearchText" class="searchTextAll" placeholder="Search..." required>
                                <button type="button" id="SearchBtn" class="iconSearchAll"><i class="fas fa-search"></i></button>
                            </div> -->
                        </div>
                        <div class="col-12 pb-5">
                            <div class="cards-scroll scrollX" id="scroll-bar">
                                <table id="DTtable" class="table tbl-content no-wrap">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Tanggal</th>
                                            <th>Branch</th>
                                            <th>Line</th>
                                            <th>Style</th>
                                            <th>Item</th>
                                            <th>Buyer</th>
                                            <th>CM</th>
                                            <th>Total Output Qty</th>
                                            <th>Total CM</th>
                                            <th>Target Cost</th>
                                            <th>Persentase</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=0;?>
                                        @foreach($record as $key=>$value)
                                        <?php
                                        $no++;?>
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$value['tanggal']}}</td>
                                            <td>{{$value['fasilitas']}}</td>
                                            <td>{{$value['line']}}</td>
                                            <td>{{$value['style']}}</td>
                                            <td>{{$value['item']}}</td>
                                            <td>{{$value['buyer']}}</td>
                                            <td>{{number_format($value['cm'], 2, "," , ".")}}</td>
                                            <td>{{$value['act_line']}}</td>
                                            <td>{{$value['total_cm']}}</td>
                                            <td>{{$value['target_cost']}}</td>
                                            <td>{{$value['persentase']}}</td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>NO</th>
                                            <th>Tanggal</th>
                                            <th>Branch</th>
                                            <th>Line</th>
                                            <th>Style</th>
                                            <th>Item</th>
                                            <th>Buyer</th>
                                            <th>CM</th>
                                            <th>Total Output Qty</th>
                                            <th>Total CM</th>
                                            <th>Target Cost</th>
                                            <th>Persentase</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>

<script>
  $(function () {
    $("#DTtable").DataTable({
      dom: 'Brtp',
      "buttons": [ "excel", "pdf" ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
  
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#DTtable tfoot th').each( function () {
        var title = $('#DTtable thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" class="border-input-10" placeholder="search..." />' );
    });
    var table = $('#DTtable').DataTable();
 
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

    $('#first').datetimepicker({
      format: 'Y-MM-DD',
      showButtonPanel: true
    });
    $('#last').datetimepicker({
      format: 'Y-MM-DD',
      showButtonPanel: true
    });
    $( "#datepicker" ).datepicker({
        showButtonPanel: true
    });
</script>

@endpush