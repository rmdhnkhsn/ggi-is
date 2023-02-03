@extends("hr_ga.permit_request.layouts.app")
@section("title","Barcode Security")
@push("styles")

@endpush

@section("content")
<section class="content" id="disableScroll">
  <div class="containerScan">
    <div class="containerBack">
      <a href="{{ route('mp-home')}}" class="previous-tab"><i class="fas fa-arrow-left"></i></a>
    </div>
    <div class="aksen1"></div>
    <div class="aksen2"></div>
    <div class="title mt-5">
      <div class="title-20W">SCAN</div>
      <div class="title-20W">BARCODE KARYAWAN</div>
    </div>
    <div class="title2">
      <div class="title-16W">Permit Applicant</div>
    </div>
    <div class="scannerSecurity">
      <div id="reader"></div>
    </div>
    <div class="nav-menu">
      <a href="{{ route('mp-home')}}" class="containerNav">
        <img src="{{url('images/iconpack/permit_request/home.svg')}}">
        <div class="name">HOME</div>
      </a>
      <!-- <a href="{{ route('barcode.security.index') }}" class="containerNav"> -->
      <a href="{{ route('barcode.security.approve') }}" class="containerNav">
      <!-- <a href="{{ route('barcode.security.disapprove') }}" class="containerNav"> -->
        <div class="btnScan">
          <img src="{{url('images/iconpack/permit_request/scan.svg')}}">
        </div>
        <img src="{{url('images/iconpack/permit_request/none.svg')}}">
        <div class="name">SCAN</div>
      </a>
      <a href="{{ route('barcode.security.activity') }}" class="containerNav">
        <img src="{{url('images/iconpack/permit_request/users.svg')}}">
        <div class="name">ACTIVITY</div>
      </a>
    </div>
  </div>
</section>
@endsection
@push("scripts")
<script src="{{asset('common/js/html5qrcode.js')}}"></script>
<script>
  function onScanSuccess(decodedText, decodedResult) {
  console.log(`Code matched = ${decodedText}`, decodedResult);
  }

  function onScanFailure(error) {
    // console.warn(`Code scan error = ${error}`);
  }

  let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader",
    { fps: 10, qrbox: {width: 250, height: 250} },
    /* verbose= */ false);
  html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>

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