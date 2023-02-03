<!-- Modal -->
<div class="modal fade" id="note" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="max-width:600px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <span class="title-18">Leave Note</span>
                    </div>
                </div>
                <br>
                <!-- Report Biasa  -->
                <form action="{{route('fir.note')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{$data->fir->id}}">
                    <div class="col-lg-12">
                        <textarea name="note" id="note" class="col-12">{{$data->fir->note}}</textarea>
                    </div>
                    <div class="col-lg-12 justify-end" style="padding-top:15px;">
                        <button type="submit" class="btn btn-blue">Submit<i class="ml-3 fas fa-download"></i></button>
                    </div>
                </div>
            </form> 
        </div>
    </div>
</div>  
