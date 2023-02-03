@extends("qc.smqc.layouts.app")
@section("title","Report Fabric")
@push("styles")
<style>
.dit {
  border: 1px solid black;
}
table, td, th {
    border: 1px solid black;
    text-align:center;
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
    input[type=text] {
    width: 100%;
    text-align:center;
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
        <div class="cards bg-card p-3">
          <div class="row">
            <div class="cards-scroll scrollX" id="scroll-bar">
              <div class="col-lg-12">
                <table style="width:100%; height:80px; overflow:auto;">
                  <tr >
                    <td colspan="9"><center><font color="black" size="2"> FABRIC DEFECT</FONT></center></td>
                    <td colspan="9"><center><font color="black" size="2">PRINT/DEFECT</FONT></center></td>
                    <td colspan="3"><center><font color="black" size="2">DYING DEFECT</FONT></center></td>
                    <td rowspan="5"><center><font color="black" size="2">Action</FONT></center></td>
                  </tr>
                  <tr>
                    <td colspan="3"><center><font color="black" size="2">HOLE</FONT></center></td>
                    <td colspan="3"><center><font color="black" size="2">LUMP THREAD</FONT></center></td>
                    <td colspan="3"><center><font color="black" size="2">YARN DEFECT</FONT></center></td>
                    <td colspan="3"><center><font color="black" size="2">SHADE</FONT></center></td>
                    <td colspan="3"><center><font color="black" size="2">MISPRINT</FONT></center></td>
                    <td colspan="3"><center><font color="black" size="2">BLEED</FONT></center></td>
                    <td colspan="3"><center><font color="black" size="2">DIRTY</FONT></center></td>
                  </tr>
                  <tr>
                    <td colspan="3"><center><font color="black" size="2">BOLONG</FONT></center></td>
                    <td colspan="3"><center><font color="black" size="2">B.TIMBUL</FONT></center></td>
                    <td colspan="3"><center><font color="black" size="2">CCT.TENUN</FONT></center></td>
                    <td colspan="3"><center><font color="black" size="2">BELANG</FONT></center></td>
                    <td colspan="3"><center><font color="black" size="2">WRN.HILANG</FONT></center></td>
                    <td colspan="3"><center><font color="black" size="2">BLOBOR</FONT></center></td>
                    <td colspan="3"><center><font color="black" size="2">NODA</FONT></center></td>
                  </tr>
                  <tr>
                    <td colspan="2"><center><font color="black" size="2">No Yard</FONT></center></td>
                    <td rowspan="2"><center><font color="black" size="2">S</FONT></center></td>
                    <td colspan="2"><center><font color="black" size="2">No Yard</FONT></center></td>
                    <td rowspan="2"><center><font color="black" size="2">S</FONT></center></td>
                    <td colspan="2"><center><font color="black" size="2">No Yard</FONT></center></td>
                    <td rowspan="2"><center><font color="black" size="2">S</FONT></center></td>
                    <td colspan="2"><center><font color="black" size="2">No Yard</FONT></center></td>
                    <td rowspan="2"><center><font color="black" size="2">S</FONT></center></td>
                    <td colspan="2"><center><font color="black" size="2">No Yard</FONT></center></td>
                    <td rowspan="2"><center><font color="black" size="2">S</FONT></center></td>
                    <td colspan="2"><center><font color="black" size="2">No Yard</FONT></center></td>
                    <td rowspan="2"><center><font color="black" size="2">S</FONT></center></td>
                    <td colspan="2"><center><font color="black" size="2">No Yard</FONT></center></td>
                    <td rowspan="2"><center><font color="black" size="2">S</FONT></center></td>
                  </tr>
                  <tr>
                    <td><center><font color="black" size="2">From</FONT></center></td>
                    <td><center><font color="black" size="2">To</FONT></center></td>
                    <td><center><font color="black" size="2">From</FONT></center></td>
                    <td><center><font color="black" size="2">To</FONT></center></td>
                    <td><center><font color="black" size="2">From</FONT></center></td>
                    <td><center><font color="black" size="2">To</FONT></center></td>
                    <td><center><font color="black" size="2">From</FONT></center></td>
                    <td><center><font color="black" size="2">To</FONT></center></td>
                    <td><center><font color="black" size="2">From</FONT></center></td>
                    <td><center><font color="black" size="2">To</FONT></center></td>
                    <td><center><font color="black" size="2">From</FONT></center></td>
                    <td><center><font color="black" size="2">To</FONT></center></td>
                    <td><center><font color="black" size="2">From</FONT></center></td>
                    <td><center><font color="black" size="2">To</FONT></center></td>
                  </tr>
                  <form class="form-horizontal row-fluid" action="{{route('fdetail.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <tr>
                      <input type="hidden" name="id" id="id" value="{{$data->id}}" style="width: 3.9em">
                      <input type="hidden" name="report_id" id="report_id" value="{{$data->report_id}}" style="width: 3.9em">
                      <input type="hidden" name="fars_id" id="fars_id" value="{{$data->fars_id}}" style="width: 3.9em">
                      <input type="hidden" name="roll_no" id="roll_no" value="{{$data->roll_no}}" style="width: 3.9em">
                      <td><center><font color="black" size="2"><input type="number" name="bol_f" id="bol_f" value="{{$data->bol_f}}" style="width: 3.9em"></FONT></center></td>
                      <td><center><font color="black" size="2"><input type="number" name="bol_t" id="bol_t" value="{{$data->bol_t}}" style="width: 3.9em"></FONT></center></td>
                      <td><center><font color="black" size="2"><input type="number" name="bol_s" id="bol_s" value="{{$data->bol_s}}" style="width: 3.9em"></FONT></center></td>
                      <td><center><font color="black" size="2"><input type="number" name="tim_f" id="tim_f" value="{{$data->tim_f}}" style="width: 3.9em"></FONT></center></td>
                      <td><center><font color="black" size="2"><input type="number" name="tim_t" id="tim_t" value="{{$data->tim_t}}" style="width: 3.9em"></FONT></center></td>
                      <td><center><font color="black" size="2"><input type="number" name="tim_s" id="tim_s" value="{{$data->tim_s}}" style="width: 3.9em"></FONT></center></td>
                      <td><center><font color="black" size="2"><input type="number" name="ten_f" id="ten_f" value="{{$data->ten_f}}" style="width: 3.9em"></FONT></center></td>
                      <td><center><font color="black" size="2"><input type="number" name="ten_t" id="ten_t" value="{{$data->ten_t}}" style="width: 3.9em"></FONT></center></td>
                      <td><center><font color="black" size="2"><input type="number" name="ten_s" id="ten_s" value="{{$data->ten_s}}" style="width: 3.9em"></FONT></center></td>
                      <td><center><font color="black" size="2"><input type="number" name="bel_f" id="bel_f" value="{{$data->bel_f}}" style="width: 3.9em"></FONT></center></td>
                      <td><center><font color="black" size="2"><input type="number" name="bel_t" id="bel_t" value="{{$data->bel_t}}" style="width: 3.9em"></FONT></center></td>
                      <td><center><font color="black" size="2"><input type="number" name="bel_s" id="bel_s" value="{{$data->bel_s}}" style="width: 3.9em"></FONT></center></td>
                      <td><center><font color="black" size="2"><input type="number" name="wh_f" id="wh_f" value="{{$data->wh_f}}" style="width: 3.9em"></FONT></center></td>
                      <td><center><font color="black" size="2"><input type="number" name="wh_t" id="wh_t" value="{{$data->wh_t}}" style="width: 3.9em"></FONT></center></td>
                      <td><center><font color="black" size="2"><input type="number" name="wh_s" id="wh_s" value="{{$data->wh_s}}" style="width: 3.9em"></FONT></center></td>
                      <td><center><font color="black" size="2"><input type="number" name="blbr_f" id="blbr_f" value="{{$data->blbr_f}}" style="width: 3.9em"></FONT></center></td>
                      <td><center><font color="black" size="2"><input type="number" name="blbr_t" id="blbr_t" value="{{$data->blbr_t}}" style="width: 3.9em"></FONT></center></td>
                      <td><center><font color="black" size="2"><input type="number" name="blbr_s" id="blbr_s" value="{{$data->blbr_s}}" style="width: 3.9em"></FONT></center></td>
                      <td><center><font color="black" size="2"><input type="number" name="nod_f" id="nod_f" value="{{$data->nod_f}}" style="width: 3.9em"></FONT></center></td>
                      <td><center><font color="black" size="2"><input type="number" name="nod_t" id="nod_t" value="{{$data->nod_t}}" style="width: 3.9em"></FONT></center></td>
                      <td><center><font color="black" size="2"><input type="number" name="nod_s" id="nod_s" value="{{$data->nod_s}}" style="width: 3.9em"></FONT></center></td>
                    </tr>
                               
                  </table><br>
                  <button type="submit" class="btn btn-info btn-sm col-10">Save</button>
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