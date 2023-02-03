@include('qc.rework.layouts.header')
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
@include('qc.rework.layouts.navbar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body" style="overflow:scroll;">
                                <center><h4>MONTHLY REPORT QC REWORK</h4></center>
                                <center><h6>FACTORY : {{$dataBranch->nama_branch}}</h6></center>
                                <center><h6>{{$kodeBulan}}</h6></center>
                                <br>
                                <table style="width:1700px">
                                    <tr>
                                        <td rowspan="2" style="font-weight:bold;">NO</td>
                                        <td rowspan="2" style="font-weight:bold;padding:15px">DATE</td>
                                        <td rowspan="2" style="font-weight:bold;"></td>
                                        <td rowspan="2" style="font-weight:bold;">FINISH GOOD</td>
                                        <td colspan="6" style="font-weight:bold;">STITCHING</td>
                                        <td colspan="3" style="font-weight:bold;">ATTACHMENT</td>
                                        <td colspan="6" style="font-weight:bold;">APPERANCE</td>
                                        <td rowspan="2" style="font-weight:bold;">STICKER</td>
                                        <td rowspan="2" style="font-weight:bold;">TRIMMING</td>
                                        <td rowspan="2" style="font-weight:bold;">IRON PROBLEM</td>
                                        <td rowspan="2" style="font-weight:bold;padding:13px">MEAS</td>
                                        <td rowspan="2" style="font-weight:bold;padding:13px">OTHER</td>
                                        <td rowspan="2" style="font-weight:bold;">TOT REWORK</td>
                                        <td rowspan="2" style="font-weight:bold;">TOTAL CHECK</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">BROKEN</td>
                                        <td style="font-weight:bold;padding:13px">SKIP</td>
                                        <td style="font-weight:bold;">PUCKERING /TWISTING</td>
                                        <td style="font-weight:bold;">CROOKED</td>
                                        <td style="font-weight:bold;">PLEATED</td>
                                        <td style="font-weight:bold;">RUN OF STICH</td>
                                        <td style="font-weight:bold;">HTL /LABEL</td>
                                        <td style="font-weight:bold;">BUTTON (HOLE)</td>
                                        <td style="font-weight:bold;">PRINT, EMBRO</td>
                                        <td style="font-weight:bold;">BAD SHAPE</td>
                                        <td style="font-weight:bold;">UN-BALANCE</td>
                                        <td style="font-weight:bold;">SHADING</td>
                                        <td style="font-weight:bold;">DEFECT ON FAB</td>
                                        <td style="font-weight:bold;">DIRTY, OIL</td>
                                        <td style="font-weight:bold;padding:13px">SHINY</td>
                                    </tr>
                                    <?php $no=1;?>
                                    @foreach($TotalResult as $key => $dp)
                                    <tr>
                                      <td rowspan='2' scope="row">{{ $no }}</td>
                                      <td rowspan='2'>{{$dp['tgl_pengerjaan']}}</td>
                                      <td>Qty</td>
                                      <td>{{$dp['fg']}}</td>
                                      <td>{{$dp['broken']}}</td>
                                      <td>{{$dp['skip']}}</td>
                                      <td>{{$dp['pktw']}}</td>
                                      <td>{{$dp['crooked']}}</td>
                                      <td>{{$dp['pleated']}}</td>
                                      <td>{{$dp['ros']}}</td>
                                      <td>{{$dp['htl']}}</td>
                                      <td>{{$dp['button']}}</td>
                                      <td>{{$dp['print']}}</td>
                                      <td>{{$dp['bs']}}</td>
                                      <td>{{$dp['unb']}}</td>
                                      <td>{{$dp['shading']}}</td>
                                      <td>{{$dp['dof']}}</td>
                                      <td>{{$dp['dirty']}}</td>
                                      <td>{{$dp['shiny']}}</td>
                                      <td>{{$dp['sticker']}}</td>
                                      <td>{{$dp['trimming']}}</td>
                                      <td>{{$dp['ip']}}</td>
                                      <td>{{$dp['meas']}}</td>
                                      <td>{{$dp['other']}}</td>
                                      <td>{{$dp['total_reject']}}</td>
                                      <td rowspan="2">{{$dp['total_check']}}</td>
                                    </tr>
                                    <tr>
                                      <td>%</td>
                                      <td>{{$dp['tot_fg']}} %</td>
                                      <td>{{$dp['tot_broken']}} %</td>
                                      <td>{{$dp['tot_skip']}} %</td>
                                      <td>{{$dp['tot_pktw']}} %</td>
                                      <td>{{$dp['tot_crooked']}} %</td>
                                      <td>{{$dp['tot_pleated']}} %</td>
                                      <td>{{$dp['tot_ros']}} %</td>
                                      <td>{{$dp['tot_htl']}} %</td>
                                      <td>{{$dp['tot_button']}} %</td>
                                      <td>{{$dp['tot_print']}} %</td>
                                      <td>{{$dp['tot_bs']}} %</td>
                                      <td>{{$dp['tot_unb']}} %</td>
                                      <td>{{$dp['tot_shading']}} %</td>
                                      <td>{{$dp['tot_dof']}} %</td>
                                      <td>{{$dp['tot_dirty']}} %</td>
                                      <td>{{$dp['tot_shiny']}} %</td>
                                      <td>{{$dp['tot_sticker']}} %</td>
                                      <td>{{$dp['tot_trimming']}} %</td>
                                      <td>{{$dp['tot_ip']}} %</td>
                                      <td>{{$dp['tot_meas']}} %</td>
                                      <td>{{$dp['tot_other']}} %</td>
                                      <td>{{$dp['p_total_reject']}} %</td>
                                    </tr>
                                    <?php $no++ ;?>
                                    @endforeach
                                    <tr>
                                      <td colspan="2" rowspan="2">TOTAL ALL LINE</td>
                                      <td>Qty</td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['fg']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['broken']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['skip']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['pktw']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['crooked']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['pleated']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['ros']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['htl']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['button']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['print']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['bs']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['unb']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['shading']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['dof']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['dirty']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['shiny']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['sticker']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['trimming']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['ip']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['meas']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['other']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['total_reject']}}</td>
                                      <td style="background-color:#C0C0C0;" rowspan="2">{{$totalLine['total_check']}}</td>
                                    </tr>
                                    <tr>
                                      <td>%</td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['tot_fg']}} % </td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['tot_broken']}} % </td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['tot_skip']}} % </td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['tot_pktw']}} % </td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['tot_crooked']}} % </td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['tot_pleated']}} % </td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['tot_ros']}} % </td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['tot_htl']}} % </td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['tot_button']}} % </td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['tot_print']}} % </td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['tot_bs']}} % </td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['tot_unb']}} % </td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['tot_shading']}} % </td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['tot_dof']}} % </td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['tot_dirty']}} % </td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['tot_shiny']}} % </td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['tot_sticker']}} % </td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['tot_trimming']}} % </td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['tot_ip']}} % </td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['tot_meas']}} % </td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['tot_other']}} % </td>
                                      <td style="background-color:#C0C0C0;">{{$totalLine['p_total_reject']}} % </td>
                                    </tr>
                                </table>
                                <br>
                                <h4>File</h4>
                                <div class="row">
                                  @foreach($top3 as $df)
                                  <div class="div3 col-sm-2">
                                    <a href="{{ url('/rework/qc/images/'.$df['file']) }}" data-toggle="lightbox" data-title="WO {{$df['no_wo']}}" data-gallery="gallery">
                                      <img src="{{ url('/rework/qc/images/'.$df['file']) }}" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                  </div>
                                  @endforeach
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-12 d-flex" style="gap:.6rem">
                                    <form action="{{ route('bulanan.pdf')}}" method="post" enctype="multipart/form-data">
                                      @csrf
                                        <input type="hidden" name="bulan" id="bulan" value="{{$bulan}}">
                                        <input type="hidden" name="branch" id="branch" value="{{$dataBranch->id}}">
                                      <button type="submit" class="btn btn-primary btn-sm"><i class="far fa-file-pdf"></i>     PDF</button> 
                                    </form>
                                    <form action="{{ route('bulanan.excel')}}" method="post" enctype="multipart/form-data">
                                      @csrf
                                        <input type="hidden" name="bulan" id="bulan" value="{{$bulan}}">
                                        <input type="hidden" name="branch" id="branch" value="{{$dataBranch->id}}">
                                      <button type="submit" class="btn btn-success btn-sm"><i class="far fa-file-pdf"></i>     Excel</button> 
                                    </form>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>
<!-- /.Content Wrapper. Contains page content -->
@include('qc.rework.layouts.footer')
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
