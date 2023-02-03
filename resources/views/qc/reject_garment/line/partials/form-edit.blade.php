<input type="hidden" class="form-control"  id="id" name="id" value="">
<div class="row">
    <div class="col-lg-3">
        <label>Tanggal</label>
        <div class="input-group">
            <input type="date" class="form-control" id="date" name="tanggal" value="" placeholder="Masukan Tanggal"  required>
        </div>
        <br>
        <label>Style</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-vest-patches"></i></span>
            </div>
            <input type="text" class="form-control"  id="style1" name="style" value="">
        </div>
        <br>
        <label>Colour</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-palette"></i></span>
            </div>
            <input type="text" class="form-control"  id="color1" name="color" value="">
        </div>
    </div>
    <div class="col-lg-3">
        <label>Line</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-vector-square"></i></span>
            </div>
            <input type="text" class="form-control"  id="lines" name="line" value="">
        </div>
        <br>
        <label>NO WO</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
            </div>
            <input type="text" class="form-control"  id="no_wo1" name="no_wo" value="">
        </div>
        <br>
        <label>QTY Order</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
            </div>
            <input type="text" class="form-control"  id="qty1" name="qty" value="">
        </div>
    </div>
    <div class="col-lg-3">
        <label>Supervisor</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
            </div>
            <input type="text" class="form-control"  id="supervisor1" name="supervisor" value="">
        </div>
        <br>
        <label>Article</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-newspaper"></i></span>
            </div>
            <input type="text" class="form-control"  id="article1" name="article" value="">
        </div>
        <br>
        <label>Size</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-ruler"></i></span>
            </div>
            <input type="text" class="form-control"  id="size1" name="size" value="">
        </div>
    </div>
    <div class="col-lg-3">
        <label>Buyer</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>
            </div>
            <input type="text" class="form-control"  id="buyer1" name="buyer" value="">
        </div>
        <br>
        <label>Item</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-edit"></i></span>
            </div>
            <input type="text" class="form-control"  id="item1" name="item" value="">
        </div>
    </div>

</div>
<br>
<button type="submit" class="btn btn-block btn-primary btn-sm">{{$submit}}</button>
