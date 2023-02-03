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
    align ; left;
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
    <div class="content-wrapper f-poppins">
     
        <section class="content-header">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12">
                          <div class="card">
                              <div class="card-body" style="overflow:scroll;">
                                  <center><h3 style="font-weight:bold;">DATA REJECT CUTTING / MONTH</h3></center>
                                  <center><h4>FACILITY : {{ $dataBranch->nama_branch }}  </h4></center> 
                                  <center><h4>MONTH : {{$dataBulan}} </h4></center>
                                <br>
                                <table style="width:1300px">
                                    <tr>
                                      <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">BUYER</td>
                                      <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">WO</td>
                                      <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">COLOUR</td>
                                      <td colspan="9" style="font-weight:bold;">RATIO CUTTING </td>
                                      <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">TOTAL RATIO</td>
                                      <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">QTY /LEMBAR</td>
                                      <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">QTY MEJA</td>
                                      <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">QTY CHECK</td>
                                      <td colspan="9" style="font-weight:bold;">REJECT CUTTING</td>
                                      <td class="text-nowrap" rowspan="2" style="font-weight:bold;">TOTAL REJECT</td>
                                      <td rowspan="2" style="font-weight:bold;">% PERCENTAGE</td>
                                    </tr>
                                    <tr>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size S</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size M</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size L</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size F</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size O</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size LL</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size XL</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size XS</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size XXL</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size S</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size M</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size L</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size F</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size O</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size LL</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size XL</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size XS</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size XXL</td>
                                    </tr>
                                   @foreach ($ReportBulanan as $key => $value)
                                    
                                    <tr>
                                      <td  class="text-nowrap" >{{ $value['buyer'] }}</td>
                                      <td>{{ $value['t_v4801c_doco'] }}</td>
                                      <td>{{ $value['color'] }}</td>
                                      <td>{{ $value['ratio_S'] }}</td>
                                      <td>{{ $value['ratio_M'] }}</td>
                                      <td>{{ $value['ratio_L'] }}</td>
                                      <td>{{ $value['ratio_F'] }}</td>
                                      <td>{{ $value['ratio_O'] }}</td>
                                      <td>{{ $value['ratio_LL'] }}</td>
                                      <td>{{ $value['ratio_XL'] }}</td>
                                      <td>{{ $value['ratio_XS'] }}</td>
                                      <td>{{ $value['ratio_XXL'] }}</td>
                                      <td>{{ $value['total_ratio'] }}</td>
                                      <td>{{ $value['qty_gelar'] }}</td>
                                      <td>{{ $value['qty_meja'] }}</td>
                                      <td>{{ $value['qty_check'] }}</td>
                                      <td>{{ $value['reject_S'] }}</td>
                                      <td>{{ $value['reject_M'] }}</td>
                                      <td>{{ $value['reject_L'] }}</td>
                                      <td>{{ $value['reject_F'] }}</td>
                                      <td>{{ $value['reject_O'] }}</td>
                                      <td>{{ $value['reject_LL'] }}</td>
                                      <td>{{ $value['reject_XL'] }}</td>
                                      <td>{{ $value['reject_XS'] }}</td>
                                      <td>{{ $value['reject_XXL'] }}</td>
                                      <td>{{ $value['total_reject'] }}</td>
                                      <td>{{round($value['percentage'],2)}}%</td>
                                    </tr>
                                   
                                @endforeach
                                 @foreach ( $ReportRejectBulananFinal as $value )
                                    <tr>
                                      <td colspan="3" style="background-color:#C0C0C0;">TOTAL ALL </td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_ratio_S'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_ratio_M'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_ratio_L'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_ratio_F'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_ratio_O'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_ratio_LL'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_ratio_XL'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_ratio_XS'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_ratio_XXL'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_total_ratio'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_qty_gelar'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_qty_meja'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_qty_check'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_reject_S'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_reject_M'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_reject_L'] }}</td>
                                       <td style="background-color:#C0C0C0;">{{ $value['total_reject_F'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_reject_O'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_reject_LL'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_reject_XL'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_reject_XS'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_reject_XXL'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_total_reject'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ round($value['total_percentage'],2)}}%</td>
                                    </tr>
                                    @endforeach
                                </table>
                                  <br>

                                  <table style="width:1300px">
                                    <tr>
                                      <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">BUYER</td>
                                      <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">WO</td>
                                      <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">COLOUR</td>
                                      <td colspan="9" style="font-weight:bold;">RATIO CUTTING </td>
                                      <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">TOTAL RATIO</td>
                                      <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">QTY /LEMBAR</td>
                                      <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">QTY MEJA</td>
                                      <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">QTY CHECK</td>
                                      <td colspan="9" style="font-weight:bold;">REJECT CUTTING</td>
                                      <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">TOTAL REJECT</td>
                                      <td rowspan="2" style="font-weight:bold;">% PERCENTAGE</td>
                                    </tr>
                                    <tr>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size 80</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size 90</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size 100</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size 110</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size 120</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size 130</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size 140</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size 150</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size 160</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size 80</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size 90</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size 100</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size 110</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size 120</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size 130</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size 140</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size 150</td>
                                      <td class="text-nowrap" style="font-weight:bold;width:125px;">Size 160</td>
                                    </tr>
                                   @foreach ($ReportBulananSize as $key => $value)
                                    
                                    <tr>
                                      <td  class="text-nowrap" >{{ $value['buyer'] }}</td>
                                      <td>{{ $value['t_v4801c_doco'] }}</td>
                                      <td>{{ $value['color'] }}</td>
                                      <td>{{ $value['ratio_80'] }}</td>
                                      <td>{{ $value['ratio_90'] }}</td>
                                      <td>{{ $value['ratio_100'] }}</td>
                                      <td>{{ $value['ratio_110'] }}</td>
                                      <td>{{ $value['ratio_120'] }}</td>
                                      <td>{{ $value['ratio_130'] }}</td>
                                      <td>{{ $value['ratio_140'] }}</td>
                                      <td>{{ $value['ratio_150'] }}</td>
                                      <td>{{ $value['ratio_160'] }}</td>
                                      <td>{{ $value['total_ratio_size'] }}</td>
                                      <td>{{ $value['qty_gelar'] }}</td>
                                      <td>{{ $value['qty_meja'] }}</td>
                                      <td>{{ $value['qty_check'] }}</td>
                                      <td>{{ $value['reject_80'] }}</td>
                                      <td>{{ $value['reject_90'] }}</td>
                                      <td>{{ $value['reject_100'] }}</td>
                                      <td>{{ $value['reject_110'] }}</td>
                                      <td>{{ $value['reject_120'] }}</td>
                                      <td>{{ $value['reject_130'] }}</td>
                                      <td>{{ $value['reject_140'] }}</td>
                                      <td>{{ $value['reject_150'] }}</td>
                                      <td>{{ $value['reject_160'] }}</td>
                                      <td>{{ $value['total_reject_size'] }}</td>
                                      <td>{{round($value['percentage'],2)}}%</td>
                                    </tr>
                                @endforeach
                                 @foreach ( $ReportRejectBulananFinalSize as $value )
                                    <tr>
                                      <td colspan="3" style="background-color:#C0C0C0;">TOTAL ALL </td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_ratio_80'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_ratio_90'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_ratio_100'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_ratio_110'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_ratio_120'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_ratio_130'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_ratio_140'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_ratio_150'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_ratio_160'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_total_ratio_size'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_qty_gelar'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_qty_meja'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_qty_check'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_reject_80'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_reject_90'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_reject_100'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_reject_110'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_reject_120'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_reject_130'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_reject_140'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_reject_150'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_reject_160'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value['total_total_reject_size'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ round($value['total_percentage'],2)}}%</td>
                                    </tr>
                                @endforeach
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

                     


