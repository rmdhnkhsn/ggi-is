<div class="row">
    <div class="col-lg-3">
        <label>Tanggal</label>
        <div class="input-group">
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="" placeholder="Masukan Tanggal"  required>
        </div>
        <br>
        <label>Style</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-vest-patches"></i></span>
            </div>
            <input type="text" class="form-control"  id="style" name="style" value="">
        </div>
        <br>
        <label>Colour</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-palette"></i></span>
            </div>
            <input type="text" class="form-control"  id="color" name="color" value="">
        </div>
    </div>
    <div class="col-lg-3">
        <label>Line</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-vector-square"></i></span>
            </div>
            <input type="hidden" class="form-control" id="id_line" name="id_line" value="{{$request['id_line']}}">
            <input type="text" class="form-control"  id="line" name="line" value="{{$request['line']}}">
        </div>
        <br>
        <label>NO WO</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
            </div>
            <input type="text" class="form-control"  id="no_wo" name="no_wo" value="{{$request['no_wo']}}">
        </div>
        <br>
        <label>QTY Order</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
            </div>
            <input type="text" class="form-control"  id="qty" name="qty" value="">
        </div>
    </div>
    <div class="col-lg-3">
        <label>Supervisor</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
            </div>
            <input type="text" class="form-control"  id="supervisor" name="supervisor" value="">
        </div>
        <br>
        <label>Article</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-newspaper"></i></span>
            </div>
            <input type="text" class="form-control"  id="article" name="article" value="">
        </div>
        <br>
        <label>Size</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-ruler"></i></span>
            </div>
            <input type="text" class="form-control"  id="size" name="size" value="">
        </div>
    </div>
    <div class="col-lg-3">
        <label>Buyer</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>
            </div>
            <input type="text" class="form-control"  id="buyer" name="buyer" value="{{$request['buyer']}}">
        </div>
        <br>
        <label>Item</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-edit"></i></span>
            </div>
            <input type="text" class="form-control"  id="item" name="item" value="">
        </div>
    </div>

</div>
<input type="hidden" class="form-control" id="created_by" name="created_by" value="{{auth()->user()->nama}}">
<input type="hidden" class="form-control" id="branch" name="branch" value="{{auth()->user()->branch}}">
<input type="hidden" class="form-control" id="branchdetail" name="branchdetail" value="{{auth()->user()->branchdetail}}">
<br>
<button type="submit" class="btn btn-block btn-primary btn-sm">{{$submit}}</button>
