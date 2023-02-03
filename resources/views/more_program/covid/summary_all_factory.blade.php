<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<style>
	table, td, th {
  border: 1px solid black;
  font-size:12px;
  padding:3px;
  }
  table {
    border-collapse: collapse;
  }
			#box1{
				width:180px;
				height:180px;
        padding:10px;
        border: 2px solid grey;
				background:white;
			}
      #tabel{
				width:100%;
				height: auto;
        padding:10px;
        border: 2px solid grey;
				background:white;
			}
      #tab{
        width:100%;
				height: auto;
        border: 1px solid grey;
				background:white;
			}
      #tbl{
        width:100%;
				height: 200px;
        border: 1px solid grey;
				background:white;
			}
      h7 {
        text-decoration: overline;
      }
      input[type=text] {
        width: 100%;
      box-sizing: border-box;
      border: none;
      border-bottom: 2px solid black;
}
.dit {
  width: 180px;
  padding: 3px;
  border: 1px solid black;
  margin: 0;
}
.cons {
    width: auto;
    height:150px;
    border: 1px solid black;
} 
.col-lg-6 {width:100%; float:left;}
.tables { display: table; width: 100%;}
.tables-row { display: table-row; }
.tables-cell { display: table-cell; padding: 1em; }
.page_break { page-break-inside: auto; }
</style>
</head>
    <body> 
        <center><font style="font-weight:bold;font-size:24px;">WEEKLY ACTIVITY REPORT</font></center>
        <!-- Summary All Branch  -->
        <br>
        <div class="container">
            <label for="" style="font-weight:bold;font-size:16px;">Summary All Factory</label>
        </div>
        <div class="container">
            <table style="width:1260px">
                <tr style="font-weight:bold;background:#D0D0D0;">
                    <td><center>PT. Gistex Garmen Indonesia</center></td>
                    <td><center>Total</center></td>
                </tr>
                @foreach($summary_all_factory as $key => $value)
                <tr>
                    <td>{{ucwords($value['nama_branch'])}}</td>
                    <td><center>{{$value['total']}}</center></td>
                </tr>
                @endforeach
                <?php
                $total = collect($summary_all_factory)->sum('total');
                ?>
                <tr style="font-weight:bold;background:#BAC1CC;">
                    <td><center>Grand Total</center></td>
                    <td><center>{{$total}}</center></td>
                </tr>
            </table>
        </div>
        
        <!-- Batuk Pilek  -->
        <br>
        <div class="container">
            <label for="" style="font-weight:bold;font-size:16px;">Pernah mengalami demam / batuk / pilek / sakit tenggorokan / sesak nafas dalam minggu ini</label>
        </div>
        <div class="container">
            <table style="width:1260px">
                <tr style="font-weight:bold;background:#D0D0D0;text-align:center;">
                    <td>PT. Gistex Garmen Indonesia</td>
                    <td>Bagian</td>
                    <td>Nama Lengkap</td>
                    <td>NIK</td>
                    <td>No Handphone</td>
                    <td>Bagaimana Kondisi Kesehatan Anda Minggu ini?</td>
                    <td>Jika Pernah, Sebutkan Gejala</td>
                    <td>Total</td>
                </tr>
                <?php
                    $data_batuk = collect($batuk_pilek)->groupBy('branch');
                    $batuk_total = collect($batuk_pilek)->count('id');
                ?>
                @foreach($data_batuk as $key => $value)
                    <?php
                    $branchdetail = collect($value)->groupBy('branchdetail');
                    ?>
                    @foreach($branchdetail as $key2 => $value2)
                        <?php 
                        $total = collect($value2)->count('id');
                        ?>
                        @foreach($value2 as $key3 => $value3)
                            <tr>
                                <td>{{ucwords($value3['nama_branch'])}}</td>
                                <td><center>{{ucwords($value3['bagian'])}}</center></td>
                                <td><center>{{ucwords($value3['nama'])}}</center></td>
                                <td><center>{{$value3['nik']}}</center></td>
                                <td><center>{{$value3['no_hp']}}</center></td>
                                <td><center>{{$value3['answer4']}}</center></td>
                                <td><center>{{$value3['note5']}}</center></td>
                                <td><center>1</center></td>
                            </tr>
                        @endforeach
                        <tr style="font-weight:bold;background:#D0D0D0;">
                            <td colspan="7">Total</td>
                            <td><center>{{$total}}</center></td>
                        </tr>
                    @endforeach
                @endforeach
                <tr style="font-weight:bold;background:#BAC1CC;">
                    <td colspan="7">Grand Total</td>
                    <td><center>{{$batuk_total}}</center></td>
                </tr>
            </table>
        </div>

        <!-- Bepergian Minggu ini  -->
        <br>
        <div class="container">
            <label for="" style="font-weight:bold;font-size:16px;">Bepergian minggu ini</label>
        </div>
        <div class="container">
            <table style="width:1260px">
                <tr style="font-weight:bold;background:#D0D0D0;text-align:center;">
                    <td>PT. Gistex Garmen Indonesia</td>
                    <td>Bagian</td>
                    <td>Nama Lengkap</td>
                    <td>NIK</td>
                    <td>No Handphone</td>
                    <td>Jika Ya, Kemana Tujuan Anda Bepergian?</td>
                    <td>Total</td>
                </tr>
                <?php 
                    $data_berpergian = collect($berpergian)->groupBy('branch');
                    $berpergian_total =  collect($berpergian)->count('id');
                ?>
                @foreach($data_berpergian as $key => $value)
                <?php
                $branchdetail = collect($value)->groupBy('branchdetail');
                ?>
                    @foreach($branchdetail as $key2 => $value2)
                        <?php 
                        $total = collect($value2)->count('id');
                        ?>
                        @foreach($value2 as $key3 => $value3)
                            <tr>
                                <td>{{ucwords($value3['nama_branch'])}}</td>
                                <td><center>{{ucwords($value3['bagian'])}}</center></td>
                                <td><center>{{ucwords($value3['nama'])}}</center></td>
                                <td><center>{{$value3['nik']}}</center></td>
                                <td><center>{{$value3['no_hp']}}</center></td>
                                <td><center>{{$value3['answer2']}}</center></td>
                                <td><center>1</center></td>
                            </tr>
                        @endforeach
                        <tr style="font-weight:bold;background:#D0D0D0;">
                            <td colspan="6">Total</td>
                            <td><center>{{$total}}</center></td>
                        </tr>
                    @endforeach
                @endforeach
                <tr style="font-weight:bold;background:#BAC1CC;">
                    <td colspan="6">Grand Total</td>
                    <td><center>{{$berpergian_total}}</center></td>
                </tr>
            </table>
        </div>

        <!-- Menerima tamu dari luar kota minggu ini  -->
        <br>
        <div class="container">
            <label for="" style="font-weight:bold;font-size:16px;">Menerima Tamu Dari Luar Kota Minggu ini</label>
        </div>
        <div class="container">
            <table style="width:1260px">
                <tr style="font-weight:bold;background:#D0D0D0;text-align:center;">
                    <td>PT. Gistex Garmen Indonesia</td>
                    <td>Bagian</td>
                    <td>Nama Lengkap</td>
                    <td>NIK</td>
                    <td>No Handphone</td>
                    <td>Jika Menerima Tamu dari Luar Kota, Sebutkan Tgl Nya</td>
                    <td>Total</td>
                </tr>
                <?php 
                    $data_tamu = collect($menerima_tamu)->groupBy('branch');
                    $tamu_total =  collect($menerima_tamu)->count('id');
                ?>
                @foreach($data_tamu as $key => $value)
                <?php
                $branchdetail = collect($value)->groupBy('branchdetail');
                ?>
                    @foreach($branchdetail as $key2 => $value2)
                        <?php 
                        $total = collect($value2)->count('id');
                        ?>
                        @foreach($value2 as $key3 => $value3)
                            <tr>
                                <td>{{ucwords($value3['nama_branch'])}}</td>
                                <td><center>{{ucwords($value3['bagian'])}}</center></td>
                                <td><center>{{ucwords($value3['nama'])}}</center></td>
                                <td><center>{{$value3['nik']}}</center></td>
                                <td><center>{{$value3['no_hp']}}</center></td>
                                <td><center>{{$value3['date3']}}</center></td>
                                <td><center>1</center></td>
                            </tr>
                        @endforeach
                        <tr style="font-weight:bold;background:#D0D0D0;">
                            <td colspan="6">Total</td>
                            <td><center>{{$total}}</center></td>
                        </tr>
                    @endforeach
                @endforeach
                <tr style="font-weight:bold;background:#BAC1CC;">
                    <td colspan="6">Grand Total</td>
                    <td><center>{{$tamu_total}}</center></td>
                </tr>
            </table>
        </div>

        <!-- Hilang indera penciuman  -->
        <br>
        <div class="container">
            <label for="" style="font-weight:bold;font-size:16px;">Pernah mengalami hilang indera penciuman atau perasa dalam minggu ini</label>
        </div>
        <div class="container">
            <table style="width:1260px">
                <tr style="font-weight:bold;background:#D0D0D0;text-align:center;">
                    <td>PT. Gistex Garmen Indonesia</td>
                    <td>Bagian</td>
                    <td>Nama Lengkap</td>
                    <td>NIK</td>
                    <td>No Handphone</td>
                    <td>Jika pernah, sebutkan tanggal nya</td>
                    <td>Total</td>
                </tr>
                <?php 
                    $data_penciuman = collect($hilang_penciuman)->groupBy('branch');
                    $penciuman_total =  collect($hilang_penciuman)->count('id');
                ?>
                @foreach($data_penciuman as $key => $value)
                <?php
                $branchdetail = collect($value)->groupBy('branchdetail');
                ?>
                    @foreach($branchdetail as $key2 => $value2)
                        <?php 
                        $total = collect($value2)->count('id');
                        ?>
                        @foreach($value2 as $key3 => $value3)
                            <tr>
                                <td>{{ucwords($value3['nama_branch'])}}</td>
                                <td><center>{{ucwords($value3['bagian'])}}</center></td>
                                <td><center>{{ucwords($value3['nama'])}}</center></td>
                                <td><center>{{$value3['nik']}}</center></td>
                                <td><center>{{$value3['no_hp']}}</center></td>
                                <td><center>{{$value3['date6']}}</center></td>
                                <td><center>1</center></td>
                            </tr>
                        @endforeach
                        <tr style="font-weight:bold;background:#D0D0D0;">
                            <td colspan="6">Total</td>
                            <td><center>{{$total}}</center></td>
                        </tr>
                    @endforeach
                @endforeach
                <tr style="font-weight:bold;background:#BAC1CC;">
                    <td colspan="6">Grand Total</td>
                    <td><center>{{$penciuman_total}}</center></td>
                </tr>
            </table>
        </div>

        <!-- Bertemu dengan yang covid  -->
        <br>
        <div class="container">
            <label for="" style="font-weight:bold;font-size:16px;">Bertemu keluarga, teman, tetangga yang terkena covid minggu ini</label>
        </div>
        <div class="container">
            <table style="width:1260px">
                <tr style="font-weight:bold;background:#D0D0D0;text-align:center;">
                    <td>PT. Gistex Garmen Indonesia</td>
                    <td>Bagian</td>
                    <td>Nama Lengkap</td>
                    <td>NIK</td>
                    <td>No Handphone</td>
                    <td>Jika Ada, Sebutkan</td>
                    <td>Total</td>
                </tr>
                <?php 
                    $data_bertemu = collect($bertemu_covid)->groupBy('branch');
                    $bertemu_total =  collect($bertemu_covid)->count('id');
                ?>
                @foreach($data_bertemu as $key => $value)
                <?php
                $branchdetail = collect($value)->groupBy('branchdetail');
                ?>
                    @foreach($branchdetail as $key2 => $value2)
                        <?php 
                        $total = collect($value2)->count('id');
                        ?>
                        @foreach($value2 as $key3 => $value3)
                            <tr>
                                <td>{{ucwords($value3['nama_branch'])}}</td>
                                <td><center>{{ucwords($value3['bagian'])}}</center></td>
                                <td><center>{{ucwords($value3['nama'])}}</center></td>
                                <td><center>{{$value3['nik']}}</center></td>
                                <td><center>{{$value3['no_hp']}}</center></td>
                                <td><center>{{$value3['answer8']}}</center></td>
                                <td><center>1</center></td>
                            </tr>
                        @endforeach
                        <tr style="font-weight:bold;background:#D0D0D0;">
                            <td colspan="6">Total</td>
                            <td><center>{{$total}}</center></td>
                        </tr>
                    @endforeach
                @endforeach
                <tr style="font-weight:bold;background:#BAC1CC;">
                    <td colspan="6">Grand Total</td>
                    <td><center>{{$bertemu_total}}</center></td>
                </tr>
            </table>
        </div>
    </body>
</html>