<?php 
$assort = collect($form->assortmarker)->count('id')
?>
@if($assort != 0)
<div class="col-12 mt-mins">
    <div class="cards px-4 pt-4">
        <div class="row mb-3">
            <div class="col-12">
                <span class="title-18 ml-min7">Breakdown Qty</span>
            </div>
        </div>
        <div class="row">
            <div class="cards-scroll scrollX" id="scroll-bar">
                <table id="table_gelar" class="table gelar-tbl-content2 table-bordered no-wrap">
                    <?php
                    $col = collect($form->assortmarker)->count('id');
                    ?>
                    <thead>
                        <tr>
                            <th rowspan="2"><div class="w100 pd-tbl-20">WO</div></th> 
                            <th rowspan="2"><div class="w100 pd-tbl-20">Color</div></th>
                            <th colspan="{{$col}}">Size</th>
                        </tr>
                        <tr>
                            @foreach($form->assortmarker as $key => $value)
                            <th>{{$value->size}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($qty as $key =>$value)
                        <tr>
                            <td rowspan="{{count($value)+1}}">{{$key}}</td>
                        </tr>
                        @foreach($value as $key2 => $value2)
                        <?php 
                            $assort = collect($form->assortmarker)->count('id');
                            $qty1="";
                            $qty2="";
                            $qty3="";
                            $qty4="";
                            $qty5="";
                            $qty6="";
                            $qty7="";
                            $qty8="";
                            $qty9="";
                            $qty10="";
                            $qty11="";
                            $qty12="";
                            $qty13="";
                            $qty14="";
                            $qty15="";
                            if ($assort != 0) {
                                $qty1=collect($form->assortmarker)->where('size', $value2['size1'])->first();
                                $qty2=collect($form->assortmarker)->where('size', $value2['size2'])->first();
                                $qty3=collect($form->assortmarker)->where('size', $value2['size3'])->first();
                                $qty4=collect($form->assortmarker)->where('size', $value2['size4'])->first();
                                $qty5=collect($form->assortmarker)->where('size', $value2['size5'])->first();
                                $qty6=collect($form->assortmarker)->where('size', $value2['size6'])->first();
                                $qty7=collect($form->assortmarker)->where('size', $value2['size7'])->first();
                                $qty8=collect($form->assortmarker)->where('size', $value2['size8'])->first();
                                $qty9=collect($form->assortmarker)->where('size', $value2['size9'])->first();
                                $qty10=collect($form->assortmarker)->where('size', $value2['size10'])->first();
                                $qty11=collect($form->assortmarker)->where('size', $value2['size11'])->first();
                                $qty12=collect($form->assortmarker)->where('size', $value2['size12'])->first();
                                $qty13=collect($form->assortmarker)->where('size', $value2['size13'])->first();
                                $qty14=collect($form->assortmarker)->where('size', $value2['size14'])->first();
                                $qty15=collect($form->assortmarker)->where('size', $value2['size15'])->first();
                            }
                        ?>
                        <tr>
                            <td>{{$value2['color']}}</td>
                            @foreach($form->assortmarker as $key3 => $value3)
                            @if($value3->size == $value2['size1'] || $value3->size == $value2['size2'] || $value3->size == $value2['size3'] || $value3->size == $value2['size4'] || $value3->size == $value2['size5']
                                || $value3->size == $value2['size6'] || $value3->size == $value2['size7'] || $value3->size == $value2['size8'] || $value3->size == $value2['size9'] || $value3->size == $value2['size10']
                                || $value3->size == $value2['size11'] || $value3->size == $value2['size12'] || $value3->size == $value2['size13'] || $value3->size == $value2['size14'] || $value3->size == $value2['size15'])
                            <td>{{$value2['qty_gelar'] * $value3->qty}}</td>
                            @else
                            <td></td>
                            @endif
                            @endforeach
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif
