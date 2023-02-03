<?php 
    $form = collect($value2->proses_bundling_user)->count('id');
?>
@if($form == 0)
<div class="container-tbl-btn justify-start">
    <a href="" data-toggle="modal" data-target="#StartNumb{{$value2->id}}" class="btn-blue">Start<i class="ml-2 fs-20 fas fa-arrow-right"></i></a>
    @include('production.cutting.product_costing.proses_numbering.partials.form-start-numbering')
</div>
@else
<div class="container-tbl-btn justify-start" style="gap:.4rem">
    <a href="{{route('proses_bundling.bundling_index', $value2->id)}}" class="btn-blue"><i class="fs-20 fas fa-info"></i></a></a>
    <a data-toggle="modal" data-target="#finishBundling-{{$value2->id}}" class="btn-green">Finish<i class="ml-2 fs-20 fas fa-check"></i></a>
    @include('production.cutting.product_costing.proses_numbering.partials.form-modalBundling')
</div>
@endif
