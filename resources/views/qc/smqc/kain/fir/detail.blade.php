@extends("qc.smqc.layouts.app")
@section("title","Report Fabric")
@push("styles")
<style>
	table, td, th {
  border: 1px solid black;
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
      h7 {
        text-decoration: overline;
      }
      input[type=text] {
        width: 100%;
      box-sizing: border-box;
      border: none;
      border-bottom: 2px solid black;
}
.dit {
  width: 200px;
  padding: 3px;
  border: 1px solid black;
  margin: 0;
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
              <div class="col-lg-12 justify-end">
                <div style="border:1px solid black;text-align:center;width:35px;height:40px;padding-top:8px;">
                    <?php
                    $cek_lab= collect($data->lab)->count('id');
                    ?>
                    @if($cek_lab == 0)
                      @if($data->fir->qf_rat == 'P' && $data->fir->fl_rat == 'P' && $data->fir->fw_rat == 'P' && $data->fir->sb_rat == 'P' && $data->fir->sbt_rat == 'P' && $data->fir->cc_rat == 'P' && $data->fir->h_rat == 'P' && $data->fir->g_rat == 'P')
                      <label for="">P</label> 
                      @else
                      <label for="">F</label> 
                      @endif
                    @endif
                    @if($cek_lab !== 0)
                        @if($data->fir->qf_rat == 'P' && $data->fir->fl_rat == 'P' && $data->fir->fw_rat == 'P' && $data->fir->sb_rat == 'P' && $data->fir->sbt_rat == 'P' && $data->fir->cc_rat == 'P' && $data->fir->h_rat == 'P' && $data->fir->g_rat == 'P'
                        && $data->lab->shading_rat == 'P' && $data->lab->shrin_rat == 'P' && $data->lab->torque_rat == 'P' && $data->lab->twisting_rat == 'P' && 
                        $data->lab->color_rat == 'P' && $data->lab->fast_rat == 'P')
                        <label for="">P</label> 
                        @else
                        <label for="">F</label> 
                        @endif
                    @endif
                </div>
              </div>
              <div class="col-lg-12 justify-center">
                <h5>FABRIC INSPECTION RESULT</h5>
              </div>
              <!-- row 1  -->
              <div class="col-lg-12" style="padding-top:15px">
                <div class="row">
                  <div class="col-lg-2">
                    <div class="container"><center>Fabric Design :</div>
                  </div>
                    <div class="col-lg-4">
                    <div class="dit">
                      <img style="height:220px; width:190px;" src="{{ asset('storage/smqc/fabric/qm/'.$data->qm) }}">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row">
                      <div class="col-md-4">
                          <div class="container">Arrival Number </div>
                      </div>
                      <div class="col-md-8">
                          <div class="container"><input class="col-md-12" type="text" value="{{$data->fir->an}}" disabled ></div>
                      </div>
                      <div class="col-md-4">
                          <div class="container">Arrival Date </div>
                      </div>
                      <div class="col-md-8">
                          <div class="container"><input class="col-md-12" type="text" value="{{$data->fir->ad}}" disabled ></div>
                      </div>
                      <div class="col-md-4">
                          <div class="container">Mill</div>
                      </div>
                      <div class="col-md-8">
                          <div class="container"><input class="col-md-12" type="text" value="{{$data->fir->mill}}" disabled ></div>
                      </div>
                      <div class="col-md-4">
                          <div class="container">Inspection Date </div>
                      </div>
                      <div class="col-md-8">
                          <div class="container"><input class="col-md-12" type="text" value="{{$data->fir->ins_d}}" disabled ></div>
                      </div>
                      <div class="col-md-4">
                          <div class="container">Style/ColorBuyer</div>
                      </div>
                      <div class="col-md-8">
                          <div class="container"><input class="col-md-12" type="text" value="{{$data->fir->style}}" disabled ></div>
                      </div>
                      <div class="col-md-4">
                          <div class="container">Content Design</div>
                      </div>
                      <div class="col-md-8">
                          <div class="container"><input class="col-md-12" type="text" value="{{$data->fir->cd}}" disabled ></div>
                      </div>
                      <div class="col-md-4">
                          <div class="container">UM</div>
                      </div>
                      <div class="col-md-8">
                          <div class="container"><input class="col-md-12" type="text" value="{{$data->fir->mu}}" disabled ></div>
                      </div>
                      <div class="col-md-4">
                          <div class="container">Tested By</div>
                      </div>
                      <div class="col-md-8">
                          <div class="container"><input class="col-md-12" type="text" value="{{$data->fir->tb}}" disabled ></div>
                      </div>
                      <?php
                      if ($data->shadel == null) {
                        $po = null;
                      }else {
                        $po = $data->shadel->no_po;
                      }
                      ?>
                      <div class="col-md-4">
                          <div class="container">No PO</div>
                      </div>
                      <div class="col-md-8">
                          <div class="container"><input class="col-md-12" type="text" value="{{$po}}" disabled ></div>
                      </div>
                      @if($cek_lab != 0 )
                      <div class="col-md-4">
                          <div class="container">Lab Test by</div>
                      </div>
                      <div class="col-md-8">
                          <div class="container"><input class="col-md-12" type="text" value="{{$data->lab->note}}" disabled ></div>
                      </div>
                      @endif
                    </div>
                  </div>
                </div> 
              </div>
              <!-- Table 1 -->
              <div class="col-lg-12" style="padding-top:20px">
                <table class="col-lg-12" style="height:80px; overflow:auto;">
                  <!-- Judul  -->
                  <tr style="color:black;size:2px;text-align:center;height:30px">
                    <td rowspan="2" style="width:30px">No</td>
                    <td rowspan="2" style="width:205px">Inspection Property</td>
                    <td rowspan="2" style="width:205px">Requirement / Tolerance</td>
                    <td colspan="7">Inspection Result</td>
                    <td rowspan="2" style="width:50px;"> Rating</td>
                  </tr>
                  <tr style="color:black;size:2px;text-align:center;height:50px">
                    <td style="width:70px;">Total roll of arrival</td>
                    <td style="width:70px;">Total</td>
                    <td style="width:70px;">No. of Inspection Roll</td>
                    <td style="width:70px;">Total</td>
                    <td style="width:70px;">Average of Width</td>
                    <td style="width:70px;"><font color="white">aaaPoint<font color="white">aaa</td>
                    <td style="width:70px;">Accepted Point</td>
                  </tr>
                  <!-- No 1  -->
                  <tr style="color:black;size:2px;text-align:center;height:30px">
                    <td>1</td>
                    <td style="text-align:left;padding-left:5px;">Quality fabric</td>
                    <td style="text-align:left;padding-left:5px;">Max Point 15/100 yard</td>
                    <td>{{$data->fir->qf_tr}}</td>
                    <td>{{$data->fir->qf_ty_tr}}</td>
                    <td>{{$data->fir->qf_no_ir}}</td>
                    <td>{{$data->fir->qf_ty_no_ir}}</td>
                    <td>{{$data->fir->qf_aow}}</td>
                    <td>{{$data->fir->qf_point}}</td>
                    <td>{{$data->fir->qf_ap}}</td>
                    <td>{{$data->fir->qf_rat}}</td>
                  </tr>
                  <tr style="color:black;size:2px;text-align:center;height:30px">
                    <td colspan="3"></td>
                    <td>Req</td>
                    <td>Actual</td>
                    <td>Diff</td>
                    <td>%</td>
                    <td colspan="4"></td>
                  </tr>
                  <!-- No 2  -->
                  <tr style="color:black;size:2px;text-align:center;height:30px">
                    <td>2</td>
                    <td style="text-align:left;padding-left:5px;">Fabric length</td>
                    <td style="text-align:left;padding-left:5px;">Meet with PO mentioned</td>
                    <td>{{$data->fir->fl_req}}</td>
                    <td>{{$data->fir->fl_ac}}</td>
                    <td>{{$data->fir->fl_diff}}</td>
                    <td>{{$data->fir->fl_per}} %</td>
                    <td colspan="3"></td>
                    <td>{{$data->fir->fl_rat}}</td>
                  </tr>
                  <tr style="color:black;size:2px;text-align:center;height:30px">
                    <td colspan="3"></td>
                    <td>Req</td>
                    <td>Actual</td>
                    <td>Diff</td>
                    <td>%</td>
                    <td colspan="4"></td>
                  </tr>
                  <!-- No 3  -->
                  <tr style="color:black;size:2px;text-align:center;height:30px">
                    <td>3</td>
                    <td style="text-align:left;padding-left:5px;">Fabric width</td>
                    <td style="text-align:left;padding-left:5px;">Mett with PO mentioned</td>
                    <td>{{$data->fir->fw_req}}</td>
                    <td>{{$data->fir->fw_ac}}</td>
                    <td>{{$data->fir->fw_diff}}</td>
                    <td>{{$data->fir->fw_per}} %</td>
                    <td colspan="3"></td>
                    <td>{{$data->fir->fw_rat}}</td>
                  </tr>
                  <!-- No 4 -->
                  <tr style="color:black;size:2px;text-align:center;height:30px">
                    <td>4</td>
                    <td style="text-align:left;padding-left:5px;">Shade band</td>
                    <td style="text-align:left;padding-left:5px;">All inspected Roll</td>
                    <td colspan="7"></td>
                    <td>{{$data->fir->sb_rat}}</td>
                  </tr>
                  <!-- No 5 -->
                  <tr style="color:black;size:2px;text-align:center;height:30px">
                    <td>5</td>
                    <td style="text-align:left;padding-left:5px;">Odor Test</td>
                    <td style="text-align:left;padding-left:5px;">No Odor</td>
                    <td colspan="7"></td>
                    <td>{{$data->fir->sbt_rat}}</td>
                  </tr>
                  <!-- No 6  -->
                  <tr style="color:black;size:2px;text-align:center;height:30px">
                    <td>6</td>
                    <td style="text-align:left;padding-left:5px;">Color check</td>
                    <td style="text-align:left;padding-left:5px;">Match with strike off at <font color="white" size="2">ilight box</td>
                    <td colspan="7"></td>
                    <td>{{$data->fir->cc_rat}}</td>
                  </tr>
                  <!-- No 7 -->
                  <tr style="color:black;size:2px;text-align:center;height:30px">
                    <td>7</td>
                    <td colspan="2" style="text-align:left;padding-left:5px;">Number of lot</td> 
                    <td>
                      <div class="justify-center">
                        <div class="radioContainer">
                          <input type="radio" name="nol" id="nol-1" value="1" class="radioCustomInputBlack" {{ ($data->fir->nol == 1 ) ? "checked" : "" }} disabled>
                          <label for="nol-1" class="radioCustomBlack"></label>
                          <label for="nol-1" class="title-14 pointer ml-1" style="margin-top:6px">1</label>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="justify-center">
                        <div class="radioContainer">
                          <input type="radio" name="nol" id="nol-2" value="2" class="radioCustomInputBlack" {{ ($data->fir->nol == 2 ) ? "checked" : "" }} disabled>
                          <label for="nol-2" class="radioCustomBlack"></label>
                          <label for="nol-2" class="title-14 pointer ml-1" style="margin-top:6px">2</label>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="justify-center">
                        <div class="radioContainer">
                          <input type="radio" name="nol" id="nol-3" value="3" class="radioCustomInputBlack" {{ ($data->fir->nol == 3 ) ? "checked" : "" }} disabled>
                          <label for="nol-3" class="radioCustomBlack"></label>
                          <label for="nol-3" class="title-14 pointer ml-1" style="margin-top:6px">3</label>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="justify-center">
                        <div class="radioContainer">
                          <input type="radio" name="nol" id="nol-4" value="4" class="radioCustomInputBlack" {{ ($data->fir->nol == 4 ) ? "checked" : "" }} disabled>
                          <label for="nol-4" class="radioCustomBlack"></label>
                          <label for="nol-4" class="title-14 pointer ml-1" style="margin-top:6px">4</label>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="justify-center">
                        <div class="radioContainer">
                          <input type="radio" name="nol" id="nol-5" value="5" class="radioCustomInputBlack" {{ ($data->fir->nol == 5 ) ? "checked" : "" }} disabled>
                          <label for="nol-5" class="radioCustomBlack"></label>
                          <label for="nol-5" class="title-14 pointer ml-1" style="margin-top:6px">5</label>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="justify-center">
                        <div class="radioContainer">
                          <input type="radio" name="nol" id="nol-6" value="6" class="radioCustomInputBlack" {{ ($data->fir->nol == 6 ) ? "checked" : "" }} disabled>
                          <label for="nol-6" class="radioCustomBlack"></label>
                          <label for="nol-6" class="title-14 pointer ml-1" style="margin-top:6px">6</label>
                        </div>
                      </div>
                    </td>
                    <td>{{$data->fir->nol_in}}</td>
                    <td></td>
                  </tr>
                  <!-- No 8  -->
                  <tr style="color:black;size:2px;text-align:center;height:40px">
                    <td>8</td>
                    <td colspan="2" style="text-align:left;padding-left:5px;">Handfell</td>
                    <td colspan="7"> {{$data->fir->handfeel}}</td>
                    <td> {{$data->fir->h_rat}}</td>
                  </tr>
                  <!-- No 9 -->
                  <tr style="color:black;size:2px;text-align:center;height:40px">
                    <td rowspan="2">9</td>
                    <td rowspan="2" style="text-align:left;padding-left:5px;">Weight</td>
                    <td rowspan="2">{{$data->fir->g_standar}}</td>
                    <td>{{$data->fir->g1}}</td>
                    <td>{{$data->fir->g2}}</td>
                    <td>{{$data->fir->g3}}</td>
                    <td>{{$data->fir->g4}}</td>
                    <td>{{$data->fir->g5}}</td>
                    <td>{{$data->fir->g6}}</td>
                    @if($data->fir->g_standar !== null)
                    <td>AVG = {{ $rata }}</td>
                    @else
                    <td></td>
                    @endif
                    <td rowspan="2">{{$data->fir->g_rat}}</td>
                  </tr> 
                  <tr style="color:black;size:2px;text-align:center;height:40px">
                    <td>{{$data->fir->g7}}</td>
                    <td>{{$data->fir->g8}}</td>
                    <td>{{$data->fir->g9}}</td>
                    <td>{{$data->fir->g10}}</td>
                    <td>{{$data->fir->g11}}</td>
                    <td>{{$data->fir->g12}}</td>
                    @if($data->fir->g_standar !== null)
                    <td>{{ $g_rat}} %</td>
                    @else
                    <td></td>
                    @endif
                  </tr>
                  <!-- Untuk Lab  -->
                  @if($cek_lab != 0)
                  <!-- No 10  -->
                  <tr style="color:black;size:2px;text-align:center;height:30px;">
                    <td>10</td>
                    <td style="text-align:left;padding-left:5px;">Shading test</td>
                    <td>{{ $data->lab->shading_t }}</td>
                    <td colspan="2">Length</td>
                    <td colspan="2">{{ $data->lab->shading_l }}</td>
                    <td>Width</td>
                    <td colspan="2">{{ $data->lab->shading_w }}</td>
                    <td>{{ $data->lab->shading_rat }}</td>
                  </tr>
                  <!-- No 11 -->
                  <tr style="color:black;size:2px;text-align:center;height:30px;">
                    <td rowspan="2">11</td>
                    <td rowspan="2" style="text-align:left;padding-left:5px;">Shrinkage Test</td>
                    <td rowspan="2">{{ $data->lab->shrin_t }}</td>
                    <td colspan="2">Length</td>
                    <td colspan="2">%</td>
                    <td colspan="2">Width</td>
                    <td>%</td>
                    <td rowspan="2">{{ $data->lab->shrin_rat }}</td>
                  </tr>
                  <tr style="color:black;size:2px;text-align:center;height:30px;">
                    <td>{{ $data->lab->shrin_l1 }}</td>
                    <td>{{ $data->lab->shrin_l2 }}</td>
                    <td colspan="2">{{ $data->lab->shrin_lper }}</td>
                    <td>{{ $data->lab->shrin_w1 }}</td>
                    <td>{{ $data->lab->shrin_w2 }}</td>
                    <td>{{ $data->lab->shrin_wper }}</td>
                  </tr>
                  <!-- No 12  -->
                  <tr style="color:black;size:2px;text-align:center;height:30px;">
                    <td>12</td>
                    <td style="text-align:left;padding-left:5px;">Torque test</td>
                    <td>{{ $data->lab->torque_t }}</td>
                    <td>Bowing</td>
                    <td colspan="2">{{ $data->lab->torque_b }}</td>
                    <td>Skewing</td>
                    <td>{{ $data->lab->torque_s }}</td>
                    <td colspan="2">{{ $data->lab->torque_man }}</td>
                    <td>{{ $data->lab->torque_rat }}</td>
                  </tr>
                  <!-- No 13  -->
                  <tr style="color:black;size:2px;text-align:center;height:30px;">
                    <td>13</td>
                    <td style="text-align:left;padding-left:5px;">Twisting test</td>
                    <td>{{ $data->lab->twisting_t }}</td>
                    <td colspan="7">{{ $data->lab->twisting_man }}</td>
                    <td>{{ $data->lab->twisting_rat }}</td>
                  </tr>
                  <!-- No 14  -->
                  <tr style="color:black;size:2px;text-align:center;height:30px;">
                    <td rowspan="2">14</td>
                    <td rowspan="2" style="text-align:left;padding-left:5px;">Colorfastness Test to <font color="white" size="2">iwashing</td>
                    <td rowspan="2">{{ $data->lab->color_t }}</td>
                    <td colspan="2">Acetate</td>
                    <td>{{ $data->lab->color_ace }}</td>
                    <td>Cotton</td>
                    <td>{{ $data->lab->color_cot }}</td>
                    <td>Nylon</td>
                    <td>{{ $data->lab->color_ny }}</td>
                    <td rowspan="2">{{ $data->lab->color_rat }}</td>
                  </tr>
                  <tr style="color:black;size:2px;text-align:center;height:30px;">
                    <td colspan="2">Polyester</td>
                    <td>{{ $data->lab->color_poly }}</td>
                    <td>Acrylic</td>
                    <td>{{ $data->lab->color_acry }}</td>
                    <td>Woll</td>
                    <td>{{ $data->lab->color_woll }}</td>
                  </tr>
                  <!-- No 15  -->
                  <tr style="color:black;size:2px;text-align:center;height:30px;">
                    <td>15</td>
                    <td style="text-align:left;padding-left:5px;">Colorfastness Test to Rubbing / <font color="white" size="2">iCrocking</td>
                    <td>{{ $data->lab->fast_t }}</td>
                    <td colspan="7">{{ $data->lab->fast_man }}</td>
                    <td>{{ $data->lab->fast_rat }}</td>
                  </tr>
                  @if(auth()->user()->role == 'SYS_ADMIN' || $cek_user->role == 'QC_GD')
                  <tr>
                    <td colspan="5">
                      <a href="{{route('lab.edit', $data->id)}}" class="btn btn-warning btn-sm" title="Edit Lab"><i class="fas fa-edit"></i>Edit Lab Test</a><br>
                    </td>
                    <td colspan="5">
                      <a href="{{route('lab.delete', $data->id)}}" class="btn btn-danger btn-sm" title="Delete Lab"><i class="fas fa-trash-alt"></i>Delete Lab Test</a><br>
                    </td>
                  </tr>
                  @endif
                  @endif
                  <!-- Remark -->
                  <tr style="color:black;size:2px;text-align:center;">
                    <td colspan="11" style="height:20px;">REMARK</td>
                  </tr>
                  <tr style="color:black;size:2px;">
                    <td colspan="11" style="height:200px;">{{$data->fir->remark}}</td>
                  </tr>
                </table>
              </div>
              <div class="col-lg-12" style="padding-top:15px">
                  Note : {{$data->fir->note}}
              </div>
              <div class="col-12 flexx" style="gap:.8rem;padding-top:45px">
                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#note" title="Leave Note"><i class="fas fa-plus"></i> Note</button>
                @include('qc.smqc.kain.fir.modal-note')
                @if($data->shrinkage == null)
                <a href="{{ route('shrinkage.create', $data->id) }}" class="btn btn-primary btn-sm" title="Add Lab Test"><i class="fas fa-vial"></i> Add Lab Test</a>
                @endif

                @if(auth()->user()->role == 'SYS_ADMIN' || $cek_user->role == 'QC_GD')
                <a href="{{ route('kain.dashboard') }}" class="btn btn-secondary btn-sm" title="Report Dashboard"><i class="fas fa-home"></i> Dashboard</a>
                <a href="{{ route('fir.edit', $data->fir->id) }}" class="btn btn-warning btn-sm" title="Edit Report"><i class="fas fa-edit"></i> Edit</a>
                @if($cek_lab == 0)
                <a href="{{ route('fir.delete', $data->fir->id) }}" class="btn btn-danger btn-sm" title="Delete Report" onclick="return confirm('Delete Report ?');"><i class="fas fa-trash"></i> Delete</a>
                @else
                <button class="btn btn-danger btn-sm" title="Delete Report" onclick="myFunction()"><i class="fas fa-trash"></i> Delete</button>
                @endif

                @elseif($cek_user->role == 'MD_KAIN')
                <a href="{{ route('md_frindex.index', $data->buyer_id) }}" class="btn btn-secondary btn-sm col-2"><i class="fas fa-arrow-circle-left"></i> Back</a>
                @elseif($cek_user->role == 'PRC_KAIN')
                <a href="{{ route('prc_index.report') }}" class="btn btn-secondary btn-sm col-2"><i class="fas fa-arrow-circle-left"></i> Back</a>
                @endif
              </div>
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
function myFunction() {
  alert("Hapus Test Lab Terlebih Dahulu ....");
}
</script>
@endpush