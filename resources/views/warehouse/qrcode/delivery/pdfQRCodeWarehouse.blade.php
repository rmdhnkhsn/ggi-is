
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
<div class="container" style="padding:20px 14px">
	<div class="kotak">
        <img src="data:image/png;base64,{!! base64_encode(QrCode::size(200)->generate( $value['id_barcode'] )) !!}">
	</div> 
    <div class="text">
		<h5 style="font-size:12px;">{{ $value['buyer'] }}-{{ $value['tanggal'] }}-{{ $value['id_barcode'] }}-no box-{{ $value['no_box'] }} </h5>
    </div>
</div>

</center>
  @endforeach
</body>
</html>