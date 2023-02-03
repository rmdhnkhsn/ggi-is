<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<head>
    <style>
        table, td, th {
            border: 1px solid black;
            text-align:center;
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
            ext-decoration: overline;
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
        <table>
            <tr>
                <td rowspan="2" style="text-align:center;font-weight:bold;background-color:#C0C0C0;">NO</td>
                <td rowspan="2" style="text-align:center;font-weight:bold;padding:15px;background-color:#C0C0C0;">DATE</td>
                <td rowspan="2" style="text-align:center;font-weight:bold;background-color:#C0C0C0;"></td>
                <td rowspan="2" style="text-align:center;font-weight:bold;background-color:#C0C0C0;">FINISH GOOD</td>
                <td colspan="6" style="text-align:center;font-weight:bold;background-color:#C0C0C0;">STITCHING</td>
                <td colspan="3" style="text-align:center;font-weight:bold;background-color:#C0C0C0;">ATTACHMENT</td>
                <td colspan="6" style="text-align:center;font-weight:bold;background-color:#C0C0C0;">APPERANCE</td>
                <td rowspan="2" style="text-align:center;font-weight:bold;background-color:#C0C0C0;">STICKER</td>
                <td rowspan="2" style="text-align:center;font-weight:bold;background-color:#C0C0C0;">TRIMMING</td>
                <td rowspan="2" style="text-align:center;font-weight:bold;background-color:#C0C0C0;">IRON PROBLEM</td>
                <td rowspan="2" style="text-align:center;font-weight:bold;padding:13px;background-color:#C0C0C0;">MEAS</td>
                <td rowspan="2" style="text-align:center;font-weight:bold;padding:13px;background-color:#C0C0C0;">OTHER</td>
                <td rowspan="2" style="text-align:center;font-weight:bold;background-color:#C0C0C0;">TOT REWORK</td>
                <td rowspan="2" style="text-align:center;font-weight:bold;background-color:#C0C0C0;">TOTAL CHECK</td>
            </tr>
            <tr>
                <td style="text-align:center;font-weight:bold;background-color:#C0C0C0;">BROKEN</td>
                <td style="text-align:center;font-weight:bold;padding:13px;background-color:#C0C0C0;">SKIP</td>
                <td style="text-align:center;font-weight:bold;background-color:#C0C0C0;">PUCKERING /TWISTING</td>
                <td style="text-align:center;font-weight:bold;background-color:#C0C0C0;">CROOKED</td>
                <td style="text-align:center;font-weight:bold;background-color:#C0C0C0;">PLEATED</td>
                <td style="text-align:center;font-weight:bold;background-color:#C0C0C0;">RUN OF STICH</td>
                <td style="text-align:center;font-weight:bold;background-color:#C0C0C0;">HTL /LABEL</td>
                <td style="text-align:center;font-weight:bold;background-color:#C0C0C0;">BUTTON (HOLE)</td>
                <td style="text-align:center;font-weight:bold;background-color:#C0C0C0;">PRINT, EMBRO</td>
                <td style="text-align:center;font-weight:bold;background-color:#C0C0C0;">BAD SHAPE</td>
                <td style="text-align:center;font-weight:bold;background-color:#C0C0C0;">UN-BALANCE</td>
                <td style="text-align:center;font-weight:bold;background-color:#C0C0C0;">SHADING</td>
                <td style="text-align:center;font-weight:bold;background-color:#C0C0C0;">DEFECT ON FAB</td>
                <td style="text-align:center;font-weight:bold;background-color:#C0C0C0;">DIRTY, OIL</td>
                <td style="text-align:center;font-weight:bold;padding:13px;background-color:#C0C0C0;">SHINY</td>
            </tr>
            <?php $no=1;?>
            @foreach($TotalResult as $key => $dp)
            <tr>
                <td rowspan='2' scope="row">{{ $no }}</td>
                <td rowspan='2'>{{$dp['tgl_pengerjaan']}}</td>
                <td style="text-align:center;">Qty</td>
                <td style="text-align:center;">{{$dp['fg']}}</td>
                <td style="text-align:center;">{{$dp['broken']}}</td>
                <td style="text-align:center;">{{$dp['skip']}}</td>
                <td style="text-align:center;">{{$dp['pktw']}}</td>
                <td style="text-align:center;">{{$dp['crooked']}}</td>
                <td style="text-align:center;">{{$dp['pleated']}}</td>
                <td style="text-align:center;">{{$dp['ros']}}</td>
                <td style="text-align:center;">{{$dp['htl']}}</td>
                <td style="text-align:center;">{{$dp['button']}}</td>
                <td style="text-align:center;">{{$dp['print']}}</td>
                <td style="text-align:center;">{{$dp['bs']}}</td>
                <td style="text-align:center;">{{$dp['unb']}}</td>
                <td style="text-align:center;">{{$dp['shading']}}</td>
                <td style="text-align:center;">{{$dp['dof']}}</td>
                <td style="text-align:center;">{{$dp['dirty']}}</td>
                <td style="text-align:center;">{{$dp['shiny']}}</td>
                <td style="text-align:center;">{{$dp['sticker']}}</td>
                <td style="text-align:center;">{{$dp['trimming']}}</td>
                <td style="text-align:center;">{{$dp['ip']}}</td>
                <td style="text-align:center;">{{$dp['meas']}}</td>
                <td style="text-align:center;">{{$dp['other']}}</td>
                <td style="text-align:center;">{{$dp['total_reject']}}</td>
                <td style="text-align:center;" rowspan="2">{{$dp['total_check']}}</td>
            </tr>
            <tr>
                <td style="text-align:center;">%</td>
                <td style="text-align:center;">{{$dp['tot_fg']}} %</td>
                <td style="text-align:center;">{{$dp['tot_broken']}} %</td>
                <td style="text-align:center;">{{$dp['tot_skip']}} %</td>
                <td style="text-align:center;">{{$dp['tot_pktw']}} %</td>
                <td style="text-align:center;">{{$dp['tot_crooked']}} %</td>
                <td style="text-align:center;">{{$dp['tot_pleated']}} %</td>
                <td style="text-align:center;">{{$dp['tot_ros']}} %</td>
                <td style="text-align:center;">{{$dp['tot_htl']}} %</td>
                <td style="text-align:center;">{{$dp['tot_button']}} %</td>
                <td style="text-align:center;">{{$dp['tot_print']}} %</td>
                <td style="text-align:center;">{{$dp['tot_bs']}} %</td>
                <td style="text-align:center;">{{$dp['tot_unb']}} %</td>
                <td style="text-align:center;">{{$dp['tot_shading']}} %</td>
                <td style="text-align:center;">{{$dp['tot_dof']}} %</td>
                <td style="text-align:center;">{{$dp['tot_dirty']}} %</td>
                <td style="text-align:center;">{{$dp['tot_shiny']}} %</td>
                <td style="text-align:center;">{{$dp['tot_sticker']}} %</td>
                <td style="text-align:center;">{{$dp['tot_trimming']}} %</td>
                <td style="text-align:center;">{{$dp['tot_ip']}} %</td>
                <td style="text-align:center;">{{$dp['tot_meas']}} %</td>
                <td style="text-align:center;">{{$dp['tot_other']}} %</td>
                <td style="text-align:center;">{{$dp['p_total_reject']}} %</td>
            </tr>
            <?php $no++ ;?>
            @endforeach
            <tr>
                <td colspan="2" rowspan="2"  style="background-color:#C0C0C0;text-align:center;">TOTAL ALL LINE</td>
                <td style="background-color:#C0C0C0;text-align:center;">Qty</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['fg']}}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['broken']}}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['skip']}}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['pktw']}}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['crooked']}}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['pleated']}}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['ros']}}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['htl']}}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['button']}}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['print']}}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['bs']}}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['unb']}}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['shading']}}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['dof']}}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['dirty']}}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['shiny']}}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['sticker']}}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['trimming']}}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['ip']}}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['meas']}}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['other']}}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['total_reject']}}</td>
                <td style="background-color:#C0C0C0;text-align:center;" rowspan="2">{{$totalLine['total_check']}}</td>
            </tr>
            <tr>
                <td style="background-color:#C0C0C0;text-align:center;">%</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['tot_fg']}} % </td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['tot_broken']}} % </td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['tot_skip']}} % </td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['tot_pktw']}} % </td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['tot_crooked']}} % </td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['tot_pleated']}} % </td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['tot_ros']}} % </td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['tot_htl']}} % </td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['tot_button']}} % </td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['tot_print']}} % </td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['tot_bs']}} % </td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['tot_unb']}} % </td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['tot_shading']}} % </td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['tot_dof']}} % </td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['tot_dirty']}} % </td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['tot_shiny']}} % </td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['tot_sticker']}} % </td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['tot_trimming']}} % </td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['tot_ip']}} % </td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['tot_meas']}} % </td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['tot_other']}} % </td>
                <td style="background-color:#C0C0C0;text-align:center;">{{$totalLine['p_total_reject']}} % % </td>
            </tr>
        </table>
    </body>
</html>