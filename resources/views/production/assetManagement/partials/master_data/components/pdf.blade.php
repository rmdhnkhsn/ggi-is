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
    left: 230px;
    align-items: center;
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
<div class="content-wrapper f-poppins">
  
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="overflow:scroll;">
                        <div class="headerLogo">
                            <img class="logoGistex" style="width:130px"src="{{  storage_path('/app/public/databaseSmv/img/gistex.png') }}">
                            <div class="title-side">
                                <center><h2 style="font-weight:bold;">DATA MACHINE ALL</h2></center>
                                <center><h4>PT GISTEX GARMENT INDONESIA</h4></center> 
                            </div>
                        </div>
                        <br>
                           <table style="width:100%">
                              <thead>
                                  <tr class="bg-thead">
                                      <th>ID</th>
                                      <th>CODE</th>
                                      <th>TYPE</th>
                                      <th>CATEGORY</th>
                                      <th>DESCRIPTION</th>
                                      <th>DATE RECIPIENT</th>
                                      <th>BRAND</th>
                                      <th>VARIANT</th>
                                      <th>SERIAL NUMBER</th>
                                      <th>QUANTITY</th>
                                      <th>PRICE</th>
                                      <th>COMPANY</th>
                                      <th>BRANCH ORIGIN</th>
                                      <th>BRANCH LOCATION</th>
                                      <th>LOCATION</th>
                                      <th>LOCATION TYPE</th>
                                      <th>SUPPLIER</th>
                                      <th>CONDITION</th>
                                      <th>ASSETS STATUS</th>
                                  </tr>
                              </thead>
                                <tbody>  
                                    @foreach ($data as $key =>$value)
                                      <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $value['code'] }}</td>
                                          <td>{{ $value['tipe'] }}</td>
                                          <td>{{ $value['jenis'] }}</td>
                                          <td>{{ $value['deskripsi'] }}</td>
                                          <td>{{ $value['date'] }}</td>
                                          <td>{{ $value['merk'] }}</td>
                                          <td>{{ $value['varian'] }}</td>
                                          <td>{{ $value['serialno'] }}</td>
                                          <td>{{ $value['qty'] }}</td>
                                          <td>{{ $value['price'] }}</td>
                                          <td>{{ $value['coOrigin'] }}</td>
                                          <td>{{ $value['brOrigin'] }}</td>
                                          <td>{{ $value['brLokasi'] }}</td>
                                          <td>{{ $value['lokasi'] }}</td>
                                          <td>{{ $value['tipeLokasi'] }}</td>
                                          <td>{{ $value['supplier'] }}</td>
                                          <td>{{ $value['kondisi'] }}</td>
                                          <td>{{ $value['status'] }}</td>
                                      </tr>
                                    @endforeach
                                </tbody>
                          </table>
                          <br>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>  
  </body>
</html>

                     


