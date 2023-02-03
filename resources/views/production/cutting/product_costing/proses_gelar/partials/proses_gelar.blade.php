
@if($proses_gelar == 0)
<div class="col-12">
    <div class="cards px-4 pt-4">
        <form action="{{ route('form.store_gelar')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="cards-scroll scrollX" id="scroll-bar">
            <table id="table_gelar" class="table gelar-tbl-content table-bordered no-wrap">
                <thead>
                <tr>
                    <th rowspan="2"><div class="w100 pd-tbl-30">WO</div></th> 
                    <th rowspan="2"><div class="w100 pd-tbl-30">No Roll</div></th> 
                    <th rowspan="2"><div class="pd-tbl-30">Color</div></th>
                    <th rowspan="2"><div class="w100 pd-tbl-20">Qty Roll <br>H/T (Yards)</div></th>
                    <th rowspan="2"><div class="w100 pd-tbl-20">Qty Gelar <br>(Lembar)</div></th>
                    <th rowspan="2"><div class="w100 pd-tbl-20">Qty Potong <br>(Pcs)</div></th>
                    <th colspan="2">Sisa Kain (Yards)</th>
                    <th rowspan="2"><div class="w200 pd-tbl-30">Keterangan</div></th>
                </tr>
                <tr>
                    <th><div class="w80 pd-tbl-10">Terpakai</div></th>
                    <th><div class="w80">tidak <br>Terpakai</div></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                    <select class="dropdown-select" id="no_wo[]" name="no_wo[]" required="required">
                        <option selected></option>
                        @foreach($dataWO as $key => $value)
                        <option value="{{$key}}">{{$key}}</option>
                        @endforeach
                    </select>
                    </td>
                    <td>
                    <div class="input-group">
                        <input type="hidden" class="form-control border-input" id="form_id" name="form_id[]" value="{{$form->id}}" placeholder="">
                        <input type="text" class="form-control border-input" id="no_roll" name="no_roll[]" placeholder="">
                    </div>
                    </td>
                    <td>
                    <select class="dropdown-select" id="color[]" name="color[]" required="required">
                        <option selected></option>
                        @foreach($color as $key => $value)
                        <option value="{{$key}}">{{$key}}</option>
                        @endforeach
                    </select>
                    </td>
                    <td>
                    <div class="input-group">
                        <input type="text" class="form-control border-input" id="qty_roll" name="qty_roll[]" placeholder="">
                    </div>
                    </td>
                    <td>
                    <div class="input-group">
                        <input type="text" class="form-control border-input" id="qty_gelar" name="qty_gelar[]" placeholder="">
                    </div>
                    </td>
                    <td>
                    <div class="input-group">
                        <input type="text" class="form-control border-input" id="qty_potong" name="qty_potong[]" placeholder="">
                    </div>
                    </td>
                    <td>
                    <div class="input-group">
                        <input type="text" class="form-control border-input" id="terpakai" name="terpakai[]" placeholder="">
                    </div>
                    </td>
                    <td>
                    <div class="input-group">
                        <input type="text" class="form-control border-input" id="tidak_terpakai" name="tidak_terpakai[]" placeholder="">
                    </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <input type="text" class="form-control border-input" id="keterangan" name="keterangan[]" placeholder="">
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
        <br>
        <div class="row pb-4">
            <div class="col-2">
                <div class="title-14 text-truncate text-left">QTY Lembar</div>
                <div class="input-group mt-1">
                    <input type="text" class="form-control border-input" id="qty_lembar" name="qty_lembar" value="{{$form->qty_lembar}}" placeholder="Masukan QTY Lembar.." readonly>
                </div>
            </div>
            <div class="col-2">
                <div class="title-14 text-truncate text-left">QTY Actual Lembar</div>
                <div class="input-group mt-1">
                    <input type="text" class="form-control border-input" id="qty_actual_lembar" name="qty_actual_lembar" placeholder="Masukan QTY Actual Lembar..">
                </div>
            </div>
            <div class="col-2">
                <div class="title-14 text-truncate text-left">Panjang Marker Actual</div>
                <div class="input-group mt-1">
                    <input type="text" class="form-control border-input" id="panjang_marker_actual" name="panjang_marker_actual" placeholder="Masukan Panjang Marker Actual..">
                </div>
            </div>
            <div class="col-2">
                <div class="title-14 text-truncate text-left">Lebar Marker Actual</div>
                <div class="input-group mt-1">
                    <input type="text" class="form-control border-input" id="lebar_marker_actual" name="lebar_marker_actual" placeholder="Masukan Lebar Marker Actual..">
                </div>
            </div>
            <div class="col-2">
                <div class="title-14 text-truncate text-left">Nomor Meja</div>
                <div class="input-group mt-1">
                    <input type="text" class="form-control border-input" id="nomor_meja" name="nomor_meja" placeholder="Masukan Nomor Meja..">
                </div>
            </div>
            <div class="col-2">
                <div class="title-14 text-truncate text-left">Country</div>
                <div class="input-group mt-1">
                    <input type="text" class="form-control border-input" id="country" name="country" placeholder="Masukan Country..">
                </div>
            </div>
        </div>
        <div class="row pb-4">
            <div class="col-12 flex mt-2">
                <button type="button" id="more_fields" onclick="add_more();" class="btn-add-column">
                    <i class="fs-18 fas fa-plus mr-2"></i>
                    Add More Column 
                </button>
                <button type="submit" class="btn-gelar-save ml-3">Save <i class="fs-18 ml-2 fas fa-download"></i></button>
            </div>
        </div>
        </form>
    </div>
