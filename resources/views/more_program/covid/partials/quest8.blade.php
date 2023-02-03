    
    <div class="judul">Pertanyaan 8/8</div>
    <div class="pertanyaan">Siapa yang yang terkena COVID yang bertemu dengan anda minggu ini..?</div>
    <div class="wrapperRadio">
        <input type="radio" name="answer8" value="Keluarga" class="resultRadio" id="eight-1">
        <label for="eight-1" class="options check">
            <span class="radio-desc">Keluarga</span>
            <div class="notChecked"></div>
            <i class="fas fa-check-circle"></i>
        </label>
    </div>
    <div class="wrapperRadio">
        <input type="radio" name="answer8" value="Teman" class="resultRadio" id="eight-2">
        <label for="eight-2" class="options check">
            <span class="radio-desc">Teman</span>
            <div class="notChecked"></div>
            <i class="fas fa-check-circle"></i>
        </label>
    </div>
    <div class="wrapperRadio">
        <input type="radio" name="answer8" value="Tetangga" class="resultRadio" id="eight-3">
        <label for="eight-3" class="options check">
            <span class="radio-desc">Tetangga</span>
            <div class="notChecked"></div>
            <i class="fas fa-check-circle"></i>
        </label>
    </div>
    <div class="wrapperRadio">
        <input type="radio" name="answer8" value="Tidak Ada" class="resultRadio" id="eight-4">
        <label for="eight-4" class="options check">
            <span class="radio-desc">Tidak Ada</span>
            <div class="notChecked"></div>
            <i class="fas fa-check-circle"></i>
        </label>
    </div>
    <div class="wrapperRadio">
        <input type="radio" name="answer8" value="Lainnya" class="resultRadio" id="eight-5">
        <label for="eight-5" class="options check">
            <span class="radio-desc">Lainnya</span>
            <div class="notChecked"></div>
            <i class="fas fa-check-circle"></i>
        </label>
    </div>
    <div class="hide mt-4" id="showHide5">
        <input type="text" name="note8" class="form-control calendarQuest" style="border-radius:10px;position:relative;z-index:20" placeholder="contoh: pacar, saudara, mantan dll.">
    </div>
    <button type="submit" class="btn-orange-md" style="margin-top:2.8rem;position:relative;z-index:20">Selesai</button>
    <!-- <a href="{{ route('finish-question')}}" class="btn-orange-md" style="margin-top:2.8rem;position:relative;z-index:20">Selesai</a> -->

    <script>
        $("input[name=answer8]:radio").click(function(ev) {
            if (ev.currentTarget.value != "Lainnya") {
                $('#showHide5').removeClass('hide');
                $('#showHide5').addClass('hide');
            } else if (ev.currentTarget.value == "Lainnya") {
                $('#showHide5').addClass('hide');
                $('#showHide5').removeClass('hide');
            }
        });
    </script>