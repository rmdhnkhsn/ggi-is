<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
    <head>
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
            width: 180px;
            padding: 3px;
            border: 1px solid black;
            margin: 0;
            }
            .tables { display: table; width: 100%;}
            .tables-row { display: table-row; }
            .tables-cell { display: table-cell; padding: 1em; }
            .page_break { page-break-before: always; }
        </style>
    </head>
    <body> 
        <!-- Row atas  -->
        <div class="tables">
            <div class="tables-row">
                <div class="tables-cell"  style="width:120px;">
                    <font color="black" size="2">PT. Gistex <font color="white" size="2">Garmen</font><br>Garmen Indonesia<br>Cileunyi, Bandung</font>
                </div>
                <div class="tables-cell"  style="width:120px;">
                    <div class="container">
                        <table style="width:150px;"> 
                            <tr style="color:black;font-size:13px;text-align:center;">
                                <td colspan="2">Desicion</td>
                            </tr>
                            <tr style="color:black;font-size:13px;text-align:center;">
                                <td>Accept</td>
                                <td>Reject</td>
                            </tr>
                            <tr style="color:black;font-size:13px;text-align:center;">
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
                </div>
                <div class="tables-cell"  style="width:250px;">
                    <div class="container">
                        <center><font color="black" size="4" weigth="bold" style="padding-left:20px;">FABRIC AUDIT REPORT<br></font></center>
                    </div>
                </div>
                <div class="tables-cell"  style="width:120px;">
                    <div class="container">
                        <table style="width:150px;">
                            <tr style="color:black;font-size:13px;text-align:center;">
                                <td colspan="2" width="2px">ACCEPTABLE POINT</td>
                            </tr>
                            <tr style="color:black;font-size:13px;text-align:center;">
                                @if($data->standar_id != null)
                                    <td  width="2px">{{$standar->point_roll}}</td>
                                    <td width="2px">{{$standar->point_order}}</td>
                                @else
                                    @if($data->buyer_id == $buyer->id)
                                    <td  width="2px">{{$buyer->point}}</td>
                                    <td width="2px">{{$buyer->point2}}</td>
                                    @endif
                                @endif
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="tables-cell"  style="width:120px;">
                    <div class="container">
                        <table>
                            <tr style="color:black;font-size:13px;text-align:center;">
                                <td>QUALITY MATERIAL</td>
                            </tr>
                            <tr>
                                <td> <center><img style="height:40px;width:90px;padding:2px;"  src="{{ storage_path('/app/public/smqc/fabric/qm/'.$data->qm) }}"> </center></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End  -->
        <br>
        <!-- Row 2  -->
        <div class="tables">
            <div class="tables-row">
                @if($data->buyer_id == $buyer->id)
                    <div class="tables-cell" style="width:10px;" >
                        <div class="container">
                            <font color="black" size="2">BUYER</font>
                        </div>
                        <div class="container" style="padding-top:5px;">
                            <center><font color="black" size="2"><input type="text" style="width:10em;" value="{{$buyer->name}}" disabled ></font></center>
                        </div>
                    </div>
                @endif
                <div class="tables-cell" style="width:10px;">
                    <div class="container">
                        <font color="black" size="2">SUPPLIER</font>
                    </div> 
                    <div class="container" style="padding-top:5px">
                        <center><font color="black" size="2"><input type="text" value="{{ $data->supplier }}" style="width:10em;" disabled></font></center>
                    </div>
                </div>
                <div class="tables-cell" style="width:10px;">
                    <div class="container">
                        <font color="black" size="2">COLOR</font>
                    </div>
                    <div class="container" style="padding-top:5px">
                        <center><font color="black" size="2"><input type="text" style="width:10em;" value="{{ $data->color }}" disabled></font></center>
                    </div>
                </div>
                <div class="tables-cell" style="width:10px;">
                    <div class="container">
                        <font color="black" size="2">STYLE</font>
                    </div>
                    <div class="container" style="padding-top:5px">
                        <center><font color="black" size="2"><input type="text" style="width:10em;" value="{{ $data->style }}" disabled></font></center>
                    </div>
                </div>
                <div class="tables-cell" style="width:10px;">
                    <div class="container">
                        <font color="black" size="2">DATE</font>
                    </div>
                    <div class="container" style="padding-top:5px">
                        <center><font color="black" size="2"><input type="text" style="width:10em;" value="{{ $data->date }}" disabled></font></center>
                    </div>
                </div>
                <div class="tables-cell" style="width:10px;">
                    <div class="container">
                        <font color="black" size="2">INSPECTOR</font>
                    </div>
                    <div class="container" style="padding-top:5px">
                       <center><font color="black" size="2"><input type="text" style="width:10em;" value="{{ $data->inspector }}" disabled></font></center>
                    </div>
                </div>
            </div>
        </div>
        <!-- End  -->
        <br>
        <!-- Table Fars  -->
        <table style="width:1200px;padding-left:15px">
            <tr style="color:black;font-size:13px;text-align:center;">
                <td rowspan="3">ROLL NO</td>
                <td rowspan="3">NUMBER ROLL</td>
                <td rowspan="3">LOT</td>
                <td colspan="3">ACTUAL WIDTH</td>
                <td colspan="2">LENGTH/WEIGHT</td>
                <td colspan="2" rowspan="2">POINT</td>
                <td colspan="2" rowspan="2">DECISION</td>
                <td rowspan="3">REMARK</td>
            </tr>
            <tr style="color:black;font-size:13px;text-align:center;">
                <td rowspan="2">Start</td>
                <td rowspan="2">Mid</td>
                <td rowspan="2">Last</td>
                <td colspan="2">YARD/KG</td>
            </tr>
            <tr style="color:black;font-size:13px;text-align:center;">
                <td>ON ROLL</td>
                <td>ACTUAL</td>
                <td>TOT</td>
                <td>ADJ</td>
                <td>ACCEPT</td>
                <td>REJECT</td>
            </tr>
            @foreach($data->far as $key => $value)
            <tr style="color:black;font-size:13px;text-align:center;">
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
            <tr style="color:black;font-size:13px;text-align:center;">
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
        <br>

        <!-- Halaman Baru  -->
        <div class="page_break"></div>
        <table style="width:1200px;">
            <tr style="color:black;font-size:13px;text-align:center;">
                <td rowspan="5">ROLL NO</td>
                <td colspan="9">FABRIC DEFECT</td>
                <td colspan="9">PRINT/DEFECT</td>
                <td colspan="3">DYING DEFECT</td>
            </tr>
            <tr style="color:black;font-size:13px;text-align:center;">
                <td colspan="3">HOLE</td>
                <td colspan="3">LUMP THREAD</td>
                <td colspan="3">YARN DEFECT</td>
                <td colspan="3">SHADE</td>
                <td colspan="3">MISPRINT</td>
                <td colspan="3">BLEED</td>
                <td colspan="3">DIRTY</td>
            </tr>
            <tr style="color:black;font-size:13px;text-align:center;">
                <td colspan="3">BOLONG</td>
                <td colspan="3">B.TIMBUL</td>
                <td colspan="3">CCT.TENUN</td>
                <td colspan="3">BELANG</td>
                <td colspan="3">WRN.HILANG</td>
                <td colspan="3">BLOBOR</td>
                <td colspan="3">NODA</td>
            </tr>
            <tr style="color:black;font-size:13px;text-align:center;">
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
            <tr style="color:black;font-size:13px;text-align:center;">
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
                <tr style="color:black;font-size:13px;text-align:center;">
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
        <br><br>
        <div class="footer" style="background-color:white;">
            <div class="container">
                <font color="black" size="2">System Management Quality Control <b class="copyright">&copy; 2021 PT. Gistex Garmen Indonesia </b></FONT></center>
            </div>
        </div>
        <script src="{{url('assets/scripts/jquery-1.9.1.min.js')}}"></script>
        <script src="{{url('assets/scripts/jquery-ui-1.10.1.custom.min.js')}}"></script>
        <script src="{{url('assets/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{url('assets/scripts/flot/jquery.flot.js')}}"></script>
        <script src="{{url('assets/scripts/flot/jquery.flot.resize.js')}}"></script>
        <script src="{{url('assets/scripts/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{url('assets/scripts/common.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </body>
</html>