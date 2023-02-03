
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
          <td colspan="16" style="font-weight:bold;font-size:14px;border:1px black solid;text-align:center;" >DATA REJECT CUTTING / MONTH</td>
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
                <td rowspan="2"style="font-weight:bold;text-align:center; vertical-align:middle; background-color:#f7a713;">BUYER</td>
                <td rowspan="2"style="font-weight:bold;text-align:center; vertical-align:middle;width:90px;background-color:#f7a713;">WO</td>
                <td rowspan="2"style="font-weight:bold;text-align:center; vertical-align:middle;width:90px;background-color:#f7a713;">COLOR</td>
                <td colspan="9" style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">RATIO CUTTING</td>
                <td rowspan="2"style="font-weight:bold;text-align:center;background-color:#87CEEB;"> TOTAL RATIO</td>
                <td rowspan="2"style="font-weight:bold;text-align:center;background-color:#87CEEB;">QTY PER LEMBAR</td>
                <td rowspan="2"style="font-weight:bold;text-align:center;background-color:#f7a713;">QTY MEJA</td>
                <td rowspan="2"style="font-weight:bold;text-align:center;background-color:#f7a713;">QTY CHECK</td>
                <td colspan="9" style="font-weight:bold;text-align:center; vertical-align:middle;width:90px;background-color:#f7a713;">REJECT CUTTING</td>
                <td rowspan="2" style="font-weight:bold;text-align:center; vertical-align:middle;width:90px;background-color:#87CEEB;">TOTAL REJECT</td>
                <td rowspan="2" style="font-weight:bold;text-align:center; vertical-align:middle;width:90px;background-color:#87CEEB;">PERCENTAGE</td>
              </tr>
                <tr>
                    <td style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">S</td>
                    <td style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">M</td>
                    <td style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">L</td>
                    <td style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">F</td>
                    <td style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">O</td>
                    <td style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">LL</td>
                    <td style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">XL</td>
                    <td style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">XS</td>
                    <td style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">XXL</td>
                    <td style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">S</td>
                    <td style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">M</td>
                    <td style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">L</td>
                    <td style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">F</td>
                    <td style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">O</td>
                    <td style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">LL</td>
                    <td style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">XL</td>
                    <td style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">XS</td>
                    <td style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">XXL</td>
              </tr>
               @foreach ($ReportBulanan as $key => $value)
                <tr>
                  <td style="text-align:center;" class="text-nowrap">{{ $value['buyer'] }}</td>
                  <td style="text-align:center;">{{ $value['t_v4801c_doco'] }}</td>
                  <td style="text-align:center;">{{ $value['color'] }}</td>
                  <td style="text-align:center;">{{ $value['ratio_S'] }}</td>
                  <td style="text-align:center;">{{ $value['ratio_M'] }}</td>
                  <td style="text-align:center;">{{ $value['ratio_L'] }}</td>
                  <td style="text-align:center;">{{ $value['ratio_F'] }}</td>
                  <td style="text-align:center;">{{ $value['ratio_O'] }}</td>
                  <td style="text-align:center;">{{ $value['ratio_LL'] }}</td>
                  <td style="text-align:center;">{{ $value['ratio_XL'] }}</td>
                  <td style="text-align:center;">{{ $value['ratio_XS'] }}</td>
                  <td style="text-align:center;">{{ $value['ratio_XXL'] }}</td>
                  <td style="text-align:center;">{{ $value['total_ratio'] }}</td>
                  <td style="text-align:center;">{{ $value['qty_gelar'] }}</td>
                  <td style="text-align:center;">{{ $value['qty_meja'] }}</td>
                  <td style="text-align:center;">{{ $value['qty_check'] }}</td>
                  <td style="text-align:center;">{{ $value['reject_S'] }}</td>
                  <td style="text-align:center;">{{ $value['reject_M'] }}</td>
                  <td style="text-align:center;">{{ $value['reject_L'] }}</td>
                  <td style="text-align:center;">{{ $value['reject_F'] }}</td>
                  <td style="text-align:center;">{{ $value['reject_O'] }}</td>
                  <td style="text-align:center;">{{ $value['reject_LL'] }}</td>
                  <td style="text-align:center;">{{ $value['reject_XL'] }}</td>
                  <td style="text-align:center;">{{ $value['reject_XS'] }}</td>
                  <td style="text-align:center;">{{ $value['reject_XXL'] }}</td>
                  <td style="text-align:center;">{{ $value['total_reject'] }}</td>
                  <td style="text-align:center;">{{round($value['percentage'],2)}}%</td>
                </tr>
            @endforeach
             @foreach ( $ReportRejectBulananFinal as $value )
              <tr>
                <td colspan="3" style="background-color:#C0C0C0;text-align:center;">TOTAL ALL </td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ $value['total_ratio_S'] }}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ $value['total_ratio_M'] }}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ $value['total_ratio_L'] }}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ $value['total_ratio_F'] }}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ $value['total_ratio_O'] }}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ $value['total_ratio_LL'] }}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ $value['total_ratio_XL'] }}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ $value['total_ratio_XS'] }}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ $value['total_ratio_XXL'] }}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ $value['total_total_ratio'] }}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ $value['total_qty_gelar'] }}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ $value['total_qty_meja'] }}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ $value['total_qty_check'] }}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ $value['total_reject_S'] }}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ $value['total_reject_M'] }}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ $value['total_reject_L'] }}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ $value['total_reject_F'] }}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ $value['total_reject_O'] }}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ $value['total_reject_LL'] }}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ $value['total_reject_XL'] }}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ $value['total_reject_XS'] }}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ $value['total_reject_XXL'] }}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ $value['total_total_reject'] }}</td>
                <td style="background-color:#C0C0C0;text-align:center;">{{ round($value['total_percentage'],2)}}%</td>
              </tr>
          @endforeach
        </table>
      {{-- <br>
        <table>
              <tr>
                <td rowspan="2"style="font-weight:bold;text-align:center; vertical-align:middle; background-color:#f7a713;">BUYER</td>
                <td rowspan="2"style="font-weight:bold;text-align:center; vertical-align:middle;width:90px;background-color:#f7a713;">WO</td>
                <td rowspan="2"style="font-weight:bold;text-align:center; vertical-align:middle;width:90px;background-color:#f7a713;">COLOR</td>
                <td colspan="9" style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">RATIO CUTTING</td>
                <td rowspan="2"style="font-weight:bold;text-align:center;background-color:#87CEEB;"> TOTAL RATIO</td>
                <td rowspan="2"style="font-weight:bold;text-align:center;background-color:#87CEEB;">QTY PER LEMBAR</td>
                <td rowspan="2"style="font-weight:bold;text-align:center;background-color:#f7a713;">QTY MEJA</td>
                <td rowspan="2"style="font-weight:bold;text-align:center;background-color:#f7a713;">QTY CHECK</td>
                <td colspan="9" style="font-weight:bold;text-align:center; vertical-align:middle;width:90px;background-color:#f7a713;">REJECT CUTTING</td>
                <td rowspan="2" style="font-weight:bold;text-align:center; vertical-align:middle;width:90px;background-color:#87CEEB;">TOTAL REJECT</td>
                <td rowspan="2" style="font-weight:bold;text-align:center; vertical-align:middle;width:90px;background-color:#87CEEB;">PERCENTAGE</td>
              </tr>
                <tr>
                     <tr>
                        <td  style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">Size 80</td>
                        <td  style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">Size 90</td>
                        <td  style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">Size 100</td>
                        <td  style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">Size 110</td>
                        <td  style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">Size 120</td>
                        <td  style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">Size 130</td>
                        <td  style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">Size 140</td>
                        <td  style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">Size 150</td>
                        <td  style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">Size 160</td>
                        <td  style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">Size 80</td>
                        <td  style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">Size 90</td>
                        <td  style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">Size 100</td>
                        <td  style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">Size 110</td>
                        <td  style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">Size 120</td>
                        <td  style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">Size 130</td>
                        <td  style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">Size 140</td>
                        <td  style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">Size 150</td>
                        <td  style="font-weight:bold;text-align:center;width:90px;background-color:#f7a713;">Size 160</td>
                      </tr>
              </tr>
                @foreach ($ReportBulananSize as $key => $value)
                <tr>
                  <td style="text-align:center;" class="text-nowrap" >{{ $value['buyer'] }}</td>
                  <td style="text-align:center;">{{ $value['t_v4801c_doco'] }}</td>
                  <td style="text-align:center;">{{ $value['color'] }}</td>
                  <td style="text-align:center;">{{ $value['ratio_80'] }}</td>
                  <td style="text-align:center;">{{ $value['ratio_90'] }}</td>
                  <td style="text-align:center;">{{ $value['ratio_100'] }}</td>
                  <td style="text-align:center;">{{ $value['ratio_110'] }}</td>
                  <td style="text-align:center;">{{ $value['ratio_120'] }}</td>
                  <td style="text-align:center;">{{ $value['ratio_130'] }}</td>
                  <td style="text-align:center;">{{ $value['ratio_140'] }}</td>
                  <td style="text-align:center;">{{ $value['ratio_150'] }}</td>
                  <td style="text-align:center;">{{ $value['ratio_160'] }}</td>
                  <td style="text-align:center;">{{ $value['total_ratio_size'] }}</td>
                  <td style="text-align:center;">{{ $value['qty_gelar'] }}</td>
                  <td style="text-align:center;">{{ $value['qty_meja'] }}</td>
                  <td style="text-align:center;">{{ $value['qty_check'] }}</td>
                  <td style="text-align:center;">{{ $value['reject_80'] }}</td>
                  <td style="text-align:center;">{{ $value['reject_90'] }}</td>
                  <td style="text-align:center;">{{ $value['reject_100'] }}</td>
                  <td style="text-align:center;">{{ $value['reject_110'] }}</td>
                  <td style="text-align:center;">{{ $value['reject_120'] }}</td>
                  <td style="text-align:center;">{{ $value['reject_130'] }}</td>
                  <td style="text-align:center;">{{ $value['reject_140'] }}</td>
                  <td style="text-align:center;">{{ $value['reject_150'] }}</td>
                  <td style="text-align:center;">{{ $value['reject_160'] }}</td>
                  <td style="text-align:center;">{{ $value['total_reject_size'] }}</td>
                  <td style="text-align:center;">{{round($value['percentage'],2)}}%</td>
                </tr>
            @endforeach
              @foreach ( $ReportRejectBulananFinalSize as $value )
                <tr>
                  <td colspan="3"  style="background-color:#C0C0C0;text-align:center;">TOTAL ALL </td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ $value['total_ratio_80'] }}</td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ $value['total_ratio_90'] }}</td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ $value['total_ratio_100'] }}</td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ $value['total_ratio_110'] }}</td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ $value['total_ratio_120'] }}</td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ $value['total_ratio_130'] }}</td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ $value['total_ratio_140'] }}</td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ $value['total_ratio_150'] }}</td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ $value['total_ratio_160'] }}</td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ $value['total_total_ratio_size'] }}</td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ $value['total_qty_gelar'] }}</td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ $value['total_qty_meja'] }}</td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ $value['total_qty_check'] }}</td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ $value['total_reject_80'] }}</td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ $value['total_reject_90'] }}</td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ $value['total_reject_100'] }}</td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ $value['total_reject_110'] }}</td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ $value['total_reject_120'] }}</td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ $value['total_reject_130'] }}</td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ $value['total_reject_140'] }}</td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ $value['total_reject_150'] }}</td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ $value['total_reject_160'] }}</td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ $value['total_total_reject_size'] }}</td>
                  <td  style="background-color:#C0C0C0;text-align:center;">{{ round($value['total_percentage'],2)}}%</td>
                </tr>
            @endforeach
        </table>
      <br> --}}
    </body>
</html>
                     


