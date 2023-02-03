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

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="btn-group" style="padding-bottom:10px">
                  <a href="{{ url()->previous() }}" type="button" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-circle-left"></i>  Back</a>
                </div>
                <div class="row">
                    <div class="col-12">
                        
                        <div class="card">
                            <div class="card-body" style="overflow:scroll;">
                                <center><h4>DAILY REPORT QC REWORK</h4></center>
                                <center><h6>FACTORY : {{$dataBranch->nama_branch}}</h6></center>
                                <center><h6>{{$tanggal_depan}}</h6></center>
                                <br>
                                <table style="width:1700px">
                                    <tr>
                                        <td rowspan="2" style="font-weight:bold;">NO</td>
                                        <td rowspan="2" style="font-weight:bold;padding:15px">LINE</td>
                                        <td rowspan="2" style="font-weight:bold;">WO</td>
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
                                        <td rowspan="2" style="font-weight:bold;">REMARK</td>
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
                                    @foreach($result as $key => $value)
                                    <tr>
                                        <td rowspan="{{count($value) * 2 + 1}}" scope="row">{{ $no }}</td>
                                        <td rowspan="{{count($value) * 2 + 1}}">{{$key}}</td>
                                    </tr>
                                    @foreach($value as $dp)
                                    <tr>
                                        <td rowspan="2">{{$dp['no_wo']}}</td>
                                        <td>qty</td>
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
                                        <td>{{$dp['tot_reject']}}</td>
                                        <td rowspan="2">{{$dp['tot_check']}}</td>
                                        <td rowspan="2">{{$dp['remark']}}</td>
                                    </tr>
                                    <tr>
                                        <td>%</td>
                                        <td>{{$dp['p_fg']}} %</td>
                                        <td>{{$dp['p_broken']}} %</td>
                                        <td>{{$dp['p_skip']}} %</td>
                                        <td>{{$dp['p_pktw']}} %</td>
                                        <td>{{$dp['p_crooked']}} %</td>
                                        <td>{{$dp['p_pleated']}} %</td>
                                        <td>{{$dp['p_ros']}} %</td>
                                        <td>{{$dp['p_htl']}} %</td>
                                        <td>{{$dp['p_button']}} %</td>
                                        <td>{{$dp['p_print']}} %</td>
                                        <td>{{$dp['p_bs']}} %</td>
                                        <td>{{$dp['p_unb']}} %</td>
                                        <td>{{$dp['p_shading']}} %</td>
                                        <td>{{$dp['p_dof']}} %</td>
                                        <td>{{$dp['p_dirty']}} %</td>
                                        <td>{{$dp['p_shiny']}} %</td>
                                        <td>{{$dp['p_sticker']}} %</td>
                                        <td>{{$dp['p_trimming']}} %</td>
                                        <td>{{$dp['p_ip']}} %</td>
                                        <td>{{$dp['p_meas']}} %</td>
                                        <td>{{$dp['p_other']}} %</td>
                                        <td>{{$dp['p_tot_reject']}} %</td>
                                    </tr>
                                    @endforeach
                                    @foreach($TotalResult as $dt)
                                    @if($dt['line'] == $key)
                                    <tr>
                                        <td colspan="3" rowspan="2" style="background-color:#DCDCDC;">TOTAL</td>
                                        <td style="background-color:#DCDCDC;">Qty</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['fg_all']}}</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['broken_all']}}</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['skip_all']}}</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['pktw_all']}}</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['crooked_all']}}</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['pleated_all']}}</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['ros_all']}}</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['htl_all']}}</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['button_all']}}</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['print_all']}}</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['bs_all']}}</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['unb_all']}}</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['shading_all']}}</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['dof_all']}}</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['dirty_all']}}</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['shiny_all']}}</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['sticker_all']}}</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['trimming_all']}}</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['ip_all']}}</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['meas_all']}}</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['other_all']}}</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['total_reject']}}</td>
                                        <td rowspan="2" style="background-color:#DCDCDC;">{{$dt['total_check']}}</td>
                                        <td rowspan="2" style="background-color:#DCDCDC;"></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#DCDCDC;">%</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['total_fg']}} %</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['total_broken']}} %</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['total_skip']}} %</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['total_pktw']}} %</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['total_crooked']}} %</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['total_pleated']}} %</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['total_ros']}} %</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['total_htl']}} %</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['total_button']}} %</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['total_print']}} %</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['total_bs']}} %</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['total_unb']}} %</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['total_shading']}} %</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['total_dof']}} %</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['total_dirty']}} %</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['total_shiny']}} %</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['total_sticker']}} %</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['total_trimming']}} %</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['total_ip']}} %</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['total_meas']}} %</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['total_other']}} %</td>
                                        <td style="background-color:#DCDCDC;">{{$dt['p_total_reject']}} %</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    <?php $no++ ;?>
                                    @endforeach
                                    <tr>
                                      <td style="background-color:#C0C0C0;" colspan="3" rowspan=2> TOTAL ALL LINE</td>
                                      <td style="background-color:#C0C0C0;">Qty</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['fg']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['broken']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['skip']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['pktw']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['crooked']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['pleated']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['ros']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['htl']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['button']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['print']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['bs']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['unb']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['shading']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['dof']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['dirty']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['shiny']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['sticker']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['trimming']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['ip']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['meas']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['other']}}</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['total_reject']}}</td>
                                      <td style="background-color:#C0C0C0;" rowspan="2">{{$totalSemuaLine['total_check']}}</td>
                                      <td style="background-color:#C0C0C0;" rowspan="2"></td>
                                    </tr>
                                    <tr>
                                      <td style="background-color:#C0C0C0;">%</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['tot_fg']}} %</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['tot_broken']}} %</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['tot_skip']}} %</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['tot_pktw']}} %</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['tot_crooked']}} %</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['tot_pleated']}} %</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['tot_ros']}} %</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['tot_htl']}} %</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['tot_button']}} %</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['tot_print']}} %</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['tot_bs']}} %</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['tot_unb']}} %</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['tot_shading']}} %</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['tot_dof']}} %</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['tot_dirty']}} %</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['tot_shiny']}} %</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['tot_sticker']}} %</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['tot_trimming']}} %</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['tot_ip']}} %</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['tot_meas']}} %</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['tot_other']}} %</td>
                                      <td style="background-color:#C0C0C0;">{{$totalSemuaLine['p_total_reject']}} % </td>
                                    </tr>
                                </table>
                                <br>
                                <h4>File</h4>
                                <div class="row">
                                  @foreach($result as $key2 => $value2)
                                  @foreach($value2 as $df)
                                  @if($df['file'] != null)
                                  <div class="div3 col-sm-2">
                                    <a href="{{ url('/rework/qc/images/'.$df['file']) }}" data-toggle="lightbox" data-title="WO {{$df['no_wo']}}" data-gallery="gallery">
                                      <img src="{{ url('/rework/qc/images/'.$df['file']) }}" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                  </div>
                                  @endif
                                  @endforeach
                                  @endforeach
                                </div>
                                <br>
                                <form action="{{ route('harian.pdf')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                      <input type="hidden" name="tanggal" id="tanggal" value="{{$tanggal}}">
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
