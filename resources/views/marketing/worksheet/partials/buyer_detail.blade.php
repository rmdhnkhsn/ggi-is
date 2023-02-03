<div class="col-lg-4">
    <div class="cards p-4 mb-3">
        <span class="judul_biru">Buyer Details</span>
        <div class="row mt-3">
            <div class="col-lg-5 col-5">
                <p class="title">Buyer</p>
                <p class="title">Ship To</p>
                <p class="title">R Ex Fty Date</p>
                <p class="title">Po Creation</p>
            </div>
            <div class="col-lg-7 col-7">
                <p class="isi text-truncate">: {{$buyer->F0101_ALPH}}</p>
                <p class="isi text-truncate">: {{$master_data->general_identity->ship_to}} </p>
                <p class="isi text-truncate">: {{$master_data->general_identity->exfact_date}}</p>
                <p class="isi text-truncate">: {{$master_data->general_identity->po_date}}</p>
            </div>
        </div>
    </div>
</div>