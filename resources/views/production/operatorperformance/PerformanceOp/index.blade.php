@extends("layouts.app")
@section("title","Perpormence Operator")
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

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="row pb-5">
            <div class="col-12">
                <div class="cards" style="padding: 1.5rem 1.8rem 2.2rem 1.8rem">
                    <form id="download" action="{{route('performance.product.filter')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-10x4-3">
                                <div class="title-sm">Date</div>
                                <div class="input-group dates mt-1" id="filter_date">
                                    <div class="input-group-prepend">
                                        <span class="inputGroupBlue" style="width:45px;height:40px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" id="dateRange" class="form-control border-input-10" name="daterange" value="2022-08-01" placeholder="Input Date" style="height:40px;border-radius:0 10px 10px 0" />
                                </div>
                            </div>
                            <div class="col-10x4-3">
                                <div class="title-sm">Style</div>
                                <input type="text" name="style" class="form-control border-input-10 mt-1" style="border-radius:10px" placeholder="Style" style="width:100%;" />
                            </div>
                            <div class="col-10x4-3">
                                <div class="title-sm">Buyer</div>
                                <input type="text" name="buyer" class="form-control border-input-10 mt-1" style="border-radius:10px" placeholder="Buyer" style="width:100%;" />
                            </div>
                            <div class="col-10x4-1">
                                <div class="title-sm text-white">get</div>
                                <button type="submit" class="btn-blue mt-1 btn-block"><i class="mr-2 fas fa-filter"></i>Filter Data</button> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12">
                <div class="cards bg-card p-4">
                    <div class="row">
                        <div class="col-12 pb-5">
                            <div class="justify-sb mb-3">
                                <div class="title-22">Performance Operator</div>
                                <div class="flex" style="gap:.5rem">
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
                                            <th>Nama</th>
                                            <th>Style</th>
                                            <th>Item</th>
                                            <th>Buyer</th>
                                            <th>Proses</th>
                                            <th>Target</th>
                                            @foreach($tanggal as $key1=>$value1)
                                                <th class="no-wrap">{{$value1['tanggal']}}</th>
                                            @endforeach
                                            <th>AVG</th>
                                            <th>AVG%</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=0;?>
                                    @foreach($record as $key2=>$value2)
                                        <?php
                                            $no++;
                                            $array_acc_target=[];
                                            $array_persentase=[];
                                        ?>
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$value2['branch']}}</td>
                                            <td>{{$value2['nama']}}</td>
                                            <td>{{$value2['style']}}</td>
                                            <td>{{$value2['item']}}</td>
                                            <td>{{$value2['buyer']}}</td>
                                            <td>{{$value2['proses']}}</td>
                                            <td>{{$value2['target']}}</td>
                                        
                                            @foreach($tanggal as $key3=>$value3)
                                        <?php
                                            $aktual=collect($data)->where('tanggal',$value3['tanggal'])->where('fasilitas',$value2['branch'])->where('nama',$value2['nama'])->where('style',$value2['style'])->first();
                                            if($aktual!=null){
                                                $acc_target=$aktual['act_target'];
                                                $persentase=round($acc_target/$value2['target']*100,2).'%';
                                                $array_acc_target1=$aktual['act_target'];
                                                $array_persentase1=round($acc_target/$value2['target']*100,2);
                                                $array_acc_target[]=$array_acc_target1;
                                                $array_persentase[]=$array_persentase1;
                                            }
                                            else{
                                                $acc_target='-';
                                                $persentase='-';
                                            }
                                           
                                        ?>
                                            <th style="font-weight:400;text-align:left">{{$acc_target}} / {{$persentase}}</th>
                                            @endforeach
                                        <?php

                                            $avg_acc_target=round(array_sum($array_acc_target));
                                            $avg_persentase=count($array_acc_target);

                                            // $avg_acc_target=round(array_sum($array_acc_target)/count($array_acc_target));
                                            // $avg_persentase=round(array_sum($array_persentase)/count($array_persentase),2);

                                        ?>
                                            <td>{{$avg_acc_target}}</td>
                                            <td>{{$avg_persentase}}%</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>NO</th>
                                            <th>Branch</th>
                                            <th>Nama</th>
                                            <th>Style</th>
                                            <th>Item</th>
                                            <th>Buyer</th>
                                            <th>Proses</th>
                                            <th>Target</th>
                                            @foreach($tanggal as $key1=>$value1)
                                                <th class="no-wrap">{{$value1['tanggal']}}</th>
                                            @endforeach
                                            <th>AVG</th>
                                            <th>AVG%</th>
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