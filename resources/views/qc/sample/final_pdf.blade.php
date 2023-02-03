<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
table, td, th {
border: 1px solid black;
color:black;
font-size:10;
text-align:center;
}
table {
  border-collapse: collapse;
}
    #box1{
      width:180px;
      height:180px;
      padding:10px;
      border: 2px solid grey;
      background:white;
    }
    #tabel{
      width:100%;
      height: auto;
      padding:10px;
      border: 2px solid grey;
      background:white;
    }
    #tab{
      width:100%;
      height: auto;
      border: 1px solid grey;
      background:white;
    }
    #tbl{
      width:100%;
      height: 200px;
      border: 1px solid grey;
      background:white;
    }
    input[type=text] {
      width: 100%;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid black;
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
    border-left: 1px solid black;
    border-right: 1px solid black;
}

.div3 {
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
    font-size:18px;
}
.desc{
    padding-left:15px;
    font-weight: bold;
    text-align:left;
    font-size:16px;
}
.dit {
width: 180px;
padding: 3px;
border: 1px solid black;
margin: 0;
}

input[type="radio"] {
  display: inline;
  margin-bottom: 0px; }
label > .label-body {
  margin-left: .5rem;
  font-weight: normal; 
}

.tables { display: table; width: 100%;}
.tables-row { display: table-row; }
.tables-cell { display: table-cell; padding: 1em; }
.page_break { page-break-before: always; }
html {
  margin: 20px !important;
  padding: 0 !important;
}
.marginMin {
  margin-bottom: -24px;
}
</style>
</head>
  <body> 
    <div class="div1 col-lg-12">
      <div class="container judul">
          SAMPLE QUALITY REPORT<br>PT GISTEX GARMENT INDONESIA
      </div>
    </div>
    <div class="div2 col-lg-12">
      <div class="tables marginMin">
        <div class="tables-row">
          <div class="tables-cell">
            <center><font color="black" size="0.9em">BUYER :</font></center>
            <center><font color="black" size="0.72em"><input type="text" style="width: 12em;" value="{{$data->buyer}}" disabled ></font></center>
          </div>
          <div class="tables-cell">
            <center><font color="black" size="0.9em">STYLE : </font></center>
            <center><font color="black" size="0.72em"><input type="text" style="width: 12em;" value="{{$data->style}}" disabled ></font></center>
          </div>
          <div class="tables-cell">
            <center><font color="black" size="0.9em">STATUS : </font></center>
            <center><font color="black" size="0.72em"><input type="text" style="width: 12em;" value="{{$data->status}}" disabled ></font></center>
          </div>
          <div class="tables-cell">
            <center><font color="black" size="0.9em">DATE : </font></center>
            <center><font color="black" size="0.72em"><input type="text" style="width: 12em;" value="{{$data->date}}" disabled ></font></center>
          </div>
        </div>
      </div>
    </div>
    <div class="div2 col-lg-12">
      <div class="tables marginMin">
        <div class="tables-row">
          <div class="tables-cell">
            <div class="container">
              <div class="container" style="padding-bottom:3px;">
                <font color="black" size="0.9em">FABRIC QUALITY</font>
              </div>
              <div class="container">
                <table style="width:100%">
                  <tr>
                    <td rowspan="2">NO</td>
                    <td rowspan="2" style="width:35%;">DESCRIPTION</td> 
                    <td colspan="2" style="width:35%;">CONDITION</td>
                    <td rowspan="2" style="width:30%;">REMARK</td>
                  </tr>
                  <tr>
                    <td>OK</td>
                    <td>NO</td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td style="text-align:left;padding-left:5px;">HANDFEEL</td>
                    <td><input type="radio" id="radioPrimary1" value="1" {{ ($data->fabric_quality->handfeel == 1 && $data->fabric_quality->handfeel != null) ? "checked" : "" }} disabled></td>
                    <td><input type="radio" id="radioPrimary2" value="0" {{ ($data->fabric_quality->handfeel == 0 && $data->fabric_quality->handfeel != null) ? "checked" : "" }} disabled></td>
                    <td>{{$data->fabric_quality->h_remark}}</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td style="text-align:left;padding-left:5px;">MATERIAL QUALITY</td>
                    <td><input type="radio" id="radioPrimary3" value="1" {{ ($data->fabric_quality->material_quality == 1 && $data->fabric_quality->material_quality != null) ? "checked" : "" }} disabled></td>
                    <td><input type="radio" id="radioPrimary4" value="0" {{ ($data->fabric_quality->material_quality == 0 && $data->fabric_quality->material_quality != null) ? "checked" : "" }} disabled></td>
                    <td>{{$data->fabric_quality->mq_remark}}</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td style="text-align:left;padding-left:5px;">MOTIF / COLOR</td>
                    <td><input type="radio" id="radioPrimary5" value="1" {{ ($data->fabric_quality->motif == 1 && $data->fabric_quality->motif != null) ? "checked" : "" }} disabled></td>
                    <td><input type="radio" id="radioPrimary6" value="0" {{ ($data->fabric_quality->motif == 0 && $data->fabric_quality->motif != null) ? "checked" : "" }} disabled></td>
                    <td>{{$data->fabric_quality->motif_remark}}</td>
                  </tr>
                  <tr>
                    <td rowspan="2">4</td>
                    <td rowspan="2" style="text-align:left;padding-left:5px;">WEIGHT</td>
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
          </div>
          <div class="tables-cell">
            <div class="container">
              <div class="container" style="padding-bottom:3px;">
                <font color="black" size="0.9em">RESULT</font>
              </div>
              <div class="container div1">
                <table style="width:100%">
                  <tr>
                    <th>OK</th>
                    <th>FAIL</th>
                  </tr>
                  <tr>
                    <td><input type="radio" id="radioPrimary7" value="1" {{ ($data->fabric_quality->result == 1 && $data->fabric_quality->result != null) ? "checked" : "" }} disabled></td>
                    <td><input type="radio" id="radioPrimary8" value="0" {{ ($data->fabric_quality->result == 0 && $data->fabric_quality->result != null) ? "checked" : "" }} disabled></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="container">
              <div class="container" style="padding-bottom:3px;padding-top:3px;">
                <font color="black" size="0.9em">COMMENT RESULT</font>
              </div>
              <div class="container div1">
                <textarea class="form-control" rows="3" placeholder="Insert Comment Result" disabled>{{$data->fabric_quality->comment_result}}</textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php 
      $cek_color = collect($data->color)->count('id');
      $semua_cell = collect($data->color)->sum('pack');
    ?>
    <div class="div2 col-lg-12">
      <div class="tables marginMin">
        <div class="tables-row">
          <div class="tables-cell">
            <div class="container" style="padding-bottom:3px;">
              <font color="black" size="0.9em">MEASUREMENT</font>
            </div>
            <div class="container">
              <table style="width:100%">
                <tr>
                  <th rowspan="3" style="width:2%">NO</th>
                  <th rowspan="3" style="width:30%;">DESCRIPTION</th> 
                  <th rowspan="3" style="width:4%">TOL</th> 
                  <th rowspan="3" style="width:4%">SPEC</th> 
                  <th rowspan="3" style="width:4%">P/P</th> 
                  <th colspan="{{$semua_cell}}">{{$data->size}}</th>
                </tr>
                <tr style="text-align:center;">
                   @foreach($data->color as $key => $value)
                  <th colspan="{{$value->pack}}">{{$value->color}}</th>
                  @endforeach
                </tr>
                <tr style="text-align:center;">
                  @foreach($data->color as $key => $value)
                    @for($z=1; $z<=$value->pack; $z++)
                      <th  style="width:5%">{{$z}}</th>
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
                  <td> <img style="height:10px; width:10px;"  src="{{ public_path('ceklis_sample.png') }}"></td>
                  @endif
                  @endfor
                </tr>
                <?php $no++ ;?>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="div3 col-lg-12">
      <div class="tables">
        <div class="tables-row">
          <div class="tables-cell col-lg-8">
            <div class="container">
              <div class="container" style="padding-bottom:3px;">
                <font color="black" size="0.9em">WORKMANSHIP</font>
              </div>
              <div class="container" >
                <table style="width:100%">
                  <tr>
                    <td>NO</td>
                    <td>POSITION</td> 
                    <td>PROBLEM</td>
                    <td>REMARK</td>
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
          </div>
          <div class="tables-cell">
            <div class="container">
              <div class="container" style="padding-bottom:3px;">
                <font color="black" size="0.9em">FITTING</font>
              </div>
              <div class="container div1">
                <table style="width:100%">
                  <tr>
                    <th>GOOD</th>
                    <th>FAIR</th>
                    <th>BAD</th>
                  </tr>
                  <tr>
                    <td><input type="radio" id="radioPrimary9" name="fitting" value="1" {{ ($data->workmanship->fitting == 1 && $data->workmanship->fitting != null) ? "checked" : "" }} disabled></td>
                    <td><input type="radio" id="radioPrimary10" name="fitting" value="2" {{ ($data->workmanship->fitting == 2 && $data->workmanship->fitting != null) ? "checked" : "" }} disabled></td>
                    <td><input type="radio" id="radioPrimary11" name="fitting" value="3" {{ ($data->workmanship->fitting == 3 && $data->workmanship->fitting != null) ? "checked" : "" }} disabled></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="container">
              <div class="container" style="padding-bottom:3px;padding-top:3px;">
                <font color="black" size="0.9em">COMMENT</font>
              </div>
              <div class="container div1">
                <textarea class="form-control" rows="3" name="fitting_comment" id="fitting_comment" placeholder="Insert Comment Fitting" name="fitting_comment" id="fitting_comment">{{$data->workmanship->fitting_comment}}</textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="tables" style="text-align:center;">
        <div class="tables-row">
            <div class="tables-cell">
                <div class="container">
                  <font color="black" size="0.9em">CHECKED BY ( QC SPL)</font>
                </div>
            </div>
            <div class="tables-cell">
                <div class="container">
                  <font color="black" size="0.9em">KNOWN BY ( SPL DEPT )</font>
                </div>
            </div>
            <div class="tables-cell">
                <div class="container">
                  <font color="black" size="0.9em">APPROVED BY ( SPV QC )</font>
                </div>
            </div>
        </div>
    </div>
    <div class="tables" style="text-align:center;">
        <div class="tables-row">
            <div class="tables-cell">
                <div class="container">
                  @if($data->spl_name != null)
                  <img style="height:25px; width:25px;"  src="{{ public_path('ckls.png') }}"><br>
                  <font color="black" size="0.9em">( {{ $data->spl_name}} )</font>
                  @endif
                </div>
            </div>
            <div class="tables-cell">
                <div class="container">
                  @if($data->dept_name != null)
                  <img style="height:25px; width:25px;"  src="{{ public_path('ckls.png') }}"><br>
                  <font color="black" size="0.9em">( {{ $data->dept_name}} )</font>
                  @endif
                </div>
            </div>
            <div class="tables-cell">
                <div class="container">
                  @if($data->spv_name != null)
                  <img style="height:25px; width:25px;"  src="{{ public_path('ckls.png') }}"><br>
                  <font color="black" size="0.9em">( {{$data->spv_name}} )</font>
                  @endif
                </div>
            </div>
        </div>
    </div>
    <div class="page_break"></div>
    @if($data->file != null)
    <div class="tables">
      <div class="tables-row">
          <div class="tables-cell">
              <center><img class="span12" style="height:490px;width:690px" src="{{ public_path('/qc/sample/images/'.$data->file) }}"> </center>
          </div>
      </div>
    </div>
    @endif
    @if($data->file2 != null)
    <div class="tables">
      <div class="tables-row">
          <div class="tables-cell">
              <center><img class="span12" style="height:490px;width:690px" src="{{ public_path('/qc/sample/images/'.$data->file2) }}"> </center>
          </div>
      </div>
    </div>
    @endif
    <div class="page_break"></div>
    @if($data->file3 != null)
    <div class="tables">
      <div class="tables-row">
          <div class="tables-cell">
              <center><img class="span12" style="height:490px;width:690px" src="{{ public_path('/qc/sample/images/'.$data->file3) }}"> </center>
          </div>
      </div>
    </div>
    @endif
    @if($data->file4 != null)
    <div class="tables">
      <div class="tables-row">
          <div class="tables-cell">
              <center><img class="span12" style="height:490px;width:690px" src="{{ public_path('/qc/sample/images/'.$data->file4) }}"> </center>
          </div>
      </div>
    </div>
    @endif
  </body>
</html>