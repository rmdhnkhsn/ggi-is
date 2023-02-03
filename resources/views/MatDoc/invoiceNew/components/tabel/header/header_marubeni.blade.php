@if ($data->buyer == 'MARUBENI CORPORATION JEPANG')
<tr class="bg-thead2">
    <th>NO</th>
    <th>STYLE</th> 
    <th>ITEM</th>
    <th>CONTRACT NUMBER</th>
    <th>DESCRIPTION OF GOODS</th>
    <th>SIZE</th>
    <th>HS CODE</th>
    <th>QUANTITY</th>
    <th>UNIT</th>
    <th>UNIT PRICE ($)</th>
    <th>AMOUNT ($)</th>                                  
</tr>
@elseif($data->buyer == 'MARUBENI FASHION LINK LTD.')
<tr class="bg-thead2">
    <th>NO</th>
    <th>STYLE</th> 
    <th>CONTRACT NUMBER</th>
    <th>DESCRIPTION OF GOODS</th>
    <th>SIZE</th>
    <th>HS CODE</th>
    <th>QUANTITY</th>
    <th>UNIT</th>
    <th>UNIT PRICE ($)</th>
    <th>AMOUNT ($)</th>                                  
</tr>
@endif