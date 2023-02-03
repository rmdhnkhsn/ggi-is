<!-- Modal Input Size -->
<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Create Size</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form action="{{ route('size.store', $detail->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('marketing.rekaporder.breakdown.partials.size.form-control', ['submit' => 'Create'])
        </form>
        </div>
    </div>
    </div>
</div>
<!-- End Modal Input Size -->
<!-- Modal Edit Size -->
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Size</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <form action="{{ route('size.update', $detail->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('marketing.rekaporder.breakdown.partials.size.form-edit', ['submit' => 'Save'])
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit Size  -->
<!-- Modal Edit Data -->
<div class="modal fade" id="modal-editData">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <form action="{{ route('breakdown.update', $detail->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('marketing.rekaporder.breakdown.partials.form-editData', ['submit' => 'Save'])
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit Data  -->
<!-- Modal Add Data -->
<div class="modal fade" id="modal-addNew">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <form action="{{ route('breakdown.add', $detail->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('marketing.rekaporder.breakdown.partials.form-AddData', ['submit' => 'Submit'])
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Add Data  -->
<!-- Modal Total Amount -->
<div class="modal fade" id="modal-totalAmount">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Total Amount</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <form action="{{ route('breakdown.totalAmount', $detail->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('marketing.rekaporder.breakdown.partials.form-totalAmount', ['submit' => 'Submit'])
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Total Amount  -->
<!-- Modal Total Amount -->
<div class="modal fade" id="modal-editAmount">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Total Amount</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <form action="{{ route('breakdown.totalAmount', $detail->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('marketing.rekaporder.breakdown.partials.form-editAmount', ['submit' => 'Submit'])
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Total Amount  -->