@extends("layouts.app")
@section("title","Data Packing List")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

@endpush

@push("sidebar")
{{-- @if ($data->action == "EXPEDISI")
@elseif ($data->action == "PACKING")
@include('production.finishing.packing_list.partials.navbar2') --}}

{{-- @endif --}}

@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row Finishing">
        <div class="col-lg-3 col-md-6">
            <div class="flat-card" style="padding:10px 16px;height:190px">
                <div class="deskripsi">
                    <div class="judul">Nomor PO</div>
                    <div class="sub-judul">{{ $data[0]->po }}</div>
                </div>
                <div class="deskripsi">
                    <div class="judul">Nomor OR</div>
                    <div class="sub-judul">{{ $data[0]->or_number }}</div>
                </div>
                <div class="deskripsi">
                    <div class="judul">Nomor WO</div>
                    <div class="sub-judul">{{ $data[0]->wo }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="flat-card" style="padding:10px 16px;height:190px">
                <div class="deskripsi">
                    <div class="judul">Buyer</div>
                    <div class="sub-judul">{{ $data[0]->buyer }}</div>
                </div>
                <div class="deskripsi">
                    <div class="judul">Agent</div>
                    <div class="sub-judul">{{ $data[0]->agent }}</div>
                </div>
                <div class="deskripsi">
                    <div class="judul">Nomor Kontrak</div>
                    <div class="sub-judul">{{ $data[0]->no_kontrak }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="flat-card" style="padding:10px 16px;height:190px">
                <div class="deskripsi">
                    <div class="judul">Qty Order</div>
                    <div class="sub-judul">{{ $data[0]->qty }}</div>
                </div>
                <div class="deskripsi">
                    <div class="judul">Warehouse</div>
                    <div class="sub-judul">{{ $data[0]->warehouse }}</div>
                </div>
                <div class="deskripsi">
                    <div class="judul">OFF CTN</div>
                    <div class="sub-judul">{{ $dataSizeJumlahOFFctn }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="flat-card" style="padding:10px 16px;height:190px">
                <div class="deskripsi">
                    <div class="judul">Tanggal</div>
                    <div class="sub-judul">{{ $data[0]->tanggal }}</div>
                </div>
                <div class="deskripsi">
                    <div class="judul">Documents</div>
                    <div class="sub-btn">
                        <div class="justify-start">
                            <a href="{{ route('finishing.reportPacking_excel', $data[0]->id) }}" class="btn-green">Download<i class="ml-2 fas fa-file-excel"></i></a>
                        </div>
                        <div class="justify-start">
                            <a href="{{ route('finishing.reportPacking_pdf', $data[0]->id) }}" class="btn-merah">Download<i class="ml-2 fas fa-file-pdf"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="cards" style="padding:26px">
                <div class="row">
                    <div class="col-12">
                        <div class="title-22 text-left">Data Performa Packing List</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 pb-5">
                        <div class="cards-scroll scrollX" id="scroll-bar-sm">
                            <button id="btnSearch"><i class="fas fa-search"></i></button>  
                            <table id="DTtable4" class="table table-content no-wrap">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">CTN CODE</th>
                                        <th style="text-align:center;">COLOR CODE</th>

                                        @if(!empty($data[0]->warehouse))
                                            <th style="text-align:center;">WAREHOUSE</th>
                                        @endif

                                        @if($data[0]->buyer =='AGRON, INC.')
                                            <th style="text-align:center;">ARTICLE</th>
                                        @else
                                            <th style="text-align:center;">STYLE</th>
                                        @endif

                                        @foreach($namaSizes as $val)
                                            <th style="text-align:center;">{{$val}}</th>
                                        @endforeach
                                        <th style="text-align:center;">QTY SIZE</th>
                                        <th style="text-align:center;">SATUAN</th>
                                        <th style="text-align:center;">NW</th>
                                        <th style="text-align:center;">GW</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $counter = 1?>
                                    @foreach ($data as $value)
                                        @for($i = 0; $i < $value["qty_carton"]; $i++)
                                            <tr>
                                                <td style="text-align:center;">{{ $counter++ }}</td>
                                                <td style="text-align:center;">{{ $value['color_code'] }}</td>
                                                @if ( !empty($value['warehouse']))
                                                    <td style="text-align:center;">{{ $value['warehouse'] }}</td>
                                                @endif

                                                @if($data[0]->buyer =='AGRON, INC.')
                                                    <td style="text-align:center;">{{ $value['style'] }}</td>
                                                @else
                                                    <td style="text-align:center;">{{ $value['style'] }}</td>
                                                @endif

                                                @php
                                                    $sum = 0;
                                                @endphp
                                                @foreach($sizes as $size)
                                                    @if($size["kode_ekspedisi"] == $value["finishing_packing_size_kode_ekspedisi"])
                                                        @php
                                                            $sum += $size["jumlah_size"];
                                                        @endphp
                                                        <td style="text-align:center;">
                                                            {{ $size["jumlah_size"] }}
                                                        </td>
                                                    @endif
                                                @endforeach
                                                <td style="text-align:center;">
                                                    {{ $sum }}
                                                </td>
                                                <td style="text-align:center;">{{ $value['satuan'] }}</td>
                                                <td style="text-align:center;">{{ $value['NW'] }}</td>
                                                <td style="text-align:center;">{{ $value['GW'] }}</td>
                                            </tr>
                                        @endfor
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
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/toastr.min.js')}}"></script>
<script>
  $(document).ready( function () {
    var table = $('#DTtable2').DataTable({
    // scrollX : '100%',
    "pageLength": 15,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable4').DataTable({
    // scrollX : '100%',
    "pageLength": 15,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
</script>

<script>
  $('.deleteFile').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
  });
</script>


@endpush