@extends("layouts.app")
@section("title","PPIC Reject Cutting")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
  .table-responsive {
  display: block;
  width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch; }
  .table-responsive > .table-bordered {
    border: 0; }

  .no-wrap td,
  .no-wrap th {
  white-space: nowrap; }

</style>
@endpush
@push("sidebar")
  @include('ppic.form_return.layouts.navbar')
@endpush

@section("content")
<section class="content">
    <!-- Main content -->
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->   
        <div class="row mt-2">
          <div class="col-12">
            <span class="reject-cutting-tittle">Data Reject</span>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <ul class="nav nav-tabs rc-tabs mb-4" role="tablist">
              <li class="nav-item-show">
                <a class="nav-link py-2 active" data-toggle="tab" href="#proses" role="tab"></i>Reject Cutting
                  <span class="number-badge">{{ $prosess }}</span>
                </a>
                <div class="rc-slide"></div>
              </li>
              <li class="nav-item-show">
                <a class="nav-link py-2" data-toggle="tab" href="#ganti" role="tab"></i>Reject Sudah Diganti
                  <span class="number-badge">{{ $done }}</span>
                </a>
                <div class="rc-slide"></div>
              </li>
            </ul>

            <div class="tab-content card-block">
              <div class="tab-pane active" id="proses" role="tabpanel">
                  <div class="row mt-3">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Master Reject Cutting</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive">
                        <table id="tabelReject" class="table table-bordered table-striped no-wrap">
                          <thead>
                              <tr>
                                  <th>Table</th>
                                  <th>WO</th>
                                  <th>Style</th>
                                  <th>Colour</th>
                                  <th>Total Ratio</th>
                                  <th>Qty gelar</th>
                                  <th>Qty Table</th>
                                  <th>Total Reject</th>
                                  <th>%Tase</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($dataProsesReject as $key => $value)
                                <tr>
                                  <td>{{ $value['meja'] }}</td>
                                  <td>{{ $value['t_v4801c_doco'] }}</td>
                                  <td>{{ $value['style'] }}</td>
                                  <td>{{ $value['color'] }}</td>
                                  <td>
                                    <a href=" "  data-toggle="modal" data-target="#exampleModalCenter{{$value ['id'] }}" title="View Info">{{ $value['total_ratio'] }}</a>
                                    <!-- Modal -->
                                      <div class="modal fade" id="exampleModalCenter{{$value ['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLongTitle">Ratio Cutting</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                              <div class="modal-body">
                                                <table class="table">
                                                  <thead>
                                                      <tr>
                                                        <th rowspan="2">Color</th>
                                                        <th colspan="5">Ratio Cutting</th>
                                                        <th rowspan="2">Total Ratio Cutting</th>

                                                      </tr>
                                                      <tr>
                                                          <th>S</th>
                                                          <th>M</th>
                                                          <th>L</th>
                                                          <th>LL</th>
                                                          <th>XL</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                    @foreach ($dataReject as $key9 => $value9)
                                                      @if(($value['t_v4801c_doco'] == $value9['t_v4801c_doco']) && ($value['id'] == $value9['id']) && ($value['color'] == $value9['color']) && ($value['created_at'] == $value9['created_at']) && ($value['total_ratio'] == $value9['total_ratio']))
                                                        <tr>
                                                          <td rowspan="4">{{ $value9 ['color'] }}</td>
                                                          <td>{{ $value9 ['ratio_S'] }}</td>
                                                          <td>{{ $value9 ['ratio_M'] }}</td>
                                                          <td>{{ $value9 ['ratio_L'] }}</td>
                                                          <td>{{ $value9 ['ratio_LL'] }}</td>
                                                          <td>{{ $value9 ['ratio_XL'] }}</td>
                                                          <td>{{ $value9 ['total_ratio'] }}</td>
                                                        </tr>
                                                      @endif
                                                  </tbody>
                                                  @endforeach
                                                </table>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                  </td>
                                  <td>{{ $value['qty_gelar'] }}</td>
                                  <td>{{ $value['qty_check'] }}</td>
                                  <td>  
                                      <a href=" "  data-toggle="modal" data-target="#exampleModalCenter-1{{$value ['id'] }}" title="View Info">{{ $value['total_reject'] }}</a>
                                      <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter-1{{$value ['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLongTitle">Reject Cutting</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  <table class="table">
                                                    <thead>
                                                      <tr>
                                                        <th>Size</th>
                                                        <th>Qty Reject</th>
                                                        <th>Qty Gelar</th>
                                                        <th>Reason</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      @foreach ($rejectDetail as $key2=>$value2)
                                                        @if(($value ['t_v4801c_doco'] ==  $value2 ['F4801_DOCO']) && ($value ['color'] ==  $value2 ['color']) && ($value ['created_at'] ==  $value2 ['created_at']))   
                                                          <tr>
                                                            <td>{{ $value2 ['size'] }}</td>
                                                            <td>{{ $value2 ['reject'] }}</td>
                                                            <td>{{ $value2 ['qty_gelar'] }}</td>
                                                            <td>{{ $value2 ['reason'] }}</td>
                                                          </tr>
                                                        @endif
                                                      @endforeach
                                                    </tbody>
                                                  </table>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                    </td>
                                    <td>{{round( $value['percentage'],2) }}%</td>
                                    <td>
                                        <button type="button" class="btn rc-btn-prosess" data-toggle="modal" data-target="#exampleModalCenter-2{{$value ['id'] }}" title="Create">
                                          Process<i class="ml-3 fas fa-spinner"></i>
                                        </button>
                                        <!-- Modal -->
                                          <div class="modal fade" id="exampleModalCenter-2{{$value ['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document" style="width:370px">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Proses Pergantian Kain</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                      <div class="modal-body">
                                                      <form action="{{route ('form_return.update.process') }}" method="post" enctype="multipart/form-data">
                                                          @csrf
                                                              <div class="mb-3">
                                                                <label for="remark"  class="col-form-label">Message:</label>
                                                                <textarea class="form-control" id="remark" name="remark"></textarea>
                                                              </div>
                                                          </div>
                                                          <div class="modal-footer">
                                                              <input type="hidden" id="id" name="id" value="{{ $value['id'] }}">
                                                              <input type="hidden" id="status" name="status" value="done">
                                                              <button type="submit" class="btn rc-btn-assign btn-block">Asign<i class=" ml-3 fas fa-thumbs-up"></i></button>
                                                        </form>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div> 
                                      </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                              <tfoot>
                                  <tr>
                                    <th>Table</th>
                                    <th>WO</th>
                                    <th>Style</th>
                                    <th>Colour</th>
                                    <th>Total Ratio</th>
                                    <th>Qty gelar</th>
                                    <th>Qty Table</th>
                                    <th>Total Reject</th>
                                    <th>%Tase</th>
                                    <th>Action</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                </div>
              </div>
              <div class="tab-pane" id="ganti" role="tabpanel">
                      <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Master Reject Cutting</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive">
                        <table id="tabelDoneReject" class="table table-bordered table-striped no-wrap">
                          <thead>
                              <tr>
                                  <th>Table</th>
                                  <th>WO</th>
                                  <th>Style</th>
                                  <th>Colour</th>
                                  <th>Total Ratio</th>
                                  <th>Qty gelar</th>
                                  <th>Qty Table</th>
                                  <th>Total Reject</th>
                                  <th>%Tase</th>
                                  <th>Remark</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($dataDoneReject as $key9 => $value9)
                                <tr>
                                  <td>{{ $value9['meja'] }}</td>
                                  <td>{{ $value9['t_v4801c_doco'] }}</td>
                                  <td>{{ $value9['style'] }}</td>
                                  <td>{{ $value9['color'] }}</td>
                                  <td>
                                    <a href=" "  data-toggle="modal" data-target="#exampleModalCenter{{$value9 ['id'] }}" title="View Info">{{ $value9['total_ratio'] }}</a>
                                    <!-- Modal -->
                                      <div class="modal fade" id="exampleModalCenter{{$value9 ['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLongTitle">Ratio Cutting</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                              <div class="modal-body">
                                                <table class="table">
                                                   <thead>
                                                      <tr>
                                                        <th rowspan="2">Color</th>
                                                        <th colspan="5">Ratio Cutting</th>
                                                        <th rowspan="2">Total Ratio Cutting</th>

                                                      </tr>
                                                      <tr>
                                                          <th>S</th>
                                                          <th>M</th>
                                                          <th>L</th>
                                                          <th>XL</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                    @foreach ($dataReject as $key11 => $value11)
                                                      @if(($value9['t_v4801c_doco'] == $value11['t_v4801c_doco']) && ($value9['id'] == $value11['id']) && ($value9['color'] == $value11['color']) && ($value9['created_at'] == $value11['created_at']))
                                                        <tr>
                                                          <td rowspan="4">{{ $value11 ['color'] }}</td>
                                                          <td>{{ $value11 ['ratio_S'] }}</td>
                                                          <td>{{ $value11 ['ratio_M'] }}</td>
                                                          <td>{{ $value11 ['ratio_L'] }}</td>
                                                          <td>{{ $value11 ['ratio_LL'] }}</td>
                                                          <td>{{ $value11 ['ratio_XL'] }}</td>
                                                          <td>{{ $value11 ['total_ratio'] }}</td>
                                                        </tr>
                                                      @endif
                                                  </tbody>
                                                  @endforeach
                                                </table>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                  </td>
                                  <td>{{ $value9['qty_gelar'] }}</td>
                                  <td>{{ $value9['qty_check'] }}</td>
                                  <td>  
                                      <a href=" "  data-toggle="modal" data-target="#exampleModalCenter-1{{$value9 ['id'] }}" title="View Info">{{ $value9['total_reject'] }}</a>
                                      <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter-1{{$value9 ['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLongTitle">Reject Cutting</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  <table class="table">
                                                    <thead>
                                                      <tr>
                                                        <th>Size</th>
                                                        <th>Qty Reject</th>
                                                        <th>Qty Gelar</th>
                                                        <th>Reason</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      @foreach ($rejectDetail as $key2=>$value2)
                                                        @if(($value9 ['t_v4801c_doco'] ==  $value2 ['F4801_DOCO']) && ($value9 ['color'] ==  $value2 ['color']))   
                                                          <tr>
                                                            <td>{{ $value2 ['size'] }}</td>
                                                            <td>{{ $value2 ['reject'] }}</td>
                                                            <td>{{ $value2 ['qty_gelar'] }}</td>
                                                            <td>{{ $value2 ['reason'] }}</td>
                                                          </tr>
                                                        @endif
                                                      @endforeach
                                                    </tbody>
                                                  </table>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </td>
                                    <td>{{ round($value9['percentage'],2) }}%</td>
                                    <td>{{ $value9['remark'] }}</td>
                                    </tr>
                                  @endforeach
                                </tbody>
                              <tfoot>
                                  <tr>
                                    <th>Table</th>
                                    <th>WO</th>
                                    <th>Style</th>
                                    <th>Colour</th>
                                    <th>Total Ratio</th>
                                    <th>Qty gelar</th>
                                    <th>Qty Table</th>
                                    <th>Total Reject</th>
                                    <th>%Tase</th>
                                    <th>Remark</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                </div>
              </div>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push("scripts")
<script>
    $('#myModal').modalSteps();
    $('#myModalEdit').modalSteps();
  </script>
  <script>
function sum_old() {
      var txtFirstNumberValue = document.getElementById('size1').value;
      var txtSecondNumberValue = document.getElementById('size2').value;
      var txtthirdNumberValue = document.getElementById('size3').value;
      var txtfourNumberValue = document.getElementById('size4').value;
      var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue)+parseInt(txtthirdNumberValue) + parseInt(txtfourNumberValue);
      if (!isNaN(result)) {
         document.getElementById('total_ratio').value = result;
         document.getElementById('total_ratio1').value = result;
      }
}

var total_ratio

function sum_reject() {
  var total_reject = 0
  $('.reject-size').each(function() { 
    total_reject += parseInt($(this).val())
  });
  console.log(total_reject)
  $('.total_reject').val(total_reject)

  var qty_gelar = $('#qty_gelar').val()
  var percentage = total_reject/qty_gelar*100
  $('#percentage').val(percentage.round(2))

  var qty_table = qty_gelar*total_ratio
  $('#qty_table').val(qty_table)

  
}

function sum() {
  total_ratio = 0
  $('.ratio-reject').each(function() { 
    total_ratio += parseInt($(this).val())
  });
  $('.total_ratio').val(total_ratio)
}

</script>
<script>
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

        $('#tabelDoneReject').DataTable(
            {
                "pageLength": 25,
                "responsive": true, "lengthChange": true, "autoWidth": false,
                
            } 
        );
    } );
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#tabelDoneReject tfoot th').each( function () {
            var title = $('#tabelDoneReject thead th').eq( $(this).index() ).text();
            $(this).html( '<input type="text" style="height:2em;" placeholder="Search '+title+'" />' );
        } );
    
        // DataTable
        var table = $('#tabelDoneReject').DataTable();
    
        // Apply the search
        table.columns().every( function () {
            var that = this;
    
            $( 'input', this.footer() ).on( 'keyup change', function () {
                that
                    .search( this.value )
                    .draw();
            } );
        } );
    } );
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    });

</script>
<script>
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

        $('#tabelReject').DataTable(
            {
                "pageLength": 25,
                "responsive": true, "lengthChange": true, "autoWidth": false,
                
            } 
        );
    } );
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#tabelReject tfoot th').each( function () {
            var title = $('#tabelReject thead th').eq( $(this).index() ).text();
            $(this).html( '<input type="text" style="height:2em;" placeholder="Search '+title+'" />' );
        } );
    
        // DataTable
        var table = $('#tabelReject').DataTable();
    
        // Apply the search
        table.columns().every( function () {
            var that = this;
    
            $( 'input', this.footer() ).on( 'keyup change', function () {
                that
                    .search( this.value )
                    .draw();
            } );
        } );
    } );
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    });

</script>

@endpush
  

  