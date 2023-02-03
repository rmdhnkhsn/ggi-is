    
    <div class="judul">Pertanyaan 5/8</div>
    <div class="pertanyaan">Apakah anda Pernah Mengalami demam/ Batuk/ Pilek/ Sakit Tenggorokan/ Sesak Nafas dalam minggu ini..?</div>
    <div class="wrapperRadio">
        <input type="radio" name="answer5" value="Pernah" class="resultRadio showHide2" id="five-1">
        <label for="five-1" class="options check">
            <span class="radio-desc">Pernah</span>
            <div class="notChecked"></div>
            <i class="fas fa-check-circle"></i>
        </label>
    </div>
    <div class="wrapperRadio">
        <input type="radio" name="answer5" value="Tidak Pernah" class="resultRadio" id="five-2">
        <label for="five-2" class="options check next-tab" data-direction="next" data-target="#myTab">
            <span class="radio-desc">Tidak Pernah</span>
            <div class="notChecked"></div>
            <i class="fas fa-check-circle"></i>
        </label>
    </div>

    <div class="hide" id="showHide2">
        <div class="pertanyaan mt-5">Jika Pernah tuliskan Gejalanya..</div>
        <input type="text" name="note5" class="form-control calendarQuest" style="border-radius:10px;position:relative;z-index:20" placeholder="tuliskan gejalanya...">
        <a href="#" class="btn-orange-md next-tab" data-direction="next" data-target="#myTab" style="margin-top:2.4rem;position:relative;z-index:20">Selanjutnya</a>
    </div>

<script>
    $("input[name=answer5]:radio").click(function(ev) {
        if (ev.currentTarget.value == "Tidak Pernah") {
            $('#showHide2').removeClass('hide');
            $('#showHide2').addClass('hide');

        } else if (ev.currentTarget.value == "Pernah") {
            $('#showHide2').addClass('hide');
            $('#showHide2').removeClass('hide');

        }
    });
</script>