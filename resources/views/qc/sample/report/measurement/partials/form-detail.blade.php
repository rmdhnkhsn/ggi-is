
<div class="container col-lg-12">
    <label for="fq">MEASUREMENT STANDAR</label>
    <table class="table table-bordered">
        <tr style="text-align:center;">
            <th><input type="text" id="desc_1" name="desc_1" value="{{$data->measure_standar->desc_1}}" style="width:3em;"disabled></th>
            <th><input type="text" id="desc_2" name="desc_2" value="{{$data->measure_standar->desc_2}}" style="width:3em;"disabled></th>
            <th><input type="text" id="desc_3" name="desc_3" value="{{$data->measure_standar->desc_3}}" style="width:3em;"disabled></th>
            <th><input type="text" id="desc_4" name="desc_4" value="{{$data->measure_standar->desc_4}}" style="width:3em;"disabled></th>
            <th><input type="text" id="desc_5" name="desc_5" value="{{$data->measure_standar->desc_5}}" style="width:3em;"disabled></th>
            <th><input type="text" id="desc_6" name="desc_6" value="{{$data->measure_standar->desc_6}}" style="width:3em;"disabled></th>
            <th><input type="text" id="desc_7" name="desc_7" value="{{$data->measure_standar->desc_7}}" style="width:3em;"disabled></th>
            <th><input type="text" id="desc_8" name="desc_8" value="{{$data->measure_standar->desc_8}}" style="width:3em;"disabled></th>
            <th><input type="text" id="desc_9" name="desc_9" value="{{$data->measure_standar->desc_9}}" style="width:3em;"disabled></th>
            <th><input type="text" id="desc_10" name="desc_10" value="{{$data->measure_standar->desc_10}}" style="width:3em;" disabled></th>
            <th><input type="text" id="desc_11" name="desc_11" value="{{$data->measure_standar->desc_11}}" style="width:3em;" disabled></th>
            <th><input type="text" id="desc_12" name="desc_12" value="{{$data->measure_standar->desc_12}}" style="width:3em;" disabled></th>
            <th><input type="text" id="desc_13" name="desc_13" value="{{$data->measure_standar->desc_13}}" style="width:3em;" disabled></th>
            <th><input type="text" id="desc_14" name="desc_14" value="{{$data->measure_standar->desc_14}}" style="width:3em;" disabled></th>
            <th><input type="text" id="desc_15" name="desc_15" value="{{$data->measure_standar->desc_15}}" style="width:3em;" disabled></th>
        </tr>
        <tr style="text-align:center;">
            <th><input type="text" id="desc_16" name="desc_16" value="{{$data->measure_standar->desc_16}}" style="width:3em;" disabled></th>
            <th><input type="text" id="desc_17" name="desc_17" value="{{$data->measure_standar->desc_17}}" style="width:3em;" disabled></th>
            <th><input type="text" id="desc_18" name="desc_18" value="{{$data->measure_standar->desc_18}}" style="width:3em;" disabled></th>
            <th><input type="text" id="desc_19" name="desc_19" value="{{$data->measure_standar->desc_19}}" style="width:3em;" disabled></th>
            <th><input type="text" id="desc_20" name="desc_20" value="{{$data->measure_standar->desc_20}}" style="width:3em;" disabled></th>
            <th><input type="text" id="desc_21" name="desc_21" value="{{$data->measure_standar->desc_21}}" style="width:3em;" disabled></th>
            <th><input type="text" id="desc_22" name="desc_22" value="{{$data->measure_standar->desc_22}}" style="width:3em;" disabled></th>
            <th><input type="text" id="desc_23" name="desc_23" value="{{$data->measure_standar->desc_23}}" style="width:3em;" disabled></th>
            <th><input type="text" id="desc_24" name="desc_24" value="{{$data->measure_standar->desc_24}}" style="width:3em;" disabled></th>
            <th><input type="text" id="desc_25" name="desc_25" value="{{$data->measure_standar->desc_25}}" style="width:3em;" disabled></th>
            <th><input type="text" id="desc_26" name="desc_26" value="{{$data->measure_standar->desc_26}}" style="width:3em;" disabled></th>
            <th><input type="text" id="desc_27" name="desc_27" value="{{$data->measure_standar->desc_27}}" style="width:3em;" disabled></th>
            <th><input type="text" id="desc_28" name="desc_28" value="{{$data->measure_standar->desc_28}}" style="width:3em;" disabled></th>
            <th><input type="text" id="desc_29" name="desc_29" value="{{$data->measure_standar->desc_29}}" style="width:3em;" disabled></th>
            <th><input type="text" id="desc_30" name="desc_30" value="{{$data->measure_standar->desc_30}}" style="width:3em;" disabled></th>
        </tr>
    </table>
    <div class="row">
        <div class="col-lg-3 col-3">
            <a href="{{ route('mea.edit', $data->measure_standar->id)}}" class="btn btn-block btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
        </div>
        @if($data->mea_detail == 0)
        <div class="col-lg-3 col-3">
            <a href="{{ route('mea.delete', $data->measure_standar->id)}}" class="btn btn-block btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
        </div>
        @endif
        <div class="col-lg-3 col-3"></div>
    </div>
</div>

