<!DOCTYPE html>
<html lang="en" style="overflow:scroll;">
<style>
	table, td, th {
  border: 1px solid black;
  font-size:12px;
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
.msg{
  
}
.col-lg-6 {width:100%; float:left;}
.tables { display: table; width: 100%;}
.tables-row { display: table-row; }
.tables-cell { display: table-cell; }
.page_break { page-break-inside: auto; }
</style>
</head>
    <body> 
      <div class="container" style="text-align:center;">
        <font style="font-weight:bold;font-size:20px;">WORKSHEET {{strtoupper($master_data->general_identity->buyer)}} – {{strtoupper($master_data->general_identity->style_code)}} {{strtoupper($master_data->general_identity->style_name)}}</font>
      </div>
      <div class="container" style="text-align:center;">
        <font style="font-size:16px;">{{$master_data->general_identity->description}}</font>
      </div>
      <br>
      <div class="tables">
        <div class="tables-row">
          <div class="tables-cell" style="text-align:left;">
            <div class="container" style="padding-bottom:10px;font-weight:bold;">
              Product Details
            </div>
            <div class="tables">
              <div class="tables-row">
                <div class="tables-cell">
                  OR Number
                </div>
                <div class="tables-cell" style="padding-right:3px;">
                  :
                </div>
                <div class="tables-cell">
                  {{$master_data->general_identity->nomor_or}}
                </div>
              </div>
              <div class="tables-row">
                <div class="tables-cell"  >
                  Article
                </div>
                <div class="tables-cell" style="padding-right:3px;">
                  :
                </div>
                <div class="tables-cell">
                  {{$master_data->general_identity->article}}
                </div>
              </div>
              <div class="tables-row">
                <div class="tables-cell"  >
                  Product Name
                </div>
                <div class="tables-cell" style="padding-right:3px;">
                  :
                </div>
                <div class="tables-cell">
                  {{$master_data->general_identity->product_name}}
                </div>
              </div>
              <div class="tables-row">
                <div class="tables-cell">
                  Style
                </div>
                <div class="tables-cell" style="padding-right:3px;">
                  :
                </div>
                <div class="tables-cell">
                {{$master_data->general_identity->style_code}}
                </div>
              </div>
            </div>
          </div>
          <div class="tables-cell" style="text-align:left;">
            <div class="container" style="padding-bottom:10px;font-weight:bold;">
              Buyer Details
            </div>
            <div class="tables">
              <div class="tables-row">
                <div class="tables-cell">
                  Buyer
                </div>
                <div class="tables-cell" style="padding-right:3px;">
                  :
                </div>
                <div class="tables-cell">
                  {{$master_data->general_identity->buyer}}
                </div>
              </div>
              <div class="tables-row">
                <div class="tables-cell"  >
                  Ship to
                </div>
                <div class="tables-cell" style="padding-right:3px;">
                  :
                </div>
                <div class="tables-cell">
                  {{$master_data->general_identity->ship_to}}
                </div>
              </div>
              <div class="tables-row">
                <div class="tables-cell"  >
                  Contract No
                </div>
                <div class="tables-cell" style="padding-right:3px;">
                  :
                </div>
                <div class="tables-cell">
                  {{$master_data->general_identity->contract}}
                </div>
              </div>
              <div class="tables-row">
                <div class="tables-cell">
                  Garment PO
                </div>
                <div class="tables-cell" style="padding-right:3px;">
                  :
                </div>
                <div class="tables-cell">
                {{$master_data->general_identity->no_po}}
                </div>
              </div>
            </div>
          </div>
		  
          <div class="tables-cell" style="text-align:left;">
            <div class="container" style="padding-bottom:10px;">
				@if($master_data->general_identity->file != null)
				<img src="{{ public_path('marketing/worksheet/general_identity/'.$master_data->general_identity->file) }}" style="max-width:160px;max-height:160px;"> 
				@endif
			</div>
          </div>
        </div>
      </div>
      <div class="container" style="padding-bottom:10px;font-weight:bold;">
        Breakdown Quantity Order
      </div>
      <table style="width:1240px">
        <tr style="background:#D3D3D3">
          <th>Style</th>
          <th>Color Code</th>
          <th>Color Name</th>
          <th>Garment Ex-Fact</th>
          @foreach ($master_data->rekap_size->toArray() as $column => $field)
              @if (str_contains($column,'size')&&($field!==null))
                <th>{{$field}}</th>
              @endif
          @endforeach
          <th>Total</th>
        </tr>
        @foreach($master_data->rekap_breakdown->toArray() as $key=>$value)
        @php $i=1 @endphp
          <tr style="text-align:center;">
            <td>{{$master_data->general_identity->first()->style_code}}</td>
            <td>{{$value['color_code']}}</td>
            <td>{{$value['color_name']}}</td>
            <td>{{$master_data->ex_fact}}</td>
            @foreach ($master_data->rekap_size->toArray() as $column => $field)
                @if (str_contains($column,'size')&&($field!==null))
                  <td>{{$value['size'.$i]}}</td>
                  @php $i+=1 @endphp
                @endif
            @endforeach
            <td>{{$value['total_size']}}</td>
          </tr>
        @endforeach
      </table>

      @if($master_data->material_fabric != null)
      <div class="container" style="padding-bottom:10px;padding-top:10px;font-weight:bold;">
        Materials - Fabric
      </div>
      <table style="width:1240px">
        <tr style="background:#D3D3D3">
          <th>Colorway</th>
          <th>Cutting way</th>
          <th>Part</th>
          <th>Material 1 (Description 1)</th>
          <th>Material 2 (Description 2)</th>
          <th>Color</th>
          <th>Consump</th>
          <th>Description</th>
        </tr>
        @foreach($master_data->material_fabric as $key=>$value)
          <tr>
            <td>{{$value->colorway}}</td>
            <td>{{$value->cutting_way}}</td>
            <td>{{$value->port}}</td>
            <td>{{$value->material1}}</td>
            <td>{{$value->material2}}</td>
            <td>{{$value->color}}</td>
            <td>{{$value->consumption}}</td>
            <td>{{$value->description}}</td>
          </tr>
        @endforeach
      </table>
      @endif

      @if($master_data->attention_cutting != null)
      <div class="container" style="padding-bottom:10px;padding-top:5px;font-weight:bold;">
        Attention
      </div>
      @if($master_data->attention_cutting->attention_sewing != null || $master_data->attention_cutting->sewing_guide != null)
      <table style="width:1240px">
        <tr style="background:#D3D3D3">
          <th>Attention Cutting</th>
          <th>Cutting Guide</th>
        </tr>
        <tr>
          <td>
              <textarea style="width:auto;height:200px;border: 1px solid #FFFFFF;text-align:left;">
                {{$master_data->attention_cutting->attention_sewing}}
              </textarea>
          </td>
          <td>
              <textarea style="width:auto;height:200px;border: 1px solid #FFFFFF;text-align:left;">
                {{$master_data->attention_cutting->sewing_guide}}
              </textarea>
          </td>
        </tr>
      </table>
      @endif
      @if($master_data->attention_cutting->fabric_image != null)
      <div class="container" style="padding-bottom:10px;padding-top:5px;">
        Fabric Image
      </div>
      <img src="{{ public_path('marketing/worksheet/material_fabric/'.$master_data->attention_cutting->fabric_image) }}"> 
      @endif
      @endif
      
      @if($master_data->material_sewing != null)
      <div class="container" style="padding-bottom:10px;padding-top:10px;font-weight:bold;">
        Materials - Sewing
      </div>
      <table style="width:1240px">
        <tr style="background:#D3D3D3">
          <th>Colorway</th>
          <th>Part</th>
          <th>Material 1 (Description 1)</th>
          <th>Material 2 (Description 2)</th>
          <th>Color</th>
          <th>Consump</th>
          <th>Description</th>
        </tr>
        @foreach($master_data->material_sewing as $key=>$value)
          <tr>
            <td>{{$value->colorway}}</td>
            <td>{{$value->port}}</td>
            <td>{{$value->material1}}</td>
            <td>{{$value->material2}}</td>
            <td>{{$value->color}}</td>
            <td>{{$value->consumption}}</td>
            <td>{{$value->description}}</td>
          </tr>
        @endforeach
      </table>
      @endif

      @if($master_data->material_sewing_inac != null)
      <div class="container" style="padding-bottom:10px;padding-top:10px;font-weight:bold;">
        Material - INAC
      </div>
      <table style="width:1240px">
        <tr style="background:#D3D3D3">
          <th>Colorway</th>
          <th>Cutting way</th>
          <th>Part</th>
          <th>Material 1 (Description 1)</th>
          <th>Material 2 (Description 2)</th>
          <th>Color</th>
          <th>Consump</th>
          <th>Description</th>
        </tr>
        @foreach($master_data->material_sewing_inac as $key=>$value)
          <tr>
            <td>{{$value->colorway}}</td>
            <td>{{$value->cutting_way}}</td>
            <td>{{$value->port}}</td>
            <td>{{$value->material1}}</td>
            <td>{{$value->material2}}</td>
            <td>{{$value->color}}</td>
            <td>{{$value->consumption}}</td>
            <td>{{$value->description}}</td>
          </tr>
        @endforeach
      </table>
      @endif

      @if($master_data->material_sewing_packaging != null)
      <div class="container" style="padding-bottom:10px;padding-top:10px;font-weight:bold;">
        Material - Packaging
      </div>
      <table style="width:1240px">
        <tr style="background:#D3D3D3">
          <th>Item</th>
          <th>Detail</th>
          <th>Consumption</th>
          <th>Description</th>
        </tr>
        @foreach($master_data->material_sewing_packaging as $key=>$value)
          <tr>
            <td>{{$value->item}}</td>
            <td>{{$value->detail}}</td>
            <td>{{$value->consumption}}</td>
            <td>{{$value->description}}</td>
          </tr>
        @endforeach
      </table>
      @endif

      @if($master_data->material_sewing_detail != null)
        <div class="container" style="padding-top:5px;font-weight:bold;">
          Attention
        </div>  
        <!-- Attention & Guide -->
        @if($master_data->material_sewing_detail->attention_sewing != null || $master_data->material_sewing_detail->sewing_guide != null)
        <div class="container" style="padding-bottom:10px;padding-top:5px;font-weight:bold;">
          Sewing - Thread
        </div>
        <table style="width:1240px">
          <tr style="background:#D3D3D3">
            <th>Attention Sewing</th>
            <th>Sewing Guide</th>
          </tr>
          <tr>
            <td>
                <textarea style="width:auto;height:200px;border: 1px solid #FFFFFF;text-align:left;">
                  {{$master_data->material_sewing_detail->attention_sewing}}
                </textarea>
            </td>
            <td>
                <textarea style="width:auto;height:200px;border: 1px solid #FFFFFF;text-align:left;">
                  {{$master_data->material_sewing_detail->sewing_guide}}
                </textarea>
            </td>
          </tr>
        </table>
        @endif
        <div class="tables" style="padding-left:5px;padding-bottom:5px;padding-top:5px;">
          <div class="tables-row">
            @if($master_data->material_sewing_detail->sewing_image != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($master_data->material_sewing_detail->sewing_image2 != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image2) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($master_data->material_sewing_detail->sewing_image3 != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image3) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
          </div>
        </div>
        <div class="tables" style="padding-left:5px;">
          <div class="tables-row">
            @if($master_data->material_sewing_detail->sewing_image4 != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image4) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($master_data->material_sewing_detail->sewing_image5 != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image5) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($master_data->material_sewing_detail->sewing_image6 != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image6) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
          </div>
        </div>
      @endif
      @if($master_data->material_sewing_detail != null)        
        <!-- Attention & Guide -->
        @if($master_data->material_sewing_detail->attention_label != null || $master_data->material_sewing_detail->label_guide != null)
        <!-- Label  -->
        <div class="container" style="padding-bottom:10px;padding-top:5px;font-weight:bold;">
          Label
        </div>
        <table style="width:1240px">
          <tr style="background:#D3D3D3">
            <th>Attention Label</th>
            <th>Label Guide</th>
          </tr>
          <tr>
            <td>
                <textarea style="width:auto;height:200px;border: 1px solid #FFFFFF;text-align:left;">
                  {{$master_data->material_sewing_detail->attention_label}}
                </textarea>
            </td>
            <td>
                <textarea style="width:auto;height:200px;border: 1px solid #FFFFFF;text-align:left;">
                  {{$master_data->material_sewing_detail->label_guide}}
                </textarea>
            </td>
          </tr>
        </table>
        @endif
        <div class="tables" style="padding-left:5px;padding-bottom:5px;padding-top:5px;">
          <div class="tables-row">
            @if($master_data->material_sewing_detail->label_image != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($master_data->material_sewing_detail->label_image2 != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image2) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($master_data->material_sewing_detail->label_image3 != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image3) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
          </div>
        </div>
        <div class="tables" style="padding-left:5px;">
          <div class="tables-row">
            @if($master_data->material_sewing_detail->label_image4 != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image4) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($master_data->material_sewing_detail->label_image5 != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image5) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($master_data->material_sewing_detail->label_image6 != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image6) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
          </div>
        </div>
      @endif
      @if($master_data->material_sewing_detail != null)       
        <!-- Attention & Guide -->
        @if($master_data->material_sewing_detail->attention_ironing != null || $master_data->material_sewing_detail->ironing_guide != null)
        <!-- Ironing  -->
        <div class="container" style="padding-bottom:10px;padding-top:5px;font-weight:bold;">
          Ironing
        </div>
        <table style="width:1240px">
          <tr style="background:#D3D3D3">
            <th>Attention Ironing</th>
            <th>Ironing Guide</th>
          </tr>
          <tr>
            <td>
                <textarea style="width:auto;height:200px;border: 1px solid #FFFFFF;text-align:left;">
                  {{$master_data->material_sewing_detail->attention_ironing}}
                </textarea>
            </td>
            <td>
                <textarea style="width:auto;height:200px;border: 1px solid #FFFFFF;text-align:left;">
                  {{$master_data->material_sewing_detail->ironing_guide}}
                </textarea>
            </td>
          </tr>
        </table>
        @endif
        <div class="tables" style="padding-left:5px;padding-bottom:5px;padding-top:5px;">
          <div class="tables-row">
            @if($master_data->material_sewing_detail->ironing_image != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($master_data->material_sewing_detail->ironing_image2 != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image2) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($master_data->material_sewing_detail->ironing_image3 != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image3) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
          </div>
        </div>
        <div class="tables" style="padding-left:5px;">
          <div class="tables-row">
            @if($master_data->material_sewing_detail->ironing_image4 != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image4) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($master_data->material_sewing_detail->ironing_image5 != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image5) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($master_data->material_sewing_detail->ironing_image6 != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image6) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
          </div>
        </div>
      @endif
      @if($master_data->material_sewing_detail != null)       
        <!-- Attention & Guide -->
        @if($master_data->material_sewing_detail->attention_trimming != null || $master_data->material_sewing_detail->trimming_guide != null)
        <!-- Ironing  -->
        <div class="container" style="padding-bottom:10px;padding-top:5px;font-weight:bold;">
          Trimming
        </div>
        <table style="width:1240px">
          <tr style="background:#D3D3D3">
            <th>Attention Trimming</th>
            <th>Trimming Guide</th>
          </tr>
          <tr>
            <td>
                <textarea style="width:auto;height:200px;border: 1px solid #FFFFFF;text-align:left;">
                  {{$master_data->material_sewing_detail->attention_trimming}}
                </textarea>
            </td>
            <td>
                <textarea style="width:auto;height:200px;border: 1px solid #FFFFFF;text-align:left;">
                  {{$master_data->material_sewing_detail->trimming_guide}}
                </textarea>
            </td>
          </tr>
        </table>
        @endif
        <div class="tables" style="padding-left:5px;padding-bottom:5px;padding-top:5px;">
          <div class="tables-row">
            @if($master_data->material_sewing_detail->trimming_image != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($master_data->material_sewing_detail->trimming_image2 != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image2) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($master_data->material_sewing_detail->trimming_image3 != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image3) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
          </div>
        </div>
        <div class="tables" style="padding-left:5px;">
          <div class="tables-row">
            @if($master_data->material_sewing_detail->trimming_image4 != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image4) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($master_data->material_sewing_detail->trimming_image5 != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image5) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($master_data->material_sewing_detail->trimming_image6 != null)
            <div class="tables-cell">
              <img src="{{ public_path('marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image6) }}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
          </div>
        </div>
      @endif



      @if($spec != 0)
      <div class="container" style="padding-top:10px;font-weight:bold;">
        Measurement Report
      </div>
      <div class="container" style="padding-bottom:10px;padding-top:5px;font-weight:bold;">
        Spec
      </div>
      <table style="width:1240px">
        <tr style="background:#D3D3D3">
          <th>POM</th>
          <th>Description</th>
          <th>Tol(+)</th>
          <th>Tol(-)</th>
          @foreach ($master_data->rekap_size->toArray() as $column => $field)
              @if (str_contains($column,'size')&&($field!==null))
                <th>{{$field}}</th>
              @endif
          @endforeach
        </tr>
        @foreach($master_data->measurement->where('tipe','SPEC')->toArray() as $key => $value)
        @php $i=1 @endphp
          <tr>
            <td>{{$value['pom']}}</td>
            <td>{{$value['description']}}</td>
            <td>{{$value['tol_positif']}}</td>
            <td>{{$value['tol_negatif']}}</td>
            @foreach ($master_data->rekap_size->toArray() as $column => $field)
                @if (str_contains($column,'size')&&($field!==null))
                  <td>{{$value['size'.$i]}}</td>
                  @php $i+=1 @endphp
                @endif
            @endforeach
          </tr>
        @endforeach
      </table>
      @endif

      @php
        $file1="";
        $file2="";
        $file3="";
        $file4="";
        $file5="";
        $file6="";
        $folding_guide_original="";
        $note_detail="";
        $note_attention="";
        if ($folding != 0) {
          $master_data->packing->where('tipe','FOLDING')->first()->file1==null?:$file1=storage_path('/app/public/'.$master_data->packing->where('tipe','FOLDING')->first()->file1);
          $master_data->packing->where('tipe','FOLDING')->first()->file2==null?:$file2=storage_path('/app/public/'.$master_data->packing->where('tipe','FOLDING')->first()->file2);
          $master_data->packing->where('tipe','FOLDING')->first()->file3==null?:$file3=storage_path('/app/public/'.$master_data->packing->where('tipe','FOLDING')->first()->file3);
          $master_data->packing->where('tipe','FOLDING')->first()->file4==null?:$file4=storage_path('/app/public/'.$master_data->packing->where('tipe','FOLDING')->first()->file4);
          $master_data->packing->where('tipe','FOLDING')->first()->file5==null?:$file5=storage_path('/app/public/'.$master_data->packing->where('tipe','FOLDING')->first()->file5);
          $master_data->packing->where('tipe','FOLDING')->first()->file6==null?:$file6=storage_path('/app/public/'.$master_data->packing->where('tipe','FOLDING')->first()->file6);
          $master_data->packing->where('tipe','FOLDING')->first()->file_guide_original==null?:$folding_guide_original=$master_data->packing->where('tipe','FOLDING')->first()->file_guide_original;
          $master_data->packing->where('tipe','FOLDING')->first()->note_detail==null?:$note_detail=$master_data->packing->where('tipe','FOLDING')->first()->note_detail;
          $master_data->packing->where('tipe','FOLDING')->first()->note_attention==null?:$note_attention=$master_data->packing->where('tipe','FOLDING')->first()->note_attention;
        }
        @endphp
        @if($file1 != null || $file2 != null || $file3 != null || $file4 != null || $file5 != null || $file6 != null 
            || $note_detail != null || $note_attention != null)
        <div class="container" style="padding-bottom:10px;padding-top:5px;font-weight:bold;">
          Folding
        </div>
        @if($file1 != null || $file2 != null || $file3 != null)
        <div class="tables" style="padding-left:5px;padding-bottom:5px;padding-top:5px;">
          <div class="tables-row">
            @if($file1 != null)
            <div class="tables-cell">
              <img src="{{$file1}}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($file2 != null)
            <div class="tables-cell">
              <img src="{{$file2}}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($file3 != null)
            <div class="tables-cell">
              <img src="{{$file3}}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
          </div>
        </div>
        @endif
        @if($file4 != null || $file5!= null || $file6 != null)
        <div class="tables"  style="padding-left:5px;">
          <div class="tables-row">
            @if($file4 != null)
            <div class="tables-cell">
              <img src="{{$file4}}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($file5 != null)
            <div class="tables-cell">
              <img src="{{$file5}}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($file6 != null)
            <div class="tables-cell">
              <img src="{{$file6}}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
          </div>
        </div>
        @endif

        @if($note_detail != null || $note_attention != null)
        <div class="tables" style="padding-top:10px;">
          <div class="tables-row">
            <div class="tables-cell">
              <textarea style="width:auto;height:200px;border: 1px solid black;text-align:left;">
                {{$note_detail}}
              </textarea>
            </div>
            <div class="tables-cell">
              <textarea style="width:auto;height:200px;border: 1px solid black;text-align:left;">
                {{$note_attention}}
              </textarea>
            </div>
          </div>
        </div>
        @endif
        @endif

        @php
          $file1="";
          $file2="";
          $file3="";
          $file4="";
          $file5="";
          $file6="";
          $note_detail="";
          $note_attention="";
          $packing_guide_original="";
          if ($packing != 0) {
            $master_data->packing->where('tipe','PACKING')->first()->file1==null?:$file1=storage_path('/app/public/'.$master_data->packing->where('tipe','PACKING')->first()->file1);
            $master_data->packing->where('tipe','PACKING')->first()->file2==null?:$file2=storage_path('/app/public/'.$master_data->packing->where('tipe','PACKING')->first()->file2);
            $master_data->packing->where('tipe','PACKING')->first()->file3==null?:$file3=storage_path('/app/public/'.$master_data->packing->where('tipe','PACKING')->first()->file3);
            $master_data->packing->where('tipe','PACKING')->first()->file4==null?:$file4=storage_path('/app/public/'.$master_data->packing->where('tipe','PACKING')->first()->file4);
            $master_data->packing->where('tipe','PACKING')->first()->file5==null?:$file5=storage_path('/app/public/'.$master_data->packing->where('tipe','PACKING')->first()->file5);
            $master_data->packing->where('tipe','PACKING')->first()->file6==null?:$file6=storage_path('/app/public/'.$master_data->packing->where('tipe','PACKING')->first()->file6);
            $master_data->packing->where('tipe','PACKING')->first()->note_detail==null?:$note_detail=$master_data->packing->where('tipe','PACKING')->first()->note_detail;
            $master_data->packing->where('tipe','PACKING')->first()->note_attention==null?:$note_attention=$master_data->packing->where('tipe','PACKING')->first()->note_attention;
            $master_data->packing->where('tipe','PACKING')->first()->file_guide_original==null?:$packing_guide_original=$master_data->packing->where('tipe','PACKING')->first()->file_guide_original;

          }
        @endphp
        @if($file1 != null || $file2 != null || $file3 != null || $file4 != null || $file5 != null || $file6 != null 
            || $note_detail != null || $note_attention != null)
        <div class="container" style="padding-bottom:10px;padding-top:5px;font-weight:bold;">
          Packing
        </div>
        @if($file1 != null || $file2 != null || $file3 != null)
        <div class="tables" style="padding-left:5px;padding-bottom:5px;padding-top:5px;">
          <div class="tables-row">
            @if($file1 != null)
            <div class="tables-cell">
              <img src="{{$file1}}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($file2 != null)
            <div class="tables-cell">
              <img src="{{$file2}}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($file3 != null)
            <div class="tables-cell">
              <img src="{{$file3}}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
          </div>
        </div>
        @endif
        @if($file4 != null || $file5!= null || $file6 != null)
        <div class="tables"  style="padding-left:5px;">
          <div class="tables-row">
            @if($file4 != null)
            <div class="tables-cell">
              <img src="{{$file4}}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($file5 != null)
            <div class="tables-cell">
              <img src="{{$file5}}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($file6 != null)
            <div class="tables-cell">
              <img src="{{$file6}}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
          </div>
        </div>
        @endif
        @if($note_detail != null || $note_attention != null)
        <div class="tables" style="padding-top:10px;">
          <div class="tables-row">
            <div class="tables-cell">
              <textarea style="width:auto;height:200px;border: 1px solid black;text-align:left;">
                {{$note_detail}}
              </textarea>
            </div>
            <div class="tables-cell">
              <textarea style="width:auto;height:200px;border: 1px solid black;text-align:left;">
                {{$note_attention}}
              </textarea>
            </div>
          </div>
        </div>
        @endif
        @endif

        @php
          $file1="";
          $file2="";
          $file3="";
          $file4="";
          $file5="";
          $file6="";
          $note_detail="";
          $note_attention="";
          $info_guide_original="";
          if ($info != null) {
            $master_data->packing->where('tipe','INFO')->first()->file1==null?:$file1=storage_path('/app/public/'.$master_data->packing->where('tipe','INFO')->first()->file1);
            $master_data->packing->where('tipe','INFO')->first()->file2==null?:$file2=storage_path('/app/public/'.$master_data->packing->where('tipe','INFO')->first()->file2);
            $master_data->packing->where('tipe','INFO')->first()->file3==null?:$file3=storage_path('/app/public/'.$master_data->packing->where('tipe','INFO')->first()->file3);
            $master_data->packing->where('tipe','INFO')->first()->file4==null?:$file4=storage_path('/app/public/'.$master_data->packing->where('tipe','INFO')->first()->file4);
            $master_data->packing->where('tipe','INFO')->first()->file5==null?:$file5=storage_path('/app/public/'.$master_data->packing->where('tipe','INFO')->first()->file5);
            $master_data->packing->where('tipe','INFO')->first()->file6==null?:$file6=storage_path('/app/public/'.$master_data->packing->where('tipe','INFO')->first()->file6);
            $master_data->packing->where('tipe','INFO')->first()->note_detail==null?:$note_detail=$master_data->packing->where('tipe','INFO')->first()->note_detail;
            $master_data->packing->where('tipe','INFO')->first()->note_attention==null?:$note_attention=$master_data->packing->where('tipe','INFO')->first()->note_attention;
            $master_data->packing->where('tipe','INFO')->first()->file_guide_original==null?:$info_guide_original=$master_data->packing->where('tipe','INFO')->first()->file_guide_original;
          }
        @endphp
        @if($file1 != null || $file2 != null || $file3 != null || $file4 != null || $file5 != null || $file6 != null 
            || $note_detail != null || $note_attention != null)
        <div class="container" style="padding-bottom:10px;padding-top:5px;font-weight:bold;">
          More Information
        </div>
        @if($file1 != null || $file2 != null || $file3 != null)
        <div class="tables" style="padding-left:5px;padding-bottom:5px;padding-top:5px;">
          <div class="tables-row">
            @if($file1 != null)
            <div class="tables-cell">
              <img src="{{$file1}}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($file2 != null)
            <div class="tables-cell">
              <img src="{{$file2}}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($file3 != null)
            <div class="tables-cell">
              <img src="{{$file3}}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
          </div>
        </div>
        @endif
        @if($file4 != null || $file5!= null || $file6 != null)
        <div class="tables"  style="padding-left:5px;">
          <div class="tables-row">
            @if($file4 != null)
            <div class="tables-cell">
              <img src="{{$file4}}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($file5 != null)
            <div class="tables-cell">
              <img src="{{$file5}}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
            @if($file6 != null)
            <div class="tables-cell">
              <img src="{{$file6}}" style="max-width:270;max-height:270px;">
            </div>
            @else
            <font style="color:white;">a</font>
            @endif
          </div>
        </div>
        @endif
        @if($note_detail != null || $note_attention != null)
        <div class="tables" style="padding-top:10px;">
          <div class="tables-row">
            <div class="tables-cell">
              <textarea style="width:auto;height:200px;border: 1px solid black;text-align:left;">
                {{$note_detail}}
              </textarea>
            </div>
          </div>
        </div>
        @endif
        @endif
    </body>
</html>