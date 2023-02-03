<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<style>
table,tr, td, th {
border: 1px solid black;
text-align:center;
font-size:14px;
padding:3px;
margin-bottom: 0;
}
table {
border-collapse: collapse;
}
#tabel{
        width:100%;
        height: auto;
padding:10px;
border: 3px solid grey;
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
h3{
      margin-bottom: -10px;
  }
h4 {
   margin-bottom: -10px;
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
        
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" style="overflow:scroll;">
                            <center><h3>YEARLY REPORT FINAL INSPECTION</h3></center>
                            <center><h4>FACILITY :{{$dataBranch->nama_branch}} </h4></center>
                            <center><h4>YEAR :{{$tahun}} </h4></center>
                            <br>
                              <table class="tables">      
                                <thead>
                                    <tr>
                                        <td style="font-weight:bold;" rowspan="2">NO</td>
                                        <td style="font-weight:bold;" rowspan="2">MONTH</td>
                                        <td style="font-weight:bold;" rowspan="2">BUYER</td>
                                        <td style="font-weight:bold;" colspan="2">NILAI</td>
                                        <td style="font-weight:bold;" rowspan="2">TOTAL</td>
                                        <td style="font-weight:bold;" rowspan="2">REMARK</td>
                                    </tr>
                                    <tr>
                                        <td>PASS</td>
                                        <td>FAIL</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($finalReport as $key => $value) 
                                    <tr>
                                        <td rowspan="{{count($value) + 1}}">{{ $loop->iteration}}</td>
                                        <td rowspan="{{count($value) + 1}}">{{$key}}</td>
                                        <td colspan="5" style="border-bottom:6pt solid rgb(255, 254, 254);padding: 0; "></td>
                                    </tr>
                                    @foreach($value as $dp)
                                    <tr>
                                       <td>{{ $dp['buyer'] }}</td>
                                        <td>{{ $dp['pass'] }}</td>
                                        <td>{{ $dp['fail'] }}</td>
                                        <td>{{ $dp['total'] }}</td>
                                        <td>{{ $dp['remark'] }}</td>
                                    </tr>
                                @endforeach
                                @endforeach
                                </tbody>
                                <tfoot>
                                     <tr>
                                        <th rowspan="2" colspan="3">TOTAL</th>
                                        <th>{{ $passResult }}</th>
                                        <th>{{ $failResult }}</th>
                                        <th>{{ $total }}</th>
                                        <th></th>
                                    </tr>
                                     <tr>
                                        <th rowspan="1" colspan="2">%FAIL</th>
                                        <th>{{ $perFail }} %</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                               </table>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  
</div>
</body>
</html>