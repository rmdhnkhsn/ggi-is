<div class="modal fade" id="detailsIn{{ $value['id'] }}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true" style="z-index:99999 !important">
    <div class="modal-dialog" role="document" style="max-width:650px">
        <div class="modal-content p-4" style="border-radius:10px">
            <div class="row">
                <div class="col-12 justify-sb">
                    <div class="title-18">Details Asset</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="col-12 mb-3">
                    <div class="borderlight2"></div>
                </div>
                <div class="col-12">
                    <table class="table tbl-content">
                        <tr>
                            <td width="35%"><div class="title-14-dark2">Transaction</div></td> 
                            <td width="65%"><div class="title-14-dark">{{ $value['transaction_category'] }}</div></td>
                        </tr>
                        <tr>
                            <td width="35%"><div class="title-14-dark2">Branch</div></td> 
                            <td width="65%"><div class="title-14-dark">{{ $value['branch'] }}</div></td>
                        </tr>
                        <tr>
                            <td width="35%"><div class="title-14-dark2">Supplier</div></td> 
                            <td width="65%"><div class="title-14-dark">{{ $value['supplier'] }}</div></td>
                        </tr>
                        <tr>
                            <td width="35%"><div class="title-14-dark2">Date</div></td> 
                            <td width="65%"><div class="title-14-dark">{{ $value['date'] }}</div></td>
                        </tr>
                        <tr>
                            <td width="35%"><div class="title-14-dark2">Code</div></td> 
                            <td width="65%"><div class="title-14-dark">{{ $value['code'] }}</div></td>
                        </tr>
                        <tr>
                            <td width="35%"><div class="title-14-dark2">Type</div></td> 
                            <td width="65%"><div class="title-14-dark">{{ $value['type'] }}</div></td>
                        </tr>
                        <tr>
                            <td width="35%"><div class="title-14-dark2">Category</div></td> 
                            <td width="65%"><div class="title-14-dark">{{ $value['category'] }}</div></td>
                        </tr>
                        <tr>
                            <td width="35%"><div class="title-14-dark2">Brand</div></td> 
                            <td width="65%"><div class="title-14-dark">{{ $value['brand'] }}</div></td>
                        </tr>
                        <tr>
                            <td width="35%"><div class="title-14-dark2">Serial No</div></td> 
                            <td width="65%"><div class="title-14-dark">{{ $value['serialNo'] }}</div></td>
                        </tr>
                        <tr>
                            <td width="35%"><div class="title-14-dark2">Variant</div></td> 
                            <td width="65%"><div class="title-14-dark">{{ $value['variant'] }}</div></td>
                        </tr>
                        <tr>
                            <td width="35%"><div class="title-14-dark2">Location</div></td> 
                            <td width="65%"><div class="title-14-dark">{{ $value['location'] }}</div></td>
                        </tr>
                        <tr>
                            <td width="35%"><div class="title-14-dark2">Qty</div></td> 
                            <td width="65%"><div class="title-14-dark">{{ $value['qty'] }}</div></td>
                        </tr>
                        <tr>
                            <td width="35%"><div class="title-14-dark2">Price</div></td> 
                            <td width="65%"><div class="title-14-dark">Rp.{{ $value['price'] }}</div></td>
                        </tr>
                        <tr>
                            <td width="35%"><div class="title-14-dark2">Machine</div></td> 
                            <td width="65%"><div class="title-14-dark">{{ $value['machine'] }}</div></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editOut{{ $value2['id'] }}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content p-4" style="border-radius:10px">
            <div class="row">
                <div class="col-12 justify-sb">
                    <div class="title-18">Edit Asset</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="col-12">
                    <table class="table tbl-content">
                        <tr>
                            <td width="35%"><div class="title-14-dark2">ID</div></td> 
                            <td width="65%">
                                <div class="container-tbl-btn">
                                    <input type="text" class="form-control borderInput" id="" name="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td width="35%"><div class="title-14-dark2">Transaction</div></td> 
                            <td width="65%">
                                <div class="container-tbl-btn">
                                    <div class="input-group flex relative">
                                        <div class="input-group-prepend">
                                            <span class="containerLeft"></span>
                                            <div class="borderLeft"></div>
                                        </div>
                                        <select class="form-control borderInput select2bs4 pointer" id="" name="">
                                            <option selected disabled>Select transaction</option>
                                            <option name="Purchase">Purchase</option>    
                                            <option name="Rental Finish">Rental Finish</option>    
                                            <option name="Trial Finish">Trial Finish</option>    
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td width="35%"><div class="title-14-dark2">Branch</div></td> 
                            <td width="65%">
                                <div class="container-tbl-btn">
                                    <div class="input-group flex relative">
                                        <div class="input-group-prepend">
                                            <span class="containerLeft"></span>
                                            <div class="borderLeft"></div>
                                        </div>
                                        <select class="form-control borderInput select2bs4 pointer" id="" name="">
                                            <option selected disabled>Select Branch</option>
                                            <option name="CLN">CLN</option>    
                                            <option name="MAJA1">MAJA1</option>    
                                            <option name="MAJA2">MAJA2</option>    
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td width="35%"><div class="title-14-dark2">Recipient</div></td> 
                            <td width="65%">
                                <div class="container-tbl-btn">
                                    <div class="input-group flex relative">
                                        <div class="input-group-prepend">
                                            <span class="containerLeft"></span>
                                            <div class="borderLeft"></div>
                                        </div>
                                        <select class="form-control borderInput select2bs4 pointer" id="" name="">
                                            <option selected disabled>Select recipient</option>
                                            <option name="Abadi Makmur, TB">Abadi Makmur, TB</option>    
                                            <option name="Indah Sekali, PT">Indah Sekali, PT</option>    
                                            <option name="ABC, Tbk">ABC, Tbk</option>    
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td width="35%"><div class="title-14-dark2">Date</div></td> 
                            <td width="65%">
                                <div class="container-tbl-btn">
                                    <input type="date" class="form-control borderInput" id="" name="">
                                </div>
                            </td>
                        <tr>
                            <td width="35%"><div class="title-14-dark2">Qty</div></td> 
                            <td width="65%">
                                <div class="container-tbl-btn">
                                    <input type="text" class="form-control borderInput" id="" name="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td width="35%"><div class="title-14-dark2">Price</div></td> 
                            <td width="65%">
                                <div class="container-tbl-btn">
                                    <input type="text" class="form-control borderInput" id="" name="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td width="35%"><div class="title-14-dark2">Machine</div></td> 
                            <td width="65%">
                                <div class="container-tbl-btn">
                                    <div class="input-group flex relative">
                                        <div class="input-group-prepend">
                                            <span class="containerLeft"></span>
                                            <div class="borderLeft"></div>
                                        </div>
                                        <select class="form-control borderInput select2bs4 pointer" id="" name="">
                                            <option selected disabled>Select machine</option>
                                            <option name="Non Machine">Non Machine</option>
                                            <option name="Machine">Machine</option>
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-12">
                    <a href="#" class="btn-blue-md btn-block">Save Change</a>
                </div>
            </div>
        </div>
    </div>
</div>