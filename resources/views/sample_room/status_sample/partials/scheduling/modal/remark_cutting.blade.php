<form action="{{route ('sample-updateRemarkCutting',$value['id']) }}" method="post" enctype="multipart/form-data">
@csrf
   <div class="modal fade" id="remark_cutting{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:550px">
            <div class="modal-content" style="border-radius:10px">
                <div class="row px-4">
                    <div class="col-12 pt-2 justify-sb">
                        <div class="title-20">Add Remark Cutting</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="row px-4">
                    <div class="col-12 pt-1">
                        <span class="title-sm">Actual Date</span>
                       <div class="input-group mb-1 mt-2">
                            <div class="input-group date">
                                <div class="input-group-append">
                                    <div class="custom-calendar py-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span></div>
                                </div>
                                <input type="date" class="form-control border-input" name="actual_date_cutting" placeholder="Select date..."/>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 pt-1">
                        <span class="title-sm">Remark</span>
                        <div class="message mt-1">
                            <textarea placeholder="Write Something (Optional)." name="remark_cutting" id="remark_cutting"></textarea>
                            <i class="icon-comment far fa-comment-dots"></i>
                        </div>
                    </div>
                    <div class="col-12 pb-4 mt-2">
                        <input type="hidden" id="id" name="id" value="{{ $value['id'] }}">
                        <button type="submit" class="btn-blue">Assign</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
