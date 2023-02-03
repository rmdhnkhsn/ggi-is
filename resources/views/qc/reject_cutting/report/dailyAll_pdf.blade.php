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

      <div class="content-wrapper f-poppins">
        <!-- Content Header (Page header) -->

          <section class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body" style="overflow:scroll;">
                                    <center><h3 style="font-weight:bold;">DAILY REJECT FABRIC & CUTTING ALL FACILITY</h3></center>
                                    <center><h4 style="font-weight:bold;">DATE : {{  \Carbon\Carbon::parse($tanggal )->locale('id')->format('d-m-Y') }}</h4></center>
                                    <br>
                                    <table style="width:1300px">
                                        <tr>
                                          <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">NAMA BRANCH</td>
                                          <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">QTY CHECK</td>
                                          <td colspan="6" style="font-weight:bold;">REJECT FABRIC</td>
                                          <td colspan="6" style="font-weight:bold;">REJECT PROSESS POTONG</td>
                                          <td rowspan="2" style="font-weight:bold;">GRAND TOTAL</td>
                                          <td rowspan="2" style="font-weight:bold;">KETERANGAN</td>
                                        </tr>
                                        <tr>
                                          <td style="font-weight:bold;">MISPRINT</td>
                                          <td style="font-weight:bold;">CACAT TENUN</td>
                                          <td style="font-weight:bold;">BOLONG</td>
                                          <td style="font-weight:bold;">KOTOR</td>
                                          <td style="font-weight:bold;">LAIN-LAIN</td>
                                          <td style="font-weight:bold;">TOTAL</td>
                                          <td style="font-weight:bold;">PINGGIR KAIN</td>
                                          <td style="font-weight:bold;">TDK PAS POLA</td>
                                          <td style="font-weight:bold;">KOTOR</td>
                                          <td style="font-weight:bold;">BOLONG</td>
                                          <td style="font-weight:bold;">LAIN-LAIN</td>
                                          <td style="font-weight:bold;">TOTAL</td>
                                        </tr>
                                      @foreach ($finalReportAll as $key => $value)
                                        
                                      <tr>
                                          <td>{{ $value['branch'] }}</td>
                                          <td>{{ $value['qty_check'] }}</td>
                                          <td>{{ $value['f_misprint'] }}</td>
                                          <td>{{ $value['f_cacat_tenun'] }}</td>
                                          <td>{{ $value['f_bolong'] }}</td>
                                          <td>{{ $value['f_kotor'] }}</td>
                                          <td>{{ $value['f_lain_lain'] }}</td>
                                          <td>{{ $value['totalFabric'] }}</td>
                                          <td>{{ $value['c_pinggir_kain'] }}</td>
                                          <td>{{ $value['c_tidak_pas_pola'] }}</td>
                                          <td>{{ $value['c_bolong'] }}</td>
                                          <td>{{ $value['c_kotor'] }}</td>
                                          <td>{{ $value['c_lain_lain'] }}</td>
                                          <td>{{ $value['totalCutting'] }}</td>
                                          <td>{{ $value['grandTotal'] }}</td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2">%PERCENTAGE</td>
                                          <td>{{  round($value['percentage_f_misprint'],2) }}%</td>
                                          <td>{{ round($value['percentage_f_cacat_tenun'],2) }}%</td>
                                          <td>{{ round($value['percentage_f_bolong'],2) }}%</td>
                                          <td>{{  round($value['percentage_f_kotor'],2) }}%</td>
                                          <td>{{  round($value['percentage_f_lain_lain'],2) }}%</td>
                                          <td>{{  round($value['percentage_totalFabric'],2) }}%</td>
                                          <td>{{  round($value['percentage_c_pinggir_kain'],2) }}%</td>
                                          <td>{{  round($value['percentage_c_tidak_pas_pola'],2) }}%</td>
                                          <td>{{  round($value['percentage_c_bolong'],2) }}%</td>
                                          <td>{{  round($value['percentage_c_kotor'],2) }}%</td>
                                          <td>{{  round($value['percentage_c_lain_lain'],2) }}%</td>
                                          <td>{{  round($value['percentage_totalCutting'],2) }}%</td>
                                          <td>{{  round($value['percentage_grandTotal'],2) }}%</td>
                                          <td></td>
                                        </tr>
                                    @endforeach
                                      @foreach ($anualReportFinalAll as $key => $value)
                                        <tr>
                                          <td colspan="1" style="background-color:#C0C0C0;">TOTAL</td>
                                          <td style="background-color:#C0C0C0;">{{ $value['qty_check'] }}</td>
                                          <td style="background-color:#C0C0C0;">{{ $value['total_f_misprint'] }}</td>
                                          <td style="background-color:#C0C0C0;">{{ $value['total_f_cacat_tenun'] }}</td>
                                          <td style="background-color:#C0C0C0;">{{ $value['total_f_bolong'] }}</td>
                                          <td style="background-color:#C0C0C0;">{{ $value['total_f_kotor'] }}</td>
                                          <td style="background-color:#C0C0C0;">{{ $value['total_f_lain_lain'] }}</td>
                                          <td style="background-color:#C0C0C0;">{{ $value['total_totalFabric'] }}</td>
                                          <td style="background-color:#C0C0C0;">{{ $value['total_c_pinggir_kain'] }}</td>
                                          <td style="background-color:#C0C0C0;">{{ $value['total_c_tidak_pas_pola'] }}</td>
                                          <td style="background-color:#C0C0C0;">{{ $value['total_c_bolong'] }}</td>
                                          <td style="background-color:#C0C0C0;">{{ $value['total_c_kotor'] }}</td>
                                          <td style="background-color:#C0C0C0;">{{ $value['total_c_lain_lain'] }}</td>
                                          <td style="background-color:#C0C0C0;">{{ $value['total_totalCutting'] }}</td>
                                          <td style="background-color:#C0C0C0;">{{ $value['total_grandTotal'] }}</td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" style="background-color:#C0C0C0;">PERCENTAGE</td>
                                          <td style="background-color:#C0C0C0;">{{  round($value['percentage_total_f_misprint'],2) }}%</td>
                                          <td style="background-color:#C0C0C0;">{{ round($value['percentage_total_f_cacat_tenun'],2) }}%</td>
                                          <td style="background-color:#C0C0C0;">{{ round($value['percentage_total_f_bolong'],2) }}%</td>
                                          <td style="background-color:#C0C0C0;">{{  round($value['percentage_total_f_kotor'],2) }}%</td>
                                          <td style="background-color:#C0C0C0;">{{  round($value['percentage_total_f_lain_lain'],2) }}%</td>
                                          <td style="background-color:#C0C0C0;">{{  round($value['percentage_total_totalFabric'],2) }}%</td>
                                          <td style="background-color:#C0C0C0;">{{  round($value['percentage_total_c_pinggir_kain'],2) }}%</td>
                                          <td style="background-color:#C0C0C0;">{{  round($value['percentage_total_c_tidak_pas_pola'],2) }}%</td>
                                          <td style="background-color:#C0C0C0;">{{  round($value['percentage_total_c_bolong'],2) }}%</td>
                                          <td style="background-color:#C0C0C0;">{{  round($value['percentage_total_c_kotor'],2) }}%</td>
                                          <td style="background-color:#C0C0C0;">{{  round($value['percentage_total_c_lain_lain'],2) }}%</td>
                                          <td style="background-color:#C0C0C0;">{{  round($value['percentage_total_totalCutting'],2) }}%</td>
                                          <td style="background-color:#C0C0C0;">{{  round($value['percentage_total_grandTotal'],2) }}%</td>
                                          <td></td>
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


