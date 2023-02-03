<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<style>
	table, td, th {
  border: 1px solid black;
  text-align:center;
  font-size:13px;
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
.div3 {
  width: auto;
  height: auto;  
  padding: 5px;
  border: 1px solid black;
}
</style>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body" style="overflow:scroll;">
                                <h3 style="font-weight:bold;font-size:20px;">Details Damage Recap</h3>
                                <br>
                              <div class="page-break">
                                <center><h3 style="font-weight:bold;font-size:13px;">Alarm Button</h3></center>
                                <table class="table table-bordered" style="margin-left:auto;margin-right:auto">
                                    <tr>
                                        <td style="background-color:#DCDCDC;">No</td>
                                        <td style="background-color:#DCDCDC;">Kode Lokasi</td>
                                        <td style="background-color:#DCDCDC;">Lokasi</td>
                                        <td style="background-color:#DCDCDC;">Kerusakan Terakhir </td>
                                        <td style="background-color:#DCDCDC;">Total Kerusakan </td>
                                        <td style="background-color:#DCDCDC;">Keterangan</td>
							                      </tr>
                                    <?php $no=1;?>
                                    @foreach($record_alarm as $key =>$value)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{$value['kode_lokasi']}}</td>
                                        <td>{{$value['nama_lokasi']}}</td>
                                        @if($value['count']> '0')
                                        <td>{{$value['tgl_periksa']}}</td>
                                        <td style="color:red;">{{$value['count']}} Kerusakan</td>
                                            @if($value['finish'] != null)
                                            <td>{{$value['finish']}}</td>
                                            @else
                                            <td>Proses Perbaikan</td>
                                            @endif
                                        @else
                                        <td>-</td>
                                        <td><i class="fas fa-check-circle"></i></td>
                                        <td>-</td>
                                        @endif

                                    <?php $no++ ;?>
                                   @endforeach
                                </table>
                              </div>
                              <div class="page-break">
                                <center><h3 style="font-weight:bold;font-size:13px;">Smoke Detector</h3></center>
                                <table class="table table-bordered" style="margin-left:auto;margin-right:auto">
                                    <tr>
                                        <td style="background-color:#DCDCDC;">No</td>
                                        <td style="background-color:#DCDCDC;">Kode Lokasi</td>
                                        <td style="background-color:#DCDCDC;">Lokasi</td>
                                        <td style="background-color:#DCDCDC;">Kerusakan Terakhir </td>
                                        <td style="background-color:#DCDCDC;">Total Kerusakan </td>
                                        <td style="background-color:#DCDCDC;">Keterangan</td>
							                      </tr>
                                    <?php $no=1;?>
                                    @foreach($record_SmokeDet as $key =>$value)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{$value['kode_lokasi']}}</td>
                                        <td>{{$value['nama_lokasi']}}</td>
                                        @if($value['count']> '0')
                                        <td>{{$value['tgl_periksa']}}</td>
                                        <td style="color:red;">{{$value['count']}} Kerusakan</td>
                                            @if($value['finish'] != null)
                                            <td>{{$value['finish']}}</td>
                                            @else
                                            <td>Proses Perbaikan</td>
                                            @endif
                                        @else
                                        <td>-</td>
                                        <td><i class="fas fa-check-circle"></i></td>
                                        <td>-</td>
                                        @endif

                                    <?php $no++ ;?>
                                   @endforeach
                                </table>
                              </div>
                                
                                <center><h3 style="font-weight:bold;font-size:13px;">APAR</h3></center>
                                <table class="table table-bordered" style="margin-left:auto;margin-right:auto">
                                    <tr>
                                        <td style="background-color:#DCDCDC;">No</td>
                                        <td style="background-color:#DCDCDC;">Kode Lokasi</td>
                                        <td style="background-color:#DCDCDC;">Lokasi</td>
                                        <td style="background-color:#DCDCDC;">Kerusakan Terakhir </td>
                                        <td style="background-color:#DCDCDC;">Total Kerusakan </td>
                                        <td style="background-color:#DCDCDC;">Keterangan</td>
							                      </tr>
                                    <?php $no=1;?>
                                    @foreach($record_Apar as $key =>$value)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{$value['kode_lokasi']}}</td>
                                        <td>{{$value['nama_lokasi']}}</td>
                                        @if($value['count']> '0')
                                        <td>{{$value['tgl_periksa']}}</td>
                                        <td style="color:red;">{{$value['count']}} Kerusakan</td>
                                            @if($value['finish'] != null)
                                            <td>{{$value['finish']}}</td>
                                            @else
                                            <td>Proses Perbaikan</td>
                                            @endif
                                        @else
                                        <td>-</td>
                                        <td><i class="fas fa-check-circle"></i></td>
                                        <td>-</td>
                                        @endif

                                    <?php $no++ ;?>
                                   @endforeach
                                </table>
                                <br>
                                <br>
                                <center><h3 style="font-weight:bold;font-size:13px;">Emergency Exit</h3></center>
                                <table class="table table-bordered" style="margin-left:auto;margin-right:auto">
                                    <tr>
                                        <td style="background-color:#DCDCDC;">No</td>
                                        <td style="background-color:#DCDCDC;">Kode Lokasi</td>
                                        <td style="background-color:#DCDCDC;">Lokasi</td>
                                        <td style="background-color:#DCDCDC;">Kerusakan Terakhir </td>
                                        <td style="background-color:#DCDCDC;">Total Kerusakan </td>
                                        <td style="background-color:#DCDCDC;">Keterangan</td>
							                      </tr>
                                    <?php $no=1;?>
                                    @foreach($record_EmerExit as $key =>$value)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{$value['kode_lokasi']}}</td>
                                        <td>{{$value['nama_lokasi']}}</td>
                                        @if($value['count']> '0')
                                        <td>{{$value['tgl_periksa']}}</td>
                                        <td style="color:red;">{{$value['count']}} Kerusakan</td>
                                            @if($value['finish'] != null)
                                            <td>{{$value['finish']}}</td>
                                            @else
                                            <td>Proses Perbaikan</td>
                                            @endif
                                        @else
                                        <td>-</td>
                                        <td><i class="fas fa-check-circle"></i></td>
                                        <td>-</td>
                                        @endif

                                    <?php $no++ ;?>
                                   @endforeach
                                </table>
                                <br>
                                <br>
                                <center><h3 style="font-weight:bold;font-size:13px;">Emergency Lamp</h3></center>
                                <table class="table table-bordered" style="margin-left:auto;margin-right:auto">
                                    <tr>
                                        <td style="background-color:#DCDCDC;">No</td>
                                        <td style="background-color:#DCDCDC;">Kode Lokasi</td>
                                        <td style="background-color:#DCDCDC;">Lokasi</td>
                                        <td style="background-color:#DCDCDC;">Kerusakan Terakhir </td>
                                        <td style="background-color:#DCDCDC;">Total Kerusakan </td>
                                        <td style="background-color:#DCDCDC;">Keterangan</td>
							                      </tr>
                                    <?php $no=1;?>
                                    @foreach($record_EmerLamp as $key =>$value)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{$value['kode_lokasi']}}</td>
                                        <td>{{$value['nama_lokasi']}}</td>
                                        @if($value['count']> '0')
                                        <td>{{$value['tgl_periksa']}}</td>
                                        <td style="color:red;">{{$value['count']}} Kerusakan</td>
                                            @if($value['finish'] != null)
                                            <td>{{$value['finish']}}</td>
                                            @else
                                            <td>Proses Perbaikan</td>
                                            @endif
                                        @else
                                        <td>-</td>
                                        <td><i class="fas fa-check-circle"></i></td>
                                        <td>-</td>
                                        @endif

                                    <?php $no++ ;?>
                                   @endforeach
                                </table>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>
</html>
