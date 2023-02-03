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
  </body>
</html>