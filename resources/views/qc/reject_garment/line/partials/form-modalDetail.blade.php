<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Tambah Detail</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form action="{{route('detail.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('qc.reject_garment.line.partials.form-addDetail', ['submit' => 'Simpan'])
        </form>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.content -->