@extends("Error.layouts.app")
@section("title","ERROR 404")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@section("content")
<section class="content-error">
    <div class="container-error">
        <img src="{{url('images/iconpack/error/img-404.svg')}}" class="img-404">
        <img src="{{url('images/iconpack/error/text-404.svg')}}">
        <div class="text-xl">Oops.!, Page Not Found</div>
        <div class="text-sm">Ada yang salah, Halaman yang Anda cari telah dipindahkan, Dihapus, <br/>Diganti namanya atau mungkin tidak pernah ada.</div>
        <a href="" class="buttonBack"><i class="fas fa-long-arrow-alt-up"></i><i class="fas fa-chevron-left"></i><div class="txt-back">Kembali</div></a>  
    </div>
    <img src="{{url('images/iconpack/error/aksen.svg')}}" class="aksen">
    <img src="{{url('images/iconpack/error/aksen-kiri.svg')}}" class="aksen-kiri">
    <img src="{{url('images/iconpack/error/aksen-kanan.svg')}}" class="aksen-kanan">
</section>
@endsection
@push("scripts")



@endpush