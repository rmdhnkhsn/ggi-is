<!-- CTN NO|TTL CTN|WO|Article|PO|Colour|Size|TTL PCS|Unit Of Mesuremen|NW|GW -->
<tbody>
    @foreach($groupBySize as $key10 => $value10)
    <?php 
        $no=$no+$count;
        $dataSizeNya = collect($value10)->first();
        // dd($dataSizeNya);
        $count=$dataSizeNya['qty_carton'];
        $a=$no + $count-1;
        $dicoba_saja = [];
        $pn = collect($rekap_detail)->where('id', $dataSizeNya['rekap_detail_id'])->first();
        if ($pn == null) {
            $colorway = null;
        }else {
            $colorway = $pn->colorway;
        }
        $jumlah_size = collect($value10)->sum('jumlah_size');
    ?>
    <tr>
        <td style="text-align:center">{{ $no }}-{{ $a }}</td>
        <td style="text-align:center">{{$dataSizeNya['qty_carton']}}</td>
        <td style="text-align:center">{{$colorway}}</td>
         <!-- Kode Article untuk semua size  -->
        <?php 
            if ($dataSizeNya['nama_size'] == 'S') {
                $kode = 'A';
            }elseif ($dataSizeNya['nama_size'] == 'M') {
                $kode = 'B';
            }elseif ($dataSizeNya['nama_size'] == 'L') {
                $kode = 'C';
            }elseif ($dataSizeNya['nama_size'] == 'XL') {
                $kode = 'D';
            }elseif ($dataSizeNya['nama_size'] == 'XXL') {
                $kode = 'E';
            }elseif ($dataSizeNya['nama_size'] == '3XL') {
                $kode = 'F';
            }elseif ($dataSizeNya['nama_size'] == '4XL') {
                $kode = 'G';
            }else {
                $kode = null;
            }
        ?>
        <td style="text-align:center">{{$dataSizeNya['style']}}{{$kode}}</td>
        <td style="text-align:center">{{$dataSizeNya['po']}}</td>
        <td style="text-align:center">{{$dataSizeNya['color_code']}}</td>
        @foreach($jenisSize as $key11 => $value11)
        <?php
            $tarikJumlahnya = collect($value11)->where('size_packing_list', $key10)->first();
            if ($tarikJumlahnya == null) {
                $jumlahnya = null;
            }else {
                $jumlahnya = $tarikJumlahnya['jumlah_size'];
            }

        ?>
        <td style="text-align:center;width:50px;">{{$jumlahnya}}</td>
        @endforeach
        <td style="text-align:center;">{{ $jumlah_size }}</td>
        <td style="text-align:center;">{{ $dataSizeNya['satuan'] }}</td>
        <td style="text-align:center;">{{ $dataSizeNya['nw'] }}</td>
        <td style="text-align:center;">{{ $dataSizeNya['gw'] }}</td>
    </tr>
    <?php
        $sumCartoon+= $dataSizeNya['qty_carton'];
        $sumTotalPack+= $jumlah_size*$dataSizeNya['qty_carton'];
        $sumNW+= $dataSizeNya['nw'];
        $sumGW+= $dataSizeNya['gw'];
    ?>
    @endforeach
</tbody>
<!-- baris khusus total  -->
<tr>
    <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">S. TTL.</td>
    <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{$sumCartoon}}</td>
    <td colspan="4" style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
    <?php
        $sizeperWo = [];
        $coba = collect($value)->groupBy('nama_size');
        foreach ($coba as $key5 => $value5) {
            $jumlah_sizenya = collect($value5)->sum('jumlah_size');
            $sizeperWo[] = [
                'nama_size' => $key5,
                'jumlah_sizenya' => $jumlah_sizenya
            ];
        }
    ?>
    @foreach($jenisSize as $key6 => $value6)
        <?php
            $jadinya = collect($sizeperWo)->where('nama_size', $key6)->first();
            if ($jadinya == null) {
                $sizeAkhir = null;
            }else {
                $sizeAkhir = $jadinya['jumlah_sizenya'];
            }
        ?>
        <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;width:50px;">{{$sizeAkhir}}</td>
    @endforeach
    <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{$sumTotalPack}}</td>
    <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;"></td>
    <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{$sumNW}}</td>
    <td style="font-weight:bold;text-align:center;background-color:#f0f0f0;">{{$sumGW}}</td>
</tr>