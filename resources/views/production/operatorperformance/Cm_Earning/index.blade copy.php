@extends("layouts.app")
@section("title","CM Earning")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-subkon2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">


@endpush


@section("content")

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="cards" style="padding: 1.5rem 1.8rem 2.2rem 1.8rem;margin-bottom:0">
            <div class="col-12 mb-2">
                <div class="title-20 text-left">CM Earning</div>
            </div>
            <div class="col-12 flexx" style="gap:.7rem">
                <form action="{{route('prod.cm.main')}}" method="post" enctype="multipart/form-data" class="flexx" style="gap:.7rem;width:100%">
                @csrf
                    <div class="input-group date relative mt-3" id="first" data-target-input="nearest">
                        <div class="title-sm filterAbs">First Date</div>
                        <div class="input-group-append datepiker" data-target="#first" data-toggle="datetimepicker">
                            <div class="fa-custom-calendar" >
                                <i class="fas fa-calendar-alt mr-2"></i> <span class="fs-14">Date</span><i class="ml-2 fas fa-caret-down"></i>
                            </div>
                        </div>
                            <input type="text" name="first"  class="form-control datetimepicker-input input-date-fa" data-target="#first" placeholder="Select Date" />
                    </div>
                    <div class="input-group date relative mt-3" id="last" data-target-input="nearest">
                        <div class="title-sm filterAbs">Finish Date</div>
                        <div class="input-group-append datepiker" data-target="#last" data-toggle="datetimepicker">
                            <div class="fa-custom-calendar" >
                                <i class="fas fa-calendar-alt mr-2"></i> <span class="fs-14">Date</span><i class="ml-2 fas fa-caret-down"></i>
                            </div>
                        </div>
                            <input type="text" name="last" class="form-control datetimepicker-input input-date-fa" data-target="#last" placeholder="Select Date" />
                    </div>
                
                    <div class="input-group date relative mt-3">
                        <div class="title-sm filterAbs">Item</div>
                            <input type="text" name="item" class="form-control input-date-fa" placeholder="Item" />
                    </div>
                    <div class="input-group date relative mt-3">
                        <div class="title-sm filterAbs">Buyer</div>
                            <input type="text" name="buyer" class="form-control input-date-fa" placeholder="buyer" />
                    </div>
                <button type="submit" class="btn-blue mt-3"><i class="fas fa-filter"></i>Get</button> 
                </form>
            </div>
        </div>
      </div>
    </div>
        <div class="row mt-3 pb-5">
            <div class="col-12">
                <div class="cards bg-card p-4">
                    <div class="row">
                        <div class="cards-scroll p-2 scrollX" id="scroll-bar">
                            <button id="btnSearch"><i class="fas fa-search"></i></button>  
                            <table id="DTtable" class="table hrd-tbl-content no-wrap" width="100%">
                                <thead>
                                    <tr class="font-tr">
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
                                        <td>{{$value['branch']}}</td>
                                        <td>{{$value['line']}}</td>
                                        <td>{{$value['style']}}</td>
                                        <td>{{$value['item']}}</td>
                                        <td>{{$value['buyer']}}</td>
                                        <td>{{$value['cm']}}</td>
                                        <td>{{$value['total_output']}}</td>
                                        <td>{{$value['total_cm']}}</td>
                                        <td>{{$value['target_cost']}}</td>
                                        <td>{{$value['persentase']}}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push("scripts")
<script>
 $(document).ready( function () {
    var table = $('#DTtable').DataTable({
      scrollX : '100%',
      "pageLength": 10,
      "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
    
    $('#mySearchButton').on( 'keyup click', function () {
      table.search($('#mySearchText').val()).draw();
    } );
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

@endpush