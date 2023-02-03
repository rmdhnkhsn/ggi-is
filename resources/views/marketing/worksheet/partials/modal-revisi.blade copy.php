<button type="button" class="btn-upload-smv modalRevisi{{$row['id']}}" data-toggle="modal" data-target="#modalRevisi"></button>

<div class="modal fade" id="modalRevisi" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:630px">
        <div class="modal-content p-4" style="border-radius:10px">
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
                        <input type="text" class="form-control borderInput" id="" name="" placeholder="User...">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Entered On</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control borderInput" id="" name="">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Revision For</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-network-wired"></i></span>
                        </div>
                        <select class="form-control borderInput select2bs4 pointer" id="" name="">
                            <option selected disabled>Select part</option>
                            <option name="123456">123456</option>    
                            <option name="789785">789785</option>    
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Description</div>
                    <textarea class="form-control borderInput mt-1 mb-3 py-2" name="" id="" placeholder="Enter description..."></textarea>
                </div>
                <div class="col-12">
                    <a href="" class="btn-blue-md btn-block">Save</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    $(document).ready(function(){
    const options = document.getElementsByClassName('select2-selection--single');
    Array.from(options).forEach(function (element) {
        element.style = "height : 38px !important";
        console.log(element);
      });
	});
</script>