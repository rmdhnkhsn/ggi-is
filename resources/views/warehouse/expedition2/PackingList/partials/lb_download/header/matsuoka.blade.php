<!-- CTN NO|TTL CTN|Style|Contract No|G Number|Size|TTL PCS|NW|GW -->
<thead class="bg-thead">
    <tr>      
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">CTN NO</div></th> 
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">TTL.CTN</div></th>
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">STYLE</div></th>
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3"> CONTRACT NO</div></th>
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">G NUMBER</div></th>
        <th colspan="{{$jumlahSize}}" style="font-weight:bold;text-align:center;width:50px;background-color:#C0C0C0;">SIZE</th>
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">TTL PCS</div></th>
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">N.W (KGS)</div></th>
        <th rowspan="2" style="font-weight:bold;text-align:center;background-color:#C0C0C0;"><div class="mb-3">G.W (KGS)</div></th>
    </tr>
    <tr>
        @foreach($jenisSize as $key2 => $value2)
            <th style="font-weight:bold;text-align:center;background-color:#C0C0C0;width:50px;"><div class="mb-3">{{$key2}}</div></th>
        @endforeach
    </tr>
</thead>