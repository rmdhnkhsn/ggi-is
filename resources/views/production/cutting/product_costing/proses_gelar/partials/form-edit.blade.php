<div class="modal fade" id="modal-edit-{{$value->id}}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <form action="{{route('form.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="cards-scroll scrollX" id="scroll-bar">
                            <table id="table_edit" class="table gelar-tbl-content table-bordered no-wrap">
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
                                        <select class="dropdown-select" id="no_wo" name="no_wo" required="required">
                                            <option selected></option>
                                            @foreach($dataWO as $key2 => $value2)
                                                <option {{ $value->no_wo == $key2 ? 'selected' : ''}} value="{{$key2}}">{{$key2}}</option>
                                            @endforeach
                                        </select>
                                        </td>
                                        <td>
                                        <div class="input-group">
                                            <input type="hidden" class="form-control border-input" id="id" name="id" value="{{$value->id}}" placeholder="">
                                            <input type="hidden" class="form-control border-input" id="form_id" name="form_id" value="{{$value->form_id}}" placeholder="">
                                            <input type="text" class="form-control border-input" id="no_roll" name="no_roll" value="{{$value->no_roll}}" placeholder="">
                                        </div>
                                        </td>
                                        <td>
                                        <select class="dropdown-select" id="color" name="color" required="required">
                                            <option selected></option>
                                            @foreach($color as $key2 => $value2)
                                                <option {{ $value->color == $key2 ? 'selected' : ''}} value="{{$key2}}">{{$key2}}</option>
                                            @endforeach
                                        </select>
                                        </td>
                                        <td>
                                        <div class="input-group">
                                            <input type="text" class="form-control border-input" id="qty_roll" name="qty_roll" value="{{$value->qty_roll}}" placeholder="">
                                        </div>
                                        </td>
                                        <td>
                                        <div class="input-group">
                                            <input type="text" class="form-control border-input" id="qty_gelar" name="qty_gelar" value="{{$value->qty_gelar}}" placeholder="">
                                        </div>
                                        </td>
                                        <td>
                                        <div class="input-group">
                                            <input type="text" class="form-control border-input" id="qty_potong" name="qty_potong" value="{{$value->qty_potong}}" placeholder="">
                                        </div>
                                        </td>
                                        <td>
                                        <div class="input-group">
                                            <input type="text" class="form-control border-input" id="terpakai" name="terpakai" value="{{$value->terpakai}}" placeholder="">
                                        </div>
                                        </td>
                                        <td>
                                        <div class="input-group">
                                            <input type="text" class="form-control border-input" id="tidak_terpakai" name="tidak_terpakai" value="{{$value->tidak_terpakai}}" placeholder="">
                                        </div>
                                        </td>
                                        <td>
                                        <div class="input-group">
                                            <input type="text" class="form-control border-input" id="keterangan" name="keterangan" value="{{$value->keterangan}}" placeholder="">
                                        </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-12 flex mt-2">
                            <button type="submit" class="btn-gelar-save ml-3">Save <i class="fs-18 ml-2 fas fa-download"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>