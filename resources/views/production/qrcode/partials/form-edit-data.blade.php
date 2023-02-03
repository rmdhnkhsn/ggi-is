
<div class="row">
    <div class="col-lg-6">
        <label class="nama" style="font-weight:500">Style</label>
        <div class="field">
            <input type="text" id="style" name="style" value="{{$data->style}}" placeholder="Insert Style" required>
            <i class="icon-form fas fa-list-ul"></i>
        </div>
    </div>
    <div class="col-lg-6">
        <label class="nama" style="font-weight:500">Buyer</label>
        <div class="field">
            <input type="text" id="buyer" name="buyer" value="{{$data->buyer}}" placeholder="Insert Buyer" required>
            <i class="icon-form fas fa-user"></i>
        </div>
    </div>
</div>

<div class="row mb-4">
    @if (auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'SYS_ADMIN')
        <div class="col-lg-2 ml-auto">	
            <h5 class="nama">Techpack</h5>
            <div class="input-file-container">  
                <input class="input-file-techspech" id="techspech" name="techspech" type="file" accept=".pdf">
                <label tabindex="0" class="input-file-trigger-techspech">SELECT OR DRAG FILE</label>
            </div>
            <p class="file-return-techspech">{{\Str::afterLast($data->techspech, '/')}}</p>
        </div>
    @else
            <div class="col-lg-2 ml-auto">	
            <h5 class="nama">Techpack</h5>
            <div class="input-file-container">  
                <input class="input-file-techspech" id="techspech" name="techspech" type="file" accept=".pdf" disabled>
                <label tabindex="0" class="input-file-trigger-techspech">SELECT OR DRAG FILE</label>
            </div>
            <p class="file-return-techspech">{{\Str::afterLast($data->techspech, '/')}}</p>
        </div>
    @endif
    @if (auth()->user()->role == 'SYS_ADMIN' || auth()->user()->nik == '330022')
        <div class="col-lg-2">	
            <h5 class="nama">SMV / AP</h5>
            <div class="input-file-container">  
                <input class="input-file-smv" id="smv" name="smv" type="file" accept=".pdf" >
                <label tabindex="0" class="input-file-trigger-smv">SELECT OR DRAG FILE</label>
            </div>
            <p class="file-return-smv">{{\Str::afterLast($data->smv, '/')}}</p>
        </div>
    @else
    <div class="col-lg-2">	
        <h5 class="nama">SMV / AP</h5>
        <div class="input-file-container">  
            <input class="input-file-smv" id="smv" name="smv" type="file" accept=".pdf" disabled>
            <label tabindex="0" class="input-file-trigger-smv">SELECT OR DRAG FILE</label>
        </div>
        <p class="file-return-smv">{{\Str::afterLast($data->smv, '/')}}</p>
    </div>
    @endif
    @if (auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'SYS_ADMIN')
        <div class="col-lg-2">	
            <h5 class="nama">Worksheet</h5>
            <div class="input-file-container">  
                <input class="input-file-work" id="work" name="work" type="file" accept=".pdf">
                <label tabindex="0" class="input-file-trigger-work">SELECT OR DRAG FILE</label>
            </div>
            <p class="file-return-work">{{\Str::afterLast($data->work, '/')}}</p>
        </div>
    @else
        <div class="col-lg-2">	
            <h5 class="nama">Worksheet</h5>
            <div class="input-file-container">  
                <input class="input-file-work" id="work" name="work" type="file" accept=".pdf" disabled>
                <label tabindex="0" class="input-file-trigger-work">SELECT OR DRAG FILE</label>
            </div>
            <p class="file-return-work">{{\Str::afterLast($data->work, '/')}}</p>
        </div>
    @endif
    @if (auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'SYS_ADMIN')
        <div class="col-lg-2">	
            <h5 class="nama">Trimcard</h5>
            <div class="input-file-container">  
                <input class="input-file-trimcard" id="trimcard" name="trimcard" type="file" accept=".pdf">
                <label tabindex="0" class="input-file-trigger-trimcard">SELECT OR DRAG FILE</label>
            </div>
            <p class="file-return-trimcard">{{\Str::afterLast($data->trimcard, '/')}}</p>
        </div>
    @else
        <div class="col-lg-2">	
            <h5 class="nama">Trimcard</h5>
            
            <div class="input-file-container">  
                <input class="input-file-trimcard" id="trimcard" name="trimcard" type="file" accept=".pdf" disabled>
                <label tabindex="0" class="input-file-trigger-trimcard">SELECT OR DRAG FILE</label>
            </div>
            <p class="file-return-trimcard">{{\Str::afterLast($data->trimcard, '/')}}</p>
        </div>
    @endif
    @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->nik == '250009' || auth()->user()->nik == '320657' || auth()->user()->nik == '220718')
            <div class="col-lg-2 mr-auto">	
                <h5 class="nama">PPM</h5>
                <div class="input-file-container">  
                    <input class="input-file-ppm" id="ppm" name="ppm" type="file" accept=".pdf">
                    <label tabindex="0" class="input-file-trigger-ppm">SELECT OR DRAG FILE</label>
                </div>
                <p class="file-return-ppm">{{\Str::afterLast($data->ppm, '/')}}</p>
            </div>
        @else
            <div class="col-lg-2 mr-auto">	
                <h5 class="nama">PPM</h5>
                <div class="input-file-container">  
                    <input class="input-file-ppm" id="ppm" name="ppm" type="file" accept=".pdf" disabled>
                    <label tabindex="0" class="input-file-trigger-ppm">SELECT OR DRAG FILE</label>
                </div>
                <p class="file-return-ppm">{{\Str::afterLast($data->ppm, '/')}}</p>
            </div>
        @endif
