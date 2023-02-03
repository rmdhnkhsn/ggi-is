<button type="button" class="btn-upload-smv modalRevisi{{$row['id']}}" data-toggle="modal" data-target="#modalRevisi{{$row['id']}}"></button>

<div class="modal fade" id="modalRevisi{{$row['id']}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:630px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form action="{{ route('worksheet.comment_store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-24-dark">Information for Revision</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mt-2 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">User</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user"></i></span>
                            </div>
                            <input type="hidden" class="form-control borderInput" id="master_id" name="master_id" value="{{$row['id']}}" placeholder="User...">
                            <input type="hidden" class="form-control borderInput" id="user_nik" name="user_nik" value="{{auth()->user()->nik}}" placeholder="User...">
                            <input type="text" class="form-control borderInput" id="user_name" name="user_name" value="{{auth()->user()->nama}}" placeholder="User...">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Entered On</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control borderInput" id="entered_on" name="entered_on">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Revision For</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-network-wired"></i></span>
                            </div>
                            <select class="form-control borderInput select2bs4{{$row['id']}} pointer" id="revision_for" name="revision_for">
                                <option selected disabled>Select part</option>
                                <option name="General Identity">General Identity</option>    
                                <option name="Qty Breakdown">Qty Breakdown</option>    
                                <option name="Material Fabril">Material Fabril</option>    
                                <option name="Material Sewing">Material Sewing</option>    
                                <option name="Measurement">Measurement</option>    
                                <option name="Packing">Packing</option>    
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Description</div>
                        <textarea class="form-control borderInput mt-1 mb-3 py-2" name="description" id="description" placeholder="Enter description..."></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn-blue-md btn-block">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // $(document).ready(function(){
    // const options = document.getElementsByClassName('select2-selection--single');
    // Array.from(options).forEach(function (element) {
    //     element.style = "height : 38px !important";
    //     console.log(element);
    //   });
	// });
</script>