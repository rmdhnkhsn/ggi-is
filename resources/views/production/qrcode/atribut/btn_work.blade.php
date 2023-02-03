@if($row['work'] === null)
    @if (auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'SYS_ADMIN')
        <button type="button" class="btn btn-upload1 btn-sm container-issue" data-toggle="modal" data-target="#modalPDFWORK-{{$row->id}}" title="Upload Worksheet">
        <i class="fas fa-upload"></i>
        </button>
        <!-- Modal -->
        <div class="modal fade" id="modalPDFWORK-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="modalPDFWORKLabel-{{$row->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('qrcode.updateWork1', ['qrcode' => $row->id]) }}" class="modal-content" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalPDFWORKLabel-{{$row->id}}">Upload Worksheet</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-10 mr-auto ml-auto">
                        <div class="input-file-container">
                            <h5 class="nama">Worksheet</h5>
                            <div class="custom-file mb-2" style="box-sizing:border-box;">
                                <input type="file" accept=".pdf" class="custom-file-input" id="work" name="work" value="{{$row->work}}">
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
        <button type="button" class="btn btn-upload1 btn-sm container-issue" data-toggle="modal" data-target="#modalPDFWORK-{{$row->id}}" title="Upload Worksheet">
       <i class="fas fa-upload"></i>
        </button>
    @endif
@else
    <!-- <a href="{{route('qrcode.show_work', ['id'=>$row['id']])}}" class="edit btn btn-eye btn-sm" title="Show Worksheet">
        <i class="fas fa-eye"></i>
    </a> -->
    @if (auth()->user()->role == 'MD_USER'|| auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'SYS_ADMIN')
        <button type="button" class="btn btn-upload2 btn-sm container-issue" data-toggle="modal" data-target="#modal_work-{{$row->id}}" title="Edit Worksheet">
            <i class="fas fa-file-import"></i>
        </button>
        <!-- Modal -->
        <div class="modal fade" id="modal_work-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_workLabel-{{$row->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('qrcode.updateWork', ['qrcode' => $row->id]) }}" class="modal-content" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_workLabel-{{$row->id}}">Edit Document Worksheet</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row mt-3 mb-3">
                            <div class="col-lg-10 mr-auto ml-auto">
                            <div class="input-file-container">
                                <h5 class="nama">Worksheet</h5>
                                <div class="custom-file mb-2" style="box-sizing:border-box;">
                                    <input type="file" accept=".pdf" class="custom-file-input" id="work" name="work" value="{{$row->work}}">
                                    <label class="custom-file-qr" for="customFile">{{ \Str::afterLast($row->work, '/') }}</label>
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
                                    <textarea class="form-control" name="remark_work" id="Remark"></textarea>
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
        <button type="button" class="btn btn-upload2 btn-sm container-issue" data-toggle="modal" data-target="#modal_work-{{$row->id}}" title="Edit Worksheet">
            <i class="fas fa-file-import"></i>
        </button>
    @endif
@endif

<script>
        document.querySelector("html").classList.add('js');

    var fileInput  = document.querySelector( ".input-file-work" ),  
        button     = document.querySelector( ".input-file-trigger-work" ),
        the_return3 = document.querySelector(".file-return-work");
        
    button.addEventListener( "keydown", function( event ) {  
        if ( event.keyCode == 13 || event.keyCode == 32 ) {  
            fileInput.focus();  
        }  
    });
    fileInput.addEventListener( "change", function( event ) {  
        the_return3.innerHTML = this.value;  
    });  
    button.addEventListener( "click", function( event ) {
    fileInput.focus();
    return false;
    });
    
     
</script>
<!-- End File SMV-->

<!-- File SMV 1-->
<script>
        document.querySelector("html").classList.add('js');

    var fileInput1  = document.querySelector( ".input-file-work1" ),  
        button1     = document.querySelector( ".input-file-trigger-work1" ),
        the_return5 = document.querySelector(".file-return-work1");
        
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
        the_return5.innerHTML = this.value;  
    });  
</script>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-qr").addClass("selected").html(fileName);
});
</script>