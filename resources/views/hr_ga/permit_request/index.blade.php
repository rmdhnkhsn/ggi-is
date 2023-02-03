@extends("hr_ga.permit_request.layouts.app")
@section("title","Permit Request")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
@endpush

@section("content")
<section class="content">
    <div class="header">
        <div class="containerBack">
            <a href="{{ route('hrga.index')}}" class="previous-tab"><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="title">Form Pengajuan Izin</div>
    </div>
    <div class="cards">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item-show active">
                <a href="#buat" aria-controls="buat" role="tab" data-toggle="tab">Buat Izin</a>
            </li>
            <li class="nav-item-show">
                <a href="#izin" aria-controls="izin" role="tab" data-toggle="tab">Daftar Izin</a>
            </li>
        </ul>
        <div class="tab-content" id="tab-content">
            <div class="tab-pane active" id="buat" role="tabpanel">
                <div class="row">
                    <div class="col-12">
                        <div class="title-grey mb-4">Buat Pengajuan Izin</div>
                    </div>
                    <div class="col-12">
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" for=""><i class="fs-20 fas fa-sitemap"></i></span>
                            </div>
                            <select class="form-control borderInput select2bs4" id="" name="" style="cursor:pointer"  onchange="changeOptions(this)">
                                <option selected disabled>Pilih Kategori</option>
                                <option name="keluar" value="keluar">Keluar Kantor</option>    
                                <option name="pulang" value="pulang">Pulang Cepat</option>    
                                <!-- <option name="dinas" value="dinas">Dinas Luar</option>     -->
                            </select>
                        </div>
                    </div>
                    <form action="" class="OLevelResult w-100" name="keluar" id="keluar" style="display:block">
                        @include('hr_ga.permit_request.partials.keluar_kantor')
                    </form>
                    <form action="" class="OLevelResult w-100" name="pulang" id="pulang" style="display:none">
                        @include('hr_ga.permit_request.partials.pulang_cepat')
                    </form>
                    <!-- <form action="" class="OLevelResult w-100" name="dinas" id="dinas" style="display:none">
                        @include('hr_ga.permit_request.partials.dinas_luar')
                    </form> -->
                </div>
            </div>
            <div class="tab-pane" id="izin" role="tabpanel">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-grey-400">Daftar Pengajuan</div>
                        <button class="btnSoftBlue" id="myBtn"><i class="fas fa-filter"></i>Filter</button>
                    </div>
                    @include('hr_ga.permit_request.partials.filter')
                    <div class="scrollForm mt-4" id="scrollBlue">
                        <a href="#popup" class="containerList">
                            <div class="listBlock">
                                <div class="justify-sb">
                                    <div class="id">ID : 22012345678</div>
                                    <div class="badgeBlue">Disetujui</div>
                                </div>
                                <div class="desc">Izin 19 Agustus 2022, pukul 16.00 sd 17.00</div>
                            </div>
                        </a>
                        <a href="#popup" class="containerList">
                            <div class="listBlock">
                                <div class="justify-sb">
                                    <div class="id">ID : 22012345678</div>
                                    <div class="badgeOrange">Menunggu</div>
                                </div>
                                <div class="desc">Izin 18 Agustus 2022, pukul 16.00 sd 17.00</div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="popup" id="popup">
                    <div class="popup-inner">
                        <a class="closeBtn" href="#"></a>
                        <div class="row" style="padding:2.5rem 2rem 4.5rem 2rem">
                            <div class="col-12 justify-sb">
                                <div class="title-16">Detail Pengajuan</div>
                                <a href="" class="btnSoftOrange" style="padding:0 18px">Edit</a>
                            </div>
                            <div class="col-12">
                                <div class="borderBottom"></div>
                            </div>
                            <div class="scrollFormY mt-1 mb-3" id="scrollGrey">
                                <div class="detail">
                                    <div class="judul">ID Pengajuan </div>
                                    <div class="desc">220818001</div>
                                </div>
                                <div class="detail">
                                    <div class="judul">Waktu Pengajuan </div>
                                    <div class="desc">18 Agustus 2022, 08.00</div>
                                </div>
                                <div class="detail">
                                    <div class="judul">NIK</div>
                                    <div class="desc">332100185</div>
                                </div>
                                <div class="detail">
                                    <div class="judul">Nama</div>
                                    <div class="desc">Hendra Sugandi</div>
                                </div>
                                <div class="detail">
                                    <div class="judul">Kategori</div>
                                    <div class="desc">Izin Keluar Kantor</div>
                                </div>
                                <div class="detail">
                                    <div class="judul">Rencana Waktu Izin</div>
                                    <div class="desc">18 Agustus 2022, 16.00 sd 17.00</div>
                                </div>
                                <div class="detail">
                                    <div class="judul">Total Jam</div>
                                    <div class="desc">1 Jam</div>
                                </div>
                                <div class="detail">
                                    <div class="judul">Disetujui Oleh</div>
                                    <div class="desc">Samsudin</div>
                                </div>
                                <div class="detail">
                                    <div class="judul">Alasan</div>
                                    <div class="desc">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis.</div>
                                </div>
                                <div class="detail justify-sb">
                                    <div class="status">
                                        <div class="judul">Status</div>
                                        <div class="badgeOrange">Waiting</div>
                                    </div>
                                    <div class="jenis">
                                        <div class="judul">Jenis Keperluan</div>
                                        <div class="flex" style="gap:.6rem;margin-top:4px">
                                            <div class="badgeBlue">kantor</div>
                                            <div class="badgeOrange">Pribadi</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="container">
                            <a href="{{ route('scanReject.permit')}}" class="btn-outline-red">Cancel Pengajuan</a>
                        </div>
                        <div class="container">
                            <a href="{{ route('scanApprove.permit')}}" class="btn-blue">Generate Barcode</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push("scripts")
<script src="{{asset('common/js/questCovid/bootstrap.3.3.7.js')}}"></script>
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>

<script>
  $('.cancel').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
      swal({
        title: "Cancel Pengajuan..?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#2e93ff",
        confirmButtonText: "Ya",
        cancelButtonText: "Batalkan",
        closeOnConfirm: false,
        closeOnCancel: false
      },
    function(isConfirm){
        if (isConfirm) {
          window.location.href = url;        // submitting the form when user press yes
          swal("Pengajuan Dibatalkan", "", "success");
        } else {
        swal("Gagal", "", "error");
        }
    }); 
  });
</script>

<script>
  var popup = document.getElementById("popup");
  window.onclick = function(event) {
    if (event.target == popup) {
      popup.style.display = "none";
    }
  }
</script>

<script>
  var modal = document.getElementById("myModal");
  var btn = document.getElementById("myBtn");
  var span = document.getElementsByClassName("closeBtn")[0];

  btn.onclick = function() {
    modal.style.display = "block";
  }
  span.onclick = function() {
    modal.style.display = "none";
  }
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>

<script>
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>

<script>
    function changeOptions(selectEl) {
        let selectedValue = selectEl.options[selectEl.selectedIndex].value;
        let subForms = document.getElementsByClassName('OLevelResult')
        for (let i = 0; i < subForms.length; i += 1) {
            if (selectedValue === subForms[i].name) {
            subForms[i].setAttribute('style', 'display:block')
            } else {
            subForms[i].setAttribute('style', 'display:none')
            }
        }
    }
</script>

@endpush        