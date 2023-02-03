@include('qc.reject_garment.layouts.header')
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
@include('qc.reject_garment.layouts.navbar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body" style="overflow:scroll;">
                                <center><h4 style="font-weight:bold;">DATA REJECT FABRIC & SEWING / HARI</h4></center>
                                <center><h6 style="font-weight:bold;">FACTORY : {{$dataBranch->nama_branch}}</h6></center>
                                <center><h6 style="font-weight:bold;">{{$kodeBulan}}</h6></center>
                                <br>
                                <table style="width:1300px">
                                    <tr>
                                      <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">TANGGAL</td>
                                      <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">LINE</td>
                                      <td rowspan="2" style="font-weight:bold;">BUYER</td>
                                      <td rowspan="2" style="font-weight:bold;">STYLE</td>
                                      <td rowspan="2" style="font-weight:bold;">WO</td>
                                      <td rowspan="2" style="font-weight:bold;">ACT #</td>
                                      <td rowspan="2" style="font-weight:bold;">ITEM</td>
                                      <td rowspan="2" style="font-weight:bold;">COLOUR</td>
                                      <td rowspan="2" style="font-weight:bold;">QTY ORDER</td>
                                      <td rowspan="2" style="font-weight:bold;">SIZE</td>
                                      <td colspan="5" style="font-weight:bold;">FABRIC</td>
                                      <td colspan="5" style="font-weight:bold;">SEWING</td>
                                      <td rowspan="2" style="font-weight:bold;">TOTAL</td>
                                      <td rowspan="2" style="font-weight:bold;">KETERANGAN</td>
                                    </tr>
                                    <tr>
                                      <td style="font-weight:bold;">CACAT KAIN</td>
                                      <td style="font-weight:bold;">BOLONG</td>
                                      <td style="font-weight:bold;">SHADDING</td>
                                      <td style="font-weight:bold;">KOTOR</td>
                                      <td style="font-weight:bold;">LAIN-LAIN</td>
                                      <td style="font-weight:bold;">CACAT</td>
                                      <td style="font-weight:bold;">LABEL</td>
                                      <td style="font-weight:bold;">KOTOR</td>
                                      <td style="font-weight:bold;">BOLONG</td>
                                      <td style="font-weight:bold;">UKURAN</td>
                                    </tr>
                                    @foreach($result as $key => $value)
                                    <tr>
                                      <td>{{$value['tanggal']}}</td>
                                      <td>{{$value['line']}}</td>
                                      <td>{{$value['buyer']}}</td>
                                      <td>{{$value['style']}}</td>
                                      <td>{{$value['no_wo']}}</td>
                                      <td>{{$value['article']}}</td>
                                      <td>{{$value['item']}}</td>
                                      <td>{{$value['color']}}</td>
                                      <td>{{$value['qty']}}</td>
                                      <td>{{$value['size']}}</td>
                                      <td>{{$value['f_cacat']}}</td>
                                      <td>{{$value['f_bolong']}}</td>
                                      <td>{{$value['f_shadding']}}</td>
                                      <td>{{$value['f_kotor']}}</td>
                                      <td>{{$value['f_lain']}}</td>
                                      <td>{{$value['s_cacat']}}</td>
                                      <td>{{$value['s_label']}}</td>
                                      <td>{{$value['s_kotor']}}</td>
                                      <td>{{$value['s_bolong']}}</td>
                                      <td>{{$value['s_ukuran']}}</td>
                                      <td>{{$value['total']}}</td>
                                      <td>{{$value['keterangan']}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                      <td colspan="10">TOTAL</td>
                                      <td>{{$total['f_cacat']}}</td>
                                      <td>{{$total['f_bolong']}}</td>
                                      <td>{{$total['f_shadding']}}</td>
                                      <td>{{$total['f_kotor']}}</td>
                                      <td>{{$total['f_lain']}}</td>
                                      <td>{{$total['s_cacat']}}</td>
                                      <td>{{$total['s_label']}}</td>
                                      <td>{{$total['s_kotor']}}</td>
                                      <td>{{$total['s_bolong']}}</td>
                                      <td>{{$total['s_ukuran']}}</td>
                                      <td>{{$total['total']}}</td>
                                      <td></td>
                                    </tr>
                                </table>
                                <br>
                                <div class="row">
                                  <div class="col-md-1 col-6">
                                    <form action="{{ route('reject_report.bulanan_pdf')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                          <input type="hidden" name="bulan" id="bulan" value="{{$bulan}}">
                                          <input type="hidden" name="branch" id="branch" value="{{$dataBranch->id}}">
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-file-pdf"></i> Download PDF</button> 
                                    </form>
                                  </div>
                                  <div class="col-md-1 col-6">
                                    <form action="{{ route('reject_report.excel')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                          <input type="hidden" name="bulan" id="bulan" value="{{$bulan}}">
                                          <input type="hidden" name="branch" id="branch" value="{{$dataBranch->id}}">
                                        <button type="submit" class="btn btn-success btn-sm"><i class="far fa-file-excel"></i> Download EXCEL</button> 
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
@include('qc.reject_garment.layouts.footer')
