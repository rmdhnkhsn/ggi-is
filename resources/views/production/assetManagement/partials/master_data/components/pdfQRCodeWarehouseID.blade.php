
<!DOCTYPE html>
<html>
<body>

<style>
  * {
    font-family: 'roboto', sans-serif;
    margin: 0;
    padding: 0;
  }

  body {
    padding: 6px;
  }

  .container {
    border: 1px solid #2b2b2b;
  }

.header{
  border-bottom: 1px solid #2b2b2b;
  font-size: 10px;
  padding: 4px 0;
}

.kotak {
  width: 100%;
  border-bottom: 1px solid #2b2b2b;
  padding: 12px 0;
}

.text1 {
  text-align: left;
  padding-left: 6px;
  border-bottom: 1px solid #2b2b2b;
  padding-top: 4px;
  padding-bottom: 4px;
  height: 49px
}

.text2 {
  text-align: left;
  padding-left: 6px;
  padding-top: 4px;
  padding-bottom: 4px;
  height: 49px
}

img {
  width: 124px;
  height: 124px;
}
    
</style>
<body>
  @foreach ($eliminasiIDBarcode as $key =>$value)
<center>
<div class="container">
	<div class="header">
    PT.Gistex Garmen Indonesia
	</div> 
	<div class="kotak">
        <img src="data:image/png;base64,{!! base64_encode(QrCode::size(200)->generate( $value['id'] )) !!}">
	</div> 
  <div class="text1">
    <div style="font-size:12px;text-align:center">Desc :</div>
    @if ($value['jenis'] == null)
      <div style="font-size:14px;text-align:center">-</div>
    @else
      <div style="font-size:10px;text-align:center">{{ $value['jenis'] }}</div>
    @endif
  </div>
  <div class="text2">
    <div style="font-size:12px;text-align:center">Serial No :</div>
    <div style="font-size:12px;text-align:center">{{ $value['serialno'] }}-#{{ $value['id'] }}</div>
  </div>
</div>
</center>
  @endforeach
</body>
</html>