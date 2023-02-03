@extends("layouts.app")
@section("title","Create Partials")
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
    @include('production.finishing.packing_list.partials.navbar2')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row Finishing">
        <div class="col-lg-3 col-md-6">
            <div class="flat-card" style="padding:10px 16px;height:190px">
                <div class="deskripsi">
                    <div class="judul">Nomor PO</div>
                    <div class="sub-judul">{{ $data->po }}</div>
                </div>
                <div class="deskripsi">
                    <div class="judul">Nomor OR</div>
                    <div class="sub-judul">{{ $data->or_number }}</div>
                </div>
                <div class="deskripsi">
                    <div class="judul">Nomor WO</div>
                    <div class="sub-judul">{{ $data->wo }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="flat-card" style="padding:10px 16px;height:190px">
                <div class="deskripsi">
                    <div class="judul">Buyer</div>
                    <div class="sub-judul">{{ $data->buyer }}</div>
                </div>
                <div class="deskripsi">
                    <div class="judul">Agent</div>
                    <div class="sub-judul">{{ $data->agent }}</div>
                </div>
                <div class="deskripsi">
                    <div class="judul">Nomor Kontak</div>
                    <div class="sub-judul">{{ $data->no_kontrak }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="flat-card" style="padding:10px 16px;height:190px">
                <div class="deskripsi">
                    <div class="judul">Qty Order</div>
                    
                     @foreach ($dataPackingList as $item)
                          <div class="sub-judul">{{ $item['qty'] }}</div>
                    @endforeach
                </div>
                <div class="deskripsi">
                    <div class="judul">Warehouse</div>
                    <div class="sub-judul">{{ $data->warehouse }}</div>
                </div>
                <div class="deskripsi">
                    <div class="judul">OFF CTN</div>
                    @foreach ($dataPackingList as $item)
                          <div class="sub-judul">{{ $item['carton'] }}</div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="flat-card" style="padding:10px 16px;height:190px">
                <div class="deskripsi">
                    <div class="judul">Tanggal</div>
                     @foreach ($dataPackingList as $item)
                          <div class="sub-judul">{{ $item['tanggal'] }}</div>
                    @endforeach
                </div>
                <div class="deskripsi">
                    <div class="judul">Documents</div>
                    <div class="sub-btn">
                        <div class="justify-start">
                            <a href="{{ route('finishing.reportPackingParsial_excel', $data->id) }}" class="btn-green">Download<i class="ml-2 fas fa-file-excel"></i></a>
                        </div>
                        <div class="justify-start">
                            <a href="{{ route('finishing.reportPackingPartial_pdf', $data->id) }}" class="btn-merah">Download<i class="ml-2 fas fa-file-pdf"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="cards" style="padding:26px">
                <div class="row">
                    <div class="col-12 flex" style="gap:1.5rem">
                        <div class="title-22 text-left">Data Packing List</div>
                        <a href="" class="btn-blue-md" data-toggle="modal" data-target="#createPartials{{  $data->id }}">Create Partials<i class="fs-18 ml-2 fas fa-plus"></i></a>
                         @include('production.finishing.packing_list.partials.modal-partials')
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 pb-5">
                        <div class="cards-scroll scrollX" id="scroll-bar-sm">
                            <button id="btnSearch"><i class="fas fa-search"></i></button>  
                           <table id="DTtable" class="table table-content no-wrap">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">CTN CODE</th>
                                        <th style="text-align:center;">TANGGAL</th>
                                        <th style="text-align:center;">COLOR COCE</th>
                                        @if($data->warehouse ==null)

                                        @else
                                        <th style="text-align:center;">WAREHOUSE</th>
                                        
                                        @endif
                                        <th style="text-align:center;">ARTICLE</th>

                                        @foreach($dataByNamaSize as $key2=>$value2)
                                        <th style="text-align:center;">{{$value2['nama_size']}}</th>
                                        @endforeach
                                        <th style="text-align:center;">QTY SIZE</th>
                                        <th style="text-align:center;">SATUAN</th>
                                        <th style="text-align:center;">NW</th>
                                        <th style="text-align:center;">GW</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tes as $key =>$value)
                                        
                                    <tr>
                                        <td style="text-align:center;">{{ $loop->iteration }}</td>
                                        <td style="text-align:center;">{{ $value['tanggal'] }}</td>
                                        <td style="text-align:center;">{{ $value['color_code'] }}</td>

                                        @if ($value['warehouse']== null &&$value['article']== null )

                                        @elseif ($value['warehouse'] && $value['article'])
                                        <td style="text-align:center;">{{ $value['warehouse'] }}</td>
                                        @endif
                                        <td style="text-align:center;">{{ $value['article'] }}</td>
                                        @foreach($dataByNamaSize as $key4=>$value4)
                                            <?php 
                                                $a=collect($dataSizePartlist);
                                                $qty_sizeJumlah = collect($a)->where('carton', $value['carton'])->sum('jumlah_size');

                                                $cek_data = $a->where('nama_size',$value4['nama_size'])->where('carton',$value['carton'])->count();
                                                if ($cek_data != 0) {
                                                    $jumlah=$a->where('nama_size',$value4['nama_size'])->where('carton',$value['carton'])->first();
                                                    $qty=$jumlah['jumlah_size'];
                                                }
                                                else{
                                                $qty='0';
                                                }
                                            ?>
                                            <td style="text-align:center;">{{ $qty }}</td>
                                            @endforeach
                                        <td style="text-align:center;">{{ $qty_sizeJumlah }}</td>
                                        <td style="text-align:center;">{{ $value['satuan'] }}</td>
                                        <td style="text-align:center;">{{ $value['NW'] }}</td>
                                        <td style="text-align:center;">{{ $value['GW'] }}</td>
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
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    // scrollX : '100%',
    "pageLength": 15,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
</script>

<script>
  $('.save').on('click', function (event) {
    swal({
      position: 'center',
      icon: 'success',
      title: 'Success',
      text: 'Your Partials Has been Saved',
      buttons: false,
      timer: 1500
    })
  });
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

<script>
    $("#addCarton").click(function () {
        var html = '';
        html += '<div class="row px-4">';
        html += '<div class="col-md-4">';
        html += '<div class="input-group date mt-1 mb-2">';
        html += '<div class="input-group-append">';
        html += '<div class="custom-calendar" style="height:40px; border-radius:10px 0 0 10px; width:75px">';
        html += '<span>Carton</span>';
        html += '</div>';
        html += '</div>';
        html += '<input type="text" class="form-control datetimepicker-input border-input-10" placeholder="carton..."/>';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-md-4">';
        html += '<div class="input-group date mt-1 mb-2">';
        html += '<div class="input-group-append">';
        html += '<div class="custom-calendar size-1" style="height:40px; border-radius:10px 0 0 10px; width:75px">';
        html += '<span>SS</span>';
        html += '</div>';
        html += '</div>';
        html += '<input type="text" class="form-control datetimepicker-input border-input-10" placeholder="size..."/>';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-md-4">';
        html += '<div class="input-group date mt-1 mb-2">';
        html += '<div class="input-group-append">';
        html += '<div class="custom-calendar" style="height:40px; border-radius:10px 0 0 10px; width:75px">';
        html += '<span>S</span>';
        html += '</div>';
        html += '</div>';
        html += '<input type="text" class="form-control datetimepicker-input border-input-10" placeholder="size..."/>';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-md-4">';
        html += '<div class="input-group date mt-1 mb-2">';
        html += '<div class="input-group-append">';
        html += '<div class="custom-calendar" style="height:40px; border-radius:10px 0 0 10px; width:75px">';
        html += '<span>M</span>';
        html += '</div>';
        html += '</div>';
        html += '<input type="text" class="form-control datetimepicker-input border-input-10" placeholder="size..."/>';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-md-4">';
        html += '<div class="input-group date mt-1 mb-2">';
        html += '<div class="input-group-append">';
        html += '<div class="custom-calendar" style="height:40px; border-radius:10px 0 0 10px; width:75px">';
        html += '<span>L</span>';
        html += '</div>';
        html += '</div>';
        html += '<input type="text" class="form-control datetimepicker-input border-input-10" placeholder="size..."/>';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-md-4">';
        html += '<div class="input-group date mt-1 mb-2">';
        html += '<div class="input-group-append">';
        html += '<div class="custom-calendar" style="height:40px; border-radius:10px 0 0 10px; width:75px">';
        html += '<span>LL</span>';
        html += '</div>';
        html += '</div>';
        html += '<input type="text" class="form-control datetimepicker-input border-input-10" placeholder="size..."/>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        $('#newRowPartials').append(html);

    });
</script>


@endpush