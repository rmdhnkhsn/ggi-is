@include('qc.sample.layouts.header')
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
@include('qc.sample.layouts.navbar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body" style="overflow:auto;">
                                <center><h4>MONTHLY SAMPLE CHECKING</h4></center>
                                <center><h6>FACTORY : {{$dataBranch->nama_branch}}</h6></center>
                                <center><h6>{{$kodeBulan}}</h6></center>
                                <br>
                                <table style="width:100%">
                                    <tr>
                                        <td rowspan="2" style="font-weight:bold;">NO</td>
                                        <td rowspan="2" style="font-weight:bold;">DATE</td>
                                        <td colspan="3" style="font-weight:bold;">RESULT</td>
                                        <td rowspan="2" style="font-weight:bold;">REMARK</td>
                                    </tr>
                                    <tr>
                                      <td style="font-weight:bold;">PASS</td>
                                      <td style="font-weight:bold;">FAIL</td>
                                      <td style="font-weight:bold;">% FAIL</td>
                                    </tr>
                                    <?php $no=1;?>
                                    @foreach($hitungan as $key => $value)
                                    <tr>
                                      <td scope="row">{{ $no }}</td>
                                      <td scope="row">{{ $value['date'] }}</td>
                                      <td scope="row">{{ $value['pass'] }}</td>
                                      <td scope="row">{{ $value['fail'] }}</td>
                                      <td scope="row">{{ $value['p_fail']}} %</td>
                                      <td scope="row">{{ $value['remark']}}</td>
                                    </tr>
                                    <?php $no++ ;?>
                                    @endforeach
                                    <tr>
                                      <td colspan="2" style="background-color:#C0C0C0;">TOTAL</td>
                                      <td style="background-color:#C0C0C0;">{{ $dataTotal['pass'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $dataTotal['fail'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $dataTotal['p_fail'] }} %</td>
                                      <td style="background-color:#C0C0C0;">{{ $dataTotal['remark'] }}</td>
                                    </tr>
                                </table>
                                <br>
                                <form action="{{ route('monthly.pdf')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                      <input type="hidden" name="bulan" id="bulan" value="{{$bulan}}">
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
@include('qc.sample.layouts.footer')
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