</div>

<div class="row">
    <div class="col-lg-3 mb-4 mr-auto ml-auto">	
        <div class="file-upload">
            <button class="file-upload-btn" type="button" id="foto" name="foto" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

            <div class="image-upload-wrap">
                <input class="file-upload-input" type='file' id="foto" name="foto" value="" onchange="readURL(this);" accept="image/*" />
                <div class="drag-text">
                <h5>Drag and drop or select add Image</h5>
                    {{-- <img src="{{ Storage::url($data->foto) }}" class="img-fluid mb-4 mt-4" alt="No Img" width="230px"/> --}}
                </div>
            </div>
            <div class="file-upload-content">
                <img class="file-upload-image" src="#" alt=" Image Format Only" />
                <div class="image-title-wrap">
                <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                </div>
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>

<!-- File SMV-->
<script>
document.querySelector("html").classList.add('js');

var fileInput  = document.querySelector( ".input-file-smv" ),  
    button     = document.querySelector( ".input-file-trigger-smv" ),
    the_return1 = document.querySelector(".file-return-smv");
    
button.addEventListener("keydown", function( event ) {  
    if ( event.keyCode == 13 || event.keyCode == 32 ) {  
        fileInput.focus();  
    }  
});
button.addEventListener("click", function( event ) {
    fileInput.focus();
    return false;
});  
fileInput.addEventListener("change", function( event ) {  
    the_return1.innerHTML = this.value;  
});  
</script>
<!-- End File SMV-->

<!-- File PPM-->
<script>
    document.querySelector("html").classList.add('js');

    var fileInput  = document.querySelector( ".input-file-ppm" ),  
        button     = document.querySelector( ".input-file-trigger-ppm" ),
        the_return2 = document.querySelector(".file-return-ppm");
        
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
        the_return2.innerHTML = this.value;  
    });  
</script>
<!-- End File PPM-->

<!-- File WORK-->
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
    button.addEventListener( "click", function( event ) {
        fileInput.focus();
        return false;
    });  
    fileInput.addEventListener( "change", function( event ) {  
        the_return3.innerHTML = this.value;  
    });  
</script>
<!-- End File WORK-->

<!-- File TRIMCARD-->
<script>
    document.querySelector("html").classList.add('js');

    var fileInput  = document.querySelector( ".input-file-trimcard" ),  
        button     = document.querySelector( ".input-file-trigger-trimcard" ),
        the_return4 = document.querySelector(".file-return-trimcard");
        
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
        the_return4.innerHTML = this.value;  
    });  
</script>
<!-- End File TRIMCARD-->

<!-- File TECH SPECH-->
<script>
    document.querySelector("html").classList.add('js');

    var fileInput  = document.querySelector( ".input-file-techspech" ),  
        button     = document.querySelector( ".input-file-trigger-techspech" ),
        the_return5 = document.querySelector(".file-return-techspech");
        
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
        the_return5.innerHTML = this.value;  
    });  
</script>
<!-- End File TECH SPECH-->

<!-- Foto -->
<script>
    function readURL(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function(e) {
        $('.image-upload-wrap').hide();
        $('.file-upload-image').attr('src', e.target.result);
        $('.file-upload-content').show();
        $('.image-title').html(input.files[0]);
        // $('.image-title').html(input.files[0].name);
        };
        reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload();
        }
    }

    function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
    }
    $('.image-upload-wrap').bind('dragover', function () {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
        $('.image-upload-wrap').removeClass('image-dropping');
    });
</script>
<!-- End Foto -->


