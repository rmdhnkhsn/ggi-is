<!--  CTN.NO|TTL.CTN|Warehouse|Style|Color|Buyer|Size|TTL.PCS|N.W(KGS)|G.W(KGS) -->
<thead class="bg-thead">
    <tr>      
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">CTN.No</div></th> 
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">TTL.CTN</div></th>
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">WAREHOUSE</div></th>
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">Style#</div></th>
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">Color</div></th>
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">Buyer</div></th>
        <th colspan="{{$jumlahSize}}" style="font-weight:bold;text-align:center;background-color:#C0C0C0;width:50px;">Size</th>
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">TTL.PCS</div></th>
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">N.W (KGS)</div></th>
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">G.W (KGS)</div></th>
    </tr>
    <tr>
        @foreach($jenisSize as $key2 => $value2)
            <th style="font-weight:bold;text-align:center;background-color:#C0C0C0;width:50px;"><div class="mb-3">{{$key2}}</div></th>
        @endforeach
    </tr>
</thead>