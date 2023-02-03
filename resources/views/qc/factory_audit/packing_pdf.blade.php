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
    margin-left:auto; 
    margin-right:auto;
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
    <div class="content-wrapper f-poppins">
     
        <section class="content-header">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12">
                          <div class="card">
                              <div class="card-body" style="overflow:scroll;">
                                  <center><h3 style="font-weight:bold;">REPORT QC FACTORY AUDIT </h3></center>
                                  <center><h4  style="font-weight:bold;">MONTH : {{ $NamaBulan }} {{ $tahun }}</h4></center>

                                  <br>
                                  <table style="width:1300px">
                                        <tr>
                                          <td style="font-weight:bold;padding-right:15px;padding-left:15px;">NO</td>
                                          <td style="font-weight:bold;padding-right:15px;padding-left:15px;">PO NUMBER</td>
                                          <td style="font-weight:bold;padding-right:15px;padding-left:15px;">BUYER</td>
                                          <td style="font-weight:bold;padding-right:15px;padding-left:15px;">STYLE</td>
                                          <td style="font-weight:bold;padding-right:15px;padding-left:15px;">ORDER QTY</td>
                                          <td style="font-weight:bold;padding-right:15px;padding-left:15px;">STATUS FA</td>
                                          <td style="font-weight:bold;padding-right:15px;padding-left:15px;">REVISION</td>
                                          <td style="font-weight:bold;padding-right:15px;padding-left:15px;">TOTAL REJECT FA</td>
                                          <td style="font-weight:bold;padding-right:15px;padding-left:15px;">TOTAL REJECT REVISION</td>
                                        </tr>
                                      @foreach ($data_awal as $key => $value)
                                        <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $value['po_number'] }}</td>
                                          <td>{{ $value['buyer'] }}</td>
                                          <td>{{ $value['style'] }}</td>
                                          <td>{{ $value['order_qty'] }}</td>
                                          <td>{{ $value['status'] }}</td>
                                          <td>{{ $value['revisian'] }}</td>
                                          <td>{{ $value['total_reject_pcs'] }}</td>
                                          <td>{{ $value['total_reject'] }}</td>
                                        </tr>
                                        @endforeach
                                        @foreach ($data_akhir as $key =>$value )
                                          
                                        <tr>
                                          <td colspan="7" style="background-color:#C0C0C0;">TOTAL</td>
                                          <td style="background-color:#C0C0C0;">{{ $value['total_reject_pcs'] }}</td>
                                          <td style="background-color:#C0C0C0;">{{ $value['total_reject'] }}</td>
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

                     


