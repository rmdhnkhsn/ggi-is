<!DOCTYPE html>
<html lang="en">
<head>
    <style>
         @page{
            size: a4 ;
            margin: 20px;
            font-family: 'verdana';
        }

        th, td {
            font-size: 12px;
            padding: 5px;
        }

        table.primary{
            border-collapse: collapse;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <h2>PT. GISTEX GARMEN INDONESIA</h2>
    <h4 style="text-align: center; padding:0; margin:0">REKAP ABSENSI</h4>
    <table border="1px" class="primary" position='center'>
        <tr>
            <th>Nama</th>
            <td colspan='3'>{{auth()->user()->nama}}</td>
        </tr>
        <tr>
            <th>Branch</th>
            <td colspan='3'>{{auth()->user()->branch}}</td>
        </tr>
        <tr>
            <th>Departemen</th>
            <td colspan='3'>{{auth()->user()->departemen}}</td>
        </tr>
        <tr>
            <th>Bagian</th>
            <td colspan='3'>{{auth()->user()->departemensubsub}}</td>
        </tr>
        <tr>
            <th>Periode</th>
            <td>{{$periode['priode']}}</td>
            <th>Jumlah hadir kerja</th>
            <td>{{$qtyKehadiran}}</td>
        </tr>
    </table>
<br>
    <table border="1px" class="primary" position='center'
        <thead>
            <tr>
                <th>TANGGAL</th>
                <th>MASUK</th>
                <th>PULANG</th>
                <th>ABSEN</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($absen as $item)
                <tr>
                    <td>{{$item['_Tanggal']}}</td>
                    <td>{{$item['_Masuk']}}</td>
                    <td>{{$item['_Pulang']}}</td>
                    <td>{{$item['kondisi']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

