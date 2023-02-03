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
<link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker.css')}}">


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
      <div class="col-md-6">
        <form id="download"  action="{{route('download-report')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="data_report" value="{{$data_report}}">
        <div class="cards p-4" style="height:225px">
          <div class="title-20-grey mb-3">Overtime Report</div>
          <div class="justify-start">
            <div class="title-14 title-none w-140 text-left">Date</div>
            <div class="input-group dates w-100" id="filter_date">
              <div class="input-group-prepend">
                <span class="inputGroupBlue" style="width:50px;height:40px"><i class="fs-18 fas fa-calendar-alt"></i></span>
              </div>
              <input type="text" id="dateRange" class="form-control border-input-10" name="daterange" value="" placeholder="Input Date" style="height:40px;border-radius:0 10px 10px 0" />
            </div>
          </div>
          <div class="justify-start mt-1">
              <div class="title-14 title-none w-140 text-left">Category</div>
              <div class="w-100">
                <div class="input-group mt-1">
                  <div class="input-group-prepend">
                      <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-clipboard-list"></i></span>
                  </div>
                  <select class="form-control borderInput pointer" id="" name="kategori" required>
                    <option value="" selected>Select Category</option>
                    <option value="Bagian" name="kategori">Bagian</option>    
                    <option value="Buyer" name="kategori">Buyer</option>    
                    <option value="Item" name="kategori">Item</option> 
                    <option value="Rencana" name="kategori">Rencana</option>    
                  </select>
                </div>
              </div>
          </div>
          <div class="justify-end mt-2">
            <div class="w-140 title-none"></div>
            <button type="submit"  class="btn-red w-100">Download <i class="fs-18 ml-2 fas fa-file-pdf"></i></button>
          </div>
        </div>
        </form>
      </div>
      <div class="col-md-3">
        <div class="cards p-4" style="height:225px">
          <div class="icons1">
            <!-- <i class="fas fa-percentage"></i> -->
            <i class="fas fa-money-bill"></i>
          </div>
          <div class="title-14-dark my-2">Total Amount</div>
          <div class="title-24-600-dark">Rp. {{number_format($total_amount_request, 2, ",", ".")}}</div>
          <div class="title-14-dark my-2">Amount submitted</div>
          <div class="borderlight3" style="margin:.7rem 0"></div>
          <a href="" class="w-100">
            <div class="justify-start gap-4">
              <div class="title-14-dark">*From overtime data</div>
              <!-- <i class="icon-arrow fas fa-arrow-right"></i> -->
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="cards p-4" style="height:225px">
          <div class="icons2">
            <i class="fas fa-dollar-sign"></i>
          </div>
          <div class="title-14-dark my-2">Amount </div>
          <div class="title-24-600-dark" id="jumlahamount">Rp. 0 ,-</div>
          <div class="title-14-dark mt-2">Selected Amount</div>
          <div class="borderlight3" style="margin:.7rem 0"></div>
          <a href="" class="w-100">
            <div class="justify-start gap-4">
              <div class="title-14-dark">*From selected overtime data</div>
              <!-- <i class="icon-arrow fas fa-arrow-right"></i> -->
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="row" id="hideShow">
      <div class="col-lg-3 col-md-4">
        <div class="cardFlat p-3">
          <div class="title-12-grey2">Gistex Cileunyi</div>
          <div class="title-20-grey mt-1">Rp. {{number_format($amount_branch['CLN'], 2, ",", ".")}}</div>
          <div class="flex gap-3">
            <div class="title-12-blue" id="CLN">Rp. 0,-</div>
            <div class="title-12-grey">Selected Amount</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="cardFlat p-3">
          <div class="title-12-grey2">Gistex Majalengka 1</div>
          <div class="title-20-grey mt-1">Rp. {{number_format($amount_branch['GM1'], 2, ",", ".")}}</div>
          <div class="flex gap-3">
            <div class="title-12-blue" id="GM1">Rp. 0,-</div>
            <div class="title-12-grey">Selected Amount</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="cardFlat p-3">
          <div class="title-12-grey2">Gistex Majalengka 2</div>
          <div class="title-20-grey mt-1">Rp. {{number_format($amount_branch['GM2'], 2, ",", ".")}}</div>
          <div class="flex gap-3">
            <div class="title-12-blue" id="GM2">Rp. 0,-</div>
            <div class="title-12-grey">Selected Amount</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="cardFlat p-3">
          <div class="title-12-grey2">Gistex Kalibenda</div>
          <div class="title-20-grey mt-1">Rp. {{number_format($amount_branch['GK'], 2, ",", ".")}}</div>
          <div class="flex gap-3">
            <div class="title-12-blue" id="GK">Rp. 0,-</div>
            <div class="title-12-grey">Selected Amount</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="cardFlat p-3">
          <div class="title-12-grey2">CV Chawan</div>
          <div class="title-20-grey mt-1">Rp. {{number_format($amount_branch['CVC'], 2, ",", ".")}}</div>
          <div class="flex gap-3">
            <div class="title-12-blue" id="CVC">Rp. 0,-</div>
            <div class="title-12-grey">Selected Amount</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="cardFlat p-3">
          <div class="title-12-grey2">CNJ2</div>
          <div class="title-20-grey mt-1">Rp. {{number_format($amount_branch['CNJ2'], 2, ",", ".")}}</div>
          <div class="flex gap-3">
            <div class="title-12-blue" id="CNJ2">Rp. 0,-</div>
            <div class="title-12-grey">Selected Amount</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="cardFlat p-3">
          <div class="title-12-grey2">CV Anugrah</div>
          <div class="title-20-grey mt-1">Rp. {{number_format($amount_branch['CVA'], 2, ",", ".")}}</div>
          <div class="flex gap-3">
            <div class="title-12-blue" id="CVA">Rp. 0,-</div>
            <div class="title-12-grey">Selected Amount</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="cardFlat p-3">
          <div class="title-12-grey2">Cahaya Busana Abadi</div>
          <div class="title-20-grey mt-1">Rp. {{number_format($amount_branch['CBA'], 2, ",", ".")}}</div>
          <div class="flex gap-3">
            <div class="title-12-blue" id="CBA">Rp. 0,-</div>
            <div class="title-12-grey">Selected Amount</div>
          </div>
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
                    <i class="fs-28 fas fa-clipboard-list"></i>
                    <div class="f-14">Request</div>
                    <!-- <span class="tabs-badge">10</span> -->
                </a>
                <div class="sch-slide"></div>
            </li>
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
            <div class="tab-pane active" id="request" role="tabpanel">
              <form  action="{{route('approvalgm.request.overtime')}}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="joblist-date">
                          <div class="title-22">Overtime Request</div>
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
                                          <input type="checkbox" class="check1 cekamount tes-cek" id="check{{$value['id']}}"  name="id[]"  value="{{$value['id']}}">
                                          <!-- <input type="hidden" name="id[]"  value="{{$value['id']}}"/>
                                          <input type="hidden" name="nik[]"  value="{{$value['nik']}}"/>
                                          <input type="hidden" name="tanggal[]"  value="{{$value['tanggal']}}"/>
                                          <input type="hidden" value="0" class="check tes-cek" id="status_lembur{{$value['id']}}" name="status_lembur[]" value=""> -->
                                        </td>
                                        <td>{{$no}}</td>
                                        <td>
                                            <div class="container-tbl-btn flex">
                                                @if ($value['status_lembur']=="Approve 1")
                                                    <div class="badge-green-md">Approve 1</div>
                                                @elseif ($value['status_lembur']=="Approve 2")
                                                    <div class="badge-green-md">Approve 2</div>
                                                @elseif ($value['status_lembur']=="Reject 2")
                                                  <div class="badge-red-md">Reject 2</div>
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
                                    </script>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              </form>
            </div>
            <div class="tab-pane" id="doner" role="tabpanel">
              <div class="row">
                  <div class="col-12">
                    <div class="joblist-date">
                      <div class="title-22">Overtime Request</div>
                      <div class="approval-flex">
                        <div class="title-14 mr-2 text-left title-hide">Filter</div>
                        <div class="input-group date" id="report_date" data-target-input="nearest">
                          <div class="input-group-append datepiker" data-target="#report_date"
                              data-toggle="datetimepicker">
                              <div class="inputGroupBlue"><i class="fas fa-calendar-alt mr-2 fs-18"></i><i class="fas fa-caret-down"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control datetimepicker-input borderInput w-130 input-date-fa"
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
                    <div class="cards-scroll mb-5 scrollX" id="scroll-bar">
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
                            @foreach ($lembur_done as $key=>$value)
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
  $(document).ready( function () {
    let tolongcektotal = ()=> {
      let total = 0;
      let totalPerBranch = {CLN : 0, GM1 : 0, GM2 : 0, GK : 0, CVC : 0, CNJ2 : 0, CVA : 0, CBA : 0, allData : []}
      let dataBranch = ['CLN', 'GM1', 'GM2', 'GK','CVC', 'CNJ2' ,'CVA', 'CBA']; 
        Array.from(inicheckbox).forEach(function(element) {
          let parent = element.parentNode.parentNode;
          if(element.checked) {
            let value = parseFloat(parent.getElementsByClassName('amountpengajuan')[0].value);
            let branch = element.parentNode.parentNode.getElementsByClassName('branch')[0].getAttribute('name');
            totalPerBranch = {
              ...totalPerBranch, 
              [branch] : value + totalPerBranch[branch]
            }

            // Mencari nilai total keseluruhan
            let tmp = parseFloat(parent.getElementsByClassName('amountpengajuan')[0].value)
            totalPerBranch.allData.push(tmp);
            total = totalPerBranch.allData.reduce((total, num)=> total + num );
          }
        });
      let hasil = parseFloat(total).toFixed(2);
      document.getElementById('jumlahamount').innerHTML = `Rp. ${convertToRupiah(hasil)}`;
      dataBranch.map((branch)=> {
        if (branch === document.getElementById(branch).id) {
          document.getElementById(branch).innerHTML = `Rp. ${convertToRupiah(parseFloat(totalPerBranch[branch]).toFixed(2))}`
        } else {
        }
      })
    }

    // fungsi select all 
    document.getElementsByClassName('check1')[0].addEventListener('click', function() {
      tolongcektotal();
    })
    // Ambil checkbox
    const inicheckbox = document.getElementsByClassName('cekamount');
    Array.from(inicheckbox).forEach(function(checkbox) {
      checkbox.addEventListener('click', function() {
        tolongcektotal();
      })
    })
    
    function convertToRupiah(NominalAmount)
    {
      var rupiah = '';
      let angka = NominalAmount.replace(".", ",");		
      var angkarev = angka.toString().split('').reverse().join('');
      for(var i = 0; i < angkarev.length; i++) {
        if(i%3 == 0) {
          var angkaKoma=angkarev.substr(i,3)
          var lastChar = angkaKoma.substr(angkaKoma.length - 1); 
          if(lastChar!=','){
          rupiah += angkarev.substr(i,3)+'.';
          }
          else{
            rupiah += angkarev.substr(i,3)+'';
          }
        }
      }
      
      return rupiah.split('',rupiah.length-1).reverse().join('');
    }
  });
