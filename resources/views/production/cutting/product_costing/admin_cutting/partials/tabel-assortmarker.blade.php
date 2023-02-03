<div class="row mt-2">
    <div class="col-12">
        <?php 
        $assort = collect($value->assortmarker)->count('id');
        ?>
        @if($assort != 0)
        <?php
            $size = collect($value->assortmarker)->count('size');
        ?>
        <table class="table table-not-striped table-bordered">
            <thead>
                <tr>
                    <th colspan="{{$size}}">Assortmarker</th>
                    <th width="20%" rowspan="2"><div class="pd-tbl-20">Total Ratio</div></th>
                </tr>
                <tr>
                    @foreach($value->assortmarker as $key2 => $value2)
                    <th class="bg-striped" width="15%">{{$value2->size}}</th>
                    @endforeach
                </tr>
                <tr>
                    @foreach($value->assortmarker as $key => $value2)
                    <td>{{$value2->qty}}</td>
                    @endforeach
                    <td>{{$value->total_ratio}}</td>
                </tr>
                
            </thead>
        </table>
        @endif
    </div>  
</div>