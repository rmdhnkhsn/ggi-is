@extends("qc.smqc.layouts.app")
@section("title","Report Fabric")
@push("styles")
<style>
	table, td, th {
  border: 1px solid black;
  }
  table {
    border-collapse: collapse;
    font
  }
			#box1{
				width:180px;
				height:180px;
                padding:10px;
                border: 2px solid grey;
				background:white;
			}
            #td{
                font-color:yellow;
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
      h7 {
        text-decoration: overline;
      }
      input[type=text] {
        width: 100%;
      box-sizing: border-box;
      border: none;
      border-bottom: 2px solid black;
}
</style>
@endpush

@push("sidebar")
    @include('qc.smqc.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">  
    <div class="row mt-3 pb-5">
      <div class="col-12">
        <div class="cards bg-card p-4">
          <div class="row">
            <div class="cards-scroll p-2 scrollX" id="scroll-bar">
              <form action="{{route('fir.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="id" class="span10" name="id" value="{{ $data->id }}">
                <input type="hidden" id="report_id" class="span10" name="report_id" value="{{ $data->report_id }}">
                <div class="col-lg-12">
                  <div class="form-group">
                      <label>Arrival Number</label>
                      <input type="text" class="form-control" id="an" name="an" placeholder="Insert Arrival Number" value="{{ $data->an }}" required>
                  </div>
                  <div class="form-group">
                      <label>Arrival Date</label>
                      <input type="date" class="form-control" id="ad" name="ad" placeholder="Insert Arrival Date" value="{{ $data->ad }}" required>
                  </div>
                  <div class="form-group">
                      <label>Mill</label>
                      <input type="text" class="form-control" id="mill" name="mill" placeholder="Insert Mill" value="{{ $data->mill }}" required>
                  </div>
                  <div class="form-group">
                      <label>Inspection Date</label>
                      <input type="text" class="form-control" id="ins_d" name="ins_d" placeholder="Insert Inspection Date" value="{{ $data->ins_d }}" required>
                  </div>
                  <div class="form-group">
                      <label>Style / Color / Buyer</label>
                      <input type="text" class="form-control" id="style" name="style" placeholder="Insert Style / Color / Buyer" value="{{ $data->style }}" required>
                  </div>
                  <div class="form-group">
                      <label>Content Design</label>
                      <input type="text" class="form-control" id="cd" name="cd" placeholder="Insert Context Design" value="{{$data->cd}}" required>
                  </div>
                  <div class="form-group">
                      <label>UM</label>
                      <div class="input-group mt-1 mb-3" style="gap:1.4rem">
                          <div class="justify-start">
                              <div class="radioContainer">
                                  <input type="radio" name="mu" id="kg" value="KG" class="radioCustomInputBlack" {{ ($data->mu == 'KG' ) ? "checked" : "" }}>
                                  <label for="kg" class="radioCustomBlack"></label>
                              </div>
                              <label for="kg" class="title-14 pointer ml-1" style="margin-top:6px">KG</label>
                          </div>
                          <div class="justify-start">
                              <div class="radioContainer">
                                  <input type="radio" name="mu" id="meter" value="Meter" class="radioCustomInputBlack" {{ ($data->mu == 'Meter' ) ? "checked" : "" }}>
                                  <label for="meter" class="radioCustomBlack"></label>
                              </div>
                              <label for="meter" class="title-14 pointer ml-1" style="margin-top:6px">Meter</label>
                          </div>
                          <div class="justify-start">
                              <div class="radioContainer">
                                  <input type="radio" name="mu" id="yard" value="Yard" class="radioCustomInputBlack" {{ ($data->mu == 'Yard' ) ? "checked" : "" }}>
                                  <label for="yard" class="radioCustomBlack"></label>
                              </div>
                              <label for="yard" class="title-14 pointer ml-1" style="margin-top:6px">Yard</label>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Test By</label>
                      <input type="text" class="form-control" id="tb" name="tb" placeholder="Insert Test By" value="{{ $data->tb }}" required>
                  </div>
                  <div class="form-group">
                      <label>Made By</label>
                      <input type="text" class="form-control" id="made_by" name="made_by" placeholder="Insert Made By" value="{{ $data->made_by }}" required>
                  </div>
                </div>
                <div class="col-lg-12">
                  <table style="width:1190px; height:80px; overflow:auto;">
                    <tr style="text-align:center;color:black;size:2;">  
                      <td rowspan="2">No</td>
                      <td rowspan="2">Inspection Property</td>
                      <td rowspan="2">Requirement / Tolerance</td>
                      <td colspan="7">Inspection Result</td>
                      <td rowspan="2"> Rating</td>
                    </tr> 
                    <tr style="text-align:center;color:black;size:2;">
                      <td>Total roll of arrival</td>
                      <td>Total</td>
                      <td>No. of Inspection Roll</td>
                      <td>Total</td>
                      <td>Average of Width</td>
                      <td>Point</td>
                      <td>Accepted Point</td>
                    </tr>
                    <!-- No 1 -->
                    <tr style="text-align:center;color:black;size:2;">
                      <td>1</td>
                      <td>Quality Fabric</td>
                      <td>Max Point 20/100 yard</td>
                      <td><input type="text" name="qf_tr" id="qf_tr" style="width: 7em;height:4em;" value="{{ $data->qf_tr }}"></td>
                      <td><input type="text" name="qf_ty_tr" id="qf_ty_tr" style="width: 5em;height:4em;" value="{{ $data->qf_ty_tr }}"></td>
                      <td><input type="text" name="qf_no_ir" id="qf_no_ir" style="width: 8em;height:4em;" value="{{ $data->qf_no_ir }}"></td>
                      <td><input type="text" name="qf_ty_no_ir" id="qf_ty_no_ir" style="width: 5em;height:4em;" value="{{ $data->qf_ty_no_ir }}" ></td>
                      <td><input type="text" name="qf_aow" id="qf_aow" style="width: 7em;height:4em;" value="{{ $data->qf_aow}}" ></td>
                      <td><input type="text" name="qf_point" id="qf_point" style="width: 4em;height:4em;" value="{{ $data->qf_point}}" ></td>
                      <td><input type="text" name="qf_ap" id="qf_ap" style="width: 7em;height:4em;" value="{{$data->qf_ap}}" ></td>
                      <td>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="qf_rat" id="qf-rat-p" value="P" class="radioCustomInputBlack" {{ ($data->qf_rat == 'P' ) ? "checked" : "" }}>
                            <label for="qf-rat-p" class="radioCustomBlack"></label>
                            <label for="qf-rat-p" class="title-14 data->qf_rater ml-1" style="margin-top:6px">P</label>
                          </div>
                        </div>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="qf_rat" id="qf-rat-f" value="F" class="radioCustomInputBlack" {{ ($data->qf_rat == 'F' ) ? "checked" : "" }}>
                            <label for="qf-rat-f" class="radioCustomBlack"></label>
                            <label for="qf-rat-f" class="title-14 pointer ml-1" style="margin-top:6px">F</label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr style="text-align:center;color:black;size:2;">
                      <td colspan="3"></td>
                      <td>Req</td>
                      <td>Actual</td>
                      <td>Diff</td>
                      <td>%</td>
                      <td colspan="4"></td>
                    </tr>
                    <!-- No 2  -->
                    <tr style="text-align:center;color:black;size:2;">
                      <td>2</td>
                      <td>Fabric Length</td>
                      <td>Meet with PO Mentioned</td>
                      <td><input type="text" name="fl_req" id="fl_req" style="width: 7em;height:4em;" value="{{$data->fl_req}}" ></td>
                      <td><input type="text" name="fl_ac" id="fl_ac" style="width: 5em;height:4em;" value="{{$data->fl_ac}}" ></td>
                      <td></td>
                      <td></td>
                      <td colspan="3"></td>
                      <td></td>
                    </tr>
                    <tr style="text-align:center;color:black;size:2;">
                      <td colspan="3"></td>
                      <td>Req</td>
                      <td>Actual</td>
                      <td>Diff</td>
                      <td>%</td>
                      <td colspan="4"></td>
                    </tr>
                    <!-- No 3 -->
                    <tr style="text-align:center;color:black;size:2;">
                      <td>3</td>
                      <td>Fabric Width</td>
                      <td>Mett with PO Mentioned</td>
                      <td><input type="text" name="fw_req" id="fw_req" style="width: 7em;height:4em;" value="{{ $data->fw_req }}"></td>
                      <td><input type="text" name="fw_ac" id="fw_ac" style="width: 5em;height:4em;" value="{{ $data->fw_ac }}"></td>
                      <td></td>
                      <td></td>
                      <td colspan="3"></td>
                      <td></td>
                    </tr>
                    <!-- No 4  -->
                    <tr style="text-align:center;color:black;size:2;">
                      <td>4</td>
                      <td>Shade Band</td>
                      <td>All Inspected Roll</td>
                      <td colspan="7"></td>
                      <td>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="sb_rat" id="sb-rat-p" value="P" class="radioCustomInputBlack" {{ ($data->sb_rat == 'P' ) ? "checked" : "" }}>
                            <label for="sb-rat-p" class="radioCustomBlack"></label>
                            <label for="sb-rat-p" class="title-14 pointer ml-1" style="margin-top:6px">P</label>
                          </div>
                        </div>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="sb_rat" id="sb-rat-f" value="F" class="radioCustomInputBlack" {{ ($data->sb_rat == 'F' ) ? "checked" : "" }}>
                            <label for="sb-rat-f" class="radioCustomBlack"></label>
                            <label for="sb-rat-f" class="title-14 pointer ml-1" style="margin-top:6px">F</label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <!-- No 5 -->
                    <tr style="text-align:center;color:black;size:2;">
                      <td>5</td>
                      <td>Odor Test</td>
                      <td>No Odor</td>
                      <td colspan="7"></td>
                      <td>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="sbt_rat" id="sbt-rat-p" value="P" class="radioCustomInputBlack" {{ ($data->sbt_rat == 'P' ) ? "checked" : "" }}>
                            <label for="sbt-rat-p" class="radioCustomBlack"></label>
                            <label for="sbt-rat-p" class="title-14 pointer ml-1" style="margin-top:6px">P</label>
                          </div>
                        </div>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="sbt_rat" id="sbt-rat-f" value="F" class="radioCustomInputBlack" {{ ($data->sbt_rat == 'F' ) ? "checked" : "" }}>
                            <label for="sbt-rat-f" class="radioCustomBlack"></label>
                            <label for="sbt-rat-f" class="title-14 pointer ml-1" style="margin-top:6px">F</label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <!-- No 6  -->
                    <tr style="text-align:center;color:black;size:2;">
                      <td>6</td>
                      <td>Color Check</td>
                      <td>Match with strike off at light box</td>
                      <td colspan="7"></td>
                      <td>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="cc_rat" id="cc-rat-p" value="P" class="radioCustomInputBlack" {{ ($data->cc_rat == 'P' ) ? "checked" : "" }}>
                            <label for="cc-rat-p" class="radioCustomBlack"></label>
                            <label for="cc-rat-p" class="title-14 pointer ml-1" style="margin-top:6px">P</label>
                          </div>
                        </div>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="cc_rat" id="cc-rat-f" value="F" class="radioCustomInputBlack" {{ ($data->cc_rat == 'F' ) ? "checked" : "" }}>
                            <label for="cc-rat-f" class="radioCustomBlack"></label>
                            <label for="cc-rat-f" class="title-14 pointer ml-1" style="margin-top:6px">F</label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <!-- No 7  -->
                    <tr style="text-align:center;color:black;size:2;">
                      <td>7</td>
                      <td colspan="2">Number of lot</td>
                      <td>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="nol" id="nol-1" value="1" class="radioCustomInputBlack" {{ ($data->nol == 1 ) ? "checked" : "" }}>
                            <label for="nol-1" class="radioCustomBlack"></label>
                            <label for="nol-1" class="title-14 pointer ml-1" style="margin-top:6px">1</label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="nol" id="nol-2" value="2" class="radioCustomInputBlack" {{ ($data->nol == 2 ) ? "checked" : "" }}>
                            <label for="nol-2" class="radioCustomBlack"></label>
                            <label for="nol-2" class="title-14 pointer ml-1" style="margin-top:6px">2</label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="nol" id="nol-3" value="3" class="radioCustomInputBlack" {{ ($data->nol == 3 ) ? "checked" : "" }}>
                            <label for="nol-3" class="radioCustomBlack"></label>
                            <label for="nol-3" class="title-14 pointer ml-1" style="margin-top:6px">3</label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="nol" id="nol-4" value="4" class="radioCustomInputBlack" {{ ($data->nol == 4 ) ? "checked" : "" }}>
                            <label for="nol-4" class="radioCustomBlack"></label>
                            <label for="nol-4" class="title-14 pointer ml-1" style="margin-top:6px">4</label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="nol" id="nol-5" value="5" class="radioCustomInputBlack" {{ ($data->nol == 5 ) ? "checked" : "" }}>
                            <label for="nol-5" class="radioCustomBlack"></label>
                            <label for="nol-5" class="title-14 pointer ml-1" style="margin-top:6px">5</label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="nol" id="nol-6" value="6" class="radioCustomInputBlack" {{ ($data->nol == 6 ) ? "checked" : "" }}>
                            <label for="nol-6" class="radioCustomBlack"></label>
                            <label for="nol-6" class="title-14 pointer ml-1" style="margin-top:6px">6</label>
                          </div>
                        </div>
                      </td>
                      <td><input type="text" name="nol_in" id="nol_in" style="width:7em;height:2em;" value="{{$data->nol_in}}"></td>
                      <td></td>
                    </tr>
                    <tr style="text-align:center;color:black;size:2;">
                      <td>8</td>
                      <td colspan="2" >Handfell</td>
                      <td colspan="7"></td>
                      <td>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="h_rat" id="h-rat-p" value="P" class="radioCustomInputBlack" {{ ($data->h_rat == 'P' ) ? "checked" : "" }}>
                            <label for="h-rat-p" class="radioCustomBlack"></label>
                            <label for="h-rat-p" class="title-14 pointer ml-1" style="margin-top:6px">P</label>
                          </div>
                        </div>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="h_rat" id="h-rat-f" value="F" class="radioCustomInputBlack" {{ ($data->h_rat == 'F' ) ? "checked" : "" }}>
                            <label for="h-rat-f" class="radioCustomBlack"></label>
                            <label for="h-rat-f" class="title-14 pointer ml-1" style="margin-top:6px">F</label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr style="text-align:center;color:black;size:2;">
                      <td rowspan="2">9</td>
                      <td rowspan="2" colspan="3">Gramage</td>
                      <td rowspan="2"><input type="text" name="g_standar" id="g_standar" value="{{$data->g_standar}}" style="width: 5em;height:8em;"></td>
                      <td><input type="text" name="g1" id="g1" value="{{$data->g1}}" style="width: 8em;height:4em;"></td>
                      <td><input type="text" name="g2" id="g2" value="{{$data->g2}}" style="width: 5em;height:4em;"></td>
                      <td><input type="text" name="g3" id="g3" value="{{$data->g3}}" style="width: 7em;height:4em;"></td>
                      <td><input type="text" name="g4" id="g4" value="{{$data->g4}}" style="width: 4em;height:4em;"></td>
                      <td><input type="text" name="g5" id="g5" value="{{$data->g5}}" style="width: 7em;height:4em;"></td>
                      <td><input type="text" name="g6" id="g6" value="{{$data->g6}}" style="width: 4em;height:4em;"></td>
                    </tr>
                    <tr style="text-align:center;color:black;size:2;">
                      <td><input type="text" name="g7" id="g7" value="{{$data->g7}}" style="width: 8em;height:4em;"></td>
                      <td><input type="text" name="g8" id="g8" value="{{$data->g8}}" style="width: 5em;height:4em;"></td>
                      <td><input type="text" name="g9" id="g9" value="{{$data->g9}}" style="width: 7em;height:4em;"></td>
                      <td><input type="text" name="g10" id="g10" value="{{$data->g10}}" style="width: 4em;height:4em;"></td>
                      <td><input type="text" name="g11" id="g11" value="{{$data->g11}}" style="width: 7em;height:4em;"></td>
                      <td><input type="text" name="g12" id="g12" value="{{$data->g12}}" style="width: 4em;height:4em;"></td>
                    </tr>
                    <tr style="text-align:center;color:black;size:2;">
                      <td colspan="11">Remark</td>
                    </tr>
                    <tr style="text-align:center;color:black;size:2;">
                      <td colspan="11"><textarea name="remark" id="remark" style="width: 74em;height:20em;">{{$data->remark}}</textarea></td>
                    </tr>
                  </table>
                </div>
                <div class="col-lg-12" style="padding-top:20px;">
                  <button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Update Data ?');">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

@endpush