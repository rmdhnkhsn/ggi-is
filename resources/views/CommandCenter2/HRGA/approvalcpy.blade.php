@extends("layouts.app")
@section("title","Approval Request")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <a href="#" class="rc-col-2">
        <div class="cards h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons fas fa-calendar-check"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc">Safety Compliance</div>
            </div>
          </div>
        </div>
      </a>
      <a href="#" class="rc-col-2">
        <div class="cards h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons fas fa-clock"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc">Past Time</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{route('cc.approval')}}" class="rc-col-2">
        <div class="cards bg-primary h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons-active fas fa-user-check"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc-active">Overtime Approval</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="row">
      @if(auth()->user()->role == 'SYS_ADMIN'||auth()->user()->nik == '390107'|| auth()->user()->nik == '332100245' || auth()->user()->nik == '330889' || auth()->user()->nik == 'GISCA'
      || auth()->user()->nik == '931132')
      <div class="col-12">
        <div class="cards" style="padding: 1.5rem 1.8rem 2.2rem 1.8rem">
          <form id="download" action="{{route('download-report')}}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="row">
            <div class="col-12 mb-2">
              <div class="title-24">Overtime Report</div>
            </div>
            <div class="col-10x4-3">
              <div class="title-sm">Start Date</div>
              <div class="input-group mt-1 date" id="startDate" data-target-input="nearest">
                <div class="input-group-append datepiker" data-target="#startDate" data-toggle="datetimepicker">
                  <div class="inputGroupBlue" ><i class="fas fa-calendar-alt mr-2"></i> <span class="fs-14">Date</span><i class="ml-2 fas fa-caret-down"></i>
                  </div>
                </div>
                <input type="text" name="tgl_awal" class="form-control datetimepicker-input borderInput" data-target="#startDate" placeholder="Select Date" required/>
              </div>
            </div>
            <div class="col-10x4-3">
              <div class="title-sm">Last Date</div>
              <div class="input-group mt-1 date" id="lastDate" data-target-input="nearest">
                <div class="input-group-append datepiker" data-target="#lastDate" data-toggle="datetimepicker">
                  <div class="inputGroupBlue" ><i class="fas fa-calendar-alt mr-2"></i> <span class="fs-14">Date</span><i class="ml-2 fas fa-caret-down"></i>
                  </div>
                </div>
                <input type="text" name="tgl_akhir" class="form-control datetimepicker-input borderInput" data-target="#lastDate" placeholder="Select Date" required/>
              </div>
            </div>
            <div class="col-10x4-3">
              <div class="title-sm">Category</div>
              <div class="input-group mt-1">
                <div class="input-group-prepend">
                    <span class="inputGroupBlue" for="">Category</span>
                </div>
                <select class="form-control borderInput" id="" name="kategori" style="cursor:pointer" required>
                  <option value="" selected>Select Category</option>
                  <option value="Bagian" name="kategori">Bagian</option>    
                  <option value="Buyer" name="kategori">Buyer</option>    
                  <option value="Item" name="kategori">Item</option>
                  <option value="Rencana" name="kategori">Rencana</option>    

                </select>
              </div>
            </div>
            <div class="col-10x4-1">
              <div class="title-sm text-white mb-1">download</div>
              <button type="submit" class="btn-red">Download <i class="fs-18 ml-3 fas fa-download"></i> </button>
            </div>
          </div>
          </form>
        </div>
      </div>
      @endif
    </div>
    <div class="row" id="hideShow">
      <div class="col-lg-3 col-md-4">
        <div class="cardFlat p-3">
          <div class="title-12-grey2">Gistex Cileunyi</div>
          <div class="title-20-grey mt-1">Rp. {{number_format($amount_branch['CLN'], 2, ",", ".")}}</div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="cardFlat p-3">
          <div class="title-12-grey2">Gistex Majalengka 1</div>
          <div class="title-20-grey mt-1">Rp. {{number_format($amount_branch['GM1'], 2, ",", ".")}}</div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="cardFlat p-3">
          <div class="title-12-grey2">Gistex Majalengka 2</div>
          <div class="title-20-grey mt-1">Rp. {{number_format($amount_branch['GM2'], 2, ",", ".")}}</div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="cardFlat p-3">
          <div class="title-12-grey2">Gistex Kalibenda</div>
          <div class="title-20-grey mt-1">Rp. {{number_format($amount_branch['GK'], 2, ",", ".")}}</div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="cardFlat p-3">
          <div class="title-12-grey2">CV Chawan</div>
          <div class="title-20-grey mt-1">Rp. {{number_format($amount_branch['CVC'], 2, ",", ".")}}</div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="cardFlat p-3">
          <div class="title-12-grey2">CNJ2</div>
          <div class="title-20-grey mt-1">Rp. {{number_format($amount_branch['CNJ2'], 2, ",", ".")}}</div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="cardFlat p-3">
          <div class="title-12-grey2">CV Anugrah</div>
          <div class="title-20-grey mt-1">Rp. {{number_format($amount_branch['CVA'], 2, ",", ".")}}</div>
         
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="cardFlat p-3">
          <div class="title-12-grey2">Cahaya Busana Abadi</div>
          <div class="title-20-grey mt-1">Rp. {{number_format($amount_branch['CBA'], 2, ",", ".")}}</div>
        
        </div>
      </div>
    </div>
    <div class="row mb-4">      
      <div class="col-12 justify-center">
        <button onclick="myFunction(this)" class="btnHideShow">Hide Details..</button>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="cards p-4">
          <ul class="nav nav-tabs sch-md-tabs mb-4" role="tablist" id="myTab">
            <li class="nav-item-show">
                <a class="nav-link relative active" data-toggle="tab" href="#request" role="tab"></i>
                    <i class="fs-28 fas fa-clipboard"></i>
                    <div class="f-14">Request </div>
                    <!-- <span class="tabs-badge">10</span> -->
                </a>
                <div class="sch-slide"></div>
            </li>
            @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->nik == 'GISCA')
            <li class="nav-item-show">
                <a class="nav-link relative" data-toggle="tab" href="#request_all" role="tab"></i>
                    <i class="fs-28 fas fa-clipboard-list"></i>
                    <div class="f-14">Request All</div>
                    <!-- <span class="tabs-badge">9</span> -->
                </a>
                <div class="sch-slide"></div>
            </li>
            @endif
            <li class="nav-item-show">
                <a class="nav-link relative" data-toggle="tab" href="#doner" role="tab"></i>
                    <i class="fs-28 fas fa-clipboard-check"></i>
                    <div class="f-14">Done & Reject</div>
                    <!-- <span class="tabs-badge">9</span> -->
                </a>
                <div class="sch-slide"></div>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane show active" id="request" role="tabpanel">
              <form  action="{{route('approval1.request.overtime')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-12">
                    <div class="row mt-4">
                      <div class="col-12">
                        <div class="joblist-date">
                          <div class="flexx gap-8">
                            <div class="title-22">Overtime Request </div><div class="btnSoftBlue">Total Amount : <span class="fw-6">Rp. {{number_format($total_amount_request, 2, ",", ".")}}</span> </div> 
                          </div>
                          <div class="buttonCheck approval-flex">
                            <div class="checkAll mt-2 mr-3">
                              <input type="checkbox" id="checkAll" class="check1"  style="margin-top:1px"/>
                              <label for="checkAll" class="title-sm ml-1" style="cursor:pointer">Select All</label>
                            </div>
                            <div class="flex gap-1">
                              <button type="button" class="btn-green mr-2 approve2" id="approve">Approve<i class="fs-18 ml-3 fas fa-check"></i></button>
                              <button type="button" class="btn-red reject2" id="reject">Reject <i class="fs-18 ml-3 fas fa-times"></i></button>
                              <input  type="number" class="d-none" id="app" name="app" required />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="cards-scroll mt-3 scrollX d-inline-flex gap-4" id="scroll-bar">
                          <div class="radioFlatContainer2" onclick="filterBranch('')">
                            <input type="radio" name="table" value="" class="radioFlat2" id="all">
                            <label for="all" class="options check py-4 px-3">
                              <span class="radio-desc">All Branch</span>
                            </label>
                          </div>
                          <div class="radioFlatContainer2" onclick="filterBranch('CLN')">
                            <input type="radio" name="table" value="" class="radioFlat2" id="x">
                            <label for="x" class="options check py-4 px-3">
                              <span class="radio-desc">CLN</span>
                            </label>
                          </div>
                          <div class="radioFlatContainer2" onclick="filterBranch('GM1')">
                            <input type="radio" name="table" value="" class="radioFlat2" id="a">
                            <label for="a" class="options check py-4 px-3">
                              <span class="radio-desc">GM1</span>
                            </label>
                          </div>
                          <div class="radioFlatContainer2" onclick="filterBranch('GM2')">
                            <input type="radio" name="table" value="" class="radioFlat2" id="b">
                            <label for="b" class="options check py-4 px-3">
                              <span class="radio-desc">GM2</span>
                            </label>
                          </div>
                          <div class="radioFlatContainer2" onclick="filterBranch('GK')">
                            <input type="radio" name="table" value="" class="radioFlat2" id="c">
                            <label for="c" class="options check py-4 px-3">
                              <span class="radio-desc">GK</span>
                            </label>
                          </div>
                          <div class="radioFlatContainer2" onclick="filterBranch('CVC')">
                            <input type="radio" name="table" value="" class="radioFlat2" id="d">
                            <label for="d" class="options check py-4 px-3">
                              <span class="radio-desc">CVC</span>
                            </label>
                          </div>
                          <div class="radioFlatContainer2" onclick="filterBranch('CNJ2')">
                            <input type="radio" name="table" value="" class="radioFlat2" id="e">
                            <label for="e" class="options check py-4 px-3">
                              <span class="radio-desc">CNJ2</span>
                            </label>
                          </div>
                          <div class="radioFlatContainer2" onclick="filterBranch('CVA')">
                            <input type="radio" name="table" value="" class="radioFlat2" id="f">
                            <label for="f" class="options check py-4 px-3">
                              <span class="radio-desc">CVA</span>
                            </label>
                          </div>
                          <div class="radioFlatContainer2" onclick="filterBranch('CBA')">
                            <input type="radio" name="table" value="" class="radioFlat2" id="g">
                            <label for="g" class="options check py-4 px-3">
                              <span class="radio-desc">CBA</span>
                            </label>
                          </div>
                        </div>
                        <div class="cards-scroll mb-2 scrollX" id="scroll-bar">
                          <button id="btnSearch"><i class="fas fa-search"></i></button>  
                          <table id="DTtable" class="table tbl-content no-wrap">
                            <tfoot class="d-none">
                              <tr>
                                <th></th>
                                <th>NO</th>
                                <th>STATUS</th>
                                <th>DATE</th>
                                <th>NIK</th>
                                <th>NAME</th>
                                <th>DEPARTMENT</th>
                                <th>BAGIAN</th>
                                <th class="branchSelect">BRANCH</th>
                                <th>AMOUNT RENCANA</th>
                                <th>AMOUNT REALISASI</th>
                                <th>TARGET</th>
                                <th>REQUEST ID</th>
                              </tr>
                            </tfoot>
                            <thead>
                              <tr>
                                <th></th>
                                <th>NO</th>
                                <th>STATUS</th>
                                <th>DATE</th>
                                <th>NIK</th>
                                <th>NAME</th>
                                <th>DEPARTMENT</th>
                                <th>BAGIAN</th>
                                <th>BRANCH</th>
                                <th>AMOUNT RENCANA</th>
                                <th>AMOUNT REALISASI</th>
                                <th>TARGET</th>
                                <th>REQUEST ID</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php $no=0;?>
                              @foreach ($request as $key=>$value)
                                <?php $no++;?>
                                <tr>
                                  <td>
                                    <input type="checkbox" class="check1 cekamount" id="check{{$value['id']}}">
                                    <input type="hidden" name="id[]"  value="{{$value['id']}}"/>
                                    <input type="hidden" name="nik[]"  value="{{$value['nik']}}"/>
                                    <input type="hidden" name="tanggal[]"  value="{{$value['tanggal']}}"/>
                                    <input type="hidden" name="nik_2[]"  value="{{$value['nik_2']}}"/>
                                    <input type="hidden" name="nama[]"  value="{{$value['nama']}}"/>
                                    <input type="hidden" name="amount[]" value="{{round($value['amount_rencana'],2)}}">
                                    <input type="hidden" value="0" class="check tes-cek" id="status_lembur{{$value['id']}}" name="status_lembur[]" value="">
                                  </td>
                                  <td>{{$no}}</td>
                                  <td>
                                    <div class="container-tbl-btn flex">
                                      <div class="badge-orange-md">Waiting</div>
                                    </div>
                                  </td>
                                  <td>{{$value['tanggal']}}</td>
                                  <td>{{$value['nik']}}</td>
                                  <td>
                                    <div style="width:200px" class="text-truncate">
                                    {{$value['nama']}}
                                    </div>
                                  </td>
                                  <td> {{$value['departemen']}}</td>
                                  <td> {{$value['bagian']}}</td>
                                  <td> {{$value['branchdetail']}}</td>
                                  <td>
                                    <input type="hidden" class="amountpengajuan" value="{{round($value['amount_rencana'],2)}}">
                                    <input type="hidden" class="branch" name="{{($value['branchdetail'])}}" value="{{($value['branchdetail'])}}">
                                    <a  href="{{route('cc.detail.request.overtime',$value['id']) }}">Rp. {{number_format($value['amount_rencana'], 2, ",", ".")}} </a>
                                  </td>
                                    @if($value['status_lembur']=="Done")
                                  <td>Rp. {{number_format($value['amount_realisasi'], 2, ",", ".")}}</td>
                                    @else
                                  <td>Rp. 0</td>
                                    @endif
                                  <td>
                                    <div style="width:200px" class="text-truncate">
                                      {{$value['target']}}
                                    </div>
                                  </td>
                                  <td>{{$value['id']}}</td>
                                </tr>
                                <script>
                                    $(document).on('click', '#check{{$value['id']}}', function(){
                                      var status = document.getElementById('check{{$value['id']}}').value;
                                      // console.log(status);
                                      if(document.getElementById('check{{$value['id']}}').checked){
                                        var result = '1'; 
                                        
                                        document.getElementById('status_lembur{{$value['id']}}').value = result;
                                      }
                                      else{
                                        var result = 0; 
                                        document.getElementById('status_lembur{{$value['id']}}').value = result;
                                      }    
                                    }); 
                                </script>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            @if(auth()->user()->role == 'SYS_ADMIN'|| auth()->user()->nik == 'GISCA')
            <div class="tab-pane" id="request_all" role="tabpanel">
                <div class="row">
                  <div class="col-12">
                      <div class="approval-flex2">
                          <div class="title-22">Overtime Request</div>
                          <!-- <div class="flex gap-2">
                            <button type="button" class="btn-icon-hijau downloadExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Download Excel"><i class="fas fa-file-excel"></i></button>
                            <button type="button" class="btn-icon-red downloadPDF" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Download Pdf"><i class="fas fa-file-pdf"></i></button>
                          </div> -->
                      </div>
                  </div>
                    <div class="col-12">
                        <div class="cards-scroll mb-5 scrollX mt-approval" id="scroll-bar">
                            <button id="btnSearch"><i class="fas fa-search"></i></button>  
                            <table id="DTtable1" class="table tbl-content no-wrap">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>STATUS</th>
                                        <th>DATE</th>
                                        <th>NIK</th>
                                        <th>NAME</th>
                                        <th>DEPARTMENT</th>
                                        <th>BAGIAN</th>
                                        <th>BRANCH</th>
                                        <th>AMOUNT RENCANA</th>
                                        <th>AMOUNT REALISASI</th>
                                        <th>TARGET</th>
                                        <th>REQUEST ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $no=0;?>
                                  @foreach ($request_all as $key=>$value)
                                  <?php $no++;?>

                                  <tr>
                                      <td>{{$no}}</td>
                                      <td>
                                        <div class="container-tbl-btn flex">
                                          @if ($value['status_lembur']=="Approve 1")
                                              <div class="badge-green-md">Approve 1</div>
                                          @elseif ($value['status_lembur']=="Waiting")
                                              <div class="badge-orange-md">Waiting</div>
                                          @elseif ($value['status_lembur']=="Approve 2")
                                              <div class="badge-green-md">Approve 2</div>
                                          @endif
                                        </div>
                                      </td>
                                      <td>{{$value['tanggal']}}</td>
                                      <td>{{$value['nik']}}</td>
                                      <td>
                                          <div style="width:200px" class="text-truncate">
                                          {{$value['nama']}}
                                          </div>
                                      </td>
                                      <td> {{$value['departemen']}}</td>
                                      <td> {{$value['bagian']}}</td>
                                      <td> {{$value['branchdetail']}}</td>
                                      <td>
                                          <a href="{{route('cc.detail.request.overtime',$value['id']) }}">Rp. {{number_format($value['amount_rencana'], 2, ",", ".")}} </a>
                                      </td>
                                      @if($value['status_lembur']=="Done")
                                        <td>Rp. {{number_format($value['amount_realisasi'], 2, ",", ".")}}</td>
                                      @else
                                      <td>Rp. 0</td>
                                      @endif
                                      <td>
                                        <div style="width:200px" class="text-truncate">
                                          {{$value['target']}}
                                        </div>
                                      </td>
                                      
                                      <td>{{$value['id']}}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="tab-pane" id="doner" role="tabpanel">
              <div class="row">
                  <div class="col-12">
                    <div class="joblist-date">
                      <div class="flexApprove">
                        <div class="title-22">Overtime Request</div>
                        <!-- <div class="flex gap-2">
                          <button type="button" class="btn-icon-hijau downloadExcel2" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Download Excel"><i class="fas fa-file-excel"></i></button>
                          <button type="button" class="btn-icon-red downloadPDF2" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Download Pdf"><i class="fas fa-file-pdf"></i></button>
                        </div> -->
                      </div>
                      <div class="approval-flex">
                        <div class="title-14 mr-2 text-left title-hide">Filter</div>
                        <div class="input-group date" id="report_date" data-target-input="nearest">
                          <div class="input-group-append datepiker" data-target="#report_date"
                              data-toggle="datetimepicker">
                              <div class="inputGroupBlue"><i class="fas fa-calendar-alt mr-2 fs-18"></i><i class="fas fa-caret-down"></i>
                              </div>
                            </div>
                            <input  id="sesat" type="text" class="form-control datetimepicker-input borderInput w-130 input-date-fa"
                            data-target="#report_date" placeholder="Select Date" style="border-radius:0 10px 10px 0"/>
                          <input type="hidden" id="nilai_filter" type="text" value="{{$filter}}" />
                        </div>
                      </div>
                      @if($filter==1)
                      <input type="hidden" id="month" type="text" value="{{$nama_bulan}}" />
                      @endif
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="cards-scroll mb-5 scrollX mt-approval" id="scroll-bar">
                      <button id="btnSearch"><i class="fas fa-search"></i></button>  
                      <table id="DTtable2" class="table tbl-content no-wrap">
                          <thead>
                              <tr>
                                  <th>NO</th>
                                  <th>STATUS</th>
                                  <th>DATE</th>
                                  <th>NIK</th>
                                  <th>NAME</th>
                                  <th>DEPARTMENT</th>
                                  <th>BAGIAN</th>
                                  <th>BRANCH</th>
                                  <th>AMOUNT RENCANA</th>
                                  <th>AMOUNT REALISASI</th>
                                  <th>TARGET</th>
                                  <th>REQUEST ID</th>
                                  @if(auth()->user()->role == 'SYS_ADMIN'||auth()->user()->nik == 'GISCA')
                                  <th>Waktu Pembuatan</th>
                                  <th>NIK 1</th>
                                  <th>Approve 1</th>
                                  <th>Waktu App1</th>
                                  <th>NIK 2</th>
                                  <th>Approve 2</th>
                                  <th>Waktu App2</th>
                                  @endif
                              </tr>
                          </thead>
                          <tbody>
                            <?php $no=0;?>
                            @foreach ($done_all as $key=>$value)
                            <?php $no++;?>
                              <tr>
                                  <td>{{$no}}</td>
                                  <td>
                                      <div class="container-tbl-btn flex">
                                          @if ($value['status_lembur']=="Approve 1")
                                              <div class="badge-green-md">Approve 1</div>
                                          @elseif ($value['status_lembur']=="Approve 2")
                                              <div class="badge-green-md">Approve 2</div>
                                          @elseif ($value['status_lembur']=="Reject 2")
                                            <div class="badge-red-md">Reject 2</div>
                                          @elseif ($value['status_lembur']=="Reject 1")
                                            <div class="badge-red-md">Reject 1</div>
                                          @elseif ($value['status_lembur']=="Done")
                                            <div class="badge-blue-md">Done</div>
                                          @endif
                                        </div>
                                  </td>
                                  <td>{{$value['tanggal']}}</td>
                                  <td>{{$value['nik']}}</td>
                                  <td>
                                      <div style="width:200px" class="text-truncate">
                                      {{$value['nama']}}
                                      </div>
                                  </td>
                                  <td> {{$value['departemen']}}</td>
                                  <td> {{$value['bagian']}}</td>
                                  <td> {{$value['branchdetail']}}</td>
                                  <td>
                                      <a href="{{route('cc.detail.request.overtime',$value['id'])}}">Rp. {{number_format($value['amount_rencana'], 2, ",", ".")}} </a>
                                  </td>
                                  @if($value['status_lembur']=="Done")
                                    <td>Rp. {{number_format($value['amount_realisasi'], 2, ",", ".")}}</td>
                                  @else
                                  <td>Rp. 0</td>
                                  @endif
                                  <td>
                                    <div style="width:200px" class="text-truncate">
                                      {{$value['target']}}
                                    </div>
                                  </td>
                                
                                  <td>{{$value['id']}}</td>
                                  @if(auth()->user()->role == 'SYS_ADMIN'||auth()->user()->nik == 'GISCA')
                                  <td>{{$value['waktu_pembuatan']}}</td>
                                  <td>{{$value['nik_1']}}</td>
                                  <td>{{$value['approve_1']}}</td>
                                  <td>{{$value['waktu_app1']}}</td>
                                  <td>{{$value['nik_2']}}</td>
                                  <td>{{$value['approve_2']}}</td>
                                  <td>{{$value['waktu_app2']}}</td>
                                  @endif
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                    </div>
                  </div>
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
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script src="{{asset('common/js/dateRangePicker.js')}}"></script>


