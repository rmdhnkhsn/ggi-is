<div class="containerFL d-none"></div>
<div class="floating-legend fade-Out">
    <div class="floating-header">
        <h2>Color Legend</h2>
        <p class="sub-title">See the meaning of the color sign.</p>
    </div>
    <div class="floating-content">
        <div class="body-content">
            <div class="title-16-dark text-left">Date Legend</div>
            <div class="cards-scroll scrollX mt-2 mb-4 pb-1" id="scroll-bar-sm">
                <div class="flex gap-3">
                    <div class="badgeToday">Today</div>
                    <div class="badgeWeekend">Weekend</div>
                    <div class="badgeNationalHoliday">National Holiday</div>
                </div>
            </div>
            <div class="title-16-dark text-left mb-2">Schedule WO Legend</div>
            <div class="badgeSch badgeOTZO">On Time Zero Output</div>
            <div class="badgeSch badgeCOT">Completed On Time</div>
            <div class="badgeSch badgeCD">Completed Delay</div>
            <div class="badgeSch badgeOT">On Time</div>
            <div class="badgeSch badgeDelay">Delay</div>
            <div class="badgeSch badgeSSF">Shipment same as finish</div>
        </div>
    </div>
</div>

<script>
    const buttontoggle2 = document.getElementById("btn-legend");
    const legend2 = document.getElementsByClassName("containerFL")[0];
    buttontoggle2.addEventListener('click', function () {
        legend2.classList.toggle('d-block');
        legend2.classList.toggle('d-none');
        //  console.log('ok');
    });
</script>