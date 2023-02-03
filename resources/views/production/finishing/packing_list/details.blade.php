@extends("layouts.app")
@section("title","Packing List Details")
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

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row Finishing">
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
                            <table id="DTtable" class="table table-content no-wrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tanggal</th>
                                        <th>PO</th>
                                        <th>OR</th>
                                        <th>WO</th>
                                        <th>Buyer</th>
                                        <th>Style</th>
                                        <th>Qty Order ORI</th>
                                        <th>UoM ORI</th>
                                        <th>Qty Order</th>
                                        <th>UoM</th>
                                        <th>Qty Percent</th>
                                        <th>Qty Balance</th>
                                        <th>Qty Actual</th>
                                        <th>Status</th>
                                        <th>Final Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $counter = 1?>
                                    @foreach ($dataSize as $key =>$value)
                                        <tr>
                                            <td>{{ $counter++ }}</td>
                                            <td>{{ $value['tanggal'] }}</td>
                                            <td>{{ $value['po'] }}</td>
                                            <td>{{ $value['or_number'] }}</td>
                                            <td>{{ $value['wo'] }}</td>
                                            <td>{{ $value['buyer'] }}</td>
                                            <td>{{ $value['style'] }}</td>
                                            <td>{{ $value['qty_order'] }}</td>
                                            <!-- dari rekap detail  -->
                                            <td>{{ $value['kemasan'] }}</td> 
                                            <td>{{ $value['qty'] }}</td>
                                            @if ($value['qty_satuan'] > 1)
                                            <td>PACK</td>
                                            @else
                                            <td>PCS</td>
                                            @endif
                                            <td>{{ $value['qty_percent'] }}%</td>
                                            <td>{{ $value['qty_balance'] }}</td>
                                            @if ($value['qty_actual'] == null  &&  $value['qty_actual'] != null)
                                            <td></td>
                                            @else
                                            <td>{{ $value['qty_actual']  }}</td>
                                            @endif
                                                
                                            <td>
                                            <div class="justify-start">
                                                    @if (($value['status'] == 'Qty Order Sama'))
                                                        <button class="qtySama" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="{{ $value['status'] }}"><i class="fas fa-check-circle"></i></button>
                                                        
                                                    @elseif(($value['status'] == 'Qty Order Tidak Sama'))
                                                        <button class="qtyBeda" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="{{ $value['status'] }}"><i class="fas fa-times"></i></button>
                                                    @else
                                                    
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="justify-start">
                                                    @if ($value['qty'] == $value['qty_actual'] &&  $value['qty_actual'] != null )
                                                        <button class="passOrder" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Pass Order"><i class="fas fa-truck"></i></button>
                                                    @elseif ($value['qty'] > $value['qty_actual']   &&  $value['qty_actual'] != null)
                                                        <button class="shortShip" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Short Ship"><i class="fas fa-truck"></i></button>
                                                    @elseif ($value['qty'] < $value['qty_actual']  &&  $value['qty_actual'] != null )
                                                        <button class="overShip" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Over Ship"><i class="fas fa-truck"></i></button>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <form action="{{route ('packing.updatePackingListToExpedisiByDetail', $value['id']) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="flex" style="gap:.35rem;margin:-6px 0">
                                                        <a href="{{route('data-details', $value['id'])}}" class="btn-simple-info"><i class="fas fa-info"></i></a>
                                                        
                                                        <input type="hidden" id="id" name="id" value="{{ $value['id'] }}">
                                                        @if ($value['id_ekspedisi'] != null)
                                                            
                                                        @else
                                                        <a href="{{route('packing-edit',$value['id'])}}" class="btn-simple-edit"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="{{route('packing.deletePackingList',$value['id'])}}" class="btn-simple-delete deleteFile"><i class="fas fa-trash"></i></a>
                                                        {{-- <button type="submit" class="btn-simple-check"><i class="fs-20 fas fa-check"></i></button> --}}
                                                        @endif
                                                    </div>
                                                </form>
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
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>

<script>
  $(function () {
    $('[data-toggle="popover"]').popover()
  })
</script>

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    // scrollX : '100%',
    "pageLength": 15,
     order: [[1, 'desc']],
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