<script>
  function myFunction(a) {
    var x = document.getElementById("hideShow");
    if (x.style.display === "none") {
      x.style.display = "flex";
      a.innerHTML = 'Hide Details..'
    } else {
      x.style.display = "none";
      a.innerHTML = 'Show Details..'
    }
  }
</script>
<script>
    jQuery(document).ready(function($) {

      const testcek = document.getElementsByClassName('tes-cek'); 
      const app = document.getElementById('app');
      const reject = document.getElementsByClassName('reject2')[0];
      const approve = document.getElementsByClassName('approve2')[0];

      reject.addEventListener('click', function(event) {
        console.log(reject)
        let ember = 0;
        Array.from(testcek).forEach(function (element) {
          ember += parseInt(element.value); 
        });
        if (ember == 0) {
          swal({
            title: "Select One",
            text: "Please select one of the submissions that will be approved or rejected!",
            icon: "warning",
            button : false,
          });
        } else {
          event.preventDefault();
          const submited = event.target.closest('form');
          swal({
              title: 'Are you sure?',
              text: 'Please recheck the application that will be rejected.',
              icon: 'warning',
              buttons: ["CANCEL", "REJECT"],
              className: "modal-reject",
          })
          .then(function(value) {
              if (value) {
                  app.value = 0; 
                  submited.submit();
              }
          });
        }
      })
      approve.addEventListener('click', function(event) {
        let ember = 0;
        Array.from(testcek).forEach(function (element) {
          ember += parseInt(element.value); 
        });

        if (ember == 0) {
          swal({
            title: "Select One",
            text: "Please select one of the submissions that will be approved or rejected!",
            icon: "warning",
            button : false,
          });
        } else {
          event.preventDefault();
          const submited = event.target.closest('form');
          swal({
              title: 'Are you sure?',
              text: 'Please recheck the application that will be approved.',
              icon: 'warning',
              buttons: ["CANCEL", "APPROVE"],
              className : 'modal-approve'
          })
          .then(function(value) {
              if (value) {
                  app.value = 1; 
                  submited.submit();
              }
          });
        }
      });
    });
