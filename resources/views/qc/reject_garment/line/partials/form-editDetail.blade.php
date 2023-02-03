<input type="hidden" class="form-control"  id="bd" name="id" value="">
<input type="hidden" class="form-control"  id="riweuh" name="report_id" value="">
<div class="row">
    <div class="col-lg-6">
        <center><h5 style="font-weight:bold;">FABRIC</h5></center>
        <div class="container" style="border:1px solid black;border-radius:10px;">
            <div class="row" style="padding:15px;">
                <div class="col-lg-6 col-6">
                    <label>Cacat Kain</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tshirt"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="j_cacat" name="f_cacat" value="">
                    </div>
                    <br>
                    <label>Shadding</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tshirt"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="j_shadding" name="f_shadding" value="">
                    </div>
                    <br>
                    <label>Lain-Lain</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tshirt"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="j_lain" name="f_lain" value="">
                    </div>
                </div>
                <div class="col-lg-6 col-6">
                    <label>Bolong</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tshirt"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="j_bolong" name="f_bolong" value="">
                    </div>
                    <br>
                    <label>Kotor</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tshirt"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="j_kotor" name="f_kotor" value="">
                    </div>
                </div>
            </div>
        </div>
    </div>
   <div class="col-lg-6">
        <center><label for="fabric">SEWING</label></center>
        <div class="container" style="border:1px solid black;border-radius:10px;">
            <div class="row" style="padding:15px;">
                <div class="col-lg-6 col-6">
                    <label>Cacat</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tshirt"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="b_cacat" name="s_cacat" value="">
                    </div>
                    <br>
                    <label>Kotor</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tshirt"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="b_kotor" name="s_kotor" value="">
                    </div>
                    <br>
                    <label>Ukuran</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tshirt"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="b_ukuran" name="s_ukuran" value="">
                    </div>
                </div>
                <div class="col-lg-6 col-6">
                    <label>Label</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tshirt"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="b_label" name="s_label" value="">
                    </div>
                    <br>
                    <label>Bolong</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tshirt"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="b_bolong" name="s_bolong" value="">
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>
<br>
<div class="container" style="border:1px solid black;border-radius:10px;padding:15px;">
    <label>KETERANGAN</label>
    <div class="form-group">
        <textarea class="form-control" id="z_keterangan" name="keterangan" rows="3"></textarea>
    </div>
</div>
<br>
<button type="submit" class="btn btn-block btn-primary btn-sm">{{$submit}}</button>
