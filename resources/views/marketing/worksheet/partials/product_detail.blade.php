@if($stepbar == 'Breakdown')
<div class="col-lg-4">
@elseif($stepbar == 'Material Sewing')
<div class="col-lg-6">
@endif
    <div class="cards p-4 mb-3">
        <span class="judul_biru">Product Details</span>
        <div class="row mt-3">
            <div class="col-lg-5 col-5">
                <p class="title">OR Number</p>
                <p class="title">Article</p>
                <p class="title">Product Name</p>
                <p class="title">Style</p>
            </div>
            <div class="col-lg-7 col-7">
                <p class="isi text-truncate">: {{$master_data->general_identity->nomor_or}}</p>
                <p class="isi text-truncate">: {{$master_data->general_identity->article}} </p>
                <p class="isi text-truncate">: {{$master_data->general_identity->product_name}}</p>
                <p class="isi text-truncate">: {{$master_data->general_identity->style_code}}</p>
            </div>
        </div>
    </div>
</div>