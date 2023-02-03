@extends("hr_ga.permit_request.layouts.app")
@section("title","Barcode Approve")
@push("styles")

@endpush

@section("content")
<section class="content" id="disableScroll">
  <div class="containerScan">
    <div class="containerBack">
      <a href="{{ route('barcode.security.index') }}" class="previous-tab"><i class="fas fa-arrow-left"></i></a>
    </div>
    <div class="elipse1"></div>
    <div class="elipse2"></div>
    <div class="logoGistex">
      <img src="{{url('images/iconpack/permit_request/gistex.svg')}}">
    </div>
    <div class="decoration">
      <img src="{{url('images/iconpack/permit_request/decoration.svg')}}">
      <i class="fas fa-check"></i>
    </div>
    <div class="justify-center">
      <div class="badgeApprove">Diizinkan</div>
    </div>
    <div class="textContent">
      <div class="title-16W">waktu 25 Januari - 13.00 sd 15.00</div>
      <div class="title-18W mt-3">Ralph Edwards, Diizinkan untuk keluar kantor.</div>
    </div>
    <div class="card-alasan">
      <div class="title-24B mb-3">Alasan</div>
      <div class="title-16 mb-3">Ralph Edwards, Telah Memenuhi persyaratan untuk keluar.</div>
      <a href="{{ route('barcode.security.index') }}" class="btn-blue-rounded">Scan Lagi</a>
    </div>
  </div>
</section>
@endsection
@push("scripts")
<script>
    document.getElementById('disableScroll').addEventListener('wheel', event => {
    if (event.ctrlKey) {
        event.preventDefault()
    }
    }, true)
</script>
@endpush        