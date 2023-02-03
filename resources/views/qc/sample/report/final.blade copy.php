@include('qc.sample.layouts.header')
@include('qc.sample.layouts.navbar')
<style>
table, td, th {
    height: auto;
    border: 1px solid black;
    text-align:center;
    font-size:13px;
    padding:5px;
}
table {
    border-collapse: collapse;
}
.div1 {
    width: auto;
    height: auto;  
    padding: 5px;
    border: 1px solid black;
}
.div2 {
    width: auto;
    height: auto;  
    padding: 5px;
    border-bottom: 1px solid black;
    border-left: 1px solid black;
    border-right: 1px solid black;
}
.judul{
    font-weight: bold;
    text-align:center;
    font-size:20px;
}
.desc{
    padding-left:15px;
    font-weight: bold;
    text-align:left;
    font-size:16px;
}
</style>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                @include('qc.sample.layouts.stepbar')
                            </div>
                            <div class="card-body">
                                <div class="div1 col-lg-12">
                                    <div class="container judul">
                                        SAMPLE QUALITY REPORT<br>PT GISTEX GARMENT INDONESIA
                                    </div>
                                </div>
                                <div class="div2 col-lg-12">
                                    <div class="row">
                                        <div class="desc col-lg-3 col-6">
                                            BUYER : {{$data->buyer}}
                                        </div>
                                        <div class="desc col-lg-3 col-6">
                                            STYLE : {{$data->style}}
                                        </div>
                                        <div class="desc col-lg-3 col-6">
                                            STATUS : {{$data->status}}
                                        </div>
                                        <div class="desc col-lg-3 col-6">
                                            DATE : {{$data->date}}
                                        </div>
                                    </div>
                                </div>
                                <div class="div2 col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="container">
                                                <label for="fq">FABRIC QUALITY</label>
                                                <table>
                                                    <tr>
                                                        <th rowspan="2">NO</th>
                                                        <th rowspan="2" style="width:30%;">DESCRIPTION</th> 
                                                        <th colspan="2" style="width:20%;">CONDITION</th>
                                                        <th rowspan="2" style="width:50%;">REMARK</th>
                                                    </tr>
                                                    <tr>
                                                        <th>OK</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td style="text-align:left;">HANDFEEL</td>
                                                        <td><input type="radio" id="radioPrimary1" value="1" {{ ($data->fabric_quality->handfeel == 1 && $data->fabric_quality->handfeel != null) ? "checked" : "" }} disabled></td>
                                                        <td><input type="radio" id="radioPrimary2" value="0" {{ ($data->fabric_quality->handfeel == 0 && $data->fabric_quality->handfeel != null) ? "checked" : "" }} disabled></td>
                                                        <td>{{$data->fabric_quality->h_remark}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td style="text-align:left;">MATERIAL QUALITY</td>
                                                        <td><input type="radio" id="radioPrimary3" value="1" {{ ($data->fabric_quality->material_quality == 1 && $data->fabric_quality->material_quality != null) ? "checked" : "" }} disabled></td>
                                                        <td><input type="radio" id="radioPrimary4" value="0" {{ ($data->fabric_quality->material_quality == 0 && $data->fabric_quality->material_quality != null) ? "checked" : "" }} disabled></td>
                                                        <td>{{$data->fabric_quality->mq_remark}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td style="text-align:left;">MOTIF / COLOR</td>
                                                        <td><input type="radio" id="radioPrimary5" value="1" {{ ($data->fabric_quality->motif == 1 && $data->fabric_quality->motif != null) ? "checked" : "" }} disabled></td>
                                                        <td><input type="radio" id="radioPrimary6" value="0" {{ ($data->fabric_quality->motif == 0 && $data->fabric_quality->motif != null) ? "checked" : "" }} disabled></td>
                                                        <td>{{$data->fabric_quality->motif_remark}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="2">4</td>
                                                        <td rowspan="2" style="text-align:left;">WEIGHT</td>
                                                        <td>TARGET</td>
                                                        <td>{{$data->fabric_quality->target}}</td>
                                                        <td rowspan="2">{{$data->fabric_quality->weight_remark}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>ACTUAL</td>
                                                        <td>{{$data->fabric_quality->actual}}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="container">
                                                <label for="result">RESULT</label>
                                                <table style="width:100%;">
                                                    <tr>
                                                        <th>OK</th>
                                                        <th>FAIL</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="radio" id="radioPrimary7" value="1" {{ ($data->fabric_quality->result == 1 && $data->fabric_quality->result != null) ? "checked" : "" }} disabled></td>
                                                        <td><input type="radio" id="radioPrimary7" value="0" {{ ($data->fabric_quality->result == 0 && $data->fabric_quality->result != null) ? "checked" : "" }} disabled></td>
                                                    </tr>
                                                </table>
                                            </div><br>
                                            <div class="container">
                                                <label for="result">COMMENT RESULT</label>
                                                <textarea class="form-control" rows="3" placeholder="Insert Comment Result" disabled>{{$data->fabric_quality->comment_result}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="div2 col-lg-12" style="padding-right:50px;">
                                    <div class="container" style="overflow:auto;">
                                        <label for="fq">MEASUREMENT</label>
                                        <table>
                                            <tr>
                                                <th style="width:2%">NO</th>
                                                <th style="width:10%">DESCRIPTION</th> 
                                                <th style="width:4%">{{$data->measure_standar->desc_1}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_2}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_3}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_4}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_5}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_6}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_7}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_8}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_9}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_10}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_11}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_12}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_14}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_14}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_15}}</th>
                                            </tr>
                                            <?php $no=1;?>
                                            @foreach($data->measure_detail as $dt)
                                            <tr>
                                                <td scope="row">{{ $no }}</td>
                                                <td>{{$dt['description']}}</td>
                                                <td>{{$dt['a1']}}</td>
                                                <td>{{$dt['a2']}}</td>
                                                <td>{{$dt['a3']}}</td>
                                                <td>{{$dt['a4']}}</td>
                                                <td>{{$dt['a5']}}</td>
                                                <td>{{$dt['a6']}}</td>
                                                <td>{{$dt['a7']}}</td>
                                                <td>{{$dt['a8']}}</td>
                                                <td>{{$dt['a9']}}</td>
                                                <td>{{$dt['a10']}}</td>
                                                <td>{{$dt['a11']}}</td>
                                                <td>{{$dt['a12']}}</td>
                                                <td>{{$dt['a13']}}</td>
                                                <td>{{$dt['a14']}}</td>
                                                <td>{{$dt['a15']}}</td>
                                            </tr>
                                            <?php $no++ ;?>
                                            @endforeach
                                        </table>
                                        <br>
                                        @if($data->measure_standar->desc_16 != null || $data->measure_standar->desc_17 != null ||
                                        $data->measure_standar->desc_18 != null || $data->measure_standar->desc_19 != null || $data->measure_standar->desc_20 != null ||
                                        $data->measure_standar->desc_21 != null || $data->measure_standar->desc_22 != null || $data->measure_standar->desc_23 != null || $data->measure_standar->desc_24 != null
                                        || $data->measure_standar->desc_25 != null || $data->measure_standar->desc_26 != null || $data->measure_standar->desc_27 != null || $data->measure_standar->desc_28 != null
                                        || $data->measure_standar->desc_29 != null || $data->measure_standar->desc_30 != null)
                                        <table>
                                            <tr>
                                                <th style="width:2%">NO</th>
                                                <th style="width:10%">DESCRIPTION</th> 
                                                <th style="width:4%">{{$data->measure_standar->desc_16}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_17}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_18}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_19}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_20}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_21}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_22}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_23}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_24}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_25}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_26}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_27}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_28}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_29}}</th>
                                                <th style="width:4%">{{$data->measure_standar->desc_30}}</th>
                                            </tr>
                                            <?php $no=1;?>
                                            @foreach($data->measure_detail as $dt)
                                            <tr>
                                                <td scope="row">{{ $no }}</td>
                                                <td>{{$dt['description']}}</td>
                                                <td>{{$dt['a16']}}</td>
                                                <td>{{$dt['a17']}}</td>
                                                <td>{{$dt['a18']}}</td>
                                                <td>{{$dt['a19']}}</td>
                                                <td>{{$dt['a20']}}</td>
                                                <td>{{$dt['a21']}}</td>
                                                <td>{{$dt['a22']}}</td>
                                                <td>{{$dt['a23']}}</td>
                                                <td>{{$dt['a24']}}</td>
                                                <td>{{$dt['a25']}}</td>
                                                <td>{{$dt['a26']}}</td>
                                                <td>{{$dt['a27']}}</td>
                                                <td>{{$dt['a28']}}</td>
                                                <td>{{$dt['a29']}}</td>
                                                <td>{{$dt['a30']}}</td>
                                            </tr>
                                            <?php $no++ ;?>
                                            @endforeach
                                        </table>
                                        @endif
                                    </div>
                                </div>
                                <div class="div2 col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="container">
                                                <label for="fq">WORKMANSHIP</label>
                                                <table>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th style="width:30%;">POSITION</th> 
                                                        <th style="width:20%;">PROBLEM</th>
                                                        <th style="width:50%;">REMARK</th>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>{{$data->workmanship->position_1}}</td>
                                                        <td>{{$data->workmanship->problem_1}}</td>
                                                        <td>{{$data->workmanship->remark_1}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>{{$data->workmanship->position_2}}</td>
                                                        <td>{{$data->workmanship->problem_2}}</td>
                                                        <td>{{$data->workmanship->remark_2}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>{{$data->workmanship->position_3}}</td>
                                                        <td>{{$data->workmanship->problem_3}}</td>
                                                        <td>{{$data->workmanship->remark_3}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>{{$data->workmanship->position_4}}</td>
                                                        <td>{{$data->workmanship->problem_4}}</td>
                                                        <td>{{$data->workmanship->remark_4}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>{{$data->workmanship->position_5}}</td>
                                                        <td>{{$data->workmanship->problem_5}}</td>
                                                        <td>{{$data->workmanship->remark_5}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>{{$data->workmanship->position_6}}</td>
                                                        <td>{{$data->workmanship->problem_6}}</td>
                                                        <td>{{$data->workmanship->remark_6}}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="container">
                                                <label for="fq"> FITTING </label>
                                                <div class="container">
                                                    <div>
                                                        <input type="radio" id="radioPrimary7" name="fitting" value="1" {{ ($data->workmanship->fitting == 1  && $data->workmanship->fitting != null) ? "checked" : "" }} disabled>
                                                        <label for="radioPrimary7">GOOD</label>
                                                    </div>
                                                    <div>
                                                        <input type="radio" id="radioPrimary8" name="fitting" value="2" {{ ($data->workmanship->fitting == 2 && $data->workmanship->fitting != null) ? "checked" : "" }} disabled>
                                                        <label for="radioPrimary8">FAIR</label>
                                                    </div>
                                                    <div>
                                                        <input type="radio" id="radioPrimary9" name="fitting" value="3" {{ ($data->workmanship->fitting == 3 && $data->workmanship->fitting != null) ? "checked" : "" }} disabled>
                                                        <label for="radioPrimary9">BAD</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <label for="fq"> COMMENT</label>
                                                <textarea class="form-control" rows="3" name="fitting_comment" id="fitting_comment" placeholder="Insert Comment Fitting" name="fitting_comment" id="fitting_comment" readonly>{{$data->workmanship->fitting_comment}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>
<!-- /.Content Wrapper. Contains page content -->
@include('qc.sample.layouts.footer')
