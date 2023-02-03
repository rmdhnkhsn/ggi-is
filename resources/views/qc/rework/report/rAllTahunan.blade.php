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
                                <div class="container">
                                  <center><h4>ANNUAL REPORT QC REWORK</h4></center>
                                  <center><h6>ALL FACTORY</H6></CENTER>
                                  <center><h6>{{$tahun}} </h6></center>
                                </div>
                                <br>
                                <table style="width:1300px">
                                    <tr>
                                        <td rowspan="2" style="font-weight:bold;">NO</td>
                                        <td rowspan="2" style="font-weight:bold;">FACTORY</td>
                                        <td colspan="2" style="font-weight:bold;">JANUARY</td>
                                        <td colspan="2" style="font-weight:bold;">FEBRUARY</td>
                                        <td colspan="2" style="font-weight:bold;">MARCH</td>
                                        <td colspan="2" style="font-weight:bold;">APRIL</td>
                                        <td colspan="2" style="font-weight:bold;">MAY</td>
                                        <td colspan="2" style="font-weight:bold;">JUNE</td>
                                        <td colspan="2" style="font-weight:bold;">JULY</td>
                                        <td colspan="2" style="font-weight:bold;">AUGUST</td>
                                        <td colspan="2" style="font-weight:bold;">SEPTEMBER</td>
                                        <td colspan="2" style="font-weight:bold;">OCTOBER</td>
                                        <td colspan="2" style="font-weight:bold;">NOVEMBER</td>
                                        <td colspan="2" style="font-weight:bold;">DESEMBER</td>
                                    </tr>
                                    <tr>
                                      <td style="font-weight:bold;">QTY</td>
                                      <td style="font-weight:bold;">% AVG</td>
                                      <td style="font-weight:bold;">QTY</td>
                                      <td style="font-weight:bold;">% AVG</td>
                                      <td style="font-weight:bold;">QTY</td>
                                      <td style="font-weight:bold;">% AVG</td>
                                      <td style="font-weight:bold;">QTY</td>
                                      <td style="font-weight:bold;">% AVG</td>
                                      <td style="font-weight:bold;">QTY</td>
                                      <td style="font-weight:bold;">% AVG</td>
                                      <td style="font-weight:bold;">QTY</td>
                                      <td style="font-weight:bold;">% AVG</td>
                                      <td style="font-weight:bold;">QTY</td>
                                      <td style="font-weight:bold;">% AVG</td>
                                      <td style="font-weight:bold;">QTY</td>
                                      <td style="font-weight:bold;">% AVG</td>
                                      <td style="font-weight:bold;">QTY</td>
                                      <td style="font-weight:bold;">% AVG</td>
                                      <td style="font-weight:bold;">QTY</td>
                                      <td style="font-weight:bold;">% AVG</td>
                                      <td style="font-weight:bold;">QTY</td>
                                      <td style="font-weight:bold;">% AVG</td>
                                      <td style="font-weight:bold;">QTY</td>
                                      <td style="font-weight:bold;">% AVG</td>
                                    </tr>
                                    <?php $no=1;?>
                                    @foreach($dataReport as $dr)
                                    <tr>
                                      <td scope="row">{{ $no }}</td>
                                      <td scope="row">{{ $dr['branch'] }}</td>
                                      <td scope="row">{{ $dr['janReject'] }}</td>
                                      <td scope="row">{{ $dr['janP_Reject'] }} %</td>
                                      <td scope="row">{{ $dr['febReject'] }}</td>
                                      <td scope="row">{{ $dr['febP_Reject'] }} %</td>
                                      <td scope="row">{{ $dr['marReject'] }}</td>
                                      <td scope="row">{{ $dr['marP_Reject'] }} %</td>
                                      <td scope="row">{{ $dr['aprReject'] }}</td>
                                      <td scope="row">{{ $dr['aprP_Reject'] }} %</td>
                                      <td scope="row">{{ $dr['mayReject'] }}</td>
                                      <td scope="row">{{ $dr['mayP_Reject'] }} %</td>
                                      <td scope="row">{{ $dr['junReject'] }}</td>
                                      <td scope="row">{{ $dr['junP_Reject'] }} %</td>
                                      <td scope="row">{{ $dr['julReject'] }}</td>
                                      <td scope="row">{{ $dr['julP_Reject'] }} %</td>
                                      <td scope="row">{{ $dr['agsReject'] }}</td>
                                      <td scope="row">{{ $dr['agsP_Reject'] }} %</td>
                                      <td scope="row">{{ $dr['sepReject'] }}</td>
                                      <td scope="row">{{ $dr['sepP_Reject'] }} %</td>
                                      <td scope="row">{{ $dr['octReject'] }}</td>
                                      <td scope="row">{{ $dr['octP_Reject'] }} %</td>
                                      <td scope="row">{{ $dr['novReject'] }}</td>
                                      <td scope="row">{{ $dr['novP_Reject'] }} %</td>
                                      <td scope="row">{{ $dr['desReject'] }}</td>
                                      <td scope="row">{{ $dr['desP_Reject'] }} %</td>
                                    </tr>
                                    <?php $no++ ;?>
                                    @endforeach
                                    <tr>
                                      <td colspan="2" style="background-color:#DCDCDC;">TOTAL</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['janReject']}}</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['janP_Reject']}} %</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['febReject']}}</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['febP_Reject']}} %</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['marReject']}}</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['marP_Reject']}} %</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['aprReject']}}</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['aprP_Reject']}} %</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['mayReject']}}</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['mayP_Reject']}} %</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['junReject']}}</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['junP_Reject']}} %</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['julReject']}}</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['julP_Reject']}} %</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['agsReject']}}</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['agsP_Reject']}} %</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['sepReject']}}</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['sepP_Reject']}} %</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['octReject']}}</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['octP_Reject']}} %</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['novReject']}}</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['novP_Reject']}} %</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['desReject']}}</td>
                                      <td style="background-color:#DCDCDC;">{{$dataTotal['desP_Reject']}} %</td>
                                    </tr>
                                </table>
                                <br>
                                <form action="{{ route('AllTahunan.pdf')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                      <input type="hidden" name="tahun" id="tahun" value="{{$tahun}}">
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
