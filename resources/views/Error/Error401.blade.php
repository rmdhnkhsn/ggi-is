@extends("Error.layouts.app")
@section("title","ERROR 401")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@section("content")
<section class="content-error">
    <div class="container-error">
        <img src="{{url('images/iconpack/error/img-401.svg')}}" class="img-401">
        <img src="{{url('images/iconpack/error/text-401.svg')}}">
        <div class="text-xl">Unauthorized, Access is denied</div>
        <div class="text-sm">Anda tidak memiliki izin untuk melihat direktori atau halaman ini <br/>menggunakan kredensial yang Anda berikan</div>
        <a href="" class="buttonBack"><i class="fas fa-long-arrow-alt-up"></i><i class="fas fa-chevron-left"></i><div class="txt-back">Kembali</div></a>  
    </div>
    <img src="{{url('images/iconpack/error/aksen.svg')}}" class="aksen">
    <img src="{{url('images/iconpack/error/aksen-kiri.svg')}}" class="aksen-kiri">
    <img src="{{url('images/iconpack/error/aksen-kanan.svg')}}" class="aksen-kanan">
</section>
@endsection
@push("scripts")



@endpush