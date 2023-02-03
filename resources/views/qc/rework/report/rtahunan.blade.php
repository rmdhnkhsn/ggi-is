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
                                <center><h4>ANNUAL REPORT QC REWORK</h4></center>
                                <center><h6>FACTORY : {{$dataBranch->nama_branch}}</h6></center>
                                <center><h6>{{$tahun}} </h6></center>
                                <br>
                                <table style="width:1700px">
                                    <tr>
                                        <td rowspan="2" style="font-weight:bold;">NO</td>
                                        <td rowspan="2" style="font-weight:bold;padding:15px">BULAN</td>
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
                                    @foreach($reportTahunan as $rt)
                                    <tr>
                                      <td rowspan="2" scope="row">{{ $no }}</td>
                                      <td rowspan="2">{{$rt['bulan']}}</td>
                                      <td>QTY</td>
                                      <td>{{$rt['fg']}}</td>
                                      <td>{{$rt['broken']}}</td>
                                      <td>{{$rt['skip']}}</td>
                                      <td>{{$rt['pktw']}}</td>
                                      <td>{{$rt['crooked']}}</td>
                                      <td>{{$rt['pleated']}}</td>
                                      <td>{{$rt['ros']}}</td>
                                      <td>{{$rt['htl']}}</td>
                                      <td>{{$rt['button']}}</td>
                                      <td>{{$rt['print']}}</td>
                                      <td>{{$rt['bs']}}</td>
                                      <td>{{$rt['unb']}}</td>
                                      <td>{{$rt['shading']}}</td>
                                      <td>{{$rt['dof']}}</td>
                                      <td>{{$rt['dirty']}}</td>
                                      <td>{{$rt['shiny']}}</td>
                                      <td>{{$rt['sticker']}}</td>
                                      <td>{{$rt['trimming']}}</td>
                                      <td>{{$rt['ip']}}</td>
                                      <td>{{$rt['meas']}}</td>
                                      <td>{{$rt['other']}}</td>
                                      <td>{{$rt['total_reject']}}</td>
                                      <td rowspan="2">{{$rt['total_check']}}</td>
                                    </tr>
                                    <tr>
                                      <td>%</td>
                                      <td>{{$rt['tot_fg']}} %</td>
                                      <td>{{$rt['tot_broken']}} %</td>
                                      <td>{{$rt['tot_skip']}} %</td>
                                      <td>{{$rt['tot_pktw']}} %</td>
                                      <td>{{$rt['tot_crooked']}} %</td>
                                      <td>{{$rt['tot_pleated']}} %</td>
                                      <td>{{$rt['tot_ros']}} %</td>
                                      <td>{{$rt['tot_htl']}} %</td>
                                      <td>{{$rt['tot_button']}} %</td>
                                      <td>{{$rt['tot_print']}} %</td>
                                      <td>{{$rt['tot_bs']}} %</td>
                                      <td>{{$rt['tot_unb']}} %</td>
                                      <td>{{$rt['tot_shading']}} %</td>
                                      <td>{{$rt['tot_dof']}} %</td>
                                      <td>{{$rt['tot_dirty']}} %</td>
                                      <td>{{$rt['tot_shiny']}} %</td>
                                      <td>{{$rt['tot_sticker']}} %</td>
                                      <td>{{$rt['tot_trimming']}} %</td>
                                      <td>{{$rt['tot_ip']}} %</td>
                                      <td>{{$rt['tot_meas']}} %</td>
                                      <td>{{$rt['tot_other']}} %</td>
                                      <td>{{$rt['p_total_reject']}} %</td>
                                    </tr>
                                    <?php $no++ ;?>
                                    @endforeach
                                    <tr>
                                        <td colspan="2" rowspan="2" style="background-color:#C0C0C0;">TOTAL ALL LINE</td>
                                        <td style="background-color:#C0C0C0;">Qty</td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['fg']}}</td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['broken']}}</td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['skip']}}</td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['pktw']}}</td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['crooked']}}</td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['pleated']}}</td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['ros']}}</td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['htl']}}</td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['button']}}</td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['print']}}</td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['bs']}}</td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['unb']}}</td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['shading']}}</td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['dof']}}</td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['dirty']}}</td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['shiny']}}</td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['sticker']}}</td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['trimming']}}</td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['ip']}}</td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['meas']}}</td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['other']}}</td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['total_reject']}}</td>
                                        <td rowspan="2" style="background-color:#C0C0C0;">{{$totalData['total_check']}}</td>
                                    </tr>
                                    <tr>
                                      <td style="background-color:#C0C0C0;">%</td>
                                      <td style="background-color:#C0C0C0;">{{$totalData['tot_fg']}} % </td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['tot_broken']}} % </td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['tot_skip']}} % </td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['tot_pktw']}} % </td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['tot_crooked']}} % </td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['tot_pleated']}} % </td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['tot_ros']}} % </td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['tot_htl']}} % </td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['tot_button']}} % </td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['tot_print']}} % </td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['tot_bs']}} % </td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['tot_unb']}} % </td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['tot_shading']}} % </td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['tot_dof']}} % </td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['tot_dirty']}} % </td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['tot_shiny']}} % </td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['tot_sticker']}} % </td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['tot_trimming']}} % </td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['tot_ip']}} % </td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['tot_meas']}} % </td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['tot_other']}} % </td>
                                        <td style="background-color:#C0C0C0;">{{$totalData['p_total_reject']}} % </td>
                                    </tr>
                                </table>
                                <br>
                                <h4>File</h4>
                                <div class="row">
                                  @if($foto != null)
                                  @foreach($foto as $ft)
                                  <div class="div3 col-sm-2">
                                    <a href="{{ url('/rework/qc/images/'.$ft['file']) }}" data-toggle="lightbox" data-title="{{$ft['bulan']}}" data-gallery="gallery">
                                      <img src="{{ url('/rework/qc/images/'.$ft['file']) }}" class="img-fluid mb-2" alt="{{$ft['bulan']}}"/>
                                    </a>
                                  </div>
                                  @endforeach
                                  @endif
                                </div>
                                <br>
                                <form action="{{ route('tahunan.pdf')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                      <input type="hidden" name="tahun" id="tahun" value="{{$tahun}}">
                                      <input type="hidden" name="branch" id="branch" value="{{$dataBranch->id}}">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="far fa-file-pdf"></i> Download PDF</button> 
                                </form>
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
