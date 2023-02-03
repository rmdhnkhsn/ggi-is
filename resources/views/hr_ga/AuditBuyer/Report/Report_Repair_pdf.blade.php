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
.page-break {
        page-break-after: always;
    }
</style>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body" style="overflow:scroll;">
                              <div class="row mb-4">
                                <div class="col-12">
                                  <div style="font-size:20px;font-weight:600;margin-bottom:25px">Details Damage Recap</div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="page-break">
                                  <div class="col-12">
                                    <div style="font-size:16px;font-weight:500;margin-bottom:8px">Alarm Button</div>
                                    <table class="table table-bordered table-striped" style="width:100%">
                                        <tr>
                                          <td width="5%" style="font-size:16px;background:#DCDCDC;">No</td>
                                          <td width="10%" style="font-size:16px;background:#DCDCDC;">Kode Lokasi</td>
                                          <td width="20%" style="font-size:16px;background:#DCDCDC;">Lokasi</td>
                                          <td width="15%" style="font-size:16px;background:#DCDCDC;">Kerusakan Terakhir </td>
                                          <td width="15%" style="font-size:16px;background:#DCDCDC;">Total Kerusakan </td>
                                          <td width="35%" style="font-size:16px;background:#DCDCDC;">Keterangan</td>
                                        </tr>
                                        <?php $no=1;?>
                                        @foreach($record_alarm as $key =>$value)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{$value['kode_lokasi']}}</td>
                                            <td>{{$value['nama_lokasi']}}</td>
                                            @if($value['count']> '0')
                                            <td>{{$value['tgl_periksa']}}</td>
                                            <td style="color:#ff3e3e">{{$value['count']}} Kerusakan</td>
                                                @if($value['finish'] != null)
                                                <td>{{$value['finish']}}</td>
                                                @else
                                                <td>Proses Perbaikan</td>
                                                @endif
                                            @else
                                            <td>-</td>
                                            <td><i class="hr-icon-check-report fas fa-check-circle"></i></td>
                                            <td>-</td>
                                            @endif
    
                                        <?php $no++ ;?>
                                      @endforeach
                                    </table>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="page-break">
                                  <div class="col-12">
                                    <div style="font-size:16px;font-weight:500;margin-bottom:8px;margin-top:25px">Smoke Detector</div>
                                    <table class="table table-bordered table-striped" style="width:100%">
                                      <tr>
                                          <td width="5%" style="font-size:16px;background:#DCDCDC;">No</td>
                                          <td width="10%" style="font-size:16px;background:#DCDCDC;">Kode Lokasi</td>
                                          <td width="20%" style="font-size:16px;background:#DCDCDC;">Lokasi</td>
                                          <td width="15%" style="font-size:16px;background:#DCDCDC;">Kerusakan Terakhir </td>
                                          <td width="15%" style="font-size:16px;background:#DCDCDC;">Total Kerusakan </td>
                                          <td width="35%" style="font-size:16px;background:#DCDCDC;">Keterangan</td>
                                      </tr>
                                      <?php $no=1;?>
                                      @foreach($record_SmokeDet as $key =>$value)
                                      <tr>
                                          <td>{{ $no }}</td>
                                          <td>{{$value['kode_lokasi']}}</td>
                                          <td>{{$value['nama_lokasi']}}</td>
                                          @if($value['count']> '0')
                                          <td>{{$value['tgl_periksa']}}</td>
                                          <td style="color:#ff3e3e;">{{$value['count']}} Kerusakan</td>
                                              @if($value['finish'] != null)
                                              <td>{{$value['finish']}}</td>
                                              @else
                                              <td>Proses Perbaikan</td>
                                              @endif
                                          @else
                                          <td>-</td>
                                          <td><i class="hr-icon-check-report fas fa-check-circle"></i></td>
                                          <td>-</td>
                                          @endif
                                      </tr>
                                      <?php $no++ ;?>
                                      @endforeach
                                    </table>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="page-break">
                                  <div class="col-12">
                                    <div style="font-size:16px;font-weight:500;margin-bottom:8px;margin-top:25px">APAR</div>
                                    <table class="table table-bordered table-striped" style="width:100%">
                                      <tr>
                                        <td width="5%" style="font-size:16px;background:#DCDCDC;">No</td>
                                        <td width="10%" style="font-size:16px;background:#DCDCDC;">Kode Lokasi</td>
                                        <td width="20%" style="font-size:16px;background:#DCDCDC;">Lokasi</td>
                                        <td width="15%" style="font-size:16px;background:#DCDCDC;">Kerusakan Terakhir </td>
                                        <td width="15%" style="font-size:16px;background:#DCDCDC;">Total Kerusakan </td>
                                        <td width="35%" style="font-size:16px;background:#DCDCDC;">Keterangan</td>
                                      </tr>
                                      <?php $no=1;?>
                                      @foreach($record_Apar as $key =>$value)
                                      <tr>
                                          <td>{{ $no }}</td>
                                          <td>{{$value['kode_lokasi']}}</td>
                                          <td>{{$value['nama_lokasi']}}</td>
                                          @if($value['count']> '0')
                                          <td>{{$value['tgl_periksa']}}</td>
                                          <td style="color:#ff3e3e;">{{$value['count']}} Kerusakan</td>
                                              @if($value['finish'] != null)
                                              <td>{{$value['finish']}}</td>
                                              @else
                                              <td>Proses Perbaikan</td>
                                              @endif
                                          @else
                                          <td>-</td>
                                          <td><i class="hr-icon-check-report fas fa-check-circle"></i></td>
                                          <td>-</td>
                                          @endif
    
                                      <?php $no++ ;?>
                                      @endforeach
                                    </table>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="page-break">
                                  <div class="col-12">
                                    <div style="font-size:16px;font-weight:500;margin-bottom:8px;margin-top:25px">Emergency Exit</div>
                                    <table class="table table-bordered table-striped" style="width:100%">
                                      <tr>
                                        <td width="5%" style="font-size:16px;background:#DCDCDC;">No</td>
                                        <td width="10%" style="font-size:16px;background:#DCDCDC;">Kode Lokasi</td>
                                        <td width="20%" style="font-size:16px;background:#DCDCDC;">Lokasi</td>
                                        <td width="15%" style="font-size:16px;background:#DCDCDC;">Kerusakan Terakhir </td>
                                        <td width="15%" style="font-size:16px;background:#DCDCDC;">Total Kerusakan </td>
                                        <td width="35%" style="font-size:16px;background:#DCDCDC;">Keterangan</td>
                                      </tr>
                                      <?php $no=1;?>
                                      @foreach($record_EmerExit as $key =>$value)
                                      <tr>
                                          <td>{{ $no }}</td>
                                          <td>{{$value['kode_lokasi']}}</td>
                                          <td>{{$value['nama_lokasi']}}</td>
                                          @if($value['count']> '0')
                                          <td>{{$value['tgl_periksa']}}</td>
                                          <td style="color:#ff3e3e;">{{$value['count']}} Kerusakan</td>
                                              @if($value['finish'] != null)
                                              <td>{{$value['finish']}}</td>
                                              @else
                                              <td>Proses Perbaikan</td>
                                              @endif
                                          @else
                                          <td>-</td>
                                          <td><i class="hr-icon-check-report fas fa-check-circle"></i></td>
                                          <td>-</td>
                                          @endif
                                      </tr>
                                      <?php $no++ ;?>
                                      @endforeach
                                    </table>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <div style="font-size:16px;font-weight:500;margin-bottom:8px;margin-top:25px">Emergency Lamp</div>
                                  <table class="table table-bordered table-striped" style="width:100%">
                                    <tr>
                                      <td width="5%" style="font-size:16px;background:#DCDCDC;">No</td>
                                      <td width="10%" style="font-size:16px;background:#DCDCDC;">Kode Lokasi</td>
                                      <td width="20%" style="font-size:16px;background:#DCDCDC;">Lokasi</td>
                                      <td width="15%" style="font-size:16px;background:#DCDCDC;">Kerusakan Terakhir </td>
                                      <td width="15%" style="font-size:16px;background:#DCDCDC;">Total Kerusakan </td>
                                      <td width="35%" style="font-size:16px;background:#DCDCDC;">Keterangan</td>
                                    </tr>
                                    <?php $no=1;?>
                                    @foreach($record_EmerLamp as $key =>$value)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{$value['kode_lokasi']}}</td>
                                        <td>{{$value['nama_lokasi']}}</td>
                                        @if($value['count']> '0')
                                        <td>{{$value['tgl_periksa']}}</td>
                                        <td style="color:#ff3e3e;">{{$value['count']}} Kerusakan</td>
                                            @if($value['finish'] != null)
                                            <td>{{$value['finish']}}</td>
                                            @else
                                            <td>Proses Perbaikan</td>
                                            @endif
                                        @else
                                        <td>-</td>
                                        <td><i class="hr-icon-check-report fas fa-check-circle"></i></td>
                                        <td>-</td>
                                        @endif
                                    </tr>
                                    <?php $no++ ;?>
                                    @endforeach
                                  </table>
                                </div>
                              </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>
</html>
