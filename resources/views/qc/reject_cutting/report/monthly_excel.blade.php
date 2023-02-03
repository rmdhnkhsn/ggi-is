
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
          <td colspan="16" style="font-weight:bold;font-size:14px;border:1px black solid;text-align:center;" >DATA REJECT FABRIC - CUTTING / MONTH</td>
        </tr>
         <tr>
          <td colspan="16" style="font-weight:bold;font-size:12px;border:1px black solid;text-align:center;">PABRIK :{{ $dataBranch->nama_branch }} </td>
        </tr>
        <tr>
          <td colspan="16" style="font-weight:bold;font-size:12px;border:1px black solid;text-align:center;">MONTH : {{$dataBulan}}</td>
        </tr>  
      </table>
      <br>
        <table>
              <tr>
                <td rowspan="2"style="font-weight:bold;text-align:center;width:90px;background-color:#0c78a3;">TANGGAL</td>
                <td rowspan="2"style="font-weight:bold;text-align:center;width:90px;background-color:#0c78a3;">QTY CHECK</td>
                <td colspan="6" style="font-weight:bold;text-align:center;width:90px;background-color:#fcee35;">REJECT FABRIC</td>
                <td colspan="6" style="font-weight:bold;text-align:center;width:90px;background-color:#87CEEB;">REJECT PROSESS POTONG</td>
                <td rowspan="2" style="font-weight:bold;text-align:center;width:90px;background-color:#0c78a3;">GRAND TOTAL</td>
                <td rowspan="2" style="font-weight:bold;text-align:center;width:90px;background-color:#0c78a3;">KETERANGAN</td>
              </tr>
              <tr>
                <td style="font-weight:bold;text-align:center;width:90px;background-color:#fcee35;">MISPRINT</td>
                <td style="font-weight:bold;text-align:center;width:90px;background-color:#fcee35;">CACAT TENUN</td>
                <td style="font-weight:bold;text-align:center;width:90px;background-color:#fcee35;">BOLONG</td>
                <td style="font-weight:bold;text-align:center;width:90px;background-color:#fcee35;">KOTOR</td>
                <td style="font-weight:bold;text-align:center;width:90px;background-color:#fcee35;">LAIN-LAIN</td>
                <td style="font-weight:bold;text-align:center;width:90px;background-color:#fcee35;">TOTAL</td>
                <td style="font-weight:bold;text-align:center;width:90px;background-color:#87CEEB;">PINGGIR KAIN</td>
                <td style="font-weight:bold;text-align:center;width:90px;background-color:#87CEEB;">TDK PAS POLA</td>
                <td style="font-weight:bold;text-align:center;width:90px;background-color:#87CEEB;">KOTOR</td>
                <td style="font-weight:bold;text-align:center;width:90px;background-color:#87CEEB;">BOLONG</td>
                <td style="font-weight:bold;text-align:center;width:90px;background-color:#87CEEB;">LAIN-LAIN</td>
                <td style="font-weight:bold;text-align:center;width:90px;background-color:#87CEEB;">TOTAL</td>
              </tr>
              @foreach ($ReportBulanan as $key => $value)
              {{-- @php
                dd($ReportBulanan );
              @endphp --}}
              <tr>
                <td style="text-align:center;">{{  \Carbon\Carbon::parse($value['tanggal'] )->locale('id')->format('d-m-Y') }}</td>
                <td style="text-align:center;">{{ $value['qty_check'] }}</td>
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
                <td></td>
              </tr>
              

              <tr>
                <td colspan="2">% PERCENTAGE</td>
                <td style="text-align:center;">{{ round($value['percentage_f_misprint'],2) }}%</td>
                <td style="text-align:center;">{{ round($value['percentage_f_cacat_tenun'],2) }}%</td>
                <td style="text-align:center;">{{ round($value['percentage_f_bolong'],2) }}%</td>
                <td style="text-align:center;">{{ round($value['percentage_f_kotor'],2) }}%</td>
                <td style="text-align:center;">{{ round($value['percentage_f_lain_lain'],2) }}%</td>
                <td style="text-align:center;">{{ round($value['percentage_totalFabric'],2) }}%</td>
                <td style="text-align:center;">{{ round($value['percentage_c_pinggir_kain'],2) }}%</td>
                <td style="text-align:center;">{{ round($value['percentage_c_tidak_pas_pola'],2) }}%</td>
                <td style="text-align:center;">{{ round($value['percentage_c_bolong'],2) }}%</td>
                <td style="text-align:center;">{{ round($value['percentage_c_kotor'],2) }}%</td>
                <td style="text-align:center;">{{ round($value['percentage_c_lain_lain'],2) }}%</td>
                <td style="text-align:center;">{{ round($value['percentage_totalCutting'],2) }}%</td>
                <td style="text-align:center;">{{ round($value['percentage_grandTotal'],2) }}%</td>
                <td></td>
              </tr>
          @endforeach
            @foreach ($ReportBulananFinal as $key => $value)
              <tr>
                <td colspan="1" style="text-align:center;background-color:#C0C0C0;">TOTAL</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{ $value['qty_check'] }}</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{ $value['total_f_misprint'] }}</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{ $value['total_f_cacat_tenun'] }}</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{ $value['total_f_bolong'] }}</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{ $value['total_f_kotor'] }}</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{ $value['total_f_lain_lain'] }}</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{ $value['total_totalFabric'] }}</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{ $value['total_c_pinggir_kain'] }}</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{ $value['total_c_tidak_pas_pola'] }}</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{ $value['total_c_bolong'] }}</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{ $value['total_c_kotor'] }}</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{ $value['total_c_lain_lain'] }}</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{ $value['total_totalCutting'] }}</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{ $value['total_grandTotal'] }}</td>
                <td></td>
              </tr>
              <tr>
                <td colspan="2" style="text-align:center;background-color:#C0C0C0;">PERCENTAGE</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{  round($value['percentage_total_f_misprint'],2) }}%</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{ round($value['percentage_total_f_cacat_tenun'],2) }}%</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{ round($value['percentage_total_f_bolong'],2) }}%</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{  round($value['percentage_total_f_kotor'],2) }}%</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{  round($value['percentage_total_f_lain_lain'],2) }}%</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{  round($value['percentage_total_totalFabric'],2) }}%</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{  round($value['percentage_total_c_pinggir_kain'],2) }}%</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{  round($value['percentage_total_c_tidak_pas_pola'],2) }}%</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{  round($value['percentage_total_c_bolong'],2) }}%</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{  round($value['percentage_total_c_kotor'],2) }}%</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{  round($value['percentage_total_c_lain_lain'],2) }}%</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{  round($value['percentage_total_totalCutting'],2) }}%</td>
                <td style="text-align:center;background-color:#C0C0C0;">{{  round($value['percentage_total_grandTotal'],2) }}%</td>
                <td></td>
              </tr>
            @endforeach
        </table>
      <br>
    </body>
</html>
      

                     


