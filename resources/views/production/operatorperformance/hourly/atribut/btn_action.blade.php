<div class="fa-container-action flex">
    <a class="btn btn-simple-edit justify-center mr-1" data-toggle="modal" data-target="#edit_detail-{{$row['id']}}"><i class="fas fa-pencil-alt"></i></a>
    <a class="btn btn-simple-delete justify-center" href="{{route('kode_kerja_karyawan.delete', $row['id'])}}"><i class="fas fa-trash"></i></a>
</div>
@include('production.cutting.product_costing.hrd.kode_kerja_karyawan.partials.modal-detail')