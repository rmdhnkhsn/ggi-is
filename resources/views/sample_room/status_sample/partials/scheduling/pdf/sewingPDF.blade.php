<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<style>
	table,tr, td, th {
  border: 1px solid black;
  text-align:center;
  font-size:12px;
  padding:3px;
  margin-bottom: 0;
  }

  .header tr, .header th {
      border: none !important;
  }

  table {
    border-collapse: collapse;
    font-size:12px;
  }
    #tabel{
    width:100%;
    height: auto;
    padding:4px;
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
                                    <table style="width: 100%; border:none !important" class="header">
                                        <tr>
                                            <th style="text-align: left; width:15%">Nama Pola</th>
                                            <th style="text-align: left; width:35%">: </th>
                                            <th style="text-align: left; width: 15%">Kode SPL </th>
                                            <th style="text-align: left">: {{ $dataPDF->sample_code}}</th>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left">Nama Cutting</th>
                                            <th style="text-align: left; width:35%">: </th>
                                            <th style="text-align: left; width: 15%">Buyer </th>
                                            <th style="text-align: left">: {{ $dataPDF->buyer}}</th>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left">Nama Sewing</th>
                                            <th style="text-align: left; width:35%">: </th>
                                            <th style="text-align: left; width: 15%">Style </th>
                                            <th style="text-align: left">: {{ $dataPDF->style}}</th>
                                        </tr>
                                    </table>
                                    <br>

                                    <table style="width:100%">
                                        <thead>
                                            <tr>
                                                <td style="font-weight:bold;" colspan="3">POLA</td>
                                                <td style="font-weight:bold;" colspan="3">CUTTING</td>
                                                <td style="font-weight:bold;" colspan="3">SEWING</td>
                                            </tr>
                                            <tr>
                                                <td>POLA PLAN</td>
                                                <td>POLA ACT</td>
                                                <td style="width: 8%">TTD</td>
                                                <td>CUTTING PLAN</td>
                                                <td>CUTTING ACT</td>
                                                <td style="width: 8%">TTD</td>
                                                <td>SEWING PLAN</td>
                                                <td>SEWING ACT</td>
                                                <td style="width: 8%">TTD</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $dataPDF->pattern_start}}</td>
                                                <td>{{ $dataPDF->actual_date_pattern}}</td>
                                                <td></td>
                                                <td>{{ $dataPDF->cutting_start}}</td>
                                                <td>{{ $dataPDF->actual_date_cutting}}</td>
                                                <td></td>
                                                <td>{{ $dataPDF->sewing_start}}</td>
                                                <td>{{ $dataPDF->actual_date_sewing}}</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h4>Keterangan : </h4>
                                    <br>
                                    <br>
                                    <p>------------------------------------------------------------------------------------------------------------------------------------</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>  
      </div>
  </body>
</html>


