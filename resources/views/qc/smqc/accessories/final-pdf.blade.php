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
                <div class="tables-cell">
                    <center><font style="color:black;font-weight:bold;">ACCESSORIES INSPECTION</font></center>
                </div>
            </div>
        </div>
        <br>
        <div class="tables">
            <div class="tables-row">
                <div class="tables-cell"  style="width:80px;">
                    <div class="container" style="padding-top:10px"><font color="black" size="2">Supplier</font></div>
                    <div class="container" style="padding-top:10px"><font color="black" size="2">PO</font></div>
                    <div class="container" style="padding-top:10px"><font color="black" size="2">Date</font></div>
                    <div class="container" style="padding-top:10px"><font color="black" size="2">Item</font></div>
                </div>
                <div class="tables-cell">
                    @if($data->supplier !== null)
                    <center><font color="black" size="2"><input type="text" style="width: 15em;" value="{{$data->supplier}}" disabled ></font></center>
                    @else
                    <center><font color="white" size="2"><input type="text" style="width: 15em;" value="aaaaaaaaaaaaa" disabled ></font></center>
                    @endif
                    @if($data->po !== null)
                    <center><font color="black" size="2"><input type="text" style="width: 15em;" value="{{$data->po}}" disabled ></font></center>
                    @else
                    <center><font color="white" size="2"><input type="text" style="width: 15em;" value="aaaaaaaaaaaaa" disabled ></font></center>
                    @endif
                    @if($data->date !== null)
                    <center><font color="black" size="2"><input type="text" style="width: 15em;" value="{{$data->date}}" disabled ></font></center>
                    @else
                    <center><font color="white" size="2"><input type="text" style="width: 15em;" value="aaaaaaaaaaaaa" disabled ></font></center>
                    @endif
                    @if($data->item !== null)
                    <center><font color="black" size="2"><input type="text" style="width: 15em;" value="{{$data->item}}" disabled ></font></center>
                    @else
                    <center><font color="white" size="2"><input type="text" style="width: 15em;" value="aaaaaaaaaaaaa" disabled ></font></center>
                    @endif
                </div>
                <div class="tables-cell"  style="width:85px;">
                    <div class="container" style="padding-top:10px"><font color="black" size="2">Check QC Qty</font></div>
                    <div class="container" style="padding-top:10px"><font color="black" size="2">Qty Reject</font></div>
                    <div class="container" style="padding-top:10px"><font color="black" size="2">Order Quantity</font></div>
                    <div class="container" style="padding-top:10px"><font color="black" size="2">Status</font></div>
                </div>
                <div class="tables-cell">
                    @if($data->qc_qty !== null)
                    <center><font color="black" size="2"><input type="text" style="width: 15em;" value="{{$data->qc_qty}}" disabled ></font></center>
                    @else
                    <center><font color="white" size="2"><input type="text" style="width: 15em;" value="aaaaaaaaaaaaa" disabled ></font></center>
                    @endif
                    @if($data->qty_reject !== null)
                    <center><font color="black" size="2"><input type="text" style="width: 15em;" value="{{$data->qty_reject}}" disabled ></font></center>
                    @else
                    <center><font color="white" size="2"><input type="text" style="width: 15em;" value="aaaaaaaaaaaaa" disabled ></font></center>
                    @endif
                    @if($data->order_quan !== null)
                    <center><font color="black" size="2"><input type="text" style="width: 15em;" value="{{$data->order_quan}}" disabled ></font></center>
                    @else
                    <center><font color="white" size="2"><input type="text" style="width: 15em;" value="aaaaaaaaaaaaa" disabled ></font></center>
                    @endif
                    <div class="container" style="padding-top:20px;">
                        <table>
                            <tr>
                                <td style="height:30px;width:50px">
                                @if($data->status_id == 1)
                                    <center>Pass</center>
                                @elseif($data->status_id == 2)
                                    <center>Fail</center>
                                @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="padding:15px;">
            <center>
            <table style="width:675px">
                <tr>
                    <td><center><font color="black" size="2">Inspection Detail</font></center></td>
                    <td  style="width:60px"><center><font color="black" size="2">Check Item</font></center></td>
                    <td  style="width:110px"><center><font color="black" size="2">Defect Comments</font></center></td>
                    <td  style="width:110px"><center><font color="black" size="2">No. Of Defect</font></center></td>
                    <td  style="width:270px"><center><font color="black" size="2">Remark</font></center></td>
                </tr>
                <tr>
                    <td><font color="black" size="2"> Quality</font></td>
                    @if($data->detail->q_ci == 1)
                    <td style="padding-left:22px;"><center><input type="radio" value="1" {{ ($data->detail->q_ci == 1 ) ? "checked" : "" }} disabled></center></td>
                    @else
                    <td style="padding-left:22px;"><center><input type="radio"></center></td>
                    @endif
                    <td><center><font color="black" size="2"> {{ $data->detail->q_dc }}</font></center></td>
                    <td><center><font color="black" size="2"> {{ $data->detail->q_od }}</font></center></td>
                    <td><center><font color="black" size="2"> {{ $data->detail->q_remark }}</font></center></td>
                </tr>
                <tr>
                    <td><font color="black" size="2">Color</font></td>
                    @if($data->detail->c_ci == 1)
                    <td style="padding-left:22px;"><center><input type="radio" value="1" {{ ($data->detail->c_ci == 1 ) ? "checked" : "" }} disabled></center></td>
                    @else
                    <td style="padding-left:22px;"><center><input type="radio"></center></td>
                    @endif
                    <td><center><font color="black" size="2"> {{ $data->detail->c_dc }}</font></center></td>
                    <td><center><font color="black" size="2"> {{ $data->detail->c_od }}</font></center></td>
                    <td><center><font color="black" size="2"> {{ $data->detail->c_remark }}</font></center></td>
                </tr>
                <tr>
                    <td><font color="black" size="2">Shape</font></td>
                    @if($data->detail->s_ci == 1)
                    <td style="padding-left:22px;"><center><input type="radio" value="1" {{ ($data->detail->s_ci == 1 ) ? "checked" : "" }} disabled></center></td>
                    @else
                    <td style="padding-left:22px;"><center><input type="radio"></center></td>
                    @endif
                    <td><center><font color="black" size="2"> {{ $data->detail->s_dc }}</font></center></td>
                    <td><center><font color="black" size="2"> {{ $data->detail->s_od }}</font></center></td>
                    <td><center><font color="black" size="2"> {{ $data->detail->s_remark }}</font></center></td>
                </tr>
                <tr>
                    <td><font color="black" size="2">Artwork</font></td>
                    @if($data->detail->a_ci == 1)
                    <td style="padding-left:22px;"><center><input type="radio" value="1" {{ ($data->detail->a_ci == 1 ) ? "checked" : "" }} disabled></center></td>
                    @else
                    <td style="padding-left:22px;"><center><input type="radio"></center></td>
                    @endif
                    <td><center><font color="black" size="2"> {{ $data->detail->a_dc }}</font></center></td>
                    <td><center><font color="black" size="2"> {{ $data->detail->a_od }}</font></center></td>
                    <td><center><font color="black" size="2"> {{ $data->detail->a_remark }}</font></center></td>
                </tr>
                <tr>
                    <td><font color="black" size="2">Functional</font></td>
                    @if($data->detail->f_ci == 1)
                    <td style="padding-left:22px;"><center><input type="radio" value="1" {{ ($data->detail->f_ci == 1 ) ? "checked" : "" }} disabled></center></td>
                    @else
                    <td style="padding-left:22px;"><center><input type="radio"></center></td>
                    @endif
                    <td><center><font color="black" size="2"> {{ $data->detail->f_dc }}</font></center></td>
                    <td><center><font color="black" size="2"> {{ $data->detail->f_od }}</font></center></td>
                    <td><center><font color="black" size="2"> {{ $data->detail->f_remark }}</font></center></td>
                </tr>
                <tr>
                    <td><font color="black" size="2">Damage</font></td>
                    @if($data->detail->d_ci == 1)
                    <td style="padding-left:22px;"><center><input type="radio" value="1" {{ ($data->detail->d_ci == 1 ) ? "checked" : "" }} disabled></center></td>
                    @else
                    <td style="padding-left:22px;"><center><input type="radio"></center></td>
                    @endif
                    <td><center><font color="black" size="2"> {{ $data->detail->d_dc }}</font></center></td>
                    <td><center><font color="black" size="2"> {{ $data->detail->d_od }}</font></center></td>
                    <td><center><font color="black" size="2"> {{ $data->detail->d_remark }}</font></center></td>
                </tr>
                <tr>
                    <td><font color="black" size="2">Dimensi</font></td>
                    @if($data->detail->di_ci == 1)
                    <td style="padding-left:22px;"><center><input type="radio" value="1" {{ ($data->detail->di_ci == 1 ) ? "checked" : "" }} disabled></center></td>
                    @else
                    <td style="padding-left:22px;"><center><input type="radio"></center></td>
                    @endif
                    <td><center><font color="black" size="2"> {{ $data->detail->di_dc }}</font></center></td>
                    <td><center><font color="black" size="2"> {{ $data->detail->di_od }}</font></center></td>
                    <td><center><font color="black" size="2"> {{ $data->detail->di_remark }}</font></center></td>
                </tr>
                <tr>
                    <td><font color="black" size="2">Bar code</font></td>
                    @if($data->detail->b_ci == 1)
                    <td style="padding-left:22px;"><center><input type="radio" value="1" {{ ($data->detail->b_ci == 1 ) ? "checked" : "" }} disabled></center></td>
                    @else
                    <td style="padding-left:22px;"><center><input type="radio"></center></td>
                    @endif
                    <td><center><font color="black" size="2"> {{ $data->detail->b_dc }}</font></center></td>
                    <td><center><font color="black" size="2"> {{ $data->detail->b_od }}</font></center></td>
                    <td><center><font color="black" size="2"> {{ $data->detail->b_remark }}</font></center></td>
                </tr>
                <tr>
                    <td><font color="black" size="2">Metal Detector</font></td>
                    @if($data->detail->m_ci == 1)
                    <td style="padding-left:22px;"><center><input type="radio" value="1" {{ ($data->detail->m_ci == 1 ) ? "checked" : "" }} disabled></center></td>
                    @else
                    <td style="padding-left:22px;"><center><input type="radio"></center></td>
                    @endif
                    <td><center><font color="black" size="2"> {{ $data->detail->m_dc }}</font></center></td>
                    <td><center><font color="black" size="2"> {{ $data->detail->m_od }}</font></center></td>
                    <td><center><font color="black" size="2"> {{ $data->detail->m_remark }}</font></center></td>
                </tr>
            </table>
            </center>
        </div>
        <div class="tables">
            <div class="tables-row">
                <div class="tables-cell">
                    <div class="container" style="padding-bottom:10px;">
                        <font style="color:black;font-weight:bold;" size="2">Sample Attachhed</font>
                    </div>
                    <center><img class="span12" style="height:200px;width:670px"src="{{ storage_path('/app/public/smqc/accessories/'.$data->detail->file) }}"> </center>
                </div>
            </div>
        </div> 
        <div class="tables">
            <div class="tables-row">
                <div class="tables-cell" style="width:40px;"><font color="black" size="2">Note :</FONT></div>
                <div class="tables-cell"><font color="black" size="2">{{ $data->detail->note }}</FONT></div>
            </div>
        </div>
        <div class="tables">
            <div class="tables-row">
                <div class="tables-cell">
                    <div class="container">
                        <center><font color="black" size="2">Known by</font></center>
                    </div>
                </div>
                <div class="tables-cell" style="padding-right:35px;">
                    <div class="container">
                        <center><font color="black" size="2">Known by</font></center>
                    </div>
                </div>
                <div class="tables-cell" style="padding-right:35px;">
                    <div class="container">
                        <center><font color="black" size="2">Inspector</font></center>
                    </div>
                </div>
            </div>
        </div>
        <div class="tables">
            <div class="tables-row">
                <div class="tables-cell">
                    <div class="container">
                        <center><img style="height:20px; width:20px;"  src="{{ storage_path('/app/public/smqc/accessories/ckls.png') }}"></center>
                        <center><font style="font-color:black;font-size:10;">{{ $data->prc_name}}</font></center>
                        <center><font style="font-color:black;font-size:10;text-decoration: overline;">Purchasing</font></center>
                    </div>
                </div>
                <div class="tables-cell">
                    <div class="container">
                        <center><img style="height:20px; width:20px;"  src="{{ storage_path('/app/public/smqc/accessories/ckls.png') }}"></center>
                        <center><font style="font-color:black;font-size:10;">{{ $data->chief_name}}</font></center>
                        <center><font style="font-color:black;font-size:10;text-decoration: overline;"><font color="white">aaaa</font>Chief QA<font color="white">aaaa</font></font></center>
                    </div>
                </div>
                <div class="tables-cell">
                    <div class="container">
                        <center><img style="height:20px; width:20px;"  src="{{ storage_path('/app/public/smqc/accessories/ckls.png') }}"></center>
                        <center><font style="font-color:black;font-size:10;">{{$data->inspector}}</font></center>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>