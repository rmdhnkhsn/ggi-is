<form action="{{ route('worksheet.detail_store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="master_id" name="master_id" value="{{$master_data->id}}">
    @include('marketing.worksheet.partials.material_sewing.detail.sewing')
    @include('marketing.worksheet.partials.material_sewing.detail.label')
    @include('marketing.worksheet.partials.material_sewing.detail.ironing')
    @include('marketing.worksheet.partials.material_sewing.detail.trimming')