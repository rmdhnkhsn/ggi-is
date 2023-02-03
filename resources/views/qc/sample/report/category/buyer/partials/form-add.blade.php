<div class="justify-start mb-2">
    <label for="roll">Buyer</label>
    <div class="input-group flex">
        <input type="hidden" id="nama_buyer" name="nama_buyer">
        <select class="form-control select2bs4_add" id="buyer" required>
            <option selected>Select Buyer</option>
            <option></option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="roll">Buyer Code</label>
    <input type="text" class="form-control" id="kode_buyer" name="kode_buyer" oninput="this.value = this.value.toUpperCase()" value="" placeholder="Insert Buyer Name">
</div>
<input type="hidden" class="form-control" id="category_id" name="category_id" value="{{$data->id}}" placeholder="Insert Status">
<button type="submit" class="btn btn-primary btn-block">{{$submit}}</button>
