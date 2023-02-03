<?php 
$factory = "";
$start_date = "";
$finish_date = "";
if ($data != null) {
    $factory = $data->cutting_factory_id;
    $start_date = $data->start_date;
    $finish_date = $data->finish_date;
}
?>
    
<div class="row mt-3">
    <div class="col-12 mb-3">
        <span class="title-24">Detail WO</span>
    </div>
    <input type="hidden" name="no_wo" id="no_wo" value="{{$input['no_wo']}}">
    <input type="hidden" name="style" id="style" value="{{$input['style']}}">
    <input type="hidden" name="buyer" id="buyer" value="{{$input['buyer']}}">
    <input type="hidden" name="item_number" id="item_number" value="{{$input['item_number']}}">
    <input type="hidden" name="total_qty" id="total_qty" value="{{$input['total_qty']}}">
    <div class="col-12 text-left">
        <span class="title-sm">Select Factory</span>
        <div class="input-group mb-3 mt-2">
            <div class="input-group-prepend">
                <span class="input-group-select" for="F0101_ALPH">Factory</span>
            </div>
            <select class="form-control input-data-fa" id="factory" name="factory">
                <option  selected> </option>
                @foreach($address as $key => $value)
                <option {{ $factory == $value->id ? 'selected' : ''}} value="{{ $value->kode_jde }}">{{$value->nama_branch}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 text-left">
        <span class="title-sm">Start Date</span>
        <div class="input-group mb-3 mt-2">
            <div class="input-group date" id="start_date" data-target-input="nearest">
                <div class="input-group-append " data-target="#start_date" data-toggle="datetimepicker">
                    <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span><i class="ml-2 fas fa-caret-down"></i></div>
                </div>
                <input type="text" class="form-control datetimepicker-input input-data-fa" data-target="#start_date" value="{{$start_date}}" name="production_date"  placeholder="Pilih Tanggal" style="border-radius: 0 5px 5px 0;" required/>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 text-left">
        <span class="title-sm">Estimated Date Completed</span>
        <div class="input-group mb-3 mt-2">
            <div class="input-group date" id="estimate_date" data-target-input="nearest">
                <div class="input-group-append " data-target="#estimate_date" data-toggle="datetimepicker">
                    <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span><i class="ml-2 fas fa-caret-down"></i></div>
                </div>
                <input type="text" class="form-control datetimepicker-input input-data-fa" value="{{$finish_date}}" data-target="#estimate_date" name="estimation_complete"  placeholder="Pilih Tanggal" style="border-radius: 0 5px 5px 0;" required/>
            </div>
        </div>
    </div>
    <div class="col-12 text-left">
        <span class="title-sm">Component</span>
        <div class="input-group mb-3 mt-2">
            <select class="form-control input-data-fa" style="width:100%" id="multipleSelectExample" name="component[]" data-placeholder="Select an option" multiple="true" >
                @foreach($component as $key => $value)
                <option value="{{$value['item_number']}}|{{$value['seq']}}|{{$value['desc']}}|{{$value['status']}}|{{$value['remark']}}">{{$value['seq']}} - {{$value['desc']}} ({{$value['status']}})</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-12 text-right py-4">
        <button type="submit" class="btn pic-btn-save">Save<i class="ml-3 fs-20 fas fa-download"></i></button>
    </div>
</div>
