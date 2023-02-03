<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <style>
            div#header{
                background-color: #45baa4;
                color: white;
                font-size: 20px;
                font-weight: bold;
                align-items: center;
                justify-content: center;
                padding:20px;
            }
            
            div#footer{
                background-color: black;
                color:white;
                padding: 20px;  
                align-items: center;
                justify-content: center
            }
            div#content{
                padding:10px;
                background-color:whitesmoke;
            }
            
            td{
                padding:5px;
            }

            .primary{
                border-collapse: collapse;
            }

            .primary th, .primary td {
                border:1px solid black;
                padding:5px;
            }
    </style>
</head>
<body>
        <div id="header">
               {{-- <img src="{{asset('gb/logo-gistex.png')}}" style="float: left"> --}}
                <center>
                PT GISTEX GARMEN INDONESIA<br>{{config('app.name')}}
                </center>
        </div>
            
        <div id="content">
            <b>PENGAJUAN CUTI {{$person->just_info ? '[ JUST INFO ]': ''}}</b>
            
            <p>Hi, {{$person->nama}}. </p>
            <p>Berikut informasi detail pengajuan cuti</p>
            
            <table>
                <tr>
                    <td>Tanggal pengajuan</td>
                    <td>:</td>
                    <td>{{$pengajuanCuti->tgl_input_indo}}</td>
                </tr>
                <tr>
                    <td>Pemohon</td>
                    <td>:</td>
                    <td>{{$pengajuanCuti->nikoriginator}} / {{$pengajuanCuti->karyawan->nama}} /  {{$pengajuanCuti->karyawan->departemensubsub}} ({{$pengajuanCuti->karyawan->group}})</td>
                </tr>
                <tr>
                    <td>Jenis Cuti</td>
                    <td>:</td>
                    <td>{{$pengajuanCuti->string2}}</td>
                </tr>
                @if($pengajuanCuti->string2 == 'Kematian istri / suami / anak' || $pengajuanCuti->string2 == 'Kematian anggota keluarga dalam satu rumah' || $pengajuanCuti->string3 == 'Kematian orang tua / mertua')
                <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td>{{$pengajuanCuti->string3}}</td>
                </tr>
                @endif
                <tr>
                    <td>Lama Cuti</td>
                    <td>:</td>
                    <td>{{$pengajuanCuti->num3}} Hari</td>
                </tr>
                <tr>
                    <td>Tanggal Cuti</td>
                    <td>:</td>
                    <td>{{$pengajuanCuti->tanggal_awal_cuti_indo}} s/d {{$pengajuanCuti->tanggal_akhir_cuti_indo}}</td>
                </tr>
            </table>
            @if(!$person->just_info)
            <table class="primary">
                <tr>
                    <th>Internal url</th>
                    <th>Public url</th>
                </tr>
                
                <tr> 
                    <th><a href="<?=config('app.url'), '/pengajuan-cuti/pending/approve', $percobaan?>" style="display:block; width:6em;text-align: center; height: 1em; padding:10px; background-color: #b3f5be; border: 3px outset whitesmoke;color:black; margin-top:20px; margin-bottom:20px">APPROVE</a></th>
                    <th><a href="<?=config('app.url_public'), '/pengajuan-cuti/pending/approve', $percobaan?>" style="display:block; width:6em;text-align: center; height: 1em; padding:10px; background-color: #b3f5be; border: 3px outset whitesmoke;color:black; margin-top:20px; margin-bottom:20px">APPROVE</a></th>
                </tr>
                <tr> 
                    <th><a href="<?=config('app.url'), '/pengajuan-cuti/pending/disapprove', $percobaan?>" style="display:block; width:6em;text-align: center; height: 1em; padding:10px; background-color: red; border: 3px outset whitesmoke;color:black; margin-top:20px; margin-bottom:20px">DISAPPROVE</a></th>
                    <th><a href="<?=config('app.url_public'), '/pengajuan-cuti/pending/disapprove', $percobaan?>" style="display:block; width:6em;text-align: center; height: 1em; padding:10px; background-color: red; border: 3px outset whitesmoke;color:black; margin-top:20px; margin-bottom:20px">DISAPPROVE</a></th>
                </tr>
                
            </table>

            <ul>
                <li>Gunakan internal url jika anda mengakses email menggunakan jaringan gistex</li>
                <li>Gunakan public url jika anda mengakses email diluar jaringan gistex</li>
                <li>Kedua tombol memiliki fungsi yang sama</li>
                <li>Approve bisa juga dilakukan melalui aplikasi</li>
            </ul>
            @endif
            
            {{-- link approval / confirm / etc  --}}
            {{-- @if(!$person->just_info)
            @if(strtolower($pengajuanCuti->karyawan->group)!='staff')
            <a href="{{$linkApprove}}" style="display:block; width:6em;text-align: center; height: 1em; padding:10px; background-color: #b3f5be; border: 3px outset whitesmoke;color:black; margin-top:20px; margin-bottom:20px">APPROVE</a>
            @endif
            <a href="{{$linkDisapprove}}" style="display:block; width:6em;text-align: center; height: 1em; padding:10px; background-color: red; border: 3px outset whitesmoke;color:black; margin-top:20px; margin-bottom:20px">DISAPPROVE</a>
            @endif --}}
        </div>

        <div id="footer">
            <center>
            Copyright &copy; {{date('Y')}} PT. Gistex Garment Indonesia | IT Department <br>
            <small>Anda menerima email ini karena terdaftar pada {{config('app.name2')}} PT. Gistex Garmen Indonesia</small>
            </center>
        </div>
</body>
</html>