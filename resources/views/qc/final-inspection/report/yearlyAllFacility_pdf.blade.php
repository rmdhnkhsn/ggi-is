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
.dit {
  width: 180px;
  padding: 3px;
  border: 1px solid black;
  margin: 0;
}
h3{
      margin-bottom: -10px;
  }
h4{
      margin-bottom: -10px;
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
                            <center><h3>ANNUAL REPORT FINAL INSPECTION ALL FACILLITY</h3></center>
                            <center><h4>ALL FACILITY </h4></center>
                            <center><h4>YEAR : {{$tahun}}</h4></center>
                            <br>
                                <table class="tables">  
                                    <thead>
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">MONTH</th>
                                            <th rowspan="2">BRANCH</th>
                                            <th colspan="2">Nilai</th>
                                            <th rowspan="2">TOTAL</th>
                                            <th rowspan="2">REMARK</th>
                                        </tr>
                                        <tr>
                                            <th>PASS</th>
                                            <th>FAIL</th>
                                        </tr>
                                    </thead>
                            
                                        @foreach ($z as $key => $value)
                                        <tr>
                                            <td rowspan="{{count($value) + 1}}">{{ $loop->iteration}}</td>
                                            <td rowspan="{{count($value) + 1}}">{{$key}}</td>
                                            <td colspan="5" style="border-bottom:6pt solid rgb(255, 254, 254);padding: 0; "></td>
                                        </tr>
                                        @foreach($value as $dp)
                                        <tr>
                                            <td>{{ $dp['branchdetail'] }}</td>
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