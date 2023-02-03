@extends("layouts.app")
@section("title","Report Finishing")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight4.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- <style>
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
</style> --}}
@endpush



@push("sidebar")
@endpush

@section("content")
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <div class="cards" style="padding: 1.5rem 1.8rem 2.2rem 1.8rem">
                <form id="download"  action="{{ route('report.index.reportWo') }}" method="post" enctype="multipart/form-data">
                  @csrf
                <div class="row">
                  <div class="col-12 mb-2">
                    <div class="title-24">Summary Target Per Wo</div>
                  </div>
                  <div class="col-10x4-3">
                    <div class="title-sm">WO</div>
                    <div class="input-group mt-1">
                      <div class="input-group-prepend">
                          <span class="inputGroupBlue" for=""><i class="fas fa-list-ol" style="font-size:20px"></i> </span>
                      </div>
                        <select class="form-control  border-input-10 select2bs4 livesearch" id="wo" name="wo" placeholder="masukkan wo...">
                          <option  selected> </option>
                          @foreach($dataBywo as $key => $value)
                          <option value="{{$value['wo']}}">{{$value['wo']}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-10x4-3">
                    <div class="title-sm">Style</div>
                    <input type="text" name="style" id="style" class="form-control  border-input-10 mt-1" readonly/>
                  </div>
                  <div class="col-10x4-3">
                    <div class="title-sm">Buyer</div>
                     <input type="text" name="buyer"  id="buyer" class="form-control  border-input-10 mt-1" readonly/>
                  </div>
                  <div class="col-10x4-1">
                    <div class="title-sm text-white">x</div>
                    <input type="hidden" name="wo" id="wo2" value="{{$selectWotest}}">
                     <input type="hidden" name="tanggal" id="tanggal" value="{{$tanggal}}">
                      <input type="hidden" name="status_proses" id="status_proses" value="{{$status_proses}}">
                      <input type="hidden" name="branch" id="branch" value="{{ $dataBranch->id }}">
                    <button type="submit"  class="btn-red mt-1">Download <i class="fs-18 ml-3 fas fa-download" ></i> </button>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <div class="col-12">
              <div class="cards" style="padding: 1.5rem 1.8rem 2.2rem 1.8rem">
                <form id="download"  action="{{ route('report.index.reportCategory') }}" method="post" enctype="multipart/form-data">
                  @csrf
                <div class="row">
                  <div class="col-12 mb-2">
                    <div class="title-24">Summary Target PerCategory</div>
                  </div>
                  <div class="col-md-4">
                    <div class="title-sm">Proses</div>
                    <div class="input-group mt-1">
                      <div class="input-group-prepend">
                          <span class="inputGroupBlue" for=""><i class="fas fa-list-ol" style="font-size:20px"></i> </span>
                      </div>
                        <select class="form-control border-input-10 select2bs4 livesearch" id="nama_kategori" name="status_proses" placeholder="masukkan nik..." required>
                            <option  selected> </option>
                            @foreach($dataByCategory as $key => $value)
                            <option value="{{$value['nama_kategori']}}">{{$value['nama_kategori']}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="title-sm text-white">x</div>
                    <select class="form-control border-input-10 js-example-basic-multiple" id="sub_kategori"  multiple="multiple" name="status[]" placeholder="masukkan nik..." required>
                        <option  selected> </option> 
                    </select>
                  </div>
                  {{-- <div class="col-10x4-3">
                    <div class="title-sm">Buyer</div>
                     <input type="text" name="buyer"  id="buyer" class="form-control  border-input-10 mt-1" readonly/>
                  </div> --}}
                  <div class="col-md-4">
                    <div class="title-sm text-white">x</div>
                    {{-- <input type="hidden" name="status" id="status" value="{{$status}}"> --}}
                     <input type="hidden" name="tanggal" id="tanggal" value="{{$tanggal}}">
                      <input type="hidden" name="status_proses" id="status_proses" value="{{$status_proses}}">
                      <input type="hidden" name="branch" id="branch" value="{{ $dataBranch->id }}">
                    <button type="submit"  class="btn-red mt-1">Download <i class="fs-18 ml-3 fas fa-download" ></i> </button>
                  </div>
                </div>
                </form>
              </div>
            </div>

            <div class="col-12">
                <div class="cards p-4">
                  <div class="row">
                    <div class="col-12">
                      <center><h4 style="font-weight:bold;">DATA REPORT FINISHING</h4></center>
                      <center><h6>FACILITY : {{ $dataBranch->nama_branch }}  </h6></center> 
                      <center><h6>DATE : {{ \Carbon\Carbon::parse($tanggal )->locale('id')->format('d-m-Y') }} </h6></center>
                      {{-- <form action="{{ route('report.index.reportWo') }}" method="get" enctype="multipart/form-data">
                        @csrf --}}
                        <div class="row">
                          {{-- <div class="col-md-6">
                            <label>WO</label>
                              <select class="form-control  border-input-10 select2bs4 livesearch" name="wo" placeholder="masukkan wo...">
                                  <option  selected> </option>
                                  @foreach($dataBywo as $key => $value)
                                  <option value="{{$value['wo']}}">{{$value['wo']}}</option>
                                  @endforeach
                              </select>
                          </div> --}}
                          {{-- <div class="col-md-6">
                              <label>Style</label>
                              <select class="form-control  border-input-10 select2bs4 livesearch" id="nama_kategori" name="status_proses" placeholder="masukkan nik..." required>
                                  <option  selected> </option>
                                  @foreach($dataBystyle as $key2 => $value2)
                                  <option value="{{$value2['style']}}">{{$value2['style']}}</option>
                                  @endforeach
                              </select>
                          </div> --}}
                        {{-- </div>
                        <br>
                        <button type="submit" class="btn btn-primary btn-block">Get</button>
                      </form> --}}
                      <div class="cards-scroll scrollX my-3" id="scroll-bar">
                        <table id="DTtable" class="table tbl-content no-wrap">
                          <thead>
                            <tr>
                              <th>NO</th>
                              <th>TANGGAL</th>
                              <th>STYLE</th>
                              <th>BUYER</th>
                              <th>PROSES</th>
                              <th>PLACING</th>
                              <th>WO</th>
                              <th>TOTAL</th>
                              <th>START</th>
                              <th>FINISH</th>
                              <th>NAMA</th>
                              <th>NIK</th>
                              <th>REMARK</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($data_awal as $key => $value)
                              <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{  \Carbon\Carbon::parse($value['tanggal'] )->locale('id')->format('d-m-Y')  }}</td>
                                <td>{{ $value['style'] }}</td>
                                <td>{{ $value['buyer'] }}</td>
                                <td>{{ $value['status_proses'] }},{{ str_replace(['"','[',']'], '', $value['status']) }}</td>
                                <td>{{ $value['placing'] }}</td>
                                <td>{{ $value['wo'] }}</td>
                                <td>{{ $value['qty_target'] }}</td>
                                <td>{{ $value['jam_mulai'] }}</td>
                                <td>{{ $value['jam_selesai'] }}</td>
                                <td>{{ $value['nama'] }}</td>
                                <td>{{ $value['nik'] }}</td>
                                <td>{{ $value['remark'] }}</td>
                              </tr>
                              @endforeach
                             
                            </tbody>

                          <tfoot>
                            <tr>
                              <th>NO</th>
                              <th>TANGGAL</th>
                              <th>STYLE</th>
                              <th>BUYER</th>
                              <th>PROSES</th>
                              <th>PLACING</th>
                              <th>WO</th>
                              <th>TOTAL</th>
                              <th>START</th>
                              <th>FINISH</th>
                              <th>NAMA</th>
                              <th>NIK</th>
                              <th>REMARK</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 flex" style="gap:.8rem">
                      <form action="{{ route('finishing.reportPDF') }}" method="post" enctype="multipart/form-data">
                          @csrf
                            <input type="hidden" name="tanggal" id="tanggal" value="{{$tanggal}}">
                            <input type="hidden" name="status_proses" id="status_proses" value="{{$status_proses}}">
                            <input type="hidden" name="branch" id="branch" value="{{ $dataBranch->id }}">
                        <button type="submit" class="btn-merah-md ml-2">Download<i class="ml-2 fas fa-file-pdf"></i></button>
                      </form>
                      <form action="{{ route('finishing.reportExcel') }}" method="post" enctype="multipart/form-data">
                          @csrf
                            <input type="hidden" name="tanggal" id="tanggal" value="{{$tanggal}}">
                            <input type="hidden" name="status_proses" id="status_proses" value="{{$status_proses}}">
                            <input type="hidden" name="branch" id="branch" value="{{ $dataBranch->id }}">
                          <button type="submit" class="btn-green-md">Download<i class="ml-2 fas fa-file-excel"></i></button> 
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>  
@endsection

@push("scripts")

<script>
  $(function () {
    $("#DTtable").DataTable({
      "pageLength": 10,
      dom: 'rtp',
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
  
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#DTtable tfoot th').each( function () {
        var title = $('#DTtable thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" class="border-input-10 px-2" placeholder="search..." />' );
    });
    var table = $('#DTtable').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
              .search( this.value )
              .draw();
        });
    });
  });
