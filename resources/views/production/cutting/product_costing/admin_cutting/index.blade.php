@extends("layouts.app")
@section("title","Admin Cutting")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-cutting.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

@endpush

@section("content")
<section class="content">
    <div class="container-fluid">
      <div class="row mb-3">
        <div class="col-12">
            <span class="title-20">Daftar WO</span>
            <a href="{{ route('create-form')}}" class="ctg-buatForm ml-4">Buat Form</a>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="cards bg-card p-4 scrollX" id="scroll-bar">
            <button id="cutting_search"><i class="fas fa-search"></i></button>
            <table id="DTtable" class="table tbl-ctg table-striped no-wrap">
                <thead>
                    <tr>
                        <th width="10%">WO</th>
                        <th width="20%">Style</th>
                        <th width="10%">Buyer</th>
                        <th width="10%">Color</th>
                        <th width="10%">BODY/INT</th>
                        <th width="10%">Status</th>
                        <th width="10%">Total Qty</th>
                        <th width="10%">Terproses</th>
                        <th width="10%">Sisa</th>
                        <th width="10%">Production Date</th>
                        <th width="10%">Estimation Complete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_olahan as $key => $value)
                    @if($value['sisa'] != 0 || $value['no_wo'] != '0.0')
                    <tr>
                        <td>{{$value['no_wo']}}</td>
                        <td>{{$value['style']}}</td>
                        <td>{{$value['buyer']}}</td>
                        <td>{{$value['color']}}</td>
                        <td>{{$value['desc']}}</td>
                        <td>{{$value['srtx']}}</td>
                        <td>{{$value['qty']}}</td>
                        <td>{{$value['terpenuhi']}}</td>
                        <td>{{$value['sisa']}}</td>
                        <td>{{$value['production_date']}}</td>
                        <td>{{$value['estimation_complete']}}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
      <ul class="nav nav-tabs blue-md-tabs my-4" role="tablist">
        <li class="nav-item-show">
            <a class="nav-link active" data-toggle="tab" href="#tabOne" role="tab"></i>Form Gelaran</a>
            <div class="blue-slide"></div>
        </li>
        <li class="nav-item-show">
            <a class="nav-link" data-toggle="tab" href="#tabTwo" role="tab"></i>Form Dalam Proses</a>
            <div class="blue-slide"></div>
        </li>
      </ul>
      <div class="tab-content card-block">
        <div class="tab-pane active" id="tabOne" role="tabpanel">
            <div class="row">
                <div class="col-12 text-center">
                <div class="cards bg-card p-4 scrollX" id="scroll-bar">
                    <button id="cutting_search"><i class="fas fa-search"></i></button>
                    <table id="DTtable2" class="table tbl-content table-striped">
                        <thead>
                            <tr>
                                <th>Form ID</th>
                                <th class="pb-4">Buyer</th>
                                <th class="pb-4">Style</th>
                                <th class="pb-4">Color</th>
                                <th class="pb-4">Assortmaker</th>
                                <th>Panjang Maker</th>
                                <th>Lebar Marker</th>
                                <th>Total Qty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($form as $key => $value)
                            <tr>
                                <td>
                                    <a class="tbl-total-qty" data-toggle="modal" data-target="#FormID-{{$value->id}}" title="View Info">Form {{$value->id}}</a>
                                    <div class="modal fade" id="FormID-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:580px">
                                            <div class="modal-content" style="border-radius:10px">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    @include('production.cutting.product_costing.admin_cutting.partials.tabel-listwo')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <?php
                                    $buyer = collect($value->gelaran_wo)
                                                ->groupBy('buyer')
                                                ->map(function ($item) {
                                                        return array_merge(...$item->toArray());
                                                })->values()->toArray();
                                    $nama_buyer = collect($buyer)->implode('buyer', ' *|* ');
                                    $color = collect($value->gelaran_wo)
                                                ->groupBy('color')
                                                ->map(function ($item) {
                                                        return array_merge(...$item->toArray());
                                                })->values()->toArray();
                                    $nama_color = collect($color)->implode('color', ' *|* ');
                                    $style = collect($value->gelaran_wo)
                                                ->groupBy('style')
                                                ->map(function ($item) {
                                                        return array_merge(...$item->toArray());
                                                })->values()->toArray();
                                    $nama_style = collect($style)->implode('style', ' *|* ');
                                ?>
                                <td>{{$nama_buyer}}</td>
                                <td>{{$nama_style}}</td>
                                <td>{{$nama_color}}</td>
                                <td>
                                    <a class="tbl-total-qty" data-toggle="modal" data-target="#Assort-{{$value->id}}" title="View Info">{{$value->total_ratio}}</a>
                                    <div class="modal fade" id="Assort-{{$value->id}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
                                            <div class="modal-content" style="border-radius:10px">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    @include('production.cutting.product_costing.admin_cutting.partials.tabel-assortmarker')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$value->panjang_marker}}</td>
                                <td>{{$value->lebar_marker}}</td>
                                <td>
                                    <?php
                                    $total_qty = collect($value->gelaran_wo)->sum('total_qty');
                                    ?>
                                    {{$total_qty}}
                                </td>
                                <td>
                                    <div class="container-tbl-btn justify-start">
                                        <a href="{{route('adm.edit-form', $value->id)}}" class="btn btn-yellow">Edit<i class="ml-2 fas fa-pencil-alt"></i></a>
                                        @if($value->total_ratio != 0)
                                        <a href="{{route('cutting.update_proses', $value->id)}}" class="btn btn-blue ml-2">Process<i class="ml-2 fas fa-arrow-right"></i></a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tabTwo" role="tabpanel">
            <div class="row">
                <div class="col-12 text-center">
                <div class="cards bg-card p-4 scrollX" id="scroll-bar">
                    <button id="cutting_search"><i class="fas fa-search"></i></button>
                    <table id="DTtable2" class="table tbl-content table-striped">
                        <thead>
                            <tr>
                                <th>Form ID</th>
                                <th>Buyer</th>
                                <th>Style</th>
                                <th>Color</th>
                                <th>Assortmaker</th>
                                <th>Panjang Maker</th>
                                <th>Lebar Marker</th>
                                <th>Total Qty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gelar as $key => $value)
                            <tr>
                                <td>
                                    <a class="tbl-total-qty" data-toggle="modal" data-target="#FormID-{{$value->id}}" title="View Info">Form {{$value->id}}</a>
                                    <div class="modal fade" id="FormID-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:580px">
                                            <div class="modal-content" style="border-radius:10px">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    @include('production.cutting.product_costing.admin_cutting.partials.tabel-listwo')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <?php
                                    $buyer = collect($value->gelaran_wo)
                                                ->groupBy('buyer')
                                                ->map(function ($item) {
                                                        return array_merge(...$item->toArray());
                                                })->values()->toArray();
                                    $nama_buyer = collect($buyer)->implode('buyer', ' *|* ');
                                    $color = collect($value->gelaran_wo)
                                                ->groupBy('color')
                                                ->map(function ($item) {
                                                        return array_merge(...$item->toArray());
                                                })->values()->toArray();
                                    $nama_color = collect($color)->implode('color', ' *|* ');
                                    $style = collect($value->gelaran_wo)
                                                ->groupBy('style')
                                                ->map(function ($item) {
                                                        return array_merge(...$item->toArray());
                                                })->values()->toArray();
                                    $nama_style = collect($style)->implode('style', ' *|* ');
                                ?>
                                <td>{{$nama_buyer}}</td>
                                <td>{{$nama_style}}</td>
                                <td>{{$nama_color}}</td>
                                <td>
                                    <a class="tbl-total-qty" data-toggle="modal" data-target="#Assort-{{$value->id}}" title="View Info">{{$value->total_ratio}}</a>
                                    <div class="modal fade" id="Assort-{{$value->id}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
                                            <div class="modal-content" style="border-radius:10px">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    @include('production.cutting.product_costing.admin_cutting.partials.tabel-assortmarker')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$value->panjang_marker}}</td>
                                <td>{{$value->lebar_marker}}</td>
                                <td>
                                    <?php
                                    $total_qty = collect($value->gelaran_wo)->sum('total_qty');
                                    ?>
                                    {{$total_qty}}
                                </td>
                                <td>
                                    <div class="container-tbl-btn justify-start">
                                        <a href="{{route('adm.edit-form', $value->id)}}" class="btn btn-yellow">Edit<i class="ml-2 fas fa-pencil-alt"></i></a>
                                        <a href="{{route('cutting.pemakaian_kain', $value->id)}}" class="btn btn-blue ml-2"><i class="ml-0 fas fa-print"></i></a>
                                        <a href="{{route('cutting.label_delete_all', $value->id)}}" onclick="return confirm('Delete this form ?');" class="btn btn-red ml-2"><i class="ml-0 fas fa-trash"></i></a>
                                    </div>
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
</section>
@endsection

@push("scripts")
<script>
    $('#start_date').datetimepicker({
        format: 'DD-MM-Y',
        showButtonPanel: true
    });
    $('#estimate_date').datetimepicker({
        format: 'DD-MM-Y',
        showButtonPanel: true
    });

    $(document).ready(
        function () {
            $('#multipleSelectExample').select2();
        }
    );
</script>
<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    //   scrollX:'auto',
      "pageLength": 10,
      "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable2').DataTable({
    //   scrollX:'auto',
      "pageLength": 10,
      "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
</script>
@endpush