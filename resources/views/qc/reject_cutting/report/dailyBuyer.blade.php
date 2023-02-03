@extends("layouts.app")
@section("title","Reject Cutting")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
	table, td, th {
  border: 1px solid black;
  text-align:center;
  font-size:13px;
  padding:3px;
  
  }
  .no-wrap td,
  .no-wrap th {
  white-space: nowrap; }
 table {
    border-collapse: collapse;
    margin-left:auto; 
    margin-right:auto;
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
      #h7 {
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
@endpush



@push("sidebar")
  @include('qc.reject_cutting.layouts.navbar')
@endpush

@section("content")
<section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body" style="overflow:scroll;">
                                <center><h4 style="font-weight:bold;">DATA REJECT FABRIC & CUTTING / DAY</h4></center>
                                <center><h6>FACILITY :{{$dataBranch->nama_branch}}  </h6></center> 
                                <center><h6>DATE : {{ \Carbon\Carbon::parse($tanggal )->locale('id')->format('d-m-Y') }} </h6></center>
                                <br>
                                <table style="width:1300px" >
                                    <tr>
                                      <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">NO</td>
                                      <td rowspan="2" style="font-weight:bold;">BUYER</td>
                                      <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">WO</td>
                                      <td rowspan="2" style="font-weight:bold;padding-right:15px;padding-left:15px;">COLOR</td>
                                      <td colspan="6" style="font-weight:bold;">REJECT FABRIC</td>
                                      <td colspan="6" style="font-weight:bold;">REJECT PROSESS POTONG</td>
                                      <td rowspan="2" style="font-weight:bold;">GRAND TOTAL</td>
                                      <td rowspan="2" style="font-weight:bold;">KETERANGAN</td>
                                    </tr>
                                    <tr>
                                      <td style="font-weight:bold;">MISPRINT</td>
                                      <td style="font-weight:bold;">CACAT TENUN</td>
                                      <td style="font-weight:bold;">BOLONG</td>
                                      <td style="font-weight:bold;">KOTOR</td>
                                      <td style="font-weight:bold;">LAIN-LAIN</td>
                                      <td style="font-weight:bold;">TOTAL</td>
                                      <td style="font-weight:bold;">PINGGIR KAIN</td>
                                      <td style="font-weight:bold;">TDK PAS POLA</td>
                                      <td style="font-weight:bold;">KOTOR</td>
                                      <td style="font-weight:bold;">BOLONG</td>
                                      <td style="font-weight:bold;">LAIN-LAIN</td>
                                      <td style="font-weight:bold;">TOTAL</td>
                                    </tr>
                                   @foreach ($percobaan as $key => $value)
                                     
                                    <tr>
                                      <td rowspan="{{count($value) + 1}}">{{ $loop->iteration}}</td>
                                      <td rowspan="{{count($value) + 1}}">{{ $key }}</td>
                                    </tr>
                                    @foreach ($value as $value2 )
                                    
                                    <tr>
                                      <td>{{ $value2['t_v4801c_doco'] }}</td>
                                      <td>{{ $value2['color'] }}</td>
                                      <td>{{ $value2['f_misprint'] }}</td>
                                      <td>{{ $value2['f_cacat_tenun'] }}</td>
                                      <td>{{ $value2['f_bolong'] }}</td>
                                      <td>{{ $value2['f_kotor'] }}</td>
                                      <td>{{ $value2['f_lain_lain'] }}</td>
                                      <td style="color:red">{{ $value2['totalFabric'] }}</td>
                                      <td>{{ $value2['c_pinggir_kain'] }}</td>
                                      <td>{{ $value2['c_tidak_pas_pola'] }}</td>
                                      <td>{{ $value2['c_bolong'] }}</td>
                                      <td>{{ $value2['c_kotor'] }}</td>
                                      <td>{{ $value2['c_lain_lain'] }}</td>
                                      <td style="color:red">{{ $value2['totalCutting'] }}</td>
                                      <td>{{ $value2['grandTotal'] }}</td>
                                      <td>{{ $value2['remark'] }}</td>
                                    </tr>
                                    
                                    @endforeach
                                    <tr>
                                      <td colspan="4" style="background-color:#C0C0C0;">TOTAL</td>
                                      <td style="background-color:#C0C0C0;">{{ $value2['total_f_misprint'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value2['total_f_cacat_tenun'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value2['total_f_bolong'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value2['total_f_kotor'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value2['total_f_lain_lain'] }}</td>
                                      <td style="background-color:#C0C0C0;color:red;">{{ $value2['total_totalFabric'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value2['total_c_pinggir_kain'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value2['total_c_tidak_pas_pola'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value2['total_c_bolong'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value2['total_c_kotor'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value2['total_c_lain_lain'] }}</td>
                                      <td style="background-color:#C0C0C0;color:red;">{{ $value2['total_totalCutting'] }}</td>
                                      <td style="background-color:#C0C0C0;">{{ $value2['total_grandTotal'] }}</td>
                                      <td style="background-color:#C0C0C0;"></td>
                                    </tr>
                                    <tr>
                                      <td colspan="4"  style="background-color:#C0C0C0;">%PERCENTAGE</td>
                                      <td  style="background-color:#C0C0C0;">{{  round($value2['percentage_f_misprint'],2) }}%</td>
                                      <td  style="background-color:#C0C0C0;">{{ round($value2['percentage_f_cacat_tenun'],2) }}%</td>
                                      <td  style="background-color:#C0C0C0;">{{ round($value2['percentage_f_bolong'],2) }}%</td>
                                      <td  style="background-color:#C0C0C0;">{{  round($value2['percentage_f_kotor'],2) }}%</td>
                                      <td  style="background-color:#C0C0C0;">{{  round($value2['percentage_f_lain_lain'],2) }}%</td>
                                      <td  style="background-color:#C0C0C0;">{{  round($value2['percentage_totalFabric'],2) }}%</td>
                                      <td  style="background-color:#C0C0C0;">{{  round($value2['percentage_c_pinggir_kain'],2) }}%</td>
                                      <td  style="background-color:#C0C0C0;">{{  round($value2['percentage_c_tidak_pas_pola'],2) }}%</td>
                                      <td  style="background-color:#C0C0C0;">{{  round($value2['percentage_c_bolong'],2) }}%</td>
                                      <td  style="background-color:#C0C0C0;">{{  round($value2['percentage_c_kotor'],2) }}%</td>
                                      <td  style="background-color:#C0C0C0;">{{  round($value2['percentage_c_lain_lain'],2) }}%</td>
                                      <td  style="background-color:#C0C0C0;">{{  round($value2['percentage_totalCutting'],2) }}%</td>
                                      <td  style="background-color:#C0C0C0;">{{  round($value2['percentage_grandTotal'],2) }}%</td>
                                      <td  style="background-color:#C0C0C0;"></td>
                                    </tr>
                                    @endforeach
                                     @foreach ($reportHarianFinal as $key => $value)
                                    <tr>
                                      <td colspan="4" style="background-color:#3ef2da;">TOTAL</td>
                                      <td style="background-color:#3ef2da;">{{ $value['total_f_misprint'] }}</td>
                                      <td style="background-color:#3ef2da;">{{ $value['total_f_cacat_tenun'] }}</td>
                                      <td style="background-color:#3ef2da;">{{ $value['total_f_bolong'] }}</td>
                                      <td style="background-color:#3ef2da;">{{ $value['total_f_kotor'] }}</td>
                                      <td style="background-color:#3ef2da;">{{ $value['total_f_lain_lain'] }}</td>
                                      <td style="background-color:#3ef2da;color:red;">{{ $value['total_totalFabric'] }}</td>
                                      <td style="background-color:#3ef2da;">{{ $value['total_c_pinggir_kain'] }}</td>
                                      <td style="background-color:#3ef2da;">{{ $value['total_c_tidak_pas_pola'] }}</td>
                                      <td style="background-color:#3ef2da;">{{ $value['total_c_bolong'] }}</td>
                                      <td style="background-color:#3ef2da;">{{ $value['total_c_kotor'] }}</td>
                                      <td style="background-color:#3ef2da;">{{ $value['total_c_lain_lain'] }}</td>
                                      <td style="background-color:#3ef2da;color:red;">{{ $value['total_totalCutting'] }}</td>
                                      <td style="background-color:#3ef2da;">{{ $value['total_grandTotal'] }}</td>
                                      <td style="background-color:#3ef2da;"></td>
                                    </tr>
                                    <tr>
                                      <td colspan="4" style="background-color:#3ef2da;">PERCENTAGE</td>
                                      <td style="background-color:#3ef2da;">{{  round($value['percentage_total_f_misprint'],2) }}%</td>
                                      <td style="background-color:#3ef2da;">{{ round($value['percentage_total_f_cacat_tenun'],2) }}%</td>
                                      <td style="background-color:#3ef2da;">{{ round($value['percentage_total_f_bolong'],2) }}%</td>
                                      <td style="background-color:#3ef2da;">{{  round($value['percentage_total_f_kotor'],2) }}%</td>
                                      <td style="background-color:#3ef2da;">{{  round($value['percentage_total_f_lain_lain'],2) }}%</td>
                                      <td style="background-color:#3ef2da;">{{  round($value['percentage_total_totalFabric'],2) }}%</td>
                                      <td style="background-color:#3ef2da;">{{  round($value['percentage_total_c_pinggir_kain'],2) }}%</td>
                                      <td style="background-color:#3ef2da;">{{  round($value['percentage_total_c_tidak_pas_pola'],2) }}%</td>
                                      <td style="background-color:#3ef2da;">{{  round($value['percentage_total_c_bolong'],2) }}%</td>
                                      <td style="background-color:#3ef2da;">{{  round($value['percentage_total_c_kotor'],2) }}%</td>
                                      <td style="background-color:#3ef2da;">{{  round($value['percentage_total_c_lain_lain'],2) }}%</td>
                                      <td style="background-color:#3ef2da;">{{  round($value['percentage_total_totalCutting'],2) }}%</td>
                                      <td style="background-color:#3ef2da;">{{  round($value['percentage_total_grandTotal'],2) }}%</td>
                                      <td style="background-color:#3ef2da;"></td>
                                    </tr>
                                @endforeach
                                   
                                </table>
                                <br>
                                <div class="row">
                                  <div class="col-md-1 col-6">
                                    <form action="{{ route('RejectCutting.dailyPDF') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                          <input type="hidden" name="tanggal" id="tanggal" value="{{$tanggal}}">
                                          <input type="hidden" name="branch" id="branch" value="{{ $dataBranch->id }}">
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-file-pdf"></i> Download PDF</button> 
                                    </form>
                                  </div>
                                  <div class="col-md-1 col-6  ml-5">
                                    <form action="{{ route('RejectCutting.dailyExcel') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                          <input type="hidden" name="tanggal" id="tanggal" value="{{$tanggal}}">
                                          <input type="hidden" name="branch" id="branch" value="{{ $dataBranch->id }}">
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
@endsection

@push("scripts")

@endpush