</script>
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
    // scrollX : '100%',
    "pageLength": 10,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
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
      });
    } else {
      $(':checkbox').each(function() {
          this.checked = false; 
          
      });
    } 
  });

  $(function() {
        $('input[name="daterange"]').daterangepicker();
  });                                      
</script>


<script>
    jQuery(document).ready(function($) {

      const testcek = document.getElementsByClassName('tes-cek'); 
      const app = document.getElementById('app');
      const reject = document.getElementsByClassName('reject2')[0];
      const approve = document.getElementsByClassName('approve2')[0];

      reject.addEventListener('click', function(event) {
        let tmp = 0;
        Array.from(testcek).forEach(function (element) {
          if(element.checked ) {
            tmp +=1
          }
        });

        if (tmp == 0) {
          swal({
            title: "Select One",
            text: "Please select one of the submissions that will be approved or rejected!",
            icon: "warning",
            button : false,
          });
        } else {
          event.preventDefault();
          const submit = document.getElementsByTagName('form')[1];
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
                  submit.submit();
              }
          });
        }
      })

      approve.addEventListener('click', function(event) {
        let tmp = 0;
        Array.from(testcek).forEach(function (element) {
          if(element.checked ) {
            tmp +=1
          }
        });

        if (tmp == 0) {
          swal({
            title: "Select One",
            text: "Please select one of the submissions that will be approved or rejected!",
            icon: "warning",
            button : false,
          });
        } else {
          event.preventDefault();
          const submited =document.getElementsByTagName('form')[1];
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

              location.replace("{{ url('cmc/approval?filter=') }}"+month) 
          }
          filter_count++
        }
        else if(filter==1){
          if (filter_count > 0) {
            var month = $("#report_date").find("input").val();
                    showLoading();

            location.replace("{{ url('cmc/approval?filter=') }}"+month) 
          }
          filter_count++
        }
    })

    var month = $("#month").val();
    $(' .input-date-fa').val(month + '')

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
               
            }
        })
    }

  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-labels").addClass("selected").html(fileName).css('padding-left', '190px');
  });

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