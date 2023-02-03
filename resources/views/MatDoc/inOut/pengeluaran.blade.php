@extends("layouts.app")
@section("title","Rencana Pengeluaran Barang")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/fixedColumns.dataTables.css')}}">
@endpush

@push("sidebar")
    @include('MatDoc.inOut.partials.navbar')
@endpush

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="row pb-5">
            <div class="col-12">
                <div class="cards o-hidden p-4">
                    <input type="hidden" id="tanggal_id" value="{{$id}}">
                    <div class="row">
                        <div class="col-12 pb-5">
                            <div class="justify-sb2 mb-3">
                                <div class="title-22">Rencana Pengeluaran Barang</div>
                                <div class="flexx gap-3">
                                    <div class="input-group date" id="report_date" data-target-input="nearest">
                                        <div class="input-group-append datepiker" data-target="#report_date" data-toggle="datetimepicker">
                                        <div class="inputGroupBlue"><i class="fas fa-calendar-alt mr-2 fs-18"></i><i class="fas fa-caret-down"></i></div>
                                        </div>
                                        <input type="text" class="form-control datetimepicker-input borderInput" data-target="#report_date" placeholder="Select Date" style="border-radius:0 10px 10px 0"/>
                                    </div>
                                        <!-- <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:45px;height:38px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control borderInput" name="" id=""> -->
                                    <div class="flex gap-2">
                                        <button class="btn-simple-monitor exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                                        <button class="btn-simple-delete exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="cards-scroll scrollX" id="scroll-bar">
                                <table id="DTtable" class="table tbl-content">
                                    <thead>
                                        <tr class="bg-thead">
                                            <th rowspan="2" style="padding-bottom:2.2rem" class="bg-thead">NO</th>
                                            <th rowspan="2" style="padding-bottom:2.2rem" class="bg-thead">Tanggal</th>
                                            <th rowspan="2" style="padding-bottom:2.2rem" class="bg-thead">Unit</th>
                                            <th rowspan="2" style="padding-bottom:1.5rem" class="bg-thead">Jumlah SJ</th>
                                            <th rowspan="2" style="padding-bottom:2.2rem" class="bg-thead">PO</th>
                                            <th rowspan="2" style="padding-bottom:2.2rem">SJ</th>
                                            <th rowspan="2" style="padding-bottom:1.5rem">Qty Koli</th>
                                            <th rowspan="2" style="padding-bottom:2.2rem">Detail</th>
                                            <th>Warehouse</th>
                                            <th colspan="2" class="text-center">Expedisi</th>
                                            <th colspan="2" class="text-center">Document</th>
                                            <th rowspan="2" style="padding-bottom:2.2rem">Keterangan</th>
                                        </tr>
                                        <tr class="bg-thead">
                                            <th>Submited</th>
                                            <th>Submited</th>
                                            <th>Duration</th>
                                            <th>Submited</th>
                                            <th>Duration</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data_warehouse as $key => $value)
                                        <?php
                                            $tanggal = date('Y-m-d', strtotime($value->created_at));
                                            $qty = collect($value->items)->toArray();
                                            $temp = array_unique(array_column($qty, 'no_box'));
                                            $qty_koli = collect($temp)->count();
                                            $fabric = collect($value->items)->where('class_code', 'INFA')->count();
                                            $acc = collect($value->items)->where('class_code', 'INAC')->count();
                                            
                                            // Filter accessories 
                                            if ($acc>0) {
                                                $acc = "Acc ".$acc." Box";
                                            }else {
                                                $acc = null;
                                            }

                                            // filter fabric 
                                            if ($fabric>0) {
                                                $fabric = "Fabric ".$fabric." Box";
                                            }else {
                                                $fabric = null;
                                            }

                                            // Hitung Durasi di ekspedisi 
                                            $masuk_ekspedisi = new DateTime($value->in_ekspedisi);//start time
                                            $keluar_ekspedisi = new DateTime($value->out_ekspedisi);//end time
                                            $durasi_ekspedisi = $masuk_ekspedisi->diff($keluar_ekspedisi);

                                            // Hitung Durasi di Document 
                                            $masuk_dokumen = new DateTime($value->in_dokumen);//start time
                                            $keluar_dokumen = new DateTime($value->finish);//end time
                                            $durasi_dokumen = $masuk_dokumen->diff($keluar_dokumen);

                                            // $jam_masuk_ekspedisi = $masuk_ekspedisi[0]*60;
                                            // $menit_masuk_ekspedisi = $masuk_ekspedisi[1];
                                            // $detik_masuk_ekspedisi = $masuk_ekspedisi[2]/60;
                                        ?>
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td class="no-wrap">{{$tanggal}}</td>
                                            <td>{{$value->from_branch}}</td>
                                            <td>{{$value->jumlah_sj}}</td>
                                            <td>{{$value->list_subkon()}}</td>
                                            <td>{{$value->surat_jalan}}</td>
                                            <td>{{$qty_koli}}</td>
                                            <td class="no-wrap">{{$acc}}{{$fabric}}</td>
                                            <td>{{date('H:i:s', strtotime($value->created_at))}}</td>
                                            <td>{{date('H:i:s', strtotime($value->in_ekspedisi))}}</td>
                                            <td>{{$durasi_ekspedisi->format('%H:%i:%s')}}</td>
                                            <td>{{date('H:i:s', strtotime($value->in_dokumen))}}</td>
                                            <td>{{$durasi_dokumen->format('%H:%i:%s')}}</td>
                                            <td>
                                                <div style="width:400px">
                                                    {{$value->keterangan}}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-thead">
                                            <th class="bg-thead">NO</th>
                                            <th class="bg-thead">Tanggal</th>
                                            <th class="bg-thead">Unit</th>
                                            <th class="bg-thead">Jumlah SJ</th>
                                            <th class="bg-thead">PO</th>
                                            <th>SJ</th>
                                            <th>Qty Koli</th>
                                            <th>Satuan</th>
                                            <th>Keterangan</th>
                                            <th>Warehouse</th>
                                            <th>Expedisi</th>
                                            <th>Expedisi</th>
                                            <th>Expedisi</th>
                                            <th>Expedisi</th>
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
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script src="{{asset('common/js/dataTables-fixed-column.js')}}"></script>

