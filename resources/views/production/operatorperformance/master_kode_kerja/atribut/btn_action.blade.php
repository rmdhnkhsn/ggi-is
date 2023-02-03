<div class="fa-container-action flex">
    <button data-toggle="modal" data-target="#details-{{$row['id']}}"  class="btn btn-simple-info justify-center"><i class="fas fa-info"></i></button>
    <button data-toggle="modal" data-target="#edit_detail-{{$row['id']}}" class="btn btn-simple-edit justify-center mx-1"><i class="fas fa-pencil-alt"></i></button>
    <a href="{{route('master_kode_kerja.delete', $row['id'])}}" class="btn btn-simple-delete justify-center"><i class="fas fa-trash"></i></a>
    @include('production.cutting.product_costing.hrd.master_kode_kerja.partials.modal-detail')
</div>
