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
        <div class="cards bg-card p-1">
          <div class="cards-scroll scrollX" id="scroll-bar">
            <div class="row">
              <!-- Row 1  -->
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-2">
                    <div class="container">
                      <font color="black" size="2">PT. Gistex<br>
                        Garmen Indonesia<br>
                        Cileunyi, Bandung</font>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <table style="width:150px;"> 
                      <tr>
                        <td colspan="2">Desicion</td>
                      </tr>
                      <tr>
                        <td>Accept</td>
                        <td>Reject</td>
                      </tr>
                      <tr>
                          @if($data->standar_id != null)
                            @if($adj <= $standar->point_order)
                            <td>Acc</td>
                            @else
                            <td></td>
                            @endif

                            @if($adj > $standar->point_order)
                            <td>Rjct</td>
                            @else
                            <td></td>
                            @endif
                          @else
                            @if($data->buyer_id == $buyer->id)
                              @if($adj <= $buyer->point2)
                              <td>Acc</td>
                              @else
                              <td></td>
                              @endif
                              @if($adj >= $buyer->point2)
                              <td>Rjct</td>
                              @else
                              <td></td>
                              @endif
                            @endif
                          @endif
                      </tr>
                    </table>
                  </div>
                  <div class="col-lg-2">
                    <font color="black" size="4" weigth="bold">FABRIC AUDIT REPORT</font>
                  </div>
                  <div class="col-lg-3">
                    <table style="width:200px;">
                      <tr>
                        <td colspan="3" width="2px">ACCEPTABLE POINT</td>
                      </tr>
                      <tr>
                        @if($data->standar_id != null)
                          <td  width="2px">{{$standar->point_roll}}</td>
                          <td width="2px">{{$standar->point_order}}</td>
                        @else
                          <td  width="2px">{{$buyer->point}}</td>
                          <td width="2px">{{$buyer->point2}}</td>
                        @endif
                      </tr>
                    </table>
                  </div>
                  <div class="col-lg-3">
                    <table>
                      <tr>
                          <td width="300x">QUALITY MATERIAL</td>
                      </tr>
                      <tr>
                        <td  width="250px" height="40px">  <center><img style="height:40px;width:90px;padding:2px;"  src="{{ asset('storage/smqc/fabric/qm/'.$data->qm) }}"> </center></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <!-- Row 2  -->
              <div class="col-lg-12" style="padding-top:15px;">
                <div class="row" >
                  <div class="col-lg-2">
                    <div class="container">BUYER</div>
                    <div class="container" style="padding-top:10px"><input type="text" value="{{ $buyer->name }}" style="width:auto;" disabled></input></div>
                  </div>
                  <div class="col-lg-2">
                        <div class="container">SUPPLIER</div>
                        <div class="container" style="padding-top:10px"><input type="text" value="{{ $data->supplier }}" style="width:auto;" disabled></input></div>
                  </div>
                  <div class="col-lg-2">
                        <div class="container">COLOR</div>
                        <div class="container" style="padding-top:10px"><input type="text" value="{{ $data->color }}" style="width:auto;" disabled></input></div>
                  </div>
                  <div class="col-lg-2">
                        <div class="container">STYLE</div>
                        <div class="container" style="padding-top:10px"><input type="text" value="{{ $data->style }}" style="width:auto;" disabled></input></div>
                  </div>
                  <div class="col-lg-2">
                        <div class="container">DATE</div>
                        <div class="container" style="padding-top:10px"><input type="text" value="{{ $data->date }}" style="width:auto;" disabled></input></div>
                  </div>
                  <div class="col-lg-2">
                        <div class="container">INSPECTOR</div>
                        <div class="container" style="padding-top:10px"><input type="text" value="{{ $data->inspector }}" style="width:auto;" disabled></input></div>
                  </div>
                </div>
              </div>
              <!-- Tabel 1 -->
              <div class="col-lg-12" style="padding-top:15px;">
                <table style="width:100%;">
                  <tr style="text-align:center;color:black;size:2;">
                    <td rowspan="3">ROLL NO</td>
                    <td rowspan="3">NUMBER ROLL</td>
                    <td rowspan="3">LOT</td>
                    <td colspan="3">ACTUAL WIDTH</td>
                    <td colspan="2">LENGTH/WEIGHT</td>
                    <td colspan="2" rowspan="2">POINT</td>
                    <td colspan="2" rowspan="2">DECISION</td>
                    <td rowspan="3">REMARK</td>
                  </tr>
                  <tr style="text-align:center;color:black;size:2;">
                    <td rowspan="2">Start</td>
                    <td rowspan="2">Mid</td>
                    <td rowspan="2">Last</td>
                    <td colspan="2">YARD/KG</td>
                  </tr>
                  <tr style="text-align:center;color:black;size:2;">
                    <td>ON ROLL</td>
                    <td>ACTUAL</td>
                    <td>TOT</td>
                    <td>ADJ</td>
                    <td>ACCEPT</td>
                    <td>REJECT</td>
                  </tr>
                  @foreach($data->far as $key => $value)
                    <tr style="text-align:center;color:black;size:2;">
                      <td>{{$value->roll_no}}</td>
                      <td>{{$value->number}}</td>
                      <td>{{$value->lot}}</td>
                      <td>{{$value->ac_beg}}'</td>
                      <td>{{$value->ac_mid}}'</td>
                      <td>{{$value->ac_end}}'</td>
                      <td>{{$value->on_roll}}</td>
                      <td>{{$value->actual}}</td>
                      <td>{{$value->tot}}</td>
                      <td>{{$value->adj}}</td>
                      @if($value->acc == 0 && $value->reject == 1)
                      <td></td>
                      @else
                      <td>Acc</td>
                      @endif
                      @if($value->reject == 0)
                      <td></td>
                      @else
                      <td>Rjct</td>
                      @endif
                      @if($value->remark !== null)
                      <td>{{$value->remark}}</td>
                      @else
                      <td> - </td>
                      @endif
                    </tr>
                  @endforeach
                  <tr style="text-align:center;color:black;size:2;">
                    <td colspan="3">Total</td>
                    <td colspan="3">{{ $aw }}</td>
                    <td>{{ $on_roll }}</td>
                    <td>{{ $actual }}</td>
                    <td>{{ $tot }}</td>
                    <td>{{ $adj }}</td>
                    @if($data->standar_id != null)
                      @if($adj <= $standar->point_order)
                      <td>Acc</td>
                      @else
                      <td></td>
                      @endif
                      @if($adj > $standar->point_order)
                      <td>Rjct</td>
                      @else
                      <td></td>
                      @endif
                    @else
                      @if($adj <= $buyer->point2)
                      <td>Acc</td>
                      @else
                      <td></td>
                      @endif
                      @if($adj >= $buyer->point2)
                      <td>Rjct</td>
                      @else
                      <td></td>
                      @endif
                    @endif
                    <td></td>
                  </tr>
                </table>            
              </div>
              <!-- Tabel 2  -->
              <div class="col-lg-12" style="padding-top:15px;">
                <h6>DETAIL</h6>
                <table style="width:100%;">
                  <tr style="text-align:center;color:black;size:2;">
                    <td rowspan="5"> ROLL NO</td>
                    <td colspan="9"> FABRIC DEFECT</td>
                    <td colspan="9">PRINT/DEFECT</td>
                    <td colspan="3">DYING DEFECT</td>
                  </tr>
                  <tr style="text-align:center;color:black;size:2;">
                    <td colspan="3">HOLE</td>
                    <td colspan="3">LUMP THREAD</td>
                    <td colspan="3">YARN DEFECT</td>
                    <td colspan="3">SHADE</td>
                    <td colspan="3">MISPRINT</td>
                    <td colspan="3">BLEED</td>
                    <td colspan="3">DIRTY</td>
                  </tr>
                  <tr style="text-align:center;color:black;size:2;">
                    <td colspan="3">BOLONG</td>
                    <td colspan="3">B.TIMBUL</td>
                    <td colspan="3">CCT.TENUN</td>
                    <td colspan="3">BELANG</td>
                    <td colspan="3">WRN.HILANG</td>
                    <td colspan="3">BLOBOR</td>
                    <td colspan="3">NODA</td>
                  </tr>
                  <tr style="text-align:center;color:black;size:2;">
                    <td colspan="2">No Yard</td>
                    <td rowspan="2">S</td>
                    <td colspan="2">No Yard</td>
                    <td rowspan="2">S</td>
                    <td colspan="2">No Yard</td>
                    <td rowspan="2">S</td>
                    <td colspan="2">No Yard</td>
                    <td rowspan="2">S</td>
                    <td colspan="2">No Yard</td>
                    <td rowspan="2">S</td>
                    <td colspan="2">No Yard</td>
                    <td rowspan="2">S</td>
                    <td colspan="2">No Yard</td>
                    <td rowspan="2">S</td>
                  </tr>
                  <tr style="text-align:center;color:black;size:2;">
                    <td>F</td>
                    <td>T</td>
                    <td>F</td>
                    <td>T</td>
                    <td>F</td>
                    <td>T</td>
                    <td>F</td>
                    <td>T</td>
                    <td>F</td>
                    <td>T</td>
                    <td>F</td>
                    <td>T</td>
                    <td>F</td>
                    <td>T</td>
                  </tr>
                  @foreach($data->far as $key => $value)
                    @foreach($value->fdetail as $key2 => $value2)
                      <tr>
                        <td>{{$value2->roll_no}}</td>
                        <td>{{$value2->bol_f}}</td>
                        <td>{{$value2->bol_t}}</td>
                        <td>{{$value2->bol_s}}</td>
                        <td>{{$value2->tim_f}}</td>
                        <td>{{$value2->tim_t}}</td>
                        <td>{{$value2->tim_s}}</td>
                        <td>{{$value2->ten_f}}</td>
                        <td>{{$value2->ten_t}}</td>
                        <td>{{$value2->ten_s}}</td>
                        <td>{{$value2->bel_f}}</td>
                        <td>{{$value2->bel_t}}</td>
                        <td>{{$value2->bel_s}}</td>
                        <td>{{$value2->wh_f}}</td>
                        <td>{{$value2->wh_t}}</td>
                        <td>{{$value2->wh_s}}</td>
                        <td>{{$value2->blbr_f}}</td>
                        <td>{{$value2->blbr_t}}</td>
                        <td>{{$value2->blbr_s}}</td>
                        <td>{{$value2->nod_f}}</td>
                        <td>{{$value2->nod_t}}</td>
                        <td>{{$value2->nod_s}}</td>
                      </tr>
                    @endforeach
                  @endforeach               
                </table>
              </div>
              <div class="col-lg-12" style="padding-top:15px;padding-bottom:15px;">
                <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm col-2"><i class="fas fa-arrow-circle-left"></i> Back</a>
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