<script>
    $('.deleteFile').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Yakin..?',
            text: 'Anda akan menghapus data ini secara permanent.',
            icon: 'warning',
            buttons: ["Batalkan", "Hapus"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
    $('.kirimSJ').on('click', function (event) {
        swal({
            position: 'center',
            icon: 'success',
            title: 'Berhasil',
            text: 'Data berhasil ditambahkan ke daftar rencana pengeluaran barang',
            buttons: false,
            timer: 1500
        })
    });
</script>

<script>
    $(function () {
            $('[data-toggle="popover"]').popover()
        })

    $(function () {
        $("#DTtable").DataTable({
        dom: 'Brtp',
        "buttons": [ "excel", "pdf" ],
            fixedColumns:   {
                left: 5
            },
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

    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    $('.exportExcel').click(function(){
        $(".buttons-excel").click();
    })

    $('.exportPdf').click(function(){
        $(".buttons-pdf").click();
    })
</script>

<script>
  jQuery(document).ready(function($) {
    $('#report_date').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true,
        useCurrent: false,
    })
    
    var filter_count = 0;
    $("#report_date").on("change.datetimepicker", ({date}) => {
        if (filter_count == 0) {
            var month = $("#report_date").find("input").val();
            console.log( month);
            var url = "{{ route('in-out.pengeluaran_finish',[':id']) }}";
            url=url.replace(':id',month);
            window.location.href = url;   
        }
             filter_count++
    })
  });
</script>
@endpush