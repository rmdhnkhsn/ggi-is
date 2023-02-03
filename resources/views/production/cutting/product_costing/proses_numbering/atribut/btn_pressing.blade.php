<?php 
$user = collect($value->proses_pressing_user)->count('nik');
?>
@if($user == 0)
<div class="container-tbl-btn justify-start">
    <a href="{{route('proses_pressing.next', $value->id)}}" class="btn-icon-green mr-2"><i class="fs-20 fas fa-sort-amount-down"></i></a>
    <a href="{{ route('proses_pressing.mulai', $value->id)}}" class="btn-blue">Start<i class="ml-2 fs-20 fas fa-arrow-right"></i></a>
</div>
@else
<!-- <a href="{{route('proses_pressing.next', $value->id)}}">skip</a> -->
<div class="container-tbl-btn justify-start">
    <a data-toggle="modal" data-target="#finishPressing-{{$value->id}}" class="btn-green">Finish<i class="ml-2 fs-20 fas fa-check"></i></a>
    @include('production.cutting.product_costing.proses_numbering.partials.form-modal')
</div>
@endif