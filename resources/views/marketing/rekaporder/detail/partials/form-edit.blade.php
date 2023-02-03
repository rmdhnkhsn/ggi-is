<input type="hidden" class="form-control"  id="id" name="id" value="">
<input type="hidden" class="form-control"  id="report" name="master_order_id" value="">
<div class="row">
    <div class="col-lg-3">
        <label>Contract</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
            </div>
            <input type="text" class="form-control"  id="cont" name="contract" value="">
        </div>
        <br>
        <label>Product Name</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
            </div>
            <input type="text" class="form-control" id="product" name="product_name" value="" required>
        </div>
        <br>
        <label>{{$rekap->standar}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
            </div>
            <input type="number" step="0.01" class="form-control" id="values" name="nilai" value="">
        </div>
        <font style="color:red;font-size:12px;font-style: italic;">* Value Must Be In Dollars Currency</font>
        <br>
        <label>Colorway</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-palette"></i></span>
            </div>
            <input type="text" class="form-control" id="color" name="colorway" value="">
        </div>
    </div>
    <div class="col-lg-3">
        <label>Article</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-newspaper"></i></span>
            </div>
            <input type="text" class="form-control" id="art" name="article" value="">
        </div>
        <br>
        <label>NO OR</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
            </div>
            <input type="text" class="form-control" id="nor" name="no_or" value="" required>
        </div>
        <br>
        <label>CM (PC)</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
            </div>
            <input type="number" step="0.01" class="form-control" id="cost" name="cm" value="">
        </div>
        <font style="color:red;font-size:12px;font-style: italic;">*CM Cost in (PC)</font>
        <br>
        <label>ExFact Date</label>
        <div class="form-group">
            <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                    <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
                </div>
                <input type="text" value="" class="form-control datetimepicker-input" data-target="#reservationdate2" id="ex" name="ex_fact" required/>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <label>Style</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-vest-patches"></i></span>
            </div>
            <input type="text" class="form-control" id="sty" name="style" value="">
        </div>
        <br>
        <label>PACK/PC</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-box"></i></span>
            </div>
            <input type="text" class="form-control" id="kemas" name="kemasan" value="">
        </div>
        <br>
        <label>Parent Item</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-indent"></i></span>
            </div>
            <!-- <input type="text" class="form-control" id="parent" name="parent_item" value=""> -->
            <input type="hidden" class="form-control" id="parent_litm_edit" name="parent_item_litm" value="">
            <select class="form-control select2bs4_edit" name="parent_item" id="parent_item_edit" style="width:100px" required>
                @foreach($data as $d)
                    <option value="{{$d->parent_item}}">{{$d->parent_item}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-3">
        <label>Style Name</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-palette"></i></span>
            </div>
            <input type="text" class="form-control" id="s_name" name="style_name" value="">
        </div>
        <br>
        <label>Quantity Pack</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
            </div>
            <input type="number" step="0.01" class="form-control" id="siquan_pack" name="quantity_pack" value="">
        </div>
        <br>
        <label>Description Invoice</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
            </div>
            <input type="text" class="form-control" id="inv_desc" name="description_invoice" value="">
        </div>
    </div>
</div>
<br>
<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>