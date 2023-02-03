@if($row['smv'] === null)
    <button type="button" class="btn btn-upload1" data-toggle="modal" data-target="#modalPDFSMV-{{$row->id}}" title="Upload SMV">
        <i class="fas fa-upload"></i>
    </button>
    <!-- Modal -->
    <div class="modal fade" id="modalPDFSMV-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="modalPDFSMVLabel-{{$row->id}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('qrcode.updateSmv1', ['qrcode' => $row->id]) }}" class="modal-content" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPDFSMVLabel-{{$row->id}}">Upload Document SMV / AP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-lg-10 mr-auto ml-auto">
                      <div class="input-file-container">
                        <h5 class="nama">SMV / AP</h5>
                        <div class="custom-file mb-2" style="box-sizing:border-box;">
                            <input type="file" class="custom-file-input" id="smv" name="smv" value="{{$row->smv}}">
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
    <!-- <a href="{{route('qrcode.show_smv', ['id'=>$row['id']])}}" class="edit btn btn-eye btn-sm" title="Show SMV">
        <i class="fas fa-eye"></i>
    </a> -->
    <button type="button" class="btn btn-upload2" data-toggle="modal" data-target="#modalsama-{{$row->id}}" title="Edit SMV">
        <i class="fas fa-file-import"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modalsama-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="modalsamaLabel-{{$row->id}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('qrcode.updateSmv', ['qrcode' => $row->id]) }}" class="modal-content" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalsamaLabel-{{$row->id}}">Edit Document SMV / AP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mt-3 mb-3">
                        <div class="col-lg-10 mr-auto ml-auto">
                        <div class="input-file-container">
                            <h5 class="nama">SMV / AP</h5>
                            <div class="custom-file mb-2" style="box-sizing:border-box;">
                                <input type="file" class="custom-file-input" id="smv" name="smv" value="{{$row->smv}}">
                                <label class="custom-file-qr" for="customFile">{{ \Str::afterLast($row->smv, '/') }}</label>
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
                                <textarea class="form-control" name="remark_smv" id="Remark"></textarea>
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
@endif

<!-- File SMV-->
<script>
    document.querySelector("html").classList.add('js');

    window.addEventListener('load', function() {
        var fileInput   = document.querySelector(".input-file-smv-{{$row->id}}" ),
        button      = document.querySelector(".input-file-trigger-smv-{{$row->id}}" ),
        the_return1 = document.querySelector("p.file-return-smv-{{$row->id}}");

        button.addEventListener("keydown", function( event ) {
            console.log('{{$row->id}}');
            if ( event.keyCode == 13 || event.keyCode == 32 ) {
                fileInput.focus();
            }
        });
        button.addEventListener("click", function( event ) {
            console.log('{{$row->id}}');
            fileInput.focus();
            return false;
        });

        fileInput.addEventListener("change", function( event ) {
            console.log('{{$row->id}}');
            the_return1.innerHTML = event.target.value;
        });
    })
</script>
<!-- End File SMV-->

<!-- File SMV 1-->
{{-- <script>
        document.querySelector("html").classList.add('js');

    var fileInput1  = document.querySelector( ".input-file-smv1" ),
        button1     = document.querySelector( ".input-file-trigger-smv1" ),
        the_return99 = document.querySelector(".file-return-smv1");

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
        the_return99.innerHTML = this.value;
    });
</script> --}}
<!-- End File SMV 1-->

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-qr").addClass("selected").html(fileName);
});
</script>