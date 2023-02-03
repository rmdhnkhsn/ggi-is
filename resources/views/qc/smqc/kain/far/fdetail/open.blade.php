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
    <div class="row">
      <div class="col-12 flexx">
        <a href="{{ route('far.index', $data->report_id)}}" class="btn btn-info btn-sm">See More</a>
      </div>
    </div>
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
                  @foreach($data->fdetail as $key => $value) 
                  <tr>
                    <td><center><font color="black" size="2">{{$value->bol_f}}</FONT></center></td>
                    <td><center><font color="black" size="2">{{$value->bol_t}}</FONT></center></td>
                    <td><center><font color="black" size="2">{{$value->bol_s}}</FONT></center></td>
                    <td><center><font color="black" size="2">{{$value->tim_f}}</FONT></center></td>
                    <td><center><font color="black" size="2">{{$value->tim_t}}</FONT></center></td>
                    <td><center><font color="black" size="2">{{$value->tim_s}}</FONT></center></td>
                    <td><center><font color="black" size="2">{{$value->ten_f}}</FONT></center></td>
                    <td><center><font color="black" size="2">{{$value->ten_t}}</FONT></center></td>
                    <td><center><font color="black" size="2">{{$value->ten_s}}</FONT></center></td>
                    <td><center><font color="black" size="2">{{$value->bel_f}}</FONT></center></td>
                    <td><center><font color="black" size="2">{{$value->bel_t}}</FONT></center></td>
                    <td><center><font color="black" size="2">{{$value->bel_s}}</FONT></center></td>
                    <td><center><font color="black" size="2">{{$value->wh_f}}</FONT></center></td>
                    <td><center><font color="black" size="2">{{$value->wh_t}}</FONT></center></td>
                    <td><center><font color="black" size="2">{{$value->wh_s}}</FONT></center></td>
                    <td><center><font color="black" size="2">{{$value->blbr_f}}</FONT></center></td>
                    <td><center><font color="black" size="2">{{$value->blbr_t}}</FONT></center></td>
                    <td><center><font color="black" size="2">{{$value->blbr_s}}</FONT></center></td>
                    <td><center><font color="black" size="2">{{$value->nod_f}}</FONT></center></td>
                    <td><center><font color="black" size="2">{{$value->nod_t}}</FONT></center></td>
                    <td><center><font color="black" size="2">{{$value->nod_s}}</FONT></center></td>
                    <td><center><a href="{{route('fdetail.opdit', $value->id)}}" class="btn btn-warning btn-sm" title="Edit Report"><i class="fas fa-edit"></i></a>
                        <a href="{{route('fdetail.opdel', $value->id)}}" class="btn btn-danger btn-sm" title="Delete Report"><i class="fas fa-trash-alt"></i></a><center>
                    </td>
                  </tr>
                  @endforeach               
                </table>
              </div>
              <div class="col-lg-12" style="padding-top:15px;">
                <table style="width:60%; height:30px; overflow:auto;">
                  <tr>
                      <td colspan="2"><center><font color="black" size="2"> POINT</FONT></center></td>
                      <td colspan="2"><center><font color="black" size="2">DECISION</FONT></center></td>
                      <td rowspan="2"><center><font color="black" size="2">REMARK</FONT></center></td>
                      <td rowspan="2"><center><font color="black" size="2">ACTION</FONT></center></td>
                      <td rowspan="2"><center><font color="black" size="2">UPDATE</FONT></center></td>
                  </tr>
                  <tr>
                      <td><center><font color="black" size="2"> TOT</FONT></center></td>
                      <td><center><font color="black" size="2">ADJ</FONT></center></td>
                      <td><center><font color="black" size="2">ACCEPT</FONT></center></td>
                      <td><center><font color="black" size="2">REJECT</FONT></center></td>
                  </tr>
                  <tr>
                    <?php
                      $tot = collect($data->fdetail)->sum('tot');
                      $ac_beg = $data->ac_beg;
                      $ac_mid = $data->ac_mid;
                      $ac_end = $data->ac_end;
                      $actual = $data->actual;
                      $aw = ($ac_beg + $ac_mid + $ac_mid) / 3;
                      $adj = round(($tot *3600) / ($aw * $actual), 2);
                      if ($report->standar_id == null) {
                        $standar_value = $standar['point_roll'];
                      }else {
                        $standar_value =  $standar->point_roll;
                      }
                    ?>
                    @if($data->tot != $tot || $data->adj != $adj)
                      <form class="form-horizontal row-fluid" action="{{route('fdetail.change')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{$data->id}}">
                        @if($standar_value != 0)
                          <td><center><font color="black" size="2"><input type="text" name="tot" id="tot" value="{{ $tot }}" style="width:3em;height:2em;"></FONT></center></td>
                          <td><center><font color="black" size="2"> <input type="text" name="adj" id="adj" value="{{ $adj }}" style="width:3em; height:2em;"></FONT></center></td>
                          @if($adj <= $standar_value)
                          <td><center><font color="black" size="2"> <input type="text" name="acc" id="acc" value="1"  style="width:3em; height:2em;"></FONT></center></td>
                          @else
                          <td><center><font color="black" size="2"> <input type="text" name="acc" id="acc" value="0" style="width:3em; height:2em;" ></FONT></center></td>
                          @endif
                          @if($adj > $standar_value)
                          <td><center><font color="black" size="2"> <input type="text" name="reject" id="reject" value="1" style="width:3em; height:2em;" ></FONT></center></td>
                          @else
                          <td><center><font color="black" size="2"> <input type="text" name="reject" id="reject" value="0" style="width:3em; height:2em;" ></FONT></center></td>
                          @endif
                        @else
                          <td><center><font color="black" size="2"><input type="text" name="tot" id="tot" value="{{ $tot }}" style="width:3em;height:2em;"></FONT></center></td>
                          <td><center><font color="black" size="2"> <input type="text" name="adj" id="adj" value="{{$adj}}" style="width:3em; height:2em;"></FONT></center></td>
                          @if($adj <= $buyer->point2)
                          <td><center><font color="black" size="2"> <input type="text" name="acc" id="acc" value="1"  style="width:3em; height:2em;"></FONT></center></td>
                          @else
                          <td><center><font color="black" size="2"> <input type="text" name="acc" id="acc" value="0" style="width:3em; height:2em;" ></FONT></center></td>
                          @endif
                          @if($adj > $buyer->point2)
                          <td><center><font color="black" size="2"> <input type="text" name="reject" id="reject" value="1" style="width:3em; height:2em;" ></FONT></center></td>
                          @else
                          <td><center><font color="black" size="2"> <input type="text" name="reject" id="reject" value="0" style="width:3em; height:2em;" ></FONT></center></td>
                          @endif
                        @endif
                          <td><center><font color="black" size="2"> <input type="text" name="remark" id="remark" value="{{$data->remark}}" style="width:16em; height:2em;"></FONT></center></td>
                          <td><button type="submit" class="btn btn-primary btn-sm">Save</button></td>
                      </form>
                    @else
                    <form class="form-horizontal row-fluid" action="{{route('fdetail.change')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{$data->id}}">
                        <td><center><font color="black" size="2"><input type="text" name="tot" id="tot" value="{{$data->tot}}" style="width:3em;height:2em;" disabled></FONT></center></td>
                        <td><center><font color="black" size="2"> <input type="text" name="adj" id="adj" value="{{$data->adj}}" style="width:3em; height:2em;" disabled></FONT></center></td>
                        @if($data->acc == 1)
                        <td><center><font color="black" size="2"> <input type="text" value="Acc" style="width:3em; height:2em;" disabled></FONT></center></td>
                        @endif 
                        @if($data->acc == 0)
                        <td><center><font color="black" size="2"> <input type="text" value="" style="width:3em; height:2em;" disabled></FONT></center></td>
                        @endif
                        @if($data->reject == 1)
                        <td><center><font color="black" size="2"> <input type="text" value="Rjct" style="width:3em; height:2em;" disabled></FONT></center></td>
                        @endif
                        @if($data->reject == 0)
                        <td><center><font color="black" size="2"> <input type="text" value="" style="width:3em; height:2em;" disabled></FONT></center></td>
                        @endif
                        <td><center><font color="black" size="2"> <input type="text" name="remark" id="remark" value="{{$data->remark}}" style="width:8em; height:2em;"></FONT></center></td>
                        <td><center><font color="black" size="2">Saved</font></center></td>
                        <td><button type="submit" class="btn btn-warning btn-sm">Update</button></td>
                    </form>
                    @endif
                  </tr>
                </table>
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