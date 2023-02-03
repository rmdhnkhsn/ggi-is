<?php
$cek_detail = collect($value->detail)->count('id');
?>
@if($cek_detail == 0)
<td>
    <center>
    <button data-toggle="modal" data-target="#addDetail{{$value->id}}" class="btn btn-primary btn-sm" title="Add Detail"><i class="fas fa-plus"></i></button>
    @include('qc.smqc.accessories.partials.modal-addDetail')
    </center>
</td>
@else
<td>
    <center>
    <button data-toggle="modal" data-target="#DetailReport{{$value->id}}" pic-url="{{asset('storage/smqc/accessories/'.$value->detail->file)}}" id="btnDetailReport{{$value->id}}" url-element="imgDetailReport{{$value->id}}" class="btn btn-info btn-sm submit_btnqq" title="Detail Report"><i class="fas fa-eye"></i></button>
    <!-- <button data-toggle="modal" data-target="#DetailReport{{$value->id}}" pic-url="{{asset('storage/smqc/accessories/'.$value->detail->file)}}" id="btnDetailReport{{$value->id}}" url-element="imgDetailReport{{$value->id}}" class="btn btn-info btn-sm submit_btnqq" title="Detail Report"><i class="fas fa-eye"></i></button> -->
    @include('qc.smqc.accessories.partials.modal-detailReport')
    <button data-toggle="modal" data-target="#EditDetail{{$value->id}}" class="btn btn-warning btn-sm" title="Edit Detail Report"><i class="fas fa-edit"></i></button>
    @include('qc.smqc.accessories.partials.EditdetailReport')
    <a href="{{route('report_aksesoris.detail_delete', $value->detail->id)}}" class="btn btn-danger btn-sm" title="Delete Detail Report" onclick="return confirm('Delete Detail Report ?');"><i class="fas fa-trash"></i></a>
    </center>
</td>
@endif