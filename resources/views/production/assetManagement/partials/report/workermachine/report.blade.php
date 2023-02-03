@extends("layouts.app")
@section("title","Report WMI")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2GreyFull.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/fixedColumns.dataTables.css')}}">
@endpush


@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="row pb-5">
            <div class="col-12">
                <div class="cards bg-card p-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-28-grey title-hide">Report Worker Machine Ratio</div>
                            <div class="joblist-date mt-3">
                                <!-- <div class="title-20-grey">Data</div> -->
                                <div class="buttonExport mbReq">
                                    <div class="flex gap-2">
                                        <button class="btn-simple-monitor exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                                        <button class="btn-simple-delete exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 pb-5">
                            <div class="cards-scroll scrollX" id="scroll-bar">
                                <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
                                <table id="DTtable" class="table tbl-content no-wrap">
                                    <thead>
                                        <tr class="bg-thead">
                                            <th class="bg-thead">No</th>
                                            <th>Tanggal</th>
                                            <th>CLN</th>
                                            <th>MJ1</th>
                                            <th>MJ2</th>
                                            <th>KLB</th>
                                            <th>CHW</th>
                                            <th>CNJ2</th>
                                            <th>CVA</th>
                                            <th>CBA</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $d)
                                        @php
                                            $totalfactory=0;
                                            if (is_numeric($d['cln'])) {
                                                $totalfactory+=$d['cln'];
                                            }
                                            if (is_numeric($d['mj1'])) {
                                                $totalfactory+=$d['mj1'];
                                            }
                                            if (is_numeric($d['mj2'])) {
                                                $totalfactory+=$d['mj2'];
                                            }
                                            if (is_numeric($d['klb'])) {
                                                $totalfactory+=$d['klb'];
                                            }
                                            if (is_numeric($d['chw'])) {
                                                $totalfactory+=$d['chw'];
                                            }
                                            if (is_numeric($d['cnj2'])) {
                                                $totalfactory+=$d['cnj2'];
                                            }
                                            if (is_numeric($d['cva'])) {
                                                $totalfactory+=$d['cva'];
                                            }
                                            if (is_numeric($d['cba'])) {
                                                $totalfactory+=$d['cba'];
                                            }
                                        @endphp
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$d['tanggal']}}</td>
                                            <td>
                                            @if($d['cln']=='KRY BELUM UPLOAD'||$d['cln']=='ASSET TIDAK ADA')
                                            {{$d['cln']}}
                                            @elseif($d['cln']<=1.57)
                                            <a class="text-green" href="{{route('asset.master.report_wmr_detail',['branch'=>'CLN','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cln']}}</a>
                                            @elseif($d['cln']>=1.58&&$d['cln']<=1.60)
                                            <a class="text-yellow" href="{{route('asset.master.report_wmr_detail',['branch'=>'CLN','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cln']}}</a>
                                            @elseif($d['cln']>=1.61)
                                            <a class="text-red" href="{{route('asset.master.report_wmr_detail',['branch'=>'CLN','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cln']}}</a>
                                            @endif
                                            </td>

                                            <td>
                                            @if($d['mj1']=='KRY BELUM UPLOAD'||$d['mj1']=='ASSET TIDAK ADA')
                                            {{$d['mj1']}}
                                            @elseif($d['mj1']<=1.57)
                                            <a class="text-green" href="{{route('asset.master.report_wmr_detail',['branch'=>'GM-1','dt'=>$d['tanggal']])}}" target="_blank">{{$d['mj1']}}</a>
                                            @elseif($d['mj1']>=1.58&&$d['mj1']<=1.60)
                                            <a class="text-yellow" href="{{route('asset.master.report_wmr_detail',['branch'=>'GM-1','dt'=>$d['tanggal']])}}" target="_blank">{{$d['mj1']}}</a>
                                            @elseif($d['mj1']>=1.61)
                                            <a class="text-red" href="{{route('asset.master.report_wmr_detail',['branch'=>'GM-1','dt'=>$d['tanggal']])}}" target="_blank">{{$d['mj1']}}</a>
                                            @endif
                                            </td>

                                            <td>
                                            @if($d['mj2']=='KRY BELUM UPLOAD'||$d['mj2']=='ASSET TIDAK ADA')
                                            {{$d['mj2']}}
                                            @elseif($d['mj2']<=1.57)
                                            <a class="text-green" href="{{route('asset.master.report_wmr_detail',['branch'=>'GM-2','dt'=>$d['tanggal']])}}" target="_blank">{{$d['mj2']}}</a>
                                            @elseif($d['mj2']>=1.58&&$d['mj2']<=1.60)
                                            <a class="text-yellow" href="{{route('asset.master.report_wmr_detail',['branch'=>'GM-2','dt'=>$d['tanggal']])}}" target="_blank">{{$d['mj2']}}</a>
                                            @elseif($d['mj2']>=1.61)
                                            <a class="text-red" href="{{route('asset.master.report_wmr_detail',['branch'=>'GM-2','dt'=>$d['tanggal']])}}" target="_blank">{{$d['mj2']}}</a>
                                            @endif
                                            </td>

                                            <td>
                                            @if($d['klb']=='KRY BELUM UPLOAD'||$d['klb']=='ASSET TIDAK ADA')
                                            {{$d['klb']}}
                                            @elseif($d['klb']<=1.57)
                                            <a class="text-green" href="{{route('asset.master.report_wmr_detail',['branch'=>'KLB','dt'=>$d['tanggal']])}}" target="_blank">{{$d['klb']}}</a>
                                            @elseif($d['klb']>=1.58&&$d['klb']<=1.60)
                                            <a class="text-yellow" href="{{route('asset.master.report_wmr_detail',['branch'=>'KLB','dt'=>$d['tanggal']])}}" target="_blank">{{$d['klb']}}</a>
                                            @elseif($d['klb']>=1.61)
                                            <a class="text-red" href="{{route('asset.master.report_wmr_detail',['branch'=>'KLB','dt'=>$d['tanggal']])}}" target="_blank">{{$d['klb']}}</a>
                                            @endif
                                            </td>

                                            <td>
                                            @if($d['chw']=='KRY BELUM UPLOAD'||$d['chw']=='ASSET TIDAK ADA')
                                            {{$d['chw']}}
                                            @elseif($d['chw']<=1.57)
                                            <a class="text-green" href="{{route('asset.master.report_wmr_detail',['branch'=>'CHAWAN','dt'=>$d['tanggal']])}}" target="_blank">{{$d['chw']}}</a>
                                            @elseif($d['chw']>=1.58&&$d['chw']<=1.60)
                                            <a class="text-yellow" href="{{route('asset.master.report_wmr_detail',['branch'=>'CHAWAN','dt'=>$d['tanggal']])}}" target="_blank">{{$d['chw']}}</a>
                                            @elseif($d['chw']>=1.61)
                                            <a class="text-red" href="{{route('asset.master.report_wmr_detail',['branch'=>'CHAWAN','dt'=>$d['tanggal']])}}" target="_blank">{{$d['chw']}}</a>
                                            @endif
                                            </td>

                                            <td>
                                            @if($d['cnj2']=='KRY BELUM UPLOAD'||$d['cnj2']=='ASSET TIDAK ADA')
                                            {{$d['cnj2']}}
                                            @elseif($d['cnj2']<=1.57)
                                            <a class="text-green" href="{{route('asset.master.report_wmr_detail',['branch'=>'CNJ-2','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cnj2']}}</a>
                                            @elseif($d['cnj2']>=1.58&&$d['cnj2']<=1.60)
                                            <a class="text-yellow" href="{{route('asset.master.report_wmr_detail',['branch'=>'CNJ-2','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cnj2']}}</a>
                                            @elseif($d['cnj2']>=1.61)
                                            <a class="text-red" href="{{route('asset.master.report_wmr_detail',['branch'=>'CNJ-2','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cnj2']}}</a>
                                            @endif
                                            </td>

                                            <td>
                                            @if($d['cva']=='KRY BELUM UPLOAD'||$d['cva']=='ASSET TIDAK ADA')
                                            {{$d['cva']}}
                                            @elseif($d['cva']<=1.57)
                                            <a class="text-green" href="{{route('asset.master.report_wmr_detail',['branch'=>'CNJ-3','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cva']}}</a>
                                            @elseif($d['cva']>=1.58&&$d['cva']<=1.60)
                                            <a class="text-yellow" href="{{route('asset.master.report_wmr_detail',['branch'=>'CNJ-3','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cva']}}</a>
                                            @elseif($d['cva']>=1.61)
                                            <a class="text-red" href="{{route('asset.master.report_wmr_detail',['branch'=>'CNJ-3','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cva']}}</a>
                                            @endif
                                            </td>

                                            <td>
                                            @if($d['cba']=='KRY BELUM UPLOAD'||$d['cba']=='ASSET TIDAK ADA')
                                            {{$d['cba']}}
                                            @elseif($d['cba']<=1.57)
                                            <a class="text-green" href="{{route('asset.master.report_wmr_detail',['branch'=>'CBA','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cba']}}</a>
                                            @elseif($d['cba']>=1.58&&$d['cba']<=1.60)
                                            <a class="text-yellow" href="{{route('asset.master.report_wmr_detail',['branch'=>'CBA','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cba']}}</a>
                                            @elseif($d['cba']>=1.61)
                                            <a class="text-red" href="{{route('asset.master.report_wmr_detail',['branch'=>'CBA','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cba']}}</a>
                                            @endif
                                            </td>

                                            <td>
                                                {{$totalfactory}}
                                            </td>
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
    </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>
<script src="{{asset('common/js/dataTables-fixed-column.js')}}"></script>

<script>
  $('.deleteFile').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
      swal({
        title: "Are You Sure..?",
        text: "Permanently delete this data.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#fb5b5b",
        confirmButtonText: "Delete",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false
      },
    function(isConfirm){
        if (isConfirm) {
          window.location.href = url;        // submitting the form when user press yes
        } else {
        swal("Batal", "Your Data has been saved", "error");
        }
    }); 
  });
</script>
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

  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
        "pageLength": 10,
        dom: 'Bfrtp',
        "buttons": [ "excel", "pdf" ],
        fixedColumns:   {
        right: 1
        },
    });
  });
</script>

<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
    $(".checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>

@endpush