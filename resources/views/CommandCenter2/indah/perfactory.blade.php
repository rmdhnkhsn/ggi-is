@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/styleCC1.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">

  <style> 
#div1 {
  width: auto;
  height: auto;
  border-radius: 10px;
  box-sizing: border-box;
  background-color: #ED464A; /* For browsers that do not support gradients */
  background-image: linear-gradient(250deg, #F26F74 0%, #ED464A 100%);
}
#div2 {
  width: auto;
  height: auto;
  border-radius: 10px;
  box-sizing: border-box;
  background-color: #4565F6; /* For browsers that do not support gradients */
  background-image: linear-gradient(250deg, #A7B6F6 0%, #4565F6 100%);
}
#div3 {
  width: auto;
  height: auto;
  border-radius: 10px;
  box-sizing: border-box;
  background-color: #71AD78; /* For browsers that do not support gradients */
  background-image: linear-gradient(250deg, #A5ECAD 0%, #71AD78 100%);
}
#div4 {
  width: auto;
  height: auto;
  border-radius: 10px;
  box-sizing: border-box;
  background-color: #ECB244; /* For browsers that do not support gradients */
  background-image: linear-gradient(250deg, #FCDC9D 0%, #ECB244 100%);
}
#div5 {
  width: auto;
  height: auto;
  border-radius: 10px;
  box-sizing: border-box;
  background-color: #F2A8D0; /* For browsers that do not support gradients */
  background-image: linear-gradient(250deg, #FFD4EB 0%, #F2A8D0 100%);
}
#bintang {
    text-align:left;
    color:white;
}
#nama{
    float:center;
    text-align:left;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 18px;
    font-weight:bold;
    color:white;
}

#bagian{
    float:center;
    text-align:left;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 12px;
    font-weight:bold;
    color:white;
}

#gambar{
    position:center;
    width:auto;
    height:auto;
}
p.angka{
    padding-top:25px;
    text-align:center;
    font-family: Arial, Helvetica, sans-serif;
    font-size:28px;
    font-weight:bold;
    color:white;
}

p.nilai{
    padding-top:32px;
    text-align:left;
    font-family: Arial, Helvetica, sans-serif;
    font-size:25px;
    font-weight:bold;
    color:white;
}
</style>
@endpush

@section("content")
<section class="content-header">
      <div class="content-header">
          <!-- <div class="row">
            <div class="col-lg-3 col-6">
              <a href="{{ route('cc2.level2', $dataBranch->id) }}" class="btn btn-block btn-primary btn-sm"><i class="fas fa-arrow-circle-left"></i> {{$dataBranch->nama_branch}}</a>
            </div>
            <div class="col-lg-3 col-6">
              <a href="{{ route('cc2.indah', $dataBranch->id) }}" class="btn btn-block btn-primary btn-sm"><i class="fas fa-arrow-circle-left"></i> GGI INDAH</a>
            </div>
          </div> -->
      </div>
    </section>
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <?php $no=1;?>
                 @foreach($datalaporan as $dt)
                <div class="container col-12" style="padding:25px;">
                    @if($no == 1)
                    <div class="row" id="div1">
                    @endif
                    @if($no == 2)
                    <div class="row" id="div2">
                    @endif
                    @if($no == 3)
                    <div class="row" id="div3">
                    @endif
                    @if($no == 4)
                    <div class="row" id="div4">
                    @endif
                    @if($no == 5)
                    <div class="row" id="div5">
                    @endif
                        <div class="col-lg-1 col-1">
                            <p class="angka" scope="row">{{ $no }}</p>
                        </div>
                        <div class="col-lg-7 col-6">
                            <div clas="container" style="padding-top:10px;">
                                <font id="nama">{{$dt['nama']}}</font>
                            </div>
                            <div clas="container">
                                <font id="bagian">{{$dt['bagian']}}</font>
                            </div>

                            @if(($dt['total'] > 0) && ($dt['total'] <= 9))
                            <div clas="container" id="bintang" style="padding-bottom:10px;">
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            </div>
                            @elseif(($dt['total'] > 10) && ($dt['total'] <= 30))
                            <div clas="container" id="bintang" style="padding-bottom:10px;">
                            <i class="fas fa-star "></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            </div>
                            @elseif(($dt['total'] >= 31) && ($dt['total'] <= 50))
                            <div clas="container" id="bintang" style="padding-bottom:10px;">
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            </div>
                            @elseif(($dt['total'] >= 51) && ($dt['total'] <= 70))
                            <div clas="container" id="bintang" style="padding-bottom:10px;">
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="far fa-star "></i>
                            <i class="far fa-star"></i>
                            </div>
                            @elseif(($dt['total'] >= 71) && ($dt['total'] <= 90))
                            <div clas="container" id="bintang" style="padding-bottom:10px;">
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="far fa-star"></i>
                            </div>
                            @elseif($dt['total'] > 90)
                            <div clas="container" id="bintang" style="padding-bottom:10px;">
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-2 col-3">
                            <p class="nilai">{{$dt['like']}} <i class="fas fa-check" style="color:green;font-size:20px;"></i> {{$dt['dislike']}} <i class="fas fa-times" style="color:red;font-size:20px;"></i></p>
                        </div>
                        @if($no == 1)
                        <div class="col-lg-2 col-2">
                            <div class="container">
                                <img src="{{ url('/indah/cc/mario03.png') }}" style="width:80px;padding-right:10px;padding-top:10px">
                            </div>
                        </div>
                        @endif
                        @if($no == 2)
                        <div class="col-lg-2 col-2">
                            <div class="container">
                                <img src="{{ url('/indah/cc/sonic3.png') }}" style="width:80px;padding-right:10px;padding-top:9px">
                            </div>
                        </div>
                        @endif
                        @if($no == 3)
                        <div class="col-lg-2 col-2">
                            <div class="container">
                                <img src="{{ url('/indah/cc/pokemon2.png') }}" style="width:80px;padding-right:10px;padding-top:20px">
                            </div>
                        </div>
                        @endif
                        @if($no == 4)
                        <div class="col-lg-2 col-2">
                            <div class="container">
                                <img src="{{ url('/indah/cc/pacman2.png') }}" style="width:80px;padding-right:10px;padding-top:25px">
                            </div>
                        </div>
                        @endif
                        @if($no == 5)
                        <div class="col-lg-2 col-2">
                            <div class="container">
                                <img src="{{ url('/indah/cc/kriby.png') }}" style="width:80px;padding-right:10px;padding-top:26px">
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <?php $no++ ;?>
                @endforeach
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

@push("scripts")
<script>
$(".dial").knob({
 "readOnly":true,
 'change': function (v) { console.log(v); },
  draw: function () {
    $(this.i).css('font-size', '13.5pt').css('font-weight', 'bold');
    $(this.i).val(this.cv + ' %');
  }
});
</script>
@endpush