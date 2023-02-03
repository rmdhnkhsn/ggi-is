@extends("hr_ga.permit_request.layouts.app")
@section("title","Scan Approve")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
@endpush

@section("content")
<section class="content" id="disableScroll">
  <div class="containerScan">
    <div class="containerBack">
        <a href="{{ route('permit.request.pengajuan')}}" class="previous-tab"><i class="fas fa-arrow-left"></i></a>
    </div>
    <div class="elipse1"></div>
    <div class="elipse2"></div>
    <div class="scanner">
      <div class="containerImages">
        <div class="images">
          <img src="{{url('images/qr.png')}}">
        </div>
        <img src="{{url('images/iconpack/permit_request/matrix.svg')}}" class="matrix1">
        <img src="{{url('images/iconpack/permit_request/matrix.svg')}}" class="matrix2">
        <img src="{{url('images/iconpack/permit_request/matrix.svg')}}" class="matrix3">
        <img src="{{url('images/iconpack/permit_request/matrix.svg')}}" class="matrix4">
      </div>
    </div>
    <div class="title mt-4">
      <div class="title-20W">IZIN TELAH DISETUJUI</div>
      <div class="title-14W text-center">silahkan serahkan barcode ini kepada secutiry untuk melakukan check out</div>
    </div>
    <div class="slider">
      <div class="head">
        <div class="title-20-dark">Brooklyn Simmons</div>
        <div class="title-14-dark text-center">332100185 - IT & Digital Transformation</div>
      </div>
      <div class="borderlight"></div>
      <div class="body">
        <div class="title-16-500">Detail Izin</div>
        <div class="content">
          <div class="title-12-grey">ID Pengajuan</div>
          <div class="title-14-dark">220854632</div>
        </div>
        <div class="content">
          <div class="title-12-grey">Waktu Pengajuan</div>
          <div class="title-14-dark">18 Agustus 2022, 08.00</div>
        </div>
        <div class="content">
          <div class="title-12-grey">Rencana Waktu Izin</div>
          <div class="title-14-dark">18 Agustus 2022, 16.00 sd 17.00</div>
        </div>
        <div class="content">
          <div class="title-12-grey">Total Jam</div>
          <div class="title-14-dark">1 Jam</div>
        </div>
        <div class="content">
          <div class="title-12-grey">Alasan</div>
          <div class="title-14-dark">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet.</div>
        </div>
        <div class="content">
          <div class="title-12-grey">Disetujui Oleh</div>
          <div class="title-14-dark">James</div>
        </div>
        <div class="content">
          <div class="title-12-grey">Status</div>
          <div class="badgeBlue fs-12">Disetujui</div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push("scripts")

<script>
  const slider = document.querySelector('.slider');
  const sliderHead = document.querySelector('.slider .head');

  slider.addEventListener('click', () => {
    slider.classList.toggle('slideUp');
  });

  // initially, only show slider head from the bottom of the page
  // function setSliderPosition(slider) {
  //   let sliderPaddingTop = parseInt(window.getComputedStyle(slider).paddingTop);
  //   const offset = slider.offsetHeight - sliderHead.offsetHeight - sliderPaddingTop;
  //   slider.style.bottom = `-${offset}px`;
  // }

  setSliderPosition(slider);
</script>
<script>
    document.getElementById('disableScroll').addEventListener('wheel', event => {
    if (event.ctrlKey) {
        event.preventDefault()
    }
    }, true)
</script>
@endpush        