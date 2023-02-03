<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="cards px-4 py-4">
            <div class="row">
                <div class="col-12">
                <div class="ws-judul">General Identity</div>
                <div class="ws-creation mt-2">WO Creation Date : {{$master_data->date}}</div>
                </div>
            </div>
            @php
                $file1="";
                $file2="";
                $file3="";
                $file4="";
                $isian_file1="";
                $isian_file2="";
                $isian_file3="";
                $isian_file4="";
                $description="";
                if ($master_data->general_identity != null ) {
                    $master_data->general_identity->file==null?:$file1=asset('/marketing/worksheet/general_identity/'.$master_data->general_identity->file);
                    $master_data->general_identity->file2==null?:$file2=asset('/marketing/worksheet/general_identity/'.$master_data->general_identity->file2);
                    $master_data->general_identity->file3==null?:$file3=asset('/marketing/worksheet/general_identity/'.$master_data->general_identity->file3);
                    $master_data->general_identity->file4==null?:$file4=asset('/marketing/worksheet/general_identity/'.$master_data->general_identity->file4);
                }elseif($master_data->general_identity == null && $master_data->worksheet_copy != null){
                    $rekap_order_tujuan = collect($rekap_order)->where('id',$master_data->worksheet_copy->rekap_order_tujuan)->first();
                    $description = $rekap_order_tujuan->general_identity->description;
                    $rekap_order_tujuan->general_identity->file==null?:$file1=asset('/marketing/worksheet/general_identity/'.$rekap_order_tujuan->general_identity->file);
                    $rekap_order_tujuan->general_identity->file2==null?:$file2=asset('/marketing/worksheet/general_identity/'.$rekap_order_tujuan->general_identity->file2);
                    $rekap_order_tujuan->general_identity->file3==null?:$file3=asset('/marketing/worksheet/general_identity/'.$rekap_order_tujuan->general_identity->file3);
                    $rekap_order_tujuan->general_identity->file4==null?:$file4=asset('/marketing/worksheet/general_identity/'.$rekap_order_tujuan->general_identity->file4);
                    $isian_file1=$rekap_order_tujuan->general_identity->file;
                    $isian_file2=$rekap_order_tujuan->general_identity->file2;
                    $isian_file3=$rekap_order_tujuan->general_identity->file3;
                    $isian_file4=$rekap_order_tujuan->general_identity->file4;
                }
            @endphp
            <?php 
            $cek_tambah_po =  collect($master_data->general_po)->count('id');
            $contract =  collect($master_data->rekap_detail)->implode('contract', ' * ');
            $no_or =  collect($master_data->rekap_detail)->implode('no_or', ' * ');
            $article =  collect($master_data->rekap_detail)->implode('article', ' * ');
            $product_name =  collect($master_data->rekap_detail)->implode('product_name', ' * ');
            $style =  collect($master_data->rekap_detail)->implode('style', ' * ');
            $style_name =  collect($master_data->rekap_detail)->implode('style_name', ' * ');

            if ($cek_tambah_po == 0) {
                $no_po = $master_data->no_po;
                $number_contract = $contract;
                $or_number = $no_or;
                $isi_article = $article;
                $isi_product_name = $product_name;
                $isi_style = $style;
                $isi_style_name = $style_name;
            }else {
                $general_po = collect($master_data->general_po)->implode('po_number', ' * ');
                $result = [];
                foreach ($master_data->general_po as $key => $value) {
                    $data_master = collect($rekap_order)->where('id', $value->rekap_order_id)->first();
                    $contract = collect($data_master->rekap_detail)->implode('contract', ' * ');
                    $or_nya = collect($data_master->rekap_detail)->implode('no_or', ' * ');
                    $article_nya = collect($data_master->rekap_detail)->implode('article', ' * ');
                    $product_name_nya = collect($data_master->rekap_detail)->implode('product_name', ' * ');
                    $style_nya = collect($data_master->rekap_detail)->implode('style', ' * ');
                    $style_name_nya = collect($data_master->rekap_detail)->implode('style_name', ' * ');
                    $result[] = [
                        'contract' => $contract,
                        'no_or' => $or_nya,
                        'article' => $article_nya,
                        'product_name' => $product_name_nya,
                        'style' => $style_nya,
                        'style_name' => $style_name_nya,
                    ];
                }
                // dd($contract);
                // no_po 
                $no_po = $master_data->no_po.' * '.$general_po;
                
                // contract 
                $hasil_contract = collect($result)->implode('contract', '');
                if ($hasil_contract != null) {
                    $hasil_contract = collect($result)->implode('contract', ' * ');
                    $number_contract = $contract.' * '.$hasil_contract;
                }else {
                    $number_contract = $contract;
                }

                // no or 
                $hasil_or = collect($result)->implode('no_or', '');
                if ($hasil_or != null) {
                    $hasil_or = collect($result)->implode('no_or', ' * ');
                    $or_number = $no_or.' * '.$hasil_or;
                }else {
                    $or_number = $no_or;
                }

                // article 
                $hasil_article = collect($result)->implode('article', '');
                if ($hasil_article != null) {
                    $hasil_article = collect($result)->implode('article', ' * ');
                    $isi_article = $article.' * '.$hasil_article;
                }else {
                    $isi_article = $article;
                }

                // product name 
                $hasil_product_name = collect($result)->implode('product_name', '');
                if ($hasil_product_name != null) {
                    $hasil_product_name = collect($result)->implode('product_name', ' * ');
                    $isi_product_name = $product_name.' * '.$hasil_product_name;
                }else {
                    $isi_product_name = $product_name;
                }

                // style
                $hasil_style = collect($result)->implode('style', '');
                if ($hasil_style != null) {
                    $hasil_style = collect($result)->implode('style', ' * ');
                    $isi_style = $style.' * '.$hasil_style;
                }else {
                    $isi_style = $style;
                }

                // style name 
                $hasil_style_name = collect($result)->implode('style_name', '');
                if ($hasil_style_name != null) {
                    $hasil_style_name = collect($result)->implode('style_name', ' * ');
                    $isi_style_name = $style_name.' * '.$hasil_style_name;
                }else {
                    $isi_style_name = $style_name;
                }
            }
            ?>
            @if($master_data->general_identity == null)
            @if($master_data->worksheet_copy != null)
            <input type="hidden" name="file" id="file" value="{{$isian_file1}}">
            <input type="hidden" name="file2" id="file2" value="{{$isian_file2}}">
            <input type="hidden" name="file3" id="file3" value="{{$isian_file3}}">
            <input type="hidden" name="file4" id="file4" value="{{$isian_file4}}">
            @endif
            <div class="row mt-3">
                <div class="col-md-6" id>
                    <?php
                        $cek_tambah_po = collect($master_data->general_po)->count('id');
                    ?>
                    <div class="title-sm">PO Number</div>
                    <div class="flex gap-3">
                        <input type="text" class="form-control borderInput mt-1 mb-3" id="no_po" name="no_po" value="{{$no_po}}" placeholder="" readonly>
                        <input type="hidden" id="master_id" name="master_id" value="{{$master_data->id}}" placeholder="">
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#modalPO" class="btn-icon-blue mt-1" style="width:38px;height:38px" ><i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Number Contract</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" class="contract" id="cont" name="contract" value="{{$number_contract}}" placeholder="Contract Number...">
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Buyer</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" class="buyer" id="buyer" name="buyer" value="{{$buyer->F0101_ALPH}}" placeholder="Buyer..." required>
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Trading CO/Agent</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" class="agent" id="age" value="" name="agent" placeholder="Trading CO/Agent...">
                </div>
                <div class="col-12">
                    <div class="title-sm">OR Number</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" class="contract" id="nomor_or" name="nomor_or" value="{{$or_number}}" placeholder="Contract Number...">
                </div>
                <div class="col-12">
                    <div class="title-sm">Article Code</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" class="article" id="arti" value="{{$isi_article}}" name="article" placeholder="Article Code...">
                </div>
                <div class="col-12">
                    <div class="title-sm">Product Name</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" class="product_name" id="product_n" value="{{$isi_product_name}}" name="product_name" placeholder="Product Name..." required>
                </div>
                <div class="col-sm-6">
                    <div class="title-sm">Style Code</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" class="style" id="style_c" value="{{$isi_style}}" name="style_code" placeholder="Style Code..." required>
                </div>
                <div class="col-sm-6">
                    <div class="title-sm">Style Name</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" class="style_name" id="style_n" value="{{$isi_style_name}}" name="style_name" placeholder="Style Name..." required>
                </div>
                <div class="col-12">
                    <div class="title-sm">Description</div>
                    <textarea class="form-control borderInput mt-1 mb-3 py-2" placeholder="Input Additional Description.." name="description" id="description" value="">{{$description}}</textarea>
                </div>
                <div class="col-sm-4">
                    <div class="title-sm">Shipment Date</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control borderInput shipment_date" id="shipment_d" name="shipment_date" placeholder="Select Date" required/>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="title-sm">Request Ex Fty Date </div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" value="{{$detail->ex_fact}}" class="form-control borderInput ex_fact" id="ex_fact" name="exfact_date" placeholder="Select Date" required/>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="title-sm">PO Creation</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" value="{{$master_data->date}}" class="form-control borderInput ex_fact" id="po_d" name="po_date" placeholder="Select Date" required/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="file-upload-ws">
                        <div class="image-upload-wrap-folding1">
                            <i class="icon-upload-folding1 fas fa-upload"></i>
                            <button class="file-upload-btn-folding1" type="button" id="file1"
                                onclick="$('.file-upload-input-folding1').trigger('click')">Select Image</button>
                            <input class="file-upload-input-folding1" type='file' id="file1" name="file1"
                                onchange="readURL_folding1(this);" accept="image/*" />
                            <div class="drag-text-folding1">
                                <h5>Or Drop Images Here</h5>
                            </div>
                        </div>
                        <div class="file-upload-content-folding1">
                            <img class="file-upload-image-folding1"
                                src="{{$file1}}" alt=" Image Format Only"
                                data-toggle="lightbox" />
                            <div class="image-title-wrap">
                                <button type="button" onclick="removeUpload_folding1()" class="remove-image-ws2"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="file-upload-ws">
                        <div class="image-upload-wrap-folding2">
                            <button class="file-upload-btn-folding2" type="button" id="file2" name="file2"
                                onclick="$('.file-upload-input-folding2').trigger( 'click' )"><i
                                    class="fas fa-plus"></i></button>
                            <input class="file-upload-input-folding2" type='file' id="file2" name="file2" value=""
                                onchange="readURL_folding2(this);" accept="image/*" />
                        </div>
                        <div class="file-upload-content-folding2">
                            <img class="file-upload-image-folding2"
                                src="{{$file2}}" alt=" Image Format Only"
                                data-toggle="lightbox" />
                            <div class="image-title-wrap">
                                <button type="button" onclick="removeUpload_folding2()" class="remove-image-ws2"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="file-upload-ws">
                        <div class="image-upload-wrap-folding3">

                            <button class="file-upload-btn-folding3" type="button" id="file3" name="file3"
                                onclick="$('.file-upload-input-folding3').trigger( 'click' )"><i
                                    class="fas fa-plus"></i></button>
                            <input class="file-upload-input-folding3" type='file' id="file3" name="file3" value=""
                                onchange="readURL_folding3(this);" accept="image/*" />
                        </div>
                        <div class="file-upload-content-folding3">
                            <img class="file-upload-image-folding3"
                                src="{{$file3}}" alt=" Image Format Only"
                                data-toggle="lightbox" />
                            <div class="image-title-wrap">
                                <button type="button" onclick="removeUpload_folding3()" class="remove-image-ws2"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="file-upload-ws">
                        <div class="image-upload-wrap-folding4">
                            <button class="file-upload-btn-folding4" type="button" id="file4" name="file4"
                                onclick="$('.file-upload-input-folding4').trigger( 'click' )"><i
                                    class="fas fa-plus"></i></button>
                            <input class="file-upload-input-folding4" type='file' id="file4" name="file4" value=""
                                onchange="readURL_folding4(this);" accept="image/*" />
                        </div>
                        <div class="file-upload-content-folding4">
                            <img class="file-upload-image-folding4" src="{{$file4}}" alt=" Image Format Only"
                                data-toggle="lightbox" />
                            <div class="image-title-wrap">
                                <button type="button" onclick="removeUpload_folding4()" class="remove-image-ws2"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($master_data->general_identity != null)
            <div class="row mt-3">
                <div class="col-md-6" id>
                    <?php
                        $cek_tambah_po = collect($master_data->general_po)->count('id');
                        $general_po = collect($master_data->general_po)->implode('po_number', ' * ');
                    ?>
                    <div class="title-sm">PO Number</div>
                    <div class="flex gap-3">
                        <input type="hidden" class="form-control borderInput mt-1 mb-3" id="no_po" name="no_po" value="{{$master_data->no_po}}" placeholder="" readonly>
                        @if($cek_tambah_po == 0)
                        <input type="text" class="form-control borderInput mt-1 mb-3" value="{{$master_data->no_po}}" placeholder="" readonly>
                        @else
                        <input type="text" class="form-control borderInput mt-1 mb-3" value="{{$master_data->no_po}} * {{$general_po}}" placeholder="" readonly>
                        @endif
                        <input type="hidden" id="master_id" name="master_id" value="{{$master_data->id}}" placeholder="">
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#modalPO" class="btn-icon-blue mt-1" style="width:38px;height:38px" ><i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Number Contract</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3 contract" id="cont" name="contract" value="{{$general->contract}}" placeholder="Contract Number...">
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Buyer</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3 buyer" id="buyer" name="buyer" value="{{$general->buyer}}" placeholder="Buyer..." required>
                </div>
                <div class="col-md-6">
                    <div class="title-sm">Trading CO/Agent</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3 agent" id="age" value="{{$general->agent}}" name="agent" placeholder="Trading CO/Agent...">
                </div>
                <div class="col-12">
                    <div class="title-sm">OR Number</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3 contract" id="nomor_or" name="nomor_or" value="{{$general->nomor_or}}" placeholder="Contract Number...">
                </div>
                <div class="col-12">
                    <div class="title-sm">Article Code</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3 article" id="arti" value="{{$general->article}}" name="article" placeholder="Article Code..." required>
                </div>
                <div class="col-12">
                    <div class="title-sm">Product Name</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3 product_name" id="product_n" value="{{$general->product_name}}" name="product_name" placeholder="Product Name..." required>
                </div>
                <div class="col-12">
                    <div class="title-sm">Style Code</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3 style" id="style_c" value="{{$general->style_code}}" name="style_code" placeholder="Style Code..." required>
                </div>
                <div class="col-12">
                    <div class="title-sm">Style Name</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3 style_name" id="style_n" value="{{$general->style_name}}" name="style_name" placeholder="Style Name..." required>
                </div>
                <div class="col-12">
                    <div class="title-sm">Description</div>
                    <textarea class="form-control borderInput mt-1 mb-3 py-2" placeholder="Input Additional Description.." name="description" id="description" value="">{{$general->description}}</textarea>
                </div>
                <div class="col-sm-4">
                    <div class="title-sm">Shipment Date</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" value="{{$general->shipment_date}}" class="form-control borderInput shipment_date" id="shipment_d" name="shipment_date" placeholder="Select Date" required/>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="title-sm">Request Ex Fty Date</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" value="{{$general->exfact_date}}" class="form-control borderInput ex_fact" id="ex_fact" name="exfact_date" placeholder="Select Date" required/>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="title-sm">PO Creation</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:50px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" value="{{$general->po_date}}" class="form-control borderInput" id="po_d" name="po_date" placeholder="Select Date" required/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="file-upload-ws">
                        <div class="image-upload-wrap-folding1">
                            <i class="icon-upload-folding1 fas fa-upload"></i>
                            <button class="file-upload-btn-folding1" type="button" id="file1"
                                onclick="$('.file-upload-input-folding1').trigger('click')">Select Image</button>
                            <input class="file-upload-input-folding1" type='file' id="file1" name="file1"
                                onchange="readURL_folding1(this);" accept="image/*" />
                            <div class="drag-text-folding1">
                                <h5>Or Drop Images Here</h5>
                            </div>
                        </div>
                        <div class="file-upload-content-folding1">
                            <img class="file-upload-image-folding1"
                                src="{{$file1}}" alt=" Image Format Only"
                                data-toggle="lightbox" />
                            <div class="image-title-wrap">
                                <button type="button" onclick="removeUpload_folding1()" class="remove-image-ws2"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="file-upload-ws">
                        <div class="image-upload-wrap-folding2">
                            <button class="file-upload-btn-folding2" type="button" id="file2" name="file2"
                                onclick="$('.file-upload-input-folding2').trigger( 'click' )"><i
                                    class="fas fa-plus"></i></button>
                            <input class="file-upload-input-folding2" type='file' id="file2" name="file2" value=""
                                onchange="readURL_folding2(this);" accept="image/*" />
                        </div>
                        <div class="file-upload-content-folding2">
                            <img class="file-upload-image-folding2"
                                src="{{$file2}}" alt=" Image Format Only"
                                data-toggle="lightbox" />
                            <div class="image-title-wrap">
                                <button type="button" onclick="removeUpload_folding2()" class="remove-image-ws2"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="file-upload-ws">
                        <div class="image-upload-wrap-folding3">

                            <button class="file-upload-btn-folding3" type="button" id="file3" name="file3"
                                onclick="$('.file-upload-input-folding3').trigger( 'click' )"><i
                                    class="fas fa-plus"></i></button>
                            <input class="file-upload-input-folding3" type='file' id="file3" name="file3" value=""
                                onchange="readURL_folding3(this);" accept="image/*" />
                        </div>
                        <div class="file-upload-content-folding3">
                            <img class="file-upload-image-folding3"
                                src="{{$file3}}" alt=" Image Format Only"
                                data-toggle="lightbox" />
                            <div class="image-title-wrap">
                                <button type="button" onclick="removeUpload_folding3()" class="remove-image-ws2"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="file-upload-ws">
                        <div class="image-upload-wrap-folding4">
                            <button class="file-upload-btn-folding4" type="button" id="file4" name="file4"
                                onclick="$('.file-upload-input-folding4').trigger( 'click' )"><i
                                    class="fas fa-plus"></i></button>
                            <input class="file-upload-input-folding4" type='file' id="file4" name="file4" value=""
                                onchange="readURL_folding4(this);" accept="image/*" />
                        </div>
                        <div class="file-upload-content-folding4">
                            <img class="file-upload-image-folding4" src="{{$file4}}" alt=" Image Format Only"
                                data-toggle="lightbox" />
                            <div class="image-title-wrap">
                                <button type="button" onclick="removeUpload_folding4()" class="remove-image-ws2"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-12 justify-end">
                    <button type="submit" class="btn-blue-md title-navigate-next px-4">Next & Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function readURL_folding1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-folding1').hide();

            reader.onload = function (e) {
                $(".file-upload-image-folding1").attr("src", e.target.result);
                $(".file-upload-content-folding1").show();
                $('.image-title').html(input.files[0]);
            };
            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_folding1();
        }
    }

    function removeUpload_folding1() {
        $('.file-upload-input-folding1').replaceWith($('.file-upload-input-folding1').clone());
        $('.file-upload-content-folding1').hide();
        $('.image-upload-wrap-folding1').show();
    }
    $('.image-upload-wrap-folding1').bind('dragover', function () {
        $('.image-upload-wrap-folding1').addClass('image-dropping');
    });
    $('.image-upload-wrap-folding1').bind('dragleave', function () {
        $('.image-upload-wrap-folding1').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_folding2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-folding2').hide();

            reader.onload = function (e) {
                $(".file-upload-image-folding2").attr("src", e.target.result);
                $(".file-upload-content-folding2").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_folding2();
        }
    }

    function removeUpload_folding2() {
        $('.file-upload-input-folding2').replaceWith($('.file-upload-input-folding2').clone());
        $('.file-upload-content-folding2').hide();
        $('.image-upload-wrap-folding2').show();
    }
    $('.image-upload-wrap-folding2').bind('dragover', function () {
        $('.image-upload-wrap-folding2').addClass('image-dropping');
    });
    $('.image-upload-wrap-folding2').bind('dragleave', function () {
        $('.image-upload-wrap-folding2').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_folding3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-folding3').hide();

            reader.onload = function (e) {
                $(".file-upload-image-folding3").attr("src", e.target.result);
                $(".file-upload-content-folding3").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_folding3();
        }
    }

    function removeUpload_folding3() {
        $('.file-upload-input-folding3').replaceWith($('.file-upload-input-folding3').clone());
        $('.file-upload-content-folding3').hide();
        $('.image-upload-wrap-folding3').show();
    }
    $('.image-upload-wrap-folding3').bind('dragover', function () {
        $('.image-upload-wrap-folding3').addClass('image-dropping');
    });
    $('.image-upload-wrap-folding3').bind('dragleave', function () {
        $('.image-upload-wrap-folding3').removeClass('image-dropping');
    });

    // =================================================================== //

    function readURL_folding4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-folding4').hide();

            reader.onload = function (e) {
                $(".file-upload-image-folding4").attr("src", e.target.result);
                $(".file-upload-content-folding4").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
            $("#frmFolding").submit();

        } else {
            removeUpload_folding4();
        }
    }

    function removeUpload_folding4() {
        $('.file-upload-input-folding4').replaceWith($('.file-upload-input-folding4').clone());
        $('.file-upload-content-folding4').hide();
        $('.image-upload-wrap-folding4').show();
    }
    $('.image-upload-wrap-folding4').bind('dragover', function () {
        $('.image-upload-wrap-folding4').addClass('image-dropping');
    });
    $('.image-upload-wrap-folding4').bind('dragleave', function () {
        $('.image-upload-wrap-folding4').removeClass('image-dropping');
    });
</script>
@if ($file1!=="")
<script>
    $(".file-upload-content-folding1").show();
    $('.image-upload-wrap-folding1').hide();
</script>
@endif
@if ($file2!=="")
<script>
    $(".file-upload-content-folding2").show();
    $('.image-upload-wrap-folding2').hide();
</script>
@endif
@if ($file3!=="")
<script>
    $(".file-upload-content-folding3").show();
    $('.image-upload-wrap-folding3').hide();
</script>
@endif
@if ($file4!=="")
<script>
    $(".file-upload-content-folding4").show();
    $('.image-upload-wrap-folding4').hide();
</script>
@endif

