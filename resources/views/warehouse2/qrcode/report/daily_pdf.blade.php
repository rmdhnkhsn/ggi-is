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
                                  <center><h3 style="font-weight:bold;">REPORT HARIAN [PENERIMAAN/PENGIRIMAN] [MATERIAL/BARANG JADI/MESIN-SPAREPART</h3></center>
                                  <center><h4>FACILITY : {{ $dataBranch->nama_branch }}  </h4></center> 
                                  <center><h4>DATE : {{ \Carbon\Carbon::parse($tanggal )->locale('id')->format('d-m-Y') }} </h4></center>
                                  <br>
                                  <table style="width:1300px">
                                    <tr>
                                      <td style="font-weight:bold;padding-right:15px;padding-left:15px;">NO</td>
                                      <td style="font-weight:bold;padding-right:15px;padding-left:15px;">DOC NUMBER</td>
                                      <td style="font-weight:bold;padding-right:15px;padding-left:15px;">ITEM</td>
                                      <td style="font-weight:bold;padding-right:15px;padding-left:15px;">DOC TYPE</td>
                                      <td style="font-weight:bold;padding-right:15px;padding-left:15px;">DOC CO</td>
                                      <td style="font-weight:bold;padding-right:15px;padding-left:15px;">TRASACTION DATE</td>
                                      <td style="font-weight:bold;padding-right:15px;padding-left:15px;">BRANCH/PLANT</td>
                                      <td style="font-weight:bold;padding-right:15px;padding-left:15px;">QUANTITY</td>
                                      <td style="font-weight:bold;padding-right:15px;padding-left:15px;">TRANSH UOM</td>
                                      <td style="font-weight:bold;padding-right:15px;padding-left:15px;">UNIST COST</td>
                                      <td style="font-weight:bold;padding-right:15px;padding-left:15px;">EXTENDED</td>
                                      <td style="font-weight:bold;padding-right:15px;padding-left:15px;">LOT/SERIAL</td>
                                      <td style="font-weight:bold;padding-right:15px;padding-left:15px;">LOCATION</td>
                                      <td style="font-weight:bold;padding-right:15px;padding-left:15px;">ORDER CO</td>
                                      <td style="font-weight:bold;padding-right:15px;padding-left:15px;">CLASS CODE</td>
                                      <td style="font-weight:bold;padding-right:15px;padding-left:15px;">GL DATE</td>
                                      
                                    </tr>
                                    @foreach ($data_awal as $key => $value)
                                    <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{ $value['wo'] }}</td>
                                      <td>{{ $value['item'] }}</td>
                                      <td>{{ $value['doc_type'] }}</td>
                                      <td>{{ $value['doc_co'] }}</td>
                                      <td>{{ $value['transaction_date'] }}</td>
                                      <td>{{ $value['branch'] }}</td>
                                      <td>{{ $value['qty'] }}</td>
                                      <td>{{ $value['trans_uom'] }}</td>
                                      <td>{{ $value['unit_cost'] }}</td>
                                      <td>{{ $value['extended'] }}</td>
                                      <td>{{ $value['lot_serial'] }}</td>
                                      <td>{{ $value['location'] }}</td>
                                      <td>{{ $value['order_co'] }}</td>
                                      <td>{{ $value['class_code'] }}</td>
                                      <td>{{ $value['gl_date'] }}</td>
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

                     


