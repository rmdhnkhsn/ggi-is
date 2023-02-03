@if($row['trimcard'] === null)
    @if (auth()->user()->role == 'MD_USER'|| auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'SYS_ADMIN')
        <button type="button" class="btn btn-upload1 btn-sm container-issue" data-toggle="modal" data-target="#modalPDTRIMCARD-{{$row->id}}" title="Upload Trimcard">
            <i class="fas fa-upload"></i>
        </button>
        <!-- Modal -->
        <div class="modal fade" id="modalPDTRIMCARD-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="modalPDTRIMCARDLabel-{{$row->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('qrcode.updateTrimcard1', ['qrcode' => $row->id]) }}" class="modal-content" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalPDTRIMCARDLabel-{{$row->id}}">Upload Document TRIMCARD</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-10 mr-auto ml-auto">
                        <div class="input-file-container">
                            <h5 class="nama">Trimcard</h5>
                            <div class="custom-file mb-2" style="box-sizing:border-box;">
                                <input type="file" accept=".pdf" class="custom-file-input" id="trimcard" name="trimcard" value="{{$row->trimcard}}">
                                <label class="custom-file-qr" for="customFile">Choose file</label>
                            </div>
                        </div>	 
                        </div>
                    </div>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    @else
        <button type="button" class="btn btn-upload1 btn-sm container-issue" data-toggle="modal" data-target="#modalPDTRIMCARD-{{$row->id}}" title="Upload Trimcard">
            <i class="fas fa-upload"></i>
        </button>
    @endif
@else
    <!-- <a href="{{route('qrcode.show_trimcard', ['id'=>$row['id']])}}" class="edit btn btn-eye btn-sm" title="Show Trimcard">
        <i class="fas fa-eye"></i>
    </a> -->
    @if (auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'SYS_ADMIN')
        <button type="button" class="btn btn-upload2 btn-sm container-issue" data-toggle="modal" data-target="#modal_trimcard-{{$row->id}}" title="Edit Trimcard">
        <i class="fas fa-file-import"></i>
        </button>
        <!-- Modal -->
        <div class="modal fade" id="modal_trimcard-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_trimcardLabel-{{$row->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('qrcode.updateTrimcard', ['qrcode' => $row->id]) }}" class="modal-content" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_trimcardLabel-{{$row->id}}">Edit Document TRIMCARD</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row mt-3 mb-3">
                            <div class="col-lg-10 mr-auto ml-auto">
                            <div class="input-file-container">
                                <h5 class="nama">Trimcard</h5>
                                <div class="custom-file mb-2" style="box-sizing:border-box;">
                                    <input type="file" accept=".pdf" class="custom-file-input" id="trimcard" name="trimcard" value="{{$row->trimcard}}">
                                    <label class="custom-file-qr" for="customFile">{{ \Str::afterLast($row->trimcard, '/') }}</label>
                                </div>
                            </div>	 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-11 mr-auto ml-auto">
                                <h5 class="nama">Remark :</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 ml-auto mr-auto mb-3">
                                <div class="input-group">
                                    <textarea class="form-control" name="remark_trimcard" id="Remark"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        @else
        <button type="button" class="btn btn-upload2 btn-sm container-issue" data-toggle="modal" data-target="#modal_trimcard-{{$row->id}}" title="Edit Trimcard">
        <i class="fas fa-file-import"></i>
        </button>
    @endif
@endif

<script>
        document.querySelector("html").classList.add('js');

    var fileInput  = document.querySelector( ".input-file-trimcard" ),  
        button     = document.querySelector( ".input-file-trigger-trimcard" ),
        the_return12 = document.querySelector(".file-return-trimcard");
        
    button.addEventListener( "keydown", function( event ) {  
        if ( event.keyCode == 13 || event.keyCode == 32 ) {  
            fileInput.focus();  
        }  
    });
    button.addEventListener( "click", function( event ) {
    fileInput.focus();
    return false;
    });  
    fileInput.addEventListener( "change", function( event ) {  
        the_return12.innerHTML = this.value;  
    });  
</script>
<!-- End File SMV-->

<!-- File SMV 1-->
<script>
        document.querySelector("html").classList.add('js');

    var fileInput1  = document.querySelector( ".input-file-trimcard1" ),  
        button1     = document.querySelector( ".input-file-trigger-trimcard1" ),
        the_return16 = document.querySelector(".file-return-trimcard1");
        
    button1.addEventListener( "keydown", function( event ) {  
        if ( event.keyCode == 13 || event.keyCode == 32 ) {  
            fileInput1.focus();  
        }  
    });
    button1.addEventListener( "click", function( event ) {
    fileInput1.focus();
    return false;
    });  
    fileInput1.addEventListener( "change", function( event ) {  
        the_return16.innerHTML = this.value;  
    });  
</script>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-qr").addClass("selected").html(fileName);
});
</script>