</script>
<script>
  $(document).ready(function() {
    var table = $('#DTtable').DataTable({
        paging: false,
       
      dom: 'frtp',
    });
 
    $("#DTtable tfoot th").each( function ( i ) {
        var select = $('<select><option value=""></option></select>')
            .appendTo( $(this).empty() )
            .on( 'change', function () {
                table.column( i )
                    .search( $(this).val() )
                    .draw();
            } )
    } )
  })
  
  function filterBranch(branch) {
    var table = $('#DTtable').DataTable()
    const select = document.querySelector('.branchSelect select')
    select.value = branch

    table.column( 8 )
    .search( branch )
    .draw();
  }

  $(document).ready( function () {
    var table = $('#DTtable1').DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "oSearch": {"sSearch": $('[name="options1"]').val() },
      dom: 'Bfrtip',
      buttons: [
        {
            extend: 'excelHtml5',
            title: 'Data rekap overtime request'
        },
        {
            extend: 'pdfHtml5',
            title: 'Data rekap overtime request'
        }
        ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable2').DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "oSearch": {"sSearch": $('[name="options1"]').val() },
      dom: 'Bfrtip',
      buttons: [
        {
            extend: 'excelHtml5',
            title: 'Data rekap overtime done'
        },
        {
            extend: 'pdfHtml5',
            title: 'Data rekap overtime done'
        }
        ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      
    });
  });


  // });
  jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
  });

  jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
  });

  $('#Date').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: false
  })
  $('#startDate').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: false
  })
  $('#lastDate').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: false
  })

  $('#checkAll').click(function() {
    if (this.checked) {
      $(':checkbox').each(function() {
          this.checked = true;    
          const check = document.getElementsByClassName('tes-cek');
          Array.from(check).forEach(function (element) {
            element.value = 1
          });                    
      });
    } else {
      $(':checkbox').each(function() {
          this.checked = false; 
          const check = document.getElementsByClassName('tes-cek');
          Array.from(check).forEach(function (element) {
            element.value = 0
          }); 
      });
    } 
  });

                                      
