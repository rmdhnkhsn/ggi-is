
<!DOCTYPE html>
<html>
<body>

<style>
  * {
    font-family: 'roboto', sans-serif;
    margin: 0;
    padding: 0;
  }
  .kotak {
  width: 100%;
  }

  .text {
	text-align:center;
    width: 100%;
	margin-top:14px
  }

  img {
    width: 150px;
    height: 150px 
  }
    
</style>
<body>
  @foreach ($eliminasiIDBarcode as $key =>$value)
<center>
<div class="container" style="padding:10px 8px">
	<div class="kotak">
        <img src="data:image/png;base64,{!! base64_encode(QrCode::size(200)->generate( $value['id_barcode'] )) !!}">
	</div> 
    <div class="text">
		<!-- <h5 style="font-size:10px;">{{ $value['buyer'] }}-{{ $value['tanggal'] }}-{{ $value['id_barcode'] }}-no box-{{ $value['no_box'] }} </h5><br> -->

		<h5 style="font-size:10px;">To:{{ $value['buyer'] }}, Box/Roll:{{ $value['no_box'] }} </h5>
		<h5 style="font-size:10px;">Short Item:{{ $value['short_item'] }}</h5>
		<h5 style="font-size:10px;">Color:{{ $value['item'] }}</h5>
		<h5 style="font-size:10px;">Content:{{ $value['content'] }}#{{$value['id']}}, </h5>

    </div>
</div>

</center>
  @endforeach
</body>
</html>