
<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<head>

</head>
    <body> 
        <tr>
          <td colspan="3">DATA PENGUSAHA TPB</td>
          <td colspan="7"></td>
          <td colspan="3">DATA PENERIMA SUBKONTRAK :</td>
        </tr>
        <tr>
          <td colspan="3">A. NPWP : {{$data->npwp}}	</td>
          <td colspan="7"></td>
          <td colspan="3">A. NPWP : {{$data->Supplier()->first()->F0101_TAX??''}}	</td>
        </tr>
        <tr>
          <td colspan="3" >B. NAMA TPB : PT.GISTEX GARMEN INDONESIA</td>
          <td colspan="7"></td>
          <td colspan="3" >B. NAMA TPB : {{$data->supplier}}</td>
        </tr>
        <tr>
          <td colspan="3" >C. NOMOR SURAT IJIN TPB : {{$data->izintpb}}</td>
          <td colspan="7" ></td>
          <td colspan="3" >C. ALAMAT : {{$data->SupplierAddress()->first()->F0116_ADD1??''.$data->SupplierAddress()->first()->F0116_ADD2??''.$data->SupplierAddress()->first()->F0116_ADD??''}}</td>
        </tr>
        <tr>
        </tr>
        <tr>
          <td>Kurss: {{$data->kurs}}</td>
        </tr>
        <tr>
        </tr>
        <table>
              <tr>
                <td style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">No</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Hs Code</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Item Number</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Description</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Kebutuhan</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Satuan</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Cons</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">NW</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">GW</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Jenis Dok</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">BC Number</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">DOC Date</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">POS</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">US</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">IDR</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Total US</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Total IDR</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Persentase (%)</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">BM</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">BPT/KG</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">BMT</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">PPN</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">PPH</td>
                <td style="font-weight:bold;text-align:center;width:100px;background-color:#C0C0C0;">Total</td>

                

              </tr>
              @foreach ($jaminan as $key => $value)
              <tr>
                <td >{{$loop->iteration}}</td>
                <td >{{$value['hs_code']}}</td>
                <td >{{$value['item_number']}}</td>
                <td >{{$value['deskripsi']}}</td>
                <td >{{$value['kebutuhan']}}</td>
                <td >{{$value['satuan']}}</td>
                <td >{{$value['consumption']}}</td>
                <td >{{$value['nw']}}</td>
                <td >{{$value['gw']}}</td>
                <td >{{$value['doc_type']}}</td>
                <td >{{$value['bc_number']}}</td>
                <td >{{$value['doc_date']}}</td>
                <td >{{$value['pos']}}</td>
                <td >{{$value['us_price']}}</td>
                <td >{{$value['idr_price']}}</td>
                <td >{{$value['us']}}</td>
                <td >{{$value['idr']}}</td>
                <td >{{$value['persen']}}</td>
                <td >{{$value['bm']}}</td>
                <td >{{$value['bpt']}}</td>
                <td >{{$value['btm']}}</td>
                <td >{{$value['ppn']}}</td>
                <td >{{$value['pph']}}</td>
                <td >{{$value['total']}}</td>
              </tr>
            @endforeach
            <tr>
                <td colspan="16" style="font-weight:bold;" >Total Jaminan</td>
                <td style="font-weight:bold;">{{$total_jaminan['idr']}}</td>
                <td >-</td>
                <td style="font-weight:bold;" >{{$total_jaminan['bm']}}</td>
                <td >-</td>
                <td style="font-weight:bold;" >{{$total_jaminan['btm']}}</td>
                <td style="font-weight:bold;" >{{$total_jaminan['ppn']}}</td>
                <td style="font-weight:bold;" >{{$total_jaminan['pph']}}</td>
                <td style="font-weight:bold;" >{{$total_jaminan['total']}}</td>

              </tr>
        </table>
      <br>
    </body>
</html>
      

                     


