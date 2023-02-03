@extends("layouts.app")
@section("title","Pengeluaran Barang")
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
                    <div class="row">
                        <div class="col-12 pb-5">
                            <div class="justify-sb2 mb-3">
                                <div class="title-22">Rencana Pengeluaran Barang</div>
                                <div class="flexx gap-3">
                                    <button type="button" class="btn-blue-md" data-toggle="modal" data-target="#buatPengeluaran">Filter</button>
                                    @include('MatDoc.inOut.partials.modal')
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
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Unit</th>
                                            <th>Jumlah SJ</th>
                                            <th>PO</th>
                                            <th>SJ</th>
                                            <th>Detail</th>
                                            <th>Qty Koli</th>
                                            <th>Waktu</th>
                                            <th>In Hand</th>
                                            <th>Action</th>
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
                                        ?>
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$tanggal}}</td>
                                            <td>{{$value->from_branch}}</td>
                                            <td>{{$value->jumlah_sj}}</td>
                                            <td>{{$value->list_subkon()}}</td>
                                            <td>{{$value->surat_jalan}}</td>
                                            <td>Acc {{$acc}} Box, Fabric {{$fabric}} Box</td>
                                            <td>{{$qty_koli}}</td>

                                            <!-- Kondisi Waktu  -->
                                            @if($value->status_barang == 'Gudang')
                                            <td>{{date('H:i:s', strtotime($value->created_at))}}</td> 
                                            @elseif($value->status_barang == 'Ekspedisi')
                                            <td>{{date('H:i:s', strtotime($value->in_ekspedisi))}}</td> 
                                            @elseif($value->status_barang == 'Dokumen')
                                            <td>{{date('H:i:s', strtotime($value->in_dokumen))}}</td> 
                                            @elseif($value->status_barang == 'Finish')
                                            <td>{{date('H:i:s', strtotime($value->finish))}}</td> 
                                            @endif

                                            <!-- Kondisi status barang  -->
                                            @if($value->status_barang == 'Gudang')
                                            <td><span class="text-merah">Gudang</span></td> 
                                            @elseif($value->status_barang == 'Ekspedisi')
                                            <td><span class="text-kuning">Ekspedisi</span></td> 
                                            @elseif($value->status_barang == 'Dokumen')
                                            <td><span class="text-biru">Dokumen</span></td> 
                                            @elseif($value->status_barang == 'Finish')
                                            <td><span class="text-hijau">Finish</span></td> 
                                            @endif

                                            <!-- Tombol Action  -->
                                            <td>
                                                <div class="justify-end gap-2">
                                                    @if($value->status_barang == "Ekspedisi")
                                                        <!-- Tombol Kirim Khusus Expedisi karena ada form surat jalan  -->
                                                        @if(auth()->user()->departemensubsub == 'EXPEDISI' || auth()->user()->departemensubsub == 'EKSPEDISI')
                                                        <button type="button" class="btn-blue-md" data-toggle="modal" data-target="#kirimBarang{{$value->id}}">Kirim <i class="ml-2 fs-18 fas fa-paper-plane"></i></button>
                                                        <!-- @else
                                                        <button class="btn-blue-md">Kirim <i class="ml-2 fs-18 fas fa-paper-plane"></i></button> -->
                                                        @endif
                                                    @else
                                                        <!-- Tombol kirim untuk warehouse  -->
                                                        @if($value->status_barang == 'Gudang' && auth()->user()->departemensubsub == 'WAREHOUSE')
                                                        <a href="{{route('in-out.update_status_barang', $value->id)}}"  class="btn-blue-md">Kirim <i class="ml-2 fs-18 fas fa-paper-plane"></i></a>
                                                        <!-- Tombol kirim untuk dokumen  -->
                                                        @elseif($value->status_barang == 'Dokumen' && auth()->user()->departemensubsub == 'DOCUMENT')
                                                        <a href="{{route('in-out.update_status_barang', $value->id)}}"  class="btn-green-md">Finish <i class="ml-2 fs-18 fas fa-paper-plane"></i></a>
                                                        <!-- Tombol kirim tidak muncul jika status barang sudah finish  -->
                                                        @elseif($value->status_barang == 'Finish')
                                                        
                                                        <!-- Jika tidak ada role  -->
                                                        @else
                                                        <button class="btn-blue-md">Kirim <i class="ml-2 fs-18 fas fa-paper-plane"></i></button>
                                                        @endif
                                                    @endif
                                                    <!-- Tombol titik 3 tidak muncul jika status barang finish  -->
                                                        <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>

                                                    <div class="dropdown-menu">
                                                        <!-- Modal Detail  -->
                                                        <button class="dropdown-item" data-toggle="modal" data-target="#DetailReport{{$value->id}}"><i class="mr-2 fs-18 fas fa-info-circle"></i>Detail</button>
                                                        <!-- Button Edit  -->
                                                        @if($value->status_barang == "Gudang" && auth()->user()->departemensubsub == 'WAREHOUSE')
                                                        <button class="dropdown-item editData" data-toggle="modal" data-target="#editData{{$value->id}}" style="color:#007bff"><i class="mr-2 fs-18 fas fa-pencil-alt"></i>Edit Data</button>
                                                        @endif
                                                        <!-- Button Reverse  -->
                                                        @if($value->status_barang == 'Dokumen' && auth()->user()->departemensubsub == 'DOCUMENT')
                                                        <a href="{{route('in-out.reverse_barang', $value->id)}}" class="dropdown-item" style="color:#68717A"><i class="mr-2 fs-18 fas fa-backward"></i>Reverse</a>
                                                        @elseif($value->status_barang == 'Ekspedisi')
                                                            @if(auth()->user()->departemensubsub == 'EXPEDISI' || auth()->user()->departemensubsub == 'EKSPEDISI')
                                                                <a href="{{route('in-out.reverse_barang', $value->id)}}" class="dropdown-item" style="color:#68717A"><i class="mr-2 fs-18 fas fa-backward"></i>Reverse</a>
                                                            @endif
                                                        @elseif($value->status_barang == 'Finish' && auth()->user()->departemensubsub == 'DOCUMENT')
                                                        <a href="{{route('in-out.reverse_barang', $value->id)}}" class="dropdown-item" style="color:#68717A"><i class="mr-2 fs-18 fas fa-backward"></i>Reverse</a>
                                                        @endif
                                                        <!-- Button Delete  -->
                                                        <a href="" class="dropdown-item deleteFile" style="color:#FB5B5B"><i class="mr-2 fs-18 fas fa-trash"></i>Delete</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('MatDoc.inOut.partials.modal-data')
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>NO</th>
                                            <th>Tanggal</th>
                                            <th>Unit</th>
                                            <th>Jumlah SJ</th>
                                            <th>PO</th>
                                            <th>SJ</th>
                                            <th>Qty Koli</th>
                                            <th>Satuan</th>
                                            <th>Waktu</th>
                                            <th>In Hand</th>
                                            <th>Action</th>
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
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/sweetalert2.js')}}"></script>
@if(Session::has('edit_gudang'))
  <script>
    // toastr.error("{!!Session::get('error')!!}");
    window.onload = function() { 
        Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Data berhasil di edit !'
      })
    }
  </script>
@endif
@if(Session::has('sudah_dikirim'))
  <script>
    // toastr.error("{!!Session::get('error')!!}");
    window.onload = function() { 
        Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Data berhasil di kirim !'
      })
    }
  </script>
@endif
<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4',
    });
    $('.exportExcel').click(function(){
        $(".buttons-excel").click();
    })

    $('.exportPdf').click(function(){
        $(".buttons-pdf").click();
    })
</script>
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
            text: 'Data berhasil di kirim',
            buttons: false,
            timer: 1500
        })
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

  $(function () {
    $("#DTtable").DataTable({
      dom: 'Brtp',
    //   "order": [[ 8, "asc" ]],
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

  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>
@endpush