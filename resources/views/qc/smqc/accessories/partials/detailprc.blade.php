<!-- Modal -->
<div class="modal fade" id="DetailPRC{{$value->id}}" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="max-width:900px">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>  
                </div>
                <div class="container justify-center">
                    <label for="detail" style="font-size:20px;font-weight:bold;">ACCESSORIES INSPECTION</label>
                </div>
                <div class="container">
                    <div class="row" style="text-align:left;">
                        <div class="col-lg-4 col-4">
                            <label for="supplier">Supplier</label>
                        </div>
                        <div class="col-lg-4 col-4">
                            <label for="supplier">Purchasing Name</label>
                        </div>
                        <div class="col-lg-4 col-4">
                            <label for="supplier">Date</label>
                        </div>
                    </div>
                    <div class="row" style="text-align:left;">
                        <div class="col-lg-4 col-4">
                            <input type="text" class="col-12" value="{{ $value->supplier }}" disabled>
                        </div>
                        <div class="col-lg-4 col-4">
                            <input type="text"  class="col-12" value="{{ $value->buyer }}" disabled>
                        </div>
                        <div class="col-lg-4 col-4">
                            <input type="text"  class="col-12" value="{{ $value->date }}" disabled>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="text-align:left;">
                        <div class="col-lg-4 col-4">
                            <label for="supplier">PO</label>
                        </div>
                        <div class="col-lg-4 col-4">
                            <label for="supplier">Item</label>
                        </div>
                        <div class="col-lg-4 col-4">
                            <label for="supplier">Order Quantity</label>
                        </div>
                    </div>
                    <div class="row" style="text-align:left;">
                        <div class="col-lg-4 col-4">
                            <input type="text" class="col-12" value="{{ $value->po }}" disabled>
                        </div>
                        <div class="col-lg-4 col-4">
                            <input type="text"  class="col-12" value="{{ $value->item }}" disabled>
                        </div>
                        <div class="col-lg-4 col-4">
                            <input type="text"  class="col-12" value="{{ $value->order_quan }}" disabled>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="text-align:left;">
                        <div class="col-lg-4 col-4">
                            <label for="supplier">Check Qc Qty</label>
                        </div>
                        <div class="col-lg-4 col-4">
                            <label for="supplier">Qty Reject</label>
                        </div>
                        <div class="col-lg-4 col-4">
                            <label for="supplier">Status</label>
                        </div>
                    </div>
                    <div class="row" style="text-align:left;">
                        <div class="col-lg-4 col-4">
                            <input type="text" class="col-12" value="{{ $value->qc_qty }}" disabled>
                        </div>
                        <div class="col-lg-4 col-4">
                            <input type="text"  class="col-12" value="{{ $value->qty_reject }}" disabled>
                        </div>
                        <div class="col-lg-4 col-4">
                            @if($value->status_id == 1)
                                Pass
                            @elseif($value->status_id == 2)
                                Fail
                            @endif
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="container" style="overflow:scroll;"> 
                    <table class="col-md-12">
                        <tr>
                            <th>No</th>
                            <th>Inspection Detail</th>
                            <th>Check Item</th>
                            <th>Defect Comments</th>
                            <th>No. Of Defect</th>
                            <th>Remark</th>
                        </tr>
                        <tr>
                            <td style="text-align:center;">1</td>
                            <td style="text-align:left;padding-left:5px">Quality</td>
                            <td>
                                <div class="justify-center">
                                    <div class="radioContainer">
                                        <input type="radio" name="q_ci" id="prc-qc-dt{{$value->id}}" value="1" class="radioCustomInputBlack" {{ ($value->detail->q_ci == 1 ) ? "checked" : "" }} disabled>
                                        <label for="prc-qc-dt{{$value->id}}" class="radioCustomBlack"></label>
                                    </div>
                                </div>
                            </td>
                            <td style="text-align:center;">{{ $value->detail->q_dc }}</td>
                            <td style="text-align:center;">{{ $value->detail->q_od }}</td>
                            <td style="text-align:center;">{{ $value->detail->q_remark }}</td>
                        </tr>
                        <tr>
                            <td style="text-align:center;">2</td>
                            <td style="text-align:left;padding-left:5px">Color</td>
                            <td>
                                <div class="justify-center">
                                    <div class="radioContainer">
                                        <input type="radio" name="c_ci" id="prc-clr-dtl{{$value->id}}" value="1" class="radioCustomInputBlack" {{ ($value->detail->c_ci == 1 ) ? "checked" : "" }} disabled>
                                        <label for="prc-clr-dtl{{$value->id}}" class="radioCustomBlack"></label>
                                    </div>
                                </div>
                            </td>
                            <td style="text-align:center;">{{ $value->detail->c_dc }}</td>
                            <td style="text-align:center;">{{ $value->detail->c_od }}</td>
                            <td style="text-align:center;">{{ $value->detail->c_remark }}</td>
                        </tr>
                        <tr>
                            <td style="text-align:center;">3</td>
                            <td style="text-align:left;padding-left:5px">Shape</td>
                            <td>
                                <div class="justify-center">
                                    <div class="radioContainer">
                                        <input type="radio" name="s_ci" id="prc-shp-dtl{{$value->id}}" value="1" class="radioCustomInputBlack" {{ ($value->detail->s_ci == 1 ) ? "checked" : "" }} disabled>
                                        <label for="prc-shp-dtl{{$value->id}}" class="radioCustomBlack"></label>
                                    </div>
                                </div>
                            </td>
                            <td style="text-align:center;">{{ $value->detail->s_dc }}</td>
                            <td style="text-align:center;">{{ $value->detail->s_od }}</td>
                            <td style="text-align:center;">{{ $value->detail->s_remark }}</td>
                        </tr>
                        <tr>
                            <td style="text-align:center;">4</td>
                            <td style="text-align:left;padding-left:5px">Artwork</td>
                             <td>
                                <div class="justify-center">
                                    <div class="radioContainer">
                                        <input type="radio" name="a_ci" id="prc-art_dtl{{$value->id}}" value="1" class="radioCustomInputBlack" {{ ($value->detail->a_ci == 1 ) ? "checked" : "" }} disabled>
                                        <label for="prc-art_dtl{{$value->id}}" class="radioCustomBlack"></label>
                                    </div>
                                </div>
                            </td>
                            <td style="text-align:center;">{{ $value->detail->a_dc }}</td>
                            <td style="text-align:center;">{{ $value->detail->a_od }}</td>
                            <td style="text-align:center;">{{ $value->detail->a_remark }}</td>
                        </tr>
                        <tr>
                            <td style="text-align:center;">5</td>
                            <td style="text-align:left;padding-left:5px">Functional</td>
                             <td>
                                <div class="justify-center">
                                    <div class="radioContainer">
                                        <input type="radio" name="f_ci" id="prc-fc-dtl{{$value->id}}" value="1" class="radioCustomInputBlack" {{ ($value->detail->f_ci == 1 ) ? "checked" : "" }} disabled>
                                        <label for="prc-fc-dtl{{$value->id}}" class="radioCustomBlack"></label>
                                    </div>
                                </div>
                            </td>
                            <td style="text-align:center;">{{ $value->detail->f_dc }}</td>
                            <td style="text-align:center;">{{ $value->detail->f_od }}</td>
                            <td style="text-align:center;">{{ $value->detail->f_remark }}</td>
                        </tr>
                        <tr>
                            <td style="text-align:center;">6</td>
                            <td style="text-align:left;padding-left:5px">Damage</td>
                             <td>
                                <div class="justify-center">
                                    <div class="radioContainer">
                                        <input type="radio" name="d_ci" id="prc-dmq-dtl{{$value->id}}" value="1" class="radioCustomInputBlack" {{ ($value->detail->d_ci == 1 ) ? "checked" : "" }} disabled>
                                        <label for="prc-dmq-dtl{{$value->id}}" class="radioCustomBlack"></label>
                                    </div>
                                </div>
                            </td>
                            <td style="text-align:center;">{{ $value->detail->d_dc }}</td>
                            <td style="text-align:center;">{{ $value->detail->d_od }}</td>
                            <td style="text-align:center;">{{ $value->detail->d_remark }}</td>
                        </tr>
                        <tr>
                            <td style="text-align:center;">7</td>
                            <td style="text-align:left;padding-left:5px">Dimensi</td>
                             <td>
                                <div class="justify-center">
                                    <div class="radioContainer">
                                        <input type="radio" name="di_ci" id="prc-dms-dtl{{$value->id}}" value="1" class="radioCustomInputBlack" {{ ($value->detail->di_ci == 1 ) ? "checked" : "" }} disabled>
                                        <label for="prc-dms-dtl{{$value->id}}" class="radioCustomBlack"></label>
                                    </div>
                                </div>
                            </td>
                            <td style="text-align:center;">{{ $value->detail->di_dc }}</td>
                            <td style="text-align:center;">{{ $value->detail->di_od }}</td>
                            <td style="text-align:center;">{{ $value->detail->di_remark }}</td>
                        </tr>
                        <tr>
                            <td style="text-align:center;">8</td>
                            <td style="text-align:left;padding-left:5px">Barcode</td>
                             <td>
                                <div class="justify-center">
                                    <div class="radioContainer">
                                        <input type="radio" name="b_ci" id="prc-bcd-dtl{{$value->id}}" value="1" class="radioCustomInputBlack" {{ ($value->detail->b_ci == 1 ) ? "checked" : "" }} disabled>
                                        <label for="prc-bcd-dtl{{$value->id}}" class="radioCustomBlack"></label>
                                    </div>
                                </div>
                            </td>
                            <td style="text-align:center;">{{ $value->detail->b_dc }}</td>
                            <td style="text-align:center;">{{ $value->detail->b_od }}</td>
                            <td style="text-align:center;">{{ $value->detail->b_remark }}</td>
                        </tr>
                        <tr>
                            <td style="text-align:center;">9</td>
                            <td style="text-align:left;padding-left:5px">Metal detector</td>
                             <td>
                                <div class="justify-center">
                                    <div class="radioContainer">
                                        <input type="radio" name="m_ci" id="prc-mtl-dtl{{$value->id}}" value="1" class="radioCustomInputBlack" {{ ($value->detail->m_ci == 1 ) ? "checked" : "" }} disabled>
                                        <label for="prc-mtl-dtl{{$value->id}}" class="radioCustomBlack"></label>
                                    </div>
                                </div>
                            </td>
                            <td style="text-align:center;">{{ $value->detail->m_dc }}</td>
                            <td style="text-align:center;">{{ $value->detail->m_od }}</td>
                            <td style="text-align:center;">{{ $value->detail->m_remark }}</td>
                        </tr>
                    </table>
                </div>
                <div class="row mt-3">
                    <div class="col-12" style="overflow:scroll;">
                        <img src="{{ asset('storage/smqc/accessories/'.$value->detail->file) }}" style="max-height:400px;max-width:auto;padding-top:10px;padding-bottom:10px;" class="imgResponsive">
                    </div>
                </div>
                <div class="row">
                    <label for="supplier">Note</label>
                    <div class="col-12">
                        <textarea class="form-control col-12" rows="2" disabled>{{$value->detail->note}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
