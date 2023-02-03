@include('qc.reject_cutting.layouts.header')
@include('qc.reject_cutting.layouts.navbar')
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

  .no-wrap {
    white-space: nowrap;
}

</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper f-poppins">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="card-navigate">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="title-navigate-home"><i class="fas fa-home fs-18"></i></a></li>
            <!-- <li class="breadcrumb-item"><a href="{{ route('hrga.index') }}" class="title-navigate">Dashboard</a></li> -->
            <li class="breadcrumb-item"><a href="{{ route('RejectCutting.index') }}" class="title-navigate">Quality Controll</a></li>
            <li class="breadcrumb-item title-navigate-active" aria-current="page"><span class="active">Reject Cutting</span></li>
            <li class="navigate-active ml-Rcutting"></li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xl-2 col-sm-6">
              <span class="reject-cutting-tittle">Reject Cutting</span>
            </div>

            <div class="col-lg-9 col-xl-10 col-sm-6">
                <button type="button" class="CRD" data-toggle="modal" data-target="#myModal" title="Create">
                  <span class="mr-2">Create Reject Data</span>  
                  <i class="fas fa-plus"></i>
                </button>
                <!-- Modal -->
                <div id="formWoInformation">
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" style="border-radius:10px">
                          <form action="{{ route('') }}" method="POST" class="modal-body">
                            @csrf
                            @method('POST')
                            <div class="row">
                              <div class="col-12 mb-2">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                </button>
                              </div>  
                            </div> 
                            <div class="hide" data-step="1" data-title="General Identity">
                                  <div class="row">
                                    <div class="col-12 text-center mb-4">
                                      <span class="reject-cutting-tittle">General Identity</span>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-xl-6 col-lg-6">
                                      <span class="general-identity-title">WO Number</span>
                                        <div class="input-group mb-3 mt-2">
                                          <div class="input-group-prepend">
                                            <span class="input-group-select-GI"  for="F4801_DOCO" >WO</span>
                                          </div>
                                          <select class="form-control select2bs4"   id="F4801_DOCO" name="F4801_DOCO" >
                                            <option  selected> </option>
                                            @foreach($data as $key => $value)
                                              <option value="{{$value->F4801_DOCO}}">{{$value->F4801_DOCO}}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6">
                                      <span class="general-identity-title">Table Number</span>
                                      <div class="input-group mb-3 mt-2">
                                        <div class="input-group-prepend">
                                          <span class="input-group-select-GI" for="meja">Table</span>
                                        </div>
                                          <input type="text" class="form-control border-input" id="meja" name="meja" placeholder="0" required>
                                      </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6">
                                      <span class="general-identity-title">Serial Number</span>
                                      <div class="field mt-2">
                                          <input type="text" id="SN" name="SN" placeholder="00-000" required>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-xl-6 col-lg-6 line-2">
                                      <span class="general-identity-title">Buyer</span>
                                      <div class="input-group mb-3 mt-2">
                                        <div class="input-group-prepend">
                                          <span class="input-group-select" for="F0101_ALPH">Select Buyer</span>
                                        </div>
                                        <select class="custom-select" name="buyer" id="F0101_ALPH"></select>
                                      </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 line-2">
                                      <span class="general-identity-title">Color</span>
                                        <div class="input-group mb-3 mt-2">
                                          <div class="input-group-prepend">
                                            <span class="input-group-select-GI" for="F560020_SEG4">Color</span>
                                          </div>
                                          <select class="custom-select F560020_SEG4" name="color" id="F560020_SEG4"></select>
                                        </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-xl-6 col-lg-6 line-2">
                                      <span class="general-identity-title">Style</span>
                                      <div class="input-group mb-3 mt-2">
                                        <div class="input-group-prepend">
                                          <span class="input-group-select" for="F4801_DL01">Style</span>
                                        </div>
                                         {{-- <input type="text"  class="custom-select" name="style" id="F4801_DL01" required> --}}
                                        <select class="custom-select" name="style" id="F4801_DL01"></select>
                                      </div>
                                    </div>
                                    <div class="col-6 line-2">
                                      <span class="general-identity-title">Quantity / Sheet</span>
                                      <div class="field mt-2">
                                          <input type="text" id="qty_gelar" name="qty_gelar" placeholder="Wo Number" value="0" required>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-12 text-center line-3">
                                      <span class="ratio-cutting-title">Ratio Cutting</span>
                                    </div>
                                  </div>
                                  <div class="row line-3" id="F560020_SIZE55"></div>
                                  <div class="row">
                                    <div class="col-6">
                                      <span class="general-identity-title">Qty Check QC</span>
                                      <div class="field mt-2">
                                          <input type="text" id="qty_check" name="qty_check" placeholder="Input QTY Check QC" required>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <span class="general-identity-title">Total Ratio</span>
                                      <div class="field mt-2">
                                          <input type="text" class="total_ratio" name="total_ratio" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-12 text-right">
                                      <button type="submit" class="btn btn-next js-btn-step" data-orientation="next">Next<i class="ml-2 fas fa-arrow-right"></i></button>
                                    </div>
                                  </div>
                                  <div class="progress-1"></div>
                                  <div class="progress-2"></div>
                                </div>

                           
                            <div class="hide" data-step="2" data-title="Reject">
                              <div class="row">
                                <div class="col-12 text-center mb-4">
                                  <span class="reject-cutting-tittle">Reject Quantity</span>
                                </div>
                              </div>
                              <div class="row" id="wo_reject"></div>
                              <div class="row mt-3">
                                <div class="col-12 text-center">
                                  <span class="ratio-cutting-title">Totals</span>
                                </div>
                              </div>
                              <div class="row mt-2 mb-3">
                                <div class="col-xl-3 col-lg-6">
                                  <span class="general-identity-title">QTY Table</span>
                                  <div class="field mt-2">
                                      <input type="text" id="qty_table" name="qty_table" placeholder="" disabled>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                  <span class="general-identity-title">Total Ratio</span>
                                  <div class="field mt-2">
                                      <input type="text" class="total_ratio" name="total_ratio" placeholder=" " disabled>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                  <span class="general-identity-title">Total Reject</span>
                                  <div class="field mt-2">
                                      <input type="text" class="total_reject" name="total_reject" placeholder="0" disabled>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                  <span class="general-identity-title">Percentage</span>
                                  <div class="field mt-2">
                                      <input type="text" id="percentage" name="percentage" placeholder="%"  disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="row mb-4 mt-3">
                                <div class="col-lg-12 text-right">
                                  <button type="submit" class="btn btn-next store-wo-information" id="wo">Save
                                    <i class="ml-3 fas fa-download"></i>
                                  </button>
                                </div>
                              </div>
                              <div class="progress-3"></div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

              </div>

          </div>

          {{-- <div class="row">
            <div class="col-12">
              <div class="no-reject-data">
                <img src="{{url('images/iconpack/icon-noreject.svg')}}"><br>
              </div>
              <span class="no-reject-capt">No Reject Data</span>
            </div>
          </div> --}}

        <div class="row mt-3">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Master Reject Cutting</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped no-wrap">
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
                          @foreach ($dataWaitingReject as $key5 => $value5)
                            <tr>
                              <td>{{ $value5['meja'] }}</td>
                              <td>{{ $value5['t_v4801c_doco'] }}</td>
                              <td>{{ $value5['style'] }}</td>
                              <td>{{ $value5['color'] }}</td>
                              <td>
                                <a href=" "  data-toggle="modal" data-target="#exampleModalCenter{{$value5 ['t_v4801c_doco'] }}" title="View Info">{{ $value5['total_ratio'] }}</a>
                                <!-- Modal -->
                                  <div class="modal fade" id="exampleModalCenter{{$value5 ['t_v4801c_doco'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                  <th rowspan="2">Colour</th>
                                                  <th colspan="2">Ratio Cutting</th>
                                                </tr>
                                                <tr>
                                                    <th>Ratio</th>
                                                    <th>Nilai</th>                    
                                                </tr>
                                              </thead>
                                              <tbody>
                                                @foreach ($dataReject as $key2=>$value2)
                                                @if(($value5 ['t_v4801c_doco'] ==  $value2['t_v4801c_doco']))  
                                                <tr>
                                                  <td rowspan="4">{{ $value5 ['color'] }}</td>
                                                  <td>{{ $value2 ['size'] }}</td>
                                                  <td>{{ $value2 ['ratio'] }}</td>
                                                </tr>
                                                @endif
                                              </tbody>
                                                @endforeach
                                              <tfoot>
                                                <tr>
                                                  <td colspan="2"> Total Ratio</td>
                                                  <td>{{ $value5['total_ratio'] }}</td>
                                                </tr>
                                              </tfoot>
                                            </table>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                              </td>
                              <td>{{ $value5['qty_gelar'] }}</td>
                              <td>{{ $value5['qty_check'] }}</td>
                              <td>  
                                  <a href=" "  data-toggle="modal" data-target="#exampleModalCenter-1{{$value5 ['t_v4801c_doco'] }}" title="View Info">{{ $value5['total_reject'] }}</a>
                                  <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter-1{{$value5 ['t_v4801c_doco'] }}" tabindex="-1" role="dialog"            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                  @foreach ($dataReject as $key3=>$value3)
                                                    @if(($value5 ['t_v4801c_doco'] ==  $value3['t_v4801c_doco']))  
                                                      <tr>
                                                        <td>{{ $value3 ['size'] }}</td>
                                                        <td>{{ $value3 ['reject'] }}</td>
                                                        <td>{{ $value3 ['qty_gelar'] }}</td>
                                                        <td>{{ $value3 ['reason'] }}</td>
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
                              <td>{{ $value5['percentage'] }}%</td>
                              <td>
                                  <a href="javascript:void(0)" class="btn btn-primary btn-sm update-wo-information" 
                                  data-wo_id="{{ $value5['t_v4801c_doco'] }}">Update</a>
                                  <form action="{{route ('RejectCutting.update.approve') }}" method="post" enctype="multipart/form-data">
                                          @csrf
                                          <input type="hidden" id="id" name="id" value="{{ $value5['id'] }}">
                                          <input type="hidden" id="status" name="status" value="prosess">
                                            <button type="submit" class="btn btn-primary btn-sm editProduct"><i class="fas  fa-times-circle"></i>Approve</button>
                                        </form>
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

        <div class="row mt-2">
          <div class="col-12">
            <span class="reject-cutting-tittle">Daftar Reject</span>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <ul class="nav nav-tabs rc-tabs mb-4" role="tablist">
              <li class="nav-item-show">
                <a class="nav-link py-2 active" data-toggle="tab" href="#proses" role="tab"></i>Dalam Prosess Penggantian
                  <span class="number-badge">{{ $prosess }}</span>
                </a>
                <div class="rc-slide"></div>
              </li>
              <li class="nav-item-show">
                <a class="nav-link py-2" data-toggle="tab" href="#ganti" role="tab"></i>Reject sudah diganti
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
                        <table id="tabel" class="table table-bordered table-striped no-wrap">
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
                              @foreach ($dataProsesReject  as $key => $value)
                                <tr>
                                  <td>{{ $value['meja'] }}</td>
                                  <td>{{ $value['t_v4801c_doco'] }}</td>
                                  <td>{{ $value['style'] }}</td>
                                  <td>{{ $value['color'] }}</td>
                                  <td>
                                    <a href=" "  data-toggle="modal" data-target="#exampleModalCenter{{$value ['t_v4801c_doco'] }}" title="View Info">{{ $value['total_ratio'] }}</a>
                                    <!-- Modal -->
                                      <div class="modal fade" id="exampleModalCenter{{$value ['t_v4801c_doco'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                      <th rowspan="2">Colour</th>
                                                      <th colspan="2">Ratio Cutting</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Ratio</th>
                                                        <th>Nilai</th>                    
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    @foreach ($dataReject as $key2=>$value2)
                                                    @if(($value ['t_v4801c_doco'] ==  $value2['t_v4801c_doco']))  
                                                    <tr>
                                                      <td rowspan="4">{{ $value ['color'] }}</td>
                                                      <td>{{ $value2 ['size'] }}</td>
                                                      <td>{{ $value2 ['ratio'] }}</td>
                                                    </tr>
                                                    @endif
                                                  </tbody>
                                                    @endforeach
                                                  <tfoot>
                                                    <tr>
                                                      <td colspan="2"> Total Ratio</td>
                                                      <td>{{ $value['total_ratio'] }}</td>
                                                    </tr>
                                                  </tfoot>
                                                </table>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                  </td>
                                  <td>{{ $value['qty_gelar'] }}</td>
                                  <td>{{ $value['qty_check'] }}</td>
                                  <td>  
                                      <a href=" "  data-toggle="modal" data-target="#exampleModalCenter-1{{$value ['t_v4801c_doco'] }}" title="View Info">{{ $value['total_reject'] }}</a>
                                      <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter-1{{$value ['t_v4801c_doco'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                      @foreach ($dataReject as $key2=>$value2)
                                                        @if(($value ['t_v4801c_doco'] ==  $value2['t_v4801c_doco']))  
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
                                    <td>{{ $value['percentage'] }}%</td>
                                    <td>
                                       
                                        <form action="{{route ('RejectCutting.update.waiting') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" id="id" name="id" value="{{ $value['id'] }}">
                                        <input type="hidden" id="status" name="status" value="waiting">
                                          <button type="submit" class="btn btn-danger btn-sm editProduct"><i class="fas  fa-times-circle"></i>cancel</button>
                                      </form>
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
                        <table id="tabelDaftarReject" class="table table-bordered table-striped no-wrap">
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
                              @foreach ($dataDoneReject as $key => $value)
                                <tr>
                                  <td>{{ $value['meja'] }}</td>
                                  <td>{{ $value['t_v4801c_doco'] }}</td>
                                  <td>{{ $value['style'] }}</td>
                                  <td>{{ $value['color'] }}</td>
                                  <td>
                                    <a href=" "  data-toggle="modal" data-target="#exampleModalCenter{{$value ['t_v4801c_doco'] }}" title="View Info">{{ $value['total_ratio'] }}</a>
                                    <!-- Modal -->
                                      <div class="modal fade" id="exampleModalCenter{{$value ['t_v4801c_doco'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                      <th rowspan="2">Colour</th>
                                                      <th colspan="2">Ratio Cutting</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Ratio</th>
                                                        <th>Nilai</th>                    
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    @foreach ($dataReject as $key2=>$value2)
                                                    @if(($value ['t_v4801c_doco'] ==  $value2['t_v4801c_doco']))  
                                                    <tr>
                                                      <td rowspan="4">{{ $value ['color'] }}</td>
                                                      <td>{{ $value2 ['size'] }}</td>
                                                      <td>{{ $value2 ['ratio'] }}</td>
                                                    </tr>
                                                    @endif
                                                  </tbody>
                                                    @endforeach
                                                  <tfoot>
                                                    <tr>
                                                      <td colspan="2"> Total Ratio</td>
                                                      <td>{{ $value['total_ratio'] }}</td>
                                                    </tr>
                                                  </tfoot>
                                                </table>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                  </td>
                                  <td>{{ $value['qty_gelar'] }}</td>
                                  <td>{{ $value['qty_check'] }}</td>
                                  <td>  
                                      <a href=" "  data-toggle="modal" data-target="#exampleModalCenter-1{{$value ['t_v4801c_doco'] }}" title="View Info">{{ $value['total_reject'] }}</a>
                                      <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter-1{{$value ['t_v4801c_doco'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                      @foreach ($dataReject as $key3=>$value3)
                                                        @if(($value ['t_v4801c_doco'] ==  $value3['t_v4801c_doco']))  
                                                          <tr>
                                                            <td>{{ $value3 ['size'] }}</td>
                                                            <td>{{ $value3 ['reject'] }}</td>
                                                            <td>{{ $value3 ['qty_gelar'] }}</td>
                                                            <td>{{ $value3 ['reason'] }}</td>
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
                                    <td>{{ round($value['percentage']) }}</td>
                                    <td>{{ $value['remark'] }}</td>
                                  
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
  </div>
  <!-- /.content-wrapper -->

  <form id="formUpdateWoInformation">
    <div class="modal fade" id="modalUpdateWoInformation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="border-radius:10px">
          <div class="modal-body">
            <div class="row">
              <div class="col-12 mb-2">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>  
            </div> 
            <div class="hide_0" data-step="1" data-title="General Identity">
                  <div class="row">
                    <div class="col-12 text-center mb-4">
                      <span class="reject-cutting-tittle">General Identity</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xl-6 col-lg-6">
                      <span class="general-identity-title">WO Number</span>
                        <div class="input-group mb-3 mt-2">
                          <div class="input-group-prepend">
                            <span class="input-group-select-GI" for="update_F4801_DOCO" >WO</span>
                          </div>
                          <select class="form-control select2bs4" id="update_F4801_DOCO" name="F4801_DOCO" >
                            <option  selected> </option>
                            @foreach($data as $key => $value)
                              <option value="{{$value->F4801_DOCO}}">{{$value->F4801_DOCO}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                      <span class="general-identity-title">Table Number</span>
                      <div class="input-group mb-3 mt-2">
                        <div class="input-group-prepend">
                          <span class="input-group-select-GI" for="update_meja">Table</span>
                        </div>
                          <input type="text" class="form-control border-input" id="update_meja" name="meja" placeholder="0" required>
                      </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                      <span class="general-identity-title">Serial Number</span>
                      <div class="field mt-2">
                          <input type="text" id="update_SN" name="SN" placeholder="00-000">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xl-6 col-lg-6 line-2">
                      <span class="general-identity-title">Buyer</span>
                      <div class="input-group mb-3 mt-2">
                        <div class="input-group-prepend">
                          <span class="input-group-select" for="update_F0101_ALPH">Select Buyer</span>
                        </div>
                        <select class="custom-select" name="buyer" id="update_F0101_ALPH"></select>
                      </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 line-2">
                      <span class="general-identity-title">Color</span>
                        <div class="input-group mb-3 mt-2">
                          <div class="input-group-prepend">
                            <span class="input-group-select-GI" for="update_F560020_SEG4">Color</span>
                          </div>
                          <select class="custom-select F560020_SEG4" name="color" id="update_F560020_SEG4"></select>
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xl-6 col-lg-6 line-2">
                      <span class="general-identity-title">Style</span>
                      <div class="input-group mb-3 mt-2">
                        <div class="input-group-prepend">
                          <span class="input-group-select" for="update_F4801_DL01">Style</span>
                        </div>
                        <select class="custom-select" name="style" id="update_F4801_DL01"></select>
                      </div>
                    </div>
                    <div class="col-6 line-2">
                      <span class="general-identity-title">Quantity / Sheet</span>
                      <div class="field mt-2">
                          <input type="text" id="update_qty_gelar" name="qty_gelar" placeholder="Wo Number" value="0" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12 text-center line-3">
                      <span class="ratio-cutting-title">Ratio Cutting</span>
                    </div>
                  </div>
                  <div class="row line-3" id="update_F560020_SIZE55"></div>
                  <div class="row">
                    <div class="col-6">
                      <span class="general-identity-title">Qty Check QC</span>
                      <div class="field mt-2">
                          <input type="text" id="update_qty_check" name="qty_check" placeholder="Input QTY Check QC" required>
                      </div>
                    </div>
                    <div class="col-6">
                      <span class="general-identity-title">Total Ratio</span>
                      <div class="field mt-2">
                          <input type="text" class="total_ratio" name="total_ratio" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 text-right">
                      <button type="button" class="btn btn-next js-btn-step" data-orientation="next">Next<i class="ml-2 fas fa-arrow-right"></i></button>
                    </div>
                  </div>
                  <div class="progress-1"></div>
                  <div class="progress-2"></div>
                </div>

            
            <div class="hide" data-step="2" data-title="Reject">
              <div class="row">
                <div class="col-12 text-center mb-4">
                  <span class="reject-cutting-tittle">Reject Quantity</span>
                </div>
              </div>
              <div class="row" id="update_wo_reject"></div>
              <div class="row mt-3">
                <div class="col-12 text-center">
                  <span class="ratio-cutting-title">Totals</span>
                </div>
              </div>
              <div class="row mt-2 mb-3">
                <div class="col-xl-3 col-lg-6">
                  <span class="general-identity-title">QTY Table</span>
                  <div class="field mt-2">
                      <input type="text" id="update_qty_table" name="qty_table" placeholder="" disabled>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                  <span class="general-identity-title">Total Ratio</span>
                  <div class="field mt-2">
                      <input type="text" class="total_ratio" name="total_ratio" placeholder=" " disabled>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                  <span class="general-identity-title">Total Reject</span>
                  <div class="field mt-2">
                      <input type="text" class="total_reject" name="total_reject" placeholder="0" disabled>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                  <span class="general-identity-title">Percentage</span>
                  <div class="field mt-2">
                      <input type="text" id="update_percentage" name="percentage" placeholder="%"  disabled>
                  </div>
                </div>
              </div>
              <div class="row mb-4 mt-3">
                <div class="col-lg-12 text-right">
                  <button type="button" class="btn btn-next update-new-wo-information" id="wo">Save
                    <i class="ml-3 fas fa-download"></i>
                  </button>
                </div>
              </div>
              <div class="progress-3"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>


@include('qc.reject_cutting.layouts.footer')

  <script>
    $('#myModal').modalSteps();
    $('#modalUpdateWoInformation').modalSteps();
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
  $('#percentage').val(percentage.toFixed(2))

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

        $('#tabelDaftarReject').DataTable(
            {
                "pageLength": 25,
                "responsive": true, "lengthChange": true, "autoWidth": false,
                
            } 
        );
    } );
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#tabelDaftarReject tfoot th').each( function () {
            var title = $('#tabel thead th').eq( $(this).index() ).text();
            $(this).html( '<input type="text" style="height:2em;" placeholder="Search '+title+'" />' );
        } );
    
        // DataTable
        var table = $('#tabelDaftarReject').DataTable();
    
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

        $('#tabel').DataTable(
            {
                "pageLength": 25,
                "responsive": true, "lengthChange": true, "autoWidth": false,
                
            } 
        );
    } );
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#tabel tfoot th').each( function () {
            var title = $('#tabel thead th').eq( $(this).index() ).text();
            $(this).html( '<input type="text" style="height:2em;" placeholder="Search '+title+'" />' );
        } );
    
        // DataTable
        var table = $('#tabel').DataTable();
    
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

        $('#example1').DataTable(
            {
                "pageLength": 25,
                "responsive": true, "lengthChange": true, "autoWidth": false,
                
            } 
        );
    } );
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#example1 tfoot th').each( function () {
            var title = $('#example1 thead th').eq( $(this).index() ).text();
            $(this).html( '<input type="text" style="height:2em;" placeholder="Search '+title+'" />' );
        } );
    
        // DataTable
        var table = $('#example1').DataTable();
    
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

    function loadColor() {
      
    }

    var wo_sizes
    function showWoInformation(id_wo, type, color) {
      $.ajax({
        data: {
          id_wo: id_wo,
        },
        url: '{{ route("RejectCutting.show-wo-information") }}',           
        type: "post",
        dataType: 'json',            
        success: function (data) {
          $('#F0101_ALPH').empty();
          $('#F4801_DL01').empty();
          
          var newOption = new Option(data.buyer, data.buyer, true, true);
          $('#F0101_ALPH').append(newOption).trigger('change');

          var newOption = new Option(data.style, data.style, true, true);
          $('#F4801_DL01').append(newOption).trigger('change');

          color_option = `<option selected disabled>Select Color</option>`
          for (let i = 0; i < data.wo_information.length; i++) {
            color_option += `<option value="`+data.wo_information[i].color+`">`+data.wo_information[i].color+`</option>`
          }
          $('#F560020_SEG4').html(color_option)
          $('#update_F560020_SEG4').html(color_option)
          wo_sizes = data.wo_size

          if (type == 'UPDATE') {
            var wo_size_filtered = wo_sizes.filter(wo_size => wo_size.color == color)
            reloadWoSize(wo_size_filtered)
          }

          // buyer = F0101_ALPH
          // style = F4801_DL01
          // color = F560020_SEG4
          // size = F560020_SIZE55

        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
      });
    }
    $('.select2bs4').change(function(){
      id_wo = $(this).val()
      console.log(id_wo)
      showWoInformation(id_wo, null, null)
    })

    $('.store-wo-information').click(function(){
      storeWoInformation()
    })

    $('.F560020_SEG4').change(function(){ 
      var color = $(this).val()
      var wo_size_filtered = wo_sizes.filter(wo_size => wo_size.color == color)
      reloadWoSize(wo_size_filtered)
    })

    function reloadWoSize(wo_size_filtered) {
      wo_size = ``
      for (let i = 0; i < wo_size_filtered.length; i++) {
        var number = i+1
        wo_size += `<div class="col-xl-3 col-lg-6">
                      <div class="input-group mb-3 mt-2">
                        <div class="input-group-prepend">
                        <span class="input-group-select" for="`+wo_size_filtered[i].size+`">Size `+wo_size_filtered[i].size+`</span>
                        </div>
                        <input type="hidden" name="size[]" value="`+wo_size_filtered[i].size+`">
                        <input type="text" class="form-control border-input ratio-reject" id="`+wo_size_filtered[i].size+`" name="ratio[]" value="0" onkeyup="sum();" required>
                      </div>
                    </div>` 
      }
      $('#F560020_SIZE55').html(wo_size)
      $('#update_F560020_SIZE55').html(wo_size)

      wo_reject = ``
      for (let i = 0; i < wo_size_filtered.length; i++) {
        var number = i+1
        wo_reject += `<div class="col-xl-3 col-lg-4">
                        <span class="general-identity-title">Size</span>
                        <div class="input-group mb-3 mt-2">
                          <div class="input-group-prepend">
                            <span class="input-group-select-size" for="reject`+number+`">`+wo_size_filtered[i].size+`</span>
                          </div>
                            <input type="text" class="form-control border-input reject-size" name="reject[]" value="0" onkeyup="sum_reject();" required>
                        </div>
                      </div>
                      <div class="col-xl-9 col-lg-8">
                        <span class="general-identity-title">Select Reason</span>
                        <div class="input-group mb-3 mt-2">
                          <div class="input-group-prepend">
                            <span class="input-group-select" for="inputGroupSelect01">Choose</span>
                          </div>
                            <select class="custom-select" name="reason[]" id="nama_riject`+number+`">
                            <option value="0" selected>Select Reason</option>
                          @foreach($nama as $key => $value)
                            <option value="{{$value->nama_riject}}">{{$value->nama_riject}}</option>
                          @endforeach
                        </select>
                        </div>
                      </div>`
      }
      $('#wo_reject').html(wo_reject)
      $('#update_wo_reject').html(wo_reject)

      // for (let i = 0; i < wo_size_filtered.length; i++) {
      //   var number = i+1
      //   $('#nama_riject'+number).val(wo_size_filtered[i].reason)
        
      // }
    }
    
    $('.select2bs4').change(function(){
      id_wo = $(this).val()
      console.log(id_wo)
      // showUpdateWoInformation(id_wo)
    })

    function storeWoInformation() {
      $.ajax({
        data: $('#formWoInformation').serialize(),
        url: '{{ route("RejectCutting.store-wo-information") }}',           
        type: "post",
        dataType: 'json',            
        success: function (data) {     
          $('#myModal').modal('hide')
        },
        error: function (data) {
          $('#myModal').modal('hide')
        }
      });
    }
    
    $(".ratio-reject").keyup(function(){ 
      var value = [] 
      $('.ratio-reject').each(function() {  
        var ratio_reject = $(this).val()
        if (!$(this).val()){ 
              var ratio_reject = 0
            }else{
              var ratio_reject = $(this).val()
            }   
        // var ratio_reject = $(this).val()
        value.push(ratio_reject)
      }); 
      console.log(value) 
    });
    
    function getWoInformation(id_wo){
      $.ajax({
        data: {
          id_wo: id_wo,
        },
        url: '{{ route("RejectCutting.get-wo-information") }}',           
        type: "post",
        dataType: 'json',            
        success: function (data) {     
          var newOption = new Option(data.t_v4801c_doco, data.t_v4801c_doco, true, true);
          $('#update_F4801_DOCO').append(newOption).trigger('change');

             var newOption = new Option(data.buyer, data.buyer, true, true);
          $('#update_F0101_ALPH').append(newOption).trigger('change');

          var newOption = new Option(data.style, data.style, true, true);
          $('#update_F4801_DL01').append(newOption).trigger('change');

          $('#update_meja').val(data.meja)
          
          showWoInformation(data.t_v4801c_doco, 'UPDATE', data.color)
          console.log(data.color)
          
          $('#update_qty_gelar').val(data.qty_gelar)
          $('#update_F560020_SIZE55').val(data.F560020_SIZE55)
          $('#update_qty_check').val(data.qty_check)
          $('#update_qty_table').val(data.qty_table)
          $('#update_percentage').val(data.percentage)
          $('.total_reject').val(data.total_reject)
          $('.total_ratio').val(data.total_ratio)
          $('#modalUpdateWoInformation').modal('show')
          $('#update_F560020_SEG4').val(data.color)
        },
        error: function (data) {
          $('#modalUpdateWoInformation').modal('show')
        }
      });
    }

    $(".update-wo-information").click(function(){
      var id_wo = $(this).data('wo_id')
      getWoInformation(id_wo)
    })

    $(".update-new-wo-information").click(function(){
      console.log(123)
      updateWoInformation()
    })

    function updateWoInformation() {
      $.ajax({
        data: $('#formUpdateWoInformation').serialize(),
        url: '{{ route("RejectCutting.update-wo-information") }}',           
        type: "post",
        dataType: 'json',            
        success: function (data) {     
          $('#modalUpdateWoInformation').modal('hide')
        },
        error: function (data) {
          $('#modalUpdateWoInformation').modal('hide')
        }
      });
    }

</script>