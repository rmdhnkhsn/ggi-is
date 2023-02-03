
<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<head>

</head>
    <body> 
        <table>
              <tr>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">KEY</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">BUSINNES UNIT</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">JENIS DOK</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">NO DAFTAR</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">G-L DATE</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">ORDER DATE</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">SHORT ITEM NO</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">DO TY</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">TRANS QTY</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">TRANS UM</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">LOT SERIAL NUMBER</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">DOCUMENT NUMBER</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">ORDER NUMBER</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">OR TY</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">ADDRESS NUMBER</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">UNIT COST</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">EXTENDED COST/PRICE</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">DESKRIPTION LINE 2</th>
            </tr>
              @foreach ($data as $key => $value)
            <tr>
              <td>{{$value->F564111H_UKID}}</td>
              <td>{{$value->F564111H_MCU}}</td>
              <td>{{$value->F564111H_DSC1}}</td>
              <td>{{$value->F564111H_DSCP2}}</td>
              <td>{{$value->F564111H_DGL}}</td>
              <td>{{$value->F564111H_TRDJ}}</td>
              <td>{{$value->F564111H_ITM}}</td>
              <td>{{$value->F564111H_DCT}}</td>
              <td>{{$value->F564111H_TRQT}}</td>
              <td>{{$value->F564111H_TRUM}}</td>
              <td>{{$value->F564111H_LOTN}}</td>
              <td>{{$value->F564111H_DOC}}</td>
              <td>{{$value->F564111H_DOCO}}</td>
              <td>{{$value->F564111H_DCTO}}</td>
              <td>{{$value->F564111H_AN8}}</td>
              <td>{{$value->F564111H_UNCS}}</td>
              <td>{{$value->F564111H_PAID}}</td>
              <td>{{$value->F564111H_DSC2}}</td>
            </tr>
            @endforeach
        </table>
      <br>
    </body>
</html>