<div class="modal fade" id="share" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:450px">
        <div class="modal-content" style="border-radius:10px">
            <div class="row">
                <div class="col-12 py-3 px-4 justify-sb">
                    <span class="title-16 ml-2">Share This Video</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="row pb-3 px-4">
                <div class="col-2">
                    <a href="https://api.whatsapp.com/send/?phone&text={{ url('guide/guide-playlist/'.$id_video.'?reference_nik='.auth()->user()->nik.'') }}">
                        <img src="{{ asset('/images/iconpack/wa-icon.svg') }}">
                        <div class="wa-text mt-1">Whatsapp</div>
                    </a>
                </div>
                <div class="col-10 pdl-5 text-left">
                    <div class="video-link">Video Link</div>
                    <div class="input-group my-1">
                        <input type="text" class="input-video" id="copyText" name="" 
                         value="{{ url('guide/guide-playlist/'.$id_video.'?reference_nik='.auth()->user()->nik.'') }}" >
                        <button id="copyBtn"><i class="icon-copy-link fas fa-copy"></i></button>
                        {{-- <a href="#"><i class="icon-copy-link fas fa-copy"></i></a> --}}
                    </div>
                    <div class="copy-link">*Copy the link above</div>
                    <div class="border-left"></div>
                </div>
            </div>
        </div>
    </div>
</div>
  <script src="{{asset('common/js/guide/sweetalert2@10.js')}}"></script>

<script>
    const copyBtn = document.getElementById('copyBtn')
    const copyText = document.getElementById('copyText')
    
    copyBtn.onclick = () => {
        copyText.select();    // Selects the text inside the input
        document.execCommand('copy');    // Simply copies the selected text to clipboard 
            Swal.fire({         //displays a pop up with sweetalert
            icon: 'success',
            title: 'Text copied to clipboard',
            showConfirmButton: false,
            timer: 1000
        });
    }
</script>
