<div class="row">
    <div class="col-lg-4">
        <div class="container">
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
            <br>
            <label>Keterangan</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-comment-dots"></i></span>
                </div>
                <input type="text" class="form-control"  id="keterangan" name="keterangan" value="">
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="container">
            <label>No Box</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-book-open"></i></span>
                </div>
                <input type="text" class="form-control"  id="no_box" name="no_box" value="">
            </div>
            <br>
            <label>No WO</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-book-open"></i></span>
                </div>
                <input type="text" class="form-control"  id="no_wo" name="no_wo" value="">
            </div>
            <br>
            <label>Total</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calculator"></i></span>
                </div>
                <input type="text" class="form-control"  id="total" name="total" value="">
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label>Buyer</label>
            <select class="form-control select2bs4" style="width: 100%;" name="buyer" id="buyer">
            <option selected="selected">Pilih Buyer</option>
            @foreach($buyer as $key => $value)
            <option value="{{$value->F0101_ALPH}}">{{$value->F0101_ALPH}}</option>
            @endforeach
            </select>
        </div>
        <div class="container">
            <label>No PO</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-book-open"></i></span>
                </div>
                <input type="text" class="form-control"  id="no_po" name="no_po" value="">
            </div>
            <br>
            <label>Item</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-tshirt"></i></span>
                </div>
                <input type="text" class="form-control"  id="item" name="item" value="">
            </div>
        </div>
    </div>
</div>
<br>
<input type="hidden" class="form-control"  id="packing_id" name="packing_id" value="{{$packing_id}}">
<button type="submit" class="btn btn-block btn-primary btn-sm">{{$submit}}</button>