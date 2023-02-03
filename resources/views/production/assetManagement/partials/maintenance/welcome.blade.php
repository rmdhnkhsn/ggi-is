@extends("layouts.blank.app")
@section("title","Welcome")
@push("styles")
    <link rel="stylesheet" href="{{asset('/common/css/singleStyle/maintenance.css')}}">
@endpush

@section("content")
<section class="content maintenance welcome" id="disableScroll">
    <div class="container-fluid">
        <div class="buleud"></div>
        <div class="title">
            <div class="title-20W">Maintenance of</div>
            <div class="title-36W">Your Company Assets</div>
        </div>
        <div class="contentCenter mt-5">
            <img src="{{url('images/iconpack/asset_management/beko.svg')}}" class="bekoImg">
        </div>
        <div class="contentCenter mt-5">
            <a href="{{ route('asset.maintenance.index')}}" class="btn-yellow justify-center widthRes h-48">Get Started<i class="fs-18 ml-3 fas fa-arrow-circle-right"></i></a>
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