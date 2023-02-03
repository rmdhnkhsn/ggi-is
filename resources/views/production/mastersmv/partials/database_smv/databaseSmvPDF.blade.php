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
      margin-top: -15px;
  }

  .headerLogo {

  }
  .logoGistex {
    position: relative;
  }
  .title-side {
    position: absolute;
    top: -30px;
    left: 150px;
  }

  .imgSMV {
    height: 250px;
    width: 300;
    border-radius: 6px;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.082);
  }
  
.tables { display: table; width: 100%;}
.tables-row { display: table-row; }
.tables-cell { display: table-cell; padding: 1em; }
.page_break { page-break-before: always; }
</style>
</head>
    <body> 
    <section class="content-header">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-body" style="overflow:scroll;">
                        <div class="headerLogo">
                            <img class="logoGistex" style="width:130px"src="{{  storage_path('/app/public/databaseSmv/img/gistex.png') }}">
                            <div class="title-side">
                                <h2 style="font-weight:bold;">PT GISTEX GARMEN INDONESIA</h2>
                                <h4>GARMENT ENGINEERING DEPARTMENT</h4> 
                            </div>
                        </div>
                          <center><h2 style="font-weight:bold;font-size:28px">ANALYSIS PROCESS REPORT</h2></center>
                          <center><h4 style="font-size:20px;font-style:italic;margin-top:-24px">(Operational Breakdown)</h4></center>
                          <br>
                          <table style="width: 100%; border:none !important" class="header">
                              <tr>
                                  <th style="text-align: left; width:15%">STYLE</th>
                                  <th style="text-align: left; width:35%">:{{ $dataSmvHeader['style'] }}</th>
                                    
                                    <th style="text-align: left; width: 15%">DATE</th>
                                    <th style="text-align: left">:{{ $dataSmvHeader['date'] }}</th>
                              </tr>
                              <tr>
                                  <th style="text-align: left">ITEM</th>
                                  <th style="text-align: left; width:35%">:{{ $dataSmvHeader['item'] }} </th>
                                 
                                  <th style="text-align: left; width: 15%">LINE </th>
                                  <th style="text-align: left">:{{ $dataSmvHeader['line'] }} </th>
                                 
                              </tr>
                              <tr>
                                  <th style="text-align: left">AGENT / BUYER</th>
                                  <th style="text-align: left; width:35%">:{{ $dataSmvHeader['buyer'] }}</th>
                                  <th style="text-align: left; width: 15%">MANPOWER </th>
                                  <th style="text-align: left">:{{ $dataSmvHeader['manpower'] }} </th>
                              </tr>
                              <tr>
                                  <th style="text-align: left">ORDER QUANTITY</th>
                                  <th style="text-align: left; width:35%">:{{ $dataSmvHeader['qty_order'] }}</th>
                                  <th style="text-align: left; width: 15%">SMV</th>
                                  <th style="text-align: left">:{{ round( $dataSmvHeader['smv'],2) }} </th>
                              </tr>
                              <tr>
                                  <th style="text-align: left">DESCRIPTION</th>
                                  <th style="text-align: left; width:35%">:{{ $dataSmvHeader['desc'] }}</th>
                                  <th style="text-align: left; width: 15%">TARGET/HOUR</th>
                                  <th style="text-align: left">:{{ round($dataSmvHeader['targetSmv'],2) }} </th>
                              </tr>
                              <tr>
                                  <th style="text-align: left"></th>
                                  <th style="text-align: left; width:35%"></th>
                                  <th style="text-align: left; width: 15%">ALLOWANCE</th>
                                  <th style="text-align: left">:{{ $dataSmvHeader['allowance'] }} </th>
                              </tr>
                              <tr>
                                  <th style="text-align: left"></th>
                                  <th style="text-align: left; width:35%"></th>
                                  <th style="text-align: left; width: 15%">80%</th>
                                  <th style="text-align: left">:{{ floor($dataSmvHeader['dataPersen']) }} Pcs/Hour</th>
                              </tr>
                              <tr>
                                  <th style="text-align: left"></th>
                                  <th style="text-align: left; width:35%"></th>
                                  <th style="text-align: left; width: 15%">75%</th>
                                  <th style="text-align: left">:{{ floor($dataSmvHeader['dataPersen2']) }} Pcs/Hour</th>
                              </tr>
                          </table>
                          <br>

                         <table style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="font-weight:bold;padding-right:15px;padding-left:15px;">NO</th>
                                        <th style="font-weight:bold;padding-right:15px;padding-left:15px;">PROCESS OF GARMENT</th>
                                        <th style="font-weight:bold;padding-right:15px;padding-left:15px;">CAT</th>
                                        <th style="font-weight:bold;padding-right:15px;padding-left:15px;">Cycle Time</th>
                                        <th style="font-weight:bold;padding-right:15px;padding-left:15px;">SMV (minute)</th>
                                        <th style="font-weight:bold;padding-right:15px;padding-left:15px;">PRODUCTION CAPASITY (pcs/hour)</th>
                                        <th style="font-weight:bold;padding-right:15px;padding-left:15px;">MANPOWER NEED (operator)</th>
                                        <th style="font-weight:bold;padding-right:15px;padding-left:15px;">ACTUAL MP (operator)</th>
                                        <th style="font-weight:bold;padding-right:15px;padding-left:15px;">WORKING TIME (hour/ opt)</th>
                                        <th style="font-weight:bold;padding-right:15px;padding-left:15px;">BALANCE WORKING TIME  (hour/opt)</th>
                                        <th style="font-weight:bold;padding-right:15px;padding-left:15px;">ACTUAL  M'C (unit)</th>
                                        <th style="font-weight:bold;padding-right:15px;padding-left:15px;">ATTACHMENT</th>
                                        <th style="font-weight:bold;padding-right:15px;padding-left:15px;">MACHINE</th>
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
                                            <td style="text-align:center;">{{ round($value['output_pj']) }}</td>
                                            <td style="text-align:center;">{{ $value['actual_mp'] }}</td>
                                            <td style="text-align:center;">{{ round($value['manpower_need']) }}</td>
                                            <td style="text-align:center;">{{ $value['working_time'] }}</td>
                                            <td style="text-align:center;">{{ $value['working_balance'] }}</td>
                                            <td style="text-align:center;">{{ $value['actual_unit'] }}</td>
                                            <td style="text-align:center;"></td>
                                            <td style="text-align:center;">{{ $value['mesin'] }}</td>
                                        </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="skecth" style="margin-top:20px">
                                <div style="margin-bottom:10px;">
                                    <font style="color:black;font-weight:bold;" size="2">SKETCH</font>
                                </div>
                                @if ($dataSmvHeader['foto'] == null)
                                <img class="imgSMV"src="{{  storage_path('/app/public/databaseSmv/img/noimg.jpg') }}">
                                @else
                                <img class="imgSMV"src="{{ storage_path('/app/public/'. $dataSmvHeader['foto'] ) }}">
                                    
                                @endif
                            </div>
                          <br>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>  
  </body>
</html>