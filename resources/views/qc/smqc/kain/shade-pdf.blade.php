<!DOCTYPE html>
<html lang="en">
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
            #container {
                width: 400px;
                height: 400px;
                border: 2px solid;
            }
            .tables { display: table; width: 100%;}
            .tables-row { display: table-row; }
            .tables-cell { display: table-cell; padding: 1em; }
            .page_break { page-break-before: always; }
        </style>
    </head>
    <body> 
        <div class="container"><center><h4>SHADE LOT REPORT</h4></center></div>
        <div class="tables">
            <div class="tables-row">
                <div class="tables-cell" style="width:100px;">
                <div class="cointainer" style="padding-top:18px;"><font color="black" size="2">BUYER</font></div>
                <div class="cointainer" style="padding-top:10px;"><font color="black" size="2">NO PO</font></div>
                <div class="cointainer" style="padding-top:10px;"><font color="black" size="2">COLOR</font></div>
                <div class="cointainer" style="padding-top:10px;"><font color="black" size="2">ARRIVAL DATE</font></div>
                </div>
                <div class="tables-cell" style="padding-top:23px">
                <center><font color="black" size="2"><input type="text" style="width: 18em;" value="{{$data->shadel->buyer}}" disabled ></font></center>
                <center><font color="black" size="2"><input type="text" style="width: 18em;" value="{{$data->shadel->no_po}}" disabled ></font></center>
                <center><font color="black" size="2"><input type="text" style="width: 18em;" value="{{$data->shadel->color}}" disabled ></font></center>
                <center><font color="black" size="2"><input type="text" style="width: 18em;" value="{{$data->shadel->ad}}" disabled ></font></center>
                </div>
                <div class="tables-cell" style="padding:40px;"></div>
            </div>
        </div>
        <div class="tables">
            <div class="tables-row">
                <div class="tables-cell">
                    <center><img class="span12" style="height:400px;width:690px" src="{{ storage_path('/app/public/smqc/fabric/shade/'.$data->shadel->file) }}"> </center>
                </div>
            </div>
        </div>  
        @foreach($data->newfile as $key => $value)
        <div class="tables">
        <div class="tables-row">
            <div class="tables-cell">
                <center><img class="span12" style="height:400px;width:690px"src="{{ storage_path('/app/public/smqc/fabric/shade/'.$value->file) }}"> </center>
            </div>
        </div>
        </div>  
        @endforeach
        <div class="tables">
            <div class="tables-row">
                <div class="tables-cell" style="width:170px;">
                    <div class="container">
                        <center><font color="black" size="2"></font></center>
                    </div>
                </div>
                <div class="tables-cell" style="width:110px;">
                    <div class="container">
                        <center><font color="black" size="2"></font></center>
                    </div>
                </div>
                <div class="tables-cell" style="width:110px;">
                    <div class="container">
                        <center><font color="black" size="2">Known By</font></center>
                    </div>
                </div>
            </div>
        </div>
        <div class="tables">
            <div class="tables-row">
                <div class="tables-cell" style="width:170px;" >
                    <div class="container"></div>
                </div>
                <div class="tables-cell" style="width:110px;">
                    <div class="container"></div>
                </div>
                <div class="tables-cell" style="width:110px;"> 
                    <div class="container">
                        <center><img style="height:20px; width:20px;"  src="{{ storage_path('/app/public/smqc/fabric/shade/ckls.png') }}"></center>
                        <center><font style="font-color:black;font-size:10;">{{ $data->qm_name}}</font></center>
                        <center><font style="font-color:black;font-size:10;text-decoration: overline;">Chief QA</font></center>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>