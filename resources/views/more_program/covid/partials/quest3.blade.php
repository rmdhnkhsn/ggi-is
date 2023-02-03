    
    <div class="judul">Pertanyaan 3/8</div>
    <div class="pertanyaan">Apakah Anda Menerima tamu dari luar Kota Minggu ini..?</div>
    <div class="wrapperRadio">
        <input type="radio" name="answer3" value="Ya" class="resultRadio showHide" id="three-1" required>
        <label for="three-1" class="options check">
            <span class="radio-desc">Ya</span>
            <div class="notChecked"></div>
            <i class="fas fa-check-circle"></i>
        </label>
    </div>
    <div class="wrapperRadio">
        <input type="radio" name="answer3" value="Tidak" class="resultRadio" id="three-2">
        <label for="three-2" class="options check next-tab" data-direction="next" data-target="#myTab">
            <span class="radio-desc">Tidak</span>
            <div class="notChecked"></div>
            <i class="fas fa-check-circle"></i>
        </label>
    </div>

    <div class="hide" id="showHide">
        <div class="pertanyaan mt-5">Jika menerima tamu dari luar tuliskan tanggalnya..</div>
        <div class="input-group flex">
            <div class="input-group-prepend">
                <span class="inputGroupOrange justify-center" style="width:48px"><i class="fs-18 fas fa-calendar-alt"></i></span>
            </div>
            <input type="date" class="form-control calendarQuest" name="date3">
        </div>
        <a href="#" class="btn-orange-md next-tab" data-direction="next" data-target="#myTab" style="margin-top:2.4rem;position:relative;z-index:20">Selanjutnya</a>
    </div>

<script>
    $("input[name=answer3]:radio").click(function(ev) {
        if (ev.currentTarget.value == "Tidak") {
            $('#showHide').removeClass('hide');
            $('#showHide').addClass('hide');

        } else if (ev.currentTarget.value == "Ya") {
            $('#showHide').addClass('hide');
            $('#showHide').removeClass('hide');

        }
    });
</script>