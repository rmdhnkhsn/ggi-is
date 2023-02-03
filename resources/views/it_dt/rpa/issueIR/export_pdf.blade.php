<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
    <head>
        <style>
            table, td, th {
            border: 1px solid black;
            font-size:9px;
            padding:3px;
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
            .cons {
                width: auto;
                height:150px;
                border: 1px solid black;
            } 
            .col-lg-6 {width:100%; float:left;}
            .tables { display: table; width: 100%;}
            .tables-row { display: table-row; }
            .tables-cell { display: table-cell; padding: 1em; }
            .page_break { page-break-inside: auto; }
        </style>
    </head>
        <body> 
            <table style="width:100%">
                <thead>
                    <tr>
                        <th>G/L Date</th>
                        <th>Transaction Date</th>
                        <th>To branch/plant</th>
                        <th>From branch/plant</th>
                        <th>ITEM</th>
                        <th>OR BARU</th>
                        <th>QTY</th>
                        <th>UOM</th>
                        <th>Request By</th>
                        <th>Qty2</th>
                        <th>UM2</th>
                        <th>Lokasi2</th>
                        <th>LOT/Serial2</th>
                        <th>Prev Doc</th>
                        <th>Qty Kurang</th>
                        <th>UOM</th>
                        <th>Unit Cost</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $value)
                    @foreach($value->location as $k => $v)  
                    <?php 
                        $pembuat = collect($originator)->where('nik', $value->created_by)->first();
                        $qty_kurang = $value->qty-$value->total_selected;
                        if ($qty_kurang == 0) {
                            $kuantiti = 'Tercukupi';
                        }else {
                            $kuantiti = $qty_kurang;
                        }
                    ?>
                    <tr>
                        <td>{{$value->gl_date}}</td>
                        <td>{{$value->tr_date}}</td>
                        <td>{{$value->to_branch}}</td>
                        <td>{{$v->from_branch}}</td>
                        <td>{{$value->item_no}}</td>
                        <td>{{$value->new_or}}</td>
                        <td>{{$value->qty}}</td>
                        <td>{{$value->uom}}</td>
                        <td>{{$pembuat->nama}}</td>
                        <td>{{$v->from_qty}}</td>
                        <td>{{$v->from_uom}}</td>
                        <td>{{$v->from_loc}}</td>
                        <td>{{$v->from_lot}}</td>
                        <td></td>
                        <td>{{$kuantiti}}</td>
                        <td>{{$value->uom}}</td>
                        <td></td>
                        <td>{{$value->item_desc}}</td>
                    </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </body>
</html>