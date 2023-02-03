<input type="hidden" class="form-control"  id="report_id" name="master_order_id" value="{{$rekap->id}}">
<div class="row">
    <div class="col-lg-3">
        <label>Contract</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
            </div>
            <input type="text" class="form-control"  id="contract" name="contract" value="">
        </div>
        <br>
        <label>Product Name</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
            </div>
            <input type="text" class="form-control" id="product_name" name="product_name" value="" required>
        </div>
        <br>
        <label>{{$rekap->standar}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
            </div>
            <input type="number" step="0.01" class="form-control" id="nilai" name="nilai" value="">
        </div>
        <font style="color:red;font-size:12px;font-style: italic;">* Value Must Be In Dollars Currency</font>
        <br>
        <label>Colorway</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-palette"></i></span>
            </div>
            <input type="text" class="form-control" id="colorway" name="colorway" value="">
        </div>
    </div>
    <div class="col-lg-3">
        <label>Article</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-newspaper"></i></span>
            </div>
            <input type="text" class="form-control" id="article" name="article" value="">
        </div>
        <br>
        <label>NO OR</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
            </div>
            <input type="text" class="form-control" id="no_or" name="no_or" value="" required>
        </div>
        <br>
        <label class="cm">CM (PC)</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
            </div>
            <input type="number" step="0.01" class="form-control" id="cm" name="cm" value="">
        </div>
        <font style="color:red;font-size:12px;font-style: italic;">*CM Cost in (PC)</font>
        <br>
        <label>ExFact Date</label>
        <div class="form-group">
            <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                    <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
                </div>
                <input type="text" value="{{$rekap->ex_fact}}" class="form-control datetimepicker-input" data-target="#reservationdate3" name="ex_fact" required/>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <label>Style Code</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-vest-patches"></i></span>
            </div>
            <input type="text" class="form-control" id="style" name="style" value="">
        </div>
        <br>
        <label>PACK/PC</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-box"></i></span>
            </div>
            <select class="form-control" name="kemasan" id="kemasan_rekap" style="width:100px">
                <option selected></option>
                <option value="PACK">PACK</option>
                <option value="PC">PC</option>
                <option value="SET">SET</option>
            </select>
        </div>
        <br>
        <label>Parent Item</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-indent"></i></span>
            </div>
            <!-- <input type="text" class="form-control" id="parent_item" name="parent_item" value=""> -->
            <input type="hidden" class="form-control" id="parent_litm_add" name="parent_item_litm" value="">
            <select class="form-control select2bs4_add" name="parent_item" id="parent_item_add" style="width:100px" required>
                <option value="">Type Parent Item</option>
            </select>
        </div>
    </div>
    <div class="col-lg-3">
        <label>Style Name</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-vest-patches"></i></span>
            </div>
            <input type="text" class="form-control" id="style_name" name="style_name" value="">
        </div>
        <br>
        <label>Quantity Pack</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
            </div>
            <input type="number" step="0.01" class="form-control" id="quantity_pack" name="quantity_pack" value="">
        </div>
        <br>
        <label>Invoice Description</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" class="form-control" id="description_invoice" name="description_invoice" value="">
        </div>
    </div>
</div>
<br>
<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>