</div>
@else
<div class="col-12">
    <div class="cards px-4 pt-4">
        <div class="row">
            <div class="cards-scroll scrollX" id="scroll-bar">
            <table id="table_gelar" class="table gelar-tbl-content table-bordered no-wrap">
                <thead>
                <tr>
                    <th rowspan="2"><div class="w100 pd-tbl-30">WO</div></th> 
                    <th rowspan="2"><div class="w100 pd-tbl-30">No Roll</div></th> 
                    <th rowspan="2"><div class="pd-tbl-30">Color</div></th>
                    <th rowspan="2"><div class="w100 pd-tbl-20">Qty Roll <br>H/T (Yards)</div></th>
                    <th rowspan="2"><div class="w100 pd-tbl-20">Qty Gelar <br>(Lembar)</div></th>
                    <th rowspan="2"><div class="w100 pd-tbl-20">Qty Potong <br>(Pcs)</div></th>
                    <th colspan="2">Sisa Kain (Yards)</th>
                    <th rowspan="2"><div class="w200 pd-tbl-30">Keterangan</div></th>
                    <th rowspan="2"><div class="w100 pd-tbl-20">Action</div></th>
                </tr>
                <tr>
                    <th><div class="w80 pd-tbl-10">Terpakai</div></th>
                    <th><div class="w80">tidak <br>Terpakai</div></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($form->proses_gelar as $key => $value)
                    <tr>
                        <td>{{$value->no_wo}}</td>
                        <td>{{$value->no_roll}}</td>
                        <td>{{$value->color}}</td>
                        <td>{{$value->qty_roll}}</td>
                        <td>{{$value->qty_gelar}}</td>
                        <td>{{$value->qty_potong}}</td>
                        <td>{{$value->terpakai}}</td>
                        <td>{{$value->tidak_terpakai}}</td>
                        <td>{{$value->keterangan}}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-{{$value->id}}"><i class="fas fa-edit"></i></button>
                            @include('production.cutting.product_costing.proses_gelar.partials.form-edit')
                            <a href="{{ route('gelar.delete', $value->id)}}" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-thead">
                    <?php 
                    $roll = collect($form->proses_gelar)->sum('qty_roll');
                    $gelar = collect($form->proses_gelar)->sum('qty_gelar');
                    $potong = collect($form->proses_gelar)->sum('qty_potong');
                    $terpakai = collect($form->proses_gelar)->sum('terpakai');
                    $tidak_terpakai = collect($form->proses_gelar)->sum('tidak_terpakai');
                    ?>
                    <tr>
                        <td class="fw-600" colspan="3">Total</td>
                        <td>{{$roll}}</td>
                        <td>{{$gelar}}</td>
                        <td>{{$potong}}</td>
                        <td>{{$terpakai}}</td>
                        <td>{{$tidak_terpakai}}</td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            </div>
        </div>
        <div class="row pb-4">
            <div class="col-12 flex mt-2">
            <button class="btn-add-column" data-toggle="modal" data-target="#modal-addNew">
                <i class="fs-18 fas fa-plus mr-2"></i>
                Add More Column 
            </button>
            </div>
        </div>
    </div>
</div>
@endif
