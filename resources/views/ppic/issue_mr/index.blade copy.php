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
    @include('ppic.issue_mr.partials.navbar')
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
                                <div class="title-22">Request Issue MR List</div>
                                <div class="flexx gap-3">
                                    <div class="input-group date" id="report_date" data-target-input="nearest">
                                        <div class="input-group-append datepiker" data-target="#report_date" data-toggle="datetimepicker">
                                        <div class="inputGroupBlue"><i class="fas fa-calendar-alt mr-2 fs-18"></i><i class="fas fa-caret-down"></i></div>
                                        </div>
                                        <input type="text" class="form-control datetimepicker-input borderInput" data-target="#report_date" placeholder="Select Date" style="border-radius:0 10px 10px 0"/>
                                    </div>
                                    <button type="button" class="btn-blue-md" data-toggle="modal" data-target="#AddIssue">Create</button>
                                    @include('ppic.issue_mr.partials.modal_add')
                                </div>
                            </div>
                            <div class="cards-scroll scrollX" id="scroll-bar">
                                <table id="DTtable" class="table tbl-content">
                                    <thead>
                                        <tr class="bg-thead">
                                            <th>No</th>
                                            <th>WO</th>
                                            <th>OR</th>
                                            <th>Line</th>
                                            <th>Branch</th>
                                            <th>Allowance</th>
                                            <th>Request By</th>
                                            <th>Request Date</th>
                                            <th>Delivery Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1;?>
                                        @foreach($request_issue as $key => $value)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{$value->no_wo}}</td>
                                            <td>{{$value->no_or}}</td>
                                            <td>{{$value->line}}</td>
                                            <td>{{$value->branch}}</td>
                                            <td>{{$value->allowance}}</td>
                                            <td>{{$value->created_name}}</td>
                                            <td>{{$value->request_date}}</td>
                                            <td>{{$value->delivery_date}}</td>
                                            <td>
                                                <div class="justify-end gap-2">
                                                    <!-- Tombol titik 3 tidak muncul jika status barang finish  -->
                                                    <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>

                                                    <div class="dropdown-menu">
                                                        <!-- Modal Detail  -->
                                                        <button class="dropdown-item" data-toggle="modal" data-target="#DetailReport{{$value->id}}"><i class="mr-2 fs-18 fas fa-info-circle"></i>Detail</button>
                                                        <!-- Button Edit  -->
                                                        <button class="dropdown-item editData" data-toggle="modal" data-target="#editData{{$value->id}}" style="color:#007bff"><i class="mr-2 fs-18 fas fa-pencil-alt"></i>Edit Data</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('ppic.issue_mr.partials.modal_detail')
                                        <?php $no++ ;?>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr><th>No</th>
                                            <th>WO</th>
                                            <th>OR</th>
                                            <th>Line</th>
                                            <th>Branch</th>
                                            <th>Allowance</th>
                                            <th>Request By</th>
                                            <th>Request Date</th>
                                            <th>Delivery Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="cards o-hidden p-4">
                    <div class="row">
                        <div class="col-12 pb-5">
                            <div class="justify-sb2 mb-3">
                                <div class="title-22">Issue MR Direct List</div>
                                <div class="flexx gap-3">
                                    <div class="input-group date" id="direct_list" data-target-input="nearest">
                                        <div class="input-group-append datepiker" data-target="#direct_list" data-toggle="datetimepicker">
                                        <div class="inputGroupBlue"><i class="fas fa-calendar-alt mr-2 fs-18"></i><i class="fas fa-caret-down"></i></div>
                                        </div>
                                        <input type="text" class="form-control datetimepicker-input borderInput" data-target="#direct_list" placeholder="Select Date" style="border-radius:0 10px 10px 0"/>
                                    </div>
                                    <button type="button" class="btn-blue-md" data-toggle="modal" data-target="#DirectList">Create</button>
                                    @include('ppic.issue_mr.partials.modal_directList')
                                </div>
                            </div>
                            <div class="cards-scroll scrollX" id="scroll-bar">
                                <table id="DirectListTable" class="table tbl-content">
                                    <thead>
                                        <tr class="bg-thead">
                                            <th>NO</th>
                                            <th>Tanggal</th>
                                            <th>WO</th>
                                            <th>OR</th>
                                            <th>Category</th>
                                            <th>QTY Issued</th>
                                            <th>UoM Issued</th>
                                            <th>Location</th>
                                            <th>Lot Number</th>
                                            <th>Contract No</th>
                                            <th>Placing</th>
                                            <th>Request By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>NO</th>
                                            <th>Tanggal</th>
                                            <th>WO</th>
                                            <th>OR</th>
                                            <th>Category</th>
                                            <th>QTY Issued</th>
                                            <th>UoM Issued</th>
                                            <th>Location</th>
                                            <th>Lot Number</th>
                                            <th>Contract No</th>
                                            <th>Placing</th>
                                            <th>Request By</th>
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
@if(Session::has('store_oke'))
  <script>
    // toastr.error("{!!Session::get('error')!!}");
    window.onload = function() { 
        Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Data berhasil di simpan !'
      })
    }
  </script>
@endif
@if(Session::has('data_ada'))
  <script>
    // toastr.error("{!!Session::get('error')!!}");
    window.onload = function() { 
        Swal.fire({
        icon: 'error',
        title: 'Opppsss',
        text: 'Data sudah pernah di input !'
      })
    }
  </script>
@endif
<!-- @if(Session::has('sudah_dikirim'))
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
</script> --> -->

<!-- Data table Atas  -->
<script>
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
</script>
<!-- Data table Bawah  -->
<script>
  $(function () {
    $("#DirectListTable").DataTable({
      dom: 'Brtp',
    //   "order": [[ 8, "asc" ]],
      "buttons": [ "excel", "pdf" ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
  
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#DirectListTable tfoot th').each( function () {
        var title = $('#DirectListTable thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" class="border-input-10" placeholder="search..." />' );
    });
    var table = $('#DirectListTable').DataTable();
 
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
<!-- filter tanggal table atas  -->
<script>
  jQuery(document).ready(function($) {
    $('#report_date').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true,
        useCurrent: false,
    })
    
    // var filter_count = 0;
    // $("#report_date").on("change.datetimepicker", ({date}) => {
    //     if (filter_count == 0) {
    //         var month = $("#report_date").find("input").val();
    //         console.log( month);
    //         var url = "{{ route('in-out.pengeluaran_finish',[':id']) }}";
    //         url=url.replace(':id',month);
    //         window.location.href = url;   
    //     }
    //          filter_count++
    // })
  });
</script>
<!-- filter tanggal table bawah  -->
<script>
  jQuery(document).ready(function($) {
    $('#direct_list').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true,
        useCurrent: false,
    })
    
    // var filter_count = 0;
    // $("#report_date").on("change.datetimepicker", ({date}) => {
    //     if (filter_count == 0) {
    //         var month = $("#report_date").find("input").val();
    //         console.log( month);
    //         var url = "{{ route('in-out.pengeluaran_finish',[':id']) }}";
    //         url=url.replace(':id',month);
    //         window.location.href = url;   
    //     }
    //          filter_count++
    // })
  });
</script>
@endpush