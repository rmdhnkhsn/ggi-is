<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<style>
  tr td {
    background-color: #ffffff;
    border: 2px solid #000000;
    wrap-text: true;
}
	table,th {
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
tr.a {
  word-wrap: normal;
}
.tables { display: table; width: 100%;}
.tables-row { display: table-row; }
.tables-cell { display: table-cell; padding: 1em; }
.page_break { page-break-inside: auto; }
</style>
</head>
  <body> 
    <table style="width:1300px">
      <tr></tr>
      <tr>
           <th colspan="4"  style="font-weight:bold;font-size:14px;text-align:center;width:200px;">PT GISTEX GARMEN INDONESI</th>
           <th colspan="4"  style="font-weight:bold;font-size:14px;text-align:center;width:200px;">ANALYSIS PROCESS REPORT</th>
        </tr>
        <tr>
           <th colspan="4" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">GARMENT ENGINEERING </th>
           <th colspan="4" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">(Operational Breakdown) </th>
        </tr>
        <tr>
           <th colspan="4" style="font-weight:bold;font-size:14px;text-align:center;width:200px;">DEPARTMENT</th>
        </tr>
     
        <br>
        <tr>
              <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">STYLE</th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ $dataSmvHeader['style'] }} </th>
              <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">DATE</th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ $dataSmvHeader['date'] }}</th>
             
        </tr>
        <tr>
            <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">ITEM</th>
            <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ $dataSmvHeader['item'] }}</th>
              <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">LINE</th>
              <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ $dataSmvHeader['line'] }}</th>
            
        </tr>
        <tr>
            <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">AGENT / BUYER</th>
            <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ $dataSmvHeader['buyer'] }} </th>
                <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">MANPOWER </th>
                <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ $dataSmvHeader['manpower'] }}</th>
             
        </tr>
        <tr>
            <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">ORDER QUANTITY</th>
            <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ $dataSmvHeader['qty_order'] }} </th>
                <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">SMV </th>
                <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ round($dataSmvHeader['smv'],2) }}</th>
             
        </tr>
        <tr>
            <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">DESCRIPTION</th>
            <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ $dataSmvHeader['desc'] }} </th>
                <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">TARGET/HOUR </th>
                <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ round($dataSmvHeader['targetSmv'],2) }}</th>
             
        </tr>
        <tr>
            <th colspan="2" style="font-weight:bold;text-align:center;width:100px;"></th>
            <th colspan="2" style="font-weight:bold;text-align:left;width:100px;"></th>
                <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">ALLOWANCE </th>
                <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ $dataSmvHeader['allowance'] }}%</th>
             
        </tr>
        <tr>
            <th colspan="2" style="font-weight:bold;text-align:center;width:100px;"></th>
            <th colspan="2" style="font-weight:bold;text-align:left;width:100px;"></th>
                <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">80% </th>
                <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ floor($dataSmvHeader['dataPersen']) }}Pcs/Hour</th>
             
        </tr>
        <tr>
            <th colspan="2" style="font-weight:bold;text-align:center;width:100px;"></th>
            <th colspan="2" style="font-weight:bold;text-align:left;width:100px;"></th>
                <th colspan="2" style="font-weight:bold;text-align:center;width:100px;">75% </th>
                <th colspan="2" style="font-weight:bold;text-align:left;width:100px;">:{{ floor($dataSmvHeader['dataPersen2']) }}Pcs/Hour</th>
             
        </tr>
    </table>
      <table width="100%" style="border:1px solid #000">
          <thead>
            <tr class="a">
                <th style="font-weight:bold;text-align:center;width:50px;background-color:#10ffff;word-wrap: break-word;">NO</th>
                <th style="font-weight:bold;text-align:center;width:300px;background-color:#10ffff;word-wrap: break-word;">PROCESS OF GARMENT</th>
                <th style="font-weight:bold;text-align:center;width:100px;background-color:#10ffff;word-wrap: break-word;">CAT</th>
                <th style="font-weight:bold;text-align:center;width:100px;background-color:#10ffff;word-wrap: break-word;">Cycle Time</th>
                <th style="font-weight:bold;text-align:center;width:100px;background-color:#10ffff;word-wrap: break-word;">SMV (minute)</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#10ffff;word-wrap: break-word;">PRODUCTION CAPASITY (pcs/hour)</th>
                <th style="font-weight:bold;text-align:center;width:150px;background-color:#10ffff;word-wrap: break-word;">MANPOWER NEED (operator)</th>
                <th style="font-weight:bold;text-align:center;width:100px;background-color:#10ffff;word-wrap: break-word;">ACTUAL MP (operator)</th>
                <th style="font-weight:bold;text-align:center;width:150px;background-color:#10ffff;word-wrap: break-word;">WORKING TIME (hour/ opt)</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#10ffff;word-wrap: break-word;">BALANCE WORKING TIME  (hour/opt)</th>
                <th style="font-weight:bold;text-align:center;width:100px;background-color:#10ffff;word-wrap: break-word;">ACTUAL  M'C (unit)</th>
                <th style="font-weight:bold;text-align:center;width:100px;background-color:#10ffff;word-wrap: break-word;">ATTACHMENT</th>
                <th style="font-weight:bold;text-align:center;width:100px;background-color:#10ffff;word-wrap: break-word;">MACHINE</th>
            </tr>
           
              
          </thead>
          <tbody>
                @foreach ($dataSMV as $key =>$value)
                    <tr>
                        <td style="text-align:center;">{{ $loop->iteration }}</td>
                        <td style="text-align:center;">{{ $value['nama_proses'] }}</td>
                        <td style="text-align:center;">{{ $value['cat'] }}</td>
                        <td style="text-align:center;">{{ $value['cycle_time'] }}</td>
                        <td style="text-align:center;">{{ $value['smv_minute'] }}</td>
                        <td style="text-align:center;">{{ $value['output_pj'] }}</td>
                        <td style="text-align:center;">{{ $value['actual_mp'] }}</td>
                        <td style="text-align:center;">{{ $value['manpower_need'] }}</td>
                        <td style="text-align:center;">{{ $value['working_time'] }}</td>
                        <td style="text-align:center;">{{ $value['working_balance'] }}</td>
                        <td style="text-align:center;">{{ $value['actual_unit'] }}</td>
                        <td style="text-align:center;"></td>
                        <td style="text-align:center;">{{ $value['mesin'] }}</td>
                    </tr>
                    
                @endforeach
          </tbody>
      </table>
    <br>    
  </body>
</html>