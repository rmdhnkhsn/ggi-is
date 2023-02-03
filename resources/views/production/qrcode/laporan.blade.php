
<!DOCTYPE html>
<html>
<body>

<style>
  * {
    font-family: 'roboto', sans-serif;
  }
  table tr td,
  table tr th{
    font-size: 9pt;
  }
  .kotak {
  border: 1px dashed grey;
  width: 330px;
  height: 540px;
  margin: 30px auto;
  border-radius: 10%
  
  }


  img {
    padding-top: 60px;
    height: 200px
  }

  .text {
    font-weight: 600;
    margin-top: 40px;
  }

  .text1{
    font-size: 18px;
    margin-top: 5px;
    color: #222;
  }
  .text2{
      margin-top: -5%;
      font-size: 16px;
      color: #222;
  }
  .style{
      margin-top: -5%;
      font-size: 15px;
      color: #222;
  }
  .buyer{
      margin-top: -5%;
      font-size: 15px;
      color: #222;
  }

  h4 {
    margin-top: 60px
  }
    
</style>
<body>
<center>
  <div class="kotak">
    <img src="data:image/png;base64, {!! $qrcode !!}"> 
    <div class="text">
      <h5 class="text1">SCAN AND SEE A PREVIEW</h5>
      <h5 class="text2">PRODUCTION SAMPLE</h5>
      <h5 class="buyer">BUYER : {{$data->buyer}}</h5>
      <h5 class="style">STYLE : {{$data->style}}</h5>
      <H4>PT. GISTEX GARMEN INDONESIA</H4>
    </div>
  </div>
  </center>
</body>
</html>