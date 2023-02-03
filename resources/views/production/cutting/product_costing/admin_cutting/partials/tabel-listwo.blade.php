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
                @foreach($value->gelaran_wo as $key2 => $value2)
                <tr>
                    <td>{{$value2->no_wo}}</td>
                    <td>{{$value2->color}}</td>
                    <td>{{$value2->total_qty}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>  
</div>
@endif