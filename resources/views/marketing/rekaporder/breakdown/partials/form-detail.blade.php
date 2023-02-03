<div class="row" style="padding:20px">
    <div class="col-lg-3">
        <label>Contract</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
            </div>
            <input type="text" class="form-control"  id="contract" name="contract" value="{{$detail->contract}}" disabled>
        </div>
        <label>Product Name</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
            </div>
            <input type="text" class="form-control" id="product_name" name="product_name" value="{{$detail->product_name}}" disabled>
        </div>
        <label>PACK/PC (QTY)</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
            </div>
            <input type="text" class="form-control" id="product_name" name="product_name" value="{{$detail->kemasan}} ({{$detail->quantity_pack}})" disabled>
        </div>
    </div>
    <div class="col-lg-3">
        <label>Article</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-newspaper"></i></span>
            </div>
            <input type="text" class="form-control" id="article" name="article" value="{{$detail->article}}" disabled>
        </div>
        <label>NO OR</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
            </div>
            <input type="text" class="form-control" id="no_or" name="no_or" value="{{$detail->no_or}}" disabled>
        </div>
        <label>{{$master->standar}}</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
            </div>
            <input type="text" class="form-control number-separator" id="nilai" name="nilai" value="{{$detail->nilai}}" disabled>
        </div>
    </div>
    <div class="col-lg-3">
        <label>Style</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-vest"></i></span>
            </div>
            <input type="text" class="form-control" id="style" name="style" value="{{$detail->style}}" disabled>
        </div>
        <label>Parent Item</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-indent"></i></span>
            </div>
            <input type="text" class="form-control" id="parent_item" name="parent_item" value="{{$detail->parent_item}}" disabled>
        </div>
        <label>CM</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
            </div>
            <input type="text" class="form-control" id="cm" name="cm" value="{{$detail->cm}}" disabled>
        </div>
    </div>
    <div class="col-lg-3">
        <label>Colorway</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-palette"></i></span>
            </div>
            <input type="text" class="form-control" id="colorway" name="colorway" value="{{$detail->colorway}}" disabled>
        </div>
        <label>ExFact Date</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" id="ex_fact" name="ex_fact" value="{{$detail->ex_fact}}" disabled>
        </div>
        @if($detail->detail_exist != 0)
        <label>Total Amount</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
            </div>
            <input type="text" class="form-control" id="total_amount" name="total_amount" value="{{$values}}" disabled>
        </div>
        @endif
    </div>
</div>