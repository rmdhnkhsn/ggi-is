@extends("layouts.app")
@section("title","Progress Output")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker2.css')}}">
@endpush

@push("sidebar")
    @include('production.operatorperformance.ProgressOutput.partials.navbar')
@endpush

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="row pb-5">
            <div class="col-12">
                <div class="cards bg-card p-4">
                    <div class="row">
                        <div class="col-12 pb-5">
                            <div class="justify-sb mb-3">
                                <div class="title-22">Progress Output</div>
                                <div class="flex" style="gap:.5rem">
                                <!-- <form action="{{route('prod.cm.main')}}" method="post" enctype="multipart/form-data" class="flexx" style="gap:.7rem;width:100%">
                                    @csrf -->
                                    <div class="input-group dates" id="filter_date" style="width:270px">
                                        <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:45px;height:37px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" id="dateRange" class="form-control border-input-10" name="daterange" value="2022-08-01" placeholder="Input Date" style="height:37px;border-radius:0 10px 10px 0" />
                                    </div>
                                    <button class="btn-simple-monitor exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                                    <button class="btn-simple-delete exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button>
                                    <a href="{{ route('operatorperformance.monitoring')}}" class="btn-simple-info" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Production Monitoring"><i class="fs-18 fas fa-chart-area"></i></a>
                                </div>
                            </div>
                            <div class="cards-scroll scrollX" id="scroll-bar">
                                <table id="DTtable_freeze" class="table tbl-content">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Branch</th>
                                            <th>Line</th>
                                            <th>Buyer</th>
                                            <th>AVG</th>
                                            <th>Style</th>
                                            <th>Item</th>
                                            @foreach($tanggal as $key1=>$value1)
                                                <th class="no-wrap">{{$value1['tanggal']}}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no=0;?>
                                        @foreach($record as $key2=>$value2)
                                        <?php
                                        $no++;?>
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$value2['branch']}}</td>
                                            <td>{{$value2['line']}}</td>
                                            <td>{{$value2['buyer']}}</td>
                                            <td>{{$value2['average']}}</td>
                                            <td>{{$value2['style']}}</td>
                                            <td>{{$value2['item']}}</td>
                                            @foreach($tanggal as $key3=>$value3)
                                            <?php
                                           $collect=collect($data);
                                           $check=$collect->where('fasilitas',$value2['branch'])->where('line',$value2['line'])
                                                   ->where('style',$value2['style'])->where('tanggal',$value3['tanggal'])->count();
                                           if($check>0){
                                               $a=collect($get_data)->where('tanggal',$value3['tanggal'])->where('line',$value2['line'])
                                               ->where('fasilitas',$value2['branch'])->where('style',$value2['style'])->first();
                                               if($a['act_line']==""){
                                                   $avg='0';
                                               }
                                               else{
                                                   $sum=collect($get_data)->where('tanggal',$value3['tanggal'])->where('line',$value2['line'])
                                                   ->where('fasilitas',$value2['branch'])
                                                   ->where('style',$value2['style'])
                                                   ->sum('act_line');
                                                   $count=collect($get_data)->where('tanggal',$value3['tanggal'])->where('line',$value2['line'])
                                                   ->where('fasilitas',$value2['branch'])->where('style',$value2['style'])->count();
                                                   $avg=ceil($sum/$count/$a['jam_kerja']);
                                                   $avg1=($sum/$count/$a['jam_kerja']);
   
                                               }
                                           }
                                           else{
                                               $avg='-';
                                           }
                                            ?>
                                                <th style="font-weight:400;text-align:left">{{$avg}}</th>
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>NO</th>
                                            <th>Branch</th>
                                            <th>Line</th>
                                            <th>Buyer</th>
                                            <th>AVG</th>
                                            <th>Style</th>
                                            <th>Item</th>
                                            @foreach($tanggal as $key1=>$value1)
                                                <th>{{$value1['tanggal']}}</th>
                                            @endforeach
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
<script src="{{asset('common/js/dateRangePicker.js')}}"></script>

<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })


    $('.exportExcel').click(function(){
        $(".buttons-excel").click();
    })

    $('.exportPdf').click(function(){
        $(".buttons-pdf").click();
    })

  $(function () {
    $("#DTtable_freeze").DataTable({
      dom: 'Brtp',
      "buttons": [ "excel", "pdf" ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
  
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#DTtable_freeze tfoot th').each( function () {
        var title = $('#DTtable_freeze thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" class="border-input-10" placeholder="search..." />' );
    });
    var table = $('#DTtable_freeze').DataTable();
 
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
      format: 'Y-MM-DD  ',
      showButtonPanel: true
      });
  $( "#datepicker" ).datepicker({
    showButtonPanel: true
  });
</script>
<script>
    
    $(function() {
        $('input[name="daterange"]').daterangepicker();
    $("#filter_date").on("change.datetimepicker", ({date}) => {
        var filter = $("#filter_date").find("input").val();
        let result = filter.replaceAll("/", "-");
        location.replace("{{ url('/prd/operator-performance/progres-output/view?date=')}}"+result) 
    })
  });
</script>
@endpush