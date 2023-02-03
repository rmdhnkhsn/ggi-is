<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
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
        <center><font style="font-weight:bold;font-size:20px;">SAVING COST ANALYTICS</font></center>
        <center><font style="font-weight:bold;font-size:15px;">{{$tahun}}</font></center>
        <br>
        <table style="width:1260px">
            <tr>
                <td rowspan="2" style="font-weight:bold;">NO</td>
                <td rowspan="2" style="font-weight:bold;">BUYER</td>
                <td rowspan="2" style="font-weight:bold;">ITEM</td>
                <td colspan="12" style="font-weight:bold;">MONTH</td>
            </tr>
            <tr>
                @foreach($dataBulan as $key => $value)
                <td>{{$value['namabulan']}}</td>
                @endforeach
            </tr>
            <?php $no=1;?>
            @foreach($buat_tabel as $key => $value)
            <tr>
                <td scope="row">{{ $no }}</td>
                <td>{{$value['buyer_name']}}</td>
                <td>{{$value['item']}}</td>
                <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['januari'], 2, ",", ".")}}</td>
                <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['februari'], 2, ",", ".")}}</td>
                <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['maret'], 2, ",", ".")}}</td>
                <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['april'], 2, ",", ".")}}</td>
                <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['mei'], 2, ",", ".")}}</td>
                <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['juni'], 2, ",", ".")}}</td>
                <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['juli'], 2, ",", ".")}}</td>
                <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['agustus'], 2, ",", ".")}}</td>
                <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['september'], 2, ",", ".")}}</td>
                <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['oktober'], 2, ",", ".")}}</td>
                <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['november'], 2, ",", ".")}}</td>
                <td><span class="title-14-light mr-2">Rp. </span>{{number_format($value['desember'], 2, ",", ".")}}</td>
            </tr>
            <?php $no++ ;?>
            @endforeach
            <?php
            $cek_sitabel = collect($buat_tabel)->count('item');
            ?>
            @if($cek_sitabel != 0)
            <tr>
                <th colspan="3" class="fw-600 text-right bg-white">GRAND TOTAL</th>
                <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('januari'), 2, ",", ".")}}</span></th> 
                <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('februari'), 2, ",", ".")}}</span></th> 
                <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('maret'), 2, ",", ".")}}</span></th> 
                <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('april'), 2, ",", ".")}}</span></th> 
                <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('mei'), 2, ",", ".")}}</span></th> 
                <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('juni'), 2, ",", ".")}}</span></th> 
                <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('juli'), 2, ",", ".")}}</span></th> 
                <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('agustus'), 2, ",", ".")}}</span></th> 
                <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('september'), 2, ",", ".")}}</span></th> 
                <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('oktober'), 2, ",", ".")}}</span></th> 
                <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('november'), 2, ",", ".")}}</span></th> 
                <th><span class="title-14-light mr-2">Rp.</span><span class="fw-600">{{number_format(collect($buat_tabel)->sum('desember'), 2, ",", ".")}}</span></th> 
            </tr>
            @endif
        </table>
    </body>
</html>