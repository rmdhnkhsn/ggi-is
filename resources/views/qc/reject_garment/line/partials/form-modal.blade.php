<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Tambah</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('report.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('qc.reject_garment.line.partials.form-add', ['submit' => 'Simpan'])
            </form>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <form action="{{ route('report.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('qc.reject_garment.line.partials.form-edit', ['submit' => 'Simpan'])
                </form>
            </div>
        </div>
    </div>
</div>

<!-- /.modal breakdown-->
<div class="modal fade" id="modal-breakdown">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
            <form action="{{ route('reject_detail.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('qc.reject_garment.line.partials.form-breakdown', ['submit' => 'Simpan'])
            </form>
            </div>
        </div>
    </div>
</div>

<!-- /.modal showdetail-->
<div class="modal fade" id="modal-showDetail">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                @include('qc.reject_garment.line.partials.form-showDetail')
            </div>
        </div>
    </div>
</div>

<!-- /.modal edit detail-->
<div class="modal fade" id="modal-editDetail">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
            <form action="{{ route('reject_detail.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('qc.reject_garment.line.partials.form-editDetail', ['submit' => 'Simpan'])
            </form>
            </div>
        </div>
    </div>
</div>