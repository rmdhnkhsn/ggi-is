<!-- Carton No.|TTL CTN| COLOUR |GIII PO#|QTY/SIZE|PCS Per Carton|TTL PCS|NW.|GW. -->
<thead class="bg-thead">
    <tr>      
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">Carton No.</div></th> 
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">TTL CTN</div></th>
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">COLOUR</div></th>
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">GIII PO#</div></th>
        <th colspan="{{$jumlahSize}}" style="font-weight:bold;text-align:center;background-color:#C0C0C0;width:50px;">SIZE</th>
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">PCS Per Carton</div></th>
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">TTL PCS</div></th>
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">N.W</div></th>
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">G.W</div></th>
    </tr>
    <tr>
        @foreach($jenisSize as $key2 => $value2)
            <th style="font-weight:bold;text-align:center;background-color:#C0C0C0;width:50px;"><div class="mb-3">{{$key2}}</div></th>
        @endforeach
    </tr>
</thead>

    