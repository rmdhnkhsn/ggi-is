@extends("layouts.app")
@section("title","Proses Bundling")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

@endpush

@section("content")

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12 justify-center">
            <span class="ctg-ppic-title">Proses Bundling</span>
          </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
      <div class="row pb-5">
        <div class="col-md-6 mt-4">
          <!-- <video id="scant" class="mb-2"></video> -->
          <div class="kamera-pc">
            <div class="row">
              <div class="col-12">
                <div class="cards-scan2 py-2 px-4">
                  <i class="icon-camera2 fas fa-camera"></i>
                  <span class="borders-1"></span>
                  <span class="borders-2"></span>
                  <span class="borders-3"></span>
                  <span class="borders-4"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="cards margin-auto w-405 h-500 p-4">
            <form action="{{ route('proses_bundling.simpan_user')}}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="form_id" id="form_id" value="{{$form->id}}">
              <div class="card-transparent h-50 scrollY">
                <div class="row">
                  <div class="col-6">
                    <span class="title-sm">NIK 1</span>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control border-input" id="nik[]" name="nik[]" placeholder="Input NIK..." required>
                    </div>
                  </div>
                  <div class="col-6">
                    <span class="title-sm">NIK 2</span>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control border-input" id="nik[]" name="nik[]" placeholder="Input NIK...">
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="card-transparent h-248 scrollY">
                <div class="col-12">
                  <span class="title-sm">No Ikat</span>
                  <div class="input-group mb-2">
                      <input type="text" class="form-control border-input" id="no_ikat" name="no_ikat" placeholder="Input NIK..." required>
                  </div>
                </div>
                <div class="col-12">
                  <span class="title-sm">No Ikat</span>
                  <div class="input-group mb-2">
                      <input type="text" class="form-control border-input" id="no_urut" name="no_urut" placeholder="Input NIK..." required>
                  </div>
                </div>
                <div class="col-12">
                  <span class="title-sm">RF ID</span>
                  <div class="input-group mb-2">
                      <input type="text" class="form-control border-input" id="rf_id" name="rf_id" placeholder="Input NIK..." required>
                  </div>
                </div>
              </div>
              <div class="col-12 justify-center">
                <button type="submit" class="btn-blue mt-2">Mulai Numbering<i class="ml-2 mt-1 fs-20 fas fa-arrow-right"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection

@push("scripts")

<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

<script type="text/javascript">
 var scanner = new Instascan.Scanner({ video: document.getElementById('scant'), scanPeriod: 5, mirror: false });
    scanner.addListener('scan',function(content){
      document.getElementById('kode_lokasi').value=content;
      document.getElementById("cari_kode_lokasi").click();
        //window.location.href=content;
    });
    Instascan.Camera.getCameras().then(function (cameras){
        if(cameras.length>0){
            scanner.start(cameras[1]);
            $('[name="options"]').on('change',function(){
                if($(this).val()==1){
                    if(cameras[0]!=""){
                        scanner.start(cameras[0]);
                    }else{
                        alert('No Front camera found!');
                    }
                }else if($(this).val()==2){
                    if(cameras[1]!=""){
                        scanner.start(cameras[1]);
                    }else{
                        alert('No Back camera found!');
                    }
                }
            });
        }else{
            console.error('No cameras found.');
            alert('No cameras found.');
        }
    }).catch(function(e){
        console.error(e);
        alert(e);
    });
</script>

@endpush