<div class="row">
    <div class="col-lg-4">
        <div class="container">
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
                <input type="text" class="form-control"  id="gaya" name="style" value="">
            </div>
            <br>
            <label>Colour</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-palette"></i></span>
                </div>
                <input type="text" class="form-control"  id="warna" name="color" value="">
            </div>
            <br>
            <label>Keterangan</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-comment-dots"></i></span>
                </div>
                <input type="text" class="form-control"  id="ket" name="keterangan" value="">
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
                <input type="text" class="form-control"  id="box" name="no_box" value="">
            </div>
            <br>
            <label>No WO</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-book-open"></i></span>
                </div>
                <input type="text" class="form-control"  id="wo" name="no_wo" value="">
            </div>
            <br>
            <label>Total</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calculator"></i></span>
                </div>
                <input type="text" class="form-control"  id="jumlah" name="total" value="">
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="container">
            <label>Buyer</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>
                </div>
                <input type="text" class="form-control"  id="beli" name="buyer" value="">
            </div>
            <br>
            <label>No PO</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-book-open"></i></span>
                </div>
                <input type="text" class="form-control"  id="data_po" name="no_po" value="">
            </div>
            <br>
            <label>Item</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-tshirt"></i></span>
                </div>
                <input type="text" class="form-control"  id="barang" name="item" value="">
            </div>
        </div>
    </div>
</div>
<br>
<input type="hidden" class="form-control"  id="id" name="id" value="">
<button type="submit" class="btn btn-block btn-primary btn-sm">{{$submit}}</button>