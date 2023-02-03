<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
  <head>
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
    .tes {
      width : 30%;
      display : inline-block;
      padding:3px;
      border : 1px solid black;
      vertical-align: text-bottom;
      /* margin-bottom:-20px; */
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
  <!-- <body>
    <div class="tables">
      <div class="tables-row">
        @foreach($data->label_kain as $key => $value)
          <div class="tables">
          {{$value->number_style}}
            @for ($x = 0; $x <= 2; $x++)
              <div class="tables-cell" style="padding:2px;">
                <div class="container" style="border: 1px solid black;">
                  <div class="tables">
                    <div class="tables-cell">
                      <div class="container" style="padding:2px;">
                        <font size="10px">Style No</font>
                        <font size="10px" color="white">iiiiiiiiiiii</font>
                        <font size="10px">: {{$value->number_style}}</font>
                      </div>
                      <div class="container" style="padding:2px;">
                        <font size="10px">WO Number</font>
                        <font size="10px" color="white">iiiiii</font>
                        <font size="10px">: {{$value->no_wo}}</font>
                      </div>
                      <div class="container" style="padding:2px;">
                        <font size="10px">Buyerr</font>
                        <font size="10px" color="white">iiiiiiiiiiiiiii</font>
                        <font size="10px">: {{$value->buyer}}</font>
                      </div>
                      <div class="container" style="padding:2px;">
                        <font size="10px">Color</font>
                        <font size="10px" color="white">iiiiiiiiiiiiiiiii</font>
                        <font size="10px">: {{$value->color}}</font>
                      </div>
                      <div class="container" style="padding:2px;">
                        <font size="10px">Divisi</font>
                        <font size="10px" color="white">iiiiiiiiiiiiiiiii</font>
                        <font size="10px">: {{$value->factory}}</font>
                      </div>
                      <div class="container" style="padding:2px;">
                        <font size="10px">No Roll</font>
                        <font size="10px" color="white">iiiiiiiiiiiiii</font>
                        <font size="10px">: {{$value->roll_no}}</font>
                      </div>
                      <div class="container" style="padding:2px;">
                        <font size="10px">QTY Utuh</font>
                        <font size="10px" color="white">iiiiiiiiii</font>
                        <font size="10px">: {{$value->qty_utuh}} {{$value->satuan}}</font>
                      </div>
                    </div>
                  </div>
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
  </body> -->
  <body>
          @foreach($data->label_kain as $key => $value)
          <div class="tes">
            <font size="10px">Style No</font>
            <font size="10px" color="white">iiiiiiiiiiii</font>
            <font size="10px">: {{$value->number_style}}</font>
            <br>
            <font size="10px">WO Number</font>
            <font size="10px" color="white">iiiiii</font>
            <font size="10px">: {{$value->no_wo}}</font>
            <br>
          
            <font size="10px">Buyer</font>
            <font size="10px" color="white">iiiiiiiiiiiiiiii</font>
            <font size="10px">: {{$value->buyer}}</font>
            <br>
        
            <font size="10px">Country</font>
            <font size="10px" color="white">iiiiiiiiiiiii</font>
            <font size="10px">: {{$value->country}}</font>
            <br>
          
            <font size="10px">Color</font>
            <font size="10px" color="white">iiiiiiiiiiiiiiiii</font>
            <font size="10px">: {{$value->color}}</font>
            <br>
        
          
            <font size="10px">Divisi</font>
            <font size="10px" color="white">iiiiiiiiiiiiiiiii</font>
            <font size="10px">: {{$value->factory}}</font>
            <br>
        
          
            <font size="10px">No Roll</font>
            <font size="10px" color="white">iiiiiiiiiiiiii</font>
            <font size="10px">: {{$value->roll_no}}</font>
            <br>
        
          
            <font size="10px">QTY Utuh</font>
            <font size="10px" color="white">iiiiiiiiii</font>
            <font size="10px">: {{$value->qty_utuh}} {{$value->satuan}} </font>
            <br>

            <font size="10px">Tersisa</font>
            <font size="10px" color="white">iiiiiiiiiiiiiii</font>
            <font size="10px">: {{$value->qty_utuh - $value->pemakaian_kain}} {{$value->satuan}} </font>
            <br>
          </div>
          @endforeach
              
      

  </body>



</html>