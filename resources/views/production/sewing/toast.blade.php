      <!-- Toast -->
      @if($errors->any())
      <div class="col-lg-4" style="width : 100%; max-height : 100px">
        <div class="toast shadow-none"  id="tes" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false" style="position: sticky; top: 0; right: 50px; z-index:300; border-radius : 10px !important; border : 1px solid #ccc; !important">
          <div class="position-relative d-flex align-items-center toast-header shadow-lg border-bottom text-light" style="box-shadow: 0px 5px 20px rgba(104, 113, 122, 0.5) !important; background-color : #FB5B5B; border-radius : 10px 10px 0 0 !important">
          <div class="bg-light d-flex justify-content-center align-items-center text-dark" style="border-radius : 10px 10px 0 0 !important; height : 100%; width : 40px; position : absolute; top : 0; bottom : 0; left : 0">
            <i class="fas fa-exclamation-triangle" style="color:#FB5B5B"></i>
          </div>
            <strong class="ml-5">Hubungi PPIC</strong>
            <!-- <small>11 mins ago</small> -->
            <button type="button" class="ml-auto close text-light" data-dismiss="toast" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="toast-body bg-light overflow-auto" style="border-radius : 0 0 10px 10px !important; max-height : 370px !important">
          <h6 style="color : #2B2B2B">Berikut daftar wo yang tidak match</h6>
          <p style="font-size : 10px; color :#FB5B5B ">**WO Tidak Match dengan Line atau WO Belum diSchedule. Silahkan upload ulang daily output sewing, jika WO Tersebut sudah dischedule</p>
          <ul class="list-group mb-2">
            @foreach ($errors->all() as $error)
              <li style="color : #2B2B2B" class="list-group-item">{{ $error }}</li>
            @endforeach
          </ul>
          </div>
        </div>
      </div>
      @endif
      <!-- End Toast -->