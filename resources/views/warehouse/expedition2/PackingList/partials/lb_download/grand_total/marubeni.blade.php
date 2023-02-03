<!-- CTN NO|TTL CTN|Warehouse|Style|Colour|Size|TTL PCS|NW|GW -->
<tr>
    <td style="font-weight:bold;text-align:center;width:100px;background-color:#aeaaaa;">GRAND TOTAL</td>
    <td style="font-weight:bold;text-align:center;width:100px;background-color:#aeaaaa;">{{$total_carton}}</td>
    @if($patokan_wh['warehouse'] != null && $wh != null)
    <td colspan="3" style="font-weight:bold;text-align:center;width:100px;background-color:#aeaaaa;"></td>
    @else
    <td colspan="2" style="font-weight:bold;text-align:center;width:100px;background-color:#aeaaaa;"></td>
    @endif
    <td colspan="{{$jumlahSize}}" style="font-weight:bold;text-align:center;width:100px;background-color:#aeaaaa;"></td>
    <td style="font-weight:bold;text-align:center;width:100px;background-color:#aeaaaa;">{{$total_pcs}}</td>
    <td style="font-weight:bold;text-align:center;width:100px;background-color:#aeaaaa;">{{$total_nw}}</td>
    <td style="font-weight:bold;text-align:center;width:100px;background-color:#aeaaaa;">{{$total_gw}}</td>
</tr>