<div class="modal fade" id="filter" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <form  action="{{route('filter-approval-acc')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content p-4" style="border-radius:10px">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-18">Filter Data</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight2"></div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Range Date</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control borderInput" id="dateRange" name="daterange" value="" placeholder="Input Date" />
                        </div>
                    </div>
                    <!-- <div class="col-12">
                        <div class="title-sm">Defrositing Type</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-subscript"></i></span>
                            </div>
                            <select class="form-control borderInput select2bs4 pointer" id="" name="">
                                <option selected disabled>Select type</option>
                                <option name="Type 1">Type 1</option>    
                                <option name="Type 2">Type 2</option>    
                            </select>
                        </div>
                    </div> -->
                    <div class="col-12">
                        <div class="title-sm">NIK</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down"></i></span>
                            </div>
                            <input type="text" class="form-control borderInput" id="" name="nik" value="" placeholder="Masukkan nik" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Nama</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control borderInput" id="" name="nama" value="" placeholder="Masukkan nama" />
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn-blue-md btn-block">Filter <i class="fs-18 ml-3 fas fa-filter"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>