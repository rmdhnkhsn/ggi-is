@extends("layouts.app")
@section("title","Report Accessories")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@push("sidebar")
    @include('qc.smqc.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">  
    <div class="row mt-3 pb-5">
      <div class="col-lg-6">
        <div class="cards bg-card p-4">
          Search Report Per Branch
          <div>
            <div class="input-group mt-1 mb-3" style="gap:1.4rem">
              <div class="justify-start">
                  <div class="radioContainer">
                      <input type="radio" name="jenis_search_branch" value="po" id="branch_po" class="radioCustomInput">
                      <label for="branch_po" class="radioCustom"></label>
                  </div>
                  <label for="branch_po" class="title-16 pointer ml-1" style="margin-top:6px">PO</label>
              </div>
              <div class="justify-start">
                  <div class="radioContainer">
                      <input type="radio" name="jenis_search_branch" value="item" id="branch_item" class="radioCustomInput">
                      <label for="branch_item" class="radioCustom"></label>
                  </div>
                  <label for="branch_item" class="title-16 pointer ml-1" style="margin-top:6px">Item</label>
              </div>
              <div class="justify-start">
                  <div class="radioContainer">
                      <input type="radio" name="jenis_search_branch" value="tanggal" id="branch_tanggal" class="radioCustomInput">
                      <label for="branch_tanggal" class="radioCustom"></label>
                  </div>
                  <label for="branch_tanggal" class="title-16 pointer ml-1" style="margin-top:6px">Tanggal</label>
              </div>
            </div>
          </div>
          <!-- Untuk search po  -->
          <div class="hide" id="showHide">
            <form action="{{route('report_aksesoris.search_po')}}" method="post" enctype="multipart/form-data">
              <div class="row">
                @csrf
                <div class="col-12 mt-3">
                  <span class="general-identity-title">No PO</span>
                  <div class="field2 mt-2">
                    <input type="text" id="po" name="po" value="" placeholder="Insert no po" required> 
                  </div>
                </div>
                <div class="col-12 mt-3">
                  <span class="title-sm">Branch</span>
                  <div class="input-group mb-3 mt-2">
                    <select class="form-control select2bs4_branch" name="branch" id="branch" required>
                      <option selected></option>
                      @foreach($branch as $key => $value)
                      <option value="{{$value->kode_branch}}|{{$value->branchdetail}}">{{$value->nama_branch}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-12 mt-3 justify-end">
                  <button type="submit" class="btn btn-blue">Search<i class="ml-3 fas fa-download"></i></button>
                </div>
              </div>
            </form>
          </div>
          <!-- End  -->

          <!-- Untuk search by item  -->
          <div class="hide" id="showHide2">
            <form action="{{route('report_aksesoris.search_item')}}" method="post" enctype="multipart/form-data">
              @csrf    
              <div class="row">
                <div class="col-12 mt-3">
                  <span class="general-identity-title">Item</span>
                  <div class="field2 mt-2">
                    <input type="text" id="item" name="item" value="" placeholder="Insert item" required>
                  </div>
                </div>
                <div class="col-12 mt-3">
                  <span class="title-sm">Branch</span>
                  <div class="input-group mb-3 mt-2">
                    <select class="form-control select2bs4_item" name="branch2" id="branch2" required>
                      <option selected></option>
                      @foreach($branch as $key => $value)
                      <option value="{{$value->kode_branch}}|{{$value->branchdetail}}">{{$value->nama_branch}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-12 mt-3 justify-end">
                  <button type="submit" class="btn btn-blue">Search<i class="ml-3 fas fa-download"></i></button>
                </div>
              </div>
            </form>
          </div>
          <!-- End  -->

          <!-- Untuk Search by Tanggal  -->
          <div class="hide" id="showHide3">
            <form action="{{route('report_aksesoris.search_tanggal')}}" method="post" enctype="multipart/form-data">
              <div class="row">
                @csrf
                <div class="col-12 mt-3">
                  <span class="general-identity-title">Tanggal</span>
                  <div class="field2 mt-2">
                    <input type="date" id="tanggal" name="tanggal" value="" placeholder="Insert Tanggal" required>
                  </div>
                </div>
                <div class="col-12 mt-3">
                  <span class="title-sm">Branch</span>
                  <div class="input-group mb-3 mt-2"> 
                    <select class="form-control select2bs4_tanggal" name="branch3" id="branch3" required> 
                      <option selected></option>
                      @foreach($branch as $key => $value)
                      <option value="{{$value->kode_branch}}|{{$value->branchdetail}}">{{$value->nama_branch}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-12 mt-3 justify-end">
                  <button type="submit" class="btn btn-blue">Search<i class="ml-3 fas fa-download"></i></button>
                </div>
              </div>
            </form>
          </div>
          <!-- End  -->
        </div>
      </div>

      <div class="col-lg-6">
        <div class="cards bg-card p-4">
          Report Reject/Pass
          <form action="{{route('report_aksesoris.search_status')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
              <div class="col-12 mt-3">
                <div class="input-group mt-1 mb-3" style="gap:1.4rem">
                  <div class="justify-start">
                    <div class="radioContainer">
                      <input type="radio" name="status_id" value="1" id="all_branch_po" class="radioCustomInput" required>
                      <label for="all_branch_po" class="radioCustom"></label>
                    </div>
                    <label for="all_branch_po" class="title-16 pointer ml-1" style="margin-top:6px">PASS</label>
                  </div>
                  <div class="justify-start">
                    <div class="radioContainer">
                      <input type="radio" name="status_id" value="2" id="all_branch_item" class="radioCustomInput">
                      <label for="all_branch_item" class="radioCustom"></label>
                    </div>
                    <label for="all_branch_item" class="title-16 pointer ml-1" style="margin-top:6px">FAIL</label>
                  </div>
                </div>
              </div>
              <div class="col-12 mt-3">
                <span class="general-identity-title">Bulan</span>
                <div class="field2 mt-2">
                  <input type="month" id="bulan" name="bulan" value="" placeholder="Insert Bulan" required>
                </div>
              </div>
              <div class="col-12 mt-3">
                <span class="title-sm">Branch</span>
                <div class="input-group mb-3 mt-2">
                  <select class="form-control select2bs4_pass" name="branch4" id="branch4" required>
                    <option selected></option>
                    @foreach($branch as $key => $value)
                    <option value="{{$value->kode_branch}}|{{$value->branchdetail}}">{{$value->nama_branch}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-12 mt-3 justify-end">
                <button type="submit" class="btn btn-blue">Search<i class="ml-3 fas fa-download"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<script>
    $("input[name=jenis_search_branch]:radio").click(function(ev) {
        console.log(ev.currentTarget.value);
        if (ev.currentTarget.value == "") {
            $('#showHide').removeClass('hide');
            $('#showHide').addClass('hide');

            $('#showHide2').removeClass('hide');
            $('#showHide2').addClass('hide');

            $('#showHide3').removeClass('hide');
            $('#showHide3').addClass('hide');
        } else if (ev.currentTarget.value == "po") {
            $('#showHide3').removeClass('hide');
            $('#showHide3').addClass('hide');

            $('#showHide2').removeClass('hide');
            $('#showHide2').addClass('hide');

            $('#showHide').addClass('hide');
            $('#showHide').removeClass('hide');
        }else if (ev.currentTarget.value == "item") {
            $('#showHide3').removeClass('hide');
            $('#showHide3').addClass('hide');

            $('#showHide').removeClass('hide');
            $('#showHide').addClass('hide');

            $('#showHide2').addClass('hide');
            $('#showHide2').removeClass('hide');
        }else if (ev.currentTarget.value == "tanggal") {
            $('#showHide2').removeClass('hide');
            $('#showHide2').addClass('hide');

            $('#showHide').removeClass('hide');
            $('#showHide').addClass('hide');

            $('#showHide3').addClass('hide');
            $('#showHide3').removeClass('hide');
        }
    });
</script>
<script>
  $('.select2bs4_branch').select2({
    theme: 'bootstrap4'
  })
  $('.select2bs4_item').select2({
    theme: 'bootstrap4'
  })
  $('.select2bs4_tanggal').select2({
    theme: 'bootstrap4'
  })
  $('.select2bs4_pass').select2({
    theme: 'bootstrap4'
  })
</script>
@endpush