@if($value->gelaran_wo != null)
<div class="row mt-2">
    <div class="col-12">
        <table class="table table-not-striped table-bordered">
            <thead>
                <tr>
                    <th width="35%">List WO</th>
                    <th width="30%">Color</th>
                    <th width="35%">Total Qty</th>
                </tr>
            </thead>
            <tbody>
                @foreach($value->gelar_qty_breakdown as $key2 => $value2)
                <?php 
                $totalqty = $value2->qty1 + $value2->qty2 + $value2->qty3 + $value2->qty4 + $value2->qty5 + 
                            $value2->qty6 + $value2->qty7 + $value2->qty8 + $value2->qty9 + $value2->qty10 +
                            $value2->qty11 +  $value2->qty12 + $value2->qty13 + $value2->qty14 + $value2->qty15; 
                ?>
                <tr>
                    <td>{{$value2->no_wo}}</td>
                    <td>{{$value2->color}}</td>
                    <td>{{$totalqty}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>  
</div>
@endif