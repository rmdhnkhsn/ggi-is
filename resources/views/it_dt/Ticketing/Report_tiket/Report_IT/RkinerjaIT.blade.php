@extends("layouts.app")
@section("title","IT & DT Ticketing")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
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
@endpush
@push("sidebar")
    @include('it_dt.Ticketing.itdt_ticketing.layouts.navbar')
@endpush

@section("content")
  <section class="content">
      <div class="container-fluid">
        <div class="btn-group" style="padding-bottom:10px">
          <a href="{{ url()->previous() }}" type="button" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-circle-left"></i>  Back</a>
        </div>
        <div class="row">
              <div class="col-12">
                <div class="card">
                    <div class="card-body" style="overflow:scroll;">
                      <center><h3 style="font-weight:bold;font-size:20px;"> MONTHLY REPORT TICKET IT SUPPORT</h3>
                      <h3 style="font-weight:bold;font-size:15px;"> FACTORY : {{$dataBranch->nama_branch}}</h3>
                      <h3 style="font-weight:bold;font-size:13px;"> {{$dataBulan}}  {{$tahun}}</h3> </center>
                      <table class="table table-bordered">
                        <tr>
                          <td style="font-weight:bold;">Date</td>
                          <td style="font-weight:bold;">IT Support</td>
                          <td style="font-weight:bold;">Total Ticket Assign </td>
                          <td style="font-weight:bold;">Total Ticket Pending </td>
                          <td style="font-weight:bold;">Total Ticket Done </td>
                        </tr>
                        @foreach($tiket_kinerja as $key =>$value)
                          <tr>
                              <td rowspan="{{count($value) + 1}}">{{$key}}</td>
                          </tr>
                          @foreach($value as $dp)
                          <tr>
                              <td>{{$dp['nama']}}</td>
                              <td>{{$dp['tiket']}}</td>
                              <td>{{$dp['pending']}}</td>
                              <td>{{$dp['done']}}</td>
                          </tr>
                          @endforeach

                          @foreach($tiket_jum as $key1 =>$dt)
                            @if($dt['tgl'] == $key)
                            <tr>
                                <td colspan="2" style="background-color:#DCDCDC;">TOTAL</td>
                                <td style="background-color:#DCDCDC;">{{$dt['assign']}}</td>
                                <td style="background-color:#DCDCDC;">{{$dt['pending']}}</td>
                                <td style="background-color:#DCDCDC;">{{$dt['done']}}</td>
                            </tr>
                            @endif
                          @endforeach
                        @endforeach
                        <tr>
                          <td style="background-color:#C0C0C0;" colspan="2" > TOTAL Ticket {{$dataBulan}}  {{$tahun}}</td>
                          <td style="background-color:#C0C0C0;">{{$total_tiket['assign']}}</td>
                          <td style="background-color:#C0C0C0;">{{$total_tiket['pending']}}</td>
                          <td style="background-color:#C0C0C0;">{{$total_tiket['done']}}</td>
                        </tr>
                        <tr>
                          <td colspan="5"> </td>
                        </tr>
                        <tr>
                          <th style="background-color:#DCDCDC;" colspan="2" style="font-weight:bold;">IT Support</th>
                          <th style="background-color:#DCDCDC;" style="font-weight:bold;">Total Ticket Assign </th>
                          <th style="background-color:#DCDCDC;" style="font-weight:bold;">Total Ticket Pending </th>
                          <th style="background-color:#DCDCDC;" style="font-weight:bold;">Total Ticket Done </th>
                        </tr>
                        @foreach($tiket_total_it as $key2 =>$totalIT)
                          <tr>
                            <td  colspan="2">{{$totalIT['nama']}}</td>
                            <td >{{$totalIT['assign']}}</td>
                            <td >{{$totalIT['pending']}}</td>
                            <td >{{$totalIT['done']}}</td>
                          </tr>
                        @endforeach
                      </table>
                    </div>
                </div>
              </div>
        </div>
      </div>
  </section>  
@endsection
@push("scripts") 
<script>
  $(document).ready(function() {
      $('.select3').select2({
          placeholder:"Select Branch",
          theme: 'bootstrap4'
      });
  });
  $(document).ready(function() {
      $('.select4').select2({
          placeholder:"Select Branch Detail",
          theme: 'bootstrap4'
      });
  });
  $('#reservationdate').datetimepicker({
      format: 'Y-MM-DD'
  });
</script>
@endpush

