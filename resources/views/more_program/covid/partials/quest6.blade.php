    
    <div class="judul">Pertanyaan 6/8</div>
    <div class="pertanyaan">Apakah anda pernah mengalami kehilangan indera penciuman atau perasa dalam minggu ini..?</div>
    <div class="wrapperRadio">
        <input type="radio" name="answer6" value="Pernah" class="resultRadio showHide3" id="six-1">
        <label for="six-1" class="options check">
            <span class="radio-desc">Pernah</span>
            <div class="notChecked"></div>
            <i class="fas fa-check-circle"></i>
        </label>
    </div>
    <div class="wrapperRadio">
        <input type="radio" name="answer6" value="Tidak Pernah" class="resultRadio" id="six-2">
        <label for="six-2" class="options check next-tab" data-direction="next" data-target="#myTab">
            <span class="radio-desc">Tidak Pernah</span>
            <div class="notChecked"></div>
            <i class="fas fa-check-circle"></i>
        </label>
    </div>

    <div class="hide" id="showHide3">
        <div class="pertanyaan mt-5">Jika pernah tuliskan tanggalnya..</div>
        <div class="input-group flex">
            <div class="input-group-prepend">
                <span class="inputGroupOrange justify-center" style="width:48px"><i class="fs-18 fas fa-calendar-alt"></i></span>
            </div>
            <input type="date" name="date6" class="form-control calendarQuest">
        </div>
        <a href="#" class="btn-orange-md next-tab" data-direction="next" data-target="#myTab" style="margin-top:2.4rem;position:relative;z-index:20">Selanjutnya</a>
    </div>

<script>
    $("input[name=answer6]:radio").click(function(ev) {
        if (ev.currentTarget.value == "Tidak Pernah") {
            $('#showHide3').removeClass('hide');
            $('#showHide3').addClass('hide');
        } else if (ev.currentTarget.value == "Pernah") {
            $('#showHide3').addClass('hide');
            $('#showHide3').removeClass('hide');
        }
    });
</script>