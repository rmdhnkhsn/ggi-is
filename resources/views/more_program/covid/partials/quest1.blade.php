    
    <div class="judul">Pertanyaan 1/8</div>
        <div class="pertanyaan">No Handphone</div>
        <div class="wrapperRadio">
            <input type="text" id="no_hp" name="no_hp" value="{{auth()->user()->nohp}}" class="form-control calendarQuest" style="border-radius:10px;position:relative;z-index:20" placeholder="tuliskan no handphone..." required>
        </div><br>
        <div class="pertanyaan">Apakah Anda Berpergian Minggu Ini..?</div>
        <input type="hidden" id="tgl_input" name="tgl_input" value="{{$date}}">
        <div class="wrapperRadio">
            <input type="radio" name="answer1" value="Ya" class="resultRadio" id="one-1" required>
            <label for="one-1" class="options check next-tab" data-direction="next" data-target="#myTab">
                <span class="radio-desc">Ya</span>
                <div class="notChecked"></div>
                <i class="fas fa-check-circle"></i>
            </label>
        </div>
        <div class="wrapperRadio">
            <input type="radio" name="answer1" value="Tidak" class="resultRadio" id="one-2">
            <label for="one-2" class="options check next-tab-answer1" data-direction="next" data-target="#myTab">
                <span class="radio-desc">Tidak</span>
                <div class="notChecked"></div>
                <i class="fas fa-check-circle"></i>
            </label>
        </div>
