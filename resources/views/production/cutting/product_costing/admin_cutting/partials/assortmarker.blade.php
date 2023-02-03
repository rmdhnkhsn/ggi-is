<?php 
$assort = collect($data->assortmarker)->count('id');
?>
@if($assort == 0)
<form action="{{ route('adm.assortmarker')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="form_id" name="form_id" value="{{$data->id}}">
    <div class="row mt-2">
        <div class="col-gelar">
            <div class="input-group mb-3 mt-2">
                <input type="text" class="form-control border-input ratio-reject" id="size1" name="size[]" value="" placeholder="Size" required>
                <input type="number" class="form-control border-input ratio-reject qty1" id="qty1" name="qty[]" value="" placeholder="Qty" required>
            </div>
        </div>
        <div class="col-gelar">
            <div class="input-group mb-3 mt-2">
                <input type="text" class="form-control border-input ratio-reject" id="size2" name="size[]" value="" placeholder="Size">
                <input type="number" class="form-control border-input ratio-reject qty1" id="qty2" name="qty[]" value="" placeholder="Qty">
            </div>
        </div>
        <div class="col-gelar">
            <div class="input-group mb-3 mt-2">
                <input type="text" class="form-control border-input ratio-reject" id="size3" name="size[]" value="" placeholder="Size">
                <input type="number" class="form-control border-input ratio-reject qty1" id="qty3" name="qty[]" value="" placeholder="Qty">
            </div>
        </div>
        <div class="col-gelar">
            <div class="input-group mb-3 mt-2">
                <input type="text" class="form-control border-input ratio-reject" id="size4" name="size[]" value="" placeholder="Size">
                <input type="number" class="form-control border-input ratio-reject qty1" id="qty4" name="qty[]" value="" placeholder="Qty">
            </div>
        </div>
        <div class="col-gelar2">
            <div class="input-group mb-3 mt-2">
                <input type="text" class="form-control border-input ratio-reject" id="size5" name="size[]" value="" placeholder="Size">
                <input type="number" class="form-control border-input ratio-reject qty1" id="qty5" name="qty[]" value="" placeholder="Qty">
            </div>
        </div>
        <div class="col-gelar2">
            <div class="input-group mb-3 mt-2">
                <input type="text" class="form-control border-input ratio-reject" id="size6" name="size[]" value="" placeholder="Size">
                <input type="number" class="form-control border-input ratio-reject qty1" id="qty6" name="qty[]" value="" placeholder="Qty">
            </div>
        </div>
        <div class="col-gelar3">
            <div class="input-group mb-3 mt-2">
                <input type="text" class="form-control border-input ratio-reject" id="size7" name="size[]" value="" placeholder="Size">
                <input type="number" class="form-control border-input ratio-reject qty1" id="qty7" name="qty[]" value="" placeholder="Qty">
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-xl-3 col-md-6">
            <span class="title-sm">Total Ratio</span>
            <div class="input-group mb-3 mt-2">
                <input type="text" id="result" class="form-control border-input" name="total_ratio" readonly>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <span class="title-sm">Panjang Marker</span>
            <div class="input-group mb-3 mt-2">
                <input type="text" class="form-control border-input" id="panjang_marker" name="panjang_marker" placeholder="0" required>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <span class="title-sm">Lebar Marker</span>
            <div class="input-group mb-3 mt-2">
                <input type="text" class="form-control border-input" id="lebar_marker" name="lebar_marker" placeholder="0">
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <span class="title-sm">QTY Lembar</span>
            <div class="input-group mb-3 mt-2">
                <input type="text" class="form-control border-input" id="qty_lembar" name="qty_lembar" placeholder="0">
            </div>
        </div>
    </div>
    <div class="row py-3">
        <div class="col-12 text-right">
            <button type="submit" class="btn ctg-buatForm">Simpan<i class="wp-icon-btn fas fa-download"></i></button>
        </div>
    </div>
</form>
@else
<div class="row mt-4 scrollX" id="scroll-bar">
    <div class="col-12 text-center">
        <table id="DTtable" class="table tbl-ctg table-striped table-bordered no-wrap">
            <thead>
                <tr>
                    <th>Size</th>
                    <th>Qty</th>
                    <th>Action</th>
                </tr>
            </thread>
            <tbody>
                @foreach($data->assortmarker as $key => $value)
                <tr>
                    <td>{{$value->size}}</td>
                    <td>{{$value->qty}}</td>
                    <td>
                        <a href="{{route('delete.assortmarker', $value->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                        <button title="Edit" data-toggle="modal" data-target="#edit_assort-{{$value->id}}" class="btn btn-warning btn-sm editAssort"><i class="fas fa-edit"></i></button>
                        @include('production.cutting.product_costing.admin_cutting.partials.edit.modal-assortmarker')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif