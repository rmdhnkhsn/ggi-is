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
.tables-cell { display: table-cell;}
.page_break { page-break-inside: auto; }
</style>
</head>
    <body> 
        <div class="row">
                <div class="col-4">
                    Lorem ipsum dolor sit.
                </div>
                <div class="col-4">
                    Lorem ipsum dolor sit.
                </div>
                <div class="col-4">
                    Lorem ipsum dolor sit.
                </div>
                <div class="col-4">
                    Lorem ipsum dolor sit.
                </div>
                <div class="col-4">
                    Lorem ipsum dolor sit.
                </div>
        </div>
        <div class="tables">
            <div class="tables-row">
              @foreach($data->label_kain as $key => $value)
                <div class="tables">
                  @for ($x = 0; $x <= 2; $x++)
                    <div class="tables-cell">
                      <div class="container" style="border: 1px solid black;">
                            Stssyle {{$value->style}}
                      </div>
                    </div>
                    <div class="tables-cell">
                      <div class="container" style="border: 1px solid black;">
                            Stylaae {{$value->style}}
                      </div>
                    </div>
                  @endfor
                </div>
                @php
                $x=0;
                @endphp
              @endforeach
            </div>
        </div>
    </body>
</html>