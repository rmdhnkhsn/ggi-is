<!--  CTN.No|TTL.CTN|Contract No.| Style#|Description|Breakdownsize|TTL.PCS|N.W (KGS)|G.W(KGS) -->
<tbody>
    @foreach($value as $key3 => $value3)
    <?php 
        $no=$no+$count;
        $count=$value3['qty_carton'];
        $a=$no + $count-1;
        $dicoba_saja = [];
        $pn = collect($rekap_detail)->where('id', $value3['rekap_detail_id'])->first();
        if ($pn != null) {
            $product = $pn->product_name;
            $kontrak = $pn->contract;
        }else {
            $product = null;
            $kontrak = null;
        }
    ?>
    <tr>
        <td style="text-align:center">{{ $no }}-{{ $a }}</td>
        <td style="text-align:center">{{$value3['qty_carton']}}</td>        
        @if($IsianKotakPutih['buyer'] == 'MARUBENI FASHION LINK LTD.')
        <td style="text-align:center">{{$value3['warehouse']}}</td>
        @endif
        <td style="text-align:center">{{$value3['no_kontrak']}}</td>
        <td style="text-align:center">{{$value3['style']}}</td>

        <!-- cari product name dari rekap detail  -->
        <td style="text-align:center">{{$product}}</td>

        <!-- breakdown size  -->
        @foreach($jenisSize as $key4 => $value4)
        <?php
            if ($key4 == $value3['nama_size']) {
                $jumlahnya = $value3['jumlah_size'];
            }else {
                $jumlahnya = null;
            }
        ?>
        <td style="text-align:center">{{$jumlahnya}}</td>
        @endforeach
        
        <td style="text-align:center">{{$value3['total_pcs']}}</td>
        <td style="text-align:center">{{$value3['nw']}}</td>
        <td style="text-align:center">{{$value3['gw']}}</td>

    </tr>
    @endforeach
</tbody>
<!-- baris khusus total  -->
<tr>
    <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">S. TTL.</td>
    <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{$jumlahCartoon}}</td>
    @if($IsianKotakPutih['buyer'] == 'MARUBENI FASHION LINK LTD.')
    <td colspan="4" style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
    @elseif($IsianKotakPutih['buyer'] =='MARUBENI CORPORATION JEPANG')
    <td colspan="3" style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;"></td>
    @endif
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
        <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{$sizeAkhir}}</td>
    @endforeach
    <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{$total_pcs}}</td>
    <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{$nw}}</td>
    <td style="font-weight:bold;text-align:center;width:100px;background-color:#f0f0f0;">{{$gw}}</td>
</tr>