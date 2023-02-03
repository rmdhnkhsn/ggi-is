<div class="justify-start mb-2">
    <label for="roll">Category</label>
    <div class="input-group flex">
        <select class="form-control" id="category_buyer" name="category" required>
            <option  disabled selected>Select Category</option>
            @foreach($category as $key => $value)
            <option>{{$value->kode_kategori}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="justify-start mb-2">
    <label for="roll">Buyer</label>
    <div class="input-group flex">
        <input type="hidden" id="buyer_name" name="buyer_name">
        <select class="form-control select2bs4_buyer" id="buyer_cari" name="buyer" required>

        </select>
    </div>
</div>
<div class="justify-start mb-2">
    <label for="roll">Item</label>
    <div class="input-group flex">
        <select class="form-control" id="item_cari" name="item" required>
            
        </select>
    </div>
</div>
<div class="form-group">
    <label for="roll">Size</label>
    <input type="text" class="form-control" id="size" name="size" value="" oninput="this.value = this.value.toUpperCase()" placeholder="Insert Size">
</div>
<div class="form-group">
    <label for="roll">Style</label>
    <input type="text" class="form-control" id="style" name="style" value="" placeholder="Insert Style">
</div>
<div class="form-group">
    <label for="roll">Status</label>
    <input type="text" class="form-control" id="status" name="status" value="" placeholder="Insert Status">
</div>
<div class="form-group">
    <label>Date</label>
    <div class="input-group date" id="reservationdate" data-target-input="nearest">
        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
            <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
        </div>
        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="date" placeholder="Select Date"/>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label for="roll">File 1</label><br>
            <input accept="image/*"  type="file" name="file" id="file">
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label for="roll">File 2</label><br>
            <input accept="image/*"  type="file" name="file2" id="file2">
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label for="roll">File 3</label><br>
            <input accept="image/*"  type="file" name="file3" id="file3">
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="form-group">
            <label for="roll">File 4</label><br>
            <input accept="image/*"  type="file" name="file4" id="file4">
        </div>
    </div>
</div>
<br>
<input type="hidden" class="form-control" id="created_by" name="created_by" value="{{auth()->user()->nama}}" placeholder="Insert Status">
<input type="hidden" class="form-control" id="branch" name="branch" value="{{auth()->user()->branch}}" placeholder="Insert Status">
<input type="hidden" class="form-control" id="branchdetail" name="branchdetail" value="{{auth()->user()->branchdetail}}" placeholder="Insert Status">
<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
