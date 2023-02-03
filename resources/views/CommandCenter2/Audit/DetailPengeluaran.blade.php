@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/styleCC1.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">

    <!-- Datatables -->
    <link rel="stylesheet" href="{{asset('/assets3/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('/assets3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/assets3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/assets3/dist/css/adminlte.css')}}">
@endpush

@section("content")

    <section class="content f-poppins">
      <div class="container-fluid">

        <div class="row">
            <div class="col-12">
            <div class="cards bg-card p-4">
                <p>
                <input type="text" id="mySearchText" placeholder="Search...">
                <button id="mySearchButton"><i class="fas fa-search"></i></button>
                </p>
                <span class="adt-anom-details">Anomali Pengeluaran Details</span>
                <div class="row mt-2">
                <div class="col-12 text-center">
                    <table id="DTtable" class="table table-bordered table-striped no-wrap">
                    <thead>
                        <tr>
                            <th>Key</th>
                            <th>Item Number</th>
                            <th>Bussines Unit</th>
                            <th>DC TY</th>
                            <th>GL Class</th>
                            <th>TR Date Ledger</th>
                            <th>GL Date Pengeluaran</th>
                            <th>LOT Num</th>
                            <th>Quantity</th>
                            <th>UM</th>
                            <th>No Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengeluaranF as $key=>$value)
                        <tr>
                            <td>
                                <a class="adt-modal-details" data-toggle="modal" data-target="#anomali-details{{$value['F564111H_UKID']}}" title="View Info">
                                {{$value['F564111H_UKID']}}
                                </a>

                                <div class="modal fade" id="anomali-details{{$value['F564111H_UKID']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="adt-no-daftar-user">
                                                No. Daftar : {{$value['F564111H_DSCP2']}} || User : {{$value['F4111_USER']}}
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                            <div class="col-12">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td width="50%" style="font-weight:600">Jenis Dokumen</td>
                                                        <td width="50%" style="font-weight:400">{{$value['F564111H_DSC1']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="50%" style="font-weight:600">User</td>
                                                        <td width="50%" style="font-weight:400">{{$value['F4111_USER']}}</td>
                                                    </tr>
                                                </table>
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td width="25%"></td>
                                                        <td width="25%" style="font-weight:600">Ledger</td>
                                                        <td width="25%" style="font-weight:600">Pengeluaran</td>
                                                        <td width="25%" style="font-weight:600">Remark</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25%" style="font-weight:600">Uji Item</td>
                                                        <td width="25%" style="font-weight:400">{{$value['F4111_ITM']}}</td>
                                                        <td width="25%" style="font-weight:400">{{$value['F564111H_ITM']}}</td>
                                                        <td width="25%" style="font-weight:400">{{$value['Uji_ITM']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25%" style="font-weight:600">Uji Qty</td>
                                                        <td width="25%" style="font-weight:400">{{$value['F4111_TRQT']}}</td>
                                                        <td width="25%" style="font-weight:400">{{$value['F564111H_TRQT']}}</td>
                                                        <td width="25%" style="font-weight:400">{{$value['Uji_QTY']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25%" style="font-weight:600">Uji UOM</td>
                                                        <td width="25%" style="font-weight:400">{{$value['F4111_TRUM']}}</td>
                                                        <td width="25%" style="font-weight:400">{{$value['F564111H_TRUM']}}</td>
                                                        <td width="25%" style="font-weight:400">{{$value['Uji_UOM']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25%" style="font-weight:600">Uji Unit</td>
                                                        <td width="25%" style="font-weight:400">{{$value['F4111_MCU']}}</td>
                                                        <td width="25%" style="font-weight:400">{{$value['F564111H_MCU']}}</td>
                                                        <td width="25%" style="font-weight:400">{{$value['Uji_BRANCH']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25%" style="font-weight:600">Uji Tanggal Transaksi</td>
                                                        <td width="25%" style="font-weight:400">OR DATE {{$value['F4111_TRDJ']}}</td>
                                                        <td width="25%" style="font-weight:400">GL DATE {{$value['F564111H_DGL']}}</td>
                                                        <td width="25%" style="font-weight:400">{{$value['Uji_TGL_Trans_GL']}}</td>
                                                    </tr>
                                                </table>
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td width="50%" style="font-weight:600">Remark</td>
                                                        <td width="50%" style="font-weight:400">
                                                            <span class="remark-nomatch">{{$value['remark']}}</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>  
                                            </div>  
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{$value['F4111_ITM']}}</td>
                            <td>{{$value['F4111_MCU']}}</td>
                            <td>{{$value['F4111_DCT']}}</td>
                            <td>{{$value['F4111_GLPT']}}</td>
                            <td>{{$value['F4111_TRDJ']}}</td>
                            <td>{{$value['F564111H_DGL']}}</td>
                            <td>{{$value['F4111_LOTN']}}</td>
                            <td>{{$value['F4111_TRQT']}}</td>
                            <td>{{$value['F4111_TRUM']}}</td>
                            <td>{{$value['F564111H_DSCP2']}}</td>
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
<script src="{{asset('assets3/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

<script>
    $(document).ready( function () {
    var table = $('#DTtable').DataTable({
      scrollX : '100%',
      "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
    
    $('#mySearchButton').on( 'keyup click', function () {
      table.search($('#mySearchText').val()).draw();
    } );
  } );
</script>

@endpush