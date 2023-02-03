<!-- Modal Input Size -->
<div class="modal fade" id="modal-size">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Create Size</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form action="{{ route('size.store', $rekap->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('marketing.rekaporder.detail.partials.size.form-control', ['submit' => 'Create'])
        </form>
        </div>
    </div>
    </div>
</div>
<!-- End Modal Input Size -->
<!-- Modal Edit Size -->
<div class="modal fade" id="modal-editSize">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Size</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <form action="{{ route('size.update', $rekap->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('marketing.rekaporder.detail.partials.size.form-edit', ['submit' => 'Save'])
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit Size  -->