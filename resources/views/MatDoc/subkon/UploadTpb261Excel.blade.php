
<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<head>

</head>
    <body> 
        <table>
              <tr>
                <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">Seri</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">HS code</td>
                <td style="font-weight:bold;text-align:center;width:120px;background-color:#C0C0C0;">SKU/Kode Barang</td>
                <td style="font-weight:bold;text-align:center;width:250px;background-color:#C0C0C0;">Uraian Barang, Merek, Tipe, Ukuran</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Jml Satuan</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">CIF</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Harga Satuan</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Penjumlahan</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Doc Type</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Bc Number</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Doc Date</td>


              </tr>
              <?php $no=0 ?>
              @foreach ($data as $key => $value)
              <?php $no++ ?>

              <tr>
                <td >{{$no}}</td>
                <td >{{$value['hs_code']}}</td>
                <td >{{$value['item_number']}}</td>
                <td >{{$value['deskripsi']}}</td>
                <td >{{$value['jumlah_qty']}}</td>
                <td >{{$value['jumlah_cif']}}</td>
                <td >{{$value['harga_satuan']}}</td>
                <td >{{$value['total_penjumlahan']}}</td>
                <td >{{$value['doc_type']}}</td>
                <td >{{$value['bc_number']}}</td>
                <td >{{$value['doc_date']}}</td>
              </tr>
            @endforeach
        </table>
      <br>
    </body>
</html>
      

                     


