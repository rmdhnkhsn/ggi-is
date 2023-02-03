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
              <form action="{{route('lab.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12">
                  <input type="hidden" id="firs_id" class="span10" name="firs_id" value="{{$data->id}}">
                  <input type="hidden" id="id" class="span10" name="id" value="{{$data->lab->id}}">
                  <table class="col-12" style="height:80px; overflow:auto;">
                    <tr style="color:black;size:2;text-align:left;">
                      <td>No</td>
                      <td>Inspection Property</td>
                      <td>Requirement / Tolerance</td>
                      <td colspan="6">Test Result</td>
                      <td> Rating</td>
                    </tr>
                    <!-- No 1 -->
                    <tr style="color:black;size:2;text-align:left;">
                      <td>1</td>
                      <td>Shading test</td>
                      <td><input type="text" name="shading_t" id="shading_t" class="col-lg-12" style="height:5em;" value="{{$data->lab->shading_t}}"></td>
                      <td>Length</td>
                      <td colspan="2"><input type="text" name="shading_l" id="shading_l" class="col-lg-12" value="{{$data->lab->shading_l}}" style="height:5em;" ></td>
                      <td>Width</td>
                      <td colspan="2"><input type="text" name="shading_w" id="shading_w" value="{{$data->lab->shading_w}}" class="col-lg-12" style="height:5em;" ></td>
                      <td>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="shading_rat" id="shading-rat-p" value="P" class="radioCustomInputBlack" {{ ($data->lab->shading_rat == 'P' ) ? "checked" : "" }}>
                            <label for="shading-rat-p" class="radioCustomBlack"></label>
                            <label for="shading-rat-p" class="title-14 pointer ml-1" style="margin-top:6px">P</label>
                          </div>
                        </div>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="shading_rat" id="shading-rat-f" value="F" class="radioCustomInputBlack" {{ ($data->lab->shading_rat == 'F' ) ? "checked" : "" }}>
                            <label for="shading-rat-f" class="radioCustomBlack"></label>
                            <label for="shading-rat-f" class="title-14 pointer ml-1" style="margin-top:6px">F</label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <!-- No 2  -->
                    <tr style="color:black;size:2;text-align:left;">
                      <td rowspan="2">2</td>
                      <td rowspan="2">Shrinkage Test</td>
                      <td rowspan="2"><input type="text" name="shrin_t" id="shrin_t" class="col-12" value="{{$data->lab->shrin_t}}" style="height:5.7em;" ></td>
                      <td colspan="2">Length</td>
                      <td>%</td>
                      <td colspan="2">Width</td>
                      <td>%</td>
                      <td rowspan="2">
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="shrin_rat" id="shrin-rat-p" value="P" class="radioCustomInputBlack" {{ ($data->lab->shrin_rat == 'P' ) ? "checked" : "" }}>
                            <label for="shrin-rat-p" class="radioCustomBlack"></label>
                            <label for="shrin-rat-p" class="title-14 pointer ml-1" style="margin-top:6px">P</label>
                          </div>
                        </div>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="shrin_rat" id="shrin-rat-f" value="F" class="radioCustomInputBlack" {{ ($data->lab->shrin_rat == 'F' ) ? "checked" : "" }}>
                            <label for="shrin-rat-f" class="radioCustomBlack"></label>
                            <label for="shrin-rat-f" class="title-14 pointer ml-1" style="margin-top:6px">F</label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr style="color:black;size:2;text-align:left;">
                      <td><input type="text" name="shrin_l1" id="shrin_l1" class="col-12" style="height:4em;" value="{{$data->lab->shrin_l1}}" ></td>
                      <td><input type="text" name="shrin_l2" id="shrin_l2" class="col-12" style="height:4em;" value="{{$data->lab->shrin_l2}}"></td>
                      <td><input type="text" name="shrin_lper" id="shrin_lper" class="col-12" style="height:4em;" value="{{$data->lab->shrin_lper}}"></td>
                      <td><input type="text" name="shrin_w1" id="shrin_w1" class="col-12" style="height:4em;" value="{{$data->lab->shrin_w1}}"></td>
                      <td><input type="text" name="shrin_w2" id="shrin_w2" class="col-12" style="height:4em;" value="{{$data->lab->shrin_w2}}"></td>
                      <td><input type="text" name="shrin_wper" id="shrin_wper" class="col-12" style="height:4em;" value="{{$data->lab->shrin_wper}}"></td>
                    </tr>
                    <!-- No 3  -->
                    <tr style="color:black;size:2;text-align:left;">
                      <td>3</td>
                      <td>Torque test</td>
                      <td><input type="text" name="torque_t" id="torque_t" value="{{$data->lab->torque_t}}" class="col-12" style="height:5em;" ></td>
                      <td>Bowing</td>
                      <td><input type="text" name="torque_b" id="torque_b" value="{{$data->lab->torque_b}}" class="col-12" style="height:5em;" ></td>
                      <td>Skewing</td>
                      <td><input type="text" name="torque_s" id="torque_s" value="{{$data->lab->torque_s}}" class="col-12" style="height:5em;" ></td>
                      <td colspan="2"><input type="text" name="torque_man" value="{{$data->lab->torque_man}}" id="torque_man" class="col-12" style="height:5em;" ></td>
                      <td>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="torque_rat" id="torque-rat-p" value="P" class="radioCustomInputBlack" {{ ($data->lab->torque_rat == 'P' ) ? "checked" : "" }}>
                            <label for="torque-rat-p" class="radioCustomBlack"></label>
                            <label for="torque-rat-p" class="title-14 pointer ml-1" style="margin-top:6px">P</label>
                          </div>
                        </div>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="torque_rat" id="torque-rat-f" value="F" class="radioCustomInputBlack" {{ ($data->lab->torque_rat == 'F' ) ? "checked" : "" }}>
                            <label for="torque-rat-f" class="radioCustomBlack"></label>
                            <label for="torque-rat-f" class="title-14 pointer ml-1" style="margin-top:6px">F</label>
                          </div>
                        </div>
                      </td>
                    </tr >
                    <!-- No 4  -->
                    <tr style="color:black;size:2;text-align:left;">
                      <td>4</td>
                      <td>Twisting test</td>
                      <td><input type="text" name="twisting_t" id="twisting_t" value="{{$data->lab->twisting_t}}" class="col-12" style="height:5em;" ></td>
                      <td colspan="6"><input type="text" name="twisting_man" id="twisting_man" value="{{$data->lab->twisting_man}}" class="col-12" style="height:5em;" ></td>
                      <td>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="twisting_rat" id="twst-rat-p" value="P" class="radioCustomInputBlack" {{ ($data->lab->twisting_rat == 'P' ) ? "checked" : "" }}>
                            <label for="twst-rat-p" class="radioCustomBlack"></label>
                            <label for="twst-rat-p" class="title-14 pointer ml-1" style="margin-top:6px">P</label>
                          </div>
                        </div>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="twisting_rat" id="twst-rat-f" value="F" class="radioCustomInputBlack" {{ ($data->lab->twisting_rat == 'F' ) ? "checked" : "" }}>
                            <label for="twst-rat-f" class="radioCustomBlack"></label>
                            <label for="twst-rat-f" class="title-14 pointer ml-1" style="margin-top:6px">F</label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <!-- No 5 -->
                    <tr style="height:30px;">
                      <td rowspan="2">5</td>
                      <td rowspan="2">Colorfastness Test to washing</td>
                      <td rowspan="2"><input type="text" name="color_t" id="color_t" value="{{$data->lab->color_t}}" class="col-12" style="height:6.2em;" ></td>
                      <td>Acetate</td>
                      <td><input type="text" name="color_ace" id="color_ace" value="{{$data->lab->color_ace}}" class="col-12" style="height:3em;" ></td>
                      <td>Cotton</td>
                      <td><input type="text" name="color_cot" id="color_cot" value="{{$data->lab->color_cot}}" class="col-12" style="height:3em;" ></td>
                      <td>Nylon</td>
                      <td><input type="text" name="color_ny" id="color_ny" value="{{$data->lab->color_ny}}" class="col-12" style="height:3em;" ></td>
                      <td rowspan="2">
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="color_rat" id="color-rat-p" value="P" class="radioCustomInputBlack" {{ ($data->lab->color_rat == 'P' ) ? "checked" : "" }}>
                            <label for="color-rat-p" class="radioCustomBlack"></label>
                            <label for="color-rat-p" class="title-14 pointer ml-1" style="margin-top:6px">P</label>
                          </div>
                        </div>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="color_rat" id="color-rat-f" value="F" class="radioCustomInputBlack" {{ ($data->lab->color_rat == 'F' ) ? "checked" : "" }}>
                            <label for="color-rat-f" class="radioCustomBlack"></label>
                            <label for="color-rat-f" class="title-14 pointer ml-1" style="margin-top:6px">F</label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr style="color:black;size:2;text-align:left;">
                      <td>Polyester</td>
                      <td><input type="text" name="color_poly" id="color_poly" value="{{$data->lab->color_poly}}" class="col-12" style="height:3em;" ></td>
                      <td>Acrylic</td>
                      <td><input type="text" name="color_acry" id="color_acry" value="{{$data->lab->color_acry}}" class="col-12" style="height:3em;" ></td>
                      <td>Woll</td>
                      <td><input type="text" name="color_woll" id="color_woll" value="{{$data->lab->color_woll}}" class="col-12" style="height:3em;" ></td>
                    </tr>
                    <!-- No 6  -->
                    <tr style="color:black;size:2;text-align:left;">
                      <td>6</td>
                      <td>Colosfastness Test to Rubbing / Crocking</td>
                      <td><input type="text" name="fast_t" id="fast_t" class="col-12" value="{{$data->lab->fast_t}}" style="height:8em;" ></td>
                      <td colspan="6"><input type="text" name="fast_man" id="fast_man" value="{{$data->lab->fast_man}}" class="col-12" style="height:8em;" ></td>
                      <td>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="fast_rat" id="fast-rat-p" value="P" class="radioCustomInputBlack" {{ ($data->lab->fast_rat == 'P' ) ? "checked" : "" }}>
                            <label for="fast-rat-p" class="radioCustomBlack"></label>
                            <label for="fast-rat-p" class="title-14 pointer ml-1" style="margin-top:6px">P</label>
                          </div>
                        </div>
                        <div class="justify-center">
                          <div class="radioContainer">
                            <input type="radio" name="fast_rat" id="fast-rat-f" value="F" class="radioCustomInputBlack" {{ ($data->lab->fast_rat == 'F' ) ? "checked" : "" }}>
                            <label for="fast-rat-f" class="radioCustomBlack"></label>
                            <label for="fast-rat-f" class="title-14 pointer ml-1" style="margin-top:6px">F</label>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="col-lg-12" style="padding-top:15px;">
                  <button type="submit" class="btn btn-primary btn-block">Save</button>
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