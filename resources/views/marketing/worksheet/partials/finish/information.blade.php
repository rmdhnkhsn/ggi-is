
<div class="row">
    @include('marketing.worksheet.partials.finish.revisi')
    <div class="col-12">
        <div class="title-20-blue">Worksheet Information</div>
    </div>
    <div class="col-12">
        <table class="table tbl-content border-grey mt-3">
            <tr>
                <td width="230px"><div class="title-14-dark2">PO Number</div></td>
                <td><div class="sub-title-14">{{$po}}</div></td>
            </tr>
            <tr>
                <td width="230px"><div class="title-14-dark2">Contract Number</div></td>
                <td><div class="sub-title-14">{{$contract}}</div></td>
            </tr>
            <tr>
                <td width="230px"><div class="title-14-dark2">OR Number</div></td>
                <td><div class="sub-title-14">{{$nomor_or}}</div></td>
            </tr>
            <tr>
                <td width="230px"><div class="title-14-dark2">Buyer</div></td>
                <td><div class="sub-title-14">{{$master_data->general_identity->buyer}}</div></td>
            </tr>
            <tr>
                <td width="230px"><div class="title-14-dark2">Article Code</div></td>
                <td><div class="sub-title-14">{{$article}}</div></td>
            </tr>
            <tr>
                <td width="230px"><div class="title-14-dark2">Product Name</div></td>
                <td><div class="sub-title-14">{{$product_name}}</div></td>
            </tr>
            <tr>
                <td width="230px"><div class="title-14-dark2">Style Code </div></td>
                <td><div class="sub-title-14">{{$style_code}}</div></td>
            </tr>
            <tr>
                <td width="230px"><div class="title-14-dark2">Style Name </div></td>
                <td><div class="sub-title-14">{{$style_name}}</div></td>
            </tr>
            <tr>
                <td width="230px"><div class="title-14-dark2">Shipment Date</div></td>
                <td><div class="sub-title-14">{{ date('d F Y', strtotime($master_data->general_identity->shipment_date)) }}</div></td>
            </tr>
            <tr>
                <td width="230px"><div class="title-14-dark2">Request Ex Fty Date</div></td>
                <td><div class="sub-title-14">{{ date('d F Y', strtotime($master_data->general_identity->exfact_date)) }}</div></td>
            </tr>
            <tr>
                <td width="230px"><div class="title-14-dark2">PO Creation</div></td>
                <td><div class="sub-title-14">{{ date('d F Y', strtotime($master_data->date)) }}</div></td>
            </tr>
            <tr>
                <td width="230px"><div class="title-14-dark2">Description</div></td>
                <td><div class="sub-title-14">{{$master_data->general_identity->description}}</div></td>
            </tr>
        </table>
    </div>
</div>
<div class="row mt-4">
    @if($file1 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$file1}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$file1}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($file2 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$file2}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$file2}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($file3 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$file3}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$file3}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($file4 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$file4}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$file4}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
</div>

