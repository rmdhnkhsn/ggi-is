<?php 
$user = collect($value->proses_numbering_user)->count('nik');
?>
@if($user == 0)
<div class="container-tbl-btn justify-start">
    <a href="{{ route('proses_numbering.mulai', $value->id)}}" class="btn-blue">Start<i class="ml-2 fs-20 fas fa-arrow-right"></i></a>
</div>
@else
<div class="container-tbl-btn justify-start">
    <a data-toggle="modal" data-target="#finishNumbering-{{$value->id}}" class="btn-green">Finish<i class="ml-2 fs-20 fas fa-check"></i></a>
    @include('production.cutting.product_costing.proses_numbering.partials.form-modal')
</div>
@endif