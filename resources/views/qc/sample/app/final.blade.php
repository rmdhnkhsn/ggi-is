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
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-lg-1 col-4">
                        <a href="{{ url()->previous() }}" type="button" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-circle-left"></i>  Back</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
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
                                                        <td>
                                                            <div class="icheck-primary d-inline">
                                                                <input type="radio" id="radioPrimary1" name="handfeel" value="1" {{ ($data->fabric_quality->handfeel == 1 && $data->fabric_quality->handfeel != null) ? "checked" : "" }} disabled>
                                                                <label for="radioPrimary1"></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="icheck-primary d-inline">
                                                                <input type="radio" id="radioPrimary2" value="0" {{ ($data->fabric_quality->handfeel == 0 && $data->fabric_quality->handfeel != null) ? "checked" : "" }} disabled>
                                                                <label for="radioPrimary2"></label>
                                                            </div>
                                                        </td>
                                                        <td>{{$data->fabric_quality->h_remark}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td style="text-align:left;">MATERIAL QUALITY</td>
                                                        <td>
                                                            <div class="icheck-primary d-inline">
                                                                <input type="radio" id="radioPrimary3" value="1" {{ ($data->fabric_quality->material_quality == 1 && $data->fabric_quality->material_quality != null) ? "checked" : "" }} disabled>
                                                                <label for="radioPrimary3"></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="icheck-primary d-inline">
                                                                <input type="radio" id="radioPrimary4" value="0" {{ ($data->fabric_quality->material_quality == 0 && $data->fabric_quality->material_quality != null) ? "checked" : "" }} disabled>
                                                                <label for="radioPrimary4"></label>
                                                            </div>
                                                        </td>
                                                        <td>{{$data->fabric_quality->mq_remark}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td style="text-align:left;">MOTIF / COLOR</td>
                                                        <td>
                                                            <div class="icheck-primary d-inline">
                                                                <input type="radio" id="radioPrimary5" value="1" {{ ($data->fabric_quality->motif == 1 && $data->fabric_quality->motif != null) ? "checked" : "" }} disabled>
                                                                <label for="radioPrimary5"></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="icheck-primary d-inline">
                                                                <input type="radio" id="radioPrimary6" value="0" {{ ($data->fabric_quality->motif == 0 && $data->fabric_quality->motif != null) ? "checked" : "" }} disabled>
                                                                <label for="radioPrimary6"></label>
                                                            </div>
                                                        </td>
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
                                <?php 
                                    $cek_color = collect($data->color)->count('id');
                                    $semua_cell = collect($data->color)->sum('pack');
                                ?>
                                <div class="div2 col-lg-12">
                                    <div class="px-2" style="overflow:auto;">
                                        <label for="fq">MEASUREMENT</label>
                                        <table width="100%">
                                            <tr>
                                                <th rowspan="3" style="width:2%">NO</th>
                                                <th rowspan="3" style="width:30%;">DESCRIPTION</th> 
                                                <th rowspan="3" style="width:4%">TOL</th> 
                                                <th rowspan="3" style="width:4%">SPEC</th> 
                                                <th rowspan="3" style="width:4%">P/P</th> 
                                                <th colspan="{{$semua_cell}}" style="width:40%">{{$data->size}}</th> 
                                            </tr>
                                            <tr>
                                                @foreach($data->color as $key => $value)
                                                <th colspan="{{$value->pack}}">{{$value->color}}</th>
                                                @endforeach
                                            </tr>
                                            <tr style="text-align:center;">
                                                @foreach($data->color as $key => $value)
                                                    @for($z=1; $z<=$value->pack; $z++)
                                                        <th style="width:5%">{{$z}}</th>
                                                    @endfor
                                                @endforeach
                                            </tr>
                                            <?php $no=1;?>
                                            @foreach($data->measurement as $key => $value)
                                            <tr style="text-align:center">
                                                <td scope="row">{{ $no }}</td>
                                                <td style="text-align:left;">{{ $value->description }}</td>
                                                <td>{{ $value->tol }}</td>
                                                <td>{{ $value->spec }}</td>
                                                <td>{{ $value->pp }}</td>
                                                @for($i=1; $i<=$semua_cell; $i++)
                                                <?php
                                                    $note = "note".$i; 
                                                    $test = $value->$note;
                                                    if ($test == null) {
                                                        $barcode = null;
                                                    }else {
                                                        $barcode = $test;
                                                    }
                                                ?>
                                                @if($barcode != null)
                                                <td>{{$barcode}}</td>
                                                @else
                                                <td><i class="fas fa-check"></i></td>
                                                @endif
                                                @endfor
                                            </tr>
                                            <?php $no++ ;?>
                                            @endforeach
                                        </table>
                                        <br>
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
                                                    <div class="icheck-primary">
                                                        <input type="radio" id="radioPrimary17" name="fitting" value="1" {{ ($data->workmanship->fitting == 1  && $data->workmanship->fitting != null) ? "checked" : "" }} disabled>
                                                        <label for="radioPrimary17">GOOD</label>
                                                    </div>
                                                    <div class="icheck-primary">
                                                        <input type="radio" id="radioPrimary18" name="fitting" value="2" {{ ($data->workmanship->fitting == 2 && $data->workmanship->fitting != null) ? "checked" : "" }} disabled>
                                                        <label for="radioPrimary18">FAIR</label>
                                                    </div>
                                                    <div class="icheck-primary">
                                                        <input type="radio" id="radioPrimary19" name="fitting" value="3" {{ ($data->workmanship->fitting == 3 && $data->workmanship->fitting != null) ? "checked" : "" }} disabled>
                                                        <label for="radioPrimary19">BAD</label>
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
