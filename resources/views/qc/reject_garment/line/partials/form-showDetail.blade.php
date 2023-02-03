<input type="hidden" id="report" name="report_id" value="" disabled>
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
                        <input type="text" class="form-control"  id="cacat" name="f_cacat" value="" disabled>
                    </div>
                    <br>
                    <label>Shadding</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tshirt"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="shadding" name="f_shadding" value="" disabled>
                    </div>
                    <br>
                    <label>Lain-Lain</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tshirt"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="lain" name="f_lain" value="" disabled>
                    </div>
                </div>
                <div class="col-lg-6 col-6">
                    <label>Bolong</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tshirt"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="bolong" name="f_bolong" value="" disabled>
                    </div>
                    <br>
                    <label>Kotor</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tshirt"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="kotor" name="f_kotor" value="" disabled>
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
                        <input type="text" class="form-control"  id="c_cacat" name="s_cacat" value="" disabled>
                    </div>
                    <br>
                    <label>Kotor</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tshirt"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="c_kotor" name="s_kotor" value="" disabled>
                    </div>
                    <br>
                    <label>Ukuran</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tshirt"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="c_ukuran" name="s_ukuran" value="" disabled>
                    </div>
                </div>
                <div class="col-lg-6 col-6">
                    <label>Label</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tshirt"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="c_label" name="s_label" value="" disabled>
                    </div>
                    <br>
                    <label>Bolong</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tshirt"></i></span>
                        </div>
                        <input type="text" class="form-control"  id="c_bolong" name="s_bolong" value="" disabled>
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>
<br>
<div class="container" style="border:1px solid black;border-radius:10px;">
    <div class="row" style="padding:15px;">
        <div class="col-lg-6 col-6">
            <label>Total</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calculator"></i></span>
                </div>
                <input type="text" class="form-control"  id="x_total" name="total" value="" disabled>
            </div>
        </div>
        <div class="col-lg-6 col-6">
            <label>KETERANGAN</label>
            <div class="form-group">
                <textarea class="form-control" id="x_keterangan" name="keterangan" rows="1" disabled></textarea>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('reject_detail.hapus')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="test" name="id" >
                <input type="hidden" id="bcd" name="report_id">
                <button type="submit" class="btn btn-block btn-danger btn-sm" title="Hapus"><i class="far fa-trash-alt"></i> Hapus</button>
            </form>
        </div>
    </div>
</div>

