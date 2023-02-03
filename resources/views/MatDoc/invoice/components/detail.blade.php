@extends("layouts.app")
@section("title","Deatail invoice")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush

@section("content")
<style>
  .nav-tabs {
    border-bottom: none !important;
  }
</style>
<section class="content">
  <div class="container-fluid invoiceList">
    <div class="row pb-4">
      <div class="col-12">
         <div class="tab-content">
          <div class="tab-pane active">
            <div class="row">
                <div class="col-12">
                    <div class="cardPart">
                        <div class="cardHead p-3">
                            <div class="justify-sb3">
                                <div class="title-20-blue no-wrap">PREVIEW INVOICE</div>
                                <div class="endSide">
                                    <div class="flex gap-3">
                                        <a href="{{ route('invoiceList.previewPDF','filter='.$filter) }}" class="btn-merah"><i class="ml-2 fas fa-file-pdf"></i></a>
                                        <a href="{{ route('invoiceList.previewEXCEL','filter='.$filter) }}" class="btn-icon-green"><i class="fs-20 fas fa-file-excel"></i></a>
                                        {{-- <a href="" class="btn-icon-green exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel" style="width:35px;height:35px"><i class="fs-20 fas fa-file-excel"></i></a>
                                        <a href="" class="btn-icon-red exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF" style="width:35px;height:35px"><i class="fs-20 fas fa-file-pdf"></i></a> --}}
                                        <a href="" class="btn-black-md" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Print" style="height:35px">Print<i class="fs-20 ml-3 fas fa-print"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section"></div>
                        <div class="cardBody p-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="headerPreview">
                                        <div class="left-side">
                                            <img src="{{url('images/iconpack/invoice/gistex-red.svg')}}" width="180px">
                                            <div class="title-28-grey2 mb-min">PT. GISTEX GARMEN INDONESIA</div>
                                        </div>
                                        <div class="right-side">
                                            <div class="office">
                                                <div class="title-12 judul text-left">Office</div> 
                                                <div class="address">
                                                    <div class="mr-3" style="margin-top:-5px">:</div>
                                                    <div class="title-12 text-left">Jl. Hegarmanah No.5 RT 002 RW 003 Hegarmanah, Cidadap, Bandung 40141</div>
                                                </div>
                                            </div>
                                            <div class="factory mt-2">
                                                <div class="title-12 judul text-left">Factory</div>
                                                <div class="address">
                                                    <div class="mr-3" style="margin-top:-5px">:</div>
                                                    <div class="title-12 text-left">Jl. Panyawungan KM.19<br/> Cileunyi Wetan, Cileunyi<br/> Kab. Bandung, Jawabarat 40393<br/>Telp  : (62-002) - 7796683, 7796684, 7798885 <br/>Fax <span style="margin-left:5px">:</span> (62-002) - 7796686</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-5">
                                   @if ($data->buyer == 'AGRON, INC.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED')
                                  {{-- AGRON || HEXAPOLE --}}
                                  <div class="headerTable">
                                    <div class="containerHeader">
                                      <div class="all">
                                        <div class="title-16-dark2 text-center">COMMERCIAL INVOICE</div>
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="half">
                                        <div class="title">Beneficiary :</div>
                                        <div class="desc">{{ $invoiceHeader->company_bene }}</div>  
                                        <div class="desc">{{ $invoiceHeader->address_bene }}</div>  
                                        <div class="desc">{{ $invoiceHeader->city_bene }}</div>
                                        <div class="desc">TEL : +62 22 4241308 , FAX :+62 22 4239650</div>  
                                      </div>
                                      <div class="half">
                                        <div class="desc"><span class="title">COMMERCIAL INVOICE</span> : {{ $invoiceHeader->invoice_no }}</div> 
                                        <div class="desc"><span class="title">DATE</span> : {{ $invoiceHeader->date }}</div> 
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="part">
                                        <div class="title">For account and risk :</div>
                                        <div class="desc">{{ $invoiceHeader->buyer_for }}</div>  
                                        <div class="desc">{{ $invoiceHeader->address_for }}</div>  
                                        <div class="desc">{{ $invoiceHeader->country_for }}</div>  
                                      </div>
                                      <div class="part">
                                        <div class="title">Consignee / Ship to :</div>
                                        <div class="desc">{{ $invoiceHeader->consigne }}</div>  
                                        <div class="desc">{{ $invoiceHeader->addres_cons }}</div>  
                                        <div class="desc">{{ $invoiceHeader->shipto }}</div>  
                                      </div>
                                      <div class="part">
                                        <div class="title">Container No :</div>
                                        <div class="desc"> {{ $invoiceHeader->container_no }} </div>  
                                        <div class="desc"> {{ $invoiceHeader->container_no2 }}'HC</div>  
                                      </div>
                                      <div class="part">
                                        <div class="title">Seal No :</div>
                                        <div class="desc">{{ $invoiceHeader->seal_no }}</div>  
                                        <div class="desc">{{ $invoiceHeader->seal_no2 }}</div>  
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="part">
                                        <div class="title">Vessel name & Voyage :</div>
                                        <div class="desc">{{ $invoiceHeader->visel_name }}</div>  
                                      </div>
                                      <div class="part">
                                        <div class="title">Ship on Board :</div>
                                        <div class="desc">{{ $invoiceHeader->shipOnBoard }}</div>  
                                      </div>
                                      <div class="part">
                                        <div class="title">Port Of Loading :</div>
                                        <div class="desc">{{ $invoiceHeader->partOfLoading }}</div>  
                                      </div>
                                      <div class="part">
                                        <div class="title">Port Of Destination :</div>
                                        <div class="desc">{{ $invoiceHeader->partOfDestination }}</div>  
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="half text-center fw-5">{{ $invoiceHeader->delivery_terms }} </div>
                                      <div class="half text-center"><span class="fw-5">PAYMENT</span> : {{ $invoiceHeader->payment }}</div> 
                                    </div>
                                  </div>
                                  @endif
                                  {{-- END AGRON --}}
                                  @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.')
                                  {{-- MARUBENI --}}
                                  <div class="headerTable">
                                    <div class="containerHeader">
                                      <div class="all">
                                        <div class="title-16-dark2 text-center">COMMERCIAL INVOICE</div>
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="half">
                                        <div class="title">Beneficiary :</div>
                                        <div class="desc">{{ $invoiceHeader->company_bene }}</div>  
                                        <div class="desc">{{ $invoiceHeader->address_bene }}</div>  
                                        <div class="desc">{{ $invoiceHeader->city_bene }}</div>
                                        <div class="desc">TEL : +62 22 4241308 , FAX : +62 22 4239650</div>  
                                      </div>
                                      <div class="half">
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Invoice No</div><div class="mx-3">:</div>{{ $invoiceHeader->invoice_no }}
                                        </div> 
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Date</div><div class="mx-3">:</div>{{ $invoiceHeader->date }}
                                        </div> 
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="half">
                                        <div class="title">Consignee :</div>
                                        <div class="desc">{{ $invoiceHeader->consigne }}</div>  
                                        <div class="desc">{{ $invoiceHeader->addres_cons }}</div>  
                                        <div class="desc">{{ $invoiceHeader->shipto }}</div>  
                                      </div>
                                      @if ( $invoiceHeader->payment == 'By LC')
                                          
                                      <div class="half">
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">LC No</div><div class="mx-3">:</div><div class="title-12B">{{ $invoiceHeader->lc_no }}</div>
                                        </div> 
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">DD</div><div class="mx-3">:</div>{{ $invoiceHeader->date_lc }}
                                        </div> 
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Issued By</div><div class="mx-3">:</div>{{ $invoiceHeader->issued_by }}
                                        </div> 
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Country</div><div class="mx-3">:</div>
                                        </div> 
                                      </div>
                                      @else
                                        <div class="half">
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Payment</div><div class="mx-3">:</div><div class="title-12B">{{  $invoiceHeader->payment }}</div>
                                        </div> 
                                        {{-- <div class="desc flex">
                                          <div class="title" style="width:100px">DD</div><div class="mx-3">:</div>{{ $invoiceHeader->date_lc }}
                                        </div> 
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Issued By</div><div class="mx-3">:</div>{{ $invoiceHeader->issued_by }}
                                        </div> 
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Country</div><div class="mx-3">:</div>
                                        </div>  --}}
                                      </div>
                                      @endif

                                    </div>
                                    <div class="containerHeader">
                                      <div class="half">
                                        <div class="title">Notify Party :</div>
                                        <div class="desc">{{ $invoiceHeader->buyer_notif }}</div>  
                                        <div class="desc">{{ $invoiceHeader->address_notif }}</div>  
                                        <div class="desc">{{ $invoiceHeader->country_notif }}</div>  
                                      </div>
                                      <div class="half">
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Ref No</div><div class="mx-3">:{{ $invoiceHeader->ref_no }}</div>
                                        </div> 
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Contract No</div><div class="mx-3">:</div>{{ $invoiceHeader->contract_no }}
                                        </div>
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="half">
                                        <div class="title">Shipt On Board :</div>
                                        <div class="desc">{{ $invoiceHeader->shipOnBoard }}</div>
                                      </div>
                                      <div class="half">
                                        <div class="title">Vessel Name And Voyage :</div>
                                        <div class="desc">{{ $invoiceHeader->visel_name }}</div>
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="all text-center fw-5">{{ $invoiceHeader->delivery_terms }} </div>
                                    </div>
                                  </div> 
                                  {{-- END MARUBENI --}}
                                  @endif
                                  @if ($data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'HONG KONG DESCENTE TRADING LTD.' || $data->buyer == 'FENIX LOGISTIC SERVICE LTD')
                                  {{-- TAIJIN || HONGKONG --}}
                                  <div class="headerTable">
                                    <div class="containerHeader">
                                      <div class="all">
                                        <div class="title-16-dark2 text-center">COMMERCIAL INVOICE</div>
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="half">
                                        <div class="title">Exporter :</div>
                                        <div class="desc">{{ $invoiceHeader->company_bene }}</div>  
                                        <div class="desc">{{ $invoiceHeader->address_bene }}</div>  
                                        <div class="desc">{{ $invoiceHeader->city_bene }}</div>
                                        <div class="desc">TEL : +62 22 4241308 , FAX : +62 22 4239650</div>  
                                      </div>
                                      <div class="half">
                                         @if ( $invoiceHeader->payment == 'By LC')
                                          <div class="half">
                                            <div class="desc flex">
                                              <div class="title" style="width:100px">LC No</div><div class="mx-3">:</div><div class="title-12B">{{ $invoiceHeader->lc_no }}</div>
                                            </div> 
                                            <div class="desc flex">
                                              <div class="title" style="width:100px">DD</div><div class="mx-3">:</div>{{ $invoiceHeader->date_lc }}
                                            </div> 
                                            <div class="desc flex">
                                              <div class="title" style="width:100px">Issued By</div><div class="mx-3">:</div>{{ $invoiceHeader->issued_by }}
                                            </div> 
                                            <div class="desc flex">
                                              <div class="title" style="width:100px">Country</div><div class="mx-3">:</div>
                                            </div> 
                                          </div>
                                          @else
                                            <div class="half">
                                            <div class="desc flex">
                                              <div class="title" style="width:100px">Payment</div><div class="mx-3">:</div><div class="title-12B">{{  $invoiceHeader->payment }}</div>
                                            </div>
                                            @endif
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Date</div><div class="mx-3">:</div>{{ $invoiceHeader->date }}
                                        </div> 
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="half">
                                        <div class="title">For account and risk  : </div>
                                        <div class="desc">{{ $invoiceHeader->buyer_for }}</div>  
                                        <div class="desc">{{ $invoiceHeader->address_for }}</div>  
                                        <div class="desc">{{ $invoiceHeader->country_for }}</div> 
                                      </div>
                                      <div class="half">

                                         @if ( $invoiceHeader->payment == 'By LC')
                                          <div class="half">
                                            <div class="desc flex">
                                              <div class="title" style="width:100px">LC No</div><div class="mx-3">:</div><div class="title-12B">{{ $invoiceHeader->lc_no }}</div>
                                            </div> 
                                            <div class="desc flex">
                                              <div class="title" style="width:100px">DD</div><div class="mx-3">:</div>{{ $invoiceHeader->date_lc }}
                                            </div> 
                                            <div class="desc flex">
                                              <div class="title" style="width:100px">Issued By</div><div class="mx-3">:</div>{{ $invoiceHeader->issued_by }}
                                            </div> 
                                            <div class="desc flex">
                                              <div class="title" style="width:100px">Country</div><div class="mx-3">:</div>
                                            </div> 
                                          </div>
                                          @else
                                            <div class="half">
                                            <div class="desc flex">
                                              <div class="title" style="width:100px">Payment</div><div class="mx-3">:</div><div class="title-12B">{{  $invoiceHeader->payment }}</div>
                                            </div> 
                                        @endif
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="half">
                                        <div class="title">Notify Party :</div>
                                        <div class="desc">{{  $invoiceHeader->buyer_notif }}</div>  
                                        <div class="desc">{{  $invoiceHeader->address_notif }}</div>  
                                        <div class="desc">{{  $invoiceHeader->country_notif }}</div>  
                                      </div>
                                      <div class="half">
                                        <div class="title">Remarks :</div>
                                        <div class="desc">{{  $invoiceHeader->remarks }}</div>
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="part">
                                        <div class="title">Port Of Loading :</div>
                                        <div class="desc">{{  $invoiceHeader->partOfLoading }}</div>
                                      </div>
                                      <div class="part">
                                        <div class="title">Final Destination :</div>
                                        <div class="desc">{{  $invoiceHeader->partOfDestination }}</div>
                                      </div>
                                      <div class="part">
                                        <div class="title">Carrier :</div>
                                        <div class="desc">{{  $invoiceHeader->carrier_deliv }}</div>
                                      </div>
                                      <div class="part">
                                        <div class="title">Sailing on or about :</div>
                                        <div class="desc">Aug 9,2022</div>
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="half text-center fw-5">{{  $invoiceHeader->delivery_terms }} </div>
                                      <div class="half text-center"><span class="fw-5">PAYMENT</span> : {{ $invoiceHeader->payment }}</div> 
                                    </div>
                                  </div>
                                  {{-- END TAIJIN --}}
                                  @endif
                                  @if ($data->buyer == 'MATSUOKA TRADING CO., LTD.')

                                  <div class="headerTable">
                                    <div class="containerHeader">
                                      <div class="all">
                                        <div class="title-16-dark2 text-center">COMMERCIAL INVOICE</div>
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="half">
                                        <div class="title">Beneficiary :</div>
                                        <div class="desc">{{ $invoiceHeader->company_bene }}</div>  
                                        <div class="desc">{{ $invoiceHeader->address_bene }}</div>  
                                        <div class="desc">{{ $invoiceHeader->city_bene }}</div>
                                        <div class="desc">TEL : +62 22 4241308 , FAX : +62 22 4239650</div>  
                                      </div>
                                      <div class="half">
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Invoice No</div><div class="mx-3">:</div>{{ $invoiceHeader->invoice_no }}
                                        </div> 
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Date</div><div class="mx-3">:</div>{{ $invoiceHeader->date }}
                                        </div> 
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="half">
                                        <div class="title">Consignee  : </div>
                                        <div class="desc">MATSUOKA TRADING CO., LTD. </div>  
                                        <div class="desc">1-3-24, MIKADO-CHO, FUKUYAMA,</div>  
                                        <div class="desc">HIROSHIMA JAPAN 7200805</div>  
                                        <div class="desc">TEL: 084-922-6886, FAX: 084-922-6925</div>
                                      </div>
                                      <div class="half">
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Container No</div><div class="mx-3">:</div>JADBHDA8687
                                        </div> 
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Seal No</div><div class="mx-3">:</div>OOLHBND-V234
                                        </div>
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="half">
                                        <div class="title">Shipt on Board :</div>
                                        <div class="desc">Jan 17, 2022</div>  
                                      </div>
                                      <div class="half">
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Vessel No</div><div class="mx-3">:</div>JADBHDA8687
                                        </div> 
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="half">
                                        <div class="title">Port Of Loading :</div>
                                        <div class="desc">Soekarno-Hatta</div>
                                      </div>
                                      <div class="half">
                                        <div class="title">Part of Destination :</div>
                                        <div class="desc">KANSAI (OSAKA)</div>
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="half justify-center fw-5">FOB JAKARTA, INDONESIA </div>
                                      <div class="half">
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">LC No</div><div class="mx-3">:</div>JADBHDA8687
                                        </div> 
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Date</div><div class="mx-3">:</div>21-12-2022
                                        </div> 
                                      </div> 
                                    </div>
                                  </div> 
                                  {{-- END MATSUOKA --}}
                                  @endif
                                  @if ($data->buyer == 'PENTEX LTD')
                                  {{-- PANTEX --}}
                                  <div class="headerTable">
                                    <div class="containerHeader">
                                      <div class="all">
                                        <div class="title-16-dark2 text-center">COMMERCIAL INVOICE</div>
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="half2">
                                        <div class="padding">
                                          <div class="title">Shipper :</div>
                                          <div class="desc">{{ $invoiceHeader->company_ship }}</div>  
                                          <div class="desc">{{ $invoiceHeader->addres_ship }}</div>  
                                          <div class="desc">{{ $invoiceHeader->city_ship }}</div>
                                          <div class="desc">{{ $invoiceHeader->country_ship }}</div>
                                          {{-- <div class="desc">TEL : +62 22 4241308 , FAX : +62 22 4239650</div>   --}}
                                        </div>
                                        <div class="borderTbl"></div>
                                        <div class="padding">
                                          <div class="title">For Account and Risk :</div>
                                          <div class="desc">{{ $invoiceHeader->buyer_for }}</div>  
                                          <div class="desc">{{ $invoiceHeader->address_for }}</div>  
                                          <div class="desc">{{ $invoiceHeader->country_for }}</div>  
                                          <div class="desc">{{ $invoiceHeader->telp_for }}</div>  
                                          {{-- <div class="desc">South Side, 93-100 Christian St, </div>  
                                          <div class="desc">London / E11R</div> --}}
                                        </div>
                                        <div class="borderTbl"></div>
                                        <div class="padding">
                                          <div class="title">Consignee :</div>
                                          <div class="desc">{{ $invoiceHeader->consigne }} </div>  
                                          <div class="desc">{{ $invoiceHeader->address_cons }} </div>  
                                          <div class="desc">{{ $invoiceHeader->shipto }} </div>  
                                          <div class="desc">{{ $invoiceHeader->country_cons }} </div>  
                                          {{-- <div class="desc">DELIVER TO DC PAV DRV-GOO-9999</div>  
                                          <div class="desc">MONDIALE, 94 MONTGOMERIE ROAD ,</div>
                                          <div class="desc">AIRPORT OAKS, GATE 11, DOOR 28,</div>
                                          <div class="desc">AUCKLAND, NEW ZEALAND.</div> --}}
                                        </div>
                                      </div>
                                      <div class="half">
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Invoice No</div><div class="mx-3">:</div>{{ $invoiceHeader->invoice_no }}
                                        </div> 
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Date</div><div class="mx-3">:</div>{{ $invoiceHeader->date_invoice }}
                                        </div> 
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Contract No</div><div class="mx-3">:</div>{{ $invoiceHeader->contract_no }}
                                        </div> 
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Date</div><div class="mx-3">:</div>{{ $invoiceHeader->date_contract }}
                                        </div> 
                                        {{-- <div class="desc flex">
                                          <div class="title" style="width:100px">Exp No</div><div class="mx-3">:</div>{{ $invoiceHeader->date }}
                                        </div>  --}}
                                        {{-- <div class="desc flex">
                                          <div class="title" style="width:100px">Date</div><div class="mx-3">:</div>{{ $invoiceHeader->date }}
                                        </div>  --}}
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">BL BO</div><div class="mx-3">:</div>{{ $invoiceHeader->bl_no }}
                                        </div> 
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">BL Date</div><div class="mx-3">:</div>{{ $invoiceHeader->date_bl }}
                                        </div> 
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Port of Loading</div><div class="mx-3">:</div>{{ $invoiceHeader->partOfLoading }}
                                        </div> 
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Port of Delivery</div><div class="mx-3">:</div>{{ $invoiceHeader->partOfDestination }}
                                        </div> 
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Final Destination</div><div class="mx-3">:</div>{{ $invoiceHeader->partOfDestination }}
                                        </div> 
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Negotiation Bank</div><div class="mx-3">:</div>{{ $invoiceHeader->nego_bank }}
                                        </div> 
                                        <div class="desc flex">
                                          <div class="title" style="width:100px">Remarks</div><div class="mx-3">:</div>{{ $invoiceHeader->remark_bank }}
                                        </div> 
                                      </div>
                                    </div>
                                    <div class="containerHeader">
                                      <div class="half">
                                        <div class="title">NOTIFY PARTY :</div>
                                        <div class="desc">{{ $invoiceHeader->buyer_notif }}</div>  
                                        <div class="desc">{{ $invoiceHeader->address_notif }}</div>  
                                        <div class="desc">{{ $invoiceHeader->country_notif }}</div>  
                                        {{-- <div class="desc">{{ $invoiceHeader->buyer_notif }}</div>  
                                        <div class="desc">DELIVER TO DC PAV DRV-GOO-9999</div>  
                                        <div class="desc">MONDIALE, 94 MONTGOMERIE ROAD</div>
                                        <div class="desc">AIRPORT OAKS, GATE 11, DOOR 28</div>  
                                        <div class="desc">AUCKLAND, NEW ZEALAND</div>   --}}
                                      </div>
                                      <div class="half2">
                                        <div class="padding">
                                          <div class="title">Payment Terms :</div>
                                          <div class="desc">T/T</div>   
                                          {{-- <div class="title">Payment Terms :</div>
                                          <div class="desc">T/T</div>   
                                          <div class="title">Payment Terms :</div>
                                          <div class="desc">T/T</div>    --}}
                                        </div>
                                        <div class="borderTbl"></div>
                                        <div class="padding">
                                          <div class="title">Deliver Terms :</div>
                                          <div class="desc">FOB INDONESIA</div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  {{-- END PANTEX --}}
                                  @endif
                                  @if ($data->buyer == 'PENTEX LTD')
                                  <div class="cards-scroll scrollX" id="scroll-bar3">
                                  @endif
                                    <table class="table table-small tbl-content-12 table-bordered text-center">
                                      <thead>
                                        <tr class="bg-thead2">
                                              <th>NO</th>
                                            {{-- agron,Hexapole,Matsuoka,Jiangsu,Toyota,Benlux,HAP,ExpressWorld,RitraCargo,Adrenaline --}}
                                            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'||$data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED')
                                              <th>WORK NO</th>
                                            @endif
                                            {{-- agron, Hexapole,Teijin,Hongkong  --}}
                                            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
                                              <th>PO NUMBER</th>
                                            @endif
                                            {{-- marubeni, Hexapole, Marusa, JCP Penney --}}
                                            @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JC PENNEY')
                                              <th>CONTRACT NUMBER</th>
                                            @endif
                                            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'PENTEX LTD')
                                              <th>STYLE</th>
                                            @endif
                                            @if ($data->buyer == 'PENTEX LTD')
                                              <th>DOCKET NUMBER</th>
                                            @endif
                                            @if ($data->buyer == 'PENTEX LTD')
                                              <th>DESTINATION NUMBER</th>
                                            @endif
                                            @if ($data->buyer == 'PENTEX LTD')
                                              <th>KIMBALL NUMBER</th>
                                            @endif
                                            {{-- agron, marubeni, Hexapole, Matsuoka, Pantex, Jiangsu, Marusa, Toyota, Benlux,HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}}
                                            
                                            @if ($data->buyer == 'MARUSA Co.,Ltd.' || $data->buyer == 'JC PENNEY')
                                              <th>ITEM</th>
                                            @endif
                                            {{-- Marubeni, Hexapole, Express World --}}
                                            @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED' || $data->buyer == 'EXPRESS, LLC')
                                              <th>SIZE</th>
                                            @endif
                                            {{-- pentex,HAP, Express World, Asmara Adrenaline --}}
                                            @if ($data->buyer == 'PENTEX LTD' ||$data->buyer == 'HAP., CO LTD'|| $data->buyer == 'ASMARA INTERNATIONAL LIMITED' || $data->buyer == 'EXPRESS, LLC')
                                              <th>COLOUR</th>
                                            @endif
                                            @if ($data->buyer == 'PENTEX LTD')
                                              <th>SUB</th>
                                            @endif
                                            @if ($data->buyer == 'PENTEX LTD')
                                              <th>L&P</th>
                                            @endif
                                            @if ($data->buyer == 'PENTEX LTD')
                                              <th>CARTON QTY </th>
                                            @endif
                                            @if ($data->buyer == 'PENTEX LTD')
                                              <th>NO OF UNITS</th>
                                            @endif
                                            @if ($data->buyer == 'PENTEX LTD')
                                              <th>NO OF SET</th>
                                            @endif
                                            @if ($data->buyer == 'PENTEX LTD')
                                              <th>CM</th>
                                            @endif
                                            @if ($data->buyer == 'PENTEX LTD')
                                              <th>FABRIC</th>
                                            @endif
                                            @if ($data->buyer == 'PENTEX LTD')
                                              <th>TRIMS</th>
                                            @endif
                                            {{-- agron, marubeni,Hexapole, Teijin, Hong kong, Matsuoka, Pentex, Jiangsu, Marusa, Toyota, Benlux,HAP, Express World, JC P Penney, Ritra Cargo, Adrenaline --}}
                                            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                              <th>DESCRIPTION OF GOODS</th>
                                            @endif
                                            {{-- agron, marubeni, Hexapole, Teijin, Hongkong, Matsuoka, Pantex, Jiangsu, Marusa, Toyota, Benlux,HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}}
                                            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                              <th>HS CODE</th>
                                            @endif
                                            {{-- agron, marubeni, Hexapole, Teijin, Hongkong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}}
                                            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                              <th>QUANTITY</th>
                                            @endif
                                            {{-- agron, marubeni, Hexapole, Teijin, Hong kong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JC P Penney, Ritra Cargo, Adrenaline --}}
                                            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                              <th>UNIT</th>
                                            @endif
                                            {{-- agron, marubeni, Hexapole, Teijin, Hongkong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}}
                                            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                              <th>UNIT PRICE ($)</th>
                                            @endif
                                            @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                              <th>AMOUNT ($)</th>
                                            @endif                                    
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($data2 as $key =>$value)
                                          <tr>
                                                  {{-- <input type="hidden" class="form-control border-input" id="wo" name="wo[]" value="{{ $value['wo'] }}" readonly> --}}
                                                  <td>{{ $loop->iteration }}</td>
                                              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'||$data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED')
                                            <td>{{ $value['wo'] }}</td>
                                              @endif
                                            {{-- agron, Hexapole,Teijin,Hongkong  --}}
                                              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
                                              <td>{{ $value['po'] }}</td>
                                              @endif
                                              @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'||$data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JC PENNEY')
                                              <td>{{ $value['contract'] }}</td>
                                              @endif
                                              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY'  || $data->buyer == 'PENTEX LTD')
                                              <td>{{ $value['style'] }}</td>
                                              @endif
                                              @if ($data->buyer == 'PENTEX LTD')
                                              <td>{{ $value['docket_no'] }}</td>
                                              @endif
                                              @if ($data->buyer == 'PENTEX LTD')
                                              <td>{{ $value['destination_no'] }}</td>
                                              @endif
                                              @if ($data->buyer == 'PENTEX LTD')
                                              <td>{{ $value['kimball_no'] }}</td>
                                              @endif
                                            

                                              @if ($data->buyer == 'MARUSA Co.,Ltd.' || $data->buyer == 'JC PENNEY')
                                              <td>ITEM</td>
                                              @endif
                                            {{-- Marubeni, Hexapole, Express World --}}
                                              @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED' || $data->buyer == 'EXPRESS, LLC')
                                              <td>{{ $value['size'] }}</td>
                                              @endif
                                            {{-- pentex,HAP, Express World, Asmara Adrenaline --}}
                                              @if ($data->buyer == 'PENTEX LTD' ||$data->buyer == 'HAP., CO LTD'|| $data->buyer == 'ASMARA INTERNATIONAL LIMITED' || $data->buyer == 'EXPRESS, LLC')
                                              <td>{{ $value['color'] }}</td>
                                              @endif
                                              @if ($data->buyer == 'PENTEX LTD')
                                              <td class="text-left">{{ $value['sub'] }}</td>
                                              @endif
                                              @if ($data->buyer == 'PENTEX LTD')
                                              <td>{{ $value['lp'] }}</td>
                                              @endif
                                              @if ($data->buyer == 'PENTEX LTD')
                                              <td>{{ $value['carton_qty'] }}</td>
                                              @endif
                                              @if ($data->buyer == 'PENTEX LTD')
                                            <td>{{ $value['no_of_units'] }}</td>
                                              @endif
                                              @if ($data->buyer == 'PENTEX LTD')
                                              <td>{{ $value['no_of_set'] }}</td>
                                              @endif
                                              @if ($data->buyer == 'PENTEX LTD')
                                                                                          <td>{{ $value['cm'] }}</td>

                                              @endif
                                              @if ($data->buyer == 'PENTEX LTD')
                                                                                          <td>{{ $value['fabric'] }}</td>

                                              @endif
                                              @if ($data->buyer == 'PENTEX LTD')
                                                                                          <td>{{ $value['trims'] }}</td>

                                              @endif
                                              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                                <td class="text-left">{{ $value['descOfGood'] }}</td>
                                              @endif
                                              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')

                                                        <td>{{ $value['hsCode'] }}</td>

                                              @endif
                                            {{-- agron, marubeni, Hexapole, Teijin, Hongkong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}}
                                              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                                <td>{{  number_format($value['qty'], 0, ",", ".")  }}</td>
                                              @endif
                                            {{-- agron, marubeni, Hexapole, Teijin, Hong kong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JC P Penney, Ritra Cargo, Adrenaline --}}
                                              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                                  <td>{{ $value['unit'] }}</td>
                                                              
                                              @endif
                                            {{-- agron, marubeni, Hexapole, Teijin, Hongkong, Matsuoka, Jiangsu, Marusa, Toyota, Benlux, HAP, Express World, JCP Penney, Ritra Cargo, Adrenaline --}}
                                              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                                  <td class="text-left">$ {{ number_format( $value['unitPrice'], 2, ",", ".") }}</td>
                                              @endif

                                              @if ($data->buyer == 'AGRON, INC.' ||$data->buyer == 'MARUBENI CORPORATION JEPANG' ||$data->buyer == 'MARUBENI FASHION LINK LTD.'|| $data->buyer == 'HEXAPOLE COMPANY LIMITED'||$data->buyer == 'MATSUOKA TRADING CO., LTD.'|| $data->buyer == 'MARUSA Co.,Ltd.'|| $data->buyer == 'JIANGSU TEXTILE INDUSTRY' ||$data->buyer == ' TOYOTA TSUSHO CORPORATION' ||$data->buyer == 'YAMATO TRANSPORT (S) PTE LTD'||$data->buyer == 'Ritra Cargo Holland B.V.' ||$data->buyer == 'HONG KONG DESCENTE TRADING LTD.'||$data->buyer == 'HAP., CO LTD' ||$data->buyer == 'EXPRESS, LLC' ||$data->buyer == 'ASMARA INTERNATIONAL LIMITED'|| $data->buyer == 'JC PENNEY' || $data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831' || $data->buyer == 'PENTEX LTD')
                                                    <td class="text-left">$ {{number_format( $value['amount'], 2, ",", ".") }}</td>
                                              @endif
                                        </tr>
                                        @endforeach
                                      </tbody>
                                      <tfoot>
                                        <tr>
                                          @if ($data->buyer == 'AGRON, INC.')
                                          <th colspan="6">INVOICE TOTAL</th>
                                          @elseif ($data->buyer == 'MATSUOKA TRADING CO., LTD.')
                                          <th colspan="5">INVOICE TOTAL</th>
                                          @elseif ($data->buyer == 'HEXAPOLE COMPANY LIMITED')
                                          <th colspan="8">INVOICE TOTAL</th>
                                          @elseif ($data->buyer == 'TEIJIN FRONTIER CO., LTD SEC. 831')
                                          <th colspan="4">INVOICE TOTAL</th>
                                          @elseif ($data->buyer == 'PENTEX LTD')
                                          <th colspan="16">INVOICE TOTAL</th>
                                          @else
                                          <th colspan="6">INVOICE TOTAL</th>
                                          @endif
                                          <th colspan="2">{{ number_format($dataInvoiceHeader->totalPack, 0, ",", ".")}} {{ $dataInvoiceHeader->unit }}</th>
                                          <th></th>
                                          <th class="text-left">$ {{number_format($dataInvoiceHeader->totalInvoice, 2, ",", ".")}}</th>
                                        </tr>
                                      </tfoot>
                                    </table>
                                  @if ($data->buyer == 'PENTEX LTD')
                                  </div>
                                  @endif
                                  <div class="footerTable">
                                    <div class="containerFooter">
                                      <div class="all">
                                        <div class="title-12-dark text-center" style="font-style: italic">{{ $dataInvoiceHeader->terbilang }}</div>
                                      </div>
                                    </div>
                                    @if ($data->buyer != 'MARUBENI CORPORATION JEPANG' && $data->buyer != 'MARUBENI FASHION LINK LTD.' && $data->buyer != 'PENTEX LTD')
                                    <!-- FOOTER CONTENT NO BANK -->
                                    {{-- ALL --}}
                                    <div class="containerFooter">
                                      <div class="half">
                                        <div class="title">Manufacture Name & Address :</div>
                                        <div class="desc">{{ $invoiceHeader->manufacture_name }}</div>  
                                        <div class="desc">{{ $invoiceHeader->address_manu }}</div>  
                                        <div class="desc">{{ $invoiceHeader->country_manu }}</div>  
                                        <div class="desc">TEL :{{ $invoiceHeader->telp_manu }}</div>  
                                        <div class="desc">MID CODE :{{ $invoiceHeader->mid_manu }}</div>
                                      </div>
                                      <div class="half justify-end" style="align-items: flex-start">
                                        <div class="grid-center">
                                          <div class="title">ON BEHALF OF PT GISTEX GARMEN INDONESIA</div>
                                          <img src="{{url('images/iconpack/invoice/ttd.svg')}}">
                                        </div>
                                      </div>
                                    </div>
                                    @endif
                                    @if ($data->buyer == 'MARUBENI CORPORATION JEPANG' || $data->buyer == 'MARUBENI FASHION LINK LTD.')
                                    <!-- FOOTER CONTENT WTTH BANK -->
                                    {{-- HANYA MARUBENI --}}
                                   <div class="containerFooter">
                                      <div class="half">
                                        <div class="title">Manufacture Name & Address :</div>
                                        <div class="desc">{{ $invoiceHeader->manufacture_name }}</div>  
                                        <div class="desc">{{ $invoiceHeader->address_manu }}</div>  
                                        <div class="desc">{{ $invoiceHeader->country_manu }}</div>  
                                        <div class="desc">TELP : {{ $invoiceHeader->telp_manu }}</div>  
                                        <div class="desc">MID CODE : {{ $invoiceHeader->mid_manu }}</div>

                                        <div class="title mt-3">Transfer Bank :</div>
                                        <div class="desc">CITIBANK N.A</div>  
                                        <div class="desc">Jl. Asia Afrika No.135-137 Bandung Swift Code : CITIIDJXBDG </div>  
                                        <div class="desc">Account USD : 0700247 503 In the name of : PT. Gistex Garmen Indonesia</div>  
                                      </div>
                                      <div class="half justify-end" style="align-items: flex-start">
                                        <div class="grid-center">
                                          <div class="title">ON BEHALF OF PT GISTEX GARMEN INDONESIA</div>
                                          <img src="{{url('images/iconpack/invoice/ttd.svg')}}">
                                        </div>
                                      </div>
                                    </div> 
                                    @endif

                                    @if ( $data->buyer == 'PENTEX LTD')
                                    {{-- HANYA PANTEX --}}
                                    <div class="containerFooter">
                                      <div class="half">
                                        <div class="title">PAYMENT INSTRUCTION</div>
                                      </div>
                                      <div class="half">
                                        <div class="title text-center">ON BEHALF OF PT GISTEX GARMEN INDONESIA</div>
                                      </div>
                                    </div>
                                    <div class="containerFooter">
                                      <div class="half">
                                        <div class="desc flex">
                                          <div style="width:120px">BENEFICIARY NAME</div><div class="mx-3">:</div>{{$invoiceHeader->bank_detail}}
                                        </div>
                                        <div class="desc flex">
                                          <div style="width:120px">BANK NAME</div><div class="mx-3">:</div>{{$invoiceHeader->bene_name}}
                                        </div>
                                        <div class="desc flex">
                                          <div style="width:120px">BANK ADDRESS</div><div class="mx-3">:</div>{{$invoiceHeader->bank_name}}
                                        </div>
                                        <div class="desc flex">
                                          <div style="width:120px">SWIFT CODE</div><div class="mx-3">:</div>{{$invoiceHeader->bank_acc}}
                                        </div>
                                        <div class="desc flex">
                                          <div style="width:120px">ACCOUNT NUMBER</div><div class="mx-3">:</div>{{$invoiceHeader->bank_swift}}
                                        </div>
                                      </div>
                                      <div class="half justify-center">
                                        <img src="{{url('images/iconpack/invoice/ttd.svg')}}">
                                      </div>
                                    </div>
                                    @endif
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script>
  $('.saveAll').on('click', function (event) {
    swal({
      position: 'center',
      icon: 'success',
      title: 'Successfully',
      text: 'Invoice data Sucessfully Created.',
      buttons: false,
      timer: 5000
    })
  });
</script>

<script>
  $('.select2bs4').select2({
      theme: 'bootstrap4'
  })

  $(function () {
    $('[data-toggle="popover"]').popover()
  })
</script>
<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    "pageLength": 10,
    "dom": '<"search"><"top">rt<"bottom"><"clear">'
    });
    $('#SearchBtn').on( 'keyup click', function () {
      table.search($('#SearchText').val()).draw();
    });
  });
  var input = document.getElementById("SearchText");
    input.addEventListener("keypress", function(event) {
      if (event.key === "Enter") {
        event.preventDefault();
        document.getElementById("SearchBtn").click();
      }
  });
</script>
@endpush