</script>
<script>

  const approve = document.getElementById('approve');
  const reject = document.getElementById('reject');
  const app = document.getElementById('app');
  approve.addEventListener('click', function() {
    app.value = 1; 
  });

  reject.addEventListener('click', function() {
    app.value = 0; 
  });

</script>

<script>
  jQuery(document).ready(function($) {
    $('#report_date').datetimepicker({
      format: 'Y-MM',
      showButtonPanel: true
    })
    
    var filter_count = 0;
    var filter=$('#nilai_filter').val();
    $("#report_date").on("change.datetimepicker", ({date}) => {
      
        if(filter==0){
            var month = $("#report_date").find("input").val()
            if (month != null) {
              var month = $("#report_date").find("input").val()
              showLoading();
              location.replace("{{ url('cmc/approval/-') }}"+month) 
          }
          filter_count++
        }
        else if(filter==1){
          if (filter_count > 0) {
            var month = $("#report_date").find("input").val();
            showLoading();
            location.replace("{{ url('cmc/approval/-') }}"+month) 
          }
          filter_count++
        }
    })

    var month = $("#month").val();
    $('.input-date-fa').val(month + '')

  });
</script>

<script>
    document.getElementById('download').addEventListener('submit', function() {
        showLoading();
    });
    function showLoading(){
        let timerInterval
        swal({
            title: 'Please Wait . . .',
            html: ' ',
            // icon: "https://www.boasnotas.com/img/loading.gif",
            button: false,
            timerProgressBar: true,
            className : 'iniLoading',
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
                // showSuccessAlert()
            }
            }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                // console.log('I was closed by the timer')
               
            }
        })
    }

  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-labels").addClass("selected").html(fileName).css('padding-left', '190px');
  });

  $(function () {
    $('[data-toggle="popover"]').popover()
  })

    $('.downloadExcel').click(function(){
      // $(document).on('click', '[aria-controls="DTtable1"]');
    })
    $( document ).ready(function() {
      document.getElementsByClassName('downloadExcel')[0].addEventListener('click', function() {
      })
    });

  $('.downloadPDF').click(function(){
      $(".buttons-pdf").click();
  })

  $('.downloadExcel2').click(function(){
      $("[aria-controls").click();
  })
  $('.downloadPDF2').click(function(){
      $(".buttons-pdf").click();
  })

</script>

<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function() {
            location.reload();
        }, 120000);
    })
</script>

<script>
  $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
  });
</script>

@endpush