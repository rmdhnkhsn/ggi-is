<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<style>
	table,tr, td, th {
  border: 1px solid black;
  text-align:center;
  font-size:14px;
  padding:3px;
  margin-bottom: 0;
  }
  table {
    border-collapse: collapse;
  }
    #tabel{
            width:100%;
            height: auto;
    padding:10px;
    border: 3px solid grey;
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
h3{
      margin-bottom: -10px;
  }
h4{
      margin-bottom: -10px;
  }

.page-break {
    page-break-after: always;
}
  
.tables { display: table; width: 100%;}
.tables-row { display: table-row; }
.tables-cell { display: table-cell; padding: 1em; }
.page_break { page-break-before: always; }
</style>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        
                        <div class="card">
                            <div class="card-body" style="overflow:scroll;">
                              <div class="page-break">
                                <center>
                                    <h3 style="font-weight:bold;font-size:20px;"> MONTHLY REPORT SAFETY COMPLIENCE CONTROLL</h3>
                                    <h3 style="font-weight:bold;font-size:15px;"> FACTORY : {{$dataBranch->nama_branch}}</h3>
                                    <h3 style="font-weight:bold;font-size:13px;">{{$dataBulan}}  {{$tahun}}</h3>
                                    <h3 style="font-weight:bold;font-size:13px;">CONTROLL APAR</h3>
                               </center>
                                <br>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="13" style="font-weight:bold;">CONTROLL APAR</td>
							                      </tr>
                                    <tr>
                                        <td style="font-weight:bold;">No</td>
                                        <td style="font-weight:bold;">Kode Lokasi</td>
                                        <td style="font-weight:bold;">Lokasi</td>
                                        <td style="font-weight:bold;">Tanggal Kontrol </td>
                                        <td style="font-weight:bold;">Tekanan APAR </td>
                                        <td style="font-weight:bold;">Pin Pengaman APAR</td>
                                        <td style="font-weight:bold;">Kondisi Selang</td>
                                        <td style="font-weight:bold;">Berat Tabung APAR</td>
                                        <td style="font-weight:bold;">Masa Berlaku Pengisian</td>
                                        <td style="font-weight:bold;">Kondisi Handle/Tuas</td>
                                        <td style="font-weight:bold;">Garis Merah / Red Line APAR</td>
                                        <td style="font-weight:bold;">Kondisi Sign APAR</td>
                                        <td style="font-weight:bold;">Petugas</td>
							                        </tr>
                                      <?php $no=1;?>
                                @foreach($record_apar as $key =>$value)
                                    @foreach($value as $dp)
                                    <tr>
                                        <td>{{ $no}}</td>
                                        <td>{{$dp['kode_lokasi']}}</td>
                                        <td>{{$dp['nama_lokasi']}}</td>
                                        @if($dp['id_report'] == null )
                                        <td>{{$dp['tgl_periksa']}}</td>
                                        <td>{{$dp['tekanan']}}</td>
                                        <td>{{$dp['pin']}}</td>
                                        <td>{{$dp['kondisi_selang']}}</td>
                                        <td>{{$dp['berat_tabung']}}</td>
                                        <td>{{$dp['masa_berlaku']}}</td>
                                        <td>{{$dp['kondisi_tuas']}}</td>
                                        <td>{{$dp['garis_merah']}}</td>
                                        <td>{{$dp['kondisi_sign']}}</td>
                                        <td>{{$dp['petugas']}}</td>
                                        @else
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        @endif

                                    </tr>
                                    <?php $no++ ;?>
                                   @endforeach
                                @endforeach
                                </table>
                              </div>

                              <div class="page-break">
                                <center>
                                      <h3 style="font-weight:bold;font-size:20px;"> MONTHLY REPORT AUDIT BUYER CONTROLL</h3>
                                      <h3 style="font-weight:bold;font-size:15px;"> FACTORY : {{$dataBranch->nama_branch}}</h3>
                                      <h3 style="font-weight:bold;font-size:13px;">{{$dataBulan}}  {{$tahun}}</h3>
                                      <h3 style="font-weight:bold;font-size:13px;">CONTROLL ALARM BUTTON</h3>
                                </center>
                                <br>
                                <table class="table table-bordered" style="margin-left:auto;margin-right:auto">
                                    <tr>
                                        <td colspan="8" style="font-weight:bold;">CONTROLL ALARM BUTTON</td>
							                      </tr>
                                    <tr>
                                    <td style="font-weight:bold;">No</td>
                                        <td style="font-weight:bold;">Kode Lokasi</td>
                                        <td style="font-weight:bold;">Lokasi</td>
                                        <td style="font-weight:bold;">Tanggal Kontrol </td>
                                        <td style="font-weight:bold;">Kondisi Tombol Alaram </td>
                                        <td style="font-weight:bold;">Kebersihan tombol alarm</td>
                                        <td style="font-weight:bold;">Chechklist tombol alarm</td>
                                        <td style="font-weight:bold;">Petugas</td>
							                      </tr>
                                    <?php $no=1;?>
                                @foreach($record_alarm as $key =>$value)
                                    @foreach($value as $dp)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$dp['kode_lokasi']}}</td>
                                        <td>{{$dp['nama_lokasi']}}</td>
                                        @if($dp['id_report'] == null )
                                        <td>{{$dp['tgl_periksa']}}</td>
                                        <td>{{$dp['kondisi']}}</td>
                                        <td>{{$dp['kebersihan']}}</td>
                                        <td>{{$dp['ceklis']}}</td>
                                        <td>{{$dp['petugas']}}</td>
                                        @else
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        @endif
                                    </tr>
                                    <?php $no++ ;?>
                                   @endforeach
                                @endforeach
                                </table>
                              </div>
                              <div class="page-break">
                                <center>
                                      <h3 style="font-weight:bold;font-size:20px;"> MONTHLY REPORT AUDIT BUYER CONTROLL</h3>
                                      <h3 style="font-weight:bold;font-size:15px;"> FACTORY : {{$dataBranch->nama_branch}}</h3>
                                      <h3 style="font-weight:bold;font-size:13px;">{{$dataBulan}}  {{$tahun}}</h3>
                                      <h3 style="font-weight:bold;font-size:13px;">CONTROLL SMOKE DETECTOR</h3>
                                </center>
                                <br>
                                <table class="table table-bordered" style="margin-left:auto;margin-right:auto">
                                    <tr>
                                        <td colspan="8" style="font-weight:bold;">CONTROLL SMOKE DETECTOR</td>
							                      </tr>
                                    <tr>
                                        <td style="font-weight:bold;">No</td>
                                        <td style="font-weight:bold;">Kode Lokasi</td>
                                        <td style="font-weight:bold;">Lokasi</td>
                                        <td style="font-weight:bold;">Tanggal Kontrol </td>
                                        <td style="font-weight:bold;">Terdapat Smoke Detector</td>
                                        <td style="font-weight:bold;">Fungsi Smoke Detector</td>
                                        <td style="font-weight:bold;">Baterai Smoke Detector</td>
                                        <td style="font-weight:bold;">Petugas</td>
							                      </tr>
                                    <?php $no=0;?>
                                    @foreach($record_smokedet as $key =>$value)
                                        @foreach($value as $dp)
                                    <?php $no++ ;?>
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$dp['kode_lokasi']}}</td>
                                        <td>{{$dp['nama_lokasi']}}</td>
                                        @if($dp['id_report'] == null )
                                        <td>{{$dp['tgl_periksa']}}</td>
                                        <td>{{$dp['ada_smoke']}}</td>
                                        <td>{{$dp['fungsi']}}</td>
                                        <td>{{$dp['baterai']}}</td>
                                        <td>{{$dp['petugas']}}</td>
                                        @else
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        @endif
                                    </tr>
                                   @endforeach
                                @endforeach
                                </table>
                              </div>
                              <div class="page-break">
                                <center>
                                      <h3 style="font-weight:bold;font-size:20px;"> MONTHLY REPORT AUDIT BUYER CONTROLL</h3>
                                      <h3 style="font-weight:bold;font-size:15px;"> FACTORY : {{$dataBranch->nama_branch}}</h3>
                                      <h3 style="font-weight:bold;font-size:13px;">{{$dataBulan}}  {{$tahun}}</h3>
                                      <h3 style="font-weight:bold;font-size:13px;">CONTROLL EMERGENCY EXIT</h3>
                                </center>
                                <br>
                                <table class="table table-bordered" style="margin-left:auto;margin-right:auto">
                                    <tr>
                                        <td colspan="8" style="font-weight:bold;">CONTROLL EMERGENCY EXIT</td>
							                      </tr>
                                    <tr>
                                        <td style="font-weight:bold;">No</td>
                                        <td style="font-weight:bold;">Kode Lokasi</td>
                                        <td style="font-weight:bold;">Lokasi</td>
                                        <td style="font-weight:bold;">Tanggal Kontrol </td>
                                        <td style="font-weight:bold;">Terdapat Emergency Exit  </td>
                                        <td style="font-weight:bold;">Kondisi Lampu</td>
                                        <td style="font-weight:bold;">Kebersihan</td>
                                        <td style="font-weight:bold;">Petugas</td>
							                       </tr>
                                     <?php $no=0;?>
                                    @foreach($record_emerexit as $key =>$value)
                                        @foreach($value as $dp)
                                    <?php $no++ ;?>
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$dp['kode_lokasi']}}</td>
                                        <td>{{$dp['nama_lokasi']}}</td>
                                        @if($dp['id_report'] == null )
                                        <td>{{$dp['tgl_periksa']}}</td>
                                        <td>{{$dp['ada_exit']}}</td>
                                        <td>{{$dp['kondisi_lampu']}}</td>
                                        <td>{{$dp['kebersihan']}}</td>
                                        <td>{{$dp['petugas']}}</td>
                                        @else
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        @endif
                                    </tr>
                                   @endforeach
                                @endforeach
                                </table>
                              </div>
                              
                                <center>
                                      <h3 style="font-weight:bold;font-size:20px;"> MONTHLY REPORT AUDIT BUYER CONTROLL</h3>
                                      <h3 style="font-weight:bold;font-size:15px;"> FACTORY : {{$dataBranch->nama_branch}}</h3>
                                      <h3 style="font-weight:bold;font-size:13px;">{{$dataBulan}}  {{$tahun}}</h3>
                                      <h3 style="font-weight:bold;font-size:13px;">CONTROLL EMERGENCY LAMP</h3>
                                </center>
                                <br>
                                <table class="table table-bordered" style="margin-left:auto;margin-right:auto">
                                    <tr>
                                        <td colspan="8" style="font-weight:bold;">CONTROLL EMERGENCY LAMP</td>
							                      </tr>
                                    <tr>
                                        <td style="font-weight:bold;">No</td>
                                        <td style="font-weight:bold;">Kode Lokasi</td>
                                        <td style="font-weight:bold;">Lokasi</td>
                                        <td style="font-weight:bold;">Tanggal Kontrol </td>
                                        <td style="font-weight:bold;">Kondisi Lampu </td>
                                        <td style="font-weight:bold;">Kebersihan Lampu</td>
                                        <td style="font-weight:bold;">Form Checklist</td>
                                        <td style="font-weight:bold;">Petugas</td>
							                      </tr>
                                    <?php $no=0;?>
                                      @foreach($record_emerlamp as $key =>$value)
                                          @foreach($value as $dp)
                                      <?php $no++ ;?>
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$dp['kode_lokasi']}}</td>
                                        <td>{{$dp['nama_lokasi']}}</td>
                                        @if($dp['id_report'] == null )
                                        <td>{{$dp['tgl_periksa']}}</td>
                                        <td>{{$dp['kondisi']}}</td>
                                        <td>{{$dp['kebersihan']}}</td>
                                        <td>{{$dp['form']}}</td>
                                        <td>{{$dp['petugas']}}</td>
                                        @else
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        @endif
                                    </tr>
                                   @endforeach
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

