@if($row['techspech'] === null)
    @if (auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'SYS_ADMIN')
        <button type="button" class="btn btn-upload1 btn-sm container-issue" data-toggle="modal" data-target="#modalPDFTECHSPECH-{{$row->id}}" title="Upload Techpack">
            <i class="fas fa-upload"></i>
        </button>
        <!-- Modal -->
        <div class="modal fade" id="modalPDFTECHSPECH-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="modalPDFTECHSPECHLabel-{{$row->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('qrcode.updateTechspech1', ['qrcode' => $row->id]) }}" class="modal-content" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalPDFTECHSPECHLabel-{{$row->id}}">Upload Document Techpack</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-10 mr-auto ml-auto">
                        <div class="input-file-container">
                            <h5 class="nama">Techpack</h5>
                            <div class="custom-file mb-2" style="box-sizing:border-box;">
                                <input type="file" accept=".pdf" class="custom-file-input" id="techspech" name="techspech" value="{{$row->techspech}}">
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
        <button type="button" class="btn btn-upload1 btn-sm container-issue" data-toggle="modal" data-target="#modalPDFTECHSPECH-{{$row->id}}" title="Upload Techpack">
            <i class="fas fa-upload"></i>
        </button>
    @endif
@else
    <!-- <a href="{{route('qrcode.show_techspech', ['id'=>$row['id']])}}" class="edit btn btn-eye btn-sm" title="Show pdf svm">
        <i class="fas fa-eye"></i>
    </a> -->

    @if (auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'SYS_ADMIN') 
        <button type="button" class="btn btn-upload2 btn-sm container-issue" data-toggle="modal" data-target="#modal_techspech-{{$row->id}}" title="Edit Techpack">
            <i class="fas fa-file-import"></i>
        </button>
        <!-- Modal -->
        <div class="modal fade" id="modal_techspech-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_techspechLabel-{{$row->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('qrcode.updateTechspech', ['qrcode' => $row->id]) }}" class="modal-content" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_techspechLabel-{{$row->id}}">Edit Document Techpack</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row mt-3 mb-3">
                            <div class="col-lg-10 mr-auto ml-auto">
                            <div class="input-file-container">
                                <h5 class="nama">Techpack</h5>
                                <div class="custom-file mb-2" style="box-sizing:border-box;">
                                    <input type="file" accept=".pdf" class="custom-file-input" id="techspech" name="techspech" value="{{$row->techspech}}">
                                    <label class="custom-file-qr" for="customFile">{{ \Str::afterLast($row->techspech, '/') }}</label>
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
                                    <textarea class="form-control" name="remark_techpack" id="Remark"></textarea>
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
        <button type="button" class="btn btn-upload2 btn-sm container-issue" data-toggle="modal" data-target="#modal_techspech-{{$row->id}}" title="Edit Techpack">
            <i class="fas fa-file-import"></i>
        </button>
    @endif
@endif

<!-- File Techpack-->
<script>
        document.querySelector("html").classList.add('js');

    var fileInput  = document.querySelector( ".input-file-techspech" ),  
        button     = document.querySelector( ".input-file-trigger-techspech" ),
        the_return = document.querySelector( ".file-return-techspech" );
        
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
        the_return.innerHTML = this.value;  
    });  
</script>
<!-- End File Techpack-->

<!-- File Techpack 1-->
<script>
        document.querySelector("html").classList.add('js');

    var fileInput1  = document.querySelector( ".input-file-techspech1" ),  
        button1     = document.querySelector( ".input-file-trigger-techspech1" ),
        the_return7 = document.querySelector( ".file-return-techspech1" );
        
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
        the_return7.innerHTML = this.value;  
    });  
</script>
<!-- End File Techpack 1-->

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-qr").addClass("selected").html(fileName);
});
</script>