</script>
<script type="text/javascript">
$(".js-example-basic-multiple").select2();
</script>
<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

</script>
<script>
   $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
/* When click New customer button */
  });
   $('#wo').change(function(){
  var ID = $(this).val();
// console.log(ID);
    if(ID){
        $.ajax({
        data: {
          ID: ID,
        },
        url: '{{ route("folding.getuser.wo") }}',           
        type: "post",
        dataType: 'json',
        success: function (data) {     
          $('#style').val(data.style)
          $('#buyer').val(data.buyer)
          $('#wo2').val(data.wo)
        },

      });
    }
  }); 
</script>
<script>
  $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
  /* When click New customer button */
  });
    $('#nama_kategori').change(function(){
      var ID = $(this).val();    
      if(ID){
          $.ajax({
          data: {
            ID: ID,
          },
          url: '{{ route("folding.getCategory") }}',           
          type: "post",
          dataType: 'json', 
            success:function(res){               
              if(res){
                  $("#sub_kategori").empty();
                  $("#sub_kategori").append('');
                  $.each(res,function(data,sub_kategori){
                    // console.log(data.sub_kategori);
                      $("#sub_kategori").append('<option value="'+data+'">'+data+'</option>');
                  });
              }else{
                $("#sub_kategori").empty();
              }
            }
          });
      }else{
          $("#sub_kategori").empty();
      }      
    });
</script>

@endpush



