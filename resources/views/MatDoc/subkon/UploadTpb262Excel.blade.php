
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
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Tot Qty</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Jns Satuan</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Tot Netto</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Tot CIF</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Tot Harga Satuan</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Tot Penjumlahan</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Tot BM</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Tot PPN</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Tot PPH</td>



                
              </tr>
              <?php $no=0 ?>
              @foreach ($data as $key => $value)
              <?php $no++ ?>

              <tr>
                <td >{{$no}}</td>
                <td >{{$value['hs_code']}}</td>
                <td >{{$value['kode_barang']}}</td>
                <td >{{$value['nama_barang']}}</td>
                <td >{{$value['qty']}}</td>
                <td >{{$value['satuan']}}</td>
                <td >{{$value['netto']}}</td>
                <td >{{$value['cif']}}</td>
                <td >{{$value['harga_satuan']}}</td>
                <td >{{$value['penjumlahan']}}</td>
                <td >{{$value['harga_bm']}}</td>
                <td >{{$value['harga_ppn']}}</td>
                <td >{{$value['harga_pph']}}</td>
              </tr>
            @endforeach
        </table>
      <br>
    </body>
</html>
      

                     


