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
      <div class="col-lg-12">
        <div class="cards bg-card p-4">
          Done Report
          <form action="{{route('report_aksesoris.done_report')}}" method="post" enctype="multipart/form-data">
            @csrf    
            <div class="row">
              <div class="col-12 mt-3">
                <span class="title-sm">Purchasing Name</span>
                <div class="input-group mb-3 mt-2">
                  <select class="form-control select2bs4_purchasing" name="prc_name" id="prc_name" required>
                    <option selected></option>
                    @foreach($prc as $key => $value)
                    <option value="{{$value->nama}}">{{$value->nama}}</option>
                    @endforeach
                  </select>
                </div>
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
                <button type="submit" class="btn btn-blue" onclick="return confirm('Done Report ?');">Save<i class="ml-3 fas fa-download"></i></button>
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
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script src="{{asset('common/js/sweetalert2.js')}}"></script>
@if(Session::has('success'))
  <script>
    // toastr.error("{!!Session::get('error')!!}");
    window.onload = function() { 
        Swal.fire({
        icon: 'success',
        title: 'Success...',
        text: 'Report berhasil di done'
      })
    }
  </script>
@endif
@if(Session::has('kosong'))
  <script>
    // toastr.error("{!!Session::get('error')!!}");
    window.onload = function() { 
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Data kosong / report sudah di done'
      })
    }
  </script>
@endif
<script>
  $('.select2bs4_branch').select2({
    theme: 'bootstrap4'
  })
  $('.select2bs4_purchasing').select2({
    theme: 'bootstrap4'
  })
</script>
@endpush