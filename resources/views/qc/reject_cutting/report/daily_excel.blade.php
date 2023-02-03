
<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
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
.tables { display: table; width: 100%;}
.tables-row { display: table-row; }
.tables-cell { display: table-cell; padding: 1em; }
.page_break { page-break-inside: auto; }
</style>
</head>
    <body> 
      <table border="1">
        <tr>
          <td colspan="17" style="font-weight:bold;font-size:14px;border:1px black solid;text-align:center;" >DATA REJECT FABRIC - CUTTING / DAY</td>
        </tr> 
        <tr>
          <td colspan="17" style="font-weight:bold;font-size:12px;border:1px black solid;text-align:center;">PABRIK : {{ $dataBranch->nama_branch }}</td>
        </tr>
        <tr>
          <td colspan="17" style="font-weight:bold;font-size:12px;border:1px black solid;text-align:center;">DATE : {{ \Carbon\Carbon::parse($tanggal )->locale('id')->format('d-m-Y') }}</td>
        </tr> 
      </table>
      <br>
       <table class="table">
           <thead>
               <tr>
                <th rowspan="2"style="font-weight:bold;text-align:center;width:100px;">NO</th>
                <th rowspan="2"style="font-weight:bold;text-align:center;width:100px;">WO</th>
                <th rowspan="2"style="font-weight:bold;text-align:center;">BUYER</th>
                <th colspan="6"style="font-weight:bold;text-align:center;width:100px;">REJECT FABRIC</th>
                <th colspan="6"style="font-weight:bold;text-align:center;width:100px;">REJECT PROSESS POTONG</th>
                <th rowspan="2"style="font-weight:bold;text-align:center;width:100px;">GRAND TOTAL</th>
                <th rowspan="2"style="font-weight:bold;text-align:center;width:100px;">KETERANGAN</th>
              </tr>
              <tr>
                <th style="font-weight:bold;text-align:center;width:100px;">MISPRINT</th>
                <th style="font-weight:bold;text-align:center;width:100px;">CACAT TENUN</th>
                <th style="font-weight:bold;text-align:center;width:100px;">BOLONG</th>
                <th style="font-weight:bold;text-align:center;width:100px;">KOTOR</th>
                <th style="font-weight:bold;text-align:center;width:100px;">LAIN-LAIN</th>
                <th style="font-weight:bold;text-align:center;width:100px;">TOTAL</th>
                <th style="font-weight:bold;text-align:center;width:100px;">PINGGIR KAIN</th>
                <th style="font-weight:bold;text-align:center;width:100px;">TDK PAS POLA</th>
                <th style="font-weight:bold;text-align:center;width:100px;">KOTOR</th>
                <th style="font-weight:bold;text-align:center;width:100px;">BOLONG</th>
                <th style="font-weight:bold;text-align:center;width:100px;">LAIN-LAIN</th>
                <th style="font-weight:bold;text-align:center;width:100px;">TOTAL</th>
              </tr>
           </thead>
            <tbody>
              @foreach ($reportHarian as $key => $value)
                <tr>
                  <td style="text-align:center;">{{ $loop->iteration }}</td>
                  <td style="text-align:center;">{{ $value['t_v4801c_doco'] }}</td>
                  <td style="text-align:center;">{{ $value['buyer'] }}</td>
                  <td style="text-align:center;">{{ $value['f_misprint'] }}</td>
                  <td style="text-align:center;">{{ $value['f_cacat_tenun'] }}</td>
                  <td style="text-align:center;">{{ $value['f_bolong'] }}</td>
                  <td style="text-align:center;">{{ $value['f_kotor'] }}</td>
                  <td style="text-align:center;">{{ $value['f_lain_lain'] }}</td>
                  <td style="text-align:center;">{{ $value['totalFabric'] }}</td>
                  <td style="text-align:center;">{{ $value['c_pinggir_kain'] }}</td>
                  <td style="text-align:center;">{{ $value['c_tidak_pas_pola'] }}</td>
                  <td style="text-align:center;">{{ $value['c_bolong'] }}</td>
                  <td style="text-align:center;">{{ $value['c_kotor'] }}</td>
                  <td style="text-align:center;">{{ $value['c_lain_lain'] }}</td>
                  <td style="text-align:center;">{{ $value['totalCutting'] }}</td>
                  <td style="text-align:center;">{{ $value['grandTotal'] }}</td>
                  <td style="text-align:center;">{{ $value['remark'] }}</td>
                </tr>
                <tr>
                  <td colspan="3" style="text-align:center;">% PERCENTAGE</td>
                  <td  style="text-align:center;">{{ round($value['percentage_f_misprint'],2) }}%</td>
                  <td  style="text-align:center;">{{ round($value['percentage_f_cacat_tenun'],2) }}%</td>
                  <td  style="text-align:center;">{{ round($value['percentage_f_bolong'],2) }}%</td>
                  <td  style="text-align:center;">{{ round($value['percentage_f_kotor'],2) }}%</td>
                  <td  style="text-align:center;">{{ round($value['percentage_f_lain_lain'],2) }}%</td>
                  <td  style="text-align:center;">{{ round($value['percentage_totalFabric'],2) }}%</td>
                  <td  style="text-align:center;">{{ round($value['percentage_c_pinggir_kain'],2) }}%</td>
                  <td  style="text-align:center;">{{ round($value['percentage_c_tidak_pas_pola'],2) }}%</td>
                  <td  style="text-align:center;">{{ round($value['percentage_c_bolong'],2) }}%</td>
                  <td  style="text-align:center;">{{ round($value['percentage_c_kotor'],2) }}%</td>
                  <td  style="text-align:center;">{{ round($value['percentage_c_lain_lain'],2) }}%</td>
                  <td  style="text-align:center;">{{ round($value['percentage_totalCutting'],2) }}%</td>
                  <td  style="text-align:center;">{{ round($value['percentage_grandTotal'],2) }}%</td>
                  <td></td>
                </tr>
              @endforeach
              @foreach ($reportHarianFinal as $key => $value)
                <tr>
                  <td colspan="3" style="text-align:center;">TOTAL</td>
                  <td style="text-align:center;">{{ $value['total_f_misprint'] }}</td>
                  <td style="text-align:center;">{{ $value['total_f_cacat_tenun'] }}</td>
                  <td style="text-align:center;">{{ $value['total_f_bolong'] }}</td>
                  <td style="text-align:center;">{{ $value['total_f_kotor'] }}</td>
                  <td style="text-align:center;">{{ $value['total_f_lain_lain'] }}</td>
                  <td style="text-align:center;">{{ $value['total_totalFabric'] }}</td>
                  <td style="text-align:center;">{{ $value['total_c_pinggir_kain'] }}</td>
                  <td style="text-align:center;">{{ $value['total_c_tidak_pas_pola'] }}</td>
                  <td style="text-align:center;">{{ $value['total_c_bolong'] }}</td>
                  <td style="text-align:center;">{{ $value['total_c_kotor'] }}</td>
                  <td style="text-align:center;">{{ $value['total_c_lain_lain'] }}</td>
                  <td style="text-align:center;">{{ $value['total_totalCutting'] }}</td>
                  <td style="text-align:center;">{{ $value['total_grandTotal'] }}</td>
                  <td></td>
                </tr>
                <tr>
                  <td colspan="3" style="text-align:center;">PERCENTAGE</td>
                  <td style="text-align:center;">{{  round($value['percentage_total_f_misprint'],2) }}%</td>
                  <td style="text-align:center;">{{ round($value['percentage_total_f_cacat_tenun'],2) }}%</td>
                  <td style="text-align:center;">{{ round($value['percentage_total_f_bolong'],2) }}%</td>
                  <td style="text-align:center;">{{  round($value['percentage_total_f_kotor'],2) }}%</td>
                  <td style="text-align:center;">{{  round($value['percentage_total_f_lain_lain'],2) }}%</td>
                  <td style="text-align:center;">{{  round($value['percentage_total_totalFabric'],2) }}%</td>
                  <td style="text-align:center;">{{  round($value['percentage_total_c_pinggir_kain'],2) }}%</td>
                  <td style="text-align:center;">{{  round($value['percentage_total_c_tidak_pas_pola'],2) }}%</td>
                  <td style="text-align:center;">{{  round($value['percentage_total_c_bolong'],2) }}%</td>
                  <td style="text-align:center;">{{  round($value['percentage_total_c_kotor'],2) }}%</td>
                  <td style="text-align:center;">{{  round($value['percentage_total_c_lain_lain'],2) }}%</td>
                  <td style="text-align:center;">{{  round($value['percentage_total_totalCutting'],2) }}%</td>
                  <td style="text-align:center;">{{  round($value['percentage_total_grandTotal'],2) }}%</td>
                  <td></td>
                </tr>
              @endforeach
            </tbody>
        </table>
      <br>
    </body>
</html>
      

                     


