@extends("Error.layouts.app")
@section("title","ERROR 419")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@section("content")
<section class="content-error">
    <div class="container-error">
        <img src="{{url('images/iconpack/error/img-419.svg')}}" class="img-419">
        <img src="{{url('images/iconpack/error/text-419.svg')}}">
        <div class="text-xl">Oops.!, Page Expired</div>
        <div class="text-sm">Maaf, sesi Anda telah kedaluwarsa, silahkan refresh browser<br/>dan coba login kembali.</div>
        <a href="" class="buttonBack"><i class="fas fa-long-arrow-alt-up"></i><i class="fas fa-chevron-left"></i><div class="txt-back">Kembali</div></a>  
    </div>
    <img src="{{url('images/iconpack/error/aksen.svg')}}" class="aksen">
    <img src="{{url('images/iconpack/error/aksen-kiri.svg')}}" class="aksen-kiri">
    <img src="{{url('images/iconpack/error/aksen-kanan.svg')}}" class="aksen-kanan">
</section>
@endsection
@push("scripts")



@endpush