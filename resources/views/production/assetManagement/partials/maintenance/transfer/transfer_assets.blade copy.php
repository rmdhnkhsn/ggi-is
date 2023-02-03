@extends("layouts.blank.app")
@section("title","Transfer Assets")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/dist/css/adminlte.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/singleStyle/maintenance.css')}}">
@endpush

@section("content")
<section class="content index">
    <div class="container-fluid">
        <div class="header">
            <div class="buleud"></div>
            @include("layouts.common.breadcrumb")
        </div>
        <div class="container">
            <div class="contents mx-auto mt-mins">
                <div class="title-30W text-center mb-4">Transfer Assets</div>
                <div class="card p-3">
                    <div class="title-20G">Transfer Information</div>
                    <div class="containers">
                        <div class="widthHalf">
                            <div class="title-sm">Mechanic</div>
                            <div class="input-group mt-1 mb-3">
                                <div class="flex">
                                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user"></i></span>
                                </div>
                                <select class="form-control borderInput select2bs4 pointer" id="" name="" required>
                                    <option selected disabled>Select Mechanic</option>
                                    <option name="Agus">Agus</option>    
                                    <option name="Hendra">Hendra</option>    
                                </select>
                            </div>
                        </div>
                        <div class="widthHalf">
                            <div class="title-sm">Transaction</div>
                            <div class="input-group mt-1 mb-3">
                                <div class="flex">
                                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-random"></i></span>
                                </div>
                                <select class="form-control borderInput select2bs4 pointer" id="" name="" required>
                                    <option selected disabled>Select Transaction</option>
                                    <option name="Cash">Cash</option>    
                                    <option name="Transfer">Transfer</option>    
                                </select>
                            </div>
                        </div>
                        <div class="widthHalf">
                            <div class="title-sm">Date</div>
                            <div class="input-group mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control borderInput" name="" id="">
                            </div>
                        </div>
                        <div class="widthHalf">
                            <div class="title-sm">Destination</div>
                            <div class="input-group mt-1 mb-3">
                                <div class="flex">
                                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-truck"></i></span>
                                </div>
                                <select class="form-control borderInput select2bs4 pointer" id="" name="" required>
                                    <option selected disabled>Select Destination</option>
                                    <option name="Malaysia">Malaysia</option>    
                                    <option name="Timor Leste">Timor Leste</option>    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="title-16G mt-3">Transfer Item</div>
                    <div class="cards p-2">
                        <div class="justify-start2 gap-3">
                            <div class="title-sm">Asset No.</div> <div class="badgeSoftBlue">01</div>
                        </div>
                       <div class="input-group mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:45px"><i class="fs-20 fas fa-th"></i></span>
                            </div>
                            <input type="text" class="form-control borderInput2" name="" id="" placeholder="Input serial number">
                            <div class="input-group-prepend">
                                <button type="button" class="inputGroupBlueRight pointer" data-toggle="modal" data-target="#camera" style="width:45px"><i class="fs-20 fas fa-camera"></i></button>
                            </div>
                        </div>
                        <div class="modal fade" id="camera" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
                                <div class="modal-content p-4" style="border-radius:10px">
                                    <div class="row">
                                        <div class="col-12 justify-sb">
                                            <div class="title-18">Camera</div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                            </button>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <div class="borderlight2"></div>
                                        </div>
                                        <div class="col-12">
                                            <div class="preview"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push("scripts")
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

<script type="text/javascript">
    let scanner = new Instascan.Scanner({ video: document.querySelector('.preview') });
        scanner.addListener('scan', function (content) {
        console.log(content);
    });
        Instascan.Camera.getCameras().then(function (cameras) {
    if (cameras.length > 0) {
        scanner.start(cameras[0]);
    } else {
        console.error('No cameras found.');
    }
    }).catch(function (e) {
        console.error(e);
    });
</script>
<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>

@endpush        