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
                <div class="col-lg-12">
                    <form action="{{route('shrinkage.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="firs_id" class="span10" name="firs_id" value="{{$data->id}}">      
                        <table class="col-12" style="height:80px; overflow:auto;">
                            <tr style="color:black;size:2;text-align:left;">
                                <td colspan="5" style="height:35px;">Length</td>
                            </tr>
                            <tr style="color:black;size:2;text-align:center;">
                                <td>No</td>
                                <td>Before wash [cm]</td>
                                <td>After 1 wash [cm]</td>
                                <td>Diff [cm]</td>
                                <td>Diff [%]</td>
                            </tr>
                            <tr style="color:black;size:2;text-align:center;">
                                <td>1</td>
                                <td><input type="text" name="l_a1" id="l_a1" style="width: 4emem;height:3em;" required></td>
                                <td><input type="text" name="l_b1" id="l_b1" style="width: 4emem;height:3em;" required></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr style="color:black;size:2;text-align:center;">
                                <td>2</td>
                                <td><input type="text" name="l_a2" id="l_a2" style="width: 4emem;height:3em;" required></td>
                                <td><input type="text" name="l_b2" id="l_b2" style="width: 4emem;height:3em;" required></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr style="color:black;size:2;text-align:center;">
                                <td>3</td>
                                <td><input type="text" name="l_a3" id="l_a3" style="width: 4emem;height:3em;" required></td>
                                <td><input type="text" name="l_b3" id="l_b3" style="width: 4emem;height:3em;" required></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr style="color:black;size:2;text-align:left;">
                                <td colspan="5" style="height:35px;">Width</td>
                            </tr>
                            <tr style="color:black;size:2;text-align:center;">
                                <td>1</td>
                                <td><input type="text" name="w_a1" id="w_a1" style="width: 4emem;height:3em;" required></td>
                                <td><input type="text" name="w_b1" id="w_b1" style="width: 4emem;height:3em;" required></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr style="color:black;size:2;text-align:center;">
                                <td>2</td>
                                <td><input type="text" name="w_a2" id="w_a2" style="width: 4emem;height:3em;" required></td>
                                <td><input type="text" name="w_b2" id="w_b2" style="width: 4emem;height:3em;" required></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr style="color:black;size:2;text-align:center;">
                                <td>3</td>
                                <td><input type="text" name="w_a3" id="w_a3" style="width: 4emem;height:3em;" required></td>
                                <td><input type="text" name="w_b3" id="w_b3" style="width: 4emem;height:3em;" required></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                        <div class="col-lg-12" style="padding-top:20px;">
                            <button type="submit" class="btn btn-primary btn-block"> Save</button>
                        </div>
                    </form>
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
@endpush