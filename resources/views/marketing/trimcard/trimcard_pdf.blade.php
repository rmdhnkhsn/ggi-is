<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<style>
	table, td, th {
  border: 1px solid black;
  font-size:9px;
  padding:3px;
  }
  table {
    border-collapse: collapse;
  }
			#box1{
				width:180px;
				height:180px;
        padding:10px;
        border: 2px solid grey;
				background:white;
			}
      #tabel{
				width:100%;
				height: auto;
        padding:10px;
        border: 2px solid grey;
				background:white;
			}
      #tab{
        width:100%;
				height: auto;
        border: 1px solid grey;
				background:white;
			}
      #tbl{
        width:100%;
				height: 200px;
        border: 1px solid grey;
				background:white;
			}
      h7 {
        text-decoration: overline;
      }
      input[type=text] {
        width: 100%;
      box-sizing: border-box;
      border: none;
      border-bottom: 2px solid black;
}
.dit {
  width: 180px;
  padding: 3px;
  border: 1px solid black;
  margin: 0;
}
.cons {
    width: auto;
    height:150px;
    border: 1px solid black;
} 
.col-lg-6 {width:100%; float:left;}
.tables { display: table; width: 100%;}
.tables-row { display: table-row; }
.tables-cell { display: table-cell; padding: 1em; }
.page_break { page-break-inside: auto; }
</style>
</head>
    <body> 
      <center><font style="font-weight:bold;font-size:24px;">BULK TRIM CARD</font></center>
      <br>
      <div class="tables">
        <div class="tables-row">
          <div class="tables-cell">
          <div class="container">
              <font style="font-color:black;font-size:14;">AGENT</font>
              <font style="font-color:black;font-size:14;padding-left:173px;">: {{$atas->agent}}</font>
              <br>
              <font style="font-color:black;font-size:14;">BUYER</font>
              <font style="font-color:black;font-size:14;padding-left:173px;">: {{$atas->buyer}}</font>
              <br>
              <font style="font-color:black;font-size:14;">DESTINATION</font>
              <font style="font-color:black;font-size:14;padding-left:112px;">: {{$atas->destination}}</font>
              <br>
              <font style="font-color:black;font-size:14;">PROD DESCRIPTION</font>
              <font style="font-color:black;font-size:14;padding-left:60px;">: {{$atas->prod_desc}}</font>
              <br>
              <font style="font-color:black;font-size:14;">STYLE</font>
              <font style="font-color:black;font-size:14;padding-left:178px;">: {{$atas->style}}</font>
              <br>
              <font style="font-color:black;font-size:14;">ART</font>
              <font style="font-color:black;font-size:14;padding-left:199px;">: {{$atas->art}}</font>
            </div>
          </div>
          <div class="tables-cell">
            <div class="container">
              <font style="font-color:black;font-size:14;">COLORWAY</font>
              <font style="font-color:black;font-size:14;padding-left:90px;">: {{$atas->colorway1}}</font>
              <br>
              <font style="font-color:black;font-size:14;"></font>
              <font style="font-color:black;font-size:14;padding-left:212px;">  {{$atas->colorway2}}</font>
              <br>
              <font style="font-color:black;font-size:14;"></font>
              <font style="font-color:black;font-size:14;padding-left:212px;">  {{$atas->colorway3}}</font>
              <br>
              <font style="font-color:black;font-size:14;"></font>
              <font style="font-color:black;font-size:14;padding-left:212px;">  {{$atas->colorway4}}</font>
              <br>
              <font style="font-color:black;font-size:14;"></font>
              <font style="font-color:black;font-size:14;padding-left:212px;">  {{$atas->colorway5}}</font>
              <br>
              <font style="font-color:black;font-size:14;"></font>
              <font style="font-color:black;font-size:14;padding-left:212px;">  {{$atas->colorway6}}</font>
            </div>
          </div>
        </div>
      </div>
      <br>
      @foreach($hasil as $key => $value)  
      <div class="tables">
        <div class="tables-row">
          <div class="tables-cell">
            <div class="container">
              <label for="">{{$value['desc1']}}</label>
              @if($value['desc2'] == " " || $value['desc2'] == null)
              <br><label for="" style="color:white;">aaaa</label>
              @else
              <br><label for="">{{$value['desc2']}}</label>
              @endif
              <br><label for="">{{$value['srtx']}}</label>
              <div class="cons"></div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </body>
</html>