<div class="modal fade" id="modal-addReport">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Report</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('packing.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('qc.reject_garment.packing.partials.form-add', ['submit' => 'Simpan'])
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit Report  -->
<div class="modal fade" id="modal-editReport">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Report</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('packing.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('qc.reject_garment.packing.partials.form-edit', ['submit' => 'Simpan'])
                </form>
            </div>
        </div>
    </div>
</div>