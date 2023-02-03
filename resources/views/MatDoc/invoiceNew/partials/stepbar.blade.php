<ul class="nav nav-tabs orangeTabs">
    <li class="nav-side">
        <a href="{{ route('invoice.index')}}" class="btnPrevious"><i class="fas fa-arrow-left"></i>Back To List</a> 
    </li>
    <!-- Step 1 - choose buyer  -->
    <li class="nav-item-show">
        @if($step == 'buyer')
        <a href="{{route('invoiceList.index',$data->kode_ekspedisi)}}" class="nav-link active">
        @else
        <a href="{{route('invoiceList.index',$data->kode_ekspedisi)}}" class="nav-link">
        @endif
            <!-- <div class="numberOrange">1</div> -->
            @if($data->buyer != null)
            <div class="checkGreen"><img src="{{url('images/iconpack/invoice/double-check.svg')}}"></div>
            @endif
            Buyer
        </a>
        <div class="sliderOrange"></div>
        <!-- <div class="sliderGreen"></div> -->
    </li>
    <!-- End  -->

    <li class="nav-item-show">
        @if($step == 'information')
        <a href="{{route('invoiceList.Information',$data->kode_ekspedisi)}}" class="nav-link active">
        @else
        <a href="{{route('invoiceList.Information',$data->kode_ekspedisi)}}" class="nav-link">
        @endif
            <div class="numberOrange">2</div>
            Information
        </a>
        <div class="sliderOrange"></div>
    </li>
    <li class="nav-item-show">
        @if($step == 'list_item')
        <a href="{{route('invoiceList.listItem',$data->kode_ekspedisi)}}" class="nav-link active">
        @else
        <a href="{{route('invoiceList.listItem',$data->kode_ekspedisi)}}" class="nav-link">
        @endif
            <div class="number">3</div>
            List Item
        </a>
        <div class="sliderOrange"></div>
    </li>
    <li class="nav-item-show">
        @if($step == 'preview')
        <a href="{{route('invoiceList.preview',$data->kode_ekspedisi)}}" class="nav-link active">
        @else
        <a href="{{route('invoiceList.preview',$data->kode_ekspedisi)}}" class="nav-link">
        @endif
            <div class="number">4</div>
            Preview
        </a>
        <div class="sliderOrange"></div>
    </li>
    <li class="nav-side">
        <a href="" class="btn-blue-md no-wrap">Save Draft</a> 
    </li>
</ul>