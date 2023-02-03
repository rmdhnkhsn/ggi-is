
<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<head>

</head>
    <body> 
        <table>
              <tr>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">KEY</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">BUSINNES UNIT</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">SHORT ITEM NO</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">DO TY</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">TRANS QTY</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">TRANS UM</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">LOT SERIAL NUMBER</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">ORDER NUMBER</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">DOCUMENT NUMBER</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">G-L DATE</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">ORDER DATE</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">G-L CAT</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">2ND ITEM NUMBER</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">LOCATION</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">UNIT COST</th>
                <th style="font-weight:bold;text-align:center;width:200px;background-color:#C0C0C0;">EXTENDED COST/PRICE</th>
            </tr>
              @foreach ($data as $key => $value)
            <tr>
                <td>{{$value->F4111_UKID}}</td>
                <td>{{$value->F4111_MCU}}</td>
                <td>{{$value->F4111_ITM}}</td>
                <td>{{$value->F4111_DCT}}</td>
                <td>{{$value->F4111_TRQT}}</td>
                <td>{{$value->F4111_TRUM}}</td>
                <td>{{$value->F4111_LOTN}}</td>
                <td>{{$value->F4111_DOCO}}</td>
                <td>{{$value->F4111_DOC}}</td>
                <td>{{$value->F4111_DGL}}</td>
                <td>{{$value->F4111_TRDJ}}</td>
                <td>{{$value->F4111_GLPT}}</td>
                <td>{{$value->F4111_LITM}}</td>
                <td>{{$value->F4111_LOCN}}</td>
                <td>{{$value->F4111_UNCS}}</td>
                <td>{{$value->F4111_PAID}}</td>
            </tr>
            @endforeach
        </table>
      <br>
    </body>
</html>