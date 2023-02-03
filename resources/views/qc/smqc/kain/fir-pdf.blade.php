<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SMQC</title>
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
        <div class="tables">
            <div class="tables-row">
                <div class="tables-cell" style="padding-left:200px;"><b><font color="white">FABRIC INSPECTION RESULT</font></div>
                <div class="tables-cell" style="padding-left:245px;"><b><font color="white">FABRIC INSPECTION RESULT</font></div>
                <div class="tables-cell"> 
                    <?php
                    $cek_lab= collect($data->lab)->count('id');
                    ?>
                    <table>
                        <tr>
                        <td style="height:35px;width:35px">
                            @if($cek_lab == 0)
                                @if($data->fir->qf_rat == 'P' && $data->fir->fl_rat == 'P' && $data->fir->fw_rat == 'P' && $data->fir->sb_rat == 'P' && $data->fir->sbt_rat == 'P' && $data->fir->cc_rat == 'P' && $data->fir->h_rat == 'P' && $data->fir->g_rat == 'P')
                                <center>P</center>
                                @else
                                <center>F</center>
                                @endif
                            @endif
                            @if($cek_lab !== 0)
                                @if($data->fir->qf_rat == 'P' && $data->fir->fl_rat == 'P' && $data->fir->fw_rat == 'P' && $data->fir->sb_rat == 'P' && $data->fir->sbt_rat == 'P' && $data->fir->cc_rat == 'P' && $data->fir->h_rat == 'P' && $data->fir->g_rat == 'P'
                                && $data->lab->shading_rat == 'P' && $data->lab->shrin_rat == 'P' && $data->lab->torque_rat == 'P' && $data->lab->twisting_rat == 'P' && 
                                $data->lab->color_rat == 'P' && $data->lab->fast_rat == 'P')
                                    <center>P</center>
                                    @else
                                    <center>F</center>
                                @endif
                            @endif
                        </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="container" style="padding-bottom:20px;">
            <center><font style="color:black;font-weight:bold;">FABRIC INSPECTION RESULT</font></center>
        </div>
        <div class="tables">
            <div class="tables-row">
                <div class="tables-cell" style="width:80px;"><font color="black" size="2">Fabric Design</font></div>
                <div class="tables-cell" style="width:140px;">
                    <img style="height:100px; width:120px;"  src="{{ storage_path('/app/public/smqc/fabric/qm/'.$data->qm) }}">
                </div>
                <div class="tables-cell" style="width:120px;">
                    <div class="cointainer"><font color="black" size="2">Arrival Number</font></div>
                    <div class="cointainer" style="padding-top:16px;"><font color="black" size="2">Arrival Date</font></div>
                    <div class="cointainer" style="padding-top:11px;"><font color="black" size="2">Mill</font></div>
                    <div class="cointainer" style="padding-top:11px;"><font color="black" size="2">Inspection Date</font></div>
                    <div class="cointainer" style="padding-top:11px;"><font color="black" size="2">Style/Color/Buyer</font></div>
                    <div class="cointainer" style="padding-top:11px;"><font color="black" size="2">Content Design</font></div>
                    <div class="cointainer" style="padding-top:11px;"><font color="black" size="2">UM</font></div>
                    <div class="cointainer" style="padding-top:11px;"><font color="black" size="2">Tested by</font></div>
                    <div class="cointainer" style="padding-top:12px;"><font color="black" size="2">NO PO</font></div>
                    <div class="cointainer" style="padding-top:12px;"><font color="black" size="2">Lab Test by</font></div>
                </div>
                <div class="tables-cell">
                    <center><font color="black" size="2"><input type="text" style="width: 20em;" value="{{$data->fir->an}}" disabled ></font></center>
                    <center><font color="black" size="2"><input type="text" style="width: 20em;" value="{{$data->fir->ad}}" disabled ></font></center>
                    <center><font color="black" size="2"><input type="text" style="width: 20em;" value="{{$data->fir->mill}}" disabled ></font></center>
                    <center><font color="black" size="2"><input type="text" style="width: 20em;" value="{{$data->fir->ins_d}}" disabled ></font></center>
                    <center><font color="black" size="2"><input type="text" style="width: 20em;" value="{{$data->fir->style}}" disabled ></font></center>
                    <center><font color="black" size="2"><input type="text" style="width: 20em;" value="{{$data->fir->cd}}" disabled ></font></center>
                    <center><font color="black" size="2"><input type="text" style="width: 20em;" value="{{$data->fir->mu}}" disabled ></font></center>
                    <center><font color="black" size="2"><input type="text" style="width: 20em;" value="{{$data->fir->tb}}" disabled ></font></center>
                    <center><font color="black" size="2"><input type="text" style="width: 20em;" value="{{$data->shadel->no_po}}" disabled ></font></center>
                    <center><font color="black" size="2"><input type="text" style="width: 20em;" value="{{$data->lab->note}}" disabled ></font></center>
                </div>
            </div>
        </div>
        <table style="width:720px;">
            <tr style="color:black;font-size:13px;text-align:center;">
                <td rowspan="2" style="width:20px;">No</td>
                <td rowspan="2" style="width:120px;">Inspection Property</td>
                <td rowspan="2" style="width:141px;">Requirement / Tolerance</td>
                <td colspan="7">Inspection Result</td>
                <td rowspan="2" style="width:20px;"> Rating</td>
            </tr>
            <tr style="color:black;font-size:13px;text-align:center;">
                <td style="width:50px;">Total roll of arrival</td>
                <td style="width:50px;">Total</td>
                <td style="width:50px;">No. of Inspection Roll</td>
                <td style="width:50px;">Total</td>
                <td style="width:50px;">Average of Width</td>
                <td style="width:50px;">Point</td>
                <td style="width:80px;">Accepted Point</td>
            </tr>
            <!-- No 1  -->
            <tr style="color:black;font-size:13px;text-align:center;">
                <td>1</td>
                <td style="padding-left:2px;padding-right:2px;text-align:left;">Quality fabric</td>
                <td style="padding-left:2px;padding-right:2px;text-align:left;">Max Point 15/100 yard</td>
                <td>{{$data->fir->qf_tr}}</td>
                <td>{{$data->fir->qf_ty_tr}}</td>
                <td>{{$data->fir->qf_no_ir}}</td>
                <td>{{$data->fir->qf_ty_no_ir}}</td>
                <td>{{$data->fir->qf_aow}}</td>
                <td>{{$data->fir->qf_point}}</td>
                <td>{{$data->fir->qf_ap}}</td>
                <td>{{$data->fir->qf_rat}}</td>
            </tr>
            <tr style="color:black;font-size:13px;text-align:center;">
                <td colspan="3"></td>
                <td>Req</td>
                <td>Actual</td>
                <td>Diff</td>
                <td>%</td>
                <td colspan="4"></td>
            </tr>
            <!-- No 2 -->
            <tr style="color:black;font-size:13px;text-align:center;">
                <td>2</td>
                <td style="padding-left:2px;padding-right:2px;text-align:left;">Fabric length</td>
                <td style="padding-left:2px;padding-right:2px;text-align:left;">Meet with PO mentioned</td>
                <td>{{$data->fir->fl_req}}</td>
                <td>{{$data->fir->fl_ac}}</td>
                <td>{{$data->fir->fl_diff}}</td>
                <td>{{$data->fir->fl_per}}</td>
                <td colspan="3"></td>
                <td>{{$data->fir->fl_rat}}</td>
            </tr>
            <tr style="color:black;font-size:13px;text-align:center;">
                <td colspan="3"></td>
                <td>Req</td>
                <td>Actual</td>
                <td>Diff</td>
                <td>%</td>
                <td colspan="4"></td>
            </tr>
            <!-- No 3 -->
            <tr style="color:black;font-size:13px;text-align:center;">
                <td>3</td>
                <td style="padding-left:2px;padding-right:2px;text-align:left;">Fabric width</td>
                <td style="padding-left:2px;padding-right:2px;text-align:left;">Meet with PO mentioned</td>
                <td>{{$data->fir->fw_req}}</td>
                <td>{{$data->fir->fw_ac}}</td>
                <td>{{$data->fir->fw_diff}}</td>
                <td>{{$data->fir->fw_per}}</td>
                <td colspan="3"></td>
                <td>{{$data->fir->fw_rat}}</td>
            </tr> 
            <!-- No 4 -->
            <tr style="color:black;font-size:13px;text-align:center;">
                <td  style="height:20px">4</td>
                <td style="padding-left:2px;padding-right:2px;text-align:left;">Shade band</td>
                <td style="padding-left:2px;padding-right:2px;text-align:left;">All inspected roll</td>
                <td colspan="7"></td>
                <td >{{$data->fir->sb_rat}}</td>
            </tr>
            <!-- No 5  -->
            <tr style="color:black;font-size:13px;text-align:center;">
                <td >5</td>
                <td style="padding-left:2px;padding-right:2px;text-align:left;">Odor Test</td>
                <td style="padding-left:2px;padding-right:2px;text-align:left;">No Odor</td>
                <td colspan="7"></td>
                <td>{{$data->fir->sbt_rat}}</td>
            </tr>
            <!-- No 6 -->
            <tr style="color:black;font-size:13px;text-align:center;">
                <td>6</td>
                <td style="padding-left:2px;padding-right:2px;text-align:left;">Color check</td>
                <td style="padding-left:2px;padding-right:2px;text-align:left;">Match with strike off at light box</td>
                <td colspan="7"></td>
                <td>{{$data->fir->cc_rat}}</td>
            </tr>
            <!-- No 7  -->
            <tr style="color:black;font-size:13px;text-align:center;">
                <td style="height:20px">7</td>
                <td colspan="2" style="padding-left:2px;padding-right:2px;text-align:left;">Number of lot</td> 
                <td><label class="radio inline"><input type="radio" name="nol" id="nol" value="1" {{ ($data->fir->nol == 1 ) ? "checked" : "" }} disabled> 1</label></td>
                <td><label class="radio inline"><input type="radio" name="nol" id="nol" value="2" {{ ($data->fir->nol =="2" ) ? "checked" : "" }} disabled> 2</label></td>
                <td><label class="radio inline"><input type="radio" name="nol" id="nol" value="3" {{ ($data->fir->nol =="3" ) ? "checked" : "" }} disabled> 3</label></td>
                <td><label class="radio inline"><input type="radio" name="nol" id="nol" value="4" {{ ($data->fir->nol =="4" ) ? "checked" : "" }} disabled> 4</label></td>
                <td><label class="radio inline"><input type="radio" name="nol" id="nol" value="5" {{ ($data->fir->nol =="5" ) ? "checked" : "" }} disabled> 5</label></td>
                <td><label class="radio inline"><input type="radio" name="nol" id="nol" value="6" {{ ($data->fir->nol =="6" ) ? "checked" : "" }} disabled> 6</label></td>
                <td>{{$data->fir->nol_in}}</td>
                <td></td>
            </tr>
            <!-- No 8  -->
            <tr style="color:black;font-size:13px;text-align:center;">
                <td style="height:20px">8</td>
                <td colspan="2"  style="padding-left:2px;padding-right:2px;text-align:left;">Handfell</td>
                <td colspan="7"> {{$data->fir->handfeel}}</td>
                <td> {{$data->fir->h_rat}}</td>
            </tr>
            <!-- No 9  -->
            <tr style="color:black;font-size:13px;text-align:center;">
                <td rowspan="2" style="height:20px">9</td>
                <td rowspan="2" style="padding-left:2px;padding-right:2px;text-align:left;">Weight</td>
                <td rowspan="2" style="padding-left:2px;padding-right:2px;text-align:left;">{{$data->fir->g_standar}}</td>
                <td style="height:20px">{{$data->fir->g1}}</td>
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
            <tr style="color:black;font-size:13px;text-align:center;">
                <td style="height:20px">{{$data->fir->g7}}</td>
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
            <!-- No 10  -->
            <tr style="height:30px;color:black;font-size:13px;text-align:center;">
                <td>10</td>
                <td style="padding-left:2px;padding-right:2px;text-align:left;">Shading test</td>
                <td style="padding-left:2px;padding-right:2px;text-align:left;">{{ $data->lab->shading_t }}</td>
                <td colspan="2">Length</td>
                <td colspan="2">{{ $data->lab->shading_l }}</td>
                <td>Width</td>
                <td colspan="2">{{ $data->lab->shading_w }}</td>
                <td>{{ $data->lab->shading_rat }}</td>
            </tr>
            <!-- No 11 -->
            <tr style="height:30px;color:black;font-size:13px;text-align:center;">
                <td rowspan="2">11</td>
                <td rowspan="2" style="padding-left:2px;padding-right:2px;text-align:left;">Shrinkage Test</td>
                <td rowspan="2" style="padding-left:2px;padding-right:2px;text-align:left;">{{ $data->lab->shrin_t }}</td>
                <td colspan="2">Length</td>
                <td colspan="2">%</td>
                <td colspan="2">Width</td>
                <td>%</td>
                <td rowspan="2">{{ $data->lab->shrin_rat }}</td>
            </tr>
            <tr style="height:30px;color:black;font-size:13px;text-align:center;">
                <td>{{ $data->lab->shrin_l1 }}</td>
                <td>{{ $data->lab->shrin_l2 }}</td>
                <td colspan="2">{{ $data->lab->shrin_lper }}</td>
                <td>{{ $data->lab->shrin_w1 }}</td>
                <td>{{ $data->lab->shrin_w2 }}</td>
                <td>{{ $data->lab->shrin_wper }}</td>
            </tr>
            <!-- No 12 -->
            <tr style="height:30px;color:black;font-size:13px;text-align:center;">
                <td>12</td>
                <td style="padding-left:2px;padding-right:2px;text-align:left;">Torque test</td>
                <td style="padding-left:2px;padding-right:2px;text-align:left;">{{ $data->lab->torque_t }}</td>
                <td>Bowing</td>
                <td colspan="2">{{ $data->lab->torque_b }}</td>
                <td>Skewing</td>
                <td>{{ $data->lab->torque_s }}</td>
                <td colspan="2">{{ $data->lab->torque_man }}</td>
                <td>{{ $data->lab->torque_rat }}</td>
            </tr>
            <!-- No 13  -->
            <tr style="height:30px;color:black;font-size:13px;text-align:center;">
                <td>13</td>
                <td style="padding-left:2px;padding-right:2px;text-align:left;">Twisting test</td>
                <td style="padding-left:2px;padding-right:2px;text-align:left;">{{ $data->lab->twisting_t }}</td>
                <td colspan="7">{{ $data->lab->twisting_man }}</td>
                <td>{{ $data->lab->twisting_rat }}</td>
            </tr>
            <!-- No 14  -->
            <tr style="height:30px;color:black;font-size:13px;text-align:center;">
                <td rowspan="2">14</td>
                <td rowspan="2" style="padding-left:2px;padding-right:2px;text-align:left;">Colorfastness Test to washing</td>
                <td rowspan="2" style="padding-left:2px;padding-right:2px;text-align:left;">{{ $data->lab->color_t }}</td>
                <td colspan="2">Acetate</td>
                <td>{{ $data->lab->color_ace }}</td>
                <td>Cotton</td>
                <td>{{ $data->lab->color_cot }}</td>
                <td>Nylon</td>
                <td>{{ $data->lab->color_ny }}</td>
                <td rowspan="2">{{ $data->lab->color_rat }}</td>
            </tr>
            <tr style="height:30px;color:black;font-size:13px;text-align:center;">
                <td colspan="2">Polyester</td>
                <td>{{ $data->lab->color_poly }}</td>
                <td>Acrylic</td>
                <td>{{ $data->lab->color_acry }}</td>
                <td>Woll</td>
                <td>{{ $data->lab->color_woll }}</td>
            </tr>
            <!-- No 15 -->
            <tr style="height:30px;color:black;font-size:13px;text-align:center;">
                <td>15</td>
                <td style="padding-left:2px;padding-right:2px;text-align:left;">Colorfastness Test to Rubbing/Crocking</td>
                <td style="padding-left:2px;padding-right:2px;text-align:left;">{{ $data->lab->fast_t }}</td>
                <td colspan="7">{{ $data->lab->fast_man }}</td>
                <td>{{ $data->lab->fast_rat }}</td>
            </tr>
            <tr style="color:black;font-size:13px;text-align:center;">
                <td colspan="11" style="height:15px;">REMARK</td>
            </tr>
            <tr style="color:black;font-size:13px;text-align:center;">
                <td colspan="11" style="height:60px;text-align:left;">{{$data->fir->remark}}</td>
            </tr>
        </table>
        <br>
        <div class="tables">
            <div class="tables-row">
                <div class="tables-cell" style="width:40px;"><font color="black" size="2">Note :</FONT></div>
                <div class="tables-cell"><font color="black" size="2">{{ $data->fir->note }}</FONT></div>
            </div>
        </div>
	    <br>
        <div class="tables">
            <div class="tables-row">
                <div class="tables-cell" style="width:160px;">
                    <div class="container">
                        <center><font color="black" size="2">Known by</font></center>
                    </div>
                </div>
                <div class="tables-cell" style="width:110px;">
                    <div class="container">
                        <center><font color="black" size="2">Made by</font></center>
                    </div>
                </div>
            </div>
        </div>
        <div class="tables">
            <div class="tables-row">
                <div class="tables-cell" style="width:170px;" >
                    <div class="container">
                        <center><img style="height:20px; width:20px;"  src="{{ storage_path('/app/public/smqc/fabric/qm/ckls.png') }}"></center>
                        <center><font style="font-color:black;font-size:10;">{{ $data->prc_name}}</font></center>
                        <center><font style="font-color:black;font-size:10;text-decoration: overline;">Purchasing</font></center>
                    </div>
                </div>
                <div class="tables-cell" style="width:180px;">
                    <div class="container">
                        <center><img style="height:20px; width:20px;"  src="{{ storage_path('/app/public/smqc/fabric/qm/ckls.png') }}"></center>
                        <center><font style="font-color:black;font-size:10;">{{ $data->mrc_name}}</font></center>
                        <center><font style="font-color:black;font-size:10;text-decoration: overline;">Merchandiser</font></center>
                    </div>
                </div>
                <div class="tables-cell">
                    <div class="container">
                        <center><img style="height:20px; width:20px;"  src="{{ storage_path('/app/public/smqc/fabric/qm/ckls.png') }}"></center>
                        <center><font style="font-color:black;font-size:10;">{{$data->fir->made_by}}</font></center>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>