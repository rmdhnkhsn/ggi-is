@extends("layouts.app")
@section("title","Factory Audit")
@push("styles")
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/assets3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

@endpush
@push("sidebar")
  @include('qc.factory_audit.layouts.navbar')
@endpush

@section("content")
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 justify-center">
              <span class="fa-packing-title">Packing Audit</span>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <form id="formStoreFactoryAudit" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xl-9 ml-auto mr-auto">
                    <div class="cards py-5 px-4">
                        <div class="row">
                            <div class="col-md-6">
                                <span class="general-identity-title">Tanggal FA</span>
                                <div class="input-group mb-3 mt-2">
                                    <div class="input-group date" id="FADate" data-target-input="nearest">
                                        <div class="input-group-append " data-target="#FADate" data-toggle="datetimepicker">
                                            <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span><i class="ml-2 fas fa-caret-down"></i></div>
                                        </div>
                                        <input type="text" class="form-control datetimepicker-input input-data-fa" data-target="#FADate" name="tanggal_fa" placeholder="Pilih Tanggal"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="general-identity-title">Nomor Carton</span>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control input-data-fa" id="" name="no_carton" placeholder="masukan nomor karton">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="general-identity-title">Select PO Number</span>
                                <div class="input-group mb-3 mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-select-GI" for="F560020_SEG4">PO</span>
                                    </div>
                                    <select class=" form-control select-wo select2bs4" id="F4801_VR01" name="po_number">
                                        <option  selected> </option>
                                        <option value="NOTFOUND">PO NUMBER NOT FOUND</option>
                                        @foreach($dataWO as $key => $value)
                                        <option value="{{$value->F4801_VR01}}">{{$value->F4801_VR01}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <span class="general-identity-title">Article </span>

                                <div class="input-group mb-3 mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-select-GI" for="F560020_SEG4">Article</span>
                                    </div>
                                    <select class="load-article form-control select2bs4" id="article" name="article" required>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="general-identity-title">Select Factory </span>
                                <div class="input-group mb-3 mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-select-GI" for="">Factory</span>
                                    </div>
                                    <select class="form-control select2bs4" id="" name="" required>
                                        <option  selected></option>
                                        <option value="Gistex Cileunyi">Gistex Cileunyi</option>
                                        <option value="Gistex Majalen1gka">Gistex Majalengka1</option>
                                        <option value="GisteMajalengka2yi">Gistex Majalengka2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="general-identity-title">Buyer</span>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control input-data-fa" id="" name="" placeholder="Buyer...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="general-identity-title">Style</span>
                                <div class="input-group mt-2 mb-3">
                                    <input type="text" class="form-control input-data-fa" id="" name="" placeholder="Style name...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="general-identity-title">Color</span>
                                <div class="input-group mt-2 mb-3">
                                    <input type="text" class="form-control input-data-fa" id="" name="" placeholder="Green/ Red/ Yellow/ Blue">
                                </div>
                            </div>
                            <div class="col-12">
                                <span class="general-identity-title">Item</span>
                                <div class="input-group mb-3 mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-select-GI" for="">Item</span>
                                    </div>
                                    <select class="form-control select2bs4" id="" name="" required>
                                        <option  selected></option>
                                        <option value="Adidas">Adidas</option>
                                        <option value="H&M">H&M</option>
                                        <option value="Mizuno">Mizuno</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="attr-detail-packing" hidden>
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="general-identity-title">Select Factory</span>
                                    <div class="input-group mb-3 mt-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-select" for="nama_branch">Factory</span>
                                        </div>
                                        <select class="form-control select2bs4 input-data-fa" id="factory" name="factory">
                                            <option  selected> </option>
                                            @foreach($dataBranch as $key => $value)
                                            <option value="{{$value->nama_branch}}">{{$value->nama_branch}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <span class="general-identity-title">Buyer</span>
                                    <div class="input-group mb-3 mt-2">
                                        <input type="text" class="form-control border-input buyer" name="buyer" id="F0101_ALPH" placeholder="Buyer..." readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <span class="general-identity-title">Style</span>
                                    <div class="input-group mb-3 mt-2">
                                       
                                        <input type="text" class="form-control border-input style" id="F4801_DL01" name="style" placeholder="Style Name..." readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <span class="general-identity-title">Color</span>
                                    <div class="input-group mb-3 mt-2">
                                        <input type="text" class="form-control border-input" id="color" name="color" placeholder="color Name..." >
                                        {{-- <select class="load-color form-control js-example-basic-multiple" name="color[]" multiple="multiple" style="width: 550px;" required></select> --}}
                                        {{-- <input type="text" class="form-control border-input F560020_DSC1 js-example-basic-multiple" name="states[]" multiple="multiple"  id="F560020_DSC1" name="color" placeholder="color"> --}}
                                    </div>
                                </div>
                                <div class="col-12">
                                    <span class="general-identity-title">Item</span>
                                    <div class="input-group mb-3 mt-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-select-GI" for="">Item</span>
                                        </div>
                                        <select class="form-control select2bs4" id="" name="item" required>
                                            @foreach ($itemFA as $key =>$value)
                                            <option  selected></option>
                                            <option value="Adidas">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <span class="general-identity-title">Shipment Periode / TOD</span>
                                <div class="input-group mb-3 mt-2">
                                    <div class="input-group date" id="shipmentdate" data-target-input="nearest">
                                        <div class="input-group-append " data-target="#shipmentdate" data-toggle="datetimepicker">
                                            <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span><i class="ml-2 fas fa-caret-down"></i></div>
                                        </div>
                                        <input type="text" class="form-control datetimepicker-input input-data-fa" data-target="#shipmentdate" name="tanggal" placeholder="Pilih Tanggal"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <span class="general-identity-title">Destination</span>
                                <div class="input-group mb-3 mt-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-select" for="F0005_DL01">Destination</span>
                                        </div>
                                    <select class="form-control select2bs4" id="destination" name="destination" required>
                                        <option  selected> </option>
                                        @foreach($destination as $key => $value)
                                        <option value="{{$value->F0005_DL01}}">{{$value->F0005_DL01}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="general-identity-title">Total Size</span>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control input-data-fa total_size"    id="order_qty" name="order_qty" placeholder="masukan size">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="general-identity-title">Auditor</span>
                                <div class="input-group mb-3 mt-2">
                                    <select class="form-control input-data-fa js-example-basic-single" name="auditor_name[]" multiple="multiple">
                                        @foreach($dataAuditor as $key => $value)
                                        <option value="{{$value->nama_auditor}}">{{$value->nama_auditor}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <span class="general-identity-title">QTY Order</span>
                                <div class="field mt-2">
                                    <input type="text" class="qty_order" id="qty_order2" name="qty_order2" placeholder="QTY Order">
                                    
                                     {{-- <select class="load-order form-control select2bs4" id="order_qty" name="order_qty"  style="width: 550px;" required>
                                    </select> --}}

                                    {{-- <select class=" form-control select-wo select2bs4" id="F4801_UORG" name="order_qty">
                                        <option  selected> </option>
                                        @foreach($dataWO as $key => $value)
                                        <option value="{{$value->F4801_UORG}}">{{$value->F4801_UORG}}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <span class="general-identity-title">QTY Per Pack</span>
                                <div class="field mt-2">
                                    <input type="text" class="qty_pack" id="qty-pack" name="qty_pack" placeholder="QTY Per Pack">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <span class="general-identity-title">QTY Per Carton</span>
                                <div class="field mt-2">
                                    <input type="text" class="qty_carton" id="qty_carton" name="qty_carton" placeholder="QTY Per Carton">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <span class="general-identity-title">Total QTY Carton</span>
                                <div class="field mt-2">
                                    <input type="text" class="total_carton" id="total_carton" name="total_carton" placeholder="Total QTY Carton" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-fa-startA start-audit" id="start" name="start_time">Start Audit<i class="ml-2 fas fa-arrow-right" required ></i></button>
                            </div>
                        </div>
                        <div hidden class="attr-after-start-audit">
                            <div class="row mt-4">
                                <div class="col-xl-6 col-lg-6">
                                    <span class="general-identity-title">Select AQL</span>
                                    <div class="ks-cboxtags mb-3 mt-2">
                                        <input type="checkbox" id="checkboxOne" class="aql-adidas" name="is_select_aql" value="1">
                                        <label for="checkboxOne">
                                            <span class="radio-desc">AQL Adidas</span>
                                            <i class="fs-18 fas fa-check"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <span class="general-identity-title text-white">aql</span>
                                    <div class="input-group mb-3 mt-2">
                                        <input type="text" class="form-control border-input percentage-aql" id="" name="aql" placeholder="AQL 0%">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <span class="general-identity-title">Sample (Carton)</span>
                                    <div class="input-group mb-3 mt-2">
                                        <input type="text" class="form-control border-input sample-carton" id="sample_carton" name="sample_carton" placeholder="Sample carton..." readonly>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <span class="general-identity-title">Sample (Pcs)</span>
                                    <div class="input-group mb-3 mt-2">
                                        <input type="text" class="form-control border-input sample_pcs" id="sample_pcs" name="sample_pcs" placeholder="Sample pcs..." readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <button type="button" class="btn wp-btn-start mr-2" data-toggle="modal" data-target="#fa-add">Add
                                        <i class="fs-18 fas fa-plus"></i>
                                    </button>
                                    <div class="modal fade" id="fa-add" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content" style="border-radius:10px">
                                                <div class="row">
                                                    <div class="col-12 py-3 px-4">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="row px-4">
                                                    <div class="col-12">
                                                        <div class="wp-modal-title">Add Reject</div>
                                                    </div>
                                                    <div class="col-12">
                                                        <span class="general-identity-title">Remark</span>
                                                        <div class="fa-message mt-2">
                                                            <textarea placeholder="Input Remark.." name="remark" class="remark-name" id="remark"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <span class="general-identity-title">QTY Reject (Pack)</span>
                                                        <div class="input-group mb-3 mt-2">
                                                            <input type="text" class="form-control border-input remark-quantity" id="qty_reject" name="qty_reject" placeholder="Input Qty..." required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row px-4 pb-4">
                                                    <div class="col-12 text-right">
                                                        <button type="button" class="btn wp-btn-start store-remark">Save<i class="wp-icon-btn fas fa-download"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade modalUpdateRemark" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content" style="border-radius:10px">
                                        <div class="row">
                                            <div class="col-12 py-3 px-4">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row px-4">
                                            <div class="col-12">
                                                <div class="wp-modal-title">Update Reject</div>
                                                <input type="hidden" class="last-id_remark">
                                                <input type="hidden" class="last-quantity">
                                            </div>
                                            <div class="col-12">
                                                <span class="general-identity-title">Remark</span>
                                                <div class="fa-message mt-2">
                                                    <textarea placeholder="Input Remark.." class="new-remark"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <span class="general-identity-title">QTY Reject</span>
                                                <div class="input-group mb-3 mt-2">
                                                    <input type="text" class="form-control border-input new-quantity" placeholder="Input Qty..." required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-4 pb-4">
                                            <div class="col-12 text-right">
                                                <button type="button" class="btn wp-btn-start update-remark">Save<i class="wp-icon-btn fas fa-download"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3 scrollX" id="scroll-bar">
                                <div class="col-12 text-center">
                                    <table class="table table-bordered table-striped no-wrap">
                                        <thead>
                                            <tr>
                                            <th width="70%">Remark</th>
                                            <th width="15%">Quantity</th>
                                            <th width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="lists-remark">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-xl-6 col-lg-6">
                                    <span class="general-identity-title">Total Reject (Pcs)</span>
                                    <div class="input-group mb-3 mt-2">
                                        <input type="text" class="form-control border-input total-reject-pcs" id="total_reject_pcs" name="total_reject_pcs" placeholder="Sample pcs..."readonly>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <span class="general-identity-title">Total Reject (Carton)</span>
                                    <div class="input-group mb-3 mt-2">
                                        <input type="text" class="form-control border-input total-reject-carton" id="total_reject_carton" name="total_reject_carton" placeholder="Sample carton...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-3">
                                    <div class="file-upload">
                                        <div class="image-upload-wrap-fa">
                                            <i class="icon-upload-fa fas fa-camera"></i>
                                            <button class="file-upload-btn-fa" type="button" id="file1"
                                                onclick="$('.file-upload-input-fa').trigger('click')">Open Camera</button>
                                            <input class="file-upload-input-fa" type='file' id="file1" name="file1"
                                                onchange="readURL_fa(this);" accept="image/*" />
                                            <div class="drag-text">
                                                <h5>or select from galery</h5>
                                            </div>
                                        </div>
                                        <div class="file-upload-content-fa">
                                            <img class="file-upload-image-fa" src="" alt=" Image Format Only" data-toggle="lightbox" />
                                            <div class="image-title-wrap">
                                                <button type="button" onclick="removeUpload_fa()" class="remove-image2"><i class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="file-upload">
                                        <div class="image-upload-wrap-fa2">
                                            <button class="file-upload-btn-fa2" type="button" id="file2" name="file2"
                                                onclick="$('.file-upload-input-fa2').trigger( 'click' )"><i
                                                    class="fas fa-plus"></i></button>
                                            <input class="file-upload-input-fa2" type='file' id="file2" name="file2" value=""
                                                onchange="readURL_fa2(this);" accept="image/*" />
                                        </div>
                                        <div class="file-upload-content-fa2">
                                            <img class="file-upload-image-fa2"
                                                src="" alt=" Image Format Only"
                                                data-toggle="lightbox" />
                                            <div class="image-title-wrap">
                                                <button type="button" onclick="removeUpload_fa2()" class="remove-image2"><i
                                                        class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="file-upload">
                                        <div class="image-upload-wrap-fa3">
                                            <button class="file-upload-btn-fa3" type="button" id="file3" name="file3"
                                                onclick="$('.file-upload-input-fa3').trigger( 'click' )"><i
                                                    class="fas fa-plus"></i></button>
                                            <input class="file-upload-input-fa3" type='file' id="file3" name="file3" value=""
                                                onchange="readURL_fa3(this);" accept="image/*" />
                                        </div>
                                        <div class="file-upload-content-fa3">
                                            <img class="file-upload-image-fa3"
                                                src="" alt=" Image Format Only"
                                                data-toggle="lightbox" />
                                            <div class="image-title-wrap">
                                                <button type="button" onclick="removeUpload_fa3()" class="remove-image2"><i
                                                        class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="file-upload">
                                        <div class="image-upload-wrap-fa4">
                                            <button class="file-upload-btn-fa4" type="button" id="file4" name="file4"
                                                onclick="$('.file-upload-input-fa4').trigger( 'click' )"><i
                                                    class="fas fa-plus"></i></button>
                                            <input class="file-upload-input-fa4" type='file' id="file4" name="file4" value=""
                                                onchange="readURL_fa4(this);" accept="image/*" />
                                        </div>
                                        <div class="file-upload-content-fa4">
                                            <img class="file-upload-image-fa4"
                                                src="" alt=" Image Format Only"
                                                data-toggle="lightbox" />
                                            <div class="image-title-wrap">
                                                <button type="button" onclick="removeUpload_fa4()" class="remove-image2"><i
                                                        class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <span class="general-identity-title">Result</span>
                                    <div class="wrapper-radio mb-3 mt-2">
                                        <input type="radio" name="result" value="PASS" class="result-radio result-passed" id="RPass">
                                        <label for="RPass" class="options option-pass">
                                            <span class="radio-desc">Audit Passed</span>
                                            <i class="f-18 icon-radio fas fa-check"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <span class="general-identity-title text-white">Result</span>
                                    <div class="wrapper-radio mb-3 mt-2">
                                        <input type="radio" name="result" value="Fail" class="result-radio result-failed" id="RFail">
                                        <label for="RFail" class="options option-fail">
                                            <span class="radio-desc">Audit Failed</span>
                                            <i class="f-18 icon-radio fas fa-times"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <span class="general-identity-title">Auditor Signature</span>
                                    <div class="mt-2" id="img_result_signature">
                                        <input type="text" id="signature" name="signature">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <span class="general-identity-title">SPV Signature</span>
                                    <div class="mt-2" id="img_result_signature_spv">
                                        <input type="text" id="signature_spv" name="signature_spv">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-xl-6 col-lg-6">
                            <div class="fa-cards flex">
                                <div class="fa-start-time">
                                    Start Time
                                </div>
                                <div class="fa-start-desc start-audit-time"> <!-- menampilkan tanggal ketika start-->
                                    
                                </div>
                                <input type="hidden" name="start_audit" class="start-audit">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="fa-cards flex">
                                <div class="fa-proses-time">
                                    Process Time
                                </div>
                                <div class="fa-proses-desc" ><!-- menampilkan waktu ketika start dimulai-->
                                    <div id="timer">
                                        <span id="hours">00:</span>
                                        <span id="mins">00:</span>
                                        <span id="seconds">00</span>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-fa-finish store-factory-audit save" id="finish_time" class="finish_time">Finish<i class="ml-3 fs-20 fas fa-arrow-right"></i></button> <!-- menampilkan waktu berhenti ketika start dan menyimpan data-->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection

@push("scripts")
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js" integrity="sha512-01CJ9/g7e8cUmY0DFTMcUw/ikS799FHiOA0eyHsUWfOetgbx/t6oV4otQ5zXKQyIrQGTHSmRVPIgrgLcZi/WMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{asset('common/js/factory/jquery.signature.js')}}"></script>
<script>
    (function () {
    var __slice = [].slice;

    (function ($) {
        var Sketch;
        $.fn.sketch = function () {
            var args, key, sketch;
            key = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
            if (this.length > 1) {
                $.error('Sketch.js can only be called on one element at a time.');
            }
            sketch = this.data('sketch');
            if (typeof key === 'string' && sketch) {
                if (sketch[key]) {
                    if (typeof sketch[key] === 'function') {
                        return sketch[key].apply(sketch, args);
                    } else if (args.length === 0) {
                        return sketch[key];
                    } else if (args.length === 1) {
                        return sketch[key] = args[0];
                    }
                } else {
                    return $.error('Sketch.js did not recognize the given command.');
                }
            } else if (sketch) {
                return sketch;
            } else {
                this.data('sketch', new Sketch(this.get(0), key));
                return this;
            }
        };
        Sketch = (function () {

            function Sketch(el, opts) {
                this.el = el;
                this.canvas = $(el);
                this.context = el.getContext('2d');
                this.options = $.extend({
                    toolLinks: true,
                    defaultTool: 'marker',
                    defaultColor: '#000000',
                    defaultSize: 2
                }, opts);
                this.painting = false;
                this.color = this.options.defaultColor;
                this.size = this.options.defaultSize;
                this.tool = this.options.defaultTool;
                this.actions = [];
                this.action = [];
                this.canvas.bind('click mousedown mouseup mousemove mouseleave mouseout touchstart touchmove touchend touchcancel', this.onEvent);
                if (this.options.toolLinks) {
                    $('body').delegate("a[href=\"#" + (this.canvas.attr('id')) + "\"]", 'click', function (e) {
                        var $canvas, $this, key, sketch, _i, _len, _ref;
                        $this = $(this);
                        $canvas = $($this.attr('href'));
                        sketch = $canvas.data('sketch');
                        _ref = ['color', 'size', 'tool'];
                        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                            key = _ref[_i];
                            if ($this.attr("data-" + key)) {
                                sketch.set(key, $(this).attr("data-" + key));
                            }
                        }
                        if ($(this).attr('data-download')) {
                            sketch.download($(this).attr('data-download'));
                        }
                        return false;
                    });
                }
            }

            Sketch.prototype.download = function (format) {
                var mime;
                format || (format = "png");
                if (format === "jpg") {
                    format = "jpeg";
                }
                mime = "image/" + format;
                return window.open(this.el.toDataURL(mime));
            };

            Sketch.prototype.set = function (key, value) {
                this[key] = value;
                return this.canvas.trigger("sketch.change" + key, value);
            };

            Sketch.prototype.startPainting = function () {
                this.painting = true;
                return this.action = {
                    tool: this.tool,
                    color: this.color,
                    size: parseFloat(this.size),
                    events: []
                };
            };


            Sketch.prototype.stopPainting = function () {
                if (this.action) {
                    this.actions.push(this.action);
                }
                this.painting = false;
                this.action = null;
                return this.redraw();
            };

            Sketch.prototype.onEvent = function (e) {
                if (e.originalEvent && e.originalEvent.targetTouches) {
                    e.pageX = e.originalEvent.targetTouches[0].pageX;
                    e.pageY = e.originalEvent.targetTouches[0].pageY;
                }
                $.sketch.tools[$(this).data('sketch').tool].onEvent.call($(this).data('sketch'), e);
                e.preventDefault();
                return false;
            };

            Sketch.prototype.redraw = function () {
                var sketch;
                //this.el.width = this.canvas.width();
                this.context = this.el.getContext('2d');
                sketch = this;
                $.each(this.actions, function () {
                    if (this.tool) {
                        return $.sketch.tools[this.tool].draw.call(sketch, this);
                    }
                });
                if (this.painting && this.action) {
                    return $.sketch.tools[this.action.tool].draw.call(sketch, this.action);
                }
            };

            return Sketch;

        })();
        $.sketch = {
            tools: {}
        };
        $.sketch.tools.marker = {
            onEvent: function (e) {
                switch (e.type) {
                    case 'mousedown':
                    case 'touchstart':
                        if (this.painting) {
                            this.stopPainting();
                        }
                        this.startPainting();
                        break;
                    case 'mouseup':
                        //return this.context.globalCompositeOperation = oldcomposite;
                    case 'mouseout':
                    case 'mouseleave':
                    case 'touchend':
                        //this.stopPainting();
                    case 'touchcancel':
                        this.stopPainting();
                }
                if (this.painting) {
                    this.action.events.push({
                        x: e.pageX - this.canvas.offset().left,
                        y: e.pageY - this.canvas.offset().top,
                        event: e.type
                    });
                    return this.redraw();
                }
            },
            draw: function (action) {
                var event, previous, _i, _len, _ref;
                this.context.lineJoin = "round";
                this.context.lineCap = "round";
                this.context.beginPath();
                this.context.moveTo(action.events[0].x, action.events[0].y);
                _ref = action.events;
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    event = _ref[_i];
                    this.context.lineTo(event.x, event.y);
                    previous = event;
                }
                this.context.strokeStyle = action.color;
                this.context.lineWidth = action.size;
                return this.context.stroke();
            }
        };
        return $.sketch.tools.eraser = {
            onEvent: function (e) {
                return $.sketch.tools.marker.onEvent.call(this, e);
            },
            draw: function (action) {
                var oldcomposite;
                oldcomposite = this.context.globalCompositeOperation;
                this.context.globalCompositeOperation = "destination-out";
                action.color = "rgba(0,0,0,1)";
                $.sketch.tools.marker.draw.call(this, action);
                return this.context.globalCompositeOperation = oldcomposite;
            }
        };
    })(jQuery);

    }).call(this);


    (function ($) {
    $.fn.SignaturePad = function (options) {

        //update the settings
        var settings = $.extend({
            allowToSign: true,
            img64: 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7',
            border: '1px solid #c7c8c9',
            width: '300px',
            height: '150px',
            callback: function () {
                return true;
            }
        }, options);

        //control should be a textbox
        //loop all the controls
        var id = 0;

        //add a very big pad
        var big_pad = $('#signPadBig');
        var back_drop = $('#signPadBigBackDrop');
        var canvas = undefined;
        if (big_pad.length == 0) {

            back_drop = $('<div>')
            back_drop.css('position', 'fixed');
            back_drop.css('top', '0');
            back_drop.css('right', '0');
            back_drop.css('bottom', '0');
            back_drop.css('left', '0');
            back_drop.css('z-index', '1040 !important');
            back_drop.css('background-color', '#000');
            back_drop.css('display', 'none');
            back_drop.css('filter', 'alpha(opacity=50)');
            back_drop.css('opacity', '0.5');
            $('body').append(back_drop);

            big_pad = $('<div>');
            big_pad.css('display', 'none');
            big_pad.css('position', 'fixed');
            big_pad.css('margin', '0 auto');
            big_pad.css('top', '0');
            big_pad.css('bottom', '0');
            big_pad.css('right', '0');
            big_pad.css('left', '0');
            big_pad.css('z-index', '999999999999 !important');
            big_pad.css('overflow', 'hidden');
            big_pad.css('outline', '0');
            big_pad.css('-webkit-overflow-scrolling', 'touch');

            big_pad.css('right', '0');
            big_pad.css('border', '1px solid #c8c8c8');
            big_pad.css('padding', '15px');
            big_pad.css('background-color', 'white');
            big_pad.css('margin-top', '40px');
            big_pad.css('max-width', '600px');
            big_pad.css('height', '350');
            big_pad.css('border-radius', '10px');
            big_pad.attr('id', 'signPadBig');
            $('body').append(big_pad);

            var update_canvas_size = function () {
                var w = big_pad.width() //* 0.95;
                var h = big_pad.height() - 55;

                canvas.attr('width', w);
                canvas.attr('height', h);
            }


            canvas = $('<canvas>');
            canvas.css('display', 'block');
            canvas.css('margin', '0 auto');
            canvas.css('border', '1px solid #c8c8c8');
            canvas.css('border-radius', '10px');
            //canvas.css('width', '90%');
            //canvas.css('height', '80%');
            big_pad.append(canvas);

            update_canvas_size();
            $(window).on('resize', function () {
                update_canvas_size();
            });

            var clearCanvas = function () {
                canvas.sketch().action = null;
                canvas.sketch().actions = [];       // this line empties the actions. 
                var ctx = canvas[0].getContext("2d");
                ctx.clearRect(0, 0, canvas[0].width, canvas[0].height);
                return true
            }

            var _get_base64_value = function () {
                var text_control = $.data(big_pad[0], 'control');  //settings.control; // $('#' + big_pad.attr('id'));
                return $(text_control).val();
            }

            var copyCanvas = function () {
                //get data from bigger pad
                var sigData = canvas[0].toDataURL("image/png");

                var _img = new Image;
                _img.onload = resizeImage;
                _img.src = sigData;

                var targetWidth = canvas.width();
                var targetHeight = canvas.height();

                function resizeImage() {
                    var imageToDataUri = function (img, width, height) {

                        // create an off-screen canvas
                        var canvas = document.createElement('canvas'),
                            ctx = canvas.getContext('2d');

                        // set its dimension to target size
                        canvas.width = width;
                        canvas.height = height;

                        // draw source image into the off-screen canvas:
                        ctx.drawImage(img, 0, 0, width, height);

                        // encode image to data-uri with base64 version of compressed image
                        return canvas.toDataURL();
                    }

                    var newDataUri = imageToDataUri(this, targetWidth, targetHeight);
                    var control_img = $.data(big_pad[0], 'img');
                    if (control_img)
                        $(control_img).attr("src", newDataUri);

                    var text_control = $.data(big_pad[0], 'control');  //settings.control; // $('#' + big_pad.attr('id'));
                    if (text_control)
                        $(text_control).val(newDataUri);
                }
            }

            var buttons = [
                 {
                     title: 'Close',
                     callback: function () {
                         clearCanvas();
                         big_pad.slideToggle(function () {
                             back_drop.hide('fade');
                         });

                     }
                 },
                 {
                     title: 'Clear',
                     callback: function () {
                         clearCanvas();
                         if (settings.callback)
                             settings.callback(_get_base64_value(), 'clear');
                     }
                 },
                 {
                     title: 'Accept',
                     callback: function () {
                         copyCanvas();
                         clearCanvas();
                         big_pad.slideToggle(function () {
                             back_drop.hide('fade', function () {
                                 if (settings.callback)
                                     settings.callback(_get_base64_value(), 'accept');
                             });
                         });
                     }
                 }].forEach(function (e) {
                     var btn = $('<button>');
                     btn.attr('type', 'button');
                     btn.css('border', '1px solid #c8c8c8');
                     btn.css('background-color', 'white');
                     btn.css('padding', '10px');
                     btn.css('display', 'block');
                     btn.css('margin-top', '15px');
                     btn.css('margin-right', '5px');
                     btn.css('cursor', 'pointer');
                     btn.css('border-radius', '5px');
                     btn.css('float', 'right');
                     btn.css('height', '40px');
                     btn.text(e.title);
                     btn.on('click', function () {
                         e.callback(e.title);
                     })
                     big_pad.append(btn);

                 });

        }
        else {
            canvas = big_pad.find('canvas')[0];
        }

        //init the signpad
        if (canvas) {
            var sign1big = $(canvas).sketch({ defaultColor: "#000", defaultSize: 5 });
        }

        //for each control
        return this.each(function () {

            var control = $(this);
            control.hide();

            //get the control parent
            var wrapper = control.parent();
            var img = $('<img>');

            //style it
            img.css("cursor", "pointer");
            img.css("border", settings.border);
            img.css("height", settings.height);
            img.css("width", settings.width);
            img.css('border-radius', '5px')
            img.attr("src", settings.img64);

            if (typeof (wrapper) == 'object') {
                wrapper.append(img);
            }

            //init the big sign pad
            if (settings.allowToSign == true) {
                //click to the pad bigger
                img.on('click', function () {
                    //show the pad
                    back_drop.show();
                    big_pad.slideToggle();

                    //save control to use later
                    $.data(big_pad[0], 'img', img);
                    $.data(big_pad[0], 'control', control);

                    //settings.control = control;
                    //settings.img = img;
                });
            }
        });
    };


    })(jQuery);

</script>

<script>
  $(document).ready(function () {
            var sign = $('#signature').SignaturePad({
                allowToSign: true,
                img64: 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7',
                border: '1px solid rgba(0, 123, 255, 0.5)',
                width: '100%',
                height: '180px',
                callback: function (data, action) {
                    console.log(data);
                }
            });

            var sign = $('#signature_spv').SignaturePad({
                allowToSign: true,
                img64: 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7',
                border: '1px solid rgba(0, 123, 255, 0.5)',
                width: '100%',
                height: '180px',
                callback: function (data, action) {
                    console.log(data);
                }
            });

        })
</script>

<script>
    $('#shipmentdate').datetimepicker({
        format: 'DD-MM-Y',
        showButtonPanel: true
    });
    $('#FADate').datetimepicker({
        format: 'DD-MM-Y',
        showButtonPanel: true
    });
      $('#FADate').datetimepicker({
        format: 'DD-MM-Y',
        showButtonPanel: true
    });
</script>

<script>
var hours =0;
var mins =0;
var seconds =0;

$('#start').click(function(){
      startTimer();
});

$('#stop').click(function(){
      clearTimeout(timex);
});

$('#reset').click(function(){
      hours =0;      mins =0;      seconds =0;
  $('#hours','#mins').html('00:');
  $('#seconds').html('00');
});

function startTimer(){
  timex = setTimeout(function(){
      seconds++;
    if(seconds >59){seconds=0;mins++;
       if(mins>59) {
       mins=0;hours++;
         if(hours <10) {$("#hours").text('0'+hours+':')} else $("#hours").text(hours+':');
        }
                       
    if(mins<10){                     
      $("#mins").text('0'+mins+':');}       
       else $("#mins").text(mins+':');
                   }    
    if(seconds <10) {
      $("#seconds").text('0'+seconds);} else {
      $("#seconds").text(seconds);
      }
     
    
      startTimer();
  },1000);
}
    
      
</script>
<script>
   $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
   $(document).ready(function() {
    $(".js-example-basic-single").select2();
});

    $('.select2bs4').select2({
    theme: 'bootstrap4'
});
</script>

   
 <!--end signature-->
<!-- js inputan -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
     $(document).ready(function() {
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    });

    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#example1 tfoot th').each( function () {
            var title = $('#example1 thead th').eq( $(this).index() ).text();
            $(this).html( '<input type="text" style="height:2em;" placeholder="Search '+title+'" />' );
        } );
    
        // DataTable
        var table = $('#example1').DataTable(
          {
            "pageLength": 5,
            "responsive": false, 
            "lengthChange": true, 
            "autoWidth": false, 
            "scrollX": true,
            ordering: false,
          }
        );
    
        // Apply the search
        table.columns().every( function () {
            var that = this;
    
            $( 'input', this.footer() ).on( 'keyup change', function () {
                that
                    .search( this.value )
                    .draw();
            } );
        } );
    } );
    
    jQuery(document).ready(function($) {
    function loadColor() {
      
    }

    var wo_sizes
    function showWoInformation(id_wo, article, type, color) {
      $.ajax({
        data: {
          id_wo: id_wo,
          article: article,
        },
        url: '{{ route("FactoryAudit.show-wo-information") }}',           
        type: "post",
        dataType: 'json',            
        success: function (data) {
          $('#F0101_ALPH').empty();
          $('#F4801_DL01').empty();
          $('#F560020_SEG4').empty();
          
          var newOption = new Option(data.buyer, data.buyer, true, true);
          $('#F0101_ALPH').append(newOption).trigger('change');

          var newOption = new Option(data.style, data.style, true, true);
          $('#F4801_DL01').append(newOption).trigger('change');
          
          var newOption = new Option(data.color, data.color, true, true);
          $('#F560020_SEG4').append(newOption).trigger('change');

          sum_qty_order = 0
          color_option = `<option class="form-control selected disabled> </option>`
          for (let i = 0; i < data.wo_information.length; i++) {
            sum_qty_order += parseInt(data.wo_information[i].qty_order)
            color_option += `<option value="`+data.wo_information[i].color+`">`+data.wo_information[i].color+`</option>`
          }

          order_option = `<option class="form-control selected disabled> </option>`
          for (let i = 0; i < data.wo_information.length; i++) {
            order_option += `<option value="`+data.wo_information[i].qty_order+`">`+data.wo_information[i].qty_order+`</option>`
          }

          if (type != "article") {
            article_option = `<option class="form-control selected disabled> </option>`
            for (let i = 0; i < data.wo_information.length; i++) {
            article_option += `<option data-id_wo="`+data.wo_information[i].id_wo+`" value="`+data.wo_information[i].article+`">`+data.wo_information[i].article+`</option>`
            }

            $('.load-article').html(article_option)   
          }

          $('.load-color').html(color_option)
          $('.load-order').html(order_option)
          $('.qty_order').val(sum_qty_order)
          $('.buyer').val(data.buyer)
          $('.style').val(data.style)
          $('.article').val(data.article)
        //   $('#F560020_SEG4').html(color_option)
        //   $('#update_F560020_SEG4').html(color_option)
        //   wo_sizes = data.wo_size

        //   if (type == 'UPDATE') {
        //     var wo_size_filtered = wo_sizes.filter(wo_size => wo_size.color == color)
        //     reloadWoSize(wo_size_filtered)
        //   }

        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
      });
    }

    function showAllWoInformation() {
        $.ajax({
            url: '{{ route("FactoryAudit.show-all-wo-information") }}',           
            type: "post",
            dataType: 'json',            
            success: function (data) {
                article_option = `<option class="form-control selected disabled> </option>`
                for (let i = 0; i < data.wo_information.length; i++) {
                    article_option += `<option data-id_wo="`+data.wo_information[i].id_wo+`" value="`+data.wo_information[i].article+`">`+data.wo_information[i].article+`</option>`
                }

                $('.load-article').html(article_option)
            },
            error: function(xhr, status, error) {

            }
        })
    }

    $('body').on('click', '.start-audit', function () {
        var current_time = moment().format('YYYY-MM-DD HH:mm:ss')
        $('.start-audit-time').html(current_time)
        $('.start-audit').val(current_time)
        console.log(current_time)
        $('.attr-after-start-audit').attr({ hidden: false })
    })

    function sumQtyCarton() {
        // qty_pack
        // qty_carton
        // total_carton
        var qty_order = $('.qty_order').val()
        var qty_pack = $('.qty_pack').val()
        var qty_carton = $('.qty_carton').val()
        var total_carton = (qty_order/qty_carton).toFixed(0)
        return total_carton
        
    }
    function sumQtytotalsize() {
        // qty_pack
        // qty_carton
        // total_carton
        var total_size = $('.total_size').val()

        return total_size
        
    }
 
    function countAqlAdidas(is_adidas){
        var qty_order = $('.qty_order').val()
        var total_size = $('.total_size').val()
        if (is_adidas == true) {
            $('.percentage-aql').attr({ readonly: true })
        }else{
            $('.percentage-aql').attr({ readonly: false })
        }
        var sum_qty_carbon = $('.total_carton').val()
        var sum_qty_pcs = $('.sample_pcs').val()


        // rules
        // 1-50= 100%
        // 51-100=50%
        // >101 =20%
        if (qty_order > 0 && qty_order < 50) {
            var percentage_aql = 100
        }else if(qty_order > 51 && qty_order < 100){
            var percentage_aql = 50
        }else if(qty_order > 101){
            var percentage_aql = 20
        }else{
            var percentage_aql = 0
        }
        $('.percentage-aql').val(percentage_aql)

        var sample_carton = percentage_aql*sum_qty_carbon/total_size/100
        $('.sample-carton').val(sample_carton)

        var sum_qty_pcs = sumQtypcs()
        $('.sample_pcs').val(sum_qty_pcs)
        console.log(sample_carton)
        
    }
    $('body').on('change', '.aql-adidas', function () {
        if ($(this).is(':checked')) {
            var is_adidas = true
            countAqlAdidas(is_adidas);
            
        }else{
            var is_adidas = false
            countAqlAdidas(is_adidas)
            $('.percentage-aql').val('');
        }
        console.log(is_adidas)
    })

    $('body').on('change', '.load-article', function () {
        var id_wo = $(this).find(':selected').data('id_wo')
        var article = $(this).val()
        showWoInformation(id_wo, article, "article", null)
    })

    $('body').on('keyup', '.percentage-aql', function () {
        
        var sum_total_size = $('.total_size').val()
        var percentage_aql = $('.percentage-aql').val()
        var sum_qty_carbon = $('.total_carton').val()
        var sample_carton = percentage_aql*sum_qty_carbon/12/100
        $('.sample-carton').val(sample_carton)
        
        var sum_qty_pcs = sumQtypcs()
        $('.sample_pcs').val(sum_qty_pcs)
        
        console.log(sample_carton)
    })

function sumQtypcs() {
        // qty_pack
        // qty_carton
        // total_carton
        var total_size =$('.total-size').val()
        var sample_carton =$('.sample-carton').val()
        var qty_pack = $('.qty_pack').val()
        var qty_carton = $('.qty_carton').val()
        var sample_pcs = (sample_carton*qty_pack*qty_carton).toFixed(2)

        return sample_pcs
        
    }

    $('body').on('keyup', '.total_size', function () {
        var sum_total_size = sumQtytotalsize()
        console.log(sum_total_size)
        $('.total_size').val(sum_total_size)
        
    })
    

    $('body').on('keyup', '.qty_pack', function () {
        var sum_qty_carton = sumQtyCarton()
        console.log(sum_qty_carton)
        $('.total_carton').val(sum_qty_carton)
        
        var sum_qty_pcs = sumQtypcs()
        $('.sample_pcs').val(sum_qty_pcs)
    })
    
    $('body').on('keyup', '.qty_carton', function () {
        var sum_qty_carton = sumQtyCarton()
        console.log(sum_qty_carton)
        $('.total_carton').val(sum_qty_carton)

        var sum_qty_pcs = sumQtypcs()
        $('.sample_pcs').val(sum_qty_pcs)
    })

    function showSuccessAlert(){
        Swal.fire({
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 5500
        })
    }

    function showRemark(id_inputan){
        $.ajax({
            data: {
                id_inputan: id_inputan,
            },
            url: '{{ route("FactoryAudit.storeRemark") }}',
            type: "get",
            dataType: 'json',            
            success: function (data) {     
            // alert('success')
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }

    var sum_quantity_remark = 0

    $('body').on('keyup', '.total-reject-carton', function () {
        if (sum_quantity_remark > 0) {
            $('.result-failed').trigger('click');
        }else{
            $('.result-passed').trigger('click');
        }
    })

    // default passed
    $('.result-passed').trigger('click');

    $('.store-remark').click(function(){
        var remark_name = $('.remark-name').val()
        var remark_quantity = $('.remark-quantity').val()
        var uniqid = Math.floor(Math.random() * (100 - 300) + 100)

        temporaryRemark(remark_name, remark_quantity, uniqid)
        $('#fa-add').modal("hide")
        $('.total-reject-pcs').val(sum_quantity_remark)
    })

    $('.update-remark').click(function(){
        var id_remark = $('.last-id_remark').val()
        var last_quantity = $('.last-quantity').val()
        var new_remark = $('.new-remark').val()
        var new_quantity = $('.new-quantity').val()

        sum_quantity_remark -= parseInt(last_quantity)
        sum_quantity_remark += parseInt(new_quantity)

        $('.lists-remark-name-html-'+id_remark).html(new_remark)
        $('.lists-remark-quantity-html-'+id_remark).html(new_quantity)

        $('.lists-remark-name-value-'+id_remark).val(new_remark)
        $('.lists-remark-quantity-value-'+id_remark).val(new_quantity)
        
        $('.total-reject-pcs').val(sum_quantity_remark)
        $('.modalUpdateRemark').modal("hide")
    })

    function temporaryRemark(remark, quantity, id_remark){
        sum_quantity_remark += parseInt(quantity)
        if (sum_quantity_remark > 0) {
            $('.result-failed').trigger('click');
        }else{
            $('.result-passed').trigger('click');
        }
        console.log([remark, quantity])
        remark = 
            `<tr class="remark-attr-`+id_remark+`">
                <input type="hidden" name="remark_name[]" class="lists-remark-name-value-`+id_remark+`" value="`+remark+`">
                <input type="hidden" name="remark_quantity[]" class="lists-remark-quantity-value-`+id_remark+`" value="`+quantity+`">
                <td class="text-left lists-remark-name-html-`+id_remark+`">`+remark+`</td>
                <td class="lists-remark-quantity-html-`+id_remark+`">`+quantity+`</td>
                <td>
                    <div class="fa-container-action">
                        <button type="button" class="btn btn-fa-edit show-remark-`+id_remark+`" 
                            data-last_remark="`+remark+`"
                            data-last_quantity="`+quantity+`"
                            data-last_id_remark="`+id_remark+`">
                            <i class="btn-icon-edit fas fa-pencil-alt"></i>
                        </button>
                        <button type="button" class="btn btn-fa-delete delete-remark-`+id_remark+`" 
                            data-id_remark="`+id_remark+`" data-quantity="`+quantity+`">
                            <i class="btn-icon-edit fas fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>`
        $('.lists-remark').append(remark)

        $('.delete-remark-'+id_remark+'').click(function(){
            console.log('delete')
            var id_remark = $(this).data("id_remark")
            var quantity = $(this).data("quantity")
            $('.remark-attr-'+id_remark).remove()

            sum_quantity_remark -= parseInt(quantity);
            $('.total-reject-pcs').val(sum_quantity_remark)
        })

        $('.show-remark-'+id_remark+'').click(function(){
            console.log("show")
            var id_remark = $(this).data("last_id_remark")
            var remark = $(this).data("last_remark")
            var quantity = $(this).data("last_quantity")

            $('.last-id_remark').val(id_remark)
            $('.last-quantity').val(quantity)
            $('.new-remark').val(remark)
            $('.new-quantity').val(quantity)

            $('.modalUpdateRemark').modal("show")
        })
    }

    function storeRemark(){
        $.ajax({
            data: {
                id: id,
                qty_reject: qty_reject,
                remark: remark,
            },
            url: '{{ route("FactoryAudit.storeRemark") }}',
            type: "post",
            dataType: 'json',            
            success: function (data) {     
                location.replace("{{ url('/qcr/factory-audit/view') }}") 
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }

    $('.select-wo').change(function(){
      id_wo = $(this).val()
      console.log(id_wo)
      $('.attr-detail-packing').attr({ hidden: false })
      if (id_wo == "NOTFOUND") {
            showAllWoInformation()
      }else{
            showWoInformation(id_wo, null, null, null)
      }
      
    })
   

    $('.store-wo-information').click(function(){
      storeWoInformation()
    })
    
    function showLoading(){
        let timerInterval
        Swal.fire({
            title: 'Please Wait . . .',
            html: ' ',
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
            }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
            }
        })
    }

    $("#formStoreFactoryAudit").validate({        
        submitHandler: function(form) {
            showLoading()
            var form = $('#formStoreFactoryAudit')[0];
            var formData = new FormData(form);
            event.preventDefault();

            let myArray = [
                document.getElementById('img_result_signature'),
                document.getElementById('img_result_signature_spv')
            ]

            Promise.all( myArray.map(node => domtoimage.toPng(node)))
            .then(dataArray => {
                function DataURIToBlob(dataURI) {
                    const splitDataURI = dataURI.split(',')
                    const byteString = splitDataURI[0].indexOf('base64') >= 0 ? atob(splitDataURI[1]) : decodeURI(splitDataURI[1])
                    const mimeString = splitDataURI[0].split(':')[1].split(';')[0]

                    const ia = new Uint8Array(byteString.length)
                    for (let i = 0; i < byteString.length; i++)
                        ia[i] = byteString.charCodeAt(i)

                    return new Blob([ia], { type: mimeString })
                }
                
                var img = new Image();
                img.src = dataArray[0]
                var file = DataURIToBlob(dataArray[0])
                formData.append('img_result_signature', file, 'signature.jpg') 

                var img = new Image();
                img.src = dataArray[1]
                var file_spv = DataURIToBlob(dataArray[1])
                formData.append('img_result_signature_spv', file_spv, 'signature.jpg') 

                $.ajax({
                    url: '{{ route("factory-audit.store") }}',
                    dataType: 'JSON',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,                         
                    type: 'post',
                    success: function (data, status){
                        swal.close();
                        showSuccessAlert()
                        location.replace("{{ url('/qcr/factory-audit/view') }}") 
                    },
                    error: function (xhr, desc, err){
                        alert(xhr.responseText);
                    }
                });
            })

            
        }    
    });
    })
</script>

<!-- end js inputan -->
<!-- js photo -->
<script>
    function readURL_fa(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-fa').hide();

            reader.onload = function (e) {
                $(".file-upload-image-fa").attr("src", e.target.result);
                $(".file-upload-content-fa").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload_fa();
        }
    }

    function removeUpload_fa() {
        $('.file-upload-input-fa').replaceWith($('.file-upload-input-fa').clone());
        $('.file-upload-content-fa').hide();
        $('.image-upload-wrap-fa').show();
    }
    $('.image-upload-wrap-fa').bind('dragover', function () {
        $('.image-upload-wrap-fa').addClass('image-dropping');
    });
    $('.image-upload-wrap-fa').bind('dragleave', function () {
        $('.image-upload-wrap-fa').removeClass('image-dropping');
    });

    // ============================
    function readURL_fa2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-fa2').hide();

            reader.onload = function (e) {
                $(".file-upload-image-fa2").attr("src", e.target.result);
                $(".file-upload-content-fa2").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload_fa2();
        }
    }

    function removeUpload_fa2() {
        $('.file-upload-input-fa2').replaceWith($('.file-upload-input-fa2').clone());
        $('.file-upload-content-fa2').hide();
        $('.image-upload-wrap-fa2').show();
    }
    $('.image-upload-wrap-fa2').bind('dragover', function () {
        $('.image-upload-wrap-fa2').addClass('image-dropping');
    });
    $('.image-upload-wrap-fa2').bind('dragleave', function () {
        $('.image-upload-wrap-fa2').removeClass('image-dropping');
    });

    // ======================================
    function readURL_fa3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-fa3').hide();

            reader.onload = function (e) {
                $(".file-upload-image-fa3").attr("src", e.target.result);
                $(".file-upload-content-fa3").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload_fa3();
        }
    }

    function removeUpload_fa3() {
        $('.file-upload-input-fa3').replaceWith($('.file-upload-input-fa3').clone());
        $('.file-upload-content-fa3').hide();
        $('.image-upload-wrap-fa3').show();
    }
    $('.image-upload-wrap-fa3').bind('dragover', function () {
        $('.image-upload-wrap-fa3').addClass('image-dropping');
    });
    $('.image-upload-wrap-fa3').bind('dragleave', function () {
        $('.image-upload-wrap-fa3').removeClass('image-dropping');
    });
    // ==================================
    function readURL_fa4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-fa4').hide();

            reader.onload = function (e) {
                $(".file-upload-image-fa4").attr("src", e.target.result);
                $(".file-upload-content-fa4").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload_fa4();
        }
    }

    function removeUpload_fa4() {
        $('.file-upload-input-fa4').replaceWith($('.file-upload-input-fa4').clone());
        $('.file-upload-content-fa4').hide();
        $('.image-upload-wrap-fa4').show();
    }
    $('.image-upload-wrap-fa4').bind('dragover', function () {
        $('.image-upload-wrap-fa4').addClass('image-dropping');
    });
    $('.image-upload-wrap-fa4').bind('dragleave', function () {
        $('.image-upload-wrap-fa4').removeClass('image-dropping');
    });
</script>